<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--Khac nhau giua cac trang-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
     <!--header giống nhau-->
     @include('layouts.header')
     <!--Main content-->
     <div class="container-fluid">
         @yield('main')
     </div>

     @include('layouts.footer')
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
</body>
</html>