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
/*chats*/
.chat-container {
    display: flex;
    flex-direction: column;
    width: 1200px;
    height: 60vh;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    margin: 40px;
}

/* Chat Header */
.chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background-color: #fff;
    border-bottom: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.chat-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.chat-organization {
    font-size: 14px;
    color: #777;
    font-weight: bold;
}

/* Chat Body */
.chat-body {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    background-color: #f9f9f9;
}

.message {
    margin-bottom: 15px;
}

.message-time {
    font-size: 12px;
    color: #aaa;
    margin-bottom: 5px;
    display: block;
}

.message-bubble {
    display: inline-block;
    padding: 10px 15px;
    background-color: #f1f1f1;
    border-radius: 15px;
    color: #333;
    font-size: 14px;
    max-width: 70%;
    word-wrap: break-word;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Chat Footer */
.chat-footer {
    padding: 10px 15px;
    border-top: 1px solid #ccc;
    background-color: #fff;
}

.input-container {
    display: flex;
    align-items: center;
    gap: 10px;
}

.chat-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #007bff;
    border-radius: 20px;
    font-size: 14px;
    outline: none;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.emoji-button,
.send-button {
    background-color: #fff;
    border: 1px solid #007bff;
    color: #007bff;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.emoji-button:hover,
.send-button:hover {
    background-color: #007bff;
    color: #fff;
}

/* Responsive Adjustments */
@media (max-width: 500px) {
    .chat-container {
        width: 100%;
        height: 100vh;
        border-radius: 0;
    }

    .chat-header,
    .chat-footer {
        padding: 10px 15px;
    }

    .chat-title {
        font-size: 16px;
    }

    .chat-organization {
        font-size: 12px;
    }
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
    <div class="chat-container">
        <!-- Chat Header -->
        <div class="chat-header">
            <div class="chat-title">Customer Support Chat</div>
        </div>

        <!-- Chat Body -->
        <div class="chat-body">
            <div class="message">
                <div class="message-bubble">Hello, Please help!</div>
            </div>
        </div>

        <!-- Chat Footer -->
        <div class="chat-footer">
            <div class="input-container">
                <input type="text" class="chat-input" placeholder="Type your message">
                <button class="send-button">➤</button>
            </div>
        </div>
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