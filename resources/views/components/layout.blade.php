<!doctype html>
<title>My amazing blog</title>
<link rel="stylesheet" href="/app.css">

<body> 
   <header>
      @yield('banner')
   </header>
  {{--  @yield('content') --}}
  {{$content}}
</body>