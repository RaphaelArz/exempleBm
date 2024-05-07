window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 650 || document.documentElement.scrollTop > 650) {
        document.getElementById("navbar").style.display = "block";
    } else {
        document.getElementById("navbar").style.display = "none";
    }
}
// Capturer l'événement de rafraîchissement de la page
window.onbeforeunload = function() {
    // Faire défiler vers la première div
    document.getElementById('premierPartie').scrollIntoView();
};
