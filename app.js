var AppRouter = Backbone.Router.extend({
    routes: {
        "": "homeScreen",
        "lock": "lockScreen",
        "home": "homeScreen",
        "child/:id": "childProfile"
    },
	
	initialize: function  () {
		
		this.students = new studentsCollection();
		this.students.fetch({reset: true});
		
		
		this.homeView = new homeView({collection: this.students});
	},
	
    lockScreen: function () {


    },

    homeScreen: function () {
        $('#students').html(this.homeView.render().el);
    },

    childProfile: function (id) {
        alert("child " + id);
    }
});

var app;

$(function() {
	app = new AppRouter();
    Backbone.history.start();
});
