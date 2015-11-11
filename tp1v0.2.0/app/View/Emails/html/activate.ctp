<p>Hello, <?=$username ?> </p>
<p>Here is your activation link : <?= $this->Html->link('Activate' , $this->Html->url($link,true)) ?></p>
<p>Bai.</p>