<!DOCTYPE HTML>
<html>


<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
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
            <h1>Read Customer</h1>

            <!-- PHP code to read records will be here -->
            <?php
            // include database connection
            include 'config/database.php';

            // delete message prompt will be here

            // select all data
            $query = "SELECT id, username,firstname, lastname FROM customer ORDER BY id DESC";
            $stmt = $con->prepare($query);
            $stmt->execute();

            // this is how to get number of rows returned
            $num = $stmt->rowCount();

            // link to create record form
            echo "<a href='product_create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

            //check if more than 0 record found
            if ($num > 0) {

                // data from database will be here
                echo "<table class='table table-hover table-responsive table-bordered'>"; //start table

                //creating our table heading
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>username</th>";
                echo "<th>firstname</th>";
                echo "<th>lastname</th>";
                echo "<th>Action</th>";
                echo "</tr>";

                // table body will be here
                // retrieve our table contents
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // extract row
                    // this will make $row['firstname'] to just $firstname only
                    extract($row);
                    // creating new table row per record
                    echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$username}</td>";
                    echo "<td>{$firstname}</td>";
                    echo "<td>{$lastname}</td>";
                    echo "<td>";
                    // read one record
                    echo "<a href='customer_details.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

                    // we will use this links on next part of this post
                    echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

                    // we will use this links on next part of this post
                    echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }


                // end table
                echo "</table>";
            }
            // if no records found
            else {
                echo "<div class='alert alert-danger'>No records found.</div>";
            }
            ?>


        </div> <!-- end .container -->

        <!-- confirm delete record will be here -->

</body>

</html>