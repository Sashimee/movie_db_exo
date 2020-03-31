$(".col").mouseenter(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.show();
});
$(".col").mouseleave(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.hide();
});
$("select").click(function() {
  $("option").click(function(e) {
    console.log(this.val());
    console.log("ree");
  });
});
