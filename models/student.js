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

	    this.set('checkInParentID', parentID);
	    this.set('checkedIn', !this.get('checkedIn'));
	    this.save();
	    
    }

});
