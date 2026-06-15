<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Quản lý</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Link CSS -->
    <link rel="stylesheet" href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/css/style.css">
</head>

<body>
    <div>
        <?php require_once "../app/views/layout/partial/header.php"; ?>
    </div>
    <div class='content-wrapper'>
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>
    <div class='footer'>
        <?php require_once "../app/views/layout/partial/footer.php"; ?>
    </div>
</body>

</html>