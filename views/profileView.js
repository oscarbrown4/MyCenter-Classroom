var profileView = Backbone.View.extend({

	template: Handlebars.compile($("#student-profile-template").html()),
	
	initialize: function  () {

	},
	
	tagName: "div",
	className: "profile_around show",
	
	events: {
		"click .parent" : 'checkInOut',
		"click .close_button" : 'hide'
		
	},
	
	show: function() {
		$("body").redraw();
		this.$el.addClass("on");
	},
	
	
	
	hide: function() {
	
		var view = this;

	    this.$el.removeClass('on');
	    this.$el.one('transitionend', this.removeIt);

	},
	
	removeIt: function() {
		this.remove();
	},
	
	checkInOut: function(event){
	
		var parentID = $(event.target).closest(".parent").data("parentid");
		this.model.checkInOut(parentID);
		this.hide();
		
	},
	
	render: function () {
			
		this.$el.html(this.template(this.model.attributes));
		return this;
		
	}

});
