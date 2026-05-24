<?php

declare(strict_types=1);

$baseDir = dirname(__DIR__);
$configPath = $baseDir . '/config/diagnostics.local.php';
$exampleConfigPath = $baseDir . '/config/diagnostics.example.php';
$storageDir = $baseDir . '/storage';
$config = is_file($configPath) ? require $configPath : [];
if (!is_array($config)) {
    $config = [];
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function status(string $state, string $label, string $detail = ''): array
{
    return ['state' => $state, 'label' => $label, 'detail' => $detail];
}

function render_status(array $status): string
{
    $detail = $status['detail'] !== '' ? '<span>' . e($status['detail']) . '</span>' : '';
    return '<span class="badge badge-' . e($status['state']) . '">' . e($status['label']) . '</span>' . $detail;
}

function command_exists(string $command): bool
{
    $disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));
    return function_exists($command) && !in_array($command, $disabled, true);
}

function run_command(string $command): array
{
    if (!command_exists('shell_exec')) {
        return status('warn', 'Not checked', 'shell_exec is disabled in web PHP.');
    }

    $output = @shell_exec($command . ' 2>&1');
    $output = trim((string) $output);

    if ($output === '') {
        return status('warn', 'Unknown', 'Command returned no output.');
    }

    $firstLine = strtok($output, "\n") ?: $output;
    if (preg_match('/not found|not recognized|no such file|permission denied/i', $firstLine) === 1) {
        return status('warn', 'Unavailable', substr($firstLine, 0, 180));
    }

    return status('pass', 'Detected', substr($firstLine, 0, 180));
}

function config_value(array $config, string $key, ?string $default = null): ?string
{
    $value = $config[$key] ?? $default;
    if ($value === null || $value === '') {
        return $default;
    }

    return (string) $value;
}

function path_ends_with_public(string $path): bool
{
    $path = rtrim(str_replace('\\', '/', $path), '/');
    return substr($path, -7) === '/public';
}

function safe_error(Throwable $exception, array $config): string
{
    $message = $exception->getMessage();
    foreach (['DB_PASSWORD', 'DB_USERNAME', 'DB_DATABASE', 'DB_HOST'] as $key) {
        $value = isset($config[$key]) ? (string) $config[$key] : '';
        if ($value !== '') {
            $message = str_replace($value, '[' . $key . ']', $message);
        }
    }

    return $message;
}

$accessKey = config_value($config, 'ACCESS_KEY', '');
if ($accessKey !== '') {
    $providedKey = isset($_GET['key']) ? (string) $_GET['key'] : '';
    if (!hash_equals($accessKey, $providedKey)) {
        http_response_code(403);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Forbidden\n";
        exit;
    }
}

$phpVersion = PHP_VERSION;
$phpStatus = version_compare($phpVersion, '8.3.0', '>=')
    ? status('pass', 'Pass', 'PHP ' . $phpVersion . (version_compare($phpVersion, '8.4.0', '>=') ? ' is preferred/confirmed.' : ' meets Laravel 12 minimum.'))
    : status('fail', 'Fail', 'PHP ' . $phpVersion . ' is below the PHP 8.3 requirement.');

$extensions = [
    'pdo' => ['required' => true],
    'pdo_pgsql' => ['required' => true],
    'pgsql' => ['required' => true],
    'mbstring' => ['required' => true],
    'openssl' => ['required' => true],
    'tokenizer' => ['required' => true],
    'xml' => ['required' => true],
    'ctype' => ['required' => true],
    'json' => ['required' => true],
    'curl' => ['required' => true],
    'fileinfo' => ['required' => true],
    'bcmath' => ['required' => true],
    'intl' => ['required' => true],
    'zip' => ['required' => true],
    'gd' => ['required' => false, 'one_of' => 'image'],
    'imagick' => ['required' => false, 'one_of' => 'image'],
];

$extensionStatuses = [];
foreach ($extensions as $extension => $rules) {
    $loaded = extension_loaded($extension);
    if ($loaded) {
        $extensionStatuses[$extension] = status('pass', 'Installed');
    } elseif (($rules['required'] ?? false) === true) {
        $extensionStatuses[$extension] = status('fail', 'Missing');
    } else {
        $extensionStatuses[$extension] = status('warn', 'Optional', 'Install gd or imagick for image handling.');
    }
}

if (!extension_loaded('gd') && !extension_loaded('imagick')) {
    $imageExtensionStatus = status('warn', 'Missing one-of', 'Either gd or imagick should be available for image operations.');
} else {
    $imageExtensionStatus = status('pass', 'Pass', extension_loaded('gd') ? 'gd available.' : 'imagick available.');
}

$dbStatus = status('warn', 'Not configured', 'Create config/diagnostics.local.php from diagnostics.example.php to test PostgreSQL.');
$dbVersion = '';
if (is_file($configPath)) {
    if (!extension_loaded('pdo_pgsql')) {
        $dbStatus = status('fail', 'Not checked', 'pdo_pgsql is missing.');
    } else {
        $host = config_value($config, 'DB_HOST', 'localhost');
        $port = config_value($config, 'DB_PORT', '5432');
        $database = config_value($config, 'DB_DATABASE', '');
        $username = config_value($config, 'DB_USERNAME', '');
        $password = config_value($config, 'DB_PASSWORD', '');
        $sslMode = config_value($config, 'DB_SSLMODE', 'prefer');
        $dsn = 'pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $database . ';sslmode=' . $sslMode;

        try {
            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_TIMEOUT => 5,
            ]);
            $dbVersion = (string) $pdo->query('select version()')->fetchColumn();
            $dbStatus = status('pass', 'Connected', 'PostgreSQL connection succeeded.');
        } catch (Throwable $exception) {
            $dbStatus = status('fail', 'Failed', safe_error($exception, $config));
        }
    }
}

$filesystemStatus = status('fail', 'Failed', 'Write test did not run.');
$writeDir = $storageDir . '/test-write';
$testFile = $writeDir . '/diagnostic-' . str_replace('.', '-', uniqid('', true)) . '.txt';
$testPayload = 'forworship-diagnostics-' . gmdate('c');
try {
    if (!is_dir($writeDir)) {
        mkdir($writeDir, 0775, true);
    }
    file_put_contents($testFile, $testPayload, LOCK_EX);
    $readBack = file_get_contents($testFile);
    unlink($testFile);
    $filesystemStatus = $readBack === $testPayload
        ? status('pass', 'Pass', 'Created, wrote, read, and deleted a test file.')
        : status('fail', 'Failed', 'Readback content did not match.');
} catch (Throwable $exception) {
    $filesystemStatus = status('fail', 'Failed', $exception->getMessage());
}

$scriptFilename = $_SERVER['SCRIPT_FILENAME'] ?? '';
$documentRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
$currentDir = __DIR__;
$publicPathStatus = path_ends_with_public($currentDir)
    ? status('pass', 'Public path', 'Script is running from a public directory.')
    : status('warn', 'Check path', 'Document root should point to host-diagnostics/public.');

$getenvWorks = getenv('PATH') !== false || getenv('HOME') !== false || count(getenv() ?: []) > 0;
$envStatus = $getenvWorks
    ? status('pass', 'Readable', 'getenv() can read environment values.')
    : status('warn', 'Restricted', 'Environment values appear limited in web PHP.');
$envSources = [
    'getenv()' => $getenvWorks ? 'available' : 'restricted',
    '$_ENV' => count($_ENV) > 0 ? 'available' : 'empty',
    '$_SERVER' => count($_SERVER) > 0 ? 'available' : 'available',
];

$shellFunctions = [
    'shell_exec' => command_exists('shell_exec'),
    'exec' => command_exists('exec'),
    'proc_open' => command_exists('proc_open'),
];
$composerStatus = run_command('composer --version');
$nodeStatus = run_command('node -v');
$npmStatus = run_command('npm -v');

$cronPingFile = $storageDir . '/cron-ping.json';
$cronStatus = status('warn', 'Never run', 'Visit public/cron-ping.php or configure cPanel cron.');
$cronPayload = null;
if (is_file($cronPingFile)) {
    $cronPayload = json_decode((string) file_get_contents($cronPingFile), true);
    $timestamp = is_array($cronPayload) ? (string) ($cronPayload['timestamp'] ?? '') : '';
    $cronStatus = $timestamp !== ''
        ? status('pass', 'Seen', 'Last ping: ' . $timestamp)
        : status('warn', 'Unknown', 'Ping file exists but timestamp could not be read.');
}

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (($_SERVER['SERVER_PORT'] ?? '') === '443')
    || strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')) === 'https';
$httpsStatus = $isHttps
    ? status('pass', 'HTTPS active', 'Request appears secure.')
    : status('warn', 'HTTP only', 'Enable SSL for the diagnostic subdomain.');

$serverInfo = [
    'Server software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
    'PHP SAPI' => PHP_SAPI,
    'Loaded php.ini' => php_ini_loaded_file() ?: 'Unknown',
    'memory_limit' => ini_get('memory_limit'),
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'post_max_size' => ini_get('post_max_size'),
    'max_execution_time' => ini_get('max_execution_time'),
    'max_file_uploads' => ini_get('max_file_uploads'),
];

$summaryStatuses = [
    'PHP Runtime' => $phpStatus,
    'PostgreSQL' => $dbStatus,
    'Filesystem' => $filesystemStatus,
    'Document Root' => $publicPathStatus,
    'Environment' => $envStatus,
    'HTTPS / SSL' => $httpsStatus,
    'Cron' => $cronStatus,
    'Queue' => status('warn', 'Manual check', 'Shared hosting may not allow long-running workers.'),
];

$extensionFailures = array_filter($extensionStatuses, function (array $item): bool {
    return $item['state'] === 'fail';
});
$summaryStatuses['PHP Extensions'] = count($extensionFailures) === 0 && $imageExtensionStatus['state'] === 'pass'
    ? status('pass', 'Pass', 'Required extensions are installed.')
    : (count($extensionFailures) > 0 ? status('fail', 'Needs attention', count($extensionFailures) . ' required extension(s) missing.') : $imageExtensionStatus);

$overallState = 'pass';
foreach ($summaryStatuses as $item) {
    if ($item['state'] === 'fail') {
        $overallState = 'fail';
        break;
    }
    if ($item['state'] === 'warn') {
        $overallState = 'warn';
    }
}
$overallStatus = $overallState === 'pass'
    ? status('pass', 'Ready for next review', 'No red checks detected in web diagnostics.')
    : ($overallState === 'fail'
        ? status('fail', 'Blocked', 'Resolve red checks before Laravel scaffolding assumptions are finalized.')
        : status('warn', 'Needs review', 'Yellow checks require manual confirmation or configuration.'));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ForWorship Creative Host Diagnostics</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f7f4ef;
            --surface: #ffffff;
            --text: #26231f;
            --muted: #686058;
            --line: #ddd6cc;
            --pass: #1f7a4d;
            --pass-bg: #e6f4ec;
            --warn: #9a6400;
            --warn-bg: #fff5d8;
            --fail: #b42318;
            --fail-bg: #fee4e2;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font: 15px/1.5 system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        main {
            max-width: 1120px;
            margin: 0 auto;
            padding: 32px 18px 48px;
        }
        header {
            margin-bottom: 22px;
        }
        h1 {
            margin: 0 0 8px;
            font-size: clamp(1.8rem, 4vw, 3rem);
            line-height: 1.05;
        }
        h2 {
            margin: 0 0 14px;
            font-size: 1.2rem;
        }
        p { margin: 0 0 12px; color: var(--muted); }
        code {
            padding: 2px 5px;
            border-radius: 4px;
            background: #f1ece5;
            color: #34302b;
        }
        .notice, section {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 18px;
            margin: 14px 0;
        }
        .notice {
            border-color: #dfb547;
            background: #fff8df;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 14px;
        }
        .row {
            display: flex;
            gap: 12px;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px 0;
            border-top: 1px solid var(--line);
        }
        .row:first-child { border-top: 0; }
        .row strong { min-width: 150px; }
        .value {
            text-align: right;
            overflow-wrap: anywhere;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            min-height: 28px;
            padding: 4px 9px;
            border-radius: 999px;
            font-weight: 700;
            white-space: nowrap;
            margin-right: 8px;
        }
        .badge-pass { color: var(--pass); background: var(--pass-bg); }
        .badge-warn { color: var(--warn); background: var(--warn-bg); }
        .badge-fail { color: var(--fail); background: var(--fail-bg); }
        .summary-card {
            min-height: 108px;
        }
        .muted { color: var(--muted); }
        .commands {
            display: grid;
            gap: 6px;
            margin-top: 8px;
        }
        .commands code {
            display: block;
            padding: 8px;
            overflow-wrap: anywhere;
        }
        footer {
            margin-top: 28px;
            color: var(--muted);
        }
        @media (max-width: 640px) {
            .row {
                display: block;
            }
            .value {
                text-align: left;
                margin-top: 6px;
            }
        }
    </style>
</head>
<body>
<main>
    <header>
        <h1>ForWorship Creative Host Diagnostics</h1>
        <p>Lightweight hosting capability check for the planned Laravel 12, PostgreSQL, Vue, and Inertia application.</p>
    </header>

    <div class="notice">
        <strong>Security notice:</strong> This diagnostic page exposes server capability information. Remove it or protect it after testing.
        <?php if ($accessKey === ''): ?>
            <p><span class="badge badge-warn">Public</span> No <code>ACCESS_KEY</code> is configured in <code>config/diagnostics.local.php</code>.</p>
        <?php else: ?>
            <p><span class="badge badge-pass">Protected</span> Access key protection is enabled.</p>
        <?php endif; ?>
    </div>

    <section>
        <h2>Overall Summary</h2>
        <p><?= render_status($overallStatus) ?></p>
        <div class="grid">
            <?php foreach ($summaryStatuses as $name => $item): ?>
                <div class="summary-card">
                    <strong><?= e($name) ?></strong>
                    <p><?= render_status($item) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section>
        <h2>PHP Runtime</h2>
        <div class="row"><strong>PHP version</strong><div class="value"><?= render_status($phpStatus) ?></div></div>
        <div class="row"><strong>Preferred version</strong><div class="value">PHP 8.4 preferred if available; PHP 8.3+ required for Laravel 12.</div></div>
    </section>

    <section>
        <h2>PHP Extensions</h2>
        <div class="grid">
            <?php foreach ($extensionStatuses as $extension => $item): ?>
                <div class="row"><strong><?= e($extension) ?></strong><div class="value"><?= render_status($item) ?></div></div>
            <?php endforeach; ?>
        </div>
        <div class="row"><strong>gd or imagick</strong><div class="value"><?= render_status($imageExtensionStatus) ?></div></div>
    </section>

    <section>
        <h2>PostgreSQL</h2>
        <div class="row"><strong>Config file</strong><div class="value"><?= is_file($configPath) ? e($configPath) : 'Missing local config. Example: ' . e($exampleConfigPath) ?></div></div>
        <div class="row"><strong>Connection</strong><div class="value"><?= render_status($dbStatus) ?></div></div>
        <?php if ($dbVersion !== ''): ?>
            <div class="row"><strong>PostgreSQL version</strong><div class="value"><?= e($dbVersion) ?></div></div>
        <?php endif; ?>
    </section>

    <section>
        <h2>Filesystem</h2>
        <div class="row"><strong>Storage path</strong><div class="value"><?= e($writeDir) ?></div></div>
        <div class="row"><strong>Write test</strong><div class="value"><?= render_status($filesystemStatus) ?></div></div>
    </section>

    <section>
        <h2>Document Root</h2>
        <div class="row"><strong>SCRIPT_FILENAME</strong><div class="value"><?= e($scriptFilename) ?></div></div>
        <div class="row"><strong>DOCUMENT_ROOT</strong><div class="value"><?= e($documentRoot) ?></div></div>
        <div class="row"><strong>Current directory</strong><div class="value"><?= e($currentDir) ?></div></div>
        <div class="row"><strong>Public path check</strong><div class="value"><?= render_status($publicPathStatus) ?></div></div>
    </section>

    <section>
        <h2>Environment</h2>
        <div class="row"><strong>Environment access</strong><div class="value"><?= render_status($envStatus) ?></div></div>
        <?php foreach ($envSources as $source => $result): ?>
            <div class="row"><strong><?= e($source) ?></strong><div class="value"><?= e($result) ?></div></div>
        <?php endforeach; ?>
    </section>

    <section>
        <h2>Composer / Node</h2>
        <?php foreach ($shellFunctions as $function => $enabled): ?>
            <div class="row"><strong><?= e($function) ?></strong><div class="value"><?= render_status($enabled ? status('pass', 'Enabled') : status('warn', 'Disabled')) ?></div></div>
        <?php endforeach; ?>
        <div class="row"><strong>Composer</strong><div class="value"><?= render_status($composerStatus) ?></div></div>
        <div class="row"><strong>Node</strong><div class="value"><?= render_status($nodeStatus) ?></div></div>
        <div class="row"><strong>npm</strong><div class="value"><?= render_status($npmStatus) ?></div></div>
        <p>Node/npm are not strictly required on the host if assets are built locally or in CI and deployed compiled.</p>
        <div class="commands">
            <code>composer --version</code>
            <code>node -v</code>
            <code>npm -v</code>
        </div>
    </section>

    <section>
        <h2>Cron</h2>
        <div class="row"><strong>Last cron ping</strong><div class="value"><?= render_status($cronStatus) ?></div></div>
        <p>Configure cPanel cron to visit <code>/cron-ping.php</code> or run the PHP file from CLI if available.</p>
    </section>

    <section>
        <h2>Queue</h2>
        <p><?= render_status(status('warn', 'Manual check', 'Long-running Laravel queue workers may not be allowed on reseller/shared hosting.')) ?></p>
        <p>MVP may need a database queue plus cron-driven <code>queue:work --stop-when-empty</code> instead of a persistent worker.</p>
        <div class="commands">
            <code>php artisan queue:work --stop-when-empty</code>
            <code>php artisan schedule:run</code>
        </div>
    </section>

    <section>
        <h2>HTTPS / SSL</h2>
        <div class="row"><strong>HTTPS</strong><div class="value"><?= render_status($httpsStatus) ?></div></div>
        <div class="row"><strong>Host</strong><div class="value"><?= e($_SERVER['HTTP_HOST'] ?? 'Unknown') ?></div></div>
        <div class="row"><strong>Server port</strong><div class="value"><?= e($_SERVER['SERVER_PORT'] ?? 'Unknown') ?></div></div>
        <div class="row"><strong>Forwarded proto</strong><div class="value"><?= e($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 'Not set') ?></div></div>
    </section>

    <section>
        <h2>Server Limits</h2>
        <?php foreach ($serverInfo as $name => $value): ?>
            <div class="row"><strong><?= e($name) ?></strong><div class="value"><?= e($value) ?></div></div>
        <?php endforeach; ?>
    </section>

    <section>
        <h2>Next Steps</h2>
        <p>Resolve red checks before finalizing Laravel scaffolding assumptions. Review yellow checks manually and document the result in the Phase 1 hosting validation task.</p>
        <div class="commands">
            <code>php -v</code>
            <code>php -m</code>
            <code>composer --version</code>
            <code>node -v</code>
            <code>npm -v</code>
            <code>psql --version</code>
        </div>
    </section>

    <footer>
        <strong>Security notice:</strong> This diagnostic page exposes server capability information. Remove it or protect it after testing.
    </footer>
</main>
</body>
</html>
