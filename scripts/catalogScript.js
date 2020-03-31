$(".col").mouseenter(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.show();
});
$(".col").mouseleave(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.hide();
});

// $("option").click(function(e) {
//   console.log("ree");
//   console.log(this.val());
// });

$(document).ready($("#catSel").on("change", clickFunction));

function clickFunction() {
  console.log($(this).val());
  const cat = $(this).val();
  $.ajax({
    type: "POST",
    url: "catalog.php",
    data: cat
  });
}
