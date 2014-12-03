var data = {"total":0,"rows":[]};
var totalCost = 0;

$(function(){

	$('#cartcontent').datagrid({
		singleSelect:true
	});
	$('.thumbnail-drop').draggable({
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
			var price = $(source).find('p:eq(0)').html();
			var name = $(source).find('p:eq(1)').html();
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

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
    } else {
        $('#sticky').removeClass('stick');
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});


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

