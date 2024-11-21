{{-- resources/views/emails/product-status.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Status Update</title>
</head>

<body>
    <div style="background-color:#f7f7f7;padding:20px;">
        <h2>Hello,</h2>
        <p>The stock for {{ $product->name }} is below the minimum threshold.</p>
        <p><a href="{{ url('/products/' . $product->id) }}" style="color: #007bff;">Click here to view the product
                details</a></p>
        <p>Thank you for using our service!</p>
    </div>
</body>

</html>
