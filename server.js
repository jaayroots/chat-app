const express = require('express');
const socket = require('socket.io');
const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: { origin: "*" }
});


let alive = [];

io.on('connection', (socket) => {

    var userid = socket.id;
    alive.push(userid);
    console.log('Connection ====', userid);

    socket.on('stayLogin', () => {
        io.sockets.emit('showLogin', alive)
    });

    socket.on('disconnect', () => {
        var myIndex = alive.indexOf(userid);
        if (myIndex !== -1) {
            alive.splice(myIndex, 1);
        }
        io.sockets.emit('getdisconnect', alive)
        console.log('Disconnect xxxxx', userid);
    });

    socket.on('sendChatToServer', (message, uuid, colorUser) => {
        io.sockets.emit('sendChatToClient', message, uuid, colorUser)
    });

    socket.on('sendTypingToServer', (uuid, typing) => {
        io.sockets.emit('sendTypingStatus', uuid, typing)
    });

    socket.on('callUserId', () => {
        io.sockets.emit('getUserId', userid)
    });
})

server.listen(3000, () => {
    console.log('Server is Running');
})