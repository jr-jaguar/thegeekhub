$(document).ready(function(){
	//focusBlurEvents("name","phone","email","info");
});

function focusBlurEvents() {
	for (var i=0; i<focusBlurEvents.arguments.length; i++) {
		jQuery('#'+focusBlurEvents.arguments[i]).focus(function(){
			jQuery(this).val() == this.defaultValue ? jQuery(this).val('') : '';
		});
		
		jQuery('#'+focusBlurEvents.arguments[i]).blur(function(){
			jQuery(this).val() == '' ? jQuery(this).val(this.defaultValue) : '';
		});
	}
}