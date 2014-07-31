$.fn.redraw = function(){
  $(this).each(function(){
    var redraw = this.offsetHeight;
  });
};


function logout() {
	
	localStorage.clear();
	location.reload();
	
	
}


function getAllStudents() {
	
	
	$.ajax({
		url:'http://1000piggybacks.oscarbrown.co/api/getAllStudents',
		type: 'POST',
		data: {},
		success:function(resp){
			//if (typeof resp === 'object') console.log(JSON.stringify(resp));
			//else console.log(resp);

			localStorage['allStudents']=JSON.stringify(resp);
										
		}
	});
	
}



function makeAllStudentList() {
	
	var students = $.parseJSON(localStorage['allStudents']);
	
	var selectList = '<div class="add_student"><i class="fa fa-plus"></i><select class="allStudentsList"><option value="0" selected disabled>Select a Child</option>';
	_.each(students, function(student){
		
		selectList += '<option value="'+student.id+'">' + student.fname + ' ' + student.lname + '</option>';
		
	});
	
	selectList += '</select></div>';
		
	$("#students").append(selectList);
	
}

$(document).ready(function(){
	
	 $("body").on('change', '.allStudentsList', function() {
		
		var childid = $(this).val()*1;
		
		if (_.isUndefined(app.students.findWhere({id:childid}))) {
			addNewStudent(childid);
		}
		else {
			$(".student[data-id='"+childid+"']").trigger('click');
		}
		
		$(this).val(0);
	});
	
	/* $("body").on('click', '.add_student', function() {
	 	$('.allStudentsList').trigger('click');
	 });*/
	
});

function addNewStudent(childID) {
	
	$.ajax({
		url:'http://1000piggybacks.oscarbrown.co/api/addNewStudent',
		type: 'POST',
		data: {
			childID: childID
		},
		success:function(resp){
			//if (typeof resp === 'object') console.log(JSON.stringify(resp));
			//else console.log(resp);

			var newStudent = new student({
				id: resp.id,
				fname: resp.fname,
				lname: resp.lname,
				allergies: resp.allergies,
				parents: resp.parents,
				picture: resp.picture,
				checkedIn: resp.checkedIn,
			});

			app.students.add(newStudent);
										
		}
	});
	
	
}





