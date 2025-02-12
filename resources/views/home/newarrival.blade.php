<div class="New-arrival">
<h1>New Arrival</h1>
<section class="product-section">
    <?php
    // Database connection details
    $servername = "localhost";  // Change if needed
    $username = "root";         // Your database username
    $password = "";             // Your database password
    $dbname = "ecommercepro";   // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Fetch products from the database
    $sql = "SELECT id, name, price, image FROM products WHERE type='new arrival'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output each product
      while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card">';
        echo '<a href="product_detail?id=' . $row['id'] . '">'; // Link to product detail page
        echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="product-image">';
        echo '<h2 class="product-name">' . $row['name'] . '</h2>';
        echo '</a>';
        echo "★★★★☆";
        echo '<span>4 Reviews</span>';
        echo '<p class="product-price">Rs ' . $row['price'] . '</p>';
        // Add "Add to Cart" and "Buy" buttons
        echo '<div class="product-buttons">';
        echo '<form action="/add_To_Cart" method="POST">';
        // CSRF protection (assuming you're using a framework)
        echo '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        echo '<div class="pro-qty">';
            echo '<input type="hidden" name="quantity" value="1"/>';
        echo '</div>';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '" />';
        echo '<button type="submit" name="addToCard" class="add-to-cart">Add To Cart</button>';
        echo '</form>';
        // echo '<button class="buy-now">Buy Now</button>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "0 products found";
    }

    // Close connection
    $conn->close();
    ?>
</section>
</div>
