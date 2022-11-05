<?php
    require_once __DIR__  . '/includes/session.php'; 
    require_once __DIR__  . '/includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admincss/newstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<body >
    <div class="newdesign">
        <?php include './includes/sidebar.php';?>
        <div class="otherside">
            <?php include './includes/fixedhead.php';?>
            <div class="subject2">
                <div class="cardi">
                    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                            <i class="checkmark">✓</i>
                    </div>
                        <h1 class="success" > Admin Created Successful</h1> 
                        <p class="successp">Admin can now visit profile ,All information would be displayed in profile   </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>