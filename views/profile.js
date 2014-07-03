var profileView = Backbone.View.extend({

	template: Handlebars.compile($("#student-profile-template").html()),
	
	initialize: function  () {

	},
	
	el: '#profile_around',
	
	events: {
		"click .parent" : 'checkInOut'
	},
	
	show: function() {
		
		this.$el.show();
		
	},
	
	hide: function() {
		this.$el.hide();
		
	},
	
	checkInOut: function(event){
	
		var parentID = $(event.target).closest(".parent").data("parentid");
		this.model.checkInOut(parentID);
		this.hide();
		
	},
	
	render: function () {
			
		this.$el.find("#profile").html(this.template(this.model));
		return this;
		
	}

});
