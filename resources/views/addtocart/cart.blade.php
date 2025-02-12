
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
<style>
.cart-container {
    display: flex;
    flex-direction: column;
    max-width: 800px;
    margin: auto;
    margin-top: 30px;
    margin-bottom: 30px;
    border: 1px solid #ddd;
    padding: 20px;
    background-color: #f9f9f9;
}

.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.cart-table th, .cart-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.product-info {
    display: flex;
    align-items: center;
}
.product-name{
    padding: 10px;
    font-weight:bold;
}
.product-info img{
    max-width: 100%;
    width: 200px;
    height: 200px;
    border-radius: 5px;
    mix-blend-mode:multiply;
}

.quantity-input {
    width: 50px;
}

.cart-actions, .discount-section, .cart-summary {
    margin-top: 20px;
    text-align: left;
}

.cart-actions button, .apply-coupon, .proceed-to-checkout {
    background-color: #000;
    color: #fff;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    margin-left: 10px;
}

.continue-shopping {
    background-color: #ddd;
    color: #000;
}

.cart-summary p {
    font-size: 18px;
}

.cart-summary .total {
    font-weight: bold;
    color: red;
}
a{
    color:black;
    cursor: pointer;
}

 </style>
   </head>
   <body class="sub_page">
      <div class="hero_area">
     <!-- header section strats -->
     @include('home.header')
      <!-- end header section -->
     <div class="cart-container">
     <table class="cart-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Update</th>
                <th>Total</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total=0;
            @endphp
            @foreach($cartItems as $item)
            <tr>
                <td class="product-info">
                <img src="{{ URL::asset($item->image)}}">
                    <span class="product-name">{{$item->name}}</span>
                </td>
                <td>RS.{{$item->price}}</td>
                <form action="{{ URL::to('updateCarts/'.$item->id) }}" method="POST">
               @csrf
               @method('POST')
               <td>
               <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="15"required>
               </td>
               <td>
               <button type="submit">Update</button>
               </td>
               </form>

                <td>RS.{{$item->price * $item->quantity}}</td>
               
                <td>
                    <a href="{{ URL::to('deleteCartItem/' . $item->id) }}"> <i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @php
            $total+=($item->price * $item->quantity);
            @endphp
            @endforeach

        </tbody>
    </table>

    <div class="cart-actions">
        <button class="continue-shopping">Continue Shopping</button>
    </div>

    <div class="discount-section">
        <input type="text" placeholder="Coupon code" class="coupon-input">
        <button class="apply-coupon">Apply</button>
    </div>

    <div class="cart-summary">
        <p>Subtotal: <span class="subtotal">Rs.{{$total}}</span></p>
        <p>Total: <span class="total">RS.{{$total}}</span></p>
<form action="{{ route('esewa') }}" method="POST">
   @csrf
   @method('put')
    <input type="text" name="fullname" class="form-control mt-2" placeholder="Full Name" required>
    <input type="text" name="phone" class="form-control mt-2" placeholder="Phone" required>
    <input type="text" name="address" class="form-control mt-2" placeholder="Address" required>
    <input type="hidden" name="bill" value="{{ $total }}" required>
    <input type="submit" class="proceed-to-checkout mt-2 btn-block" value="pay with esewa">
</form>
<form action="{{ URL::to('checkout') }}">
<input type="submit" class="proceed-to-checkout mt-2 btn-block" value="cash on delivery">
</form>
    </div>
</div>
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