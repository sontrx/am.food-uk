<!DOCTYPE html>
<html>
<head>
    
    <?php echo $__env->make('default.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Css -->
	<link rel="stylesheet" href="public/css/admin.css">

</head>
<body>


	<div class="wrapper">
		<div class="container">

			<div class="row">
				
				<div class="col-3">
					<?php echo $__env->make('default.partials.admin-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

				<div class="col-9">

					<?php echo $__env->yieldContent('title'); ?>
				    <?php echo $__env->yieldContent('content'); ?>

				</div>

			</div>
		</div>
	</div>


    <!-- Js import -->
	<script src="https://code.jquery.com/jquery-1.9.1.min.js" ></script>

	<!-- bootstrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<!-- slick slider -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

	<script type="text/javascript" src="public/js/main.js"></script>
	<script type="text/javascript" src="public/js/admin.js"></script>

</body>
</html>