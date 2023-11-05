$(document).ready(() => {
  $("#login-button").click(() => {
    let data = $("#login-form").serialize();
    $.ajax({
      type: "POST",
      url: "logic/login.php",
      data: data,
      beforeSend: () => {
        $("#error").fadeOut();
      },
      success: (response) => {
        if (response == "ok") {
          setTimeout(() => (window.location.href = "protected.php"), 500);
        } else {
          $("#error").fadeIn(500, () => {
            $("#error").html(response);
          });
        }
      },
    });
    return false;
  });
});
