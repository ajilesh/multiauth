<!doctype html>
<html lang="en">
  <head>
  	<title>student login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('public/css/style.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                    @endif
					<h2 class="heading-section">{{ $title }}</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url({{ asset('public/images/bg-1.jpg') }});">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
                         
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
                     
							<form action="{{ route('student.registersave') }}" method="post" class="signin-form">
			      		@csrf
                                <div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input  type="text" name="username" class="form-control" placeholder="Username" >
                              <span class="text-danger">@error('username'){{ $message }}@enderror</span>
			      		</div>
                          
                             
                          
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password">
                      <span class="text-danger">@error('password'){{ $message }}@enderror</span>
		            </div>
                    <div class="form-group mb-3">
		            	<label class="label" for="password">Confirm Password</label>
		              <input type="password" name="cpassword" class="form-control" placeholder="Password">
                      <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
						<a href="{{ route('student.login') }}">Login</a>
		            </div>
		            
		          </form>
		          
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

