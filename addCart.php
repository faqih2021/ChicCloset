<?php

session_start();
require 'config.php';

if (isset($_SESSION['log_user'])) { // check if the user is logged in

	$cus_id = $_SESSION['log_user'];

	if (isset($_POST['addCart'])) { // check if the button was pressed

		$sql = "SELECT * FROM cart WHERE cus_id=$cus_id"; // query cart id from cart table
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$cart_id = $row['cart_id'];
			}

			$item_name = $_GET['item_name']; // get the item name from itemDetails page using GET method
			$quantity = $_POST['qty']; // get size and quantity from item details page
			$size = $_POST['size'];

			$sqli = "SELECT * FROM item WHERE name='$item_name' AND size='$size'"; // query the item from item table
			$item_result = $conn->query($sqli);

			if ($item_result->num_rows > 0) {
				while ($item_rows = $item_result->fetch_assoc()) {
					$itm_id = $item_rows['item_code'];
					$price = $item_rows['unit_price'];
					$item_qty = $item_rows['stock'];
				}

				// Cek apakah item dengan ukuran tertentu sudah ada di cart_details
				$checkCartDetails = "SELECT * FROM cart_details WHERE item_code='$itm_id' AND cart_id='$cart_id' AND size='$size'";
				$cartDetailsResult = $conn->query($checkCartDetails);

				if ($cartDetailsResult->num_rows > 0) {
					// Item sudah ada di keranjang
					echo "<script>alert('Barang sudah dipilih, mohon update pada keranjang Anda jika ingin menambah produk.');</script>";
					header("Refresh:0; url=index.php"); // Redirect ke halaman Home

				} else {
					// Jika stok mencukupi, tambahkan ke cart_details
					if ($quantity <= $item_qty) {
						$sql_add = "INSERT INTO cart_details (item_code, cart_id, price, size, quantity) 
                                    VALUES ('$itm_id', '$cart_id', '$price', '$size', '$quantity')";

						if ($conn->query($sql_add)) {
							header("Location:cart.php"); // Redirect ke keranjang
						} else {
							echo "<script>alert('Gagal menambahkan barang ke keranjang.');</script>";
						}
					} else {
						echo "<script>alert('Stok tidak mencukupi');</script>"; // jika jumlah melebihi stok
					}
				}
			} else {
				echo "<script>alert('Barang tidak tersedia');</script>"; // jika barang tidak ditemukan
			}
		}
	}
} else {
	header("Location:login.php"); // Redirect ke halaman login
}
