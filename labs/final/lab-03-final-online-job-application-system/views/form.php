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

        .error-box {
            color: #b00020;
            margin-bottom: 25px;
        }

        .error-box p {
            margin: 6px 0;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        .form-row > label {
            width: 230px;
            font-weight: bold;
            flex-shrink: 0;
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

        .gender-options {
            width: 330px;
        }

        .gender-options label {
            margin-right: 18px;
        }

        .file-input {
            width: 330px;
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

<?php if (!empty($errors)): ?>
    <div class="error-box">
        <h3>Application Failed!</h3>
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="process.php" method="POST" enctype="multipart/form-data">

    <div class="form-row">
        <label>Applicant ID:</label>
        <input type="text" name="applicant_id" value="<?= htmlspecialchars($old['applicant_id'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label>Full Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label>Phone Number:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
    </div>

    <div class="form-row">
        <label>Password:</label>
        <input type="password" name="password">
    </div>

    <div class="form-row">
        <label>Gender:</label>
        <div class="gender-options">
            <input type="radio" name="gender" value="Male" id="male" <?= (($old['gender'] ?? '') == 'Male') ? 'checked' : '' ?>>
            <label for="male">Male</label>

            <input type="radio" name="gender" value="Female" id="female" <?= (($old['gender'] ?? '') == 'Female') ? 'checked' : '' ?>>
            <label for="female">Female</label>
        </div>
    </div>

    <div class="form-row">
        <label>Job Position:</label>
        <select name="job_position">
            <option value="">Select Job Position</option>
            <?php foreach ($job_positions as $position): ?>
                <option value="<?= htmlspecialchars($position) ?>" <?= (($old['job_position'] ?? '') == $position) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($position) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-row">
        <label>Educational Qualification:</label>
        <input type="text" name="qualification" value="<?= htmlspecialchars($old['qualification'] ?? '') ?>">
    </div>

    <div class="form-row address-row">
        <label>Address:</label>
        <textarea name="address"><?= htmlspecialchars($old['address'] ?? '') ?></textarea>
    </div>

    <div class="form-row">
        <label>Upload CV:</label>
        <input class="file-input" type="file" name="cv" accept=".pdf,.doc,.docx">
    </div>

    <input class="submit-button" type="submit" value="Apply">

</form>

</div>

</body>
</html>
