<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.cjsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Flutter payment page </title>
  </head>
  <body>
   
    <div class="container">
    <div class="header px-5 mt-2 text-white text-center bg-primary py-5 ">
        <h1>Pay for product</h1>
        
    </div>
    <div class="main">
        <form id="makepaymentForm">
            @csrf
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"name="name" id="name" class="form-control" placeholder="Enter full name" required>
        </div>
    </div>
<div class="col-6">
        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="email"name="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mt-2">
            <label for="amount">Amount:</label>
            <input type="number"name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
        </div>
    </div>
<div class="col-6">
        <div class="form-group mt-2">
            <label for="number">Phone number:</label>
            <input type="number"name="number" id="number" class="form-control" placeholder="Enter your phone number" required>
        </div>
    </div>

</div>

<div class="form-group mt-2">
    <button type="submit" class="btn btn-primary ">Pay Now</button>
    
</div>           
</form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.cjs" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.cjsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.cjs" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://checkout.flutterwave.com/v3.cjs"></script>
    
    <script>
    $(function (){
        $("#makepaymentForm").submit(function (e){
            e.preventDefault();
            // console.log("well!");
            var name = $("#name").val();
            var email = $("#email").val();
            var number = $("#number").val();
            var amount = $("#amount").val();
            // make our payment
            makePayment(amount,email,number,name);
        });
    });
    function makePayment(amount, email, number, name) {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-6fdbd1b554472c31fd44a1d77a51431d-X",
                tx_ref: "RX1_{{substr(rand(0,time()),0,7)}}",
                amount,
                currency: "USD",
                country: "US",
                payment_options: "",

                customer: {
                    email,
                    number,
                    name,
                    
                },
                
                callback: function (data) {
                    var transaction_id = data.transaction_id;
                    var _token = $("input[name='_token']").val();
                  // console.log(transaction_id);
                    $.ajax({
                        type: "POST",
                        url:"{{URL::to('verify-payment')}}",
                        data: {
                             transaction_id,
                             _token
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                },
                onclose: function(){

                },
                customizations: {
                    title: "My Store",
                    description: "Payment for an awesome cruise",
                    logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
                },
            });
            console.log("done!");  
        }
        
    </script>
</body>
</html>
