$(document).ready(function(){   
    $(".addproduto").click(function(){
		id = $("#id").val();
		qtd = $("#qtd").val();
        if (!str.length==0) {
			$.post("http://app.lab/hderpos/os/add_produto",{id:id,qtd:qtd}, function(data, status){
			$(".produto").append(data);	
			//$("#resultproduto").html(data);
			}); 
        }
    }); 
});

/* (function($) {	  
	AddTableRow = function() {	
		var newRow = $("<tr>");	    
		var cols = "";	
		cols += '<td>'+s+'</td>';	    
		cols += '<td>&nbsp;</td>';	    
		cols += '<td>&nbsp;</td>';	    
		cols += '<td>&nbsp;</td>';	    
		cols += '<td>';	    
		cols += '<button onclick="RemoveTableRow(this)" type="button">Remover</button>';	    cols += '</td>';	
		newRow.append(cols);	    
		$("#products-table").append(newRow);	
		return false;	  
	};	
})(jQuery); */
