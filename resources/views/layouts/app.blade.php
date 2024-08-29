<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skybot - {{$title}}</title>
    <link rel="stylesheet" href="{{asset('skybot/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('skybot/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('skybot/font-awesome/css/font-awesome.min.css')}}">
    <script src="{{asset('skybot/js/bootstrap.min.js')}}"></script> 

  </head>
  <body>
    <div class="container mt-5"> 
      <div class="row">
         @yield('content') 
       </div> 
      </div>
    </div>
      
</body>
</html>
    