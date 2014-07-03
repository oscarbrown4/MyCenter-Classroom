var AppRouter = Backbone.Router.extend({
    routes: {
        "": "homeScreen",
        "lock": "lockScreen",
        "home": "homeScreen",
        "child/:id": "childProfile"
    },
	
	initialize: function  () {
		
		this.chlds = new chldCollection();
		this.chlds.fetch({reset: true});
		
		
		this.homeView = new homeView({collection: this.chlds});
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



$(function() {
	var app = new AppRouter();
    Backbone.history.start();
});
