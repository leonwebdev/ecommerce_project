// By this function, you can toggle the content of a label,
// And collapse all contents by clicking the big red button
$(document).ready(function () {
    console.log("jQuery loaded");
    $(".tglb").click(function (e) {
        e.preventDefault();
        $(this).next().slideToggle("fast");
    });
    $("#collapse_all").click(function (e) {
        e.preventDefault();
        $(".tglb+p").slideUp("fast");
    });
});
