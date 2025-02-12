<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Paese</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet"/>
      <style>
         /* Container for product details */
.product-container {
    font-family: Arial, sans-serif;
    color: #333;
    max-width: 1200px;
    margin: auto;
}

.product-main {
    display: flex;
    width: 100%;
    height: 400px;
    border-radius: 20px;
    padding: 20px;
    font-family: Arial, sans-serif;
    border: 1px solid #ddd;
    margin-top: 10px;
    margin-bottom: 10px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
}

.product-image {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.product-image img {
    max-width: 100%;
    width: 50%;
    height: 350px;
    mix-blend-mode:multiply;
    margin-bottom: 10px;
}
a:hover{
    text-decoration: none;
    cursor: pointer;
}
.product-details {
    flex: 1;
}

.product-details h2 {
    font-size: 24px;
    margin: 0 0 10px;
}

.product-rating {
    color: #f39c12;
    font-size: 16px;
}

.product-rating span {
    color: #777;
    font-size: 14px;
    margin-left: 10px;
}

.product-price {
    font-size: 24px;
    color: #333;
    margin: 10px 0;
}

.product-options {
    width: 100%;
    padding: 8px;
    margin: 10px 0;
    border-radius: 4px;
}

.product-description {
    font-size: 14px;
    color: #666;
    margin: 10px 0;
}

.add-to-cart {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.add-to-cart:hover {
    background-color: #555;
}
</style>
</head>
<body>
<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

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
    $sql = "SELECT id, name, price, image FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output each product
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-container">';
            echo '<div class="product-main">';
            echo '<div class="product-image">';
            echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="product-image">';
            echo '</div>';
            echo '<div class="product-details">';
             // Link to product detail page
            echo '<a href="product_detail?id=' . $row['id'] . '">';
            echo '<h2 class="product-name">' . $row['name'] . '</h2>';
            echo '</a>';
            echo '<div class="product-rating">';
            echo "★★★★☆";
            echo '<span>4 Reviews</span>';
            echo '</div>';
            echo '<p class="product-price">Rs ' . $row['price'] . '</p>';
            echo '<p class="product-description">';
            echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
            echo '</p>';
            // Form for adding to cart
            echo '<form action="/add_To_Cart" method="POST">';
            // CSRF protection (assuming you're using a framework)
            echo '<input type="hidden" name="_token" value="' . csrf_token() . '">';
            echo '<div class="pro-qty">';
                echo '<input type="number" name="quantity" min="1" max="15" value="1"/>';
            echo '</div>';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '" />';
            echo '<button type="submit" name="addToCard" class="add-to-cart">Add To Cart</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 products found";
    }

    // Close connection
    $conn->close();
    ?>
</div>
<!-- footer start -->
@include('home.footer')
<!-- footer end -->

<!-- jQuery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>

