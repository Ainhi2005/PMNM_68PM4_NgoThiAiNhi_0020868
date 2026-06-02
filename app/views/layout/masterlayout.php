<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PMNM_68PM4_NgoThiAiNhi_0020868 </title>
    <style>
        .header {
            width: 100%;
            height: 100px;
            background-color: #ff0505;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 100px;
            background-color: #407cff;
        }

        .content {
            width: 60%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div>
        <?php require_once "../app/views/layout/partial/header.php"; ?>
    </div>
    <div class='content'>
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>
    <div class='footer'>
        <?php require_once "../app/views/layout/partial/footer.php"; ?>
    </div>
</body>

</html>