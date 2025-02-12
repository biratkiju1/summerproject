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
   h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

/* Styling the navigation list */
.services-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    gap: 20px; /* Space between the items */
}

/* Individual list items */
.services-item {
    margin: 0;
}

/* Link styles for buttons */
.services-link {
    display: block;
    text-decoration: none;
    color: #333; 
    font-weight: bold;
    font-size: 16px; 
    text-align: center; 
    width: 200px; 
    height: auto; 
    padding: 15px 30px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    background-color: #fff; 
    transition: background-color 0.3s, box-shadow 0.3s;
    margin: 20px; 
}
.services-link1 {
    display: block;
    text-decoration: none;
    color: #fff; 
    font-weight: bold;
    font-size: 16px; 
    text-align: center; 
    width: 200px; 
    height: auto; 
    padding: 15px 30px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    background-color: #007bff; 
    transition: background-color 0.3s, box-shadow 0.3s;
    margin: 20px; 
}


/* Hover effect */
.services-link:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Active (click) effect */
.services-link:active {
    background-color: #0056b3;
    border-color: #0056b3;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
/* Container for the product image */
.product-image {
    width: 100%; /* Full width of the parent container */
    max-width: 1200px; /* Maximum width of the container */
    margin: 0 auto; /* Center the container horizontally */
    text-align: center; /* Center the image inside the container */
    border-radius: 8px; /* Rounded corners */
    overflow: hidden; /* Ensure the image doesn't overflow the container */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
    padding: 10px;
    
}

/* Image inside the product-image container */
.product-image img {
    width: 100%; /* Make the image fill the container */
    height: auto; /* Maintain aspect ratio */
    display: block; /* Remove extra space below the image */
    border: 2px solid #ccc;
}




</style>
    </head>
    <body>
    <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
    <section id="home">
        <h1>Our Services</h1>
    <ul class="services-list">
        <li class="services-item"><a href="orders" class="services-link">Orders</a></li>
        <li class="services-item"><a href="blog" class="services-link1">Promos</a></li>
        <li class="services-item"><a href="chats" class="services-link">Chats</a></li>
    </ul>    
    <div class="hero">
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
    $sql = "SELECT id, image FROM blogs";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output each product
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-image">';
            echo '<img src="' . $row['image'] . '" class="product-image">';
            echo '</div>';
        }
    }else {
        echo "promo not found";
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