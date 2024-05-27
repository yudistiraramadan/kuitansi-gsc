<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $slot }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('asset_offline/img/gsc.png') }}" />
    <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}" />


    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('asset_offline/css/datatables.css') }}">
</head>
