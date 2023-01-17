<?php ini_set("display_errors",1);
    include ("vendor/autoload.php");

    use ElephantIO\Client;
    use ElephantIO\Engine\SocketIO\Version2X;

    if(isset($_POST['submit']))
    {
        $form_data = array("first_name"=>$_POST['first_name'],"last_name"=>$_POST['last_name']);
        // var_dump($form_data);
        // exit;

        $version = new Version2X("http://localhost:3001");
    
        $client = new Client($version);
    
        $client->initialize();
        $client->emit("new_order",$form_data);
        $client->close();
    }

?>

<!DOCTYPE html>
<head>
    <title>Emitter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css"/>
</head>
<body>
    <div>
        <form action="#" method="post"> 
            <div class="row">
                <div class="col-sm-8 col-sm-offset-1">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="form-inline">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
