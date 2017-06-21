class Form {
	constructor () {
	}

	build () {
		
		var form = $('<form>').appendTo(this.popup.find('#popup_container'));
		console.log('works');
		
		this.sendAjax('form.html')
		.then(function (data) {
			var html = data[0];
			console.timeEnd('FormPopup')
			form.html(html);
		}).then(function () {
			return new Promise(function (resolve) {
				form.submit(function(e) {
					e.preventDefault();
					resolve(e);
				});
			})
		}).then(function (e) {
			var data = {
				name: $(e.target).find('input:first-child').val(), 
				password: $(e.target).find('input:nth-child(2)').val(), 
			};
			// throw new RangeError('sdfsdfsd');
			return this.sendAjax('main.php', 'POST', data);
		}.bind(this))
		.then(function (data) {
			console.log(data);
			var xhr = data[2];
			if (xhr.statusText === 'Created') {
				this.remove();
			}
		}.bind(this))
		.catch(function (err) {
			console.log(err)
		})
	}

	sendAjax(url, method, data) {
		console.log(arguments);
		method = method || 'GET';
		return new Promise(function (resolve, reject) {
			$.ajax({
				url: url,
				type: method,
				data: data,
				success: function (data, textStatus, jqXHR) {
					resolve([data, textStatus, jqXHR]);
				}, 
			})			
		})
	}
}