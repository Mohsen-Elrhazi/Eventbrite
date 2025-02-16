document.addEventListener("DOMContentLoaded", function () {
    let quantite = document.getElementById("quantite");
    let prixUnitaire = parseFloat(document.getElementById("prixUnitaire").textContent);
    let prixTotal = document.getElementById("prixTotal");
    let btnPlus = document.getElementById("plus");
    let btnMoins = document.getElementById("moins");

    quantite.value = 1;

    function mettreAJourPrix() {
        prixTotal.textContent = (quantite.value * prixUnitaire).toFixed(2) + " €";
    }

    btnPlus.addEventListener("click", function () {
        quantite.value++;
        mettreAJourPrix();
    });

    btnMoins.addEventListener("click", function () {
        if (quantite.value > 1) {
            quantite.value--;
            mettreAJourPrix();
        }
    });

    quantite.addEventListener("input", function () {
        if (quantite.value < 1 || isNaN(quantite.value)) {
            quantite.value = 1;
        }
        mettreAJourPrix();
    });

    mettreAJourPrix();
});
