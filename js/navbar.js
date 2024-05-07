window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 650 || document.documentElement.scrollTop > 650) {
        document.getElementById("navbar").style.display = "block";
    } else {
        document.getElementById("navbar").style.display = "none";
    }
}
function showOverlay() {
    document.getElementById("overlay").classList.remove("hidden");
    document.body.classList.add("no-scroll");
}

function hideOverlay() {
    document.getElementById("overlay").classList.add("hidden");
    document.body.classList.remove("no-scroll");
}
