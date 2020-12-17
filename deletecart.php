<?php
session_start();
foreach ($_SESSION['cart'] as $key => $value) {
    if ($_SESSION['cart'][$key]["pro_id"] == $_GET['id']) {
        unset($_SESSION['cart'][$key]);
    }
}
echo "<script>alert('Item Deleted Successfully');window.location.href='cart.php'</script>";
