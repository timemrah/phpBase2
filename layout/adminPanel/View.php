<?php namespace layout\adminPanel;




use sys\Route;

abstract class View extends \layout\View
{



    public function html(){ ?>

<!doctype html>
<html lang="tr">
<head><?php $this->head() ?></head>
<body>
    <header><?php $this->header() ?></header>
    <main class="container-fluid"><?php $this->pageContent() ?></main>
    <footer><?php $this->footer() ?></footer>
    <?php $this->endOfBody() ?>
</body>
</html>

    <?php  }




    private function head(){ ?>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="<?=$this->head['description']?>">
<title><?= $this->head['title'] ?></title>
<base href="<?= BASE ?>">

<?php $this->callCss() ?>
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="vendor/bootstrap-5/css/bootstrap.min.css" />
<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<!-- PAGE CSS -->
<link rel="stylesheet" href="<?= $this->appViewDir ?>/style.css">

    <?php }




    private function header(){ ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fab fa-php"></i> BASE 2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                <a class="nav-link" href="#">Users</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#">
                    <i class="fas fa-sign-out-alt"></i> Çıkış
                </a>
            </div>
        </div>
    </div>
</nav>

<nav aria-label="breadcrumb" class="container-fluid mt-3"><?php $this->breadcrumb() ?></nav>

    <?php }




    private function endOfBody(){?>
<?php $this->callJs() ?>
<!-- BOOTSTRAP -->
<script src="vendor/bootstrap-5/js/bootstrap.min.js"></script>
<!-- PAGE JS -->
<script src="<?= $this->appViewDir ?>/script.js"></script>
    <?php }




    private function footer(){ ?>

<nav class="navbar fixed-bottom navbar-light bg-light">
    <div class="container-fluid d-flex">
        <div class="text-muted me-auto"><i class="far fa-copyright"></i> <?= date('Y') ?></div>
        <div class="text-muted">
            <?=Route::getUrlStepHistoryInfo()?>
            <i class="fab fa-php"></i> BASE 2
        </div>
    </div>
</nav>

    <?php }




    abstract protected function breadcrumb();
    abstract protected function pageContent();




}