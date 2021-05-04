<?php
namespace layout\adminPanel;




class View extends \layout\View
{



    public function __construct($param = null)
    {
        parent::__construct($param);
    }




    public function print(){ ?>

        <!doctype html>
        <html lang="tr">
        <head><?php $this->head() ?></head>
        <body>
            <header><?php $this->header() ?></header>
            <main><?php $this->pageContent() ?></main>
            <footer><?php $this->footer() ?></footer>
        </body>
        </html>

    <?php }




    public function head(){ ?>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $this->data['headTitle'] ?></title>

    <?php }




    public function header(){ ?>

        <nav>
            <a href="">Anasayfa</a>
            <a href="iletisim">İletişim</a>
        </nav>

    <?php }




    public function pageContent(){ ?>

        <h1>Boş Sayfa Başlığı</h1>
        <p>Boş sayfa içeriği</p>

    <?php }




    public function footer(){ ?>

        <hr />
        <div>Copyright 2021 - BasePHP2</div>

    <?php }




}