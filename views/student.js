var studentView = Backbone.View.extend({

	template: Handlebars.compile($("#student-template").html()),
	
	initialize: function  () {

	},
	
	events: {
		"click .child" : 'openStudent'
	},
	
	openStudent: function(){

		var profile = new profileView({model: this.model});
		profile.render().show();
		
	},
	
	render: function () {
			
		this.$el.html(this.template(this.model));
		return this;
		
	}

});
