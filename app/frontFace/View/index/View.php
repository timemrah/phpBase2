<?php
namespace app\frontFace\View\index;




class View extends \layout\adminPanel\View
{



    function breadcrumb(){ ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Public</a></li>
    <li class="breadcrumb-item active" aria-current="page">Anasayfa</li>
</ol>

    <?php }




    function pageContent(){ ?>

<div class="bg-light p-5 rounded">
    <h1><?= $this->body['title'] ?></h1>
    <p class="lead"><?= $this->body['description'] ?></p>

    <div>
        <span><?= $this->body['user'] ?></span>
        <span><?= $this->body['product'] ?></span>
    </div>
</div>

    <?php }




}