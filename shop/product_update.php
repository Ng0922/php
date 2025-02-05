<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

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
    <div class="container">
        <div class="page-header">
            <h1>Update Product</h1>
        </div>
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT id, name, description, price FROM products WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
<!-- PHP post to update record will be here -->
<?php
// check if form was submitted
if($_POST){
    try{
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE products
                  SET name=:name, description=:description,
   price=:price WHERE id = :id";
        // prepare query for excecution
        $stmt = $con->prepare($query);
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
    	$description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price'])); 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }         
    }
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}?>

<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value="<?php echo $name;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $description;  ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' value="<?php echo $price;  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='product_listing.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>

   </div> 
   
</body>
</html>
