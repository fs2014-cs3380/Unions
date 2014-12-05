<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('event_space_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->event_space_id),array('view','id'=>$data->event_space_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floor_id')); ?>:</b>
	<?php echo CHtml::encode($data->floor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacity')); ?>:</b>
	<?php echo CHtml::encode($data->capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_path')); ?>:</b>
	<?php echo CHtml::encode($data->image_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />

	*/ ?>

</div>