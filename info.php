<?php

// Check if session is not already started and start the session
if (!isset($_SESSION)) {
    session_start();
}

// Check if user is not logged in or has guest access, redirect to login page
if (!isset($_SESSION['UserLogin']) || $_SESSION['Access'] == "guest") {
    header("Location: login.php");
    exit();
}

// Include the connection.php file to establish database connection
include_once("connections/connection.php");
$con = connection();

if (isset($_GET['ID'])) {
    // Get the ID of the student from the URL parameter
    $id = $_GET['ID'];

    // Retrieve the student record from the database based on the ID
    $sql = "SELECT * FROM students_list_old WHERE id = '$id'";
    $students = $con->query($sql) or die ($con->error);
    $row = $students->fetch_assoc();

} else {
    // If ID is not provided in the URL parameter, redirect to the list.php page
    header("Location: list.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="icon" href="images/SRNHSlogo.png">
    <title>STS | Student's Info</title>
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
                    <h1 data-aos="fade-right" style="font-weight: 400;"><span style="font-weight: 600;">
                    <?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?> <?php echo $row['name_ext']; ?>
                </span> Information</span> <i class="fa-solid fa-circle-info"></i></h1>
                    <hr class="section-divider">
                </div>
                <div class="main-content">
                    <div class="table-controls">
                        <div class="buttons-left">
                            <button class="btn">
                                <a href="list.php"><i class="fa-solid fa-chevron-left"></i> Back</a>
                            </button>
                            <button class="btn">
                                <a href="edit.php?ID=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            </button>
                        </div>
                        <div class="buttons-right">
                            <button class="export"><a href="generate_excel.php?id=<?php echo $id; ?>" data-aos="fade-left" data-aos-duration="600">EXPORT <i class="fa-solid fa-file-export"></i></a></button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table">
                            <tr>
                                <th class="th " colspan="8">SECONDARY STUDENT'S PERMANENT RECORD</th>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Name: 
                                    <span class="value">
                                        <?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?> <?php echo $row['name_ext']; ?>
                                    </span>
                                </td>
                                <td colspan="3" class="bold-letter">Citizenship: 
                                    <span class="value">
                                        <?php echo $row['citizenship']; ?>
                                    </span>
                                </td>
                                <td colspan="1" class="bold-letter">Gender: 
                                    <span class="value">
                                        <?php echo $row['gender']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">
                                <?php if ($row['with_lrn'] === 'TRUE'): ?>
                                    LRN:
                                    <span class="value">
                                        <?php echo $row['lrn']; ?>
                                    </span>
                                <?php elseif ($row['with_lrn'] === 'FALSE'): ?>
                                    Without LRN:
                                <?php endif; ?>
                                </td>
                                <td colspan="4" class="bold-letter">Date of Birth:
                                    <span class="value">
                                        <?php echo $row['date_of_birth']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Place of Birth:
                                    <span class="value">
                                        <?php echo $row['place_of_birth']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Address:
                                    <span class="value">
                                        <?php echo $row['stu_address']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr colspan="8">
                                <td colspan="4" class="bold-letter">Guardian:
                                    <span class="value">
                                        <?php echo $row['guardian']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Occupation:
                                    <span class="value">
                                        <?php echo $row['occupation']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="bold-letter">Inter. Course Cpl.:
                                    <span class="value">
                                        <?php echo $row['inter_course_com']; ?>
                                    </span>
                                </td>
                                <td colspan="1" class="bold-letter">School year:
                                    <span class="value">
                                        <?php echo $row['school_year']; ?>
                                    </span>
                                </td>
                                <td colspan="1" class="bold-letter">General Average:
                                    <span class="value">
                                        <?php echo $row['general_average']; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table class="table"> 
                            <tr>
                                <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl1_sy1']; ?></th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <span class="value">
                                        <?php echo $row['tbl1_school1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <span class="value">
                                        <?php echo $row['tbl1_ca1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <span class="value">
                                        <?php echo $row['tbl1_sy1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="record-header">
                                <td colspan="1" class="bold-letter tdcenter tdcurryr" style="font-weight: 500;"> 
                                    Curr Yr.
                                </td>
                                <td colspan="4" class="bold-letter tdcenter" style="font-weight: 600; text-transform: uppercase;"> 
                                    Subject
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Final Rating
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Action Taken
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Credits Earned
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter"> 
                                    <?php echo $row['tbl1_crr_yr1']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl1_sub1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub1_fr1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub1_at1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub1_ce1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr2']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl1_sub2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub2_fr2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub2_at2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub2_ce2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr3']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl1_sub3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub3_fr3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub3_at3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub3_ce3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr4']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl1_sub4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub4_fr4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub4_at4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub4_ce4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr5']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl1_sub5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub5_fr5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub5_at5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub5_ce5']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr6']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl1_sub6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub6_fr6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub6_at6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub6_ce6']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr7']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl1_sub7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub7_fr7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub7_at7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub7_ce7']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr8']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl1_sub8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub8_fr8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub8_at8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub8_ce8']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">   
                                    <?php echo $row['tbl1_crr_yr9']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl1_sub9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub9_fr9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub9_at9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub9_ce9']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl1_crr_yr10']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl1_sub10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl1_sub10_fr10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub10_at10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl1_sub10_ce10']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <span class="value">
                                        <?php echo $row['tbl1_dayofschool1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <span class="value">
                                        <?php echo $row['tbl1_unitearned1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <span class="value">
                                        <?php echo $row['tbl1_daypresent1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <span class="value">
                                        <?php echo $row['tbl1_average']; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table class="table"> 
                            <tr>
                                <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl2_sy1']; ?></th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <span class="value">
                                        <?php echo $row['tbl2_school1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <span class="value">
                                        <?php echo $row['tbl2_ca1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <span class="value">
                                        <?php echo $row['tbl2_sy1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="record-header">
                                <td colspan="1" class="bold-letter tdcenter tdcurryr" style="font-weight: 500;"> 
                                    Curr Yr.
                                </td>
                                <td colspan="4" class="bold-letter tdcenter" style="font-weight: 600; text-transform: uppercase;"> 
                                    Subject
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Final Rating
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Action Taken
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Credits Earned
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr1']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl2_sub1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub1_fr1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub1_at1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub1_ce1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr2']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl2_sub2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub2_fr2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub2_at2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub2_ce2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr3']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl2_sub3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub3_fr3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub3_at3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub3_ce3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr4']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl2_sub4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub4_fr4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub4_at4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub4_ce4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr5']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl2_sub5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub5_fr5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub5_at5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub5_ce5']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr6']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl2_sub6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub6_fr6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub6_at6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub6_ce6']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr7']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl2_sub7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub7_fr7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub7_at7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub7_ce7']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr8']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl2_sub8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub8_fr8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub8_at8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub8_ce8']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr9']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl2_sub9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub9_fr9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub9_at9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub9_ce9']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl2_crr_yr10']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl2_sub10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl2_sub10_fr10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub10_at10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl2_sub10_ce10']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <span class="value">
                                        <?php echo $row['tbl2_dayofschool1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <span class="value">
                                        <?php echo $row['tbl2_unitearned1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <span class="value">
                                        <?php echo $row['tbl2_daypresent1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <span class="value">
                                        <?php echo $row['tbl2_average']; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table class="table"> 
                            <tr>
                                <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl3_sy1']; ?></th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <span class="value">
                                        <?php echo $row['tbl3_school1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <span class="value">
                                        <?php echo $row['tbl3_ca1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <span class="value">
                                        <?php echo $row['tbl3_sy1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="record-header">
                                <td colspan="1" class="bold-letter tdcenter tdcurryr" style="font-weight: 500;"> 
                                    Curr Yr.
                                </td>
                                <td colspan="4" class="bold-letter tdcenter" style="font-weight: 600; text-transform: uppercase;"> 
                                    Subject
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Final Rating
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Action Taken
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Credits Earned
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr1']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl3_sub1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub1_fr1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub1_at1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub1_ce1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr2']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl3_sub2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub2_fr2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub2_at2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub2_ce2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr3']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl3_sub3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub3_fr3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub3_at3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub3_ce3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr4']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl3_sub4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub4_fr4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub4_at4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub4_ce4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr5']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl3_sub5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub5_fr5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub5_at5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub5_ce5']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr6']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl3_sub6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub6_fr6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub6_at6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub6_ce6']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr7']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl3_sub7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub7_fr7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub7_at7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub7_ce7']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr8']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl3_sub8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub8_fr8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub8_at8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub8_ce8']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr9']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl3_sub9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub9_fr9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub9_at9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub9_ce9']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl3_crr_yr10']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl3_sub10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl3_sub10_fr10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub10_at10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl3_sub10_ce10']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <span class="value">
                                        <?php echo $row['tbl3_dayofschool1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <span class="value">
                                        <?php echo $row['tbl3_unitearned1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <span class="value">
                                        <?php echo $row['tbl3_daypresent1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <span class="value">
                                        <?php echo $row['tbl3_average']; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table class="table"> 
                            <tr>
                                <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl4_sy1']; ?></th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <span class="value">
                                        <?php echo $row['tbl4_school1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <span class="value">
                                        <?php echo $row['tbl4_ca1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <span class="value">
                                        <?php echo $row['tbl4_sy1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr class="record-header">
                                <td colspan="1" class="bold-letter tdcenter tdcurryr" style="font-weight: 500;"> 
                                    Curr Yr.
                                </td>
                                <td colspan="4" class="bold-letter tdcenter" style="font-weight: 600; text-transform: uppercase;"> 
                                    Subject
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Final Rating
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Action Taken
                                </td>
                                <td colspan="1" class="bold-letter tdcenter colshort" style="font-weight: 500;"> 
                                    Credits Earned
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr1']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl4_sub1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub1_fr1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub1_at1']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub1_ce1']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr2']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl4_sub2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub2_fr2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub2_at2']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub2_ce2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr3']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl4_sub3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub3_fr3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub3_at3']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub3_ce3']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr4']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl4_sub4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub4_fr4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub4_at4']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub4_ce4']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr5']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl4_sub5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub5_fr5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub5_at5']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub5_ce5']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr6']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl4_sub6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub6_fr6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub6_at6']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub6_ce6']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr7']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl4_sub7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub7_fr7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub7_at7']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub7_ce7']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr8']; ?>
                                </td>
                                <td colspan="4"> 
                                    <?php echo $row['tbl4_sub8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub8_fr8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub8_at8']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub8_ce8']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr9']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl4_sub9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub9_fr9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub9_at9']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub9_ce9']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="bold-letter tdcenter">
                                    <?php echo $row['tbl4_crr_yr10']; ?>
                                </td>
                                <td colspan="4">
                                    <?php echo $row['tbl4_sub10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter">
                                    <?php echo $row['tbl4_sub10_fr10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub10_at10']; ?>
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <?php echo $row['tbl4_sub10_ce10']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <span class="value">
                                        <?php echo $row['tbl4_dayofschool1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <span class="value">
                                        <?php echo $row['tbl4_unitearned1']; ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <span class="value">
                                        <?php echo $row['tbl4_daypresent1']; ?>
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <span class="value">
                                        <?php echo $row['tbl4_average']; ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <div class="footer-container">
                            <div class="cert-grad">
                                <div class="footer-title">
                                    <h3>CERTIFICATION OF GRADUATION</h3>
                                </div>
                                <div class="cert-grad-text">
                                    <p>Graduates as of <span><?php echo $row['cert_grad_1']; ?></span></p>
                                    <p>Under Special Order (A) No. <span><?php echo $row['cert_grad_2']; ?></span></p>
                                    <p>S. <span><?php echo $row['cert_grad_3']; ?></span></p>
                                </div>
                            </div>
                            <div class="transfer">
                                <div class="footer-title">
                                    <h3>TRANSFER</h3>
                                </div>
                                This cedrtifies that this is the true record of <span><?php echo $row['tran_1']; ?></span> is eligible for graduation to <span><?php echo $row['tran_2']; ?></span> student as regular/irregular and has no money/property responsibility in this school.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/clock.js"></script>
<script src="js/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>