// Создание или обновление карточки студента в CRM
function createOrUpdateStudent($studentId, $studentName, $courseName, $completionDate) {
    // Данные для создания или обновления карточки
    $fields = [
        'NAME' => $studentName,  // Имя студента
        'COMMENTS' => 'Курс: ' . $courseName . ' | Завершение: ' . $completionDate,  // Курс и дата завершения
        'UF_CRM_1234567890' => $studentId,  // Пользовательский поле для ID студента (например, для уникальной идентификации)
        // Другие необходимые поля, такие как телефон, email, и т.д.
    ];

    // API-запрос для добавления или обновления записи в CRM
    $url = 'https://yourdomain.bitrix24.com/rest/1/your-api-key/crm.contact.add.json';
    
    // Важно: передавать данные как URL-кодированные параметры
    $query = http_build_query(['fields' => $fields]);

    // Отправка запроса
    $response = file_get_contents($url . '?' . $query);

    if ($response) {
        $result = json_decode($response, true);
        if ($result['result']) {
            echo "Карточка студента обновлена или создана успешно!";
        } else {
            echo "Ошибка при обновлении карточки студента.";
        }
    } else {
        echo "Ошибка при отправке запроса.";
    }
}

// Пример использования
createOrUpdateStudent(12345, 'Иван Иванов', 'Подготовка к ЕГЭ по математике', '25 мая 2025 года');
