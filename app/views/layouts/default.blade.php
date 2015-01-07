<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eggfruit</title>
  </head>
  <body>
    {{ link_to_route('applications.index', 'Applications') }}
     | 
    {{ link_to_route('applications.create', 'Create') }}
    
    
    @yield('header')
    
    @yield('content')
    
    @yield('footer')
    
  </body>
</html>