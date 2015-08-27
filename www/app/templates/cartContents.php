<table border="1">
	<caption>Cart Contents</caption>
	<tr>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Total Price</th>
		<th>Change Quantity</th>
	</tr>

<?php

// Loop over each item in the cart
foreach( $_SESSION['cart'] as $cartItem ) :
	
?>

<tr>
	<td><?= $cartItem['name']; ?></td>
	<td><?= $cartItem['quantity']; ?></td>
	<td><?= number_format($cartItem['price'], 2); ?></td>
	<td><?= number_format($cartItem['quantity'] * $cartItem['price'], 2); ?></td>
</tr>

<?php endforeach; ?>

</table>

<a href="make-payment.php">Proceed to Payment</a>