<?php
// Start a session if one doesn't already exist
if (!isset($_SESSION)) {
    session_start();
}

// Include the file containing the database connection code
include_once("connections/connection.php");

// Establish a database connection using the connection() function
$con = connection();

// Variable to store error messages
$error = "";

// Check if the registration form is submitted
if (isset($_POST['signup'])) {
    // Get the entered username, password, and confirm password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $access = "guest"; // Set the access level to "guest"

    // Query the database to check if the username already exists
    $checkUsernameQuery = "SELECT * FROM user_list WHERE username = '$username'";
    $result = $con->query($checkUsernameQuery) or die($con->error);

    // Get the total number of rows returned by the query
    $total = $result->num_rows;

    // If the username already exists in the database
    if ($total > 0) {
        $error = "Account already exists!";
    } elseif ($password !== $confirmPassword) {
        // If the passwords do not match
        $error = "Passwords do not match!";
    } else {
        // Insert the new user into the database with access level as "guest"
        $insertQuery = "INSERT INTO user_list (username, password, access) VALUES ('$username', '$password', '$access')";
        $con->query($insertQuery) or die($con->error);

        // Redirect to the login page after successful registration
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/signup.css">
    <style>
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.4;
            background-image: url(images/aerialview.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <link rel="icon" href="images/Logo.png">
    <title>STS | Sign in</title>
</head>
<body>
    <div class="parent-container">
		<div class="background-image"></div>
		<div class="left-container">
			<div class="left-content">
                <div class="login-image">
                    <img src="images/school_logo.png" alt="login image">
                </div>
                <div class="logo-text">
                    <h2>Santa Rosa National High School</h2>
                    <h4><span>-</span> Santa Rosa, Nueva Ecija <span>-</span></h4>
                    <p>School ID: 306801</p>
                </div>
            </div>
            <div class="about">
                <p><span><a href="about.html" target="_blank">About</a></span> SRNHSSTS v1.4</p>
            </div>
		</div>
		<div class="right-container">
			<div class="form-logo">
				<img src="images/deped_logo.png" alt="DepEd logo">
			</div>
			<div class="login">
				<label class="login-text" aria-hidden="true">Sign up</label>
				<form class="form" method="post">
					<div class="input-container">
                        <input type="email" name="username" class="input" placeholder="email" maxlength="30" minlength="8" autocomplete="off" required spellcheck="false">
                            <i class="fas fa-circle-user"></i>
                        <div class="highlight"></div>
					</div>
					<div class="input-container">
                        <input type="password" name="password" class="input" placeholder="Password" maxlength="20" minlength="8" autocomplete="off" required spellcheck="false">
                            <i class="fas fa-lock"></i>
                        <div class="highlight"></div>
					</div>
                    <div class="indicator">
                        <div class="icon-text">
                            <p class="text"></p>
                        </div>
                    </div>
					<div class="input-container">
                        <input type="password" name="confirm_password" class="input" placeholder="Confirm Password" maxlength="20" minlength="8" autocomplete="off" required inputmode="text" spellcheck="false">
                            <i class="fas fa-lock"></i>
                        <div class="highlight"></div>
					</div>
					<button value="signup" name="signup" type="submit">Sign up</button>
				</form>
				<div class="signup">
					<p>Already have an account? <span><a href="index.php">Sign in</a></span></p>
				</div>
			</div>
			<div class="footer">
				<p><span>Address:</span> Brgy. Soledad, Santa Rosa, Nueva Ecija, 3101</p>
				<p><span>Telephone No.:</span> (044) 803-9902/(044) 960-8964</p>
				<p><span>Email Address: </span><a href="mailto:306801@deped.gov.ph">306801@deped.gov.ph</a></p>
			</div>
		</div>
		</div>		  
	</div>
        
    <div class="error-container<?php echo !empty($error) ? ' active' : ''; ?>" id="errorContainer">
        <span class="error-message"><?php echo $error; ?></span>
        <span class="error-close" onclick="closeError()"><i class="fa-solid fa-xmark"></i></span>
    </div>

</body>
<script>
    function closeError() {
        var errorContainer = document.getElementById("errorContainer");
        errorContainer.classList.remove("active");
    }
</script>
<script src="js/script.js"></script>
</html>