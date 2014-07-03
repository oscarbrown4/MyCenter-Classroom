var homeView = Backbone.View.extend({
	
	initialize: function  () {
		this.listenTo(this.collection, "reset", this.render);
		this.listenTo(this.collection, "change:checkedIn", this.render);
	},
	
	updateCheckIn: function(){
		
		alert("checkin change");
		
	},
	
	render: function () {
				
		if (this.collection.models.length > 0) {
			var checkedin = this.collection.where({ checkedIn: true });
			$(".classroom_count").text(checkedin.length);
		}
		
		$("#students").html('');
		
		_.each(this.collection.models, function(model){
			console.log(model.attributes);
			var view = new studentView({model: model});
			$("#students").append(view.render().el);
			
		});
		return this;
		
	}

});
