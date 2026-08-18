<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="page">

    <div class="card">
        <h1>Student Registration Form</h1>
        <p class="subtitle">Enter the student information below.</p>

        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="register">

            <div class="form-row">
                <label for="student_name">Student Name</label>
                <div class="field-control">
                    <input
                        type="text"
                        id="student_name"
                        name="student_name"
                        class="<?php echo isset($errors["student_name"]) ? "input-error" : ""; ?>"
                        value="<?php echo htmlspecialchars($old["student_name"] ?? ""); ?>"
                    >
                    <?php if (isset($errors["student_name"])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors["student_name"]); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <label for="student_id">Student ID</label>
                <div class="field-control">
                    <input
                        type="text"
                        id="student_id"
                        name="student_id"
                        class="<?php echo isset($errors["student_id"]) ? "input-error" : ""; ?>"
                        value="<?php echo htmlspecialchars($old["student_id"] ?? ""); ?>"
                    >
                    <?php if (isset($errors["student_id"])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors["student_id"]); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <label for="email">Email</label>
                <div class="field-control">
                    <input
                        type="text"
                        id="email"
                        name="email"
                        class="<?php echo isset($errors["email"]) ? "input-error" : ""; ?>"
                        value="<?php echo htmlspecialchars($old["email"] ?? ""); ?>"
                    >
                    <?php if (isset($errors["email"])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors["email"]); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <label for="department">Department</label>
                <div class="field-control">
                    <select
                        id="department"
                        name="department"
                        class="<?php echo isset($errors["department"]) ? "input-error" : ""; ?>"
                    >
                        <option value="">Select Department</option>
                        <option value="CSE" <?php echo (($old["department"] ?? "") == "CSE") ? "selected" : ""; ?>>CSE</option>
                        <option value="EEE" <?php echo (($old["department"] ?? "") == "EEE") ? "selected" : ""; ?>>EEE</option>
                        <option value="BBA" <?php echo (($old["department"] ?? "") == "BBA") ? "selected" : ""; ?>>BBA</option>
                        <option value="English" <?php echo (($old["department"] ?? "") == "English") ? "selected" : ""; ?>>English</option>
                    </select>
                    <?php if (isset($errors["department"])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors["department"]); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <label for="password">Password</label>
                <div class="field-control">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="<?php echo isset($errors["password"]) ? "input-error" : ""; ?>"
                    >
                    <?php if (isset($errors["password"])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors["password"]); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <label for="confirm_password">Confirm Password</label>
                <div class="field-control">
                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        class="<?php echo isset($errors["confirm_password"]) ? "input-error" : ""; ?>"
                    >
                    <?php if (isset($errors["confirm_password"])): ?>
                        <span class="field-error"><?php echo htmlspecialchars($errors["confirm_password"]); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="button-row">
                <input type="submit" value="Register">
            </div>
        </form>

        <form action="index.php" method="POST" class="clear-form">
            <input type="hidden" name="action" value="clear_cookie">
            <button type="submit" class="clear-button">Clear Cookie</button>
        </form>
    </div>

    <div class="card saved-info">
        <?php if (!empty($saved_student)): ?>
            <h2>Welcome Back!</h2>
            <p><strong>Student Name:</strong> <?php echo htmlspecialchars($saved_student["student_name"]); ?></p>
            <p><strong>Student ID:</strong> <?php echo htmlspecialchars($saved_student["student_id"]); ?></p>
        <?php else: ?>
            <h2>Saved Student Information</h2>
            <p>No saved student information found.</p>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
