var classroom = Backbone.Model.extend({
	url: '/api/classroom',
	
	local: true,
	
    defaults: {
        name: '',
        room: null
       }
});
