<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top mb-5">
  <!-- Brand and toggle get grouped for better mobile display -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?=PROOT?>"><?=MENU_BRAND?></a>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="main_menu">
    <ul class="navbar-nav mr-2">
      <?php
      if(session()->exists('fname')){
        echo '
        <li class="nav-list"><a class="nav-link" href="/auth/logout">Logout</a></li>  
        <li class="nav-list"><a class="nav-link" href="/auth/login">Hello,'.session()->get('fname').'</a></li>
        ';
      }else{
        echo '
        <li class="nav-list"><a class="nav-link" href="/auth/login">Login</a></li>
        <li class="nav-list"><a class="nav-link" href="/auth/register">Register</a></li>
  
        ';
      }
      ?>

    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
