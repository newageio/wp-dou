
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$id = 0;
if (!isset($data['item'])) return '';
?>
<div id="accordion">
    <?php foreach ($data->item as $item): ?>
    <div class="card">
        <div class="card-header" id="vacancy-<?=$id?>">
            <h5>
                <a href="#" class=" collapsed" data-toggle="collapse" data-target="#collapse-vacancy-<?=$id?>" aria-expanded="false" aria-controls="collapse-vacancy-<?=$id?>">
                    <?=$item->title;?>
                </a>
            </h5>
        </div>
        <div id="collapse-vacancy-<?=$id?>" class="collapse" aria-labelledby="vacancy-<?=$id?>" data-parent="#accordion">
            <div class="card-body">
                <?=$item->description?>
            </div>
        </div>
    </div>
    <?php $id++; endforeach; ?>
</div>

Powered by <a href="<?=$data->link?>">DOU.ua</a>