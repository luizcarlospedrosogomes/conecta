var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

  io.sockets.on('connection', function (socket) {

    // when the client emits 'adduser', this listens and executes
    socket.on('adduser', function(username, room){
      // store the username in the socket session for this client
      socket.username = username;
      // store the room name in the socket session for this client
      socket.room = room;
      // send client to room 1
      socket.join(room);
      // echo to client they've connected
      socket.emit('chat message', 'CONECTA', 'BEM VINDO');
      // echo to room 1 that a person has connected to their room
      socket.broadcast.to(room).emit('chat message', 'CONECTA', username + ' conectou');
    });

    // when the client emits 'sendchat', this listens and executes
    socket.on('chat message', function (data) {
      // we tell the client to execute 'updatechat' with 2 parameters
      io.sockets.in(socket.room).emit('chat message', socket.username, data);
    });


    // when the user disconnects.. perform this
    socket.on('disconnect', function(){
        // update list of users in chat, client-side
      // echo globally that this client has left
      socket.broadcast.emit('chat message', 'CONECTA', socket.username + ' desconectou');
      socket.leave(socket.room);
    });
});

http.listen(3000, function(){
  console.log('listening on *:3000');
});
