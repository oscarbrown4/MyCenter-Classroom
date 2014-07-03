var homeView = Backbone.View.extend({

	template: Handlebars.compile($("#home-template").html()),
	
	initialize: function  () {
		this.listenTo(this.collection, "reset", this.render);
	},
		
	render: function () {
		
		if (this.collection.models.length > 0) {
			var checkedin = this.collection.where({ checkedIn: true });
			$(".classroom_count").text(checkedin.length);
		}
		
		this.$el.html(this.template(this.collection));
		return this;
		
	}

});
