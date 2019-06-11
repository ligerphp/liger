
<?php $this->start('body'); ?>
<?php
echo session()->displayMsg();
?>
<div class="text-center">
<img src=<?=PROOT.'liger.png'?> class="img-responsive mt-5" height="100"/>
<div class="mt-5">
<h1>Welcome To Liger PHP for API developers</h1>
<p>Edit the Controllers <pre><b>app/http/controllers</b></pre>
and Routes <pre><b>routes/</b> </pre></p>
</div>
</div>
<?php $this->end(); ?>
