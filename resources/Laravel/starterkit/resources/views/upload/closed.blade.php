<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Submissions Closed — {{ $deliverable->title }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-default-50 min-h-full flex items-center justify-center">
    <div class="mx-auto max-w-md px-4 py-10 text-center">
        <i class="iconify tabler--camera-off text-default-300 mb-4 size-12"></i>
        <h1 class="text-xl font-bold text-default-900">Photo submissions are closed</h1>
        <p class="text-default-500 mt-2">Submissions for <strong>{{ $deliverable->title }}</strong> are no longer being accepted.</p>
        <p class="text-default-400 mt-4 text-sm">If you think this is a mistake, reach out to your event organizer.</p>
        <p class="text-center text-default-400 text-xs mt-10">Powered by ForWorship Creative</p>
    </div>
</body>
</html>
