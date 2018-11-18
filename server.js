var http = require('http').Server();

var io = require('socket.io')(http);

var Redis = require('ioredis');

var redis = new Redis();
redis.subscribe('chartevent');
redis.on('message', function(channel, message){
    console.log('Message recieved: '+ message);
    console.log('Channel: '+ channel);
});