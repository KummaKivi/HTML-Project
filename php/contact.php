<?php
session_start();
include 'includes/contact/header.html';
include 'includes/db.php';

$db = new Database();
$conn = $db->connect();
$stmt = $conn->query("SELECT * FROM contacts");
$paintings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="contact-form">
<?php foreach ($paintings as $painting): ?>
    <h2>Contact Us</h2>
    <form id="contact-form">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
    <?php endforeach; ?>
</div>

<?php include 'includes/contact/footer.html'; ?>