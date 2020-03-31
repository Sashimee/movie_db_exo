$(".col").mouseenter(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.show();
});
$(".col").mouseleave(function(e) {
  const infoCard = $(this).find(".info");
  infoCard.hide();
});
$(document).ready(function() {
  $("select").formSelect();
});
$("select").click(function() {
  $("option").click(function(e) {
    console.log($(this).val());
  });
});
