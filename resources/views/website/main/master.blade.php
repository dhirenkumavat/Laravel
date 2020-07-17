<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>
<body class="bg-secondary">
    <div class=" p-5 text-center text-white bg-primary m-md-3">
  <h2> Laravel 6</h2>
  <h3>Author : Dhirendra Kumawat</h3>
    </div>
    @section('body')
        
    @show
</body>
</html>