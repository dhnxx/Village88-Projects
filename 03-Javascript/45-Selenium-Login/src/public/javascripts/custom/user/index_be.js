$(document).ready(function() {
    $("body")
      .on("click", "#login_button", login);
});

function login(e){
  e.preventDefault();
  
  let form = $("#login_form");
  let is_processing = parseInt(form.attr("data-is-processing"));

  if (is_processing === 0) {
      form.attr("data-is-processing", 1);

      $.post(form.attr("action"), form.serialize(), function(response) {

          if (response.status === true && response.redirect_url) {
              window.location.href = response.redirect_url;
          }
          else {
              $(".error").html("<p>" + response.message + "</p>");
          }
          form.attr("data-is-processing", 0);
      }, "json");

      return false;
  }	
}