<?php
$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List job', 'url'=>array('index')),
	array('label'=>'Create job', 'url'=>array('create')),
	array('label'=>'Update job', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete job', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage job', 'url'=>array('admin')),
);
?>

<h1>View job #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company_id',
		'title',
		'position',
		'description',
		'open',
	),
)); ?>
