<?php
/**
 * BiblioIndex Processor
 * محرك الترتيب والترقيم الآلي
 */

// 1. دالة معالجة النصوص للفرز (تجاهل ال التعريف)
function sort_clean($text) {
    $text = trim($text);
    // إزالة ال التعريف من بداية الكلمة فقط لأغراض الترتيب
    return preg_replace('/^ال/', '', $text);
}

// 2. دالة الترتيب الرئيسي
function biblio_sort(&$data) {
    usort($data, function($a, $b) {
        // ترتيب أولاً حسب رأس الموضوع
        $res = strcmp(sort_clean($a['subject']), sort_clean($b['subject']));
        // إذا تساوى رأس الموضوع، يتم الترتيب حسب المؤلف
        if ($res === 0) {
            return strcmp(sort_clean($a['author']), sort_clean($b['author']));
        }
        return $res;
    });
}

// 3. دالة توليد الأرقام المسلسلة (تبدأ من 1 بعد الترتيب)
function assign_serial_numbers(&$data, $start = 1) {
    foreach ($data as $key => $item) {
        $data[$key]['serial'] = $start + $key;
    }
}

/**
 * ملاحظة للعمل المستقبلي: 
 * هنا سيتم إضافة الكود الخاص بقراءة ملف الإكسل (Upload & Parse)
 * وتصدير النتائج إلى Word أو HTML المعاينة.
 */
?>
