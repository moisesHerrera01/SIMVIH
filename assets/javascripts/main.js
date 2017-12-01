$(document).ready(function () {
    
    $('.ui.dropdown').dropdown();
    
    $('.ui.accordion').accordion();

    $('.ui.checkbox').checkbox();

    $('.ui.radio.checkbox').checkbox();

    $('.message .close')
  	.on('click', function() {
    	$(this)
      		.closest('.message')
      		.transition('fade')
    		;
  		})
	;

});
