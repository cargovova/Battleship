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
    console.log(e.target.getAttribute('x'));
    console.log(e.target.getAttribute('y'));
    e.target.innerHTML = O;
}
