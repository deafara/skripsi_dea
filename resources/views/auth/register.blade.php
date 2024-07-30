<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <title>Register</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="{{ asset('assets/images/user.png') }}">
                </div>
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="name" class="form-control _ge_de_ol" placeholder="Enter Name" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control _ge_de_ol" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control _ge_de_ol" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control _ge_de_ol" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                    <div class="_btn_04">
                      <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                  </div>
                </form>
                <div class="form-group">
                  <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
