<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="inscripcion-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',            
            'carrera_id',
            'nro_libreta',
            'fecha',           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
