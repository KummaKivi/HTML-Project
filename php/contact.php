<?php
session_start();
include 'includes/contact/header.html';
include 'includes/db.php';

$db = new Database();
$conn = $db->connect();
$stmt = $conn->query("SELECT * FROM contacts");
$paintings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form id="contact-form" method="POST">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
</form>

<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $db = new Database();
    $conn = $db->connect();

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    echo json_encode(['success' => true]);
}
?>

<?php include 'includes/contact/footer.html'; ?>