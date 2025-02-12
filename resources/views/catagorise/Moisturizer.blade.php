
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
      <link href="home/css/style.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
     <!-- header section strats -->
     @include('home.header')
      <!-- end header section -->
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
    $sql = "SELECT id, name, price, image FROM products WHERE category='Moisturizer'";
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
    </div>
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
  
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>
