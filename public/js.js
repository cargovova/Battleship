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

    const x =e.target.getAttribute('x');
    const y =e.target.getAttribute('y');
    const fieldNumber = 'firstField';
    console.log(x,y);
    fetch('http://battleship.local?x=' + x + '&y=' + y + '&fieldNumber=' + fieldNumber)
    .then(response => {
	return response.json()
	})
	.then(data => {
	    console.log(data);
	    if(data.result) {
		e.target.innerHTML = 'O'; // это большая о.
	    } else {
		console.error('error');
	    }
	})
	.catch(err => {
	    console.error(err);
	});
}