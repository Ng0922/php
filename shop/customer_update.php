<?php
// Include database connection
include 'config/database.php';

if ($_POST) {
    try {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $dob= $_POST['dateofbirth'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $errors = [];

        // Validate required fields
        if (empty($username)) $errors[] = 'Username is required.';
        if (empty($firstname)) $errors[] = 'First Name is required.';
        if (empty($lastname)) $errors[] = 'Last Name is required.';
        if (empty($gender)) $errors[] = 'Gender is required.';
        if (empty($dob)) $errors[] = 'Date of birth is required.';

        // Fetch the existing password
        $query = "SELECT password FROM customer WHERE id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stored_password = $row['password'];

        // Handle password change
        if (!empty($old_password) || !empty($new_password) || !empty($confirm_password)) {
            if (empty($old_password)) $errors[] = 'Old password is required.';
            if (empty($new_password)) $errors[] = 'New password is required.';
            if (empty($confirm_password)) $errors[] = 'Confirm password is required.';
            if ($old_password !== $stored_password) $errors[] = 'Old password is incorrect.';
            if ($new_password === $stored_password) $errors[] = 'New password must be different from the old password.';
            if ($new_password !== $confirm_password) $errors[] = 'New password and confirm password do not match.';
        }

        if (!empty($errors)) {
            echo "<div class='alert alert-danger'><ul>";
            foreach ($errors as $error) {
                echo "<li>{$error}</li>";
            }
            echo "</ul></div>";
        } else {
            $query = "UPDATE customer SET username=:username, firstname=:firstname, lastname=:lastname, gender=:gender, date_of_birth=:date_of_birth";
            
            if (!empty($new_password)) {
                $query .= ", password=:password";
            }
            
            $query .= " WHERE id=:id";
            
            $stmt = $con->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':date_of_birth', $dob);
            $stmt->bindParam(':id', $id);
            
            if (!empty($new_password)) {
                $stmt->bindParam(':password', $new_password);
            }
            
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Customer record was updated.</div>";
            } else {
                echo "<div class='alert alert-danger'>Unable to update record.</div>";
            }
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Update Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Update Customer</h1>
        </div>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <table class='table table-hover table-responsive table-bordered'>
                <tr><td>Username</td><td><input type='text' name='username' class='form-control' required /></td></tr>
                <tr><td>First Name</td><td><input type='text' name='firstname' class='form-control' required /></td></tr>
                <tr><td>Last Name</td><td><input type='text' name='lastname' class='form-control' required /></td></tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type='radio' name='gender' value='male' required /> Male
                        <input type='radio' name='gender' value='female' required /> Female
                    </td>
                </tr>
                <tr><td>Date of Birth</td><td><input type='date' name='dateofbirth' class='form-control' required /></td></tr>
                <tr><td>Old Password</td><td><input type='password' name='old_password' class='form-control' /></td></tr>
                <tr><td>New Password</td><td><input type='password' name='new_password' class='form-control' /></td></tr>
                <tr><td>Confirm Password</td><td><input type='password' name='confirm_password' class='form-control' /></td></tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Update' class='btn btn-primary' />
                        <a href='customer_list.php' class='btn btn-danger'>Back</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>