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

	<title>Prueba Tecnologo</title>
	<style>
	code{
		background: #54ef45;
		display: block;
		border-radius: 6px;
		padding: 24px 15px;
	    text-align: center;
	}

	header,
	section,
	aside,
	footer{
		margin: 0.5% 1.5% 1.5% 1.5%;
	}
	
	aside{
		 float: right;
		 width: 40%;
	}

	section{
		 float: left; 
		 width: 25%;
	}

	footer{
		  clear: both; 
	}

	fieldset{
		margin: 0;
		border: 0;
		padding: 20px;
	}

	fieldset label{
		padding: 5px;
		display: block;
	}

	
	label{
		 font-weight: bold;
	}

	input{
		border-radius: 5px;
	}

	</style>


	<script type="text/javascript">
/*	
	procesarDatosUsuario = function (data) {        
    	if (!data.huboError){
	    	$.each(data.datos, function() { 
	    		console.log(this);
	    		$('#listadeusuarios').append('<li>' + this.nombre + ' - ' + this.city + '</li>');
	    	});    		
    	}else{
    		alert('Error al obtener datos:'+data.huboError);
    	}
    }


    procesarLocalidades = function (data) {        
    	if (!data.huboError){
	    	$.each(data.datos, function() { 
	    		console.log(this);
	    		$('#listadeusuarios').append('<li>' + this.nombre + '</li>');
	    	});    		
    	}else{
    		alert('Error al obtener datos:'+data.huboError);
    	}
    }

	$(document).ready(function() {
		
		console.log(dataService);

		$('#enviarPorAjax').on('click', function () {      
            dataService.getDatosUsuario($('#form1').serialize(), procesarDatosUsuario);
		});  

		$('#enviarPorAjax2').on('click', function () {      
            dataService.getLocalidades($('#form1').serialize(), 
            	procesarLocalidades);
		});  

	});

*/



	</script>



	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
	<style type="text/css">
		.products{
			list-style:none;
			margin-right:300px;
			padding:0px;
			height:100%;
		}
		.products li{
			display:inline;
			float:left;
			margin:10px;
		}
		.item{
			display:block;
			text-decoration:none;
		}
		.item img{
			border:1px solid #333;
		}
		.item p{
			margin:0;
			font-weight:bold;
			text-align:center;
			color:#c3c3c3;
		}
		.cart{
			position:fixed;
			right:0;
			top:0;
			width:300px;
			height:100%;
			background:#ccc;
			padding:0px 10px;
		}
		h1{
			text-align:center;
			color:#555;
		}
		h2{
			position:absolute;
			font-size:16px;
			left:10px;
			bottom:20px;
			color:#555;
		}
		.total{
			margin:0;
			text-align:right;
			padding-right:20px;
		}
	</style>
	<script>
		var data = {"total":0,"rows":[]};
		var totalCost = 0;
		
		$(function(){

			$('#cartcontent').datagrid({
				singleSelect:true
			});
			$('.item').draggable({
				revert:true,
				proxy:'clone',
				onStartDrag:function(){
					$(this).draggable('options').cursor = 'not-allowed';
					$(this).draggable('proxy').css('z-index',10);
				},
				onStopDrag:function(){
					$(this).draggable('options').cursor='move';
				}
			});
			$('.cart').droppable({
				onDragEnter:function(e,source){
					$(source).draggable('options').cursor='auto';
				},
				onDragLeave:function(e,source){
					$(source).draggable('options').cursor='not-allowed';
				},
				onDrop:function(e,source){
					var name = $(source).find('p:eq(0)').html();
					var price = $(source).find('p:eq(1) span').html();
					console.log('Arrastraste name:'+name+ ' con price:'+price);
					addProduct(name, parseFloat(price));
				}
			});

			$('div.cart').click(function(event) {
				/* Act on the event */
				guardarPedido(data.rows);
			});


		});
		
		function addProduct(name,price){
			function add(){
				for(var i=0; i<data.total; i++){
					var row = data.rows[i];
					if (row.name == name){
						row.quantity += 1;
						return;
					}
				}
				data.total += 1;
				data.rows.push({
					name:name,
					quantity:1,
					price:price
				});
			}
			add();
			totalCost += price;
			$('#cartcontent').datagrid('loadData', data);
			$('div.cart .total').html('Total: $'+totalCost);

			console.log(data);
		}



		function guardarPedido(items)
		{
		    $.ajax({
		            type: "POST",
		            url: "index.php?rt=product/guardarPedido",
		            data: 'items='+JSON.stringify(items),
		            success: function(msg){
		                console.log(msg);
		            }
			});
		}
		

	</script>






</head>
<body>

<header><code>header</code></header>

<section>

</section>
<section>
<?php  
/*** load the controller ***/
 $registry->router->loader(); 
 ?>
</section>
<aside>Aside <ul id="listadeusuarios"></ul></aside>
<footer><code>footer</code></footer>

</body>
</html>