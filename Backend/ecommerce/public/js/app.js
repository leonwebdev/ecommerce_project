$(document).ready(function () {
    console.log("jQuery loaded");
    $(".tglb").click(function (e) {
        e.preventDefault();
        $(this).next().slideToggle("fast");
    });
});
