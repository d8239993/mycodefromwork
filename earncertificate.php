require('fpdf.php'); // Подключаем библиотеку FPDF

function generateCertificate($studentName, $courseName, $completionDate, $studentId) {
    // Создаем объект FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Устанавливаем шрифт для сертификата
    $pdf->SetFont('Arial', 'B', 16);

    // Добавляем заголовок
    $pdf->Cell(200, 10, "СЕРТИФИКАТ ОБ ОКОНЧАНИИ КУРСА", 0, 1, 'C');

    // Переносим курсор для добавления информации
    $pdf->Ln(10); // Линейный перенос

    // Информация о студенте
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(200, 10, "Настоящим подтверждается, что", 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(200, 10, $studentName, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(200, 10, "успешно завершил(а) курс", 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(200, 10, $courseName, 0, 1, 'C');

    // Дата завершения
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(200, 10, "Дата завершения курса: " . $completionDate, 0, 1, 'C');

    // Добавляем место для подписи
    $pdf->Ln(20);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Подпись преподавателя: ______________", 0, 1, 'L');
    
    // Сохраняем PDF в файл
    $fileName = "certificate_" . $studentId . ".pdf";
    $pdf->Output('F', $fileName); // Сохранение на сервере

    // Возвращаем путь к сохраненному сертификату
    return $fileName;
}

// Пример использования
$studentName = "Иван Иванов";
$courseName = "Подготовка к ЕГЭ по математике";
$completionDate = "25 мая 2025 года";
$studentId = 12345;  // ID студента

$certificatePath = generateCertificate($studentName, $courseName, $completionDate, $studentId);

// Выводим путь к сертификату
echo "Сертификат был успешно сгенерирован: " . $certificatePath;
