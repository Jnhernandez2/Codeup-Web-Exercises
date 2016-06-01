
<?php
  var_dump($_GET);
  var_dump($_POST);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My First HTML Form</title>
	</head>
	<body>
		<h2>User Login</h2>
		<form method="POST" action="/my_first_form.php">
			<div>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Username Here">
			</div>
			<div>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Password Here">
			</div>
			<div>
				<button type="submit">Tell Me Your Secrets</button>
			</div>
		</form>
		<h2>Compose an Email</h2>
		<form method="POST" action="/my_first_form.php">
			<div>
				<label for="To">To</label>
				<input id="To" name="To" type="text" placeholder="Type recipient email here.">
			</div>
			<div>
				<label for="From">From</label>
				<input id="From" name="From" type="text" placeholder="Type your email here.">
			</div>
			<div>
				<label for="Subject">Subject</label>
				<input id="Subject" name="Subject" type="text" placeholder="Summarize your message.">
			</div>
			<div>
				<textarea id="Email Body" name="Email Body" rows="30" cols="50" autofocus>Content Here</textarea>
			</div>
			<div>
				<label for="copysave">Save a copy to your inbox?</label>
				<input type="checkbox" name="copysave" id="copysave" value="yes" checked>
			</div>
			<div>
				<button type="submit">Send</button>
			</div>
		</form>
		<h2>Multiple Choice Test</h2>
		<form method="POST" action="/my_first_form.php">
			<div>
				Which type of bear is best?
			</div>
			<div>
				<label>
					<input type="radio" name="q1" value="black">
					Black
				</label>
				<label>
					<input type="radio" name="q1" value="brown">
					Brown
				</label>
				<label>
					<input type="radio" name="q1" value="polar">
					Polar
				</label>
				<label>
					<input type="radio" name="q1" value="teddy">
					Teddy
				</label>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
		<form method="POST" action="/my_first_form.php">
			<div>
				Which is the best for your health?
			</div>
			<div>
				<label>
					<input type="radio" name="q2" value="soda">
					Soda
				</label>
				<label>
					<input type="radio" name="q2" value="water">
					Water
				</label>
				<label>
					<input type="radio" name="q2" value="formaldihyde">
					Formaldihyde
				</label>
				<label>
					<input type="radio" name="q2" value="jet fuel">
					Jet Fuel
				</label>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
		<form method="POST" action="/my_first_form.php">
			<div>
				What is the capitol of Texas?
			</div>
			<div>
				<label><input type="checkbox" id="city1" name="city[]">San Antonio</label>
				<label><input type="checkbox" id="city2" name="city[]">Houston</label>
				<label><input type="checkbox" id="city3" name="city[]">Austin</label>
				<label><input type="checkbox" id="city4" name="city[]">Dallas</label>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
		<form>
			<div>
				<label for="shirt">Are you wearing a shirt?</label>
				<select id="shirt" name="shirt">
					<option value="1" selcted>Yes</option>
					<option value="0">No</option>
				</select>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
		<form>
			<div>
				<label for="shirtcolor">What color is your shirt?</label>
				<select id="shirtcolor" name="shirtcolor []" multiple>
					<option value="blue">Blue</option>
					<option value="green">Green</option>
					<option value="yellow">Yellow</option>
					<option value="white">White</option>
					<option value="black">Black</option>
				</select>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
	</body>
</html>