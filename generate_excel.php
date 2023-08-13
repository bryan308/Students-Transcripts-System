<?php

include_once("connections/connection.php");
$con = connection();

// Import necessary classes from PhpSpreadsheet library
use PhpOffice\PhpSpreadsheet\IOFactory;       // For working with spreadsheet file I/O
use PhpOffice\PhpSpreadsheet\Spreadsheet;     // For creating and manipulating spreadsheets
use PhpOffice\PhpSpreadsheet\Style\Font;       // For applying styles to spreadsheet cells

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Include the autoloader file to load the necessary dependencies for PHPExcel
    require_once 'vendor/autoload.php';

    // Retrieve the student data from the database based on the provided 'id'
    $query = $con->query("SELECT * FROM students_list_old WHERE id = '$studentId'");

// Check if the query has returned any rows
if ($query->num_rows > 0) {

    $row = $query->fetch_assoc();

    $templateFile = 'templates/template.xlsx';
    $spreadsheet = IOFactory::load($templateFile);
    $worksheet = $spreadsheet->getActiveSheet();
    
    $worksheet->setCellValue('A10', "Name: " . $row['last_name'] . ", " . $row['first_name'] . " " . $row['middle_name'] . " " . $row['name_ext']);
    $worksheet->setCellValue('F10', "Citizenship: " . $row['citizenship']);
    $worksheet->setCellValue('K10', "Sex: " . $row['gender']);
    $worksheet->setCellValue('A11', "Date of birth: " . $row['date_of_birth']);
    $worksheet->setCellValue('F11', "Place of birth: " . $row['place_of_birth']);
    $worksheet->setCellValue('A12', "Guardian: " . $row['guardian']);
    $worksheet->setCellValue('F12', "Occupation: " . $row['occupation']);
    $worksheet->setCellValue('A13', "Address: " . $row['stu_address']);
    $worksheet->setCellValue('A14', "Intermediate Course Completed: " . $row['inter_course_com']);
    $worksheet->setCellValue('H14', "School Year: " . $row['school_year']);
    $worksheet->setCellValue('K14', "Gen. Ave.: " . $row['general_average']);
    // ============================Table 1============================
    $worksheet->setCellValue('A16', "School: " . $row['tbl1_school1']);
    $worksheet->setCellValue('A17', "Classified as: " . $row['tbl1_ca1']);
    $worksheet->setCellValue('C17', "School Year: " . $row['tbl1_sy1']);
    $worksheet->setCellValue('A19', $row['tbl1_crr_yr1']);
    $worksheet->setCellValue('A20', $row['tbl1_crr_yr2']);
    $worksheet->setCellValue('A21', $row['tbl1_crr_yr3']);
    $worksheet->setCellValue('A22', $row['tbl1_crr_yr4']);
    $worksheet->setCellValue('A24', $row['tbl1_crr_yr5']);
    $worksheet->setCellValue('A25', $row['tbl1_crr_yr6']);
    $worksheet->setCellValue('A26', $row['tbl1_crr_yr7']);
    $worksheet->setCellValue('A36', $row['tbl1_crr_yr8']);
    $worksheet->setCellValue('A37', $row['tbl1_crr_yr9']);
    $worksheet->setCellValue('A38', $row['tbl1_crr_yr10']);
    $worksheet->setCellValue('B19', $row['tbl1_sub1']);
    $worksheet->setCellValue('B20', $row['tbl1_sub2']);
    $worksheet->setCellValue('B21', $row['tbl1_sub3']);
    $worksheet->setCellValue('B22', $row['tbl1_sub4']);
    $worksheet->setCellValue('B24', $row['tbl1_sub5']);
    $worksheet->setCellValue('B25', $row['tbl1_sub6']);
    $worksheet->setCellValue('B26', $row['tbl1_sub7']);
    $worksheet->setCellValue('B36', $row['tbl1_sub8']);
    $worksheet->setCellValue('B37', $row['tbl1_sub9']);
    $worksheet->setCellValue('B38', $row['tbl1_sub10']);
    $worksheet->setCellValue('C19', $row['tbl1_sub1_fr1']);
    $worksheet->setCellValue('C20', $row['tbl1_sub2_fr2']);
    $worksheet->setCellValue('C21', $row['tbl1_sub3_fr3']);
    $worksheet->setCellValue('C22', $row['tbl1_sub4_fr4']);
    $worksheet->setCellValue('C24', $row['tbl1_sub5_fr5']);
    $worksheet->setCellValue('C25', $row['tbl1_sub6_fr6']);
    $worksheet->setCellValue('C26', $row['tbl1_sub7_fr7']);
    $worksheet->setCellValue('C36', $row['tbl1_sub8_fr8']);
    $worksheet->setCellValue('C37', $row['tbl1_sub9_fr9']);
    $worksheet->setCellValue('C38', $row['tbl1_sub10_fr10']);
    $worksheet->setCellValue('E19', $row['tbl1_sub1_at1']);
    $worksheet->setCellValue('E20', $row['tbl1_sub2_at2']);
    $worksheet->setCellValue('E21', $row['tbl1_sub3_at3']);
    $worksheet->setCellValue('E22', $row['tbl1_sub4_at4']);
    $worksheet->setCellValue('E24', $row['tbl1_sub5_at5']);
    $worksheet->setCellValue('E25', $row['tbl1_sub6_at6']);
    $worksheet->setCellValue('E26', $row['tbl1_sub7_at7']);
    $worksheet->setCellValue('E36', $row['tbl1_sub8_at8']);
    $worksheet->setCellValue('E37', $row['tbl1_sub9_at9']);
    $worksheet->setCellValue('E38', $row['tbl1_sub10_at10']);
    $worksheet->setCellValue('F19', $row['tbl1_sub1_ce1']);
    $worksheet->setCellValue('F20', $row['tbl1_sub2_ce2']);
    $worksheet->setCellValue('F21', $row['tbl1_sub3_ce3']);
    $worksheet->setCellValue('F22', $row['tbl1_sub4_ce4']);
    $worksheet->setCellValue('F24', $row['tbl1_sub5_ce5']);
    $worksheet->setCellValue('F25', $row['tbl1_sub6_ce6']);
    $worksheet->setCellValue('F26', $row['tbl1_sub7_ce7']);
    $worksheet->setCellValue('F36', $row['tbl1_sub8_ce8']);
    $worksheet->setCellValue('F37', $row['tbl1_sub9_ce9']);
    $worksheet->setCellValue('F38', $row['tbl1_sub10_ce10']);
    $worksheet->setCellValue('A39', "Days of School: " . $row['tbl1_dayofschool1']);
    $worksheet->setCellValue('C39', "Total Units Earned: " . $row['tbl1_unitearned1']);
    $worksheet->setCellValue('A40', "Days Present:    " . $row['tbl1_daypresent1']);
    $worksheet->setCellValue('C40', "Gen. Ave.: " . $row['tbl1_average']);
    // ============================Table 2============================
    $worksheet->setCellValue('H16', "School: " . $row['tbl2_school1']);
    $worksheet->setCellValue('H17', "Classified as: " . $row['tbl2_ca1']);
    $worksheet->setCellValue('J17', "School Year: " . $row['tbl2_sy1']);
    $worksheet->setCellValue('H19', $row['tbl2_crr_yr1']);
    $worksheet->setCellValue('H20', $row['tbl2_crr_yr2']);
    $worksheet->setCellValue('H21', $row['tbl2_crr_yr3']);
    $worksheet->setCellValue('H22', $row['tbl2_crr_yr4']);
    $worksheet->setCellValue('H24', $row['tbl2_crr_yr5']);
    $worksheet->setCellValue('H25', $row['tbl2_crr_yr6']);
    $worksheet->setCellValue('H26', $row['tbl2_crr_yr7']);
    $worksheet->setCellValue('H36', $row['tbl2_crr_yr8']);
    $worksheet->setCellValue('H37', $row['tbl2_crr_yr9']);
    $worksheet->setCellValue('H38', $row['tbl2_crr_yr10']);
    $worksheet->setCellValue('I19', $row['tbl2_sub1']);
    $worksheet->setCellValue('I20', $row['tbl2_sub2']);
    $worksheet->setCellValue('I21', $row['tbl2_sub3']);
    $worksheet->setCellValue('I22', $row['tbl2_sub4']);
    $worksheet->setCellValue('I24', $row['tbl2_sub5']);
    $worksheet->setCellValue('I25', $row['tbl2_sub6']);
    $worksheet->setCellValue('I26', $row['tbl2_sub7']);
    $worksheet->setCellValue('I36', $row['tbl2_sub8']);
    $worksheet->setCellValue('I37', $row['tbl2_sub9']);
    $worksheet->setCellValue('I38', $row['tbl2_sub10']);
    $worksheet->setCellValue('J19', $row['tbl2_sub1_fr1']);
    $worksheet->setCellValue('J20', $row['tbl2_sub2_fr2']);
    $worksheet->setCellValue('J21', $row['tbl2_sub3_fr3']);
    $worksheet->setCellValue('J22', $row['tbl2_sub4_fr4']);
    $worksheet->setCellValue('J24', $row['tbl2_sub5_fr5']);
    $worksheet->setCellValue('J25', $row['tbl2_sub6_fr6']);
    $worksheet->setCellValue('J26', $row['tbl2_sub7_fr7']);
    $worksheet->setCellValue('J36', $row['tbl2_sub8_fr8']);
    $worksheet->setCellValue('J37', $row['tbl2_sub9_fr9']);
    $worksheet->setCellValue('J38', $row['tbl2_sub10_fr10']);
    $worksheet->setCellValue('L19', $row['tbl2_sub1_at1']);
    $worksheet->setCellValue('L20', $row['tbl2_sub2_at2']);
    $worksheet->setCellValue('L21', $row['tbl2_sub3_at3']);
    $worksheet->setCellValue('L22', $row['tbl2_sub4_at4']);
    $worksheet->setCellValue('L24', $row['tbl2_sub5_at5']);
    $worksheet->setCellValue('L25', $row['tbl2_sub6_at6']);
    $worksheet->setCellValue('L26', $row['tbl2_sub7_at7']);
    $worksheet->setCellValue('L36', $row['tbl2_sub8_at8']);
    $worksheet->setCellValue('L37', $row['tbl2_sub9_at9']);
    $worksheet->setCellValue('L38', $row['tbl2_sub10_at10']);
    $worksheet->setCellValue('M19', $row['tbl2_sub1_ce1']);
    $worksheet->setCellValue('M20', $row['tbl2_sub2_ce2']);
    $worksheet->setCellValue('M21', $row['tbl2_sub3_ce3']);
    $worksheet->setCellValue('M22', $row['tbl2_sub4_ce4']);
    $worksheet->setCellValue('M24', $row['tbl2_sub5_ce5']);
    $worksheet->setCellValue('M25', $row['tbl2_sub6_ce6']);
    $worksheet->setCellValue('M26', $row['tbl2_sub7_ce7']);
    $worksheet->setCellValue('M36', $row['tbl2_sub8_ce8']);
    $worksheet->setCellValue('M37', $row['tbl2_sub9_ce9']);
    $worksheet->setCellValue('M38', $row['tbl2_sub10_ce10']);
    $worksheet->setCellValue('H39', "Days of School: " . $row['tbl2_dayofschool1']);
    $worksheet->setCellValue('J39', "Total Units Earned: " . $row['tbl2_unitearned1']);
    $worksheet->setCellValue('H40', "Days Present:    " . $row['tbl2_daypresent1']);
    $worksheet->setCellValue('J40', "Gen. Ave.: " . $row['tbl2_average']);
    // ============================Table 3============================
    $worksheet->setCellValue('A42', "School: " . $row['tbl3_school1']);
    $worksheet->setCellValue('A43', "Classified as: " . $row['tbl3_ca1']);
    $worksheet->setCellValue('C43', "School Year: " . $row['tbl3_sy1']);
    $worksheet->setCellValue('A45', $row['tbl3_crr_yr1']);
    $worksheet->setCellValue('A46', $row['tbl3_crr_yr2']);
    $worksheet->setCellValue('A47', $row['tbl3_crr_yr3']);
    $worksheet->setCellValue('A48', $row['tbl3_crr_yr4']);
    $worksheet->setCellValue('A50', $row['tbl3_crr_yr5']);
    $worksheet->setCellValue('A51', $row['tbl3_crr_yr6']);
    $worksheet->setCellValue('A52', $row['tbl3_crr_yr7']);
    $worksheet->setCellValue('A62', $row['tbl3_crr_yr8']);
    $worksheet->setCellValue('A63', $row['tbl3_crr_yr9']);
    $worksheet->setCellValue('A64', $row['tbl3_crr_yr10']);
    $worksheet->setCellValue('B45', $row['tbl3_sub1']);
    $worksheet->setCellValue('B46', $row['tbl3_sub2']);
    $worksheet->setCellValue('B47', $row['tbl3_sub3']);
    $worksheet->setCellValue('B48', $row['tbl3_sub4']);
    $worksheet->setCellValue('B50', $row['tbl3_sub5']);
    $worksheet->setCellValue('B51', $row['tbl3_sub6']);
    $worksheet->setCellValue('B52', $row['tbl3_sub7']);
    $worksheet->setCellValue('B62', $row['tbl3_sub8']);
    $worksheet->setCellValue('B63', $row['tbl3_sub9']);
    $worksheet->setCellValue('B64', $row['tbl3_sub10']);
    $worksheet->setCellValue('C45', $row['tbl3_sub1_fr1']);
    $worksheet->setCellValue('C46', $row['tbl3_sub2_fr2']);
    $worksheet->setCellValue('C47', $row['tbl3_sub3_fr3']);
    $worksheet->setCellValue('C48', $row['tbl3_sub4_fr4']);
    $worksheet->setCellValue('C50', $row['tbl3_sub5_fr5']);
    $worksheet->setCellValue('C51', $row['tbl3_sub6_fr6']);
    $worksheet->setCellValue('C52', $row['tbl3_sub7_fr7']);
    $worksheet->setCellValue('C62', $row['tbl3_sub8_fr8']);
    $worksheet->setCellValue('C63', $row['tbl3_sub9_fr9']);
    $worksheet->setCellValue('C64', $row['tbl3_sub10_fr10']);
    $worksheet->setCellValue('E45', $row['tbl3_sub1_at1']);
    $worksheet->setCellValue('E46', $row['tbl3_sub2_at2']);
    $worksheet->setCellValue('E47', $row['tbl3_sub3_at3']);
    $worksheet->setCellValue('E48', $row['tbl3_sub4_at4']);
    $worksheet->setCellValue('E50', $row['tbl3_sub5_at5']);
    $worksheet->setCellValue('E51', $row['tbl3_sub6_at6']);
    $worksheet->setCellValue('E52', $row['tbl3_sub7_at7']);
    $worksheet->setCellValue('E62', $row['tbl3_sub8_at8']);
    $worksheet->setCellValue('E63', $row['tbl3_sub9_at9']);
    $worksheet->setCellValue('E64', $row['tbl3_sub10_at10']);
    $worksheet->setCellValue('F45', $row['tbl3_sub1_ce1']);
    $worksheet->setCellValue('F46', $row['tbl3_sub2_ce2']);
    $worksheet->setCellValue('F47', $row['tbl3_sub3_ce3']);
    $worksheet->setCellValue('F48', $row['tbl3_sub4_ce4']);
    $worksheet->setCellValue('F50', $row['tbl3_sub5_ce5']);
    $worksheet->setCellValue('F51', $row['tbl3_sub6_ce6']);
    $worksheet->setCellValue('F52', $row['tbl3_sub7_ce7']);
    $worksheet->setCellValue('F62', $row['tbl3_sub8_ce8']);
    $worksheet->setCellValue('F63', $row['tbl3_sub9_ce9']);
    $worksheet->setCellValue('F64', $row['tbl3_sub10_ce10']);
    $worksheet->setCellValue('A65', "Days of School: " . $row['tbl3_dayofschool1']);
    $worksheet->setCellValue('C65', "Total Units Earned: " . $row['tbl3_unitearned1']);
    $worksheet->setCellValue('A66', "Days Present:    " . $row['tbl3_daypresent1']);
    $worksheet->setCellValue('C66', "Gen. Ave.: " . $row['tbl3_average']);
    // ============================Table 4============================
    $worksheet->setCellValue('H42', "School: " . $row['tbl4_school1']);
    $worksheet->setCellValue('H43', "Classified as: " . $row['tbl4_ca1']);
    $worksheet->setCellValue('J43', "School Year: " . $row['tbl4_sy1']);
    $worksheet->setCellValue('H45', $row['tbl4_crr_yr1']);
    $worksheet->setCellValue('H46', $row['tbl4_crr_yr2']);
    $worksheet->setCellValue('H47', $row['tbl4_crr_yr3']);
    $worksheet->setCellValue('H48', $row['tbl4_crr_yr4']);
    $worksheet->setCellValue('H50', $row['tbl4_crr_yr5']);
    $worksheet->setCellValue('H51', $row['tbl4_crr_yr6']);
    $worksheet->setCellValue('H52', $row['tbl4_crr_yr7']);
    $worksheet->setCellValue('H62', $row['tbl4_crr_yr8']);
    $worksheet->setCellValue('H63', $row['tbl4_crr_yr9']);
    $worksheet->setCellValue('H64', $row['tbl4_crr_yr10']);
    $worksheet->setCellValue('I45', $row['tbl4_sub1']);
    $worksheet->setCellValue('I46', $row['tbl4_sub2']);
    $worksheet->setCellValue('I47', $row['tbl4_sub3']);
    $worksheet->setCellValue('I48', $row['tbl4_sub4']);
    $worksheet->setCellValue('I50', $row['tbl4_sub5']);
    $worksheet->setCellValue('I51', $row['tbl4_sub6']);
    $worksheet->setCellValue('I52', $row['tbl4_sub7']);
    $worksheet->setCellValue('I62', $row['tbl4_sub8']);
    $worksheet->setCellValue('I63', $row['tbl4_sub9']);
    $worksheet->setCellValue('I64', $row['tbl4_sub10']);
    $worksheet->setCellValue('J45', $row['tbl4_sub1_fr1']);
    $worksheet->setCellValue('J46', $row['tbl4_sub2_fr2']);
    $worksheet->setCellValue('J47', $row['tbl4_sub3_fr3']);
    $worksheet->setCellValue('J48', $row['tbl4_sub4_fr4']);
    $worksheet->setCellValue('J50', $row['tbl4_sub5_fr5']);
    $worksheet->setCellValue('J51', $row['tbl4_sub6_fr6']);
    $worksheet->setCellValue('J52', $row['tbl4_sub7_fr7']);
    $worksheet->setCellValue('J62', $row['tbl4_sub8_fr8']);
    $worksheet->setCellValue('J63', $row['tbl4_sub9_fr9']);
    $worksheet->setCellValue('J64', $row['tbl4_sub10_fr10']);
    $worksheet->setCellValue('L45', $row['tbl4_sub1_at1']);
    $worksheet->setCellValue('L46', $row['tbl4_sub2_at2']);
    $worksheet->setCellValue('L47', $row['tbl4_sub3_at3']);
    $worksheet->setCellValue('L48', $row['tbl4_sub4_at4']);
    $worksheet->setCellValue('L50', $row['tbl4_sub5_at5']);
    $worksheet->setCellValue('L51', $row['tbl4_sub6_at6']);
    $worksheet->setCellValue('L52', $row['tbl4_sub7_at7']);
    $worksheet->setCellValue('L62', $row['tbl4_sub8_at8']);
    $worksheet->setCellValue('L63', $row['tbl4_sub9_at9']);
    $worksheet->setCellValue('L64', $row['tbl4_sub10_at10']);
    $worksheet->setCellValue('M45', $row['tbl4_sub1_ce1']);
    $worksheet->setCellValue('M46', $row['tbl4_sub2_ce2']);
    $worksheet->setCellValue('M47', $row['tbl4_sub3_ce3']);
    $worksheet->setCellValue('M48', $row['tbl4_sub4_ce4']);
    $worksheet->setCellValue('M50', $row['tbl4_sub5_ce5']);
    $worksheet->setCellValue('M51', $row['tbl4_sub6_ce6']);
    $worksheet->setCellValue('M52', $row['tbl4_sub7_ce7']);
    $worksheet->setCellValue('M62', $row['tbl4_sub8_ce8']);
    $worksheet->setCellValue('M63', $row['tbl4_sub9_ce9']);
    $worksheet->setCellValue('M64', $row['tbl4_sub10_ce10']);
    $worksheet->setCellValue('H65', "Days of School: " . $row['tbl4_dayofschool1']);
    $worksheet->setCellValue('J65', "Total Units Earned: " . $row['tbl4_unitearned1']);
    $worksheet->setCellValue('H66', "Days Present:    " . $row['tbl4_daypresent1']);
    $worksheet->setCellValue('J66', "Gen. Ave.: " . $row['tbl4_average']);

    // Style underline for inputs in footer
    $underlineStyle = [
            'font' => [
                    'underline' => Font::UNDERLINE_SINGLE,
            ],
    ];
    $worksheet->getStyle('H71')->applyFromArray($underlineStyle);
    $worksheet->getStyle('H72')->applyFromArray($underlineStyle);
    // $worksheet->getStyle('C70')->applyFromArray($underlineStyle);
    // $worksheet->getStyle('C71')->applyFromArray($underlineStyle);
    // $worksheet->getStyle('B72')->applyFromArray($underlineStyle);

    // ============================ Footer ============================
    //checks if the field is empty
    if ($row['cert_grad_1'] == '') {    //if it's empty
        $worksheet->setCellValue('A70', "Graduates as of ______________________________________");   //throw this
    } else {    // if it has a value
        $worksheet->setCellValue('A70', "Graduates as of " . $row['cert_grad_1']);  //throw this
    }

    if ($row['cert_grad_2'] == '') {
        $worksheet->setCellValue('A71', "Under Special Order (A) No. ___________________________");
    } else {
        $worksheet->setCellValue('A71', "Under Special Order (A) No. " . $row['cert_grad_2']);
    }

    if ($row['cert_grad_1'] == '') {
        $worksheet->setCellValue('A72', "S. __________________________________________________");
    } else {
        $worksheet->setCellValue('A72', "S. " . $row['cert_grad_3']);
    }

    if ($row['tran_1'] == '') {
        $worksheet->setCellValue('H71', "__________________________________________________");
    } else {
        $worksheet->setCellValue('H71', "                         " . $row['tran_1'] . "                         ");
    }
    if ($row['tran_2'] == '') {
        $worksheet->setCellValue('H72', "__________________________________________________");
    } else {
        $worksheet->setCellValue('H72', "                              " . $row['tran_2'] . "                              ");
    }
    
    // Generate the filename for the exported Excel file based on the student's last and first
    $filename = $row['last_name'] . "-" . $row['first_name'] . ".xlsx";

    // Create a writer object for saving the modified spreadsheet as XLSX format
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

    // Save the modified spreadsheet to the generated filename
    $writer->save($filename);
    
    // Set the content type header to indicate that the response is an Excel file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    // Set the content disposition header to specify that the file should be downloaded with the given filename
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    // Set the cache control header to ensure the file is not cached by the browser
    header('Cache-Control: max-age=0');
    
    // Output the file to the browser
    readfile($filename);
    
    // Delete the temporary file
    unlink($filename);
    }
}
    // Terminate the script
    exit;

?>