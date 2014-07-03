var studentView = Backbone.View.extend({

	template: Handlebars.compile($("#student-template").html()),
	
	initialize: function  () {

	},
	
	events: {
		"click .child" : 'openStudent'
	},
	
	openStudent: function(){

		alert("open");	
		
	},
	
	render: function () {
			
		this.$el.html(this.template(this.model));
		return this;
		
	}

});
