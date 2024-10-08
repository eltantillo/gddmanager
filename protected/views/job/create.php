<?php
$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List job', 'url'=>array('index')),
	array('label'=>'Manage job', 'url'=>array('admin')),
);
?>

<h1>Create job</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>