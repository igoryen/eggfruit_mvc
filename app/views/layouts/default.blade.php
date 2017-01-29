<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    {{HTML::style('css/eggfruit.css')}}
    <title>Eggfruit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ URL::to('jquery-ui.min.css') }}">
    <script type="text/javascript" src="{{ URL::to('jquery-ui.min.js') }}"></script>
    <script>
      function date_1_Changed( dateStr, Object ) {
        $("#datepicker-msg-1").html("Updated to: " + dateStr );
      }
      function date_2_Changed( dateStr, Object ) {
        $("#datepicker-msg-2").html("Updated to: " + dateStr );
      }
      function date_3_Changed( dateStr, Object ) {
        $("#datepicker-msg-3").html("Updated to: " + dateStr );
      }
      function date_4_Changed( dateStr, Object ) {
        $("#datepicker-msg-4").html("Updated to: " + dateStr );
      }
      $(document).ready(function() {
        $("#applied_date").datepicker({
          onSelect:date_1_Changed,
          showOn:"button",
          buttonImage: "calendar.png",
          buttonImageOnly: false,
          numberOfMonths: 2,
          showButtonPanel: true,
          dateFormat: "yy-mm-dd"
        });
        $("#phone_interview_date").datepicker({
          onSelect:date_2_Changed,
          showOn:"button",
          buttonImage: "calendar.png",
          buttonImageOnly: false,
          numberOfMonths: 2,
          showButtonPanel: true,
          dateFormat: "yy-mm-dd"
        });
        $("#interview_date").datepicker({
          onSelect:date_3_Changed,
          showOn:"button",
          buttonImage: "calendar.png",
          buttonImageOnly: false,
          numberOfMonths: 2,
          showButtonPanel: true,
          dateFormat: "yy-mm-dd"
        });
        $("#response_date").datepicker({
          onSelect:date_4_Changed,
          showOn:"button",
          buttonImage: "calendar.png",
          buttonImageOnly: false,
          numberOfMonths: 2,
          showButtonPanel: true,
          dateFormat: "yy-mm-dd"
        });
      });

      // -------------------------------
      // $( function() {
      //   $( "#applied_date" ).datepicker();
      //   $( "#format" ).on( "change", function() {
      //     $( "#applied_date" ).datepicker( "option", "dateFormat", $( this ).val() );
      //   });
      // } );
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