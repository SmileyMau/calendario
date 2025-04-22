<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Agenda - CELSH</title>
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
		<!-- CSS -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logos/sello_sl.png')}}"/>
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logos/sello_sl.png')}}" />
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logos/sello_sl.png')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/core.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/icon-font.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css')}}" />

	</head>
	<body class="login-page">
		<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="{{asset('images/logos/logo.png')}}" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">

								<h2 class="text-center text-primary">Iniciar sesión</h2>
							</div>
							<form action="{{route('login')}}" method="POST">
								@csrf 
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Correo"
										name="email"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
										name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
											<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
											<button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src="{{asset('vendors/scripts/core.js')}}"></script>
		<script src="{{asset('vendors/scripts/script.min.js')}}"></script>
		<script src="{{asset('vendors/scripts/process.js')}}"></script>
		<script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>

	</body>
</html>
