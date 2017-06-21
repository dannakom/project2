/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showItem(e) {
	$('#content_container').empty();
	var id = e.currentTarget.dataset.id;
	console.log(id);
	ajax('api/book/'+id).then(function (item) {
		buildItemDetails(item);
	})
}

function buildItemDetails(item) {
	$('h1').text('Book: ' + item.name);
	var container = $('#content_container');

	var poster = $('<img>', {src: item.poster});
	poster.appendTo(container);

	var author = $('<p>', {text: item.author_name});
	author.appendTo(container);

	var description = $('<p>', {text: item.description});
	description.appendTo(container);

	var back = $('<button>', {
		id: "back", 
		text: "←", 
		click: initList, 
	}).appendTo(container);
}

function removeItem (e) {
	e.stopPropagation();
	const li = $(e.target).parent('.list-item');
	const id = li.attr('data-id');
	
	ajax('api/book/' + id, 'DELETE')
		.then(function (data, textStatus) {
			console.log(textStatus);
			if (textStatus === 'OK') {
				li.remove();
			}
		})
}



