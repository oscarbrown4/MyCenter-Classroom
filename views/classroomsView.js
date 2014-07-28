var classroomsView = Backbone.View.extend({

	template: Handlebars.compile($("#classrooms-template").html()),
	
	initialize: function  () {
		getAllStudents();
		this.listenTo(this.collection, "reset", this.show);
	},
	
	tagName: "div",
	className: "classrooms_around",
	
	canrender: false,
	
	events: {
		"click .classroom_selector" : 'selectClassroom'
	},
	
	show: function() {
		if (this.canrender && this.collection.models.length > 0) {
		$('#login_around').append(this.render().el);

		
		$("#login").one('transitionend', function(){ $(this).remove(); }).addClass("off");
		$("body").redraw();
		this.$el.addClass("on");
		}
	},
	
	
	
	hide: function() {
	
		var view = this;
		this.$el.one('transitionend', this.removeIt);
	    this.$el.addClass('off');
	    

	},
	
	removeIt: function() {
		setTimeout(function(){
		$("#login_around").remove();
		this.remove();
		},300);
	},
	
	selectClassroom: function(event){
	
		var roomID = $(event.target).closest(".classroom_selector").data("roomid");
		this.collection.get(roomID).set('selected',true).save({local: true});
		window.location = '#';
		this.hide();
		
	},
	
	render: function () {
			this.$el.html(this.template(this.collection));
			return this;
	}

});
