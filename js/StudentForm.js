class StudentForm {
    
        constructor (){}

        showStudent(e){
            $('#main_container').empty();
            var id = e.currentTarget.dataset.id;
            console.log(id);
            var data="func=showStudent&id="+id;
            this.sendAjax("lib/api.php",'POST',data).then(function(item) {
            this.buildItemDetailss(JSON.parse(item));
            }.bind(this));
        }

        buildItemDetailss(item){
            var header =$('<div>',{class:"show_header"});
            $('<span>', {text: 'Student'}).appendTo(header);
            console.log(item.id);
           
            var edit_btn = $('<button>', {
                id: "edit", 
                text: "Edit", 
                //click:function(){this.build}.bind(this) 
            }).appendTo(header); 
            
            edit_btn.click({param1: item.id}, this.build.bind(this));
            $('<hr>').appendTo(header);
            var container = $('#main_container');
            header.appendTo(container); 
            var poster = $('<img>', {src: "img/"+item.image});
            poster.appendTo(container);
            var name = $('<span>', {text: item.name});
            name.appendTo(container);
            var phone = $('<span>', {text: item.phone});
            phone.appendTo(container);
            var email = $('<span>', {text: item.email});
            email.appendTo(container);
            var course = $('<img>', {src: "img/scream canister.jpg"});
            console.log("img/"+item.course+".jpg");
            course.appendTo(container);
        }
        
     
        
        build(event){
            console.log(this);
            console.log(event.data.param1);
            $('#main_container').empty();
            var form = $('<form>').appendTo('#main_container');
            this.sendAjax('views/form.php?id='+event.data.param1,'GET')
                .then(function (data){
                    var html = data;
                    console.log('FormPopup');
                    form.html(html);
            }.bind(this))
                            
		.then(function () {
			return new Promise(function (resolve) {
				form.submit(function(e) {
					e.preventDefault();
					resolve(e);
				});
			})
		}).then(function (e) {
			var dataObj = {
				name: $(e.target).find('input:nth-child(2)').val(), 
				phone: $(e.target).find('input:nth-child(3)').val(),
                                email: $(e.target).find('input:nth-child(4)').val(),
                               
			};
//			// throw new RangeError('sdfsdfsd');
        console.log(dataObj.name);
                        var data="func=update&id="+event.data.param1+"&dataObj="+dataObj;
			return this.sendAjax("lib/api.php",'POST',data);
		}.bind(this));
//		.then(function (data) {
//			console.log(data);
//			var xhr = data[2];
//			if (xhr.statusText === 'Created') {
//				this.remove();
//			}
//		}.bind(this))
//		.catch(function (err) {
//			console.log(err)
//		})
//	}
//
        }
        sendAjax(url, method, data) {
            console.log(arguments);
            method = method || 'POST';
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: function (data) {
                         console.log(data);
                        resolve(data);
                    }, 
                })			
            })
	}
        
        
}