var chld = Backbone.Model.extend({
	urlRoot: '/api/chld',
    defaults: {
        fname: '',
        lname: '',
        photoURL: 'images/no-child-image.jpg',
        checkedIn: false,
    }

});
