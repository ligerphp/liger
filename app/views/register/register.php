
<?php $this->setSiteTitle('Register :: liger Framework')?>
<?php $this->start('body'); ?>
<div class="row align-items-center justify-content-center">
  <div class="col-md-6 bg-light p-3">
    <h3 class="text-center">Register Here!</h3><hr>
    <?= session()->displayMsg()?>
    <form class="form" action="/auth/register" method="post">
      <?= form()->csrfInput()?>
      <?= form()->inputBlock('text','First Name','fname','',['class'=>'form-control input-sm'],['class'=>'form-group'],[])?>
      <?= form()->inputBlock('text','Last Name','lname','',['class'=>'form-control input-sm'],['class'=>'form-group'],[])?>
      <?= form()->inputBlock('text','Email','email','',['class'=>'form-control input-sm'],['class'=>'form-group'],[])?>
      <?= form()->inputBlock('text','Username','username','',['class'=>'form-control input-sm'],['class'=>'form-group'],[])?>
      <?= form()->inputBlock('password','Password','password','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]);?>
      <?= form()->inputBlock('password','Confirm Password','confirm','',['class'=>'form-control input-sm'],['class'=>'form-group'],[]) ?>
      <div class="d-flex justify-content-end">
        <div class="text-dk flex-grow-1">Alread have an account? <a href="<?=PROOT?>register/login">Log In</a></div>
        <?= form()->submitTag('Register',['class'=>'btn btn-primary']) ?>
      </div>
    </form>
  </div>
</div>
<?php $this->end(); ?>
