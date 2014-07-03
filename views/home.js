var homeView = Backbone.View.extend({
	
	initialize: function  () {
		this.listenTo(this.collection, "reset", this.render);
	},
		
	render: function () {
				
		if (this.collection.models.length > 0) {
			var checkedin = this.collection.where({ checkedIn: true });
			$(".classroom_count").text(checkedin.length);
		}
		
		_.each(this.collection.models, function(model){
			
			var view = new studentView({model: model});
			$("#students").append(view.render().el);
			
		});
		return this;
		
	}

});
