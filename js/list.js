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
		createItem(item).appendTo(Listcontainer);
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
		createItem(item).appendTo(Listcontainer);
	});
}
function createItem(item) {
	var li = $('<li>', {
		class: "list-item", 
		//click: addCourse, 
		"data-id": item.id
	});

	var poster = $('<img>', {src: 'img/'+item.image});
	poster.appendTo(li);

	var text = $('<span>', {text: item.name});
	text.appendTo(li);


	return li;
}
 function addStudent(){
    var form = $('<form>').appendTo('#main_container');
  
    
 }
  function initContainer(){
     ajax('getCoursesNumber').then(function (data) {
//     console.log(data);
     initCoursesNumber(JSON.parse(data));    
    });
    
     ajax('getStudentsNumber').then(function (data) {
//     console.log(data);
     initStudentsNumber(JSON.parse(data));    
    });
        
 }
 
 
 
 function initCoursesNumber(numbers){
     console.log(numbers);
      $('#main_container').append($('<h1>', {text: "Courses :"+numbers}));
     
 }

 
 function initStudentsNumber(numbers){
     console.log(numbers);
      $('#main_container').append($('<h1>', {text: "Students :"+numbers}));
     
 }