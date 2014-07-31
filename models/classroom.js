var classroom = Backbone.Model.extend({
	url: 'http://1000piggybacks.oscarbrown.co/api/classroom',
	
	local: true,
	
    defaults: {
        name: '',
        room: null
       }
});
