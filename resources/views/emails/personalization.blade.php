<!DOCTYPE html>
<html>

<head>
    <title>Complete Your Checkout</title>
</head>

<body>
    <h2>Hello, {{ $data['name'] }}</h2>
    <p>Your order is almost complete! Click the button below to complete your checkout:</p>

    <p>
        <a href="{{ $checkoutUrl }}"
            style="display: inline-block; padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">
            Complete Checkout
        </a>
    </p>

    <p>Or copy this link: <br> <a href="{{ $checkoutUrl }}">{{ $checkoutUrl }}</a></p>
</body>

</html>
