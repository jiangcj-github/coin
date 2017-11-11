<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>完善个人信息-淘币客</title>
    <link href="/web/common/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/common/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/left.css">
    <link rel="stylesheet" type="text/css" href="/web/common/css/userhome/home.css">
</head>
<body>
    <?php include("../../layout/top.php") ?>
    <div class="layout">
        <div class="main">
            <?php include("../left.php") ?>
            <div class="right">
                <!--完善个人信息-->
                <div class="nav">
                    <div class="h3">完善个人信息</div>
                    <div class="f1 img-group x16">
                        <img src="/web/common/img/userhome/usered.svg">
                        <a href="/web/iframe_userhome/usered.php">个人中心</a>
                        <span style="margin:0 5px;">&gt;</span>
                        <span style="color:#999;">完善信息</span>
                    </div>
                </div>
                <div class="s3">
                    <div class="input-group">
                        <label for="sex">性别：</label>
                        <select id="sex">
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="age">年龄：</label>
                        <input type="text" id="age">
                    </div>
                    <div class="input-group addr">
                        <label for="province">所在地：</label>
                        <select id="province" class="province"></select>
                        <select id="city" class="city"></select>
                    </div>
                    <div class="input-group">
                        <label>QQ号：</label><input type="text" id="qq">
                    </div>
                    <div class="input-group">
                        <label>微信号：</label><input type="text" id="wx">
                    </div>
                    <div class="f1">
                        <button class="btn" id="submit">保存</button>
                    </div>
                </div>

            </div>
        </div>
        <?php include("../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("usered");</script>
    <script src="/web/iframe_userhome/js/provinces.js"></script>
    <script src="/web/iframe_userhome/usered/js/u1.js"></script>
</body>
</html>