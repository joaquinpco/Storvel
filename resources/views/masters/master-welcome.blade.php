<!doctype html>
<!-- Bootstrap first template for Internet y Negocio Electrónico, University of Cadiz,
     since 2019, based on https://www.w3schools.com/bootstrap4/bootstrap_templates.asp -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	
    <style>
      #footer { background: #3498db; }
      #footer a { color: #fff; }
      .nabvar-custom { background-color: #2980b9; }
      .nabvar-custom a { color: #fff;}
    </style>

    <title>ByteStore</title>
  </head>

  <body>

    <!-- SECTION: Main menu -->
    @include("layouts.layout-header")

    <!-- LAYOUT: CENTER AND RIGHT BANNER -->
    @yield("contenido")
    @yield("bannerDrcha")

    <!-- Footer -->
    @include("layouts.layout-footer")

    <!-- Loading Javascripts -->   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- JQUERY ES CARGADO, YA NO HACE
     FALTA CARGARLO DE NUEVO
     <script>window.jQuery || 
     document.write("<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' i
     ntegrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' 
     crossorigin='anonymous'></script>")</script> -->
    <!-- <script src="js/popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>