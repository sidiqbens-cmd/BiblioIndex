<?php
// تحديد مسار المجلد الذي سيحتوي على مشاريعك المختلفة
$projects_dir = 'projects/';

// إنشاء المجلد إذا لم يكن موجوداً
if (!is_dir($projects_dir)) {
    mkdir($projects_dir, 0777, true);
}

// جلب قائمة المجلدات داخل projects
$projects = array_filter(glob($projects_dir . '*'), 'is_dir');
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>BiblioIndex - لوحة التحكم</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .container { max-width: 900px; margin: 50px auto; padding: 20px; }
        .project-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px; }
        .project-card { background: #fff; padding: 20px; border: 1px dashed #ccc; text-align: center; border-radius: 10px; }
        .btn-main { background: #2ea44f; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>مرحباً بك في BiblioIndex</h1>
        <p>اختر مشروعاً ببليوغرافياً أو أنشئ واحداً جديداً.</p>

        <div class="project-list">
            <div class="project-card" style="border-style: solid; border-color: #2ea44f;">
                <h3>+ مشروع جديد</h3>
                <form action="create_project.php" method="POST">
                    <input type="text" name="project_name" placeholder="اسم المشروع (إنجليزي)" required style="width: 80%; padding: 5px; margin-bottom: 10px;">
                    <button type="submit" class="btn-main">إنشاء الآن</button>
                </form>
            </div>

            <?php foreach ($projects as $proj): ?>
                <div class="project-card">
                    <h3><?php echo basename($proj); ?></h3>
                    <a href="project_view.php?name=<?php echo basename($proj); ?>" class="btn-main" style="background: #0366d6;">فتح المشروع</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
