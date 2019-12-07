function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    if (data === "dragH") {
        let node = document.createElement('input');
        node.setAttribute('name', 'header');
        node.setAttribute('class', 'form-control input-sm');
        node.setAttribute('placeholder', 'Text');
        node.setAttribute('type', 'text');
        node.setAttribute('value', '<?php if (isset($_POST["header"])) echo htmlspecialchars($_POST["header"]); ?>');
        ev.target.appendChild(node);
    } else if (data === "dragT") {
        var nodeCopy = document.getElementById(data).cloneNode(true);
        nodeCopy.id = "copiedT";
        ev.target.appendChild(nodeCopy);
    } else if (data === "dragP") {
        var nodeCopy = document.getElementById(data).cloneNode(true);
        nodeCopy.id = "copiedP";
        ev.target.appendChild(nodeCopy);
    } else if (data === "dragV") {
        var nodeCopy = document.getElementById(data).cloneNode(true);
        nodeCopy.id = "copiedV";
        ev.target.appendChild(nodeCopy);
    }
}