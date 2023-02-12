/**
 * File : addCustomer.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Rajesh Gupta
 */

$(document).ready(function(){
	
	var addServerForm = $("#addServer");
	
	var validator = addServerForm.validate({
		
		rules:{
			sname :{ required : true },
			ipaddress :{ required : true },
			type: {required : true}
		},
		messages:{
			sname :{ required : "This field is required" },
			ipaddress :{ required : "This field is required" },
			type :{ required : "This field is required" }	
		}
	});
});
