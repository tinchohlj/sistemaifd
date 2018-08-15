<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ActaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acta-index">
    <?=$this->render('_search', ['model' => $searchModel])?>
    <div class="box">
        <div class="box-header with-border">            
            <h3 class="box-title">Listado de actas</h3>  
            <div class="pull-right">
            <?= Html::a('<i class="fa  fa-plus"></i> Acta', ['create'], ['class' => 'btn btn-success']) ?>
            </div>           
        </div>
        <div class="box-body">
             <?= GridView::widget([
                'dataProvider' => $dataProvider,                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'libro',
                    'folio', 
                    
                    [
                    'attribute'=>'fecha_examen',
                    'label'=>'Fecha',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return FechaHelper::fechaDMY($data->fecha_examen);
                    }
                    ],  
                                      
                   
                    [
                    'attribute'=>'condicion_id',                    
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->DescripcionCondicion;
                    }
                    ], 
                    [
                    'attribute'=>'materia_id',
                    'label'=>'Materia',
                    'format'=>'text',//raw, html
                    'content'=>function ($data){
                        return $data->descripcionMateria;
                    }
                    ], 

                    ['class' => 'yii\grid\ActionColumn',
                    'template' => Helper::filterActionColumn('{detalle}'),
                    'buttons' => [
                        'detalle' => function ($url,$model,$key) {
                            return Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', ['load','libro'=>$model->libro,'folio'=>$model->folio, 'fecha_examen'=>$model->fecha_examen, 'condicion_id'=>$model->condicion_id,'materia_id'=>$model->materia_id ], ['target'=>'_blank']);
                        },
                    ]
                    ],
            ]]); ?>
           
        </div>
    </div>
   
</div>
