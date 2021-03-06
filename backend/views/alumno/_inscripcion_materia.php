<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use common\models\FechaHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Inscripcion */

$this->title = 'Inscripción Materia';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombreAlumno, 'url' => ['view', 'id' => $model->alumno_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-view">

    <div class="box">
        <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title"><?=$model->nombreAlumno?></h3> 
                         
        </div>

        <div class="box-body">  
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [                
                
                [
                'label'=>'Carrera',
                'value'=>$model->descripcionCarrera,  
                ],
                'nro_libreta',
                
            ],
        ]) ?> 
        </div>
    </div> 

    <div class="box">
        <div class="box-header with-border">           
        <h3 class="box-title">Listado de Materias Inscriptas</h3>     
        <div class="pull-right">
            <?php // echo Html::a('<i class="fa  fa-plus"></i> Inscribir materia', ['cursada/create','id_alumno' => $model->alumno_id,'id_carrera'=>$model->carrera_id,'id_inscripcion'=>$model->id],['class' => 'btn btn-success']) ?>
            <?= Html::a('<i class="fa  fa-plus"></i> Inscribir materia', ['listar-materia','id'=>$model->id],['class' => 'btn btn-success modalButton']) ?>
            </div>        
        </div>
        <div class="box-body">
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,  
                    'filterModel' => $searchModel,  
                    'id'=>'grid-cursada',  
                    'pjax'=>true,     
                    'hover'=>true,
                    'panel' => [
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon glyphicon-file"></i>Materias</h3>',
                    'type'=>'primary',
                    'footer'=>false
                    ],   
                    'export'=>false,      
                    'columns' => [
                        ['class' => 'kartik\grid\SerialColumn'], 
                        
                        [
                        'attribute'=>'fecha_inscripcion',
                        'label'=>'Fecha Inscripción',
                        'format'=>'text',//raw, html
                        'content'=>function ($data){
                            return FechaHelper::fechaDMY($data->fecha_inscripcion);
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
    
                    ],
            ]);?>
        </div>
    </div>    

</div>


<?php 
Modal::begin([
'header' => '<h3 class="text-center modal-title"><i class="fa fa-file"></i> Materias</h3>',
'id'=>'ModalId',
'class'=>'modal',
'size'=>'modal-lg', 
'clientOptions' => ['backdrop' => 'static'],  
    ]);

echo "<div class='modalContent'></div>";

Modal::end();

?>