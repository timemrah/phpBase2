<?php


namespace app\basePanel\View\index;


class Html extends \layout\adminPanel\View
{



    public function pageContent(){ ?>

<h1>Base Panel</h1>
<p>Hoşgeldiniz..</p>

    <?php }




    public function breadcrumb(){ ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">Base Panel</li>
    <li class="breadcrumb-item active" aria-current="page">Anasayfa</li>
</ol>

    <?php }




}