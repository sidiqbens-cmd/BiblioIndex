<?php
$project_name = $_GET['name'] ?? 'default';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>BiblioIndex - <?php echo $project_name; ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container-fluid">
        <h2>مشروع: <?php echo $project_name; ?></h2>
        
        <form id="biblioForm" class="compact-grid">
            <div class="subject-header">البيانات الببليوغرافية</div>
            <div class="field-group"><label>رأس الموضوع</label><input type="text" name="subject"></div>
            <div class="field-group"><label>إحالة انظر</label><input type="text" name="see"></div>
            <div class="field-group"><label>إحالة انظر أيضاً</label><input type="text" name="see_also"></div>
            
            <div class="field-group"><label>المؤلف</label><input type="text" name="author"></div>
            <div class="field-group"><label>العنوان</label><input type="text" name="title"></div>
            <div class="field-group"><label>المترجم</label><input type="text" name="translator"></div>
            
            <div class="field-group"><label>المجلة</label><input type="text" name="journal"></div>
            <div class="field-group"><label>المجلد/العدد</label><input type="text" name="issue"></div>
            <div class="field-group"><label>السنة</label><input type="text" name="year"></div>
            
            <div class="subject-header" style="background:#eee">القسم الثاني: الإحصاء</div>
            <div class="field-group"><label>جهة الإصدار</label><input type="text" name="publisher"></div>
            <div class="field-group"><label>عدد المؤلفين</label><input type="number" name="count"></div>
        </form>

        <div style="margin-top:20px;">
            <button class="btn-main" onclick="alert('تم تفعيل وضع المعاينة!')">حفظ (Enter)</button>
        </div>
    </div>

    <script>
        // سكربت الانتقال السريع بين الخانات بمفتاح Enter
        const inputs = document.querySelectorAll('input');
        inputs.forEach((input, index) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });
        });
    </script>
</body>
</html>
