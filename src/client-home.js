$(".sideBar button").click(function(e) {
    let data = $(e.target).data("filter");

    $(".clientWithDebt").load(`views/home/client.home.php?filter=${data}`, function() {
        toggleSideBar();
    });

});

function toggleSideBar() {
    $(".sideBar").toggleClass("sbShow");

    $(".sidebar_overlay").toggleClass("showOl"); //overlay
}


$(".toggle,.sidebar_overlay").click(function() {
    toggleSideBar()
});