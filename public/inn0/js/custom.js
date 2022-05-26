var token = "e3a3f044294bfb454d0b462a79d90f35da6de43d";
function showSuggestion(suggestion) {
	$.ajax({   
		type:'post',
		url: "request.php",
		data: {check:true, inn_ogrn:suggestion.data.inn},   
		cache: false,
		success: function(data){
			var resp = JSON.parse(data);
			$('.print_response').html(resp.response);
		}
	});
}

$("#party").suggestions({
	token: token,
	type: "PARTY",
	count: 5,
	minChars: 5,
	onSelect: showSuggestion
});