const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

// Sélectionner le bouton de recherche
const searchButton = document.querySelector('#content nav form .form-input button');
// Sélectionner l'icône de recherche à l'intérieur du bouton
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
// Sélectionner le formulaire de recherche
const searchForm = document.querySelector('#content nav form');

// Ajouter un écouteur d'événements pour le clic sur le bouton de recherche
searchButton.addEventListener('click', function (e) {
	// Si la largeur de la fenêtre est inférieure à 576 pixels
	if(window.innerWidth < 576) {
		e.preventDefault(); // Empêcher le comportement par défaut du bouton de recherche
		searchForm.classList.toggle('show'); // Ajouter ou enlever la classe show pour afficher ou cacher le formulaire de recherche
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x'); // Si le formulaire est affiché, remplacer l'icône de recherche par l'icône de fermeture
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search'); // Si le formulaire est caché, remplacer l'icône de fermeture par l'icône de recherche
		}
	}
});

// Si la largeur de la fenêtre est inférieure à 768 pixels
if(window.innerWidth < 768) {
	sidebar.classList.add('hide'); // Cacher la barre latérale en ajoutant la classe hide
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search'); // Remplacer l'icône de fermeture par l'icône de recherche
	searchForm.classList.remove('show'); // Cacher le formulaire de recherche en enlevant la classe show
}

// Ajouter un écouteur d'événements pour les changements de taille de la fenêtre
window.addEventListener('resize', function () {
	// Si la largeur de la fenêtre est supérieure à 576 pixels
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search'); // Remplacer l'icône de fermeture par l'icône de recherche
		searchForm.classList.remove('show'); // Cacher le formulaire de recherche en enlevant la classe show
	}
});

// Sélectionner l'élément avec l'ID switch-mode
const switchMode = document.getElementById('switch-mode');

// Ajouter un écouteur d'événements pour le changement de l'état du bouton
switchMode.addEventListener('change', function () {
	// Si le bouton est coché
	if(this.checked) {
		document.body.classList.add('dark'); // Ajouter la classe dark au corps de la page pour activer le mode sombre
	} else {
		document.body.classList.remove('dark'); // Enlever la classe dark du corps de la page pour désactiver le mode sombre
	}
});
