// Отправка уведомления студенту через CRM
function sendNotificationToStudent($studentId, $message) {
    // Получаем email студента из CRM
    $studentEmail = getStudentEmailById($studentId);  // Функция для получения email студента из CRM

    // Формируем тело сообщения
    $subject = 'Новые материалы по курсу';
    $body = $message;

    // Отправка email через Bitrix24
    CEvent::Send('NEW_MATERIALS', SITE_ID, ['EMAIL' => $studentEmail, 'SUBJECT' => $subject, 'BODY' => $body]);

    echo "Уведомление отправлено!";
}

// Пример использования
sendNotificationToStudent(12345, 'Дорогой студент, были загружены новые материалы по курсу. Пожалуйста, ознакомьтесь с ними.');
