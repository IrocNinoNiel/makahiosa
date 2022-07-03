let element = document.getElementById('btn-obj');
let container_obj = document.getElementById('container-obj');


element.addEventListener("click", myFunction);

function myFunction() {
    console.log('here it is ');
    const node = document.createElement("input");
    node.setAttribute('name','objectives[]');
    node.setAttribute('id', 'objectives[]');
    node.setAttribute('placeholder','Specific Objectives');
    node.setAttribute('type','text');
    container_obj.appendChild(node);
}