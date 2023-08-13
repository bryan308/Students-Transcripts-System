<?php 

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['UserLogin']) || $_SESSION['Access'] == "guest") {
    header("Location: signin.php");
    exit();
}

include_once("connections/connection.php");
$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM students_list_old WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])) {

    $lastName = $_POST['last_name']; 
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $nameExt = $_POST['name_ext'];
    $citizenship = $_POST['citizenship'];
    $gender = $_POST['gender'];
    $lrn = $_POST['lrn'];
    $withLRN = $_POST['with_lrn'];
    $birthDate = $_POST['date_of_birth'];
    $placeBirth = $_POST['place_of_birth']; //10
    $address = $_POST['stu_address'];
    $guardian = $_POST['guardian'];
    $occupation = $_POST['occupation'];
    $interCourseComplete = $_POST['inter_course_com'];
    $schoolYear = $_POST['school_year'];
    $generalAverage = $_POST['general_average'];
    $table1School1 = $_POST['tbl1_school1'];
    $table1ClassifiedAs1 = $_POST['tbl1_ca1'];
    $table1SchoolYear1 = $_POST['tbl1_sy1'];
    $table1CurrYr1 = $_POST['tbl1_crr_yr1'];
    $table1CurrYr2 = $_POST['tbl1_crr_yr2'];
    $table1CurrYr3 = $_POST['tbl1_crr_yr3'];
    $table1CurrYr4 = $_POST['tbl1_crr_yr4'];
    $table1CurrYr5 = $_POST['tbl1_crr_yr5'];
    $table1CurrYr6 = $_POST['tbl1_crr_yr6'];
    $table1CurrYr7 = $_POST['tbl1_crr_yr7'];
    $table1CurrYr8 = $_POST['tbl1_crr_yr8'];
    $table1CurrYr9 = $_POST['tbl1_crr_yr9'];
    $table1CurrYr10 = $_POST['tbl1_crr_yr10'];
    $table1Sub1 = $_POST['tbl1_sub1'];
    $table1Sub2 = $_POST['tbl1_sub2'];
    $table1Sub3 = $_POST['tbl1_sub3'];
    $table1Sub4 = $_POST['tbl1_sub4'];
    $table1Sub5 = $_POST['tbl1_sub5'];
    $table1Sub6 = $_POST['tbl1_sub6'];
    $table1Sub7 = $_POST['tbl1_sub7'];
    $table1Sub8 = $_POST['tbl1_sub8'];
    $table1Sub9 = $_POST['tbl1_sub9'];
    $table1Sub10 = $_POST['tbl1_sub10'];
    $table1Subj1Fr1 = $_POST['tbl1_sub1_fr1'];
    $table1Subj1Fr2 = $_POST['tbl1_sub2_fr2'];
    $table1Subj1Fr3 = $_POST['tbl1_sub3_fr3'];
    $table1Subj1Fr4 = $_POST['tbl1_sub4_fr4'];
    $table1Subj1Fr5 = $_POST['tbl1_sub5_fr5'];
    $table1Subj1Fr6 = $_POST['tbl1_sub6_fr6'];
    $table1Subj1Fr7 = $_POST['tbl1_sub7_fr7'];
    $table1Subj1Fr8 = $_POST['tbl1_sub8_fr8'];
    $table1Subj1Fr9 = $_POST['tbl1_sub9_fr9'];
    $table1Subj1Fr10 = $_POST['tbl1_sub10_fr10'];
    $table1Subj1At1 = $_POST['tbl1_sub1_at1'];
    $table1Subj1At2 = $_POST['tbl1_sub2_at2'];
    $table1Subj1At3 = $_POST['tbl1_sub3_at3'];
    $table1Subj1At4 = $_POST['tbl1_sub4_at4'];
    $table1Subj1At5 = $_POST['tbl1_sub5_at5'];
    $table1Subj1At6 = $_POST['tbl1_sub6_at6'];
    $table1Subj1At7 = $_POST['tbl1_sub7_at7'];
    $table1Subj1At8 = $_POST['tbl1_sub8_at8'];
    $table1Subj1At9 = $_POST['tbl1_sub9_at9'];
    $table1Subj1At10 = $_POST['tbl1_sub10_at10'];
    $table1Subj1Ce1 = $_POST['tbl1_sub1_ce1'];
    $table1Subj1Ce2 = $_POST['tbl1_sub2_ce2'];
    $table1Subj1Ce3 = $_POST['tbl1_sub3_ce3'];
    $table1Subj1Ce4 = $_POST['tbl1_sub4_ce4'];
    $table1Subj1Ce5 = $_POST['tbl1_sub5_ce5'];
    $table1Subj1Ce6 = $_POST['tbl1_sub6_ce6'];
    $table1Subj1Ce7 = $_POST['tbl1_sub7_ce7'];
    $table1Subj1Ce8 = $_POST['tbl1_sub8_ce8'];
    $table1Subj1Ce9 = $_POST['tbl1_sub9_ce9'];
    $table1Subj1Ce10 = $_POST['tbl1_sub10_ce10'];
    $table1DayOfSchool = $_POST['tbl1_dayofschool1'];
    $table1DayOfPresent = $_POST['tbl1_daypresent1'];
    $table1UnitEarned1= $_POST['tbl1_unitearned1'];
    $table1Average = $_POST['tbl1_average'];
    $table2School1 = $_POST['tbl2_school1'];
    $table2ClassifiedAs1 = $_POST['tbl2_ca1'];
    $table2SchoolYear1 = $_POST['tbl2_sy1'];
    $table2CurrYr1 = $_POST['tbl2_crr_yr1'];
    $table2CurrYr2 = $_POST['tbl2_crr_yr2'];
    $table2CurrYr3 = $_POST['tbl2_crr_yr3'];
    $table2CurrYr4 = $_POST['tbl2_crr_yr4'];
    $table2CurrYr5 = $_POST['tbl2_crr_yr5'];
    $table2CurrYr6 = $_POST['tbl2_crr_yr6'];
    $table2CurrYr7 = $_POST['tbl2_crr_yr7'];
    $table2CurrYr8 = $_POST['tbl2_crr_yr8'];
    $table2CurrYr9 = $_POST['tbl2_crr_yr9'];
    $table2CurrYr10 = $_POST['tbl2_crr_yr10'];
    $table2Sub1 = $_POST['tbl2_sub1'];
    $table2Sub2 = $_POST['tbl2_sub2'];
    $table2Sub3 = $_POST['tbl2_sub3'];
    $table2Sub4 = $_POST['tbl2_sub4'];
    $table2Sub5 = $_POST['tbl2_sub5'];
    $table2Sub6 = $_POST['tbl2_sub6'];
    $table2Sub7 = $_POST['tbl2_sub7'];
    $table2Sub8 = $_POST['tbl2_sub8'];
    $table2Sub9 = $_POST['tbl2_sub9'];
    $table2Sub10 = $_POST['tbl2_sub10'];
    $table2Subj1Fr1 = $_POST['tbl2_sub1_fr1'];
    $table2Subj1Fr2 = $_POST['tbl2_sub2_fr2'];
    $table2Subj1Fr3 = $_POST['tbl2_sub3_fr3'];
    $table2Subj1Fr4 = $_POST['tbl2_sub4_fr4'];
    $table2Subj1Fr5 = $_POST['tbl2_sub5_fr5'];
    $table2Subj1Fr6 = $_POST['tbl2_sub6_fr6'];
    $table2Subj1Fr7 = $_POST['tbl2_sub7_fr7'];
    $table2Subj1Fr8 = $_POST['tbl2_sub8_fr8'];
    $table2Subj1Fr9 = $_POST['tbl2_sub9_fr9'];
    $table2Subj1Fr10 = $_POST['tbl2_sub10_fr10'];
    $table2Subj1At1 = $_POST['tbl2_sub1_at1'];
    $table2Subj1At2 = $_POST['tbl2_sub2_at2'];
    $table2Subj1At3 = $_POST['tbl2_sub3_at3'];
    $table2Subj1At4 = $_POST['tbl2_sub4_at4'];
    $table2Subj1At5 = $_POST['tbl2_sub5_at5'];
    $table2Subj1At6 = $_POST['tbl2_sub6_at6'];
    $table2Subj1At7 = $_POST['tbl2_sub7_at7'];
    $table2Subj1At8 = $_POST['tbl2_sub8_at8'];
    $table2Subj1At9 = $_POST['tbl2_sub9_at9'];
    $table2Subj1At10 = $_POST['tbl2_sub10_at10'];
    $table2Subj1Ce1 = $_POST['tbl2_sub1_ce1'];
    $table2Subj1Ce2 = $_POST['tbl2_sub2_ce2'];
    $table2Subj1Ce3 = $_POST['tbl2_sub3_ce3'];
    $table2Subj1Ce4 = $_POST['tbl2_sub4_ce4'];
    $table2Subj1Ce5 = $_POST['tbl2_sub5_ce5'];
    $table2Subj1Ce6 = $_POST['tbl2_sub6_ce6'];
    $table2Subj1Ce7 = $_POST['tbl2_sub7_ce7'];
    $table2Subj1Ce8 = $_POST['tbl2_sub8_ce8'];
    $table2Subj1Ce9 = $_POST['tbl2_sub9_ce9'];
    $table2Subj1Ce10 = $_POST['tbl2_sub10_ce10'];
    $table2DayOfSchool = $_POST['tbl2_dayofschool1'];
    $table2DayOfPresent = $_POST['tbl2_daypresent1'];
    $table2UnitEarned1= $_POST['tbl2_unitearned1'];
    $table2Average = $_POST['tbl2_average'];
    $table3School1 = $_POST['tbl3_school1'];
    $table3ClassifiedAs1 = $_POST['tbl3_ca1'];
    $table3SchoolYear1 = $_POST['tbl3_sy1'];
    $table3CurrYr1 = $_POST['tbl3_crr_yr1'];
    $table3CurrYr2 = $_POST['tbl3_crr_yr2'];
    $table3CurrYr3 = $_POST['tbl3_crr_yr3'];
    $table3CurrYr4 = $_POST['tbl3_crr_yr4'];
    $table3CurrYr5 = $_POST['tbl3_crr_yr5'];
    $table3CurrYr6 = $_POST['tbl3_crr_yr6'];
    $table3CurrYr7 = $_POST['tbl3_crr_yr7'];
    $table3CurrYr8 = $_POST['tbl3_crr_yr8'];
    $table3CurrYr9 = $_POST['tbl3_crr_yr9'];
    $table3CurrYr10 = $_POST['tbl3_crr_yr10'];
    $table3Sub1 = $_POST['tbl3_sub1'];
    $table3Sub2 = $_POST['tbl3_sub2'];
    $table3Sub3 = $_POST['tbl3_sub3'];
    $table3Sub4 = $_POST['tbl3_sub4'];
    $table3Sub5 = $_POST['tbl3_sub5'];
    $table3Sub6 = $_POST['tbl3_sub6'];
    $table3Sub7 = $_POST['tbl3_sub7'];
    $table3Sub8 = $_POST['tbl3_sub8'];
    $table3Sub9 = $_POST['tbl3_sub9'];
    $table3Sub10 = $_POST['tbl3_sub10'];
    $table3Subj1Fr1 = $_POST['tbl3_sub1_fr1'];
    $table3Subj1Fr2 = $_POST['tbl3_sub2_fr2'];
    $table3Subj1Fr3 = $_POST['tbl3_sub3_fr3'];
    $table3Subj1Fr4 = $_POST['tbl3_sub4_fr4'];
    $table3Subj1Fr5 = $_POST['tbl3_sub5_fr5'];
    $table3Subj1Fr6 = $_POST['tbl3_sub6_fr6'];
    $table3Subj1Fr7 = $_POST['tbl3_sub7_fr7'];
    $table3Subj1Fr8 = $_POST['tbl3_sub8_fr8'];
    $table3Subj1Fr9 = $_POST['tbl3_sub9_fr9'];
    $table3Subj1Fr10 = $_POST['tbl3_sub10_fr10'];
    $table3Subj1At1 = $_POST['tbl3_sub1_at1'];
    $table3Subj1At2 = $_POST['tbl3_sub2_at2'];
    $table3Subj1At3 = $_POST['tbl3_sub3_at3'];
    $table3Subj1At4 = $_POST['tbl3_sub4_at4'];
    $table3Subj1At5 = $_POST['tbl3_sub5_at5'];
    $table3Subj1At6 = $_POST['tbl3_sub6_at6'];
    $table3Subj1At7 = $_POST['tbl3_sub7_at7'];
    $table3Subj1At8 = $_POST['tbl3_sub8_at8'];
    $table3Subj1At9 = $_POST['tbl3_sub9_at9'];
    $table3Subj1At10 = $_POST['tbl3_sub10_at10'];
    $table3Subj1Ce1 = $_POST['tbl3_sub1_ce1'];
    $table3Subj1Ce2 = $_POST['tbl3_sub2_ce2'];
    $table3Subj1Ce3 = $_POST['tbl3_sub3_ce3'];
    $table3Subj1Ce4 = $_POST['tbl3_sub4_ce4'];
    $table3Subj1Ce5 = $_POST['tbl3_sub5_ce5'];
    $table3Subj1Ce6 = $_POST['tbl3_sub6_ce6'];
    $table3Subj1Ce7 = $_POST['tbl3_sub7_ce7'];
    $table3Subj1Ce8 = $_POST['tbl3_sub8_ce8'];
    $table3Subj1Ce9 = $_POST['tbl3_sub9_ce9'];
    $table3Subj1Ce10 = $_POST['tbl3_sub10_ce10'];
    $table3DayOfSchool = $_POST['tbl3_dayofschool1'];
    $table3DayOfPresent = $_POST['tbl3_daypresent1'];
    $table3UnitEarned1= $_POST['tbl3_unitearned1'];
    $table3Average = $_POST['tbl3_average'];
    $table4School1 = $_POST['tbl4_school1'];
    $table4ClassifiedAs1 = $_POST['tbl4_ca1'];
    $table4SchoolYear1 = $_POST['tbl4_sy1'];
    $table4CurrYr1 = $_POST['tbl4_crr_yr1'];
    $table4CurrYr2 = $_POST['tbl4_crr_yr2'];
    $table4CurrYr3 = $_POST['tbl4_crr_yr3'];
    $table4CurrYr4 = $_POST['tbl4_crr_yr4'];
    $table4CurrYr5 = $_POST['tbl4_crr_yr5'];
    $table4CurrYr6 = $_POST['tbl4_crr_yr6'];
    $table4CurrYr7 = $_POST['tbl4_crr_yr7'];
    $table4CurrYr8 = $_POST['tbl4_crr_yr8'];
    $table4CurrYr9 = $_POST['tbl4_crr_yr9'];
    $table4CurrYr10 = $_POST['tbl4_crr_yr10'];
    $table4Sub1 = $_POST['tbl4_sub1'];
    $table4Sub2 = $_POST['tbl4_sub2'];
    $table4Sub3 = $_POST['tbl4_sub3'];
    $table4Sub4 = $_POST['tbl4_sub4'];
    $table4Sub5 = $_POST['tbl4_sub5'];
    $table4Sub6 = $_POST['tbl4_sub6'];
    $table4Sub7 = $_POST['tbl4_sub7'];
    $table4Sub8 = $_POST['tbl4_sub8'];
    $table4Sub9 = $_POST['tbl4_sub9'];
    $table4Sub10 = $_POST['tbl4_sub10'];
    $table4Subj1Fr1 = $_POST['tbl4_sub1_fr1'];
    $table4Subj1Fr2 = $_POST['tbl4_sub2_fr2'];
    $table4Subj1Fr3 = $_POST['tbl4_sub3_fr3'];
    $table4Subj1Fr4 = $_POST['tbl4_sub4_fr4'];
    $table4Subj1Fr5 = $_POST['tbl4_sub5_fr5'];
    $table4Subj1Fr6 = $_POST['tbl4_sub6_fr6'];
    $table4Subj1Fr7 = $_POST['tbl4_sub7_fr7'];
    $table4Subj1Fr8 = $_POST['tbl4_sub8_fr8'];
    $table4Subj1Fr9 = $_POST['tbl4_sub9_fr9'];
    $table4Subj1Fr10 = $_POST['tbl4_sub10_fr10'];
    $table4Subj1At1 = $_POST['tbl4_sub1_at1'];
    $table4Subj1At2 = $_POST['tbl4_sub2_at2'];
    $table4Subj1At3 = $_POST['tbl4_sub3_at3'];
    $table4Subj1At4 = $_POST['tbl4_sub4_at4'];
    $table4Subj1At5 = $_POST['tbl4_sub5_at5'];
    $table4Subj1At6 = $_POST['tbl4_sub6_at6'];
    $table4Subj1At7 = $_POST['tbl4_sub7_at7'];
    $table4Subj1At8 = $_POST['tbl4_sub8_at8'];
    $table4Subj1At9 = $_POST['tbl4_sub9_at9'];
    $table4Subj1At10 = $_POST['tbl4_sub10_at10'];
    $table4Subj1Ce1 = $_POST['tbl4_sub1_ce1'];
    $table4Subj1Ce2 = $_POST['tbl4_sub2_ce2'];
    $table4Subj1Ce3 = $_POST['tbl4_sub3_ce3'];
    $table4Subj1Ce4 = $_POST['tbl4_sub4_ce4'];
    $table4Subj1Ce5 = $_POST['tbl4_sub5_ce5'];
    $table4Subj1Ce6 = $_POST['tbl4_sub6_ce6'];
    $table4Subj1Ce7 = $_POST['tbl4_sub7_ce7'];
    $table4Subj1Ce8 = $_POST['tbl4_sub8_ce8'];
    $table4Subj1Ce9 = $_POST['tbl4_sub9_ce9'];
    $table4Subj1Ce10 = $_POST['tbl4_sub10_ce10'];
    $table4DayOfSchool = $_POST['tbl4_dayofschool1'];
    $table4DayOfPresent = $_POST['tbl4_daypresent1'];
    $table4UnitEarned1= $_POST['tbl4_unitearned1'];
    $table4Average = $_POST['tbl4_average'];
    $cedrificateOfGrad1 = $_POST['cert_grad_1'];
    $cedrificateOfGrad2 = $_POST['cert_grad_2'];
    $cedrificateOfGrad3 = $_POST['cert_grad_3'];
    $transfer1 = $_POST['tran_1'];
    $transfer2 = $_POST['tran_2'];
    
    $sql = "UPDATE students_list_old SET 
    last_name = '$lastName',
    first_name = '$firstName', 
    name_ext = '$nameExt',
    middle_name = '$middleName', 
    citizenship = '$citizenship', 
    gender = '$gender', 
    lrn = '$lrn', 
    with_lrn = '$withLRN', 
    date_of_birth = '$birthDate', 
    place_of_birth = '$placeBirth', 
    guardian = '$guardian', 
    stu_address = '$address', 
    occupation = '$occupation', 
    inter_course_com = '$interCourseComplete', 
    school_year = '$schoolYear', 
    general_average = '$generalAverage',
    tbl1_school1 = '$table1School1',
    tbl1_ca1 = '$table1ClassifiedAs1',
    tbl1_sy1 = '$table1SchoolYear1', 
    tbl1_crr_yr1 = '$table1CurrYr1', 
    tbl1_crr_yr2 = '$table1CurrYr2', 
    tbl1_crr_yr3 = '$table1CurrYr3', 
    tbl1_crr_yr4 = '$table1CurrYr4', 
    tbl1_crr_yr5 = '$table1CurrYr5', 
    tbl1_crr_yr6 = '$table1CurrYr6', 
    tbl1_crr_yr7 = '$table1CurrYr7', 
    tbl1_crr_yr8 = '$table1CurrYr8', 
    tbl1_crr_yr9 = '$table1CurrYr9', 
    tbl1_crr_yr10 = '$table1CurrYr10', 
    tbl1_sub1 = '$table1Sub1',
    tbl1_sub2 = '$table1Sub2',
    tbl1_sub3 = '$table1Sub3',
    tbl1_sub4 = '$table1Sub4',
    tbl1_sub5 = '$table1Sub5',
    tbl1_sub6 = '$table1Sub6',
    tbl1_sub7 = '$table1Sub7',
    tbl1_sub8 = '$table1Sub8',
    tbl1_sub9 = '$table1Sub9',
    tbl1_sub10 = '$table1Sub10',
    tbl1_sub1_fr1 = '$table1Subj1Fr1',
    tbl1_sub2_fr2 = '$table1Subj1Fr2',
    tbl1_sub3_fr3 = '$table1Subj1Fr3',
    tbl1_sub4_fr4 = '$table1Subj1Fr4',
    tbl1_sub5_fr5 = '$table1Subj1Fr5',
    tbl1_sub6_fr6 = '$table1Subj1Fr6',
    tbl1_sub7_fr7 = '$table1Subj1Fr7',
    tbl1_sub8_fr8 = '$table1Subj1Fr8',
    tbl1_sub9_fr9 = '$table1Subj1Fr9',
    tbl1_sub10_fr10 = '$table1Subj1Fr10',
    tbl1_sub1_at1 = '$table1Subj1At1',
    tbl1_sub2_at2 = '$table1Subj1At2',
    tbl1_sub3_at3 = '$table1Subj1At3',
    tbl1_sub4_at4 = '$table1Subj1At4',
    tbl1_sub5_at5 = '$table1Subj1At5',
    tbl1_sub6_at6 = '$table1Subj1At6',
    tbl1_sub7_at7 = '$table1Subj1At7',
    tbl1_sub8_at8 = '$table1Subj1At8',
    tbl1_sub9_at9 = '$table1Subj1At9',
    tbl1_sub10_at10 = '$table1Subj1At10',
    tbl1_sub1_ce1 = '$table1Subj1Ce1',
    tbl1_sub2_ce2 = '$table1Subj1Ce2',
    tbl1_sub3_ce3 = '$table1Subj1Ce3',
    tbl1_sub4_ce4 = '$table1Subj1Ce4',
    tbl1_sub5_ce5 = '$table1Subj1Ce5',
    tbl1_sub6_ce6 = '$table1Subj1Ce6',
    tbl1_sub7_ce7 = '$table1Subj1Ce7',
    tbl1_sub8_ce8 = '$table1Subj1Ce8',
    tbl1_sub9_ce9 = '$table1Subj1Ce9',
    tbl1_sub10_ce10 = '$table1Subj1Ce10',
    tbl1_dayofschool1 = '$table1DayOfSchool',
    tbl1_daypresent1 = '$table1DayOfPresent',
    tbl1_unitearned1 = '$table1UnitEarned1',
    tbl1_average = '$table1Average',
    tbl2_school1 = '$table2School1', 
    tbl2_ca1 = '$table2ClassifiedAs1',
    tbl2_sy1 = '$table2SchoolYear1', 
    tbl2_crr_yr1 = '$table2CurrYr1', 
    tbl2_crr_yr2 = '$table2CurrYr2', 
    tbl2_crr_yr3 = '$table2CurrYr3', 
    tbl2_crr_yr4 = '$table2CurrYr4', 
    tbl2_crr_yr5 = '$table2CurrYr5', 
    tbl2_crr_yr6 = '$table2CurrYr6', 
    tbl2_crr_yr7 = '$table2CurrYr7', 
    tbl2_crr_yr8 = '$table2CurrYr8', 
    tbl2_crr_yr9 = '$table2CurrYr9', 
    tbl2_crr_yr10 = '$table2CurrYr10', 
    tbl2_sub1 = '$table2Sub1',
    tbl2_sub2 = '$table2Sub2',
    tbl2_sub3 = '$table2Sub3',
    tbl2_sub4 = '$table2Sub4',
    tbl2_sub5 = '$table2Sub5',
    tbl2_sub6 = '$table2Sub6',
    tbl2_sub7 = '$table2Sub7',
    tbl2_sub8 = '$table2Sub8',
    tbl2_sub9 = '$table2Sub9',
    tbl2_sub10 = '$table2Sub10',
    tbl2_sub1_fr1 = '$table2Subj1Fr1',
    tbl2_sub2_fr2 = '$table2Subj1Fr2',
    tbl2_sub3_fr3 = '$table2Subj1Fr3',
    tbl2_sub4_fr4 = '$table2Subj1Fr4',
    tbl2_sub5_fr5 = '$table2Subj1Fr5',
    tbl2_sub6_fr6 = '$table2Subj1Fr6',
    tbl2_sub7_fr7 = '$table2Subj1Fr7',
    tbl2_sub8_fr8 = '$table2Subj1Fr8',
    tbl2_sub9_fr9 = '$table2Subj1Fr9',
    tbl2_sub10_fr10 = '$table2Subj1Fr10',
    tbl2_sub1_at1 = '$table2Subj1At1',
    tbl2_sub2_at2 = '$table2Subj1At2',
    tbl2_sub3_at3 = '$table2Subj1At3',
    tbl2_sub4_at4 = '$table2Subj1At4',
    tbl2_sub5_at5 = '$table2Subj1At5',
    tbl2_sub6_at6 = '$table2Subj1At6',
    tbl2_sub7_at7 = '$table2Subj1At7',
    tbl2_sub8_at8 = '$table2Subj1At8',
    tbl2_sub9_at9 = '$table2Subj1At9',
    tbl2_sub10_at10 = '$table2Subj1At10',
    tbl2_sub1_ce1 = '$table2Subj1Ce1',
    tbl2_sub2_ce2 = '$table2Subj1Ce2',
    tbl2_sub3_ce3 = '$table2Subj1Ce3',
    tbl2_sub4_ce4 = '$table2Subj1Ce4',
    tbl2_sub5_ce5 = '$table2Subj1Ce5',
    tbl2_sub6_ce6 = '$table2Subj1Ce6',
    tbl2_sub7_ce7 = '$table2Subj1Ce7',
    tbl2_sub8_ce8 = '$table2Subj1Ce8',
    tbl2_sub9_ce9 = '$table2Subj1Ce9',
    tbl2_sub10_ce10 = '$table2Subj1Ce10',
    tbl2_dayofschool1 = '$table2DayOfSchool',
    tbl2_daypresent1 = '$table2DayOfPresent',
    tbl2_unitearned1 = '$table2UnitEarned1',
    tbl2_average = '$table2Average', 
    tbl3_school1 = '$table3School1', 
    tbl3_ca1 = '$table3ClassifiedAs1',
    tbl3_sy1 = '$table3SchoolYear1', 
    tbl3_crr_yr1 = '$table3CurrYr1', 
    tbl3_crr_yr2 = '$table3CurrYr2', 
    tbl3_crr_yr3 = '$table3CurrYr3', 
    tbl3_crr_yr4 = '$table3CurrYr4', 
    tbl3_crr_yr5 = '$table3CurrYr5', 
    tbl3_crr_yr6 = '$table3CurrYr6', 
    tbl3_crr_yr7 = '$table3CurrYr7', 
    tbl3_crr_yr8 = '$table3CurrYr8', 
    tbl3_crr_yr9 = '$table3CurrYr9', 
    tbl3_crr_yr10 = '$table3CurrYr10', 
    tbl3_sub1 = '$table3Sub1',
    tbl3_sub2 = '$table3Sub2',
    tbl3_sub3 = '$table3Sub3',
    tbl3_sub4 = '$table3Sub4',
    tbl3_sub5 = '$table3Sub5',
    tbl3_sub6 = '$table3Sub6',
    tbl3_sub7 = '$table3Sub7',
    tbl3_sub8 = '$table3Sub8',
    tbl3_sub9 = '$table3Sub9',
    tbl3_sub10 = '$table3Sub10',
    tbl3_sub1_fr1 = '$table3Subj1Fr1',
    tbl3_sub2_fr2 = '$table3Subj1Fr2',
    tbl3_sub3_fr3 = '$table3Subj1Fr3',
    tbl3_sub4_fr4 = '$table3Subj1Fr4',
    tbl3_sub5_fr5 = '$table3Subj1Fr5',
    tbl3_sub6_fr6 = '$table3Subj1Fr6',
    tbl3_sub7_fr7 = '$table3Subj1Fr7',
    tbl3_sub8_fr8 = '$table3Subj1Fr8',
    tbl3_sub9_fr9 = '$table3Subj1Fr9',
    tbl3_sub10_fr10 = '$table3Subj1Fr10',
    tbl3_sub1_at1 = '$table3Subj1At1',
    tbl3_sub2_at2 = '$table3Subj1At2',
    tbl3_sub3_at3 = '$table3Subj1At3',
    tbl3_sub4_at4 = '$table3Subj1At4',
    tbl3_sub5_at5 = '$table3Subj1At5',
    tbl3_sub6_at6 = '$table3Subj1At6',
    tbl3_sub7_at7 = '$table3Subj1At7',
    tbl3_sub8_at8 = '$table3Subj1At8',
    tbl3_sub9_at9 = '$table3Subj1At9',
    tbl3_sub10_at10 = '$table3Subj1At10',
    tbl3_sub1_ce1 = '$table3Subj1Ce1',
    tbl3_sub2_ce2 = '$table3Subj1Ce2',
    tbl3_sub3_ce3 = '$table3Subj1Ce3',
    tbl3_sub4_ce4 = '$table3Subj1Ce4',
    tbl3_sub5_ce5 = '$table3Subj1Ce5',
    tbl3_sub6_ce6 = '$table3Subj1Ce6',
    tbl3_sub7_ce7 = '$table3Subj1Ce7',
    tbl3_sub8_ce8 = '$table3Subj1Ce8',
    tbl3_sub9_ce9 = '$table3Subj1Ce9',
    tbl3_sub10_ce10 = '$table3Subj1Ce10',
    tbl3_dayofschool1 = '$table3DayOfSchool',
    tbl3_daypresent1 = '$table3DayOfPresent',
    tbl3_unitearned1 = '$table3UnitEarned1',
    tbl3_average = '$table3Average', 
    tbl4_school1 = '$table4School1', 
    tbl4_ca1 = '$table4ClassifiedAs1',
    tbl4_sy1 = '$table4SchoolYear1', 
    tbl4_crr_yr1 = '$table4CurrYr1', 
    tbl4_crr_yr2 = '$table4CurrYr2', 
    tbl4_crr_yr3 = '$table4CurrYr3', 
    tbl4_crr_yr4 = '$table4CurrYr4', 
    tbl4_crr_yr5 = '$table4CurrYr5', 
    tbl4_crr_yr6 = '$table4CurrYr6', 
    tbl4_crr_yr7 = '$table4CurrYr7', 
    tbl4_crr_yr8 = '$table4CurrYr8', 
    tbl4_crr_yr9 = '$table4CurrYr9', 
    tbl4_crr_yr10 = '$table4CurrYr10', 
    tbl4_sub1 = '$table4Sub1',
    tbl4_sub2 = '$table4Sub2',
    tbl4_sub3 = '$table4Sub3',
    tbl4_sub4 = '$table4Sub4',
    tbl4_sub5 = '$table4Sub5',
    tbl4_sub6 = '$table4Sub6',
    tbl4_sub7 = '$table4Sub7',
    tbl4_sub8 = '$table4Sub8',
    tbl4_sub9 = '$table4Sub9',
    tbl4_sub10 = '$table4Sub10',
    tbl4_sub1_fr1 = '$table4Subj1Fr1',
    tbl4_sub2_fr2 = '$table4Subj1Fr2',
    tbl4_sub3_fr3 = '$table4Subj1Fr3',
    tbl4_sub4_fr4 = '$table4Subj1Fr4',
    tbl4_sub5_fr5 = '$table4Subj1Fr5',
    tbl4_sub6_fr6 = '$table4Subj1Fr6',
    tbl4_sub7_fr7 = '$table4Subj1Fr7',
    tbl4_sub8_fr8 = '$table4Subj1Fr8',
    tbl4_sub9_fr9 = '$table4Subj1Fr9',
    tbl4_sub10_fr10 = '$table4Subj1Fr10',
    tbl4_sub1_at1 = '$table4Subj1At1',
    tbl4_sub2_at2 = '$table4Subj1At2',
    tbl4_sub3_at3 = '$table4Subj1At3',
    tbl4_sub4_at4 = '$table4Subj1At4',
    tbl4_sub5_at5 = '$table4Subj1At5',
    tbl4_sub6_at6 = '$table4Subj1At6',
    tbl4_sub7_at7 = '$table4Subj1At7',
    tbl4_sub8_at8 = '$table4Subj1At8',
    tbl4_sub9_at9 = '$table4Subj1At9',
    tbl4_sub10_at10 = '$table4Subj1At10',
    tbl4_sub1_ce1 = '$table4Subj1Ce1',
    tbl4_sub2_ce2 = '$table4Subj1Ce2',
    tbl4_sub3_ce3 = '$table4Subj1Ce3',
    tbl4_sub4_ce4 = '$table4Subj1Ce4',
    tbl4_sub5_ce5 = '$table4Subj1Ce5',
    tbl4_sub6_ce6 = '$table4Subj1Ce6',
    tbl4_sub7_ce7 = '$table4Subj1Ce7',
    tbl4_sub8_ce8 = '$table4Subj1Ce8',
    tbl4_sub9_ce9 = '$table4Subj1Ce9',
    tbl4_sub10_ce10 = '$table4Subj1Ce10',
    tbl4_dayofschool1 = '$table4DayOfSchool',
    tbl4_daypresent1 = '$table4DayOfPresent',
    tbl4_unitearned1 = '$table4UnitEarned1',
    tbl4_average = '$table4Average',
    cert_grad_1 = '$cedrificateOfGrad1',
    cert_grad_2 = '$cedrificateOfGrad2',
    cert_grad_3 = '$cedrificateOfGrad3',
    tran_1 = '$transfer1',
    tran_2 = '$transfer2'
    WHERE id = '$id'";
    
    $con->query($sql) or die ($con->error);

    header("Location: info.php?ID=".$id);
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
    <title>STS | Edit Info</title>
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
                    <h1 data-aos="fade-right" style="font-weight: 400;">Edit <span style="font-weight: 600;">
                    <?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?> <?php echo $row['name_ext']; ?>
                    </span> Information <i class="fa fa-pen"></i></h1>
                    <hr class="section-divider">
                </div>
                <div class="main-content">
                    <button class="btn">
                        <a href="info.php?ID=<?php echo $row['id']; ?>"><i class="fa-solid fa-chevron-left"></i> Back</a>
                    </button>
                    <div class="table-container">        
                        <form id="deleteForm_<?php echo $row['id']; ?>" action="delete.php" method="post">
                            <input type="hidden" name="delete" value="1">
                            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>" autocomplete="off">
                        </form>    
                        <div class="overlay" id="overlay"></div>
                        <div id="confirmDialog" class="confirm-dialog">
                            <div class="delete-title" style="display: flex; gap: 5px;">
                                <h3>WARNING</h3><i class='fa fa-exclamation-triangle' style='color: orange; margin: auto 0; font-size: 20px;'></i>
                            </div>
                                <p>Are you sure you want to delete <?php echo $row['first_name']; ?>'s record?</br> This action cannot be undone.</p>
                            <div class="btn-wrapper">
                                <button class="delete" onclick="deleteItem('<?php echo $row['id']; ?>')">Delete</button>
                                <button class="cancel" onclick="hideDeleteConfirmation()">Cancel</button>
                            </div>
                        </div>
                        <div class="edit-controls">
                            <button class="delete" onclick="showDeleteConfirmation('<?php echo $row['id']; ?>')" data-aos="fade-down" data-aos-duration="400">DELETE <i class="fa-solid fa-trash"></i></button>
                        </div>
                        <form action="" method="post">
                            <div class="edit-controls">
                                <button class="update" type="subimt" name="submit" data-aos="fade-down" data-aos-duration="600">UPDATE <i class="fa-solid fa-upload"></i></button>
                            </div>
                            <table class="table">
                            <tr>
                                    <th class="th " colspan="8">SECONDARY STUDENT'S PERMANENT RECORD</th>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Last name: 
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['last_name']; ?>" name="last_name" minlength="3" pattern="[^\d]+" autocomplete="off" required>
                                        </span>
                                    </td>
                                    <td colspan="3" class="bold-letter">First name:
                                        <span class="value">
                                            <input class="wide-input" type="text" value="<?php echo $row['first_name']; ?>" name="first_name" minlength="3" pattern="[^\d]+" autocomplete="off" required>
                                        </span>
                                    </td>
                                    <td colspan="3" class="bold-letter">Name Ext. (Jr, I, II):
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['name_ext']; ?>"  name="name_ext" minlength="2" pattern="[^\d]+" autocomplete="off">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Middle name:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['middle_name']; ?>"  name="middle_name" pattern="[^\d]+" autocomplete="off">
                                        </span>
                                    </td>
                                    <td colspan="3" class="bold-letter">Citizenship: 
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['citizenship']; ?>" name="citizenship" minlength="3" pattern="[^\d]+" autocomplete="off" required>
                                        </span>
                                    </td>
                                    <td colspan="1" class="bold-letter">Gender: 
                                        <span class="value">
                                            <select name="gender" id="gender">
                                                <option value="Male" <?php if ($row['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($row['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                                            </select>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- LRN -->
                                    <td colspan="4" class="bold-letter">
                                        <span class="value">
                                            <select name="with_lrn" id="with_lrn">
                                                <option value="TRUE" <?php if ($row['with_lrn'] === 'TRUE') echo 'selected'; ?>>With</option>
                                                <option value="FALSE" <?php if ($row['with_lrn'] === 'FALSE') echo 'selected'; ?>>Without</option>
                                            </select>
                                        </span>
                                        LRN: 
                                        <span class="value">
                                        <?php if ($row['with_lrn'] === 'TRUE') { ?>
                                            <input type="text" value="<?php echo $row['lrn']; ?>" name="lrn" pattern="[0-9]*" minlength="12" maxlength="12" autocomplete="off" id="lrn_input">
                                        <?php } else if ($row['with_lrn'] === 'FALSE') { ?>
                                            <input type="text" value="" name="lrn" style="display: none;" id="lrn_input" minlength="12" maxlength="12">
                                        <?php } ?>
                                        </span>
                                    </td>
                                    <td colspan="4" class="bold-letter">Date of Birth:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['date_of_birth']; ?>" name="date_of_birth" autocomplete="off">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Place of Birth:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['place_of_birth']; ?>" name="place_of_birth" pattern="[^\d]+" autocomplete="off">
                                        </span>
                                    </td>
                                    <td colspan="4" class="bold-letter">Address:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['stu_address']; ?>" name="stu_address" autocomplete="off">
                                        </span>
                                    </td>
                                </tr>
                                <tr colspan="8">
                                    <td colspan="4" class="bold-letter">Guardian:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['guardian']; ?>" name="guardian" pattern="[^\d]+" autocomplete="off">
                                        </span>
                                    </td>
                                    <td colspan="4" class="bold-letter">Occupation:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['occupation']; ?>" name="occupation" pattern="[^\d]+" autocomplete="off">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="bold-letter">Inter. Course Cpl.:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['inter_course_com']; ?>" name="inter_course_com" pattern="[^\d]+" autocomplete="off">
                                        </span>
                                    </td>
                                    <td colspan="1" class="bold-letter">School year:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['school_year']; ?>" name="school_year" pattern="[0-9]*" minlength="4" maxlength="4" autocomplete="off" required>
                                        </span>
                                    </td>
                                    <td colspan="1" class="bold-letter">General Average:
                                        <span class="value">
                                            <input type="text" value="<?php echo $row['general_average']; ?>" name="general_average" minlength="2" maxlength="5" autocomplete="off" required>
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
                                        <input type="text" value="<?php echo $row['tbl1_school1']; ?>" name="tbl1_school1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Classified as:
                                        <input type="text" value="<?php echo $row['tbl1_ca1']; ?>" name="tbl1_ca1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                    <td colspan="4" class="bold-letter">School year:
                                        <input type="text" value="<?php echo $row['tbl1_sy1']; ?>" name="tbl1_sy1" autocomplete="off">
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
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr1" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr1'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr1'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr1'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr1'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr1'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub1']; ?>" name="tbl1_sub1">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub1_fr1']; ?>" name="tbl1_sub1_fr1" >
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub1_at1" class="option">
                                                <option value="" <?php if ($row['tbl1_sub1_at1'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub1_at1'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub1_at1'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub1_at1'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub1_ce1']; ?>" name="tbl1_sub1_ce1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr2" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr2'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr2'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr2'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr2'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr2'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub2']; ?>" name="tbl1_sub2">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub2_fr2']; ?>" name="tbl1_sub2_fr2">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub2_at2" class="option">
                                                <option value="" <?php if ($row['tbl1_sub2_at2'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub2_at2'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub2_at2'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub2_at2'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub2_ce2']; ?>" name="tbl1_sub2_ce2">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr3" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr3'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr3'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr3'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr3'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr3'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub3']; ?>" name="tbl1_sub3">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub3_fr3']; ?>" name="tbl1_sub3_fr3">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub3_at3" class="option">
                                                <option value="" <?php if ($row['tbl1_sub3_at3'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub3_at3'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub3_at3'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub3_at3'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub3_ce3']; ?>" name="tbl1_sub3_ce3">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr4" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr4'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr4'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr4'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr4'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr4'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub4']; ?>" name="tbl1_sub4">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub4_fr4']; ?>" name="tbl1_sub4_fr4">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub4_at4" class="option">
                                                <option value="" <?php if ($row['tbl1_sub4_at4'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub4_at4'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub4_at4'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub4_at4'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub4_ce4']; ?>" name="tbl1_sub4_ce4">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr5" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr5'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr5'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr5'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr5'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr5'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub5']; ?>" name="tbl1_sub5">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub5_fr5']; ?>" name="tbl1_sub5_fr5">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub5_at5" class="option">
                                                <option value="" <?php if ($row['tbl1_sub5_at5'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub5_at5'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub5_at5'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub5_at5'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub5_ce5']; ?>" name="tbl1_sub5_ce5">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr6" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr6'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr6'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr6'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr6'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr6'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub6']; ?>" name="tbl1_sub6">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub6_fr6']; ?>" name="tbl1_sub6_fr6">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub6_at6" class="option">
                                                <option value="" <?php if ($row['tbl1_sub6_at6'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub6_at6'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub6_at6'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub6_at6'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub6_ce6']; ?>" name="tbl1_sub6_ce6">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr7" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr7'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr7'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr7'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr7'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr7'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub7']; ?>" name="tbl1_sub7">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub7_fr7']; ?>" name="tbl1_sub7_fr7">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub7_at7" class="option">
                                                <option value="" <?php if ($row['tbl1_sub7_at7'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub7_at7'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub7_at7'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub7_at7'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub7_ce7']; ?>" name="tbl1_sub7_ce7">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr8" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr8'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr8'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr8'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr8'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr8'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub8']; ?>" name="tbl1_sub8">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub8_fr8']; ?>" name="tbl1_sub8_fr8">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub8_at8" class="option">
                                                <option value="" <?php if ($row['tbl1_sub8_at8'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub8_at8'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub8_at8'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub8_at8'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub8_ce8']; ?>" name="tbl1_sub8_ce8">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr9" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr9'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr9'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr9'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr9'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr9'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub9']; ?>" name="tbl1_sub9">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub9_fr9']; ?>" name="tbl1_sub9_fr9">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub9_at9" class="option">
                                                <option value="" <?php if ($row['tbl1_sub9_at9'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub9_at9'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub9_at9'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub9_at9'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub9_ce9']; ?>" name="tbl1_sub9_ce9">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl1_crr_yr10" class="bold-letter option">
                                            <option value="I" <?php if ($row['tbl1_crr_yr10'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="" <?php if ($row['tbl1_crr_yr10'] === '') echo 'selected'; ?>></option>
                                            <option value="II" <?php if ($row['tbl1_crr_yr10'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl1_crr_yr10'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl1_crr_yr10'] === 'IV') echo 'selected'; ?>>IV</option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl1_sub10']; ?>" name="tbl1_sub10">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub10_fr10']; ?>" name="tbl1_sub10_fr10">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl1_sub10_at10" class="option">
                                                <option value="" <?php if ($row['tbl1_sub10_at10'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl1_sub10_at10'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl1_sub10_at10'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl1_sub10_at10'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl1_sub10_ce10']; ?>" name="tbl1_sub10_ce10">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days of School:
                                        <input type="text" value="<?php echo $row['tbl1_dayofschool1']; ?>" name="tbl1_dayofschool1">
                                    </td>
                                    <td colspan="4" class="bold-letter">Total Units Earned:
                                        <input type="text" value="<?php echo $row['tbl1_unitearned1']; ?>" name="tbl1_unitearned1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days Present:
                                        <input type="text" value="<?php echo $row['tbl1_daypresent1']; ?>" name="tbl1_daypresent1">
                                    </td>
                                    <td colspan="4" class="bold-letter">General Average:
                                        <input type="text" value="<?php echo $row['tbl1_average']; ?>" name="tbl1_average">
                                    </td>
                                </tr>
                            </table>
                            <table class="table"> 
                                <tr>
                                    <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl2_sy1']; ?></th>
                                </tr>
                                <tr>
                                    <td colspan="8" class="bold-letter">School:
                                        <input type="text" value="<?php echo $row['tbl2_school1']; ?>" name="tbl2_school1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Classified as:
                                        <input type="text" value="<?php echo $row['tbl2_ca1']; ?>" name="tbl2_ca1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                    <td colspan="4" class="bold-letter">School year:
                                        <input type="text" value="<?php echo $row['tbl2_sy1']; ?>" name="tbl2_sy1" autocomplete="off">
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
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr1" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr1'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr1'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr1'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr1'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr1'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub1']; ?>" name="tbl2_sub1">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub1_fr1']; ?>" name="tbl2_sub1_fr1" >
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub1_at1" class="option">
                                                <option value="" <?php if ($row['tbl2_sub1_at1'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub1_at1'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub1_at1'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub1_at1'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub1_ce1']; ?>" name="tbl2_sub1_ce1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr2" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr2'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr2'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr2'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr2'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr2'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub2']; ?>" name="tbl2_sub2">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub2_fr2']; ?>" name="tbl2_sub2_fr2">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub2_at2" class="option">
                                                <option value="" <?php if ($row['tbl2_sub2_at2'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub2_at2'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub2_at2'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub2_at2'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub2_ce2']; ?>" name="tbl2_sub2_ce2">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr3" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr3'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr3'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr3'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr3'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr3'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub3']; ?>" name="tbl2_sub3">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub3_fr3']; ?>" name="tbl2_sub3_fr3">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub3_at3" class="option">
                                                <option value="" <?php if ($row['tbl2_sub3_at3'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub3_at3'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub3_at3'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub3_at3'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub3_ce3']; ?>" name="tbl2_sub3_ce3">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr4" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr4'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr4'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr4'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr4'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr4'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub4']; ?>" name="tbl2_sub4">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub4_fr4']; ?>" name="tbl2_sub4_fr4">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub4_at4" class="option">
                                                <option value="" <?php if ($row['tbl2_sub4_at4'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub4_at4'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub4_at4'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub4_at4'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub4_ce4']; ?>" name="tbl2_sub4_ce4">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr5" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr5'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr5'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr5'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr5'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr5'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub5']; ?>" name="tbl2_sub5">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub5_fr5']; ?>" name="tbl2_sub5_fr5">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub5_at5" class="option">
                                                <option value="" <?php if ($row['tbl2_sub5_at5'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub5_at5'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub5_at5'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub5_at5'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub5_ce5']; ?>" name="tbl2_sub5_ce5">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr6" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr6'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr6'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr6'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr6'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr6'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub6']; ?>" name="tbl2_sub6">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub6_fr6']; ?>" name="tbl2_sub6_fr6">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub6_at6" class="option">
                                                <option value="" <?php if ($row['tbl2_sub6_at6'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub6_at6'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub6_at6'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub6_at6'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub6_ce6']; ?>" name="tbl2_sub6_ce6">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr7" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr7'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr7'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr7'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr7'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr7'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub7']; ?>" name="tbl2_sub7">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub7_fr7']; ?>" name="tbl2_sub7_fr7">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub7_at7" class="option">
                                                <option value="" <?php if ($row['tbl2_sub7_at7'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub7_at7'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub7_at7'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub7_at7'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub7_ce7']; ?>" name="tbl2_sub7_ce7">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr8" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr8'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr8'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr8'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr8'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr8'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub8']; ?>" name="tbl2_sub8">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub8_fr8']; ?>" name="tbl2_sub8_fr8">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub8_at8" class="option">
                                                <option value="" <?php if ($row['tbl2_sub8_at8'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub8_at8'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub8_at8'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub8_at8'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub8_ce8']; ?>" name="tbl2_sub8_ce8">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr9" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr9'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr9'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr9'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr9'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr9'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub9']; ?>" name="tbl2_sub9">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub9_fr9']; ?>" name="tbl2_sub9_fr9">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub9_at9" class="option">
                                                <option value="" <?php if ($row['tbl2_sub9_at9'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub9_at9'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub9_at9'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub9_at9'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub9_ce9']; ?>" name="tbl2_sub9_ce9">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl2_crr_yr10" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl2_crr_yr10'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl2_crr_yr10'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl2_crr_yr10'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl2_crr_yr10'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl2_crr_yr10'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl2_sub10']; ?>" name="tbl2_sub10">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub10_fr10']; ?>" name="tbl2_sub10_fr10">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl2_sub10_at10" class="option">
                                                <option value="" <?php if ($row['tbl2_sub10_at10'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl2_sub10_at10'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl2_sub10_at10'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl2_sub10_at10'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl2_sub10_ce10']; ?>" name="tbl2_sub10_ce10">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days of School:
                                        <input type="text" value="<?php echo $row['tbl2_dayofschool1']; ?>" name="tbl2_dayofschool1">
                                    </td>
                                    <td colspan="4" class="bold-letter">Total Units Earned:
                                        <input type="text" value="<?php echo $row['tbl2_unitearned1']; ?>" name="tbl2_unitearned1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days Present:
                                        <input type="text" value="<?php echo $row['tbl2_daypresent1']; ?>" name="tbl2_daypresent1">
                                    </td>
                                    <td colspan="4" class="bold-letter">General Average:
                                        <input type="text" value="<?php echo $row['tbl2_average']; ?>" name="tbl2_average">
                                    </td>
                                </tr>
                            </table>
                            <table class="table"> 
                                <tr>
                                    <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl3_sy1']; ?></th>
                                </tr>
                                <tr>
                                    <td colspan="8" class="bold-letter">School:
                                        <input type="text" value="<?php echo $row['tbl3_school1']; ?>" name="tbl3_school1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Classified as:
                                        <input type="text" value="<?php echo $row['tbl3_ca1']; ?>" name="tbl3_ca1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                    <td colspan="4" class="bold-letter">School year:
                                        <input type="text" value="<?php echo $row['tbl3_sy1']; ?>" name="tbl3_sy1" autocomplete="off">
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
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr1" class="bold-letter option">
                                            <option value="II" <?php if ($row['tbl3_crr_yr1'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr1'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="III" <?php if ($row['tbl3_crr_yr1'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr1'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr1'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub1']; ?>" name="tbl3_sub1">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub1_fr1']; ?>" name="tbl3_sub1_fr1" >
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub1_at1" class="option">
                                                <option value="" <?php if ($row['tbl3_sub1_at1'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub1_at1'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub1_at1'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub1_at1'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub1_ce1']; ?>" name="tbl3_sub1_ce1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr2" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr2'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr2'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr2'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr2'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr2'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub2']; ?>" name="tbl3_sub2">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub2_fr2']; ?>" name="tbl3_sub2_fr2">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub2_at2" class="option">
                                                <option value="" <?php if ($row['tbl3_sub2_at2'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub2_at2'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub2_at2'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub2_at2'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub2_ce2']; ?>" name="tbl3_sub2_ce2">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr3" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr3'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr3'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr3'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr3'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr3'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub3']; ?>" name="tbl3_sub3">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub3_fr3']; ?>" name="tbl3_sub3_fr3">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub3_at3" class="option">
                                                <option value="" <?php if ($row['tbl3_sub3_at3'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub3_at3'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub3_at3'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub3_at3'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub3_ce3']; ?>" name="tbl3_sub3_ce3">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr4" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr4'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr4'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr4'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr4'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr4'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub4']; ?>" name="tbl3_sub4">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub4_fr4']; ?>" name="tbl3_sub4_fr4">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub4_at4" class="option">
                                                <option value="" <?php if ($row['tbl3_sub4_at4'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub4_at4'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub4_at4'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub4_at4'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub4_ce4']; ?>" name="tbl3_sub4_ce4">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr5" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr5'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr5'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr5'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr5'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr5'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub5']; ?>" name="tbl3_sub5">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub5_fr5']; ?>" name="tbl3_sub5_fr5">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub5_at5" class="option">
                                                <option value="" <?php if ($row['tbl3_sub5_at5'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub5_at5'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub5_at5'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub5_at5'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub5_ce5']; ?>" name="tbl3_sub5_ce5">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr6" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr6'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr6'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr6'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr6'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr6'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub6']; ?>" name="tbl3_sub6">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub6_fr6']; ?>" name="tbl3_sub6_fr6">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub6_at6" class="option">
                                                <option value="" <?php if ($row['tbl3_sub6_at6'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub6_at6'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub6_at6'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub6_at6'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub6_ce6']; ?>" name="tbl3_sub6_ce6">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr7" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr7'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr7'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr7'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr7'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr7'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub7']; ?>" name="tbl3_sub7">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub7_fr7']; ?>" name="tbl3_sub7_fr7">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub7_at7" class="option">
                                                <option value="" <?php if ($row['tbl3_sub7_at7'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub7_at7'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub7_at7'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub7_at7'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub7_ce7']; ?>" name="tbl3_sub7_ce7">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr8" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr8'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr8'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr8'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr8'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr8'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub8']; ?>" name="tbl3_sub8">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub8_fr8']; ?>" name="tbl3_sub8_fr8">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub8_at8" class="option">
                                                <option value="" <?php if ($row['tbl3_sub8_at8'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub8_at8'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub8_at8'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub8_at8'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub8_ce8']; ?>" name="tbl3_sub8_ce8">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr9" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr9'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr9'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr9'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr9'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr9'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub9']; ?>" name="tbl3_sub9">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub9_fr9']; ?>" name="tbl3_sub9_fr9">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub9_at9" class="option">
                                                <option value="" <?php if ($row['tbl3_sub9_at9'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub9_at9'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub9_at9'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub9_at9'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub9_ce9']; ?>" name="tbl3_sub9_ce9">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl3_crr_yr10" class="bold-letter option">
                                            <option value="III" <?php if ($row['tbl3_crr_yr10'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="I" <?php if ($row['tbl3_crr_yr10'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl3_crr_yr10'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="IV" <?php if ($row['tbl3_crr_yr10'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="" <?php if ($row['tbl3_crr_yr10'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl3_sub10']; ?>" name="tbl3_sub10">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub10_fr10']; ?>" name="tbl3_sub10_fr10">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl3_sub10_at10" class="option">
                                                <option value="" <?php if ($row['tbl3_sub10_at10'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl3_sub10_at10'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl3_sub10_at10'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl3_sub10_at10'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl3_sub10_ce10']; ?>" name="tbl3_sub10_ce10">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days of School:
                                        <input type="text" value="<?php echo $row['tbl3_dayofschool1']; ?>" name="tbl3_dayofschool1">
                                    </td>
                                    <td colspan="4" class="bold-letter">Total Units Earned:
                                        <input type="text" value="<?php echo $row['tbl3_unitearned1']; ?>" name="tbl3_unitearned1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days Present:
                                        <input type="text" value="<?php echo $row['tbl3_daypresent1']; ?>" name="tbl3_daypresent1">
                                    </td>
                                    <td colspan="4" class="bold-letter">General Average:
                                        <input type="text" value="<?php echo $row['tbl3_average']; ?>" name="tbl3_average">
                                    </td>
                                </tr>
                            </table>
                            <table class="table"> 
                                <tr>
                                    <th class="th" colspan="8">RECORDS OF YEAR <?php echo $row['tbl4_sy1']; ?></th>
                                </tr>
                                <tr>
                                    <td colspan="8" class="bold-letter">School:
                                        <input type="text" value="<?php echo $row['tbl4_school1']; ?>" name="tbl4_school1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Classified as:
                                        <input type="text" value="<?php echo $row['tbl4_ca1']; ?>" name="tbl4_ca1" pattern="[^\d]+" autocomplete="off">
                                    </td>
                                    <td colspan="4" class="bold-letter">School year:
                                        <input type="text" value="<?php echo $row['tbl4_sy1']; ?>" name="tbl4_sy1" autocomplete="off">
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
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr1" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr1'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr1'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr1'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr1'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr1'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub1']; ?>" name="tbl4_sub1">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub1_fr1']; ?>" name="tbl4_sub1_fr1" >
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub1_at1" class="option">
                                                <option value="" <?php if ($row['tbl4_sub1_at1'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub1_at1'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub1_at1'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub1_at1'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub1_ce1']; ?>" name="tbl4_sub1_ce1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr2" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr2'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr2'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr2'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr2'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr2'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub2']; ?>" name="tbl4_sub2">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub2_fr2']; ?>" name="tbl4_sub2_fr2">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub2_at2" class="option">
                                                <option value="" <?php if ($row['tbl4_sub2_at2'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub2_at2'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub2_at2'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub2_at2'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub2_ce2']; ?>" name="tbl4_sub2_ce2">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr3" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr3'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr3'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr3'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr3'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr3'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub3']; ?>" name="tbl4_sub3">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub3_fr3']; ?>" name="tbl4_sub3_fr3">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub3_at3" class="option">
                                                <option value="" <?php if ($row['tbl4_sub3_at3'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub3_at3'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub3_at3'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub3_at3'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub3_ce3']; ?>" name="tbl4_sub3_ce3">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr4" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr4'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr4'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr4'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr4'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr4'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub4']; ?>" name="tbl4_sub4">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub4_fr4']; ?>" name="tbl4_sub4_fr4">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub4_at4" class="option">
                                                <option value="" <?php if ($row['tbl4_sub4_at4'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub4_at4'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub4_at4'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub4_at4'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub4_ce4']; ?>" name="tbl4_sub4_ce4">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr5" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr5'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr5'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr5'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr5'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr5'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub5']; ?>" name="tbl4_sub5">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub5_fr5']; ?>" name="tbl4_sub5_fr5">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub5_at5" class="option">
                                                <option value="" <?php if ($row['tbl4_sub5_at5'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub5_at5'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub5_at5'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub5_at5'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub5_ce5']; ?>" name="tbl4_sub5_ce5">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr6" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr6'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr6'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr6'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr6'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr6'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub6']; ?>" name="tbl4_sub6">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub6_fr6']; ?>" name="tbl4_sub6_fr6">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub6_at6" class="option">
                                                <option value="" <?php if ($row['tbl4_sub6_at6'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub6_at6'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub6_at6'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub6_at6'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub6_ce6']; ?>" name="tbl4_sub6_ce6">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr7" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr7'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr7'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr7'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr7'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr7'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub7']; ?>" name="tbl4_sub7">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub7_fr7']; ?>" name="tbl4_sub7_fr7">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub7_at7" class="option">
                                                <option value="" <?php if ($row['tbl4_sub7_at7'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub7_at7'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub7_at7'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub7_at7'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub7_ce7']; ?>" name="tbl4_sub7_ce7">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr8" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr8'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr8'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr8'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr8'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr8'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4"> 
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub8']; ?>" name="tbl4_sub8">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub8_fr8']; ?>" name="tbl4_sub8_fr8">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub8_at8" class="option">
                                                <option value="" <?php if ($row['tbl4_sub8_at8'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub8_at8'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub8_at8'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub8_at8'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub8_ce8']; ?>" name="tbl4_sub8_ce8">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr9" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr9'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr9'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr9'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr9'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr9'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub9']; ?>" name="tbl4_sub9">
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub9_fr9']; ?>" name="tbl4_sub9_fr9">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub9_at9" class="option">
                                                <option value="" <?php if ($row['tbl4_sub9_at9'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub9_at9'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub9_at9'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub9_at9'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub9_ce9']; ?>" name="tbl4_sub9_ce9">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="tdcenter">
                                        <select name="tbl4_crr_yr10" class="bold-letter option">
                                            <option value="IV" <?php if ($row['tbl4_crr_yr10'] === 'IV') echo 'selected'; ?>>IV</option>
                                            <option value="I" <?php if ($row['tbl4_crr_yr10'] === 'I') echo 'selected'; ?>>I</option>
                                            <option value="II" <?php if ($row['tbl4_crr_yr10'] === 'II') echo 'selected'; ?>>II</option>
                                            <option value="III" <?php if ($row['tbl4_crr_yr10'] === 'III') echo 'selected'; ?>>III</option>
                                            <option value="" <?php if ($row['tbl4_crr_yr10'] === '') echo 'selected'; ?>></option>
                                        </select>
                                    </td>
                                    <td colspan="4">
                                        <input style="width: 100%;" type="text" value="<?php echo $row['tbl4_sub10']; ?>" name="tbl4_sub10">
                                    </td>
                                    <td colspan="1">
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub10_fr10']; ?>" name="tbl4_sub10_fr10">
                                    </td>
                                    <td colspan="1" class="tdcenter"> 
                                        <span class="value">
                                            <select name="tbl4_sub10_at10" class="option">
                                                <option value="" <?php if ($row['tbl4_sub10_at10'] === '') echo 'selected'; ?>></option>
                                                <option value="Passed" <?php if ($row['tbl4_sub10_at10'] === 'Passed') echo 'selected'; ?>>Passed</option>
                                                <option value="Failed" <?php if ($row['tbl4_sub10_at10'] === 'Failed') echo 'selected'; ?>>Failed</option>
                                                <option value="Retained" <?php if ($row['tbl4_sub10_at10'] === 'Retained') echo 'selected'; ?>>Retained</option>
                                            </select>
                                        </span>
                                    </td>
                                    <td colspan="1"> 
                                        <input style="width: 100%;" class="inputcenter" type="text" value="<?php echo $row['tbl4_sub10_ce10']; ?>" name="tbl4_sub10_ce10">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days of School:
                                        <input type="text" value="<?php echo $row['tbl4_dayofschool1']; ?>" name="tbl4_dayofschool1">
                                    </td>
                                    <td colspan="4" class="bold-letter">Total Units Earned:
                                        <input type="text" value="<?php echo $row['tbl4_unitearned1']; ?>" name="tbl4_unitearned1">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="bold-letter">Days Present:
                                        <input type="text" value="<?php echo $row['tbl4_daypresent1']; ?>" name="tbl4_daypresent1">
                                    </td>
                                    <td colspan="4" class="bold-letter">General Average:
                                        <input type="text" value="<?php echo $row['tbl4_average']; ?>" name="tbl4_average">
                                    </td>
                                </tr>
                            </table>
                            <div class="footer-container">
                                <div class="cert-grad">
                                    <div class="footer-title">
                                        <h3>CERTIFICATION OF GRADUATION</h3>
                                    </div>
                                    <div class="cert-grad-text">
                                        <p>Graduates as of <span><input class="footer-input" type="text" name="cert_grad_1" value="<?php echo $row['cert_grad_1']; ?>"></span></p>
                                        <p>Under Special Order (A) No. <span><input class="footer-input" type="text" name="cert_grad_2" value="<?php echo $row['cert_grad_2']; ?>"></span></p>
                                        <p>S. <span><input class="footer-input" type="text" name="cert_grad_3" value="<?php echo $row['cert_grad_3']; ?>"></span></p>
                                    </div>
                                </div>
                                <div class="transfer">
                                    <div class="footer-title">
                                        <h3>TRANSFER</h3>
                                    </div>
                                    <div class="tran-text">
                                        <p>This cedrtifies that this is the true record of <span><input class="footer-input inputcenter" type="text" name="tran_1" value="<?php echo $row['tran_1']; ?>"></span> is eligible for graduation to <span><input class="footer-input inputcenter" type="text" name="tran_2" value="<?php echo $row['tran_2']; ?>"></span> student as regular/irregular and has no money/property responsibility in this school.</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
var withLrnSelect = document.getElementById('with_lrn');
var lrnInput = document.getElementById('lrn_input');

withLrnSelect.addEventListener('change', function() {
    if (withLrnSelect.value === 'TRUE') {
        lrnInput.style.display = 'inline-block';
    } else {
        lrnInput.style.display = 'none';
    }
});
</script>
<script src="js/clock.js"></script>
<script src="js/script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>

