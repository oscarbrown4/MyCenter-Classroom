var student = Backbone.Model.extend({
	urlRoot: '/api/student',
    defaults: {
        fname: '',
        lname: '',
        allergies: false,
        parents:[],
        picture: false,
        checkedIn: false,
    },
    
    
    checkInOut: function(parentID) {
		
		if (_.isUndefined(this.get('actions'))) var actions = new Array();
		else var actions = this.get('actions');
		
		var whatHappened = (this.get('checkedIn')) ? 'check out' : 'check in';
		
		var newAction = {
			roomID: app.students.classroomID,
			parentID: parentID,
			action: whatHappened,
			time: (new Date).getTime()
		};
		
		actions.push(newAction);
		
		this.set('actions', actions)
	    this.set('checkInParentID', parentID);
	    this.set('checkedIn', !this.get('checkedIn'));
	    this.save();
	    
    }

});
