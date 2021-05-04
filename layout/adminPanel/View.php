<?php
namespace layout\adminPanel;




class View extends \layout\View
{



    public function __construct($param = null)
    {
        parent::__construct($param);
    }




    function html(){?>
<!doctype html>
<html lang="tr">
<head><?php $this->head() ?></head>
<body>
    <h1>Admin Panel</h1>
    <p>Hoşgeldiniz..</p>
</body>
</html>
    <?php }




    function head(){ ?>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?= $this->data->head->title ?></title>
    <?php }




}