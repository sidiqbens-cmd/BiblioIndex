<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['project_name'])) {
    // تنظيف اسم المشروع من المسافات والرموز
    $proj_name = preg_replace('/[^A-Za-z0-9_\-]/', '_', $_POST['project_name']);
    $target_dir = "projects/" . $proj_name;

    // إنشاء المجلد إذا لم يكن موجوداً
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
        
        // إنشاء ملف إعدادات بسيط داخل مجلد المشروع
        $config_content = "<?php \$project_title = '" . $_POST['project_name'] . "'; ?>";
        file_put_contents($target_dir . "/config.php", $config_content);
        
        echo "تم إنشاء المشروع بنجاح. <a href='index.php'>العودة للرئيسية</a>";
    } else {
        echo "المشروع موجود مسبقاً!";
    }
}
?>
