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
    <script src="application/public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="application/public/css/estilos-tienda.css">
	<script type="text/javascript" src="application/public/js/js-tienda.js"></script>
	<link rel="icon" href="application/public/images/logo/logo-e.png" type="image/gif" sizes="16x16">
	<title>PHP Store</title>
</head>
<body>

<header>
	<code><img alt="e-shop" class="content-fixed img-logo-big" src="application/public/images/logo/logo-big.png" onclick="location.href = 'index.php?rt=index/';"></code>
	<nav class="navbar navbar-inverse" role="navigation">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        <img alt="e-shop" class="img-logo-nav" src="application/public/images/logo/logo-e.png" onclick="location.href = 'index.php?rt=index/';">
	      </a>
	    </div>
	  
	  <form class="navbar-form navbar-left" action="index.php?rt=index/buscar" method="POST" role="search">
        <div class="form-group">
          <input type="text" id="busqueda" name="b" class="form-control" placeholder="Busqueda">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
	<?php
	if (! isset ( $_SESSION )) {
		session_start ();
	}
	if (! isset ( $_SESSION ["isLogin"] )) {
		$_SESSION ["isLogin"] = false;
	}	
	?>
	<?php 
	if (!$_SESSION["isLogin"]){
	?>
      <button type="button" onclick="location.href = 'index.php?rt=index/login';" class="btn btn-success navbar-btn navbar-right">Log in</button>
      <button type="button" onclick="location.href = 'index.php?rt=index/registro';" class="btn btn-primary navbar-btn navbar-right">Sign up</button>
    <?php
	 }else{ ?>
	 	<button type="button" onclick="location.href = 'index.php?rt=index/logout';" class="btn btn-success navbar-btn navbar-right">Log out</button>
	 <?php }?>  
	</div>
	</nav>
</header>

<table id="resultado" class="table table-hover"></table>
<?php  
/*** load the controller ***/
 $registry->router->loader(); 
 ?>

</div>
<!--/.footer--> 
<!-- <footer>
	<div class="footer" id="footer">
        <div class="container">
            <div class="row">
            </div>
            /.row 
        </div>
        /.container
    </div>
   /.footer
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright &copy; Footer E-shop 2014. All right reserved. </p>
        </div>
    </div>
</footer> -->

</body>
</html>