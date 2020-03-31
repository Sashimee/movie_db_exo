$("#edit").on("click", switchEdit);

function switchEdit() {
    $('input').removeAttr("readonly");
    $('textarea').removeAttr("readonly");
}