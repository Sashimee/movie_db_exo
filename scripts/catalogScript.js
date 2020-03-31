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
  const cat = $(this).val();
  $.ajax({
    type: "POST",
    url: "getByCat.php",
    data: {
      category: cat
    },
    success: function(res) {
      $("#sResult").html(res);
    },
    error: function(err) {
      $("#sResult").html(err);
    }
  });
}
