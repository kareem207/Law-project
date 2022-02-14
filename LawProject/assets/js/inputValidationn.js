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
  });


//checks the input of the registeration form
  $(document).ready(function() {
    $("#reForm").validate({

      rules: {
            inFname: {
                required: true,
                minlength: 2,
                maxlength:15
              },
              inLname: {
                required: true,
                minlength:2,
                maxlength:15
              },
              inEmail: {
                required: true,
                email: true,
                maxlength:35
              },
              inPhoneNum: {
                required: true,
                number: true,
                minlength:11,
                maxlength:11
              },
              inPassword: {
                required: true,
                minlength:8,
                maxlength:15
                },
            }


    });
  });
