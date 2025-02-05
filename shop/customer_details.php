<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    #nav {
			margin-top:1%;
		}
		#nav ul {
			border-radius: 25px;
			margin: 0;
			padding: 15px 100px 17px 100px;
			background-color: #1b1b1b;
			font-size:35px;
			color:#fff;
			width:70%;
		}
		#nav ul li {
			display: inline-block;
			margin-right: 30px;
			position: relative;
			padding: 15px 20px;
			margin-top:-10px;
			margin-bottom: -10px;	
		}
		#nav ul li:hover{
			background-color:grey;
		}
		#nav ul li ul {
			padding: 0;
			position: absolute;
			top: 48px;
			left: 0;
			width: 150px;
			display: none;
			opacity: 0;
			visibility: hidden;
		}
		#nav ul li ul li {
			background: #555;
			display: block;
			color: #fff;
		}
		#nav ul li ul li:hover {
			background: #666;
		}
		#nav ul li:hover ul{
			display:block;
			opacity: 1;
			visibility: visible;
		}		
		
		#nav a:link{
			color:#fff;
			text-decoration: none;
		}
		#nav a:visited{
			color:#fff;
		}
    </style>

<body>
<div id="nav">
		<ul>
			<li><a href="product_create.php">Product Create</a></li>
			<li><a href="product_details.php">Product Details</a></li>
			<li><a href="customer_create.php">Customer Create</a></li>
			<li><a href="product_listing.php">Product Listing</a></li>
            <li><a href="login.php">Login</a></li>
		</ul>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Customer Details</h1>
        </div>

        <!-- PHP read one record will be here -->
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include 'config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT id, username, firstname, lastname,gender,date_of_birth, registration_date ,account_status FROM customer WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            // this refer to the first question mark
            $stmt->bindParam(1, $id);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $name = $row['username'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $gender = $row['gender'];
            $date_of_birth = $row['date_of_birth'];
            $registration = $row['registration_date'];
            $account_status = $row['account_status'];
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>



        <!-- HTML read one record table will be here -->

        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>username</td>
                <td><?php echo $name;  ?></td>
            </tr>
            <tr>
                <td>firstname</td>
                <td><?php echo $firstname;  ?></td>
            </tr>
            <tr>
                <td>lastname</td>
                <td><?php echo $lastname;  ?></td>
            </tr>
            <tr>
                <td>gender</td>
                <td><?php echo $gender;  ?></td>
            </tr>
            <tr>
                <td>date_of_birth</td>
                <td><?php echo $date_of_birth;  ?></td>
            </tr>
            <tr>
                <td>registration</td>
                <td><?php echo $registration;  ?></td>
            </tr>
            <tr>
                <td>account_status</td>
                <td><?php echo $account_status;  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='product_details.php' class='btn btn-danger'>Back to read products</a>
                </td>
            </tr>
        </table>


    </div> <!-- end .container -->

</body>

</html>