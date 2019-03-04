<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'PRS Tasking & Accomplishment')</title>

  <!-- Custom styles for this template-->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @yield('styles')

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            @yield('content')
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="{{ mix('js/app.js') }}"></script>
  @yield('scripts')

</body>

</html>
