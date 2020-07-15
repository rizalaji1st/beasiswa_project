<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>
  @include('includes.frontend.style')

</head>
<body class="bg-shape">


  <!--================Header Menu Area =================-->
  @include('includes.frontend.header')
  @yield('content')
  @include('includes.frontend.script')
</body>
</html>