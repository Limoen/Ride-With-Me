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

$("#btnReact").on("click", function(e){
	
	var comment = $("#ride_message").val();
	var id = $(this).data("rid");
	

	var request = $.ajax({
  	url: "ajax/save_comment.php",
  	type: "POST",
  	data: {id : id, comment: comment},
  	dataType: "json"
});
 
request.done(function(msg) {
	if(msg.status == "success"){
	
			var comment=msg.comment;
		var name = msg.name;
		var update="<li class='description'>"+comment+"</li><li class='user'>"+name+"</li>";
		$("#ride_list ul").prepend(update);
		$("#ride_list ul li").first().hide();
$("#ride_list ul li").first().fadeIn(update);
		$("#ride_message").val("");
	
	}
	
	else {
			
	}
});
 
request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
});

e.preventDefault();
});