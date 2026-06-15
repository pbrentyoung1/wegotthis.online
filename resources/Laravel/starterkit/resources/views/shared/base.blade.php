<!DOCTYPE html>

<html lang="en" data-skin="forworship" data-menu-color="light" data-topbar-color="light" data-theme="light" @yield("html_attribute")>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="ForWorship" />
    <link rel="manifest" href="/site.webmanifest" />

    @yield("styles")

    @include("shared.partials/head-css")

</head>

<body @yield("body_attribute")>

    @yield("content")

    @yield("scripts")

</body>

</html>
