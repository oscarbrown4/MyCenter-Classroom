$("#login_form").on('submit', function(){

	if (!$("#login_button").hasClass("sending1")) {
		$("#login_button").html('<i class="fa fa-circle-o-notch fa-spin"></i>').addClass("sending");
		$(".login_input").prop('disabled', true);
		$.ajax({
			url:'http://classroom.mycenter.co/classroomapp/login',
			type: 'POST',
			data: {
				email: $("#email").val(),
				pass: $("#pass").val()
			},
			complete: function(jqXHR, status) {
				if (status != 'success') {
					$(".login_input").prop('disabled', false);
					$("#login_button").html('Login').removeClass("sending");
					alert("You must be online to login the first time.");
				}
				else {
					resp = jqXHR.responseJSON;
					if (typeof resp.success == 'undefined') {
						alert("Something went wrong.  Try closing the app and re-opening it.  If the problem persists, please email help@childrenslighthouse.com");
					}
					else {
						if (resp.success) {
							localStorage.setItem("logincode", resp.logincode);
							localStorage.setItem("locID", resp.locID);
							localStorage.setItem("userinfo", JSON.stringify(resp.userinfo));
							$.cookie('logincode', resp.logincode, {expires:30, path:'/'});
							app.navigate('classrooms', {trigger:true})
							
						}
						else {
							$(".login_input").prop('disabled', false);
							$("#login_button").html('Login').removeClass("sending");
							if (typeof resp.message == 'undefined') alert("Oops!  Something went wrong.  Please try again.");
							else alert(resp.message);
						}
					}
				}
			} 
		});
	}
	
	
	return false;
});