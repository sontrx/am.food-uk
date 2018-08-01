<?php $__env->startSection('content'); ?>
<form class="form-signin" action="admin.php" method="post">

  <img class="mb-4" src="public/images/logo.png" alt="" width="72" height="72">

  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

  <input type="" name="action" value="login" hidden="">
  <div class="form-group">
  <input type="text" class="form-control" name="userName"  id="userName" placeholder="Enter userName">
  </div>
  <div class="form-group">
  <input type="password" class="form-control" id="passW" name="passW" placeholder="Password">
  </div>
  <div class="form-group" style="">

  <button type="submit" class="btn btn-primary btn-block">Login</button>
  </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('default.layouts.raw', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>