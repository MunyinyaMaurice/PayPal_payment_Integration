<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Integration</title>
</head>
<body>

    <h2>Product: Mobile Phone</h2>
    <h3>Price: $199</h3>

    <div style="margin-bottom:10px;">
        <form action="{{ route('paypal') }}" method="post">
        @csrf
        <input type="hidden" name="price" value="199">
        <button type="submit">Pay With PayPal</button>
        </form>
    </div>

    <div> 
        <h3>Buy Movie Tickets 50.00</h3>
    <form method="POST" action="{{ route('pay') }}" id="paymentForm">
        {{ csrf_field() }}
    
        <input name="name" placeholder="Name" />
        <input name="email" type="email" placeholder="Your Email" />
        <input name="phone" type="tel" placeholder="Phone number" />
    
        <input type="submit" value="Buy" />
    </form>
    </div>
    
</body>
</html>