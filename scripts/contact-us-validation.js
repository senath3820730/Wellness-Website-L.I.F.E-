$(function() {

    $("form[id='contact-us-form']").validate({

      rules: {

        address: "required",
        email: {
          required: true,

          email: true
        },
        message: "required"
      },

      messages: {
        address: "Please enter your address",
        email: "Please enter a valid email address",
        message: "Please enter your enquiry",
      },

      submitHandler: function(form) {
        form.submit();
      }
    });
});