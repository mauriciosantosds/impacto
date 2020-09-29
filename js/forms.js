$(document).ready(function () {
    grecaptcha.ready(function () {
    	grecaptcha.execute('6LcvH6gUAAAAACsq6ZJTmhAQxwgx4exQRHC7p2Tj', {
    		action: 'homepage'
    	}).then(function (token) {
    		// add token to form
    		$('#newsle').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
    	});
    	grecaptcha.execute('6LcvH6gUAAAAACsq6ZJTmhAQxwgx4exQRHC7p2Tj', {
    		action: 'homepage'
    	}).then(function (token) {
    		// add token to form
    		$('#contactf').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
    	});
    	grecaptcha.execute('6LcvH6gUAAAAACsq6ZJTmhAQxwgx4exQRHC7p2Tj', {
    		action: 'homepage'
    	}).then(function (token) {
    		// add token to form
    		$('#newslfooter').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
    	});
    });
    $("#newsle").submit(function (e) {
        var formData = new FormData(this);
		$.ajax({
			url: 'principal/newsletter',
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				console.log(data);
				if (data == '200') {
					$('#newsle').trigger("reset");
                    $("#warning").html(
                        "<div class = 'alert alert-success'>"+ 
                            "Enviado com sucesso!"+ 
                        "</div>"
                    );
				}
			},
			error: function (request, status, error) {
				console.log(request + " error " + error);
			}
		});
		e.preventDefault();
    });
    
    $("#contactf").submit(function (e) {
        var formData = new FormData(this);
		$.ajax({
			url: 'principal/sendmessage',
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				console.log(data);
				if (data == '200') {
					$('#contactf').trigger("reset");
                    $("#warningc").html(
                        "<div class = 'alert alert-success'>"+ 
                            "Enviado com sucesso!"+ 
                        "</div>"
                    );
				}
			},
			error: function (request, status, error) {
				console.log(request + " error " + error);
			}
		});
		e.preventDefault();
    });
    
    $("#newslfooter").submit(function (e) {
        var formData = new FormData(this);
		$.ajax({
			url: 'principal/newsletterFooter',
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				console.log(data);
				if (data == '200') {
					$('#contactf').trigger("reset");
                    $("#warningf").html(
                        "<div class = 'alert alert-success'>"+ 
                            "Enviado com sucesso!"+ 
                        "</div>"
                    );
				}
			},
			error: function (request, status, error) {
				console.log(request + " error " + error);
			}
		});
		e.preventDefault();
	});
});