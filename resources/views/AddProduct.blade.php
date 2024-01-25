{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">`
        <title>E-Commerce - Add Product</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <link href="img/favicon.ico" rel="icon">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <link href="{{ asset("assets/lib/animate/animate.min.css")}}" rel="stylesheet">
        <link href="{{ asset("assets/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">

        <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>

    <form action="{{ route('')}}">

    </form>

</body>
</html> --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Commerce - Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <div class="container py-3 mt-5 mx-5">
        <h1>ADD PRODUCT</h1>
        <form action="{{route('product.create')}}" method="POST">
            @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Description</label>
          <input type="text" class="form-control" name="description">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Price</label>
          <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Quantity</label>
          <input type="text" class="form-control" name="quantity">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Status</label>
          <input type="text" class="form-control" name="status">
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
