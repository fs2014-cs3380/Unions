<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->group_id),array('view','id'=>$data->group_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_name')); ?>:</b>
	<?php echo CHtml::encode($data->new_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_name')); ?>:</b>
	<?php echo CHtml::encode($data->old_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_pawprint')); ?>:</b>
	<?php echo CHtml::encode($data->create_pawprint); ?>
	<br />


</div>