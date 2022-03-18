<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Admin Panel</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="/admin/panel"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="/admin/orders"><span class="fa fa-briefcase mr-3"></span> Orders</a>
	          </li>
	          <li>
              <a href="/admin/medicines"><span class="fa fa-sticky-note mr-3"></span> Medicines</a>
	          </li>
	          <li>
				<a href="/admin/add-admin"><span class="fa fa-user mr-3"></span> Add Admin</a>
			  </li>
			  <li>
				<a href="/admin/admins"><span class="fa fa-user mr-3"></span> Admins</a>
			  </li>
			  <li>
				  <form action="/admin/logout" method="post">
					@csrf
				  <button 
				  style="color: rgba(255, 255, 255, 0.6);
				  background: none;
				  border: none;
				  " type="submit">Logout</button>
				  </form>
				</li>
	        </ul>


	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
@yield('body')



<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>