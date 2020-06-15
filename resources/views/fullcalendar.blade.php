<!DOCTYPE html>
<html>
<head>
  <title></title>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>



  <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  


<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events:"{{asset('php/load.php')}}",
    //events: 'load.php',
    //events:"{{url('/fullcalendar/load')}}"
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"{{asset('php/insert.php')}}",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"{{asset('php/update.php')}}",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"{{asset('php/update.php')}}",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       //url:"delete.php",
       url:"{{asset('php/update.php')}}",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
  <style >
      div.box{
        background:#fff ;
      }
  </style>

</head>
<body>
<div>
<nav class="navbar navbar-default" role="navigation" >
   <div class="container-fluid">
    <div class="navbar-header ">
      <button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#navbar-collapse-main">
        <span class="sr-only">toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-main">
      <ul class="nav navbar-nav navbar-right">
      <li><a class="active" href="#">Home</a></li>
        <li><a href="#">Admissions</a></li>
        <li><a href="#">Parents Portal</a></li>
        <li><a href="#">School Level</a></li>
        <li><a href="#">Calendar</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>
   </div>

</nav>
</div>
<div id="home">
    
 
    
        <div class="container">
    <div class="box">
         
    
    <h2 align="center"><a href="#">School Event </a></h2>
   <div id="calendar"></div>
  
    </div>
</div> 
</div>






<footer class="container-fluid text-center">
  <div class="row">
    <div class="col-sm-4">

     
<img class="img img-rounded" src="{{asset('images/images.jpg')}}" alt="LCM">
    </div>

    <div class="col-sm-4">
      <h3>Connect with us at:</h3>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-google"></a>
      <a href="#" class="fa fa-youtube"></a>  
           <a href="#" class="fa fa-linkedin"></a>  
    </div>

    <div class="col-sm-4">
            
        <h4>Find us here <i class="fas fa-caret-down"></i></h4>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8459720356195!2d36.77266311445873!3d-1.2649717359593626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f19e74bc8257f%3A0xba1ba1f74cdb6ef!2sLoreto%20Convent%20Msongari!5e0!3m2!1sen!2ske!4v1589518015326!5m2!1sen!2ske"
          width="250" height="250" frameborder="0" style="border:0;"
          allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
        <h4><a target="_blank" href="https://goo.gl/maps/ExfznsHXjRt1ytjH8"
            class="btn btn-link"><i>view in Google
              Maps<sup>&copy;</sup></i></a></h4>
      
    </div>
  </div>
  
</footer>

</body>
</html>