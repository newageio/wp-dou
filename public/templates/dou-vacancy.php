
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$id = 0;
if (empty($data)) return '';
?>
<h1><?=$data->title?></h1>

<div>
<?=$data->description?>
</div>

Powered by <a href="<?=$data->link?>">DOU.ua</a>