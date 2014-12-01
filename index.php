<?php

 /*** error reporting on ***/
 error_reporting(E_ALL);

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 define ('__SITE_PATH', $site_path);

 /*** include the init.php file ***/
 include 'includes/init.php';

 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . '/controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap -->
    <link href="application/public/css/bootstrap.min.css" rel="stylesheet">
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="application/public/css/estilos-tienda.css">
	<script type="text/javascript" src="/tienda-PHP/application/public/js/js-tienda.js"></script>
	
	<title>PHP Store</title>
</head>
<body>

<header>
	<code><img alt="e-shop" src="application/public/images/logo/logo-big.png"></code>
	<nav class="navbar navbar-inverse" role="navigation">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        <img alt="e-shop" class="img-logo-nav" src="application/public/images/logo/logo-e.png">
	      </a>
	    </div>
	  
	  <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Busqueda">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      
      <button type="button" class="btn btn-default navbar-btn navbar-right">Sign in</button>
      
	</div>
	</nav>
</header>

<section>

</section>
<section>
<?php  
/*** load the controller ***/
 $registry->router->loader(); 
 ?>
</section>
<aside>Aside <ul id="listadeusuarios"></ul></aside>
<!--/.footer--> 
<footer class="footer-bottom-fix">
	<div class="footer" id="footer">
        <div class="container">
            <div class="row">
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright &copy; Footer E-shop 2014. All right reserved. </p>
        </div>
    </div>
</footer>

</body>
</html>