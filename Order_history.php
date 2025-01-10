<?php 
require 'header.php';
require 'config.php';

$cus_id = $_SESSION['log_user'];

// Jika tombol "Delete" diklik
if (isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];

    // Query untuk menghapus pemesanan berdasarkan ID
    $delete_sql = "DELETE FROM orders WHERE order_id=$order_id AND cus_id=$cus_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Order deleted successfully.');</script>";
    } else {
        echo "<script>alert('Failed to delete the order.');</script>";
    }
}

// Query untuk menampilkan daftar pemesanan
$sql = "SELECT * FROM orders WHERE cus_id=$cus_id";
?>

<link rel="stylesheet" href="src/css/Order_history.css" type="text/css">

</head>
<body>

<center><h1>My Orders</h1></center>

<center>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Order ID</th>
        <th>Status</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>

<?php 
$order_results = $conn->query($sql);

if ($order_results->num_rows > 0) {
    while ($order_rows = $order_results->fetch_assoc()) {
        echo "<tr>";
        echo "<td><center>".$order_rows['order_id']."</center></td>";
        echo "<td><center>".$order_rows['order_status']."</center></td>";
        echo "<td><center>".$order_rows['address']."</center></td>";
        echo "<td><center>";
        
        // Tombol "View Details"
        echo "<form action='orderDetails.php' method='GET' style='display:inline;'>";
        echo "<input type='hidden' name='order_Id' value='".$order_rows['order_id']."'>";
        echo "<button type='submit'>View Details</button>";
        echo "</form> ";

        echo "</center></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'><center>No orders :(</center></td></tr>";
}
?>

</table>
</center>

<br><br>

<?php include 'footer.php'; ?>
