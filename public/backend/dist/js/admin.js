$("div.alert").delay(3000).slideUp();

function confirm_delete (msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
}

// $('#deleteCategory').click(function(event) {
// 	if(confirm('Are you sure you want to delete this category?')){
// 		return true;
// 	}
// 	return false;
// });