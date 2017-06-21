
function ajax( data) {
    
	method = "POST";
	data   = data   || null;
        console.log("data1"+data);
	return new Promise(function (resolve) {
		$.ajax({
			type: method,
			url: "lib/api.php",
			data: "func="+data,
			success: function (response) {
				//console.log("response from success    "+response);
				resolve(response);
			}
		});
	})
}

initSchoolPage();

