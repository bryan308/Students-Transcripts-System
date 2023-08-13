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

// Check if the login form is submitted
if (isset($_POST['login'])) {
    // Get the entered username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to find a matching user
    $sql = "SELECT * FROM user_list WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die($con->error);

    // Fetch the resulting row from the query
    $row = $user->fetch_assoc();

    // Get the total number of rows returned by the query
    $total = $user->num_rows;
    
    // If a user is found with the given username and password
    if ($total > 0) {
        // Store the username and access level in session variables
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];

        // Redirect to the appropriate page based on the user's access level
        if ($_SESSION['Access'] == "administrator") {
            header("Location: list.php");
            exit();
        } else {
            header("Location: list.php");
        }
    } else {
        // If no user is found, set an error message
        $error = "No User found!";
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
    <link rel="stylesheet" href="css/signin.css">
    <link rel="icon" href="images/Logo.png">
    <title>STS | Sign in</title>
</head>
<body>
    <style>
        .background-picture {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.4;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
        }
    </style>
    <div class="parent-container">
		<div class="background-picture" style="background-image: url('images/aerialview.png')"></div>
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
				<label class="login-text" aria-hidden="true">Sign in</label>
				<form class="form" method="post">
					<div class="input-container">
                        <input type="email" name="username" class="input" placeholder="email" maxlength="50" minlength="8" autocomplete="off" required spellcheck="false">
                            <i class="fas fa-circle-user"></i>
                        <div class="highlight"></div>
					</div>
					<div class="input-container">
                        <input type="password" name="password" class="input" placeholder="Password" maxlength="30" minlength="8" autocomplete="off" required spellcheck="false">
                            <i class="fas fa-lock"></i>
                        <div class="highlight"></div>
					</div>
					<button value="login" name="login" type="submit">Sign in</button>
				</form>
				<div class="signup">
					<p>Don't have an account? <span><a href="signup.php">Sign up</a></span></p>
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