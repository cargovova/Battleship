'use strict';
//fetch('index.php?init',{credentials:'include'})

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
	cell.setAttribute('beginrow', row);
	cell.setAttribute('begincolumn', column);
	cell.addEventListener('click', clickHandler);
	r.appendChild(cell);
    }
}

function clickHandler(e) {
    const beginrow = e.target.getAttribute('beginrow');
    const begincolumn = e.target.getAttribute('begincolumn');
    console.log(beginrow, begincolumn);
    fetch('http://battleship.local?beginrow=' + beginrow + '&begincolumn=' + begincolumn)
        .then(response => {
	return response.json()
	})
	.then(data => {
	    console.log(data);
	})
	.catch(err => {
	    console.error('err');
	});
    e.target.innerHTML = 'O';
}