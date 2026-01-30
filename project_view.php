<?php 
// استدعاء المحرك من مجلد core
include_once 'core/processor.php'; 
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <title>محرر BiblioIndex</title>
</head>
<body>
    <div class="compact-grid">
        <div class="subject-header">إدخال سجل ببليوغرافي جديد</div>
        
        <div class="field-group"><label>رأس الموضوع</label><input type="text" id="f1"></div>
        <div class="field-group"><label>المؤلف</label><input type="text" id="f2"></div>
        <div class="field-group"><label>العنوان</label><input type="text" id="f3"></div>
        <div class="field-group"><label>المجلة</label><input type="text" id="f4"></div>
        <div class="field-group"><label>المجلد/العدد</label><input type="text" id="f5"></div>
        <div class="field-group"><label>السنة</label><input type="text" id="f6"></div>
        
        <div class="subject-header" style="background:#eee">القسم الثاني: الإحصاء</div>
        <div class="field-group"><label>جهة الإصدار</label><input type="text" id="f7"></div>
        <div class="field-group"><label>عدد المؤلفين</label><input type="number" id="f8"></div>
    </div>

    <script>
        // برمجة مفتاح Enter للانتقال السريع
        const inputs = document.querySelectorAll('input');
        inputs.forEach((input, index) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (index < inputs.length - 1) inputs[index + 1].focus();
                }
            });
        });
    </script>
</body>
</html>
