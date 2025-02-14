<?php
session_start();
include 'includes/index/header.html';
include 'includes/db.php';

$db = new Database();
$conn = $db->connect();
$stmt = $conn->query("SELECT * FROM paintings");
$paintings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="gallery">
    <h2>BUY NOW!</h2>
    <div class="image-grid">
        <?php foreach ($paintings as $painting): ?>
        <div class="painting-box">
            <div class="image-container">
                <img src="<?= $painting['image_path'] ?>" 
                     alt="<?= $painting['title'] ?>"
                     data-lightbox="gallery<?= $painting['id'] ?>">
            </div>
            <h3 style="color: white;"><?= $painting['title'] ?></h3>
            <p style="color: white;"><?= $painting['description'] ?></p>
            <button class="add-to-cart" data-id="<?= $painting['id'] ?>">Add to Cart</button>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/index/footer.html'; ?>