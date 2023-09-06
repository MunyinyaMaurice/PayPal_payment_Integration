{{-- <!DOCTYPE html> --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0;url={{ $redirectUrl }}">
    {{-- {{ dd($redirectUrl)}} --}}
</head>
<body>
    <p>Redirecting...</p>
    <script>
        var width = 600;
            var height = 400;
            var left = (window.innerWidth - width) / 2;
            var top = (window.innerHeight - height) / 2;
            //var paymentUrl = "{{ $redirectUrl }}";

            // Open the payment page in a pop-up window
            window.location.href = window.open({{ $redirectUrl }}, 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);

        // window.location.href = "{{ $redirectUrl }}";
    </script>
</body>
</html>
