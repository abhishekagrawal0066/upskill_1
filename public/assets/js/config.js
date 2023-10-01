/**
 * Config
 * -------------------------------------------------------------------------------------
 * ! IMPORTANT: Make sure you clear the browser local storage In order to see the config changes in the template.
 * ! To clear local storage: (https://www.leadshook.com/help/how-to-clear-local-storage-in-google-chrome-browser/).
 */

'use strict';

// JS global variables
let config = {
  colors: {
    primary: '#696cff',
    secondary: '#8592a3',
    success: '#71dd37',
    info: '#03c3ec',
    warning: '#ffab00',
    danger: '#ff3e1d',
    dark: '#233446',
    black: '#000',
    white: '#fff',
    body: '#f4f5fb',
    headingColor: '#566a7f',
    axisColor: '#a1acb8',
    borderColor: '#eceef1'
  }
};
$(document).ready(function(){
    
  (function($) {
      "use strict";

  
  jQuery.validator.addMethod('answercheck', function (value, element) {
      return this.optional(element) || /^\bcat\b$/.test(value)
  }, "type the correct answer -_-");

  // validate contactForm form
  $(function() {
      $('#contactForm').validate({
          rules: {
              name: {
                  required: true,
                  minlength: 2
              },
              subject: {
                  required: true,
                  minlength: 4
              },
              number: {
                  required: true,
                  minlength: 5
              },
              email: {
                  required: true,
                  email: true
              },
              message: {
                  required: true,
                  minlength: 20
              }
          },
          messages: {
              name: {
                  required: "come on, you have a name, don't you?",
                  minlength: "your name must consist of at least 2 characters"
              },
              subject: {
                  required: "come on, you have a subject, don't you?",
                  minlength: "your subject must consist of at least 4 characters"
              },
              number: {
                  required: "come on, you have a number, don't you?",
                  minlength: "your Number must consist of at least 5 characters"
              },
              email: {
                  required: "no email, no message"
              },
              message: {
                  required: "um...yea, you have to write something to send this form.",
                  minlength: "thats all? really?"
              }
          },
          submitHandler: function(form) {
              $(form).ajaxSubmit({
                  type:"POST",
                  data: $(form).serialize(),
                  url:"contact_process.php",
                  success: function() {
                      $('#contactForm :input').attr('disabled', 'disabled');
                      $('#contactForm').fadeTo( "slow", 1, function() {
                          $(this).find(':input').attr('disabled', 'disabled');
                          $(this).find('label').css('cursor','default');
                          $('#success').fadeIn()
                          $('.modal').modal('hide');
                    $('#success').modal('show');
                      })
                  },
                  error: function() {
                      $('#contactForm').fadeTo( "slow", 1, function() {
                          $('#error').fadeIn()
                          $('.modal').modal('hide');
                    $('#error').modal('show');
                      })
                  }
              })
          }
      })
  })
      
})(jQuery)
})
