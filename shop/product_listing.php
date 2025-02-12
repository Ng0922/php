<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function delete_user(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                window.location.href = 'product_delete.php?id=' + id;
            }
        }
    </script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read Products</h1>
        </div>

        <!-- Search Form -->
        <form action="" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name, description, or category" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- PHP code to read records will be here -->
        <?php
        // Include database connection
        include 'config/database.php';

        // Check if search query is set
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // Select all data with search filter
        $query = "SELECT products.id, products.name, products.description, products.price, product_cat 
                  FROM products 
                  INNER JOIN product_cat ON products.product_cat = product_cat.product_cat_id 
                  WHERE products.name LIKE :search 
                  OR products.description LIKE :search 
                  OR product_cat LIKE :search 
                  ORDER BY products.id DESC";
        $stmt = $con->prepare($query);
        $searchTerm = "%$search%";
        $stmt->bindParam(':search', $searchTerm);
        $stmt->execute();

        // Get the number of rows returned
        $num = $stmt->rowCount();

        // Link to create record form
        echo "<a href='product_create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";

        // Check if more than 0 records found
        if ($num > 0) {

            // Data from database will be here
            echo "<table class='table table-hover table-responsive table-bordered'>"; // Start table

            // Create table heading
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Description</th>";
            echo "<th>Product Category</th>";
            echo "<th>Price</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            // Table body will be here
            // Retrieve table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Extract row
                extract($row);
                // Create new table row per record
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>{$product_cat}</td>";
                echo "<td>{$price}</td>";
                echo "<td>";
                // Read one record
                echo "<a href='product_details.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

                // Edit link
                echo "<a href='product_update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

                // Delete link with JavaScript confirmation
                echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            // End table
            echo "</table>";
        }
        // If no records found
        else {
            echo "<div class='alert alert-danger'>No records found.</div>";
        }
        ?>

    </div> <!-- end .container -->
</body>

</html>