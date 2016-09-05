/**
 * Created by BSun on 9/5/2016.
 */
var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

// subscriber (socket.js) <--> publisher (routes/web.php)
redis.subscribe('test-channel');

redis.on('message', function(channel, message){
    console.log(channel, message);
    io.emit(channel + ':' + JSON.parse(message).event, JSON.parse(message).data);
});

http.listen(3000, function(){
    console.log('Server start');
});