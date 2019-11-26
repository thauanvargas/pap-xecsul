$(document).ready(function(){
	$(".product-form").submit(function(e){
		
		var form_data = $(this).serialize();
		var button_content = $(this).find('button[type=submit]');

		button_content.html('A adicionar..'); 
		var t = setTimeout( function() {
		$.ajax({
			url: "cart_manager.php",
			type: "GET",
			dataType:"json",
			data: form_data,
			timeout: 30000
		}).success(function(data){		
			$("#cart-container").html(data.products);
			button_content.html('Adicionar');		
		})
		.fail(function(xhr, textStatus, errorThrown)  {
			alert(xhr.responseText);
		}); 
     }, 1500 );
		e.preventDefault();
	});	
	$("#cart-results").on('click', 'a.remover-item', function(e) {
		e.preventDefault(); 
		var codigo = $(this).attr("data-code"); 
		$(this).parent().parent().fadeOut();
		$.getJSON( "cart_manager.php", {"remove_code":codigo} , function(data){
			$("#cart-container").html(data.products); 	
			window.location.reload();			
		});
	});
	$("#cart-results").on('click', 'a.limpar-carrinho', function(e) {
		e.preventDefault(); 
		$(this).parent().parent().fadeOut();
		$.getJSON( "cart_manager.php", {"limpar":"sim"} , function(data){
			$("#cart-container").html(data.products); 	
			window.location.reload();			
		});
	});
    $(".Quantidade").change(function() {		
		 var classe = this;
		 setTimeout(function () { update_quantity.call(classe) }, 500);	
	});	
	function update_quantity() {
		var codigo = $(this).attr("data-code");
		var quantity = $(this).val(); 
		$.getJSON( "cart_manager.php", {"update_quantity":codigo, "quantity":quantity} , function(data){		
			window.location.reload();			
		});
	}	
});