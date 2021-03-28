<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boma | @yield('title', 'Home Page')</title>
    <!--SCRIPTS-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
    @media(max-width:676px){
      .sm-icon{
        visibility:visible;
      }
      .bg-icon{
        display:none;
      }
    }
    @media(min-width:676px){
      .sm-icon{
        visibility:hidden;
      }
    }
    body{
      background-color:#00000013;
    }
    nav.custom-footer{
      position:absolute;
      bottom:0;
      width:100%;
    }
    div.footer-fixer{
      position:relative;
      min-height:100vh;
    }
    div.inner-footer-fixer{
      padding-bottom: 70px
    }
    </style>
</head>
<body>
<!--Prefer 'navbar-expand so that i can personally customise behaviour an instead bring in an icon-->
<div class="footer-fixer w-100">
<div class="inner-footer-fixer w-100">
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container">
    <div class="row w-100">
      <div class="col">
        <a class="navbar-brand" href="#">Boma</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col">
        <div class="collapse navbar-collapse" id="navbarText">
        <!-- not that the url method takes as its arguments the path defined in the routes -->
          <a class="nav-item nav-link btn btn-success" type="button" href="{{ url('/products/create') }}" style="margin-right:auto; margin-left:auto;">Post Ad <span class="sr-only">(current)</span></a>
        </div>
      </div>
      <div class="col text-right" style="padding-right:0px">
        <span class="navbar-text bg-icon">
          <a href="#">Login</a>  |  <a href="#">Register</a>
        </span>
        <span class="sm-icon" >
          <a href="" ><img src="{{ asset('images/icons/ran1.png') }}" alt="" style="height:2em; width:2em;"></a>
        </span>
      </div>
    </div>
  
  </div>
</nav>
</nav>
<nav class="nav navbar bg-primay" style="height: 7em; background-color: #21252905;">
  <div class="container">

    <div style="margin-right: auto; margin-left: auto;">
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="@yield('cont', 'container')">
  @yield('content')
</div>
<nav class="navbar navbar-dark bg-dark custom-footer w-100" style="">
  <a class="navbar-brand" href="#">Boma</a>
</nav>
</div>
</div>
@section('footerScripts')

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


</script>
@show
</body>
</html>