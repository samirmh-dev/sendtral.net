
$(function()
{
    // Validation
    $("#signup-form").validate(
        {
            // Rules for form validation
            rules:
            {
                name:
                {
                    required: true
                },
                email:
                {
                    required: true,
                    email: true
                },
                password:
                {
                    required: true,
                    atLeastOneUppercaseLetter: true,
                    atLeastOneNumber: true,
                    atLeastOneSymbol: true,
                    minlength: 6,
                    maxlength: 20
					
                },
                password_confirmation:
                {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: '#password'
                },
                fname:
                {
                    required: true
                },
                lname:
                {
                    required: true
                },
                gender:
                {
                    required: true
                }
            },

            // Messages for form validation
            messages:
            {
                login:
                {
                    required: 'Please enter your login'
                },
                email:
                {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                password:
                {
                    required: 'Please enter your password'
                },
                password_confirmation:
                {
                    required: 'Please enter your password one more time',
                    equalTo: 'Please enter the same password as above'
                },
                fname:
                {
                    required: 'Please select your first name'
                },
                lname:
                {
                    required: 'Please select your last name'
                },
                gender:
                {
                    required: 'Please select your gender'
                }
            },

            // Do not change code below
            errorPlacement: function(error, element)
            {
                error.insertAfter(element.parent());
            }
        });
		

/**
 * Custom validator for contains at least one upper-case letter.
 */
$.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
    return this.optional(element) || /[A-Z]+/.test(value);
}, "Must have at least one uppercase letter");
 
/**
 * Custom validator for contains at least one number.
 */
$.validator.addMethod("atLeastOneNumber", function (value, element) {
    return this.optional(element) || /[0-9]+/.test(value);
}, "Must have at least one number");
 
/**
 * Custom validator for contains at least one symbol.
 */
$.validator.addMethod("atLeastOneSymbol", function (value, element) {
    return this.optional(element) || /[!@#$%^&*()]+/.test(value);
}, "Must have at least one special character");
		 $("#update-form").validate(
        {
            // Rules for form validation
            rules:
            {
                
                password:
                {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                password_confirmation:
                {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: '#password'
                }
            },

            // Messages for form validation
            messages:
            {
                
                password:
                {
                    required: 'Please enter your password'
                },
                password_confirmation:
                {
                    required: 'Please enter your password one more time',
                    equalTo: 'Please enter the same password as above'
                }
            },

            // Do not change code below
            errorPlacement: function(error, element)
            {
				console.log(error);
                error.insertAfter(element.parent());
            }
        });
		$("#employee-form").validate(
        {
            // Rules for form validation
            rules:
            {
                
                email:
                {
                    required: true,
                    email: true
                },
                password:
                {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                password_confirmation:
                {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: '#txtPassword'
                }
            },

            // Messages for form validation
            messages:
            {
                
                email:
                {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                password:
                {
                    required: 'Please enter your password'
                },
                password_confirmation:
                {
                    required: 'Please enter your password one more time',
                    equalTo: 'Please enter the same password as above'
                }
            },

            // Do not change code below
            errorPlacement: function(error, element)
            {
                error.insertAfter(element.parent());
            }
        });
});
		