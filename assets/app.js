import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');




// ! attribuer le bon dataset au premier film et aux suivants

// Sélectionne tous les éléments .div4 dans le conteneur
const parents = document.querySelectorAll(".div4");
console.log(parents);
// Initialise l'index actif
let activeIndex = 0;

// Fonction pour mettre à jour le statut en fonction de l'index
function updateStatus() {
    for (let i = 0; i < parents.length; i++) { // parents[i] fait référence à l'élément spécifique dans la liste des éléments .div4 à l'index i. En d'autres termes, parents[i] est l'élément individuel dans la liste d'éléments .div4 à l'index i.
        console.log(parents[i]);
        if (i === activeIndex) {
            parents[i].dataset.status = "active";
        } else {
            parents[i].dataset.status = "inactive";
        }
    }
}

// Appelle la fonction initiale pour définir le statut initial
updateStatus();

// Fonction pour gérer le clic sur le bouton droit
function clickRightBtn() {
    const rightBtn = document.querySelector('.carousel__btn--right'); // Ajoute cette ligne
    rightBtn.addEventListener("click", () => {
        
        // activeIndex++;
        // if (activeIndex >= parents.length) {
            //     activeIndex = 0;
            // }
            activeIndex = (activeIndex + 1) % parents.length; // code de dessus optimisé
            // si activeIndex +1 = 3 et qu'il y a 3 films, 3%3=0 donc activeIndex prend comme valeur 0
            
            updateStatus();

            // donc au clic sur le bouton, l'activeIndex passe à 1 avec l'incrémentation, 
            // du coup i vaut 1 (c'est pour ça qu'on rappelle la fonction) 
            // et c'est égal à activeIndex donc le changement de dataset s'opère
    });
}

// Fonction pour gérer le clic sur le bouton gauche
function clickLeftBtn() {
    const leftBtn = document.querySelector('.carousel__btn--left'); // Ajoute cette ligne
    leftBtn.addEventListener("click", () => {
        activeIndex = (activeIndex - 1 + parents.length) % parents.length;
        updateStatus();
    });
}

// Appelle les fonctions pour activer les boutons
clickRightBtn();
clickLeftBtn();