import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');





// ! Variables

// * to make carousel on paysages
const leftBtn = document.querySelector('.carousel__btn--left');
const rightBtn = document.querySelector('.carousel__btn--right');
const parents = document.querySelectorAll('.div4');
let activeIndex = 0;
let currentParent;

// console.log(parents);

// ! Functions

// * to activate carousel on paysages
clickRightBtn();
clickLeftBtn();

function clickRightBtn() {
    rightBtn.addEventListener('click', () => {
        activeIndex++;

        if (activeIndex >= parents.length) {
            activeIndex = 0;
        }

        currentParent = document.querySelector(`[data-status="active"]`);
        currentParent.dataset.status = "inactive";

        parents[activeIndex].dataset.status = "active";
        // console.log(activeIndex);
    });
}

function clickLeftBtn() {
    leftBtn.addEventListener('click', () => {
        activeIndex--;

        if (activeIndex < 0) {
            activeIndex = parents.length - 1;
        }

        currentParent = document.querySelector(`[data-status="active"]`);
        currentParent.dataset.status = "inactive";

        parents[activeIndex].dataset.status = "active";
        // console.log(activeIndex);
    });
}