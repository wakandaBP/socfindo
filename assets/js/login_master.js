$().ready(function() {
	$('#btnLogin').click(function()
	{

		var username=$("#username").val();
		var password=$("#password").val();
		var dataString = 'username='+username+'&password='+password;
		
		if($.trim(username).length>0 && $.trim(password).length>0)
		{
			
			$.ajax({
				type: "POST",
				url: "cek-login",
				data: dataString,
				cache: false,
				beforeSend: function(){ $("#btnLogin").html('CONNECTING...');},
				success: function(data){
					alert(data);
					if(data)
					{
						window.location.href = "home";
					}
					else
					{
						
						$("#btnLogin").html('SIGN IN');
						$("#error").html("<div class='alert alert-warning'>Invalid username and password.</div>");
					}
					
				}
			});

		}
		return false;
	});
});