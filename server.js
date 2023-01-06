var http = require('http'),
express = require('express'),
https = require('https'),
socket = require('socket.io')(http),
logger = require('winston');

logger.remove(new logger.transports.Console);
logger.add(new logger.transports.Console({colorize: true, timestamp: true}));
logger.info('SocketIO > listening on port ');

var app = express();
var http_server = http.createServer(app).listen(3001);

function emitNewOrder(http_server)
{
    var io = socket.listen(http_server);

    io.sockets.on('connection',function (socket){
        socket.on("new_order",function (data){
            // console.log(data); // prints data in terminal
            io.emit("new_order",data);
        })
    })
}

emitNewOrder(http_server);