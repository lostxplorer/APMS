<?php $shop_id = $_GET["shop_id"];?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Appointment</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Create Appointment</h1>
		<form method="POST" action="book_appointment1.php">
			<input type="hidden" name="shop_id" value="<?php echo $shop_id; ?>">
			<div class="form-group">
				<label for="user_name">Name:</label>
				<input type="text" class="form-control" id="user_name" name="user_name" required>
			</div>
			<div class="form-group">
				<label for="user_phone">Phone:</label>
				<input type="tel" class="form-control" id="user_phone" name="user_phone" required>
			</div>
			<div class="form-group">
				<label for="user_email">Email:</label>
				<input type="email" class="form-control" id="user_email" name="user_email" required>
			</div>

			<button type="submit" class="btn btn-primary">Create Appointment</button>
		</form>
	</div>
</body>
</html>
