<?php
$this->breadcrumbs=array(
	'Events',
);

$this->menu=array(
array('label'=>'Create Event','url'=>array('create')),
array('label'=>'Manage Event','url'=>array('admin')),
);
?>

<h1>Events</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
