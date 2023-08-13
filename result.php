<?php
// Check if session is not started, then start the session
if (!isset($_SESSION)) {
    session_start();
}

// Redirect to index.php if user is not logged in
if (!isset($_SESSION['UserLogin'])) {
    header("Location: index.php");
    exit();
}

// Include the database connection file
include_once("connections/connection.php");
$con = connection();

// Get the search input values from the URL 
$search = isset($_GET['searchname']) ? $_GET['searchname'] : '';
$searchYear = isset($_GET['searchyear']) ? $_GET['searchyear'] : '';

// Retrieve the distinct school years from the table
$yearsQuery = "SELECT DISTINCT school_year FROM students_list_old";
$yearsResult = $con->query($yearsQuery) or die($con->error);

if ($searchYear == 'all') {
    // Retrieve students without filtering by school year
    $sql = "SELECT * FROM students_list_old
        WHERE last_name LIKE '%$search%' OR first_name LIKE '%$search%'
        ORDER BY id DESC";
} else {
    if ($search == '') {
        // Retrieve students filtered by school year without applying the name filter
        $sql = "SELECT * FROM students_list_old
            WHERE school_year = '$searchYear'
            ORDER BY id DESC";
    } else {
        // Retrieve students filtered by both school year and name
        $sql = "SELECT * FROM students_list_old
            WHERE school_year = '$searchYear'
            AND (last_name LIKE '%$search%' OR first_name LIKE '%$search%')
            ORDER BY id DESC";
    }
}

// Execute the SQL query to get the students
$students = $con->query($sql) or die($con->error);
$numRows = mysqli_num_rows($students);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="icon" href="images/SRNHSlogo.png">
    <title>STS | Students' List</title>
</head>
<body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-user">
                    <div class="show-access">
                        <i class="fa-regular fa-circle-user"></i>
                        <marquee behavior="scroll" loop="infinite" scrollamount="5" direction="left">
                        <?php
                        if (isset($_SESSION['UserLogin'])) {
                            if ($_SESSION['Access'] === 'administrator') {
                                echo "Welcome! Admin";
                            } else {
                                echo $_SESSION['UserLogin'];
                            }
                        } else {
                            header("Location: index.php");
                        }
                        ?>
                        </marquee>
                    </div>
                </li>
                <li>
                    <a href="list.php" target="_self">  
                        <i class="fa-solid fa-table-list"></i> Students List
                    </a>
                </li>
            </ul>
            <div class="signout-btn">
                <li>
                    <?php if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") { ?>
                        <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <?php } elseif(isset($_SESSION['Access']) && $_SESSION['Access'] !== "administrator") { ?>
                        <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <?php } else { ?>
                        <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <?php } ?>
                </li>
            </div>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="top-section">
                    <button class="menu-btn" id="menu-toggle">
                        <span><i class="fa-solid fa-bars-staggered"></i></span>
                    </button>
                    <div class="clock-container">
                        <i class="fa-regular fa-calendar"></i><div id="clock"></div>
                    </div>
                </div>
                <div class="section-header">
                    <h1>Students List <i class="fa fa-list"></i>
                </h1>
                    <hr class="section-divider">
                </div> 
                <div class="main-content">
                    <div class="table-controls">
                        <div class="search-tab">
                            <form class="search-form" action="result.php" method="get">
                                <div class="submit-button">
                                    <button type="submit" class="btn">Search</button>
                                </div>
                                <div class="name-filter">
                                    <input class="search-input" placeholder="search student..." type="search" name="searchname" pattern="[a-zA-Z0-9_\d.\s]*|[1-9][0-9]*" autocomplete="off" minlength="2" maxlength="15" value="<?php echo $_GET['searchname'] ?>">
                                </div>
                                <div class="year-filter">
                                    <select class="search-input" name="searchyear">
                                        <option value="all">All</option>
                                        <?php
                                        // Create an empty array to store the school years
                                        $yearList = array();

                                        // Fetch each school year from the query result and add it to the year list array
                                        while ($row = $yearsResult->fetch_assoc()) {
                                            $yearList[] = $row['school_year'];
                                        }

                                        // Sort the year list in ascending order
                                        sort($yearList);

                                        // Iterate through each year in the year list
                                        foreach ($yearList as $year) {
                                            // Check if the current year matches the selected year in the search
                                            $selected = ($searchYear == $year) ? 'selected' : '';

                                            // Output the option element with the year value and selected attribute if applicable
                                            echo "<option value='$year' $selected>$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="table-con-action">
                        <?php if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") { ?>
                            <button class="btn">
                                <a class="add" href="add.php">Add <i class="fa-solid fa-user-plus"></i></a>
                            </button>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table">
                            <tr class="table-headers">
                                <th class="th thcenter">School Year</th>
                                <th class="th thcenter">Last Name</th>
                                <th class="th thcenter">First Name</th>
                                <th class="th thcenter">Middle Name</th>
                                <th class="th thcenter">Birth Date</th>
                                <th class="th hgender">Gender</th>
                                <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") { ?>
                                    <th class="th hdetails">Details</th>
                                <?php } ?>
                            </tr>
                            <?php
                            // Check if a search term is provided
                            if ($search != '') {
                                // Check if there are students matching the search criteria
                                if ($students->num_rows > 0) {
                                    // Iterate through each student record
                                    while ($row = $students->fetch_assoc()) { ?>
                                        <tr class="row-list">
                                            <td class="td tdcenter"><?php echo $row['school_year']; ?></td>
                                            <td class="td "><?php echo $row['last_name']; ?></td>
                                            <td class="td "><?php echo $row['first_name']; ?></td>
                                            <td class="td "><?php echo $row['middle_name']; ?></td>
                                            <td class="td "><?php echo $row['date_of_birth']; ?></td>
                                            <td class="td tdcenter"><?php echo $row['gender']; ?></td>
                                            <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"): ?>
                                                <td class="td view rdetails">
                                                    <a href="info.php?ID=<?php echo $row['id']; ?>">View</a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php }
                                } else {
                                    // No matching records found
                                    if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
                                        echo "<tr><td colspan='7' style='text-align: center;'>No records found. <i class='fa-solid fa-triangle-exclamation' style='color: orange;'></i></td></tr>";
                                    } else {
                                        echo "<tr><td colspan='6' style='text-align: center;'>No records found. <i class='fa-solid fa-triangle-exclamation' style='color: orange;'></i></td></tr>";
                                    }
                                }
                            } else {
                                // No search term provided
                                if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
                                    echo "<tr><td colspan='7' style='text-align: center;'>No records found. <i class='fa-solid fa-triangle-exclamation' style='color: orange;'></i></td></tr>";
                                } else {
                                    echo "<tr><td colspan='6' style='text-align: center;'>No records found. <i class='fa-solid fa-triangle-exclamation' style='color: orange;'></i></td></tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/clock.js"></script>
<script src="js/script.js"></script>
</html>