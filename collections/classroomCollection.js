var classroomCollection = Backbone.Collection.extend({
	url: 'http://1000piggybacks.oscarbrown.co/api/classrooms',
	comparator: 'room',
	
	model: classroom,
	
	local: function() {
		
		if (_.isUndefined(localStorage['/api/classrooms'])) {
			console.log('fetch from server');
			return false;
		}
		console.log('fetch from local');
		return true;
	},
	
	
	initialize: function() {
		if (this.models.length == 0) {
		
		this.fetch({reset: true});
		}
	}
	
});
