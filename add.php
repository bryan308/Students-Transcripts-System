<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['UserLogin']) || $_SESSION['Access'] == "guest") {
    header("Location: index.php");
    exit();
}

include_once("connections/connection.php");
$con = connection();

if (isset($_POST['submit'])) {

    $lastName = $_POST['last_name']; 
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $nameExt = $_POST['name_ext'];
    $citizenship = $_POST['citizenship'];
    $gender = $_POST['gender'];
    $lrn = $_POST['lrn'];
    $withLRN = $_POST['with_lrn'];
    $birthDate = $_POST['date_of_birth'];
    $placeBirth = $_POST['place_of_birth'];
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

    // Insert values into students_list_old table
    $sql = "INSERT INTO `students_list_old` ( 
        `last_name`, 
        `first_name`, 
        `middle_name`, 
        `name_ext`, 
        `citizenship`, 
        `gender`, 
        `lrn`, 
        `with_lrn`, 
        `date_of_birth`, 
        `place_of_birth`, 
        `stu_address`, 
        `guardian`, 
        `occupation`, 
        `inter_course_com`, 
        `school_year`, 
        `general_average`, 
        `tbl1_school1`, 
        `tbl1_ca1`, 
        `tbl1_sy1`, 
        `tbl1_crr_yr1`, 
        `tbl1_crr_yr2`, 
        `tbl1_crr_yr3`, 
        `tbl1_crr_yr4`, 
        `tbl1_crr_yr5`, 
        `tbl1_crr_yr6`, 
        `tbl1_crr_yr7`, 
        `tbl1_crr_yr8`, 
        `tbl1_crr_yr9`, 
        `tbl1_crr_yr10`, 
        `tbl1_sub1`, 
        `tbl1_sub2`, 
        `tbl1_sub3`, 
        `tbl1_sub4`, 
        `tbl1_sub5`, 
        `tbl1_sub6`, 
        `tbl1_sub7`, 
        `tbl1_sub8`, 
        `tbl1_sub9`, 
        `tbl1_sub10`, 
        `tbl1_sub1_fr1`, 
        `tbl1_sub2_fr2`, 
        `tbl1_sub3_fr3`, 
        `tbl1_sub4_fr4`, 
        `tbl1_sub5_fr5`, 
        `tbl1_sub6_fr6`, 
        `tbl1_sub7_fr7`, 
        `tbl1_sub8_fr8`, 
        `tbl1_sub9_fr9`, 
        `tbl1_sub10_fr10`, 
        `tbl1_sub1_at1`, 
        `tbl1_sub2_at2`, 
        `tbl1_sub3_at3`, 
        `tbl1_sub4_at4`, 
        `tbl1_sub5_at5`, 
        `tbl1_sub6_at6`, 
        `tbl1_sub7_at7`, 
        `tbl1_sub8_at8`, 
        `tbl1_sub9_at9`, 
        `tbl1_sub10_at10`, 
        `tbl1_sub1_ce1`, 
        `tbl1_sub2_ce2`, 
        `tbl1_sub3_ce3`, 
        `tbl1_sub4_ce4`, 
        `tbl1_sub5_ce5`, 
        `tbl1_sub6_ce6`, 
        `tbl1_sub7_ce7`, 
        `tbl1_sub8_ce8`, 
        `tbl1_sub9_ce9`, 
        `tbl1_sub10_ce10`, 
        `tbl1_dayofschool1`, 
        `tbl1_daypresent1`, 
        `tbl1_unitearned1`, 
        `tbl1_average`, 
        `tbl2_school1`, 
        `tbl2_ca1`, 
        `tbl2_sy1`, 
        `tbl2_crr_yr1`, 
        `tbl2_crr_yr2`, 
        `tbl2_crr_yr3`, 
        `tbl2_crr_yr4`, 
        `tbl2_crr_yr5`, 
        `tbl2_crr_yr6`, 
        `tbl2_crr_yr7`, 
        `tbl2_crr_yr8`, 
        `tbl2_crr_yr9`, 
        `tbl2_crr_yr10`, 
        `tbl2_sub1`, 
        `tbl2_sub2`, 
        `tbl2_sub3`, 
        `tbl2_sub4`, 
        `tbl2_sub5`, 
        `tbl2_sub6`, 
        `tbl2_sub7`, 
        `tbl2_sub8`, 
        `tbl2_sub9`, 
        `tbl2_sub10`, 
        `tbl2_sub1_fr1`, 
        `tbl2_sub2_fr2`, 
        `tbl2_sub3_fr3`, 
        `tbl2_sub4_fr4`, 
        `tbl2_sub5_fr5`, 
        `tbl2_sub6_fr6`, 
        `tbl2_sub7_fr7`, 
        `tbl2_sub8_fr8`, 
        `tbl2_sub9_fr9`, 
        `tbl2_sub10_fr10`, 
        `tbl2_sub1_at1`, 
        `tbl2_sub2_at2`, 
        `tbl2_sub3_at3`, 
        `tbl2_sub4_at4`, 
        `tbl2_sub5_at5`, 
        `tbl2_sub6_at6`, 
        `tbl2_sub7_at7`, 
        `tbl2_sub8_at8`, 
        `tbl2_sub9_at9`, 
        `tbl2_sub10_at10`, 
        `tbl2_sub1_ce1`, 
        `tbl2_sub2_ce2`, 
        `tbl2_sub3_ce3`, 
        `tbl2_sub4_ce4`, 
        `tbl2_sub5_ce5`, 
        `tbl2_sub6_ce6`, 
        `tbl2_sub7_ce7`, 
        `tbl2_sub8_ce8`, 
        `tbl2_sub9_ce9`, 
        `tbl2_sub10_ce10`, 
        `tbl2_dayofschool1`, 
        `tbl2_daypresent1`, 
        `tbl2_unitearned1`, 
        `tbl2_average`, 
        `tbl3_school1`, 
        `tbl3_ca1`, 
        `tbl3_sy1`, 
        `tbl3_crr_yr1`, 
        `tbl3_crr_yr2`, 
        `tbl3_crr_yr3`, 
        `tbl3_crr_yr4`, 
        `tbl3_crr_yr5`, 
        `tbl3_crr_yr6`, 
        `tbl3_crr_yr7`, 
        `tbl3_crr_yr8`, 
        `tbl3_crr_yr9`, 
        `tbl3_crr_yr10`, 
        `tbl3_sub1`, 
        `tbl3_sub2`, 
        `tbl3_sub3`, 
        `tbl3_sub4`, 
        `tbl3_sub5`, 
        `tbl3_sub6`, 
        `tbl3_sub7`, 
        `tbl3_sub8`, 
        `tbl3_sub9`, 
        `tbl3_sub10`, 
        `tbl3_sub1_fr1`, 
        `tbl3_sub2_fr2`, 
        `tbl3_sub3_fr3`, 
        `tbl3_sub4_fr4`, 
        `tbl3_sub5_fr5`, 
        `tbl3_sub6_fr6`, 
        `tbl3_sub7_fr7`, 
        `tbl3_sub8_fr8`, 
        `tbl3_sub9_fr9`, 
        `tbl3_sub10_fr10`, 
        `tbl3_sub1_at1`, 
        `tbl3_sub2_at2`, 
        `tbl3_sub3_at3`, 
        `tbl3_sub4_at4`, 
        `tbl3_sub5_at5`, 
        `tbl3_sub6_at6`, 
        `tbl3_sub7_at7`, 
        `tbl3_sub8_at8`, 
        `tbl3_sub9_at9`, 
        `tbl3_sub10_at10`, 
        `tbl3_sub1_ce1`, 
        `tbl3_sub2_ce2`, 
        `tbl3_sub3_ce3`, 
        `tbl3_sub4_ce4`, 
        `tbl3_sub5_ce5`, 
        `tbl3_sub6_ce6`, 
        `tbl3_sub7_ce7`, 
        `tbl3_sub8_ce8`, 
        `tbl3_sub9_ce9`, 
        `tbl3_sub10_ce10`, 
        `tbl3_dayofschool1`, 
        `tbl3_daypresent1`, 
        `tbl3_unitearned1`, 
        `tbl3_average`, 
        `tbl4_school1`, 
        `tbl4_ca1`, 
        `tbl4_sy1`, 
        `tbl4_crr_yr1`, 
        `tbl4_crr_yr2`, 
        `tbl4_crr_yr3`, 
        `tbl4_crr_yr4`, 
        `tbl4_crr_yr5`, 
        `tbl4_crr_yr6`, 
        `tbl4_crr_yr7`, 
        `tbl4_crr_yr8`, 
        `tbl4_crr_yr9`, 
        `tbl4_crr_yr10`, 
        `tbl4_sub1`, 
        `tbl4_sub2`, 
        `tbl4_sub3`, 
        `tbl4_sub4`, 
        `tbl4_sub5`, 
        `tbl4_sub6`, 
        `tbl4_sub7`, 
        `tbl4_sub8`, 
        `tbl4_sub9`, 
        `tbl4_sub10`, 
        `tbl4_sub1_fr1`, 
        `tbl4_sub2_fr2`, 
        `tbl4_sub3_fr3`, 
        `tbl4_sub4_fr4`, 
        `tbl4_sub5_fr5`, 
        `tbl4_sub6_fr6`, 
        `tbl4_sub7_fr7`, 
        `tbl4_sub8_fr8`, 
        `tbl4_sub9_fr9`, 
        `tbl4_sub10_fr10`, 
        `tbl4_sub1_at1`, 
        `tbl4_sub2_at2`, 
        `tbl4_sub3_at3`, 
        `tbl4_sub4_at4`, 
        `tbl4_sub5_at5`, 
        `tbl4_sub6_at6`, 
        `tbl4_sub7_at7`, 
        `tbl4_sub8_at8`, 
        `tbl4_sub9_at9`, 
        `tbl4_sub10_at10`, 
        `tbl4_sub1_ce1`, 
        `tbl4_sub2_ce2`, 
        `tbl4_sub3_ce3`, 
        `tbl4_sub4_ce4`, 
        `tbl4_sub5_ce5`, 
        `tbl4_sub6_ce6`, 
        `tbl4_sub7_ce7`, 
        `tbl4_sub8_ce8`, 
        `tbl4_sub9_ce9`, 
        `tbl4_sub10_ce10`, 
        `tbl4_dayofschool1`, 
        `tbl4_daypresent1`, 
        `tbl4_unitearned1`, 
        `tbl4_average`, 
        `cert_grad_1`, 
        `cert_grad_2`, 
        `cert_grad_3`, 
        `tran_1`, 
        `tran_2`
    ) VALUES ( 
        '$lastName', 
        '$firstName', 
        '$middleName', 
        '$nameExt', 
        '$citizenship', 
        '$gender', 
        '$lrn', 
        '$withLRN', 
        '$birthDate', 
        '$placeBirth', 
        '$address', 
        '$guardian', 
        '$occupation', 
        '$interCourseComplete',
        '$schoolYear', 
        '$generalAverage',
        '$table1School1',
        '$table1ClassifiedAs1', 
        '$table1SchoolYear1',  
        '$table1CurrYr1', 
        '$table1CurrYr2', 
        '$table1CurrYr3', 
        '$table1CurrYr4', 
        '$table1CurrYr5', 
        '$table1CurrYr6', 
        '$table1CurrYr7', 
        '$table1CurrYr8', 
        '$table1CurrYr9', 
        '$table1CurrYr10', 
        '$table1Sub1', 
        '$table1Sub2', 
        '$table1Sub3', 
        '$table1Sub4', 
        '$table1Sub5', 
        '$table1Sub6', 
        '$table1Sub7', 
        '$table1Sub8', 
        '$table1Sub9', 
        '$table1Sub10', 
        '$table1Subj1Fr1',
        '$table1Subj1Fr2',
        '$table1Subj1Fr3',
        '$table1Subj1Fr4',
        '$table1Subj1Fr5',
        '$table1Subj1Fr6',
        '$table1Subj1Fr7',
        '$table1Subj1Fr8',
        '$table1Subj1Fr9',
        '$table1Subj1Fr10',
        '$table1Subj1At1',
        '$table1Subj1At2',
        '$table1Subj1At3',
        '$table1Subj1At4',
        '$table1Subj1At5',
        '$table1Subj1At6',
        '$table1Subj1At7',
        '$table1Subj1At8',
        '$table1Subj1At9',
        '$table1Subj1At10',
        '$table1Subj1Ce1',
        '$table1Subj1Ce2',
        '$table1Subj1Ce3',
        '$table1Subj1Ce4',
        '$table1Subj1Ce5',
        '$table1Subj1Ce6',
        '$table1Subj1Ce7',
        '$table1Subj1Ce8',
        '$table1Subj1Ce9',
        '$table1Subj1Ce10',
        '$table1DayOfSchool',
        '$table1DayOfPresent',
        '$table1UnitEarned1',
        '$table1Average',
        '$table2School1', 
        '$table2ClassifiedAs1',
        '$table2SchoolYear1', 
        '$table2CurrYr1', 
        '$table2CurrYr2', 
        '$table2CurrYr3', 
        '$table2CurrYr4', 
        '$table2CurrYr5', 
        '$table2CurrYr6', 
        '$table2CurrYr7', 
        '$table2CurrYr8', 
        '$table2CurrYr9', 
        '$table2CurrYr10', 
        '$table2Sub1',
        '$table2Sub2',
        '$table2Sub3',
        '$table2Sub4',
        '$table2Sub5',
        '$table2Sub6',
        '$table2Sub7',
        '$table2Sub8',
        '$table2Sub9',
        '$table2Sub10',
        '$table2Subj1Fr1',
        '$table2Subj1Fr2',
        '$table2Subj1Fr3',
        '$table2Subj1Fr4',
        '$table2Subj1Fr5',
        '$table2Subj1Fr6',
        '$table2Subj1Fr7',
        '$table2Subj1Fr8',
        '$table2Subj1Fr9',
        '$table2Subj1Fr10',
        '$table2Subj1At1',
        '$table2Subj1At2',
        '$table2Subj1At3',
        '$table2Subj1At4',
        '$table2Subj1At5',
        '$table2Subj1At6',
        '$table2Subj1At7',
        '$table2Subj1At8',
        '$table2Subj1At9',
        '$table2Subj1At10',
        '$table2Subj1Ce1',
        '$table2Subj1Ce2',
        '$table2Subj1Ce3',
        '$table2Subj1Ce4',
        '$table2Subj1Ce5',
        '$table2Subj1Ce6',
        '$table2Subj1Ce7',
        '$table2Subj1Ce8',
        '$table2Subj1Ce9',
        '$table2Subj1Ce10',
        '$table2DayOfSchool',
        '$table2DayOfPresent',
        '$table2UnitEarned1',
        '$table2Average',
        '$table3School1', 
        '$table3ClassifiedAs1',
        '$table3SchoolYear1', 
        '$table3CurrYr1', 
        '$table3CurrYr2', 
        '$table3CurrYr3', 
        '$table3CurrYr4', 
        '$table3CurrYr5', 
        '$table3CurrYr6', 
        '$table3CurrYr7', 
        '$table3CurrYr8', 
        '$table3CurrYr9', 
        '$table3CurrYr10', 
        '$table3Sub1',
        '$table3Sub2',
        '$table3Sub3',
        '$table3Sub4',
        '$table3Sub5',
        '$table3Sub6',
        '$table3Sub7',
        '$table3Sub8',
        '$table3Sub9',
        '$table3Sub10',
        '$table3Subj1Fr1',
        '$table3Subj1Fr2',
        '$table3Subj1Fr3',
        '$table3Subj1Fr4',
        '$table3Subj1Fr5',
        '$table3Subj1Fr6',
        '$table3Subj1Fr7',
        '$table3Subj1Fr8',
        '$table3Subj1Fr9',
        '$table3Subj1Fr10',
        '$table3Subj1At1',
        '$table3Subj1At2',
        '$table3Subj1At3',
        '$table3Subj1At4',
        '$table3Subj1At5',
        '$table3Subj1At6',
        '$table3Subj1At7',
        '$table3Subj1At8',
        '$table3Subj1At9',
        '$table3Subj1At10',
        '$table3Subj1Ce1',
        '$table3Subj1Ce2',
        '$table3Subj1Ce3',
        '$table3Subj1Ce4',
        '$table3Subj1Ce5',
        '$table3Subj1Ce6',
        '$table3Subj1Ce7',
        '$table3Subj1Ce8',
        '$table3Subj1Ce9',
        '$table3Subj1Ce10',
        '$table3DayOfSchool',
        '$table3DayOfPresent',
        '$table3UnitEarned1',
        '$table3Average', 
        '$table4School1', 
        '$table4ClassifiedAs1',
        '$table4SchoolYear1', 
        '$table4CurrYr1', 
        '$table4CurrYr2', 
        '$table4CurrYr3', 
        '$table4CurrYr4', 
        '$table4CurrYr5', 
        '$table4CurrYr6', 
        '$table4CurrYr7', 
        '$table4CurrYr8', 
        '$table4CurrYr9', 
        '$table4CurrYr10', 
        '$table4Sub1',
        '$table4Sub2',
        '$table4Sub3',
        '$table4Sub4',
        '$table4Sub5',
        '$table4Sub6',
        '$table4Sub7',
        '$table4Sub8',
        '$table4Sub9',
        '$table4Sub10',
        '$table4Subj1Fr1',
        '$table4Subj1Fr2',
        '$table4Subj1Fr3',
        '$table4Subj1Fr4',
        '$table4Subj1Fr5',
        '$table4Subj1Fr6',
        '$table4Subj1Fr7',
        '$table4Subj1Fr8',
        '$table4Subj1Fr9',
        '$table4Subj1Fr10',
        '$table4Subj1At1',
        '$table4Subj1At2',
        '$table4Subj1At3',
        '$table4Subj1At4',
        '$table4Subj1At5',
        '$table4Subj1At6',
        '$table4Subj1At7',
        '$table4Subj1At8',
        '$table4Subj1At9',
        '$table4Subj1At10',
        '$table4Subj1Ce1',
        '$table4Subj1Ce2',
        '$table4Subj1Ce3',
        '$table4Subj1Ce4',
        '$table4Subj1Ce5',
        '$table4Subj1Ce6',
        '$table4Subj1Ce7',
        '$table4Subj1Ce8',
        '$table4Subj1Ce9',
        '$table4Subj1Ce10',
        '$table4DayOfSchool',
        '$table4DayOfPresent',
        '$table4UnitEarned1',
        '$table4Average', 
        '$cedrificateOfGrad1',
        '$cedrificateOfGrad2',
        '$cedrificateOfGrad3', 
        '$transfer1', 
        '$transfer2'
        )";
    $con->query($sql) or die ($con->error);
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
    <title>STS | Add Student</title>
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
                    <h1 data-aos="fade-right">Add Student <i class="fa-solid fa-user-plus"></i></h1>
                    <hr class="section-divider">
            </div>
                <div class="error-container<?php echo !empty($lrnError) ? ' active' : ''; ?>" id="errorContainer">
                    <span class="error-message"><?php echo $lrnError; ?></span>
                    <span class="error-close" onclick="closeError()"><i class="fa-solid fa-xmark"></i></span>
                </div>
            <div class="main-content">
                <button class="btn">
                    <a href="list.php"><i class="fa-solid fa-chevron-left"></i> Back</a>
                </button>
                <div class="table-container">
                    <form action="" method="post">
                        <button class="btn" type="submit" name="submit">Add <i class="fa-solid fa-user-plus"></i></button>
                        <table class="table">
                            <tr>
                                <th class="th " colspan="8">SECONDARY STUDENT'S PERMANENT RECORD</th>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Last name: 
                                    <span class="value">
                                        <input type="text" name="last_name" minlength="2" pattern="[^\d]+" autocomplete="off" required>
                                    </span>
                                </td>
                                <td colspan="3" class="bold-letter">First name:
                                    <span class="value">
                                        <input type="text" name="first_name" minlength="2" pattern="[^\d]+" autocomplete="off" required>
                                    </span>
                                </td>
                                <td colspan="3" class="bold-letter">Name Ext. (Jr, I, II):
                                    <span class="value">
                                        <input type="text" name="name_ext" minlength="1" pattern="[^\d]+" autocomplete="off">
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Middle name:
                                    <span class="value">
                                        <input type="text" name="middle_name" pattern="[^\d]+" autocomplete="off">
                                    </span>
                                </td>
                                <td colspan="3" class="bold-letter">Citizenship: 
                                    <span class="value">
                                        <input type="text" name="citizenship" minlength="2" pattern="[^\d]+" autocomplete="off" required>
                                    </span>
                                </td>
                                <td colspan="1" class="bold-letter">Gender: 
                                    <span class="value">
                                        <select name="gender" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">
                                    <span class="value">
                                        <select name="with_lrn" id="with_lrn" onchange="toggleLRNInput()" style="background: yellow; border-radius: 5px; border: 1px solid gray;">
                                            <option value="TRUE" style="background: lightgreen;">With </option>
                                            <option value="FALSE" style="background: pink;">Without </option>
                                        </select>
                                    </span>
                                    LRN:
                                    <span class="value">
                                        <input type="text" name="lrn" pattern="[0-9]*" minlength="12" maxlength="12" autocomplete="off" id="lrn_input">
                                        <input type="hidden" name="lrn_without" value="">
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Date of Birth:
                                    <span class="value">
                                        <input type="text" name="date_of_birth" autocomplete="off" required>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Place of Birth:
                                    <span class="value">
                                        <input type="text" name="place_of_birth" pattern="[^\d]+" autocomplete="off">
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Address:
                                    <span class="value">
                                        <input type="text" name="stu_address" autocomplete="off">
                                    </span>
                                </td>
                            </tr>
                            <tr colspan="8">
                                <td colspan="4" class="bold-letter">Guardian:
                                    <span class="value">
                                        <input type="text" name="guardian" pattern="[^\d]+" autocomplete="off">
                                    </span>
                                </td>
                                <td colspan="4" class="bold-letter">Occupation:
                                    <span class="value">
                                        <input type="text" name="occupation" pattern="[^\d]+" autocomplete="off">
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="bold-letter">Inter. Course Cpl.:
                                    <span class="value">
                                        <input type="text" name="inter_course_com" pattern="[^\d]+" autocomplete="off" required>
                                    </span>
                                </td>
                                <td colspan="1" class="bold-letter">School year:
                                    <span class="value">
                                        <input type="text" name="school_year" pattern="[0-9]*" minlength="4" maxlength="4" autocomplete="off" required>
                                    </span>
                                </td>
                                <td colspan="1" class="bold-letter">General Average:
                                    <span class="value">
                                        <input type="text" name="general_average" minlength="2" maxlength="5" autocomplete="off" required>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table class="table">
                            <!-- TABLE I  -->
                            <tr>
                                <th class="th" colspan="8">RECORDS</th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <input type="text" name="tbl1_school1" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <input type="text" name="tbl1_ca1" pattern="[^\d]+" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <input type="text" name="tbl1_sy1" autocomplete="off">
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
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub1" autocomplete="off">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub1_fr1" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <span class="value">
                                        <select name="tbl1_sub1_at1" class="option">
                                            <option value=""></option>
                                            <option value="Passed">Passed</option>
                                            <option value="Failed">Failed</option>
                                            <option value="Retained">Retained</option>
                                        </select>
                                    </span>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub1_ce1" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr2" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub2" autocomplete="off">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub2_fr2" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub2_at2" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub2_ce2" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr3" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub3" autocomplete="off">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub3_fr3" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub3_at3" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub3_ce3" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr4" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub4" autocomplete="off">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub4_fr4" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub4_at4" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub4_ce4" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr5" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub5" autocomplete="off">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub5_fr5" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub5_at5" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub5_ce5" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr6" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub6" autocomplete="off">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub6_fr6" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub6_at6" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub6_ce6" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr7" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub7" autocomplete="off">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub7_fr7" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub7_at7" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub7_ce7" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr8" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl1_sub8" autocomplete="off">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub8_fr8" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub8_at8" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub8_ce8" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr9" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl1_sub9" autocomplete="off">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub9_fr9" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub9_at9" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub9_ce9" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl1_crr_yr10" class="bold-letter option">
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl1_sub10" autocomplete="off">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub10_fr10" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl1_sub10_at10" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl1_sub10_ce10" minlength="1" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <input type="text" name="tbl1_dayofschool1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <input type="text" name="tbl1_unitearned1" minlength="1" maxlength="3" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <input type="text" name="tbl1_daypresent1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <input type="text" name="tbl1_average" minlength="2" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <!-- TABLE II -->
                            <tr>
                                <th class="th" colspan="8">RECORDS </th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <input type="text" name="tbl2_school1" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <input type="text" name="tbl2_ca1" pattern="[^\d]+" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <input type="text" name="tbl2_sy1" autocomplete="off">
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
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" style="width: 100%;" type="text" name="tbl2_sub1">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub1_fr1" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub1_at1" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub1_ce1" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr2" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub2">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub2_fr2" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub2_at2" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub2_ce2" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr3" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub3">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub3_fr3" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub3_at3" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub3_ce3" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr4" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub4">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub4_fr4" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub4_at4" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub4_ce4" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr5" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub5">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub5_fr5" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub5_at5" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub5_ce5" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr6" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub6">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub6_fr6" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub6_at6" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub6_ce6" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr7" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub7">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub7_fr7" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub7_at7" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub7_ce7" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr8" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl2_sub8">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub8_fr8" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub8_at8" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub8_ce8" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr9" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl2_sub9">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub9_fr9" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub9_at9" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub9_ce9" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl2_crr_yr10" class="bold-letter option">
                                        <option value="II">II</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl2_sub10">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub10_fr10" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl2_sub10_at10" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl2_sub10_ce10" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <input type="text" name="tbl2_dayofschool1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <input type="text" name="tbl2_unitearned1" minlength="1" maxlength="3" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <input type="text" name="tbl2_daypresent1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <input type="text" name="tbl2_average" minlength="2" maxlength="5" autocomplete="off">
                                </td>
                            </tr>
                            <!-- TABLE III -->
                            <tr>
                                <th class="th" colspan="8">RECORDS </th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <input type="text" name="tbl3_school1" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <input type="text" name="tbl3_ca1" pattern="[^\d]+" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <input type="text" name="tbl3_sy1" autocomplete="off">
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
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub1">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub1_fr1" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub1_at1" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub1_ce1" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr2" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub2">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub2_fr2" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub2_at2" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub2_ce2" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr3" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub3">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub3_fr3" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub3_at3" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub3_ce3" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr4" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub4">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub4_fr4" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub4_at4" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub4_ce4" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr5" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub5">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub5_fr5" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub5_at5" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub5_ce5" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr6" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub6">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub6_fr6" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub6_at6" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub6_ce6" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr7" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub7">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub7_fr7" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub7_at7" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub7_ce7" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr8" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl3_sub8">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub8_fr8" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub8_at8" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub8_ce8" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr9" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl3_sub9">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub9_fr9" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub9_at9" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub9_ce9" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl3_crr_yr10" class="bold-letter option">
                                        <option value="III">III</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl3_sub10">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub10_fr10" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl3_sub10_at10" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl3_sub10_ce10" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <input type="text" name="tbl3_dayofschool1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <input type="text" name="tbl3_unitearned1" minlength="1" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <input type="text" name="tbl3_daypresent1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <input type="text" name="tbl3_average" minlength="2" maxlength="5">
                                </td>
                            </tr>
                            <!-- TABLE IV -->
                            <tr>
                                <th class="th" colspan="8">RECORDS </th>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold-letter">School:
                                    <input type="text" name="tbl4_school1" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Classified as:
                                    <input type="text" name="tbl4_ca1" pattern="[^\d]+" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">School year:
                                    <input type="text" name="tbl4_sy1" autocomplete="off">
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
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub1">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub1_fr1" minlength="1" maxlength="5">
                                </td>
                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub1_at1" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub1_ce1" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr2" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub2">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub2_fr2" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub2_at2" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub2_ce2" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr3" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub3">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub3_fr3" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub3_at3" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub3_ce3" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr4" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub4">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub4_fr4" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub4_at4" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub4_ce4" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr5" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub5">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub5_fr5" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub5_at5" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub5_ce5" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr6" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub6">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub6_fr6" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub6_at6" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub6_ce6" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr7" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub7">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub7_fr7" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub7_a7" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub7_ce7" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr8" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4"> 
                                    <input style="width: 100%;" type="text" name="tbl4_sub8">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub8_fr8" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub8_at8" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub8_ce8" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr9" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl4_sub9">
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub9_fr9" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub9_at9" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub9_ce9" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="tdcenter">
                                    <select name="tbl4_crr_yr10" class="bold-letter option">
                                        <option value="IV">IV</option>
                                        <option value="I">I</option>
                                        <option value=""></option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </td>
                                <td colspan="4">
                                    <input style="width: 100%;" type="text" name="tbl4_sub10">
                                </td>
                                <td colspan="1">
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub10_fr10" minlength="1" maxlength="5">
                                </td>                                <td colspan="1" class="tdcenter"> 
                                    <select name="tbl4_sub10_at10" class="option">
                                        <option value=""></option>
                                        <option value="Passed">Passed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Retained">Retained</option>
                                    </select>
                                </td>
                                <td colspan="1"> 
                                    <input style="width: 100%;" class="inputcenter" type="text" name="tbl4_sub10_ce10" minlength="1" maxlength="5">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days of School:
                                    <input type="text" name="tbl4_dayofschool1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">Total Units Earned:
                                    <input type="text" name="tbl4_unitearned1" minlength="1" maxlength="3">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="bold-letter">Days Present:
                                    <input type="text" name="tbl4_daypresent1" minlength="3" maxlength="5" autocomplete="off">
                                </td>
                                <td colspan="4" class="bold-letter">General Average:
                                    <input type="text" name="tbl4_average" minlength="2" maxlength="5">
                                </td>
                            </tr>
                        </table>
                        <div class="footer-container">
                            <div class="cert-grad">
                                <div class="footer-title">
                                    <h3>CERTIFICATION OF GRADUATION</h3>
                                </div>
                                <div class="cert-grad-text">
                                    <p>Graduates as of <span><input class="footer-input" type="text" name="cert_grad_1"></span></p>
                                    <p>Under Special Order (A) No. <span><input class="footer-input" type="text" name="cert_grad_2"></span></p>
                                    <p>S. <span><input class="footer-input" type="text" name="cert_grad_3"></span></p>
                                </div>
                            </div>
                            <div class="transfer">
                                <div class="footer-title">
                                    <h3>TRANSFER</h3>
                                </div>
                                This cedrtifies that this is the true record of <span><input class="footer-input inputcenter" type="text" name="tran_1" required></span> is eligible for graduation to <span><input class="footer-input inputcenter" name="tran_2" type="text" required></span> student as regular/irregular and has no money/property responsibility in this school.
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
    function toggleLRNInput() {
        const withLrnSelect = document.getElementById('with_lrn');
        const lrnInput = document.getElementById('lrn_input');
    const lrnWithoutInput = document.getElementsByName('lrn_without')[0];

    if (withLrnSelect.value === 'TRUE') {
        lrnInput.style.display = 'inline-block';
        lrnWithoutInput.value = '';
    } else {
        lrnInput.style.display = 'none';
        lrnWithoutInput.value = 'NULL';
    }
}
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="js/clock.js"></script>
<script src="js/script.js"></script>
</html>