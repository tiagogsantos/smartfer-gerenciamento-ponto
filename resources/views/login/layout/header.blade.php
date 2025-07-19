<html
    lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Smartfer - Industria</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/iconify-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/pickr-themes.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/datatables.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap5.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dropzone') }}"/>
    <link rel="stylesheet" href="{{ asset('css/flag-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/apex-charts.css') }}"/>
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script src="{{ asset('js/template-customizer.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
</head>
<body>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('js/autocomplete-js.js') }}"></script>
<script src="{{ asset('js/pickr.js') }}"></script>
<script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('js/hammer.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/forms-file-upload.js') }}"></script>

@yield('content')

<!-- Vendors JS -->
<script src="{{ asset('js/apexcharts.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('js/dashboards-analytics.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css" rel="stylesheet">

</body>
</html>
