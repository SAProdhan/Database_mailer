<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
$(document).ready(function() {
    $('#example').DataTable( {
        "ajax": {
            "url": "{{ URL::to('/public/clients') }}",
            "dataType": "json"
        }
    } );
} );


//         var editor; // use a global for the submit and return data rendering in the examples
// $(document).ready(function() {
//     editor = new $.fn.dataTable.Editor( {
//         ajax: "{{ URL::to('/public/clients') }}",
//         table: "#example",
//         fields: [ {
//                 label: "Serial No:",
//                 name: "Serial No"
//             }, {
//                 label: "Company Name:",
//                 name: "CompanyName"
//             }, {
//                 label: "Company Address:",
//                 name: "CompanyAddress"
//             }, {
//                 label: "Contact Person:",
//                 name: "ContactPerson",
//             }, {
//                 label: "Designation:",
//                 name: "Designation",
//             }, {
//                 label: "MobileNo:",
//                 name: "MobileNo",
//             }, {
//                 label: "Email Address:",
//                 name: "EmailAddress",
//             }, {
//                 label: "IT Manager:",
//                 name: "ITManager",
//             }, {
//                 label: "Contact No:",
//                 name: "ContactNo",
//             }, {
//                 label: "Email Address_IT:",
//                 name: "EmailAddress_IT",
//             }, {
//                 label: "Zone:",
//                 name: "Zone",
//             }, {
//                 label: "Remarks:",
//                 name: "Remarks",
//             }, {
//                 label: "Status:",
//                 name: "Status",
//             }
//         ]
//     } );
 
//     $('#example').DataTable( {
//         dom: "Bfrtip",
//         ajax: {
//             url: "{{ URL::to('/public/clients') }}",
//             type: 'POST'
//         },
//         columns: [
//             { data: "Serial No" },
//             { data: "CompanyName" },
//             { data: "CompanyAddress" },
//             { data: "ContactPerson" },
//             { data: "Designation" },
//             { data: "MobileNo" },
//             { data: "EmailAddress" },
//             { data: "ITManager" },
//             { data: "ContactNo" },
//             { data: "EmailAddress_IT" },
//             { data: "Zone" },
//             { data: "Remarks" },
//             { data: "Status" }
//         ],
//         select: true,
//         buttons: [
//             { extend: "create", editor: editor },
//             { extend: "edit",   editor: editor },
//             { extend: "remove", editor: editor }
//         ]
//     } );
// } );
    </script>
</body>
</html>
