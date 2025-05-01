const div = document.createElement('div');
div.id = 'diiiiv';


const paragraphe = document.createElement('p');
paragraphe.textContent = 'Ceci est un paragraphe';
div.appendChild(paragraphe);
document.body.appendChild(div);
paragraphe.textContent = 'Le texte a été modifié';
paragraphe.style.backgroundColor = 'lightblue';
paragraphe.style.textAlign = 'center';
div.addEventListener('click', () => {
    paragraphe.textContent = 'Un clic a été détecté';
});