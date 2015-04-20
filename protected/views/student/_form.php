<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'student-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'studentname',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

	<?php //echo $form->textFieldGroup($model,'collegeId',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<div class="control-group">
		<?php echo $form -> labelEx($model, 'collegeId', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php
				$InstituteArray = Institute::getInstituteList();

			$form -> widget('bootstrap.widgets.TbSelect2', 
				array(
					'model' => $model,
					'attribute' => 'collegeId', 
					'data' => CHtml::listData($InstituteArray, 'id', 'institutename'), 
					'options' => array('allowClear' => true, ), 
					'htmlOptions' => array(
						//'empty'=>'',
						'placeholder' => "Select Course", 
						'style' => 'width:380px;', 
						'id' => 'collegeId',
						'class'=>'span5',
					), 
				)); 
			?>
			<?php echo $form -> error($model, 'collegeId'); ?>
		</div>
	</div>	

	<?php //echo $form->textFieldGroup($model,'courseId',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<div class="control-group">
		<?php echo $form -> labelEx($model, 'courseId', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php
				$CourseArray = Course::getCourseList();

			$form -> widget('bootstrap.widgets.TbSelect2', 
				array(
					'model' => $model,
					'attribute' => 'courseId', 
					'data' => CHtml::listData($CourseArray, 'id', 'coursename'), 
					'options' => array('allowClear' => true, ), 
					'htmlOptions' => array(
						//'empty'=>'',
						'placeholder' => "Select Course", 
						'style' => 'width:380px;', 
						'id' => 'courseId',
						'class'=>'span5',
					), 
				)); 
			?>
			<?php echo $form -> error($model, 'courseId'); ?>
		</div>
	</div>	

	<?php //echo $form->textFieldGroup($model,'createdBy',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'createdAt',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'updatedBy',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'modifiedAt',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->dropDownListGroup($model,'status', array('widgetOptions'=>array('data'=>array("A"=>"Active","I"=>"In Active",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>