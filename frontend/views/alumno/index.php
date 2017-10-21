<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras Inscriptas';
?>
<div class="inscripcion-index">
    
<h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
				'attribute'=>'carrera_id',
				'label'=>'Carrera',
				'format'=>'text',//raw, html
				'content'=>function($data){
					return $data->descripcionCarrera;
					}
			],           
            
            'nro_libreta',
            [
            'attribute'=>'fecha',
            'label'=>'Fecha Inscripción',
            'format'=>'text',//raw, html
            'content'=>function ($data){
                return FechaHelper::fechaDMY($data->fecha);
            }
            ],   
                       
        ],
    ]); ?>
</div>
