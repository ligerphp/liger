<?php $this->setSiteTitle('Login:: liger Framework')?>
<?=$this->start('body') ?>
    <div class="row align-items-center justify-content-center">
    <div class="col-md-6 bg-light p-3">
    <h3 class="text-center">Log In</h3>
    <?= session()->displayMsg() ?>
    <form class="form" action="<?=PROOT?>api/auth/login" method="post">
    <?= form()->inputBlock('email','Email','email','',['class'=>'form-control'],['class'=>'form-group']) ?>
    <?= form()->inputBlock('password','Password','password','',['class'=>'form-control'],['class'=>'form-group']) ?>
    <?= form()->checkboxBlock('Remember Me','remember_me','',[],['class'=>'form-group']) ?>
    <?= form()->csrfInput() ?>
  
    <div class="d-flex justify-content-end">
      <div class="flex-grow-1 text-body">Don't have an account? <a href="<?=PROOT?>auth/register">Sign Up</a></div>
      <?= form()->submitTag('Login',['class'=>'btn btn-primary']) ?>
      </div>
    </form>
  </div>
</div>
<?=$this->end() ?>
