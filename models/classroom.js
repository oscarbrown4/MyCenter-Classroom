var classroom = Backbone.Model.extend({
	url: 'http://classroom.mycenter.co/classroomapp/classroom',
	
	local: true,
	
    defaults: {
        name: '',
        room: null
       }
});
