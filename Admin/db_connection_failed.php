<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Message</title>
</head>

<body style="background-color:gray;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div clas="col-md-4">
                    </div>
                    <div clas="col-md-4"
                        style="margin-left:30%;margin-right:30%;margin-top:200px;  border-radius:10px;background-color:white; padding:20px;">
                        <p style="text-align:center; color:red; ">
                            <?php  
                                            $message = $_GET['message'];
                                            echo $message;

                                            ?>
                        </p>
                    </div>
                    <div clas="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>