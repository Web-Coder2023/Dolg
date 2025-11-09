<?php
header('Content-Type: application/json');

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Получение данных формы
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

// Валидация reCAPTCHA на сервере
$secretKey = '6LdvDgYsAAAAAOSXWiUwdzfgHtSDvAFTXkZyiPPY';
$verifyURL = 'https://www.google.com/recaptcha/api/siteverify';

$data = [
    'secret' => $secretKey,
    'response' => $recaptchaResponse,
    'remoteip' => $_SERVER['REMOTE_ADDR']
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$verify = file_get_contents($verifyURL, false, $context);
$captchaResult = json_decode($verify);

// Проверка результата reCAPTCHA
if (!$captchaResult->success) {
    echo json_encode([
        'success' => false, 
        'message' => 'Ошибка проверки reCAPTCHA. Попробуйте еще раз.'
    ]);
    exit;
}

// Проверка обязательных полей
if (empty($name) || empty($phone) || empty($email)) {
    echo json_encode([
        'success' => false, 
        'message' => 'Заполните все обязательные поля'
    ]);
    exit;
}

// Валидация email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false, 
        'message' => 'Неверный формат email'
    ]);
    exit;
}

// Здесь можно сохранить данные в базу данных или отправить email
// Пример отправки email администратору
$to = 'admin@example.com'; // Замените на свой email
$subject = 'Новая заявка с сайта';
$emailMessage = "
Новая заявка на обратный звонок:

Имя: $name
Телефон: $phone
Email: $email
Сообщение: $message
";

$headers = "From: noreply@example.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Отправка email
$mailSent = mail($to, $subject, $emailMessage, $headers);

if ($mailSent) {
    echo json_encode([
        'success' => true, 
        'message' => 'Заявка успешно отправлена'
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Ошибка отправки заявки'
    ]);
}
?>
