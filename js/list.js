/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




function initSchoolPage() {	
        $('#lists_container').empty();
        $('#main_container').empty();
        
	initListCourses();
        initListStudents();
        initContainer();
}

function initListCourses() {	
	
	ajax('getCoursesJason').then(function (data) {
        //console.log("data"+data);
        buildListCourses(JSON.parse(data));
	})
}

function initListStudents() {	

	ajax('getStudentJason').then(function (data) {
        buildListStudents(JSON.parse(data));    
	});
}

function buildListCourses(courseList) {
   
    $('#lists_container').append($('<div>', {id: "coursesList"}));
    $('#coursesList').append($('<span>', {text: "Courses"}));
    
    	var add = $('<button>', {
		class: "add-btn", 
		text: "+", 
//		click: removeItem, 
	}).appendTo(coursesList);

	var Listcontainer = $('#coursesList').append(
		$('<ul>', {class: "list_container"})
	).find(".list_container");
	courseList.forEach(function (item) {
		createCourse(item).appendTo(Listcontainer);
	});
}
function buildListStudents(studentList) {
	
    $('#lists_container').append($('<div>', {id: "listStudent"}));
    
    $('#listStudent').append($('<span>', {text: "Students"}));
    var add = $('<button>', {
		class: "add-btn", 
		text: "+", 
		//click: addStudent, 
	}).appendTo(listStudent);
        
	var Listcontainer = $('#listStudent').append(
		$('<ul>', {class: "list_container"})
	).find(".list_container");
	studentList.forEach(function (item) {
		createStudent(item).appendTo(Listcontainer);
	});
}
function createCourse(item) {
	var li = $('<li>', {
		class: "list-item", 
		click:showCourse, 
		"data-id": item.id
	});

	var poster = $('<img>',{
            src: 'img/'+item.image,
            click:showCourse,
        });
        
	poster.appendTo(li);

	var text = $('<span>', {text: item.name});
	text.appendTo(li);


	return li;
    }
    
    function createStudent(item) {
	var li = $('<li>', {
		class: "list-item", 
		click: function (e) {
			showStudent(e)}, 
		"data-id": item.id
	});

	var poster = $('<img>',{
            src: 'img/'+item.image,
        });
        
	poster.appendTo(li);

	var text = $('<span>', {text: item.name});
	text.appendTo(li);
	return li;
    }
    function showStudent(e){ 
        $('#main_container').empty();        
        
        var student = new StudentForm();
            student.showStudent(e); 
 
    }
    
        function showCourse(){ 
        $('#main_container').empty();
        
        
                   // var course = new CurseForm(item.id);
           // course.build();
        
    }
    
    function initContainer(){
        ajax('getCoursesNumber').then(function (data) {
        initCoursesNumber(JSON.parse(data));    
    });
    
    ajax('getStudentsNumber').then(function (data) {
        initStudentsNumber(JSON.parse(data));    
    });   
 }
  
 function initCoursesNumber(numbers){
   //  console.log(numbers);
      $('#main_container').append($('<h1>', {text: "Courses :"+numbers}));
     
 }

 
 function initStudentsNumber(numbers){
   //  console.log(numbers);
      $('#main_container').append($('<h1>', {text: "Students :"+numbers}));
     
 }