$(document).ready(function(){   
    $("#ean").keyup(function(){
		str = $("#ean").val();
        if (str.length==0) {
            $("#search-result").html("");
            $("#search-result").css("border","0px");
        } else {
			$.get("http://app.lab/hderpos/os/pesquisar_eanp",{eanp:str}, function(data, status){
				$("#search-result").css("border","1px solid #A5ACB2");
            	$("#search-result").html(data);
			}); 
        }
	}); 
	$("#descp").keyup(function(){
		str = $("#descp").val();
        if (str.length==0) {
            $("#search-result").html("");
            $("#search-result").css("border","0px");
        } else {
			$.get("http://app.lab/hderpos/os/pesquisar_descp",{descp:str}, function(data, status){
				$("#search-result").css("border","1px solid #A5ACB2");
            	$("#search-result").html(data);
			}); 
        }
    }); 
});

function idProduto(id) {
    $("#id").val(id);
    $("#search-result").html("");
    $("#search-result").css("border","0px");
}
