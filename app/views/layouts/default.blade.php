<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    {{HTML::style('css/eggfruit.css')}}
    <title>Eggfruit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Format date</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#applied_date" ).datepicker();
        $( "#format" ).on( "change", function() {
          $( "#applied_date" ).datepicker( "option", "dateFormat", $( this ).val() );
        });
      } );
    </script>
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