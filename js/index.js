/* global $ , alert , console */

$(function () {
    
    'use strict';
    // variables ==> with them will sure if user write the right informations at input fields
    var userError = true,
        emailError = true;

    
    // For user name input
    $('.username').blur(function () {
        
        if ($(this).val().length < 4) { // Still there is errors will do this
            
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.custom-alert').fadeIn(300);
            $(this).parent().find('.asterisk').fadeIn(100);
            userError = true;
        } else { // now no errors so this will be done
            
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisk').fadeOut(100);
            userError = false; // change value of var to know function under that inforation is valid
        }
        
    });
    
    // For Email input
    
    $('.email').blur(function () {
        
        if ($(this).val() === '') {
            
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.custom-alert').fadeIn(300);
            $(this).parent().find('.asterisk').fadeIn(100);
            emailError = true;
        } else {
            
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisk').fadeOut(100);
            emailError = false;
        }
           
    });
    
    // Submit form validation
    
    $('.contact-form').submit(function (e) {
        
        if (userError === true || emailError === true) { // Check that there is no errors at fields
            
            e.preventDefault();  // won't send the form
            $('.username , .email').blur(); // to show the user his errors
        }
    });
});





















