<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ManageStores */

$this->title = $model->ssn;
$this->params['breadcrumbs'][] = ['label' => 'Manage Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manage-stores-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Manage Stores'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'salespersons.name',
                'label' => 'Ssn'
        ],
        [
                'attribute' => 'stores.store_id',
                'label' => 'Store'
        ],
        'since',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
