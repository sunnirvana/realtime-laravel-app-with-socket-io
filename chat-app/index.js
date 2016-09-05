var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(request, response){
	response.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
    console.log('a user connect');
    // listening chat.message
    socket.on('chat.message', function(message){
        console.log('a new message: ' + message);
        // broadcast chat.message to all users connected to the server.
        io.emit('chat.message', message);
    });
});

http.listen(3000, function(){
	console.log('Server start');
});