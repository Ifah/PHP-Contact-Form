<?php
session_start();

require_once 'helpers/security.php';

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Form</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="contact">
		<?php if(!empty($errors)): ?>
			<div class="panel">
				<ul>
					<li>
						<?php echo implode('</li><li>', $errors); ?>
					</li>
				</ul>
			</div>
		<?php endif; ?>
		<form action="contact.php" method="post">
			<label>
				Your name *
				<input type="text" name="name" autocomplete="off"<?php echo isset($fields['name']) ? ' value="' . e($fields['name']) . '"': ''; ?>>
			</label>
			<label>
				Your email *
				<input type="email" name="email" autocomplete="off"<?php echo isset($fields['email']) ? ' value="' . e($fields['email']) . '"': ''; ?>>
			</label>
			<label>
				Your message *
				<textarea name="message" rows="8"><?php echo isset($fields['message']) ? e($fields['message']) : ''; ?></textarea>
			</label>
			<input type="submit" value="Send">

			<p class="muted">* means a required field</p>
		</form>
	</div>
</body>
</html>
<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>