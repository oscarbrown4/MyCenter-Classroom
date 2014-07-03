var student = Backbone.Model.extend({
	urlRoot: '/api/student',
    defaults: {
        fname: '',
        lname: '',
        photoURL: 'images/no-student-image.jpg',
        checkedIn: false,
    },
    
    

});
