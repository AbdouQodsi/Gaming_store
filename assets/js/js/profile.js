$.ajax({
    url : "Get_Profile",
      type: "POST"
    })
  .done(function(response){
  var reponse = jQuery.parseJSON(response);
    $('#first_name').val( reponse.first_name );
    $('#last_name').val( reponse.last_name );
    $('#username').val( reponse.username );
    $('#email').val( reponse.email );
    $('#adresse').val( reponse.adresse);
    $('#city').val( reponse.city );
    $('#country').val( reponse.country );
    $('#postal_code').val( reponse.postal_code );
    $('#phone').val('0' + reponse.phone );
});

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

$(".proflupdate").submit(function(e){
  e.preventDefault();
  var post_url = $(this).attr("action");
  var request_method = $(this).attr("method");
  var form_data = $(this).serialize();
  $.ajax({
    url : post_url,
    type: request_method,
    data : form_data
  })
  .done(function(response){
    var reponse = jQuery.parseJSON(response);
    var error = reponse.msg;
    var message = reponse.message;
    if (error === "Succes") {
      command: toastr["success"](message, "Success");
    } else {
      Command: toastr["Warning"](message, "Error");
    }

  });
});

