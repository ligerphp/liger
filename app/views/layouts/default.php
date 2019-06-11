<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $this->siteTitle()?></title>
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap4/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css?v=<?=VERSION?>" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/alertMsg.min.css?v=<?=VERSION?>" media="screen" title="no title" charset="utf-8">
  
    <?= $this->content('head'); ?>

  </head>
  <body>
    <?php include 'main_menu.php' ?>
    <div class="container-fluid pb-5" style="min-height: calc(100vh - 72px);">
        <?= $this->content('body'); ?>
  </div>

    <script src="<?=PROOT?>js/jQuery-3.3.1.min.js"></script>
    <script src="<?=PROOT?>js/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="<?=PROOT?>js/bootstrap4/bootstrap.min.js"></script>
    <script src="<?=PROOT?>js/alertMsg.min.js?v=<?=VERSION?>"></script>
    <?= $this->content('scripts'); ?>
    <?= $this->content('footer'); ?>
  </body>
</html>
