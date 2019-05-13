<?php
use Core\FH;
?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="row align-items-center justify-content-center">
  <div class="col-md-6 bg-light p-3">
    <h3 class="text-center">Register Here!</h3><hr>
    <form class="form" action="/auth/register/t" method="post">
      <?= FH::csrfInput() ?>
      <?= FH::inputBlock('text','First Name','fname','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <?= FH::inputBlock('text','Last Name','lname','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <?= FH::inputBlock('text','Email','email','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <?= FH::inputBlock('text','Username','username','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <?= FH::inputBlock('password','Password','password','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <?= FH::inputBlock('password','Confirm Password','confirm','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <div class="d-flex justify-content-end">
        <div class="text-dk flex-grow-1">Alread have an account? <a href="<?=PROOT?>register/login">Log In</a></div>
        <?= FH::submitTag('Register',['class'=>'btn btn-primary']) ?>
      </div>
    </form>
  </div>
</div>
<?php $this->end(); ?>
