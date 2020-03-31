$("#edit").on("click", switchEdit);

switchEdit() {
    $('input').removeAttr("readonly");
    console.log('Hi');
}