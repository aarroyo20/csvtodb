<?php

namespace App;
require_once '../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Import</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .margin-zero{
            margin:0px;
        }
    </style>
</head>
<body>
<div class="container">

    <h2 class="alert alert-info text-center" style="margin-top: 100px;">Upload a CSV File</h2><br>

    <form action="load.php" method="post" enctype="multipart/form-data">
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" name="fileToUpload">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary col-sm-12" name="submit">Upload</button>
        </div>
    </form>

</div>

<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</body>
</html>