var classroomCollection = Backbone.Collection.extend({
	url: 'http://classroom.mycenter.co/classroomapp/classrooms',
	comparator: 'room',
	
	model: classroom,
	
	local: function() {
				
		if (_.isUndefined(localStorage['http://classroom.mycenter.co/classroomapp/classrooms']) || _.isNull(localStorage['http://classroom.mycenter.co/classroomapp/classrooms'])) {
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
