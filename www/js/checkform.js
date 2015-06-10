function sendform(){ //Ajax отправка формы
	var msg = $(".form").serialize();
	$.ajax({
		type:"POST",
		url:"./updateDB.php",
		data:msg,
		success: function (data){
			$("#users").html(data);
		},
		error: function (xhr,str){
			alert("Error!");
		}
	});
}

jQuery.fn.notExists=function(){ //проверка на существование элемента
	return $(this).length==0;
}
$(document).ready(function(){
	$("#submit").validation(
		$("#name").validate({
			test: "blank letters",
			invalid: function(){
				if($(this).nextAll(".error").notExists()){
					$(this).after('<div class="error">Enter correct name</div>');
					$(this).nextAll(".error").delay(2000).fadeOut("slow");
					setTimeout(function(){
						$("#name").next(".error").remove();
					},2600);
				}
			},
			valid: function(){
				$(this).nextAll(".error").remove();
			}
		}),
		$("#address").validate({
			test: "blank",
			invalid: function(){
				if($(this).nextAll(".error").notExists()){
					$(this).after('<div class="error">Enter correct address</div>');
					$(this).nextAll(".error").delay(2000).fadeOut('slow');
					setTimeout(function(){
						$("#address").next(".error").remove();
					}, 2600);
				}
			},
			valid: function(){
				$(this).nextAll(".error").remove();
			}
		})
	);
	
});