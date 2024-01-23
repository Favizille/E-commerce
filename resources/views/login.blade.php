<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Commerce Site</title>
    <link rel="stylesheet" href="{{ asset("admin/assets/vendors/mdi/css/materialdesignicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/assets/vendors/flag-icon-css/css/flag-icon.min.css")}}">
    <link rel="stylesheet" href="{{ asset("admin/assets/vendors/css/vendor.bundle.base.css")}}">
    <link rel="stylesheet" href="{{ asset("admin/assets/css/style.css")}}">
    <link rel="shortcut icon" href="{{ asset("admin/assets/images/favicon.png")}}">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <h2>E-Commerce Site</h2>
                  <h3>Login</h3>
                </div>

                <form action="{{ route('login')}}" class="pt-3" method="POST">
                    @csrf
                        @if(count($errors) > 0)
                            @foreach( $errors->all() as $message )
                                <div class="alert alert-danger display-hide">
                                <span>{{ $message }}</span>
                                </div>
                            @endforeach
                        @endif
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">

                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>

                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ route("register")}}" class="text-primary">Create</a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
