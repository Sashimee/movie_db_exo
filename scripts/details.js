$("#edit").on("click", switchEdit);

function switchEdit() {
    $('input').removeAttr("readonly");
    console.log('Hi');
}