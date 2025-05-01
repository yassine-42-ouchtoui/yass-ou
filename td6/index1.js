const f = document.getElementById('tf');
const i = document.getElementById('ti');
const l = document.getElementById('tl');


f.addEventListener('submit', function(e) {
    e.preventDefault();
    const tt = i.value.trim();
    if (tt === '') return;

    const li = document.createElement('li');
    li.textContent = tt;


    const btnC = document.createElement('div');
    btnC.className = 'tb';

    const doneBtn = document.createElement('button');
    doneBtn.textContent = ' marquant';
    doneBtn.title = 'Marquer comme accomplie';
    doneBtn.addEventListener('click', () => {
        li.classList.toggle('completed');
    });

    const suprimerBtn = document.createElement('button');
    suprimerBtn.textContent = ' supprimant';
    suprimerBtn.title = 'Supprimer';
    suprimerBtn.addEventListener('click', () => {
        li.remove();
    });

    btnC.appendChild(doneBtn);
    btnC.appendChild(suprimerBtn);

    li.appendChild(btnC);
    l.appendChild(li);

    i.value = '';
});