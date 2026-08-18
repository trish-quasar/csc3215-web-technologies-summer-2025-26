Lab Task 4 Final
PHP Form Validation with Cookies

Folder Structure
----------------
lab-04-final-student-registration-with-cookies/
|-- index.php
|-- controllers/
|   `-- RegistrationController.php
|-- models/
|   `-- StudentModel.php
|-- views/
|   `-- form.php
|-- assets/
|   `-- css/
|       `-- style.css
`-- README.txt

How to Run with MAMP on macOS
-----------------------------
1. Copy this folder into:
   /Applications/MAMP/htdocs/

2. Start Apache from MAMP.

3. If Apache uses port 8888, open:
   http://localhost:8888/lab-04-final-student-registration-with-cookies/

4. If Apache uses port 80, open:
   http://localhost/lab-04-final-student-registration-with-cookies/

Task Features
-------------
- Student Name, Student ID, Email, Department, Password and Confirm Password.
- POST form submission.
- Student Name required and only letters/spaces allowed.
- Student ID required and minimum 4 characters.
- Email required and validated using FILTER_VALIDATE_EMAIL.
- Department must be selected.
- Password required and minimum 6 characters.
- Confirm Password must match Password.
- student_name and student_id cookies are stored for 1 hour after successful validation.
- Saved cookie information is shown when the page is opened again.
- Clear Cookie button deletes both cookies.
- Confirmation message is shown after cookie deletion.
- MVC folder organization based on the faculty-provided MVC example.
