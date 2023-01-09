<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.min.js"></script> -->
    <title>Title</title>
</head>
<body>
    <script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.min.js'></script>

    <script>
    var socket = io.connect('http://localhost:3001');

    // Here this function used for connect client with server
    // You missed this function
    socket.on('connect', function () {
        console.log('connected');

        if(socket.connected != false)
        {
            socket.on("new_order",function (data){
                console.log(data);
            })
        }
        else
        {
            console.log("Cannot Connect!");
        }

        socket.on('disconnect', function () {
            console.log('disconnected');
        });
    });
    </script>
</body>
</html>