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

// Retrieve distinct school years from the database, ordered in descending order
$sql = "SELECT DISTINCT school_year FROM students_list_old ORDER BY school_year DESC";
$years = $con->query($sql) or die($con->error);

// Check if the form is submitted with a selected year
if (isset($_GET['searchyear']) && !empty($_GET['searchyear'])) {
    $selectedYear = $_GET['searchyear'];
    $sql = "SELECT * FROM students_list_old WHERE school_year = '$selectedYear' ORDER BY id DESC";
} else {
    $selectedYear = ""; // Empty value if no year is selected
    $sql = "SELECT * FROM students_list_old ORDER BY id DESC";
}

$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- AOS Library for scroll animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                    <a href="list.php" target="_self" class="active-menu">  
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
                    <h1 data-aos="fade-right">Students List 
                        <i class="fa-regular fa-rectangle-list"></i>
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
                                    <input class="search-input" placeholder="search student..." type="search" name="searchname" pattern="[a-zA-Z0-9_\d.\s]*|[1-9][0-9]*" autocomplete="off" minlength="2" maxlength="15" required>
                                </div>
                                <div class="year-filter">
                                    <select class="search-input" name="searchyear">
                                        <option value="">All</option>
                                        <?php
                                        $yearList = array();
                                        while ($year = $years->fetch_assoc()) {
                                            $yearList[] = $year['school_year'];
                                        }
                                        sort($yearList); // Sort the year list in ascending order
                                        foreach ($yearList as $year) {
                                            $selected = ($year === $selectedYear) ? 'selected' : '';
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
                                    <?php do { ?>
                                <tr class="row-list">
                                    <td class="td trcenter"><?php echo $row['school_year']; ?></td>
                                    <td class="td "><?php echo $row['last_name']; ?></td>
                                    <td class="td "><?php echo $row['first_name']; ?></td>
                                    <td class="td "><?php echo $row['middle_name']; ?></td>
                                    <td class="td "><?php echo $row['date_of_birth']; ?></td>
                                    <td class="td trcenter"><?php echo $row['gender']; ?></td>
                                    <?php if (isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") { ?>
                                        <td class="td view rdetails">
                                            <a href="info.php?ID=<?php echo $row['id']; ?>">View</a>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php } while ($row = $students->fetch_assoc()) ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="js/clock.js"></script>
<script src="js/theme.js"></script>
<script src="js/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>
