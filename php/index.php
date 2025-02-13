<?php
require_once 'db_connect.php';

// Juomien haku
$sql = "SELECT id, nimi FROM juomat";
$result = $conn->query($sql);

// Poisto
if (isset($_GET["poista"])) {
    $id = $_GET["poista"];
    $sql = "DELETE FROM juomat WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Juoma poistettu onnistuneesti.";
    } else {
        echo "Virhe: " . $sql . "<br>" . $conn->error;
    }
}

// Muokkaus
if (isset($_GET["muokkaa"])) {
    $id = $_GET["muokkaa"];
    $sql_juoma = "SELECT nimi FROM juomat WHERE id = $id";
    $result_juoma = $conn->query($sql_juoma);
    if ($result_juoma->num_rows > 0) {
        $row_juoma = $result_juoma->fetch_assoc();
        $muokattava_nimi = $row_juoma["nimi"];
    } else {
        echo "Juomaa ei löydy.";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["paivita"])) {
        $uusi_nimi = $_POST["juoman_nimi"];
        $sql = "UPDATE juomat SET nimi = '$uusi_nimi' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Juoma päivitetty onnistuneesti.";
        } else {
            echo "Virhe: " . $sql . "<br>" . $conn->error;
        }
    }
}

include 'ylaosa.html';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["nimi"] . " <a href='?muokkaa=" . $row["id"] . "'>Muokkaa</a> <a href='?poista=" . $row["id"] . "'>Poista</a><br>";
    }
} else {
    echo "Ei juomia.";
}

if (isset($_GET["muokkaa"])): ?>
    <h2>Muokkaa juomaa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?muokkaa=" . $id; ?>">
        Juoman nimi: <input type="text" name="juoman_nimi" value="<?php echo $muokattava_nimi; ?>"><br>
        <input type="submit" name="paivita" value="Päivitä">
    </form>
<?php endif;

include 'alaosa.html';
?>