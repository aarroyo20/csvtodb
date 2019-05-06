<?php

namespace App;
require_once '../vendor/autoload.php';

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
    </style>
</head>
<body>
<?php
?>
<div class="container">
    <h2 class="alert alert-info text-center">Database Records</h2><br>
    <div class="row margin-zero">
            <?php
            $object = new bootstrap();
            $object->import('../data/deniro.csv');
            $object->display_table();
            ?>
        </table>
    </div>
</div>
</body>
</html>