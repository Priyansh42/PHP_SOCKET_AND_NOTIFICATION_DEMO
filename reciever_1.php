<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
    <title>Reciever</title>
</head>
<body>
    <table class="table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </table>

    <script type="text/javascript">
        var socket = io.connect("http://localhost:3001", {reconnect: true});

        socket.on('connect', function () {
            console.log('Server Connected...');

            if(socket.connected != false)
            {
                socket.on("new_order",function (data){
                    $("table").append("<tr><td>"+data.first_name+"</td><td>"+data.last_name+"</td></tr>"); // replaceWith to replace
                    $.notify("First Name: "+data.first_name+"\nLast Name: "+data.last_name, {
                        autoHide: false,
                        className: "info",
                        showAnimation: 'slideDown',
                        hideAnimation: 'slideUp',
                        elementPosition: 'bottom right',
                        globalPosition: 'bottom right',
                    })
                })
            }
            else
            {
                console.log("Cannot Connect!");
            }

            socket.on('disconnect', function () {
                console.log('Server Disconnected.');
            });
        });
    </script>
</body>
</html>
