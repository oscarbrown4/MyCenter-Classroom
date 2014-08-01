var homeView = Backbone.View.extend({
	
	initialize: function  () {
		
		this.listenTo(this.collection, "add", this.render);
		this.listenTo(this.collection, "reset", this.render);
		this.listenTo(this.collection, "change:checkedIn", this.render);
	},
	
	render: function () {
		
		var classroomname = app.classrooms.findWhere({selected: true}).get('name');
		
		$(".classroom_name").text(classroomname);
		
		var numStudents = this.collection.models.length;		
		if (numStudents > 0) {
			var checkedin = this.collection.where({ checkedIn: true });
			$(".classroom_count").text(checkedin.length);
		}
		
		$("#students").html('');
		
		_.each(this.collection.models, function(model){

			var view = new studentView({model: model});
			$("#students").append(view.render().el);
			
		});
		
		if (numStudents >=26) var studentsClass = 'class26';
		else if (numStudents >=17) var studentsClass = 'class17';
		else if (numStudents >=10) var studentsClass = 'class10';
		else var studentsClass = '';
				
		makeAllStudentList();
		
		$("#students").addClass(studentsClass).append($('<div/>').addClass("clear"));
		
		return this;
		
	}

});
