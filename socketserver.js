var http = require('http').Server();

var io = require('socket.io')(http);

io.on('connection', function (socket) {
    console.log('a user connected');
    
    socket.on('disconnect', function () {
        console.log('user disconnected');
    });

    socket.on('message', function (message) {
        console.log('message: ' + message);
        io.emit('message', message);
    });
});


http.listen(3000, function () {
    console.log('Start nodejs server on port:3000');
});