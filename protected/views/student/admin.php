<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Student','url'=>array('index')),
array('label'=>'Create Student','url'=>array('create')),
);

?>


<div id="statusMsg"></div>

<div id="statusMsg2">
    <div id='delAlert2' class='alert alert-success' style="display: none" ><button id='closebutton' type='button' class='close' data-dismiss='alert'>×</button></div>
</div>

<div class="row">
     <!-- page header -->
    <div class="col-lg-12">
        <h1 class="page-header">All Participants</h1>
    </div>
    <!--end page header -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo CHtml::link('Add New Participants', array('student/create'),array('class'=>'btn-primary btn')); ?>

                <?php
                     $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                        'id'=>'user-grid',
                        //'fixedHeader' => true,
                        'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
                        'type'=>'striped ',
                        'dataProvider'=>$model->search(),
                        'responsiveTable' => true,
                        'filter'=>$model,
                        'enablePagination'=>true,
                        //'selectableRows'=>2,
                        'columns'=>array(
                            array('name'=>'id', 'value'=>'$data->id', 'filterHtmlOptions'=>array('style'=>'width:50px;')),
                            array('name'=>'studentname', 'value'=>'$data->studentname', 'filterHtmlOptions'=>array('style'=>'width:250px;')),
                            array('name'=>'courseSearch', 'value'=>'$data->courseRel->coursename', 'filterHtmlOptions'=>array('style'=>'width:250px;')),
                            array('name'=>'status',
                                 'filter'=>array("A"=>"Active","I"=>"In-active"),
                                 'value'=>'($data->status == "A") ? "Active" : "Inactive"',
                                 'htmlOptions'=>array('style'=>'width:100px;'),
                            ),
                            array(
                                'class'=>'bootstrap.widgets.TbButtonColumn',
                                'template'=>'{view}{update}{delete}',
                                'afterDelete'=>'function(link,success,data){ if(success){ $("#statusMsg").html(data);} $("#delAlert").animate({opacity: 1.0}, 6000).fadeOut(); }',
                            ),
                        ),
                    ));
                 ?>
            </div> 
        </div>
    </div>
</div>