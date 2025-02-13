<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lisaa"])) {
    $nimi = $_POST["juoman_nimi"];

    // SQL-injektion esto (tärkeää!)
    $nimi = mysqli_real_escape_string($conn, $nimi);

    if (!empty($nimi)) {
        $sql = "INSERT INTO juomat (nimi) VALUES ('$nimi')";
        if ($conn->query($sql) === TRUE) {
            echo "Uusi juoma lisätty onnistuneesti.";
        } else {
            echo "Virhe: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Juoman nimi ei voi olla tyhjä.";
    }
}

include 'ylaosa.html';
?>

<h1>Lisää uusi juoma</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Juoman nimi: <input type="text" name="juoman_nimi"><br>
    <input type="submit" name="lisaa" value="Lisää">
</form>
<a href="index.php">Takaisin listaukseen</a>

<?php
include 'alaosa.html';
?>