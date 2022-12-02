$(document).ready(function () {

  window.setTimeout(function () {
    $(".alert").fadeTo(10, 40).slideUp(1000, function () {
      $(this).remove();
    });
  }, 3000);

});
