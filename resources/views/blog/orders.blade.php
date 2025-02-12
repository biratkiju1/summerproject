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
      </style>
    </head>
    <body>
    <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

    <section id="home">
        <div class="hero">
            
            
        </div>
        <h1>Our Services</h1>
    <ul class="services-list">
        <li class="services-item"><a href="orders" class="services-link">Orders</a></li>
        <li class="services-item"><a href="blog" class="services-link">Promos</a></li>
        <li class="services-item"><a href="chats" class="services-link">Chats</a></li>
    </ul>
    <h1>this is orders page</h1>
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