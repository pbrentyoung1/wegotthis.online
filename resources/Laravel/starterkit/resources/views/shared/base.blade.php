<!DOCTYPE html>

<html lang="en" data-skin="forworship" data-menu-color="light" data-topbar-color="light" data-theme="light" @yield("html_attribute")>

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />

    @yield("styles")

    @include("shared.partials/head-css")

</head>

<body @yield("body_attribute")>

    @yield("content")

    @yield("scripts")

</body>

</html>
