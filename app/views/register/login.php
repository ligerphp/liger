<?php
use Core\FH;
?>

<?=$this->start('body') ?>
    <div class="row align-items-center justify-content-center">
    <div class="col-md-6 bg-light p-3">
    <h3 class="text-center">Log In</h3>
    <form class="form" action="<?=PROOT?>register/login" method="post">
      <?= FH::csrfInput() ?>
      <?= FH::inputBlock('text','Username','username','',['class'=>'form-control'],['class'=>'form-group']) ?>
      <?= FH::inputBlock('password','Password','password','',['class'=>'form-control'],['class'=>'form-group']) ?>
      <?= FH::checkboxBlock('Remember Me','remember_me','',[],['class'=>'form-group']) ?>
      <div class="d-flex justify-content-end">
        <div class="flex-grow-1 text-body">Don't have an account? <a href="<?=PROOT?>register/register">Sign Up</a></div>
        <?= FH::submitTag('Login',['class'=>'btn btn-primary']) ?>
      </div>
    </form>
  </div>
</div>
<?=$this->end() ?>
