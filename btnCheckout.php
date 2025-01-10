<?php 
require 'config.php';
session_start();

if (isset($_SESSION['log_user'])) {
    if (isset($_POST['btnCheckout'])) {
        // Tangkap data dari form
        $address = $_POST['address'];
        $cus_id = $_SESSION['log_user'];
        $payment_id = $_POST['delivery']; // Metode pembayaran
        $cart_id = $_GET['cartId'];

        // Tangani file bukti pembayaran
        $payment_proof = null;
        if (isset($_FILES['payment_proof']) && $_FILES['payment_proof']['error'] == 0) {
            $fileName = $_FILES['payment_proof']['name'];
            $fileTmp = $_FILES['payment_proof']['tmp_name'];
            $fileType = $_FILES['payment_proof']['type'];

            // Validasi tipe file (hanya JPG, PNG, dan PDF yang diperbolehkan)
            $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            if (in_array($fileType, $allowedTypes)) {
                $uploadDir = 'uploads/payment_proofs/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $destination = $uploadDir . basename($fileName);

                // Simpan file ke folder
                if (move_uploaded_file($fileTmp, $destination)) {
                    $payment_proof = $fileName;
                } else {
                    echo "<script>alert('Failed to upload payment proof.');</script>";
                }
            } else {
                echo "<script>alert('Invalid file type. Only JPG, PNG, and PDF are allowed.');</script>";
            }
        }

        // Masukkan data ke tabel orders
        $sqlOrder_tbl = "INSERT INTO orders (address, order_status, cus_id, courier_id, payment_id, payment_proof) 
                         VALUES ('$address', 'Diproses', '$cus_id', '1', '$payment_id', '$payment_proof')";
        if ($conn->query($sqlOrder_tbl)) {
            $order_id = $conn->insert_id;

            // Masukkan data ke tabel order_details
            $sqlCart_details_tbl = "SELECT * FROM cart_details WHERE cart_id=$cart_id";
            if ($rsltCart_details = $conn->query($sqlCart_details_tbl)) {
                if ($rsltCart_details->num_rows > 0) {
                    while ($rowsCart_details = $rsltCart_details->fetch_assoc()) {
                        $item_code = $rowsCart_details['item_code'];
                        $quantity = $rowsCart_details['quantity'];
                        $price = $rowsCart_details['price'] * $quantity;
                        $size = $rowsCart_details['size'];

                        $sqlOrder_details_tbl = "INSERT INTO order_details VALUES('$order_id', '$item_code', '$price', '$size', '$quantity')";
                        $conn->query($sqlOrder_details_tbl);

                        // Update stok item
                        $sqlItem_tbl = "UPDATE item SET stock = stock - $quantity WHERE item_code = $item_code";
                        $conn->query($sqlItem_tbl);
                    }

                    // Hapus data dari cart_details
                    $conn->query("DELETE FROM cart_details WHERE cart_id = $cart_id");
                }
            } else {
                echo "<script>alert('No items found in the cart.');</script>";
            }

            echo "<script>alert('Checkout successful!');</script>";
            header("Location: cart.php");
        } else {
            echo "<script>alert('Failed to place order.');</script>";
        }
    }
} else {
    echo "<script>alert('User has not logged in.');</script>";
}
?>
