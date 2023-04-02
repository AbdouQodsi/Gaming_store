$("#page-header-user-dropdown").click(function() {
  $("#Drop1").toggle();
});

$("#admin").click(function() {
  if ($("#arroww").hasClass("bx bxs-up-arrow")) {
   
   $("#arroww").removeClass("bx bxs-up-arrow").addClass("bx bxs-down-arrow");
 } else {
   $("#arroww").removeClass("bx bxs-down-arrow").addClass("bx bxs-up-arrow");
 }
 $("#Drop2").toggle();
 });

$("#xc").click(function() {
   if ($("#arrow").hasClass("bx bxs-up-arrow")) {
    
    $("#arrow").removeClass("bx bxs-up-arrow").addClass("bx bxs-down-arrow");
  } else {
    $("#arrow").removeClass("bx bxs-down-arrow").addClass("bx bxs-up-arrow");
  }
  $("#er").toggle();
  });


 


  



