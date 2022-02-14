//checks the input of the login form
$(document).ready(function() {
  $("#checkForm").validate({

    rules: {
      checkPhoneNum:{
        minlength :11,
        required: true
      },
      checkPassword:{
        minlength :8,
        maxlength :15,
        required: true

      }
    }
    });

  $("#reForm").validate();

  });


//checks the input of the registeration form
  $(document).ready(function() {

    $("#winForm").validate({

      rules: {
            winFname: {
                required: true,
                minlength: 2,
                maxlength:15
              },
              winLname: {
                required: true,
                minlength:2,
                maxlength:15
              },
              winEmail: {
                required: true,
                email: true,
                maxlength:40
              },
              winPhoneNum: {
                required: true,
                number: true,
                minlength:11,
                maxlength:11
              },
              winPassword: {
                required: true,
                minlength:8,
                maxlength:15
                },
            }


    });
  });
