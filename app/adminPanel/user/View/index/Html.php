<?php
namespace app\adminPanel\user\View\index;




class Html extends \layout\adminPanel\View
{



    function breadcrumb(){ ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Yönetim Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kullanıcılar</li>
</ol>

    <?php }




    function pageContent(){ ?>

<div class="bg-light p-5 rounded">
    <h1><?= $this->body['title'] ?></h1>
    <p class="lead"><?= $this->body['description'] ?></p>

    <div>
        <span><?= $this->body['user'] ?></span>
    </div>
</div>

    <?php }




}