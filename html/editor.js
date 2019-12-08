// Javascript drag and drop functions //

let entryNumber = 0;

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function newInputNode(name, placeholder, type) {
    entryNumber++;
    let node = document.createElement(type);
    node.setAttribute('name', name.concat(entryNumber));
    if (type === "input") {
        node.setAttribute('class', 'form-control input-sm');
    } else if (type === "textarea") {
        node.setAttribute('class', 'form-control');
    }
    node.setAttribute('placeholder', placeholder);
    node.setAttribute('type', 'text');

    return node;
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    if (data === "dragH") { // Header
        let node = newInputNode("header", "Header", "input");
        ev.target.appendChild(node);
    } else if (data === "dragT") { // Text
        let node = newInputNode("text", "Text", "textarea");
        ev.target.appendChild(node);
    } else if (data === "dragP") { // Picture
        let node = newInputNode("picture", "Picture (Link)", "input");
        ev.target.appendChild(node);
    } else if (data === "dragV") { // Video
        let node = newInputNode("video", "Video (Embed link)", "input");
        ev.target.appendChild(node);
    }
    let dropBox = document.getElementById('dropzone');
    dropBox.setAttribute('style', 'height: 100%'); // increase size of drop box when items are dropped
}

function fieldsNotEmpty() {
    if (document.getElementById("tutorialtitle").value === "" || document.getElementById("tutorialdescription").value === "") {
        let node = document.getElementById("errordiv");
        if (node.hasChildNodes()) {
            node.removeChild(node.lastChild);
        }
        let errorText = document.createTextNode("You must provide a title and description.");
        node.appendChild(errorText);
        return false;
    }
}