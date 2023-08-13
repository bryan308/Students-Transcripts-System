# Students Transcripts System (STS) v1.6

STS (Students Transcripts System) is a web-based application designed to assist school registrars in managing and generating students transcripts. The current version of STS is considered a work in progress and may contain gaps and limitations. Continuous development and improvements are necessary to enhance functionality and address identified issues. As the STS project was developed within a limited timeframe of one month, developers are admitted on the STS's limitations especially in security. The main objective of this Project is to generate/export an excel file in (.xlsx) format since the system is isolated and not for publication on it's first deployment.

## Key Features 

- User-friendly interface for easy navigation and information retrieval.
- Utilization of external libraries and frameworks, including:
    - PhpSpreadSheet: For generating costumized transcript templates in .xlsx format.
    - AOS: Provides smooth transitions and animations for enhanced user experience.
    - Font Awesome 5(Free version): Offers a wide range of icons for intuitive elements.
    - Google Font (Poppins): Provides a visually appealing and readable font family.
- Authentication system with two levels of access:
    - Guest: Allows viewing of the students list.
    - Administrator: Grants full access to the system's feature and functionalities.
- Transcripts generation:
    - Using a library PhpSpreadSheet, STS can generate an xlsx file with the corresponding template.
- Archive feature:
    - Instead of deleting a student in the list, you can archive it and will appear in the list of archived students in the settings.

## Future Development

The STS project has potential for further expansion and enhancement. Some suggested features for future development include:

- Dashboard: Implement a dashboard that provides an overview of key statistics, such as the number of students by year or their general average per year. Additionally, consider incorporating charts using chart.js library to visually present data.

- Settings (Administrator Access Only): Create an account management feature that allows administrator to manage user accounts. This includes functionalities such as disabling accounts, changing passwords or email addresses, and assigning students as encoders with restricted access to assist the admin in data encoding tasks.

- Enhanced Guest Access: Modify the guest privileges to restrict access to only the guest's own information, rather than the entire student list. This ensures privacy and security by limiting the visibility of student data.

## Technology used

- PHP v.8.2.4
- MySQL
- JavaScript
- HTML5
- CSS3