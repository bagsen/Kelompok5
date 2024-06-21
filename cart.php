<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    // Check if 'price' is set in $_POST, otherwise set a default value
    $price = isset($_POST['price']) ? $_POST['price'] : 0;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product])) {
        $_SESSION['cart'][$product]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$product] = ['price' => $price, 'quantity' => 1];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove'])) {
    $product = $_POST['product'];
    unset($_SESSION['cart'][$product]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    foreach ($_POST['quantity'] as $product => $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$product]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$product]);
        }
    }
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

foreach ($cart as $item) {
    // Ensure 'price' is set for each item in $_SESSION['cart']
    if (isset($item['price'])) {
        $total += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Keranjang Belanja</h1>
    <?php if (empty($cart)) : ?>
        <p>Keranjang Anda kosong. <a href="Service.php">Lanjutkan Belanja</a></p>
    <?php else : ?>
        <form method="POST" action="cart.php">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $product => $details) : ?>
                            <tr>
                                <td><?= htmlspecialchars($product) ?></td>
                                <td>Rp <?= number_format($details['price'], 0, ',', '.') ?></td>
                                <td>
                                    <input type="number" name="quantity[<?= htmlspecialchars($product) ?>]" class="form-control" value="<?= $details['quantity'] ?>" min="1">
                                </td>
                                <td>Rp <?= number_format($details['price'] * $details['quantity'], 0, ',', '.') ?></td>
                                <td>
                                    <button type="submit" name="remove" value="1" class="btn btn-danger">Hapus</button>
                                    <input type="hidden" name="product" value="<?= htmlspecialchars($product) ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="Service.php" class="btn btn-secondary btn-block">Lanjutkan Belanja</a>
                </div>
                <div class="col-md-6 text-right">
                    <p class="total">Total: Rp <?= number_format($total, 0, ',', '.') ?></p>
                    <button type="submit" name="update" value="1" class="btn btn-primary btn-block">Update Keranjang</button>
                    <a href="checkout.php" class="btn btn-success btn-block">Lanjut ke Pembayaran</a>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
