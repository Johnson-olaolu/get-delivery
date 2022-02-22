$(document).ready(function () {
	let env_type = "test"

	$(".show-input-details").click(function () {
		let apiKeyInput = $("#get-delivery-api-keys")
		if(apiKeyInput.attr("type") === "password") {
			apiKeyInput.attr("type", "text") 
			$("#show-input-details-shown").css("display", "block")
			$("#show-input-details-hidden").css("display", "none")
		}else {
			apiKeyInput.attr("type", "password") 
			$("#show-input-details-shown").css("display", "none")
			$("#show-input-details-hidden").css("display", "block")
		}
	})
	$("#get-delivery-auth-header-test").click(function(){
		$(".get-delivery-auth-header-menu-active").removeClass("get-delivery-auth-header-menu-active")
		$(this).addClass("get-delivery-auth-header-menu-active")
		$("#get-delivery-test-keys-form").css("display", "block")
		$("#get-delivery-production-keys-form").css("display", "none")
		env_type = "test"
	})
	$("#get-delivery-auth-header-production").click(function(){
		$(".get-delivery-auth-header-menu-active").removeClass("get-delivery-auth-header-menu-active")
		$(this).addClass("get-delivery-auth-header-menu-active")
		$("#get-delivery-test-keys-form").css("display", "none")
		$("#get-delivery-production-keys-form").css("display", "block")
		env_type = "production"
	})

	$("#get-delivery-submit-auth-button").click(function () {
		let get_delivery_api_key = $("#get-delivery-api-keys").val()
		let get_delivery_webhook_url = $("#get-delivery-webhoook-url").val()
		
		console.log(env_type)
		
		$.ajax({
			url : wpplugin.pluginsUrl + "/get-delivery-plugin/ajax/get_delivery_auth.php", 
			data : {
				'env_type' : env_type,
				'get_delivery_api_key': get_delivery_api_key,
				'get_delivery_webhook_url' : get_delivery_webhook_url
			},
			type: 'POST',
			success : function (response) {
				console.log(response)
			},
			error: function (xhr, ajaxOptions, thrownError) {
				var httpCode = xhr.status;
				alert(httpCode + ': ' + thrownError);
			}
		})
	})
	console.log(wpplugin.pluginsUrl)
	// jQuery methods go here.
});