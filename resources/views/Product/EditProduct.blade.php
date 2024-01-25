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
        <div class="row d-flex">
            <h1 class="col-4">Edit Product</h1>
            <div class="col-6"></div>
            <form action="{{route('admin.dashboard')}}" method="GET" class="col-2">
               @csrf
                <button type="submit" class="btn btn-primary">Dashboard</button>
            </form>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        @if(count($errors) > 0)
            @foreach( $errors->all() as $message )
                <div class="alert alert-danger display-hide">
                <span>{{ $message }}</span>
                </div>
            @endforeach
        @endif
        <form action="{{route('product.update', $product->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Name</label>
          <input type="text" class="form-control" name="name" value="{{old('name', $product->name)}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Description</label>
          <input type="text" class="form-control" name="description" value="{{old('description', $product->description)}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Price</label>
          <input type="text" class="form-control" name="price" value="{{old('price', $product->price)}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Quantity</label>
          <input type="text" class="form-control" name="quantity" value="{{old('quantity', $product->quantity)}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Status</label>
          <input type="text" class="form-control" name="status" value="{{old('status', $product->status)}}">
        </div>

        <button type="submit" class="btn btn-primary">Edit Product</button>
    </form>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
