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

$("option").on("click", clickFunction)

function clickFunction() {
    console.log("ree");
    console.log(this.val());
}