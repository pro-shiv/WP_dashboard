function allowDrop(event) {
  event.preventDefault();
}

function drag(event) {
  event.dataTransfer.setData("text", event.target.innerText);
}

function drop(event) {
  event.preventDefault();
  var data = event.dataTransfer.getData("text");
  
  // Create a new <p> element with the dragged text
  var newParagraph = document.createElement("p");
  newParagraph.innerText = data;

  // Append the new <p> element to the drop area
  event.target.appendChild(newParagraph);
}