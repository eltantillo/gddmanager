<?php
$this->breadcrumbs=array(
	'Jobs',
);

$this->menu=array(
	array('label'=>'Create job', 'url'=>array('create')),
	array('label'=>'Manage job', 'url'=>array('admin')),
);
?>

<h1>Jobs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
