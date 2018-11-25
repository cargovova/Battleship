'use strict';
const field = document.getElementById('field');

const cells = [];
for (let row = 0; row < 10; row++) {
    cells.push([]);
    const r = document.createElement('div');
    r.className = 'row';
    field.appendChild(r);
    for (let column = 0; column < 10; column++) {
	const cell = document.createElement('div');
	cell.className = 'cell';
	cell.setAttribute('x', column);
	cell.setAttribute('y', row);
	cell.addEventListener('click', clickHandler);
	r.appendChild(cell);
    }
}

function clickHandler(e) {
    console.log(e.target.getAttribute('x')); // Вывод в консоль
    console.log(e.target.getAttribute('y')); // Вывод в консоль
    e.target.innerHTML = O;
    
    const x =e.target.getAttribute('x');
    const y =e.target.getAttribute('y');
    fetch('http://localhost:8080?x=' + x + '&y=' + y)
    .then(response => {
	return response.json()
	})
	.then(data => {
	    console.log(data);
	})
	.catch(err => {
	    console.error(err);
	});
}