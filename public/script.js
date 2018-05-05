var socket = io.connect("http://localhost:8080");

var bt = document.getElementById("send");
var message = document.getElementById("txt"); 
var output = document.getElementById("output");
var handle = "Yash";

bt.addEventListener("click", function() {
	socket.emit('chat', {
		message: message.value,
		handle: handle
	}); 
});

socket.on("chat", function(data) {
	output.innerHTML = output.innerHTML + data.message + "<br>";
});