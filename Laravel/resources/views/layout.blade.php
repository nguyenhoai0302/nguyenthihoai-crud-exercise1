<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Trang web quản lý học sinh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/students/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/students/css/style.css')}}">
    @yield('css')

</head>
<body>
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                </div>

                <div class="col-9">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        
        
    </main>

    <script src="{{asset('assets/students/css/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/students/css/custom.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('js')
    @stack('scripts')
</body>
</html>