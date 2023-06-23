// Récupération de tous les éléments HTML avec la classe CSS "input" et stockage dans la variable "inputs"
const inputs = document.querySelectorAll(".input");

// Définition de la fonction "focusFunc", appelée lorsqu'un élément de formulaire est en focus
function focusFunc() {
let parent = this.parentNode;
parent.classList.add("focus"); // Ajout de la classe CSS "focus" à l'élément parent de l'élément en focus
}

// Définition de la fonction "blurFunc", appelée lorsqu'un élément de formulaire perd le focus
function blurFunc() {
let parent = this.parentNode;
if (this.value == "") { // Vérification si la valeur de l'élément est vide
parent.classList.remove("focus"); // Suppression de la classe CSS "focus" de l'élément parent
}
}

// Application des événements de focus et de blur à tous les éléments de formulaire récupérés par la méthode "querySelectorAll"
inputs.forEach((input) => {
input.addEventListener("focus", focusFunc); // Ajout de l'événement "focus" pour appeler la fonction "focusFunc"
input.addEventListener("blur", blurFunc); // Ajout de l'événement "blur" pour appeler la fonction "blurFunc"
});






