<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="login.css">
	<title>Login Page</title>
</head>

<body>
	<h1 style="
	font-size: 40px;
	border-bottom: 4px solid #191970;
	margin-bottom: 50px;
	pading-left:50%;
	padding-top: 50px;
	text-align:center;
	color:green;
	">
		Student Marks And Attendance Tracker
</h1>
	<form action="validate.php" method="POST">
		<div class="login-box">
			<h1>Login</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Username"
						name="username"  value="" required>
			</div>
			<div class="textbox">
			<i class="fa fa-dropbox"  aria-hidden="true"></i>
				<select name="type" style="display: block;width: 90%;font-size: 0.8em;padding: 0.3rem 0.5rem;border: 1px solid #333;" id="">
    			<option value="admin">admin</option>
  				<option value="student">student</option>
  				<option value="faculty">faculty</option>
				</select>
			</div>
			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password"
						name="password" value="" required>
			</div>

			<input class="button" type="submit"
					name="login" value="Sign In">
		</div>
	</form>
</body>

</html>
