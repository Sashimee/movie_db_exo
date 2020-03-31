$(".col").mouseenter(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.show();
});
$(".col").mouseleave(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.hide();
});
$("select").click(function() {
  console.log("test");
  $("option").click(function(e) {
    console.log("ree");
    console.log(this.val());
  });
});
