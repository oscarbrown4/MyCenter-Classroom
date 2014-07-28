var AppRouter = Backbone.Router.extend({
    routes: {
        "": "determineRoute",
        "classrooms": "showClassrooms",
        "lock": "lockScreen",
        "home": "homeScreen",
        "child/:id": "childProfile"
    },
	
	initialize: function () {
		this.students = new studentsCollection();
		
		
		/*
		
		this.students.syncDirtyAndDestroyed();
		this.students.fetch({reset: true});
		this.homeView = new homeView({collection: this.students});
		*/

	},
	determineRoute: function() {

		if (_.isUndefined(localStorage["logincode"])) {
			//show login page
		}
		else {
			$("#login_around").remove();

			if (_.isUndefined(this.classrooms)) this.classrooms = new classroomCollection();
			
			if (this.students.models.length == 0) {
								
				this.students.classroomID = this.classrooms.findWhere({selected: true}).get('id');
				//this.students.syncDirtyAndDestroyed();
				this.students.fetch({reset: true});
				
			}
			
			this.homeView = new homeView({collection: this.students});
			
		}
		
	},
	
    lockScreen: function () {


    },
	showClassrooms: function() {
		
		if (typeof this.classrooms == 'undefined') this.classrooms = new classroomCollection();
		if (typeof this.classroomsView == 'undefined') this.classroomsView = new classroomsView({collection: this.classrooms});
		this.classroomsView.canrender = true;
		this.classroomsView.show();
		
	},
	
    homeScreen: function () {
        //$('#students').html(this.homeView.render().el);
    },

    childProfile: function (id) {
        alert("child " + id);
    }
});

var app;

function syncAll() {
	if (typeof app.students !== 'undefined') app.students.syncDirtyAndDestroyed();
	setTimeout(syncAll, 60*1000);
}

$(function() {
	
	Backbone.DualStorage.offlineStatusCodes = [408,404,403,500];
	app = new AppRouter();
	Backbone.history.start();
    setTimeout(syncAll, 60*1000);
    
});
