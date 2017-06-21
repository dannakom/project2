$(document).ready(function(data){
  $.get('views/main.php', function(data) {
		$('.body-container').html(data);
	});  
});