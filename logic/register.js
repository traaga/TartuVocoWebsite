const submitForm = () => {
  let data = $("#register-form").serialize();
  $.ajax({
    type: "POST",
    url: "logic/register.php",
    data: data,
    beforeSend: () => {
      $("#error").fadeOut();
    },
    success: (response) => {
      if (response == 1) {
        $("#error").fadeIn(500, () => {
          $("#error").html("Sorry, username is already taken");
        });
      } else if (response == "registered") {
        setTimeout(() => (window.location.href = "login.html"), 500);
      } else {
        $("#error").fadeIn(500, () => {
          $("#error").html(response);
        });
      }
    },
  });
  return false;
};

$("document").ready(() => {
  $("#register-form").validate({
    rules: {
      name: {
        required: true,
      },
      username: {
        required: true,
        minlength: 3,
      },
      password: {
        required: true,
        minlength: 8,
        maxlength: 15,
      },
      cpassword: {
        required: true,
        equalTo: "#password",
      },
    },
    messages: {
      name: "Please enter name",
      username: "Please enter username",
      password: {
        required: "Please provide a password",
        minlength: "Password needs to be at least 8 characters",
      },
      cpassword: {
        required: "Please retype your password",
        equalTo: "Password doesn't match",
      },
    },
    submitHandler: submitForm,
  });
});
