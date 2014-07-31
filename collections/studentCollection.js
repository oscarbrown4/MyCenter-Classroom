var studentsCollection = Backbone.Collection.extend({
	
	comparator: function (a, b) {
		if(a.get('checkedIn') < b.get('checkedIn')) {
			return 1;
		}
		else if (a.get('checkedIn') == b.get('checkedIn')) {
			if(a.get('fname') > b.get('fname')) {
				return 1;
				}
			else if(a.get('fname') == b.get('fname')) {
				if(a.get('lname') > b.get('lname')) {
					return 1;
				}
				else if(a.get('lname') < b.get('lname')) {
					return -1;
				}
			}
			else if(a.get('fname') < b.get('fname')) {
				return -1;
			}
		}
		else if (a.get('checkedIn') > b.get('checkedIn')) {
			return -1;
		}
	},
	
	model: student,
		
	classroomID: 0,
	
	url: function(){
		return 'http://1000piggybacks.oscarbrown.co/api/students/' + this.classroomID;
		},
		
	initialize: function(){
				
		this.listenTo(this, "change:checkedIn", this.sort);

	}
});
