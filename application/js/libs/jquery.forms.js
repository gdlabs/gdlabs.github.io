/********************************************/
/*	jquery.forms.js
/*	author: davide reppucci
/*	author uri: http://www.gdlabs.it
/*******************************************/

block = false;

var Forms = {
	init : function() {
		Forms.CLASS_REQUIRED_FIELD = 'requiredError';
		Forms.CLASS_REQUIRED_CHECK = 'checkError';
		Forms.CLASS_EMAIL_ERROR = 'emailError';
		Forms.CLASS_NUMBER_ERROR = 'numberError';

		Forms.emailFilter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		Forms.numberRegex = /^([+\_\.\/\s\-\d])+$/;

		Forms.addRequired();
	},	
	addRequired : function() {
		Forms.checkForms = jQuery('#contact-form');
		Forms.checkForms.submit(Forms.check);
		jQuery('#contact-form input, #contact-form textarea').each( function(i) { $(this).keyup(Forms.check); });
		jQuery('#contact-form select, #contact-form input[type=checkbox]').each( function(i) { $(this).change(Forms.check); });
	},
	check : function( event ) {

		var fieldsRequired = jQuery('.required','#contact-form');
		var fieldsEmail = jQuery('.email','#contact-form');
		var fieldsNumber = jQuery('.number','#contact-form');

		var alertRequired = jQuery('.'+Forms.CLASS_REQUIRED_FIELD,'#contact-form');
		var alertCheck = jQuery('.'+Forms.CLASS_REQUIRED_CHECK,'#contact-form');
		var alertEmail = jQuery('.'+Forms.CLASS_EMAIL_ERROR,'#contact-form');
		var alertNumber = jQuery('.'+Forms.CLASS_NUMBER_ERROR,'#contact-form');
		
		var required = new Array();
		var emails = new Array();
		var numbers = new Array();

		for ( var i = 0 ; i < alertRequired.length ; i++ ) { jQuery(alertRequired[i]).removeClass(Forms.CLASS_REQUIRED_FIELD); }
		for ( var j = 0 ; j < alertCheck.length ; j++ ) { jQuery(alertCheck[j]).removeClass(Forms.CLASS_REQUIRED_CHECK); }
		for ( var k = 0 ; k < alertEmail.length ; k++ ) { jQuery(alertEmail[k]).removeClass(Forms.CLASS_EMAIL_ERROR); }
		for ( var x = 0 ; x < alertNumber.length ; x++ ) { jQuery(alertNumber[x]).removeClass(Forms.CLASS_NUMBER_ERROR); }
		
		/* REQUIRED */
		for ( var src = 0 ; src < fieldsRequired.length ; src ++ ) {
			switch ( fieldsRequired[src].type ) {
				case "text":
				case "email":
				case "phone":
				case "number":
				case "textarea":
				case "password":
				case "hidden":
				case "file":
				case "select":
				case "select-one":
		
					if ( fieldsRequired[src].value == "" ) { jQuery(fieldsRequired[src]).closest('p').addClass('requiredError'); required.push( fieldsRequired[src] ); }

					break;
				
				case "radio":
				case "checkbox":
									
					if ( fieldsRequired[src].checked != true) { jQuery(fieldsRequired[src]).closest('p').addClass('checkError'); required.push( fieldsRequired[src] ); }
					
					break;
			}
		
		}
		
		/* EMAIL */
		for ( var src = 0 ; src < fieldsEmail.length ; src ++ ) { if ( fieldsEmail[src].value != 0 && !Forms.emailFilter.test(fieldsEmail[src].value) ) { jQuery(fieldsEmail[src]).closest('p').addClass('emailError'); emails.push(fieldsEmail[src]); } }
		
		/* NUMBER */
		for ( var src = 0 ; src < fieldsNumber.length ; src ++ ) { if ( fieldsNumber[src].value != 0 && !Forms.numberRegex.test(fieldsNumber[src].value) ) { jQuery(fieldsNumber[src]).closest('p').addClass('numberError'); numbers.push(fieldsNumber[src]); } }

		block = required.length == 0 && emails.length == 0 && numbers.length == 0 ? false : true;
		return required.length == 0 && emails.length == 0 && numbers.length == 0 ? true : false;
	}
};