<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('attraction_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->attraction_id),array('view','id'=>$data->attraction_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_path')); ?>:</b>
	<?php echo CHtml::encode($data->image_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lim_id')); ?>:</b>
	<?php echo CHtml::encode($data->lim_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('information_url')); ?>:</b>
	<?php echo CHtml::encode($data->information_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_display_name')); ?>:</b>
	<?php echo CHtml::encode($data->url_display_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->create_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->update_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('building_id')); ?>:</b>
	<?php echo CHtml::encode($data->building_id); ?>
	<br />

	*/ ?>

</div>