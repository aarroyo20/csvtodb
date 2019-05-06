<?php

namespace App;
require_once '../vendor/autoload.php';

use App\file;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Import</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .margin-zero{
            margin:0px;
        }
        button{
            height: 58px;
            font-size: 20px !important;
        }
        .headin{
            margin-top: 80px !important;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="alert alert-info text-center">Import CSV File Records to Database</h2><br>
    <?php
    if(isset($_REQUEST['submit'])) {
        ?>
        <div class="row margin-zero">
            <h3 class="col-sm-6 alert alert-info text-center margin-zero">
                <?php
                echo date("d-m-Y");
                ?>
            </h3>
            <form action="stored.php">
                <button type="submit" class="col-sm-6 btn btn-primary">Import into Database</button>
            </form>
            <?php
            file\Upload::upload_file($_FILES['fileToUpload']);
            ?>
        </div>
        <?php
    }else{

    }
    ?>
</div>
</body>
</html>