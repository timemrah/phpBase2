<?php
namespace app\adminPanel\View\index;


class View extends \layout\adminPanel\View
{



    function pageContent(){ ?>

        <h1><?=$this->data['title']?></h1>
        <p><?=$this->data['description']?></p>
        <p><?=$this->data['user']?></p>
        <p><?=$this->data['product']?></p>

    <?php }




}