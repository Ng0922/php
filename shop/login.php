<!DOCTYPE HTML>
<?php
session_start();
?>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- container -->
    

    <body class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <img class="mb-4" src="https://lastfm.freetls.fastly.net/i/u/770x0/9c388a8db4c08b9c92e6dedab9d6b41c.jpg#9c388a8db4c08b9c92e6dedab9d6b41c" alt="" width="300"
                    height="150">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>

                </div>
                <?php
                include "config\database.php";
                if ($_POST) {
                    $email = $_POST['username'];
                    $password = $_POST['password'];
                    $errors = [];

                    if (empty($email)) {
                        $errors[] = 'email is required.';
                    }
                    if (empty($password)) {
                        $errors[] = 'password is required.';
                    }

                    if (!empty($errors)) {
                        echo "<div class='alert alert-danger'><ul>";
                        foreach ($errors as $error) {
                            echo "<li>{$error}</li>";
                        }
                        echo "</ul></div>";
                    } else {
                        $query = "SELECT username, password, account_status FROM customer WHERE username = ? LIMIT 1";

                        $stmt = $con->prepare($query);
                        $stmt->bindParam(1, $email);
                        $stmt->execute();
                        $num = $stmt->rowCount();

                        if ($num > 0) {
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            $hashed_password = $row['password'];
                            $fetch_status = $row['account_status'];
                            echo $hashed_password;
                            if ($password == $hashed_password) {
                                if ($fetch_status == 1) {
                                    $_SESSION['user_id'] = 1;
                                    $_SESSION['username'] = $email;
                                    $_SESSION['is_logged_in'] = true;
                                    header("Location:product_listing.php");
                                    exit();
                                } else {
                                    echo "<div class='alert alert-success'>Account not active</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger'>Invalid password.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Invalid username or email.</div";
                        }
                    }
                }

                ?>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

            </form>
        </main>
    </body>


    </div> <!-- end .container -->

    <!-- confirm delete record will be here -->


</body>

</html>