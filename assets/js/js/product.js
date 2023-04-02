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





$('#add').click(function(){
  $('#wowo').hide();
  $('#add').hide();
  $('#Productable').hide();
  $('#Productable_wrapper').hide();
  $('.addproduct').show();
});
$('.annuler-form').click(function(){
  $('#wowo').show();
  $('#add').show();
  $('#Productable').show();
  $('#Productable_wrapper').show();
  $('.addproduct').hide();
  $('.editproduct').hide();
});

table = $('#Productable').DataTable({
  // "processing": true,
  // "serverSide": true,
   "createdRow": function(raw, data, dataIndex) {
    $(raw).css("line-height", 1,2);
  },
  "ajax": {
  url: './../Product/get',
  type: 'POST',
},
});

$("#inserorm").submit(function(e){
  e.preventDefault();
  var post_url = $(this).attr("action");
  var request_method = $(this).attr("method");
  var form_data = new FormData(this); // use FormData object for file upload
  $.ajax({
    url : post_url,
    type: request_method,
    data : form_data,
    processData: false, // prevent jQuery from processing data
    contentType: false // prevent jQuery from setting content type
  })
  .done(function(response){
    var response = jQuery.parseJSON(response);
    var er = response.prbl;
    var message = response.message;
    if (er == "Success") {
      $('.addproduct').hide();
      $('#wowo').show();
      $('#add').show();
      $('#Productable').show();
      $('#Productable_wrapper').show();
      table.ajax.reload();
      command: toastr["success"](message, "Success");
    } else {
      command: toastr["warning"](message, "Success");
    }
    
  });
});


function Get_user_details(id) {
  $.ajax({
    url : "./../Product/Get_User",
      type: "POST",
      data : { product_id : id }
    })
  .done(function(response){
  var reponse = jQuery.parseJSON(response);
    $('#product_name').val( reponse.product_name );
    $('#product_price').val( reponse.product_price );
    $('#product_id').val( reponse.product_id );
    $('#product_description').val( reponse.product_description );
    $('#product_brand').val( reponse.product_brand );
    $('#product_category').val( reponse.product_category );
    $('#product_quantity').val( reponse.product_quantity );
    $('#published_date').val( reponse.published_date );
    $('#product_imag').val( reponse.product_image );
  });
};

function edit(id) {
  $('#wowo').hide();
  $('#add').hide();
  $('#Productable').hide();
  $('#Productable_wrapper').hide();
  $('.editproduct').show( 600 );
  Get_user_details(id);
};
  

$(".editform").submit(function(e){
  e.preventDefault();
  var post_url = $(this).attr("action");
  var request_method = $(this).attr("method");
  var form_data = $(this).serialize();
  $.ajax({
    url : post_url,
    type: request_method,
    data : form_data}
  )
  .done(function(response){
    try {
      var reponse = jQuery.parseJSON(response);
      var er = reponse.msg;
      var message = reponse.message;
      if (er === "Success")  {
        $('.editproduct').hide();
        $('#wowo').show();
        $('#add').show();
        $('#Productable').show();
        $('#Productable_wrapper').show();
        table.ajax.reload();
        command: toastr["success"](message, "Success");
      }else{
        command: toastr["warning"](message, "Success");
      }
    } catch (e) {
      command: toastr["error"]("An error occurred while processing the response.", "Error");
    }
  });
});


function delete_user(userId) {
Swal.fire({
  title: 'vous êtes sûr?',
  text: "Vous ne pourrez pas revenir en arrière!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Oui, supprimer!',
  cancelButtonText: 'Non, annuler!',
  confirmButtonClass: 'btn btn-success mt-2',
  cancelButtonClass: 'btn btn-danger ms-2 mt-2',
  buttonsStyling: false,
}).then(function (result) {
  if (result.value) {
    $.ajax({
      url: 'user/' + userId,
      type: 'POST'
    })
    .done(function(response){ 
      var reponse = jQuery.parseJSON(response);
      var er = reponse.result;
      if (er === "success"){
        table.ajax.reload();
        command: toastr["success"]("Produit supprimer", "Success")
        $( "#AddDid" ).show( 600 );
      }
    });
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire({
      title: 'Annulé',
      text: 'Votre dossier est en sécurité :)',
      icon: 'error',
    })
  }
});
}