var studentView = Backbone.View.extend({

	template: Handlebars.compile($("#student-template").html()),
	
	initialize: function  () {

	},
	
	events: {
		"click .student" : 'openStudent'
	},
	
	openStudent: function(){

		var profile = new profileView({model: this.model});
		$("body").append(profile.render().el);
		profile.show();
		
	},
	
	render: function () {
			
		this.$el.html(this.template(this.model));
		return this;
		
	}

});
