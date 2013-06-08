$("#username").on("keyup", function(){
	var username = $("#username").val();
	$(".usernameFeedback").fadeIn();


	if(username == "")
	{
		$(".usernameFeedback").fadeOut();
		return false;
	}
	
	// AJAX CALL
	var request = $.ajax({
		url: "ajax/check_username.php",
		type: "POST",
		data: {username : username},
		dataType: "json"
	});
	request.done(function(msg) {
	
		$(".usernameFeedback span").removeClass("ok notok");
		if(msg.status == "success")
		{
			$(".usernameFeedback span").text(msg.message).addClass("ok");
		}
		if(msg.status == "error")
		{
			$(".usernameFeedback span").text(msg.message).addClass("notok");
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert("Request failed: " + textStatus);
	});
	
e.preventDefault();
});