function sayHello(){

alert("Hello Saville. Welcome to programming.");

}

function changeColor(){

document.body.style.backgroundColor = "blue";

}

let number = 0;

function increase(){

number++;

document.getElementById("count").innerHTML = number;

}

let newParagraph = document.createElement("p");

newParagraph.innerHTML = "This was created with JavaScript.";

document.body.appendChild(newParagraph);

function addTask(){

let task = document.getElementById("task").value;

let li = document.createElement("li");

li.innerHTML = task;

document.getElementById("list").appendChild(li);

}