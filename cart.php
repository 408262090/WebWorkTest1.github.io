<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === 'reset') {
        unset($_SESSION['cart']);
        header('Location: index.html');
        exit;
    }
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $price = $_POST["price"];
    
    $cart[] = ['item' => $item, 'price' => $price];
    $_SESSION['cart'] = $cart;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>购物车</title>
</head>
<body>
    <h1>您的购物车</h1>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li><?= $item['item'] ?> - <?= $item['price'] ?>元</li>
        <?php endforeach; ?>
    </ul>
    <p>总价: <?= array_sum(array_column($cart, 'price')) ?>元</p>
    <form action="cart.php" method="post">
        <input type="hidden" name="action" value="reset">
        <input type="submit" value="清空购物车">
    </form>
</body>
</html>