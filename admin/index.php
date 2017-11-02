<?php include("checkAdmin.php"); ?>
<html>
<head>
    <title>Admin</title>
    <link href="/admin/web/page.css" rel="stylesheet">
</head>
<body>
<div>
    <h2>管理項</h2>
    <ul>
        <li><a href="/admin/notice/notice_manager.php">notices</a></li>
        <li><a href="/admin/coin/coin_manager.php">coins</a></li>
    </ul>
    <h2>初始化</h2>
    <ul>
        <li> <a href="initDB.php">initDB</a></li>
    </ul>
</div>
</body>
</html>