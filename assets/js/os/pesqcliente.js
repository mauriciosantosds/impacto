$(document).ready(function(){   
    $("#cli").keyup(function(){
		str = $("#cli").val();
        if (str.length==0) {
            $("#livesearch").html("");
            $("#livesearch").css("border","0px");
        } else {
			$.post("http://app.lab/hderpos/os/pesquisarcli",{clien:str}, function(data, status){
				$("#livesearch").css("border","1px solid #A5ACB2");
            	$("#livesearch").html(data);
			}); 
        }
    }); 
});

function idCliente(id) {
    $("#idcli").val(id);
    $("#livesearch").html("");
    $("#livesearch").css("border","0px");
}
