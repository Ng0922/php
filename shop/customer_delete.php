<?php
// Include database connection
include 'config/database.php';

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the delete query
        $query = "DELETE FROM customer WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1, $id);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to the product listing page with a success message
            header("Location: customer_listing.php?action=deleted");
            exit();
        } else {
            // If deletion fails, throw an exception
            throw new PDOException("Unable to delete the account.");
        }
    } catch (PDOException $exception) {
        // Handle errors
        echo "<div class='alert alert-danger'>" . $exception->getMessage() . "</div>";
    }
} else {
    // If no ID is provided, show an error
    echo "<div class='alert alert-danger'>Invalid request. Customer not found.</div>";
}
?>