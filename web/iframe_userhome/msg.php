<?php
    include("../../action/loginCheck.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>coin</title>
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/notice.css">
</head>
<body>
<?php include("../layout/top.php") ?>
<div class="layout">
    <div class="main">
        <p class="h1">消息中心</p>
        <?php include("left.php") ?>
        <div class="right">


        </div>
    </div>
    <?php include("../layout/footer.php") ?>
</div>
<script>activeLeft("msg");</script>
</body>
</html>