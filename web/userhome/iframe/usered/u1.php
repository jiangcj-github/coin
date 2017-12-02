<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>完善个人信息-淘币客</title>
    <link href="/web/layout/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/web/layout/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/left/css/left.css">
    <link rel="stylesheet" type="text/css" href="/web/userhome/iframe/usered/css/usered.css">
</head>
<body>
    <?php include("../../../layout/top.php") ?>
    <div class="layout">
        <div class="main u">
            <?php include("../../left/left.php") ?>
            <div class="right">
                <!--完善个人信息-->
                <div class="nav">
                    <div class="h3">完善个人信息</div>
                    <div class="f1 img-group x16">
                        <img src="/web/userhome/left/img/usered.svg">
                        <a href="/web/userhome/iframe/usered/usered.php">个人中心</a>
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
                        <script>$("#sex").val("<?php echo $_SESSION["login"]["sex"] ?>");</script>
                        <span class="info">选择性别</span>
                    </div>
                    <div class="input-group">
                        <label for="age">年龄：</label>
                        <input type="text" id="age" value="<?php echo $_SESSION["login"]["age"] ?>">
                        <span class="info">输入您的年龄</span>
                    </div>
                    <div class="input-group x2">
                        <label for="province">所在地：</label>
                        <select id="province" class="province"></select>
                        <select id="city" class="city"></select>
                        <span class="info">选择您所在的地区</span>
                    </div>
                    <div class="input-group">
                        <label>QQ号：</label>
                        <input type="text" id="qq" value="<?php echo $_SESSION["login"]["qq"] ?>">
                        <span class="info">您的QQ号码</span>
                    </div>
                    <div class="input-group">
                        <label>微信号：</label>
                        <input type="text" id="wx" value="<?php echo $_SESSION["login"]["wx"] ?>">
                        <span class="info">您的微信号码</span>
                    </div>
                    <div class="check-group">
                        <label>
                            <input type="checkbox" id="ispub" <?php if($_SESSION["login"]["ispub"]) echo "checked=\"checked\""; ?>>
                            <span>是否公开您的个人信息</span>
                        </label>
                        <span class="info">如果您选中此项，其他人在交易时可以看到这些信息。</span>
                    </div>
                    <div class="f1">
                        <button class="btn" id="submit">保存</button>
                    </div>
                </div>

            </div>
        </div>
        <?php include("../../../layout/footer.php") ?>
    </div>
    <script>left.activeItem("usered");</script>
    <script src="/web/userhome/iframe/usered/js/provinces.js"></script>
    <script>
        $("#province").val("<?php echo $_SESSION["login"]["province"] ?>").trigger("change");
        $("#city").val("<?php echo $_SESSION["login"]["city"] ?>");
    </script>
    <script src="/web/userhome/iframe/usered/js/u1.js"></script>
</body>
</html>