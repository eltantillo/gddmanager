<?php
$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List job', 'url'=>array('index')),
	array('label'=>'Create job', 'url'=>array('create')),
	array('label'=>'View job', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage job', 'url'=>array('admin')),
);
?>

<h1>Update job <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>