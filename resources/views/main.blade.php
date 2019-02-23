@extends('partials._head')
  <body>

    <!-- Default Bootstrap Navbar -->
    @include('partials._nav')

    <div class="container">
    @include('partials._message')
  
      @yield('content')
      <hr>
      <p class="text-center"> copyright forhad</p>
    </div>
    <!-- end of .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--  start offline bootstrap
        <script src="js/bootstrap.min.js"/ ></script>
        <script src="js/npm.js"/ ></script>
        <script src="js/jquery1111.min.js"/ ></script> -->
    <!-- start offline bootstrap -->
     @yield('scripts')
  </body>

</html>