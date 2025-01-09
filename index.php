<?php
$conn = new mysqli("localhost", "root", "", "crud");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
}

$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <input type="text" name="name" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <button type="submit">Salvar</button>
    </form>

    <h2>Usuários</h2>
    <?php while ($row = $result->fetch_assoc()): ?>
        <p><?= $row["name"] ?> - <?= $row["email"] ?></p>
    <?php endwhile; ?>
</body>
</html>
