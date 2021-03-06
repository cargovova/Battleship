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
	cell.setAttribute('column', column);
	cell.setAttribute('row', row);
	cell.addEventListener('click', clickHandler);
	r.appendChild(cell);
    }
}

function clickHandler(e) {
    const row =e.target.getAttribute('row');
    const column =e.target.getAttribute('column');
    console.log(row, column);
    fetch('http://battleship.local?row=' + row + '&column=' + column)
    .then(response => {
	return response.json()
	})
	.then(data => {
	    console.log(data);
	    if(data.result) {
		e.target.innerHTML = 'O'; // это большая о.
		alert ("Победа!");
	    } else {
		e.target.innerHTML = 'X';
	    }
	})
	.catch(err => {
	    console.error('err');
	});
}