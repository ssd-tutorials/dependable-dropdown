var formObject = {
	run : function(obj) {
		if (obj.val() === '') {
			obj.nextAll('.update').html('<option value="">----</option>').attr('disabled', true);
		} else {
			var id = obj.attr('id');
			var v = obj.val();
			jQuery.getJSON('/mod/update.php', { id : id, value : v }, function(data) {
				if (!data.error) {
					obj.next('.update').html(data.list).removeAttr('disabled');
				} else {
					obj.nextAll('.update').html('<option value="">----</option>').attr('disabled', true);
				}
			});
		}
	}
};
$(function() {
	
	$('.update').live('change', function() {
		formObject.run($(this));
	});
	
});