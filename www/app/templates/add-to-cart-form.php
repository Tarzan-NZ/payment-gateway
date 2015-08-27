<?php
	
	// If the user already has this item in the cart 
	// then we want to make sure thay can't add more
	// than what's in the database
	// If we subtract their cart quantity against the database quantity,
	// then we can help prevent this issue
	for ($i=0; $i<count($_SESSION['cart']); $i++) {
			
			// If the id of the product is the same as the one in the cart
			if ($row['ID'] == $_SESSION['cart'][$i]['id']) {
				$newQuantity = $row['quantity'] -= $_SESSION['cart'][$i]['quantity'];
				$inCart = $_SESSION['cart'][$i]['quantity'];
			}

		}

		// If the "$newQuantity" doesn't exist
		// Create it and apply the default database quantity
		if (!isset($newQuantity)) {
			$newQuantity = $row['quantity'];
		}

?>

<form action="index.php" method="POST">
	
	<label for="quantity<?= $row['ID']; ?>">Quantity</label>
	<input type="number" id="quantity<?= $row['ID']; ?>" name="quantity" value="1" min="1" max="<?= $newQuantity; ?>">

	<input type="hidden" name="product-id" value="<?= $row['ID']; ?>">
	<input type="submit" value="Add to cart" name="add-to-cart">

</form>

<?php
	
	// If the user has this item in their cart, tell them
	if (isset($inCart)) {
		echo '<ul>';
		echo '<li>Already in cart</li>';
		echo '<li>In Cart: '.$inCart.'</li>';
		echo '</ul>';

		unset($inCart);
	}

	unset($newQuantity);

?>