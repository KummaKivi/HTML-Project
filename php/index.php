<?php
session_start();
include 'includes/index/header.html';
include 'includes/db.php';

$db = new Database();
$conn = $db->connect();
$stmt = $conn->query("SELECT * FROM paintings");
$paintings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="gallery">
    <?php foreach ($paintings as $painting): ?>
    <div class="painting">
        <img src="<?= $painting['image_path'] ?>" alt="<?= $painting['title'] ?>">
        <h3><?= $painting['title'] ?></h3>
        <p><?= $painting['description'] ?></p>
        <p>$<?= $painting['price'] ?></p>
        <button class="add-to-cart" data-id="<?= $painting['id'] ?>">Add to Cart</button>
    </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/index/footer.html'; ?>