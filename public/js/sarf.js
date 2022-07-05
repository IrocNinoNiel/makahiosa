let element = document.getElementById('btn-obj');
let deleteElement = document.getElementById('btn-obj-delete');

let container_obj = document.getElementById('container-obj');

element.addEventListener("click", myFunction);
container_obj.addEventListener("click", deleteFunction);

function deleteFunction(e) {
    if(e.target.classList.contains('btn-to-delete')) {
        e.target.parentNode.remove();
    }
}

function myFunction() {

    const divNode = document.createElement('div');
    const node = document.createElement("input");
    const buttonNode = document.createElement('button');

    divNode.setAttribute('class', 'd-flex');

    node.setAttribute('name','objectives[]');
    node.setAttribute('id', 'objectives[]');
    node.setAttribute('placeholder','Specific Objectives');
    node.setAttribute('type','text');

    buttonNode.setAttribute('class','btn btn-outline-danger btn-to-delete');
    buttonNode.setAttribute('type','button');
    buttonNode.innerHTML = 'x';

    divNode.appendChild(node);
    divNode.appendChild(buttonNode);
    container_obj.appendChild(divNode);
}
