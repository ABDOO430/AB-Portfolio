<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Configuration
$to_email = "your-email@example.com"; // Change this to your email
$subject_prefix = "Portfolio Contact: ";

// Response array
$response = array('success' => false, 'message' => '');

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method';
    echo json_encode($response);
    exit;
}

// Sanitize and validate input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Get form data
$name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
$subject = isset($_POST['subject']) ? sanitize_input($_POST['subject']) : '';
$message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

// Validation
$errors = array();

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!validate_email($email)) {
    $errors[] = 'Invalid email format';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// Check for errors
if (!empty($errors)) {
    $response['message'] = implode(', ', $errors);
    echo json_encode($response);
    exit;
}

// Prepare email content
$email_subject = $subject_prefix . $subject;
$email_body = "
New contact form submission from your portfolio website:

Name: $name
Email: $email
Subject: $subject

Message:
$message

---
Sent from: " . $_SERVER['HTTP_HOST'] . "
IP Address: " . $_SERVER['REMOTE_ADDR'] . "
User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "
Date: " . date('Y-m-d H:i:s');

// Email headers
$headers = array(
    'From: ' . $name . ' <' . $email . '>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8'
);

// Send email
try {
    $mail_sent = mail($to_email, $email_subject, $email_body, implode("\r\n", $headers));
    
    if ($mail_sent) {
        $response['success'] = true;
        $response['message'] = 'Message sent successfully!';
        
        // Log successful submission (optional)
        $log_entry = date('Y-m-d H:i:s') . " - Contact form submission from: $name ($email)\n";
        file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
        
    } else {
        $response['message'] = 'Failed to send email. Please try again later.';
    }
    
} catch (Exception $e) {
    $response['message'] = 'An error occurred while sending the email.';
    
    // Log error (optional)
    $error_log = date('Y-m-d H:i:s') . " - Email error: " . $e->getMessage() . "\n";
    file_put_contents('error_log.txt', $error_log, FILE_APPEND | LOCK_EX);
}

// Return JSON response
echo json_encode($response);

// Optional: Save to database
/*
function save_to_database($name, $email, $subject, $message) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=portfolio', $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $subject, $message]);
        
        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

// Uncomment to save to database
// save_to_database($name, $email, $subject, $message);
*/

// Optional: Send auto-reply to user
/*
function send_auto_reply($user_email, $user_name) {
    $reply_subject = "Thank you for contacting me!";
    $reply_body = "
Hi $user_name,

Thank you for reaching out through my portfolio website. I have received your message and will get back to you as soon as possible.

Best regards,
Alex Johnson
";
    
    $reply_headers = array(
        'From: Alex Johnson <noreply@yourwebsite.com>',
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8'
    );
    
    mail($user_email, $reply_subject, $reply_body, implode("\r\n", $reply_headers));
}

// Uncomment to send auto-reply
// if ($response['success']) {
//     send_auto_reply($email, $name);
// }
*/
?>