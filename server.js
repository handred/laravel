var http = require('http').Server();

var io = require('socket.io')(http);

var Redis = require('ioredis');

io.on('connection', function (socket) {
    console.log('a user connected');
    socket.on('disconnect', function () {
        console.log('user disconnected');
    });

    socket.on('message', function (msg) {
        console.log('message: ' + msg);
        io.emit('message', msg);
    });
});

var redis = new Redis();
redis.subscribe('chartevent');
redis.on('message', function (channel, message) {
    console.log('Message recieved: ' + message);
    console.log('Channel: ' + channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function () {
    console.log('Start nodejs server on port:3000');
});