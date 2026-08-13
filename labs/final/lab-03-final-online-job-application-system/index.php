<!DOCTYPE html>
<html>
<head>
    <title>Online Job Application System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .form-container {
            width: 620px;
            background-color: white;
            border: 1px solid #cccccc;
            padding: 30px;
            margin: auto;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 30px;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        .form-row label {
            width: 230px;
            font-weight: bold;
        }

        .form-row input[type="text"],
        .form-row input[type="password"],
        .form-row select,
        .form-row textarea {
            width: 330px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #999999;
        }

        .form-row textarea {
            height: 100px;
            resize: vertical;
        }

        .address-row {
            align-items: flex-start;
        }

        .gender-options label {
            width: auto;
            font-weight: normal;
            margin-right: 18px;
        }

        .submit-button {
            margin-left: 230px;
            padding: 9px 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="form-container">

<h2>Online Job Application Form</h2>

<form action="process.php" method="POST" enctype="multipart/form-data">

    <div class="form-row">
        <label>Applicant ID:</label>
        <input type="text" name="applicant_id">
    </div>

    <div class="form-row">
        <label>Full Name:</label>
        <input type="text" name="name">
    </div>

    <div class="form-row">
        <label>Email:</label>
        <input type="text" name="email">
    </div>

    <div class="form-row">
        <label>Phone Number:</label>
        <input type="text" name="phone">
    </div>

    <div class="form-row">
        <label>Password:</label>
        <input type="password" name="password">
    </div>

    <div class="form-row">
        <label>Gender:</label>

        <div class="gender-options">
            <input type="radio" name="gender" value="Male" id="male">
            <label for="male">Male</label>

            <input type="radio" name="gender" value="Female" id="female">
            <label for="female">Female</label>
        </div>
    </div>

    <div class="form-row">
        <label>Job Position:</label>

        <select name="job_position">

            <option value="">Select Job Position</option>

            <option value="Software Developer">
                Software Developer
            </option>

            <option value="Web Developer">
                Web Developer
            </option>

            <option value="Database Administrator">
                Database Administrator
            </option>

            <option value="Network Engineer">
                Network Engineer
            </option>

        </select>
    </div>

    <div class="form-row">
        <label>Educational Qualification:</label>
        <input type="text" name="qualification">
    </div>

    <div class="form-row address-row">
        <label>Address:</label>
        <textarea name="address"></textarea>
    </div>

    <div class="form-row">
        <label>Upload CV:</label>
        <input type="file" name="cv" accept=".pdf,.doc,.docx">
    </div>

    <input class="submit-button" type="submit" value="Apply">

</form>

</div>

</body>
</html>
