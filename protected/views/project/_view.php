<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copyright')); ?>:</b>
	<?php echo CHtml::encode($data->copyright); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changes')); ?>:</b>
	<?php echo CHtml::encode($data->changes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('concept')); ?>:</b>
	<?php echo CHtml::encode($data->concept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('features')); ?>:</b>
	<?php echo CHtml::encode($data->features); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genre')); ?>:</b>
	<?php echo CHtml::encode($data->genre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('audience')); ?>:</b>
	<?php echo CHtml::encode($data->audience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('look')); ?>:</b>
	<?php echo CHtml::encode($data->look); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progression')); ?>:</b>
	<?php echo CHtml::encode($data->progression); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectives')); ?>:</b>
	<?php echo CHtml::encode($data->objectives); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flow')); ?>:</b>
	<?php echo CHtml::encode($data->flow); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('physics')); ?>:</b>
	<?php echo CHtml::encode($data->physics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movement')); ?>:</b>
	<?php echo CHtml::encode($data->movement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('economy')); ?>:</b>
	<?php echo CHtml::encode($data->economy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combat')); ?>:</b>
	<?php echo CHtml::encode($data->combat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('switches')); ?>:</b>
	<?php echo CHtml::encode($data->switches); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pick')); ?>:</b>
	<?php echo CHtml::encode($data->pick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('talk')); ?>:</b>
	<?php echo CHtml::encode($data->talk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('read')); ?>:</b>
	<?php echo CHtml::encode($data->read); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('options')); ?>:</b>
	<?php echo CHtml::encode($data->options); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('save')); ?>:</b>
	<?php echo CHtml::encode($data->save); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cheats')); ?>:</b>
	<?php echo CHtml::encode($data->cheats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('backstory')); ?>:</b>
	<?php echo CHtml::encode($data->backstory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plot')); ?>:</b>
	<?php echo CHtml::encode($data->plot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('license')); ?>:</b>
	<?php echo CHtml::encode($data->license); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_flow')); ?>:</b>
	<?php echo CHtml::encode($data->screen_flow); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HUD')); ?>:</b>
	<?php echo CHtml::encode($data->HUD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rendering')); ?>:</b>
	<?php echo CHtml::encode($data->rendering); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('camera')); ?>:</b>
	<?php echo CHtml::encode($data->camera); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lighting')); ?>:</b>
	<?php echo CHtml::encode($data->lighting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controls')); ?>:</b>
	<?php echo CHtml::encode($data->controls); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('help')); ?>:</b>
	<?php echo CHtml::encode($data->help); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_hardware')); ?>:</b>
	<?php echo CHtml::encode($data->target_hardware); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dev_enviroment')); ?>:</b>
	<?php echo CHtml::encode($data->dev_enviroment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dev_standards')); ?>:</b>
	<?php echo CHtml::encode($data->dev_standards); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine')); ?>:</b>
	<?php echo CHtml::encode($data->engine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('network')); ?>:</b>
	<?php echo CHtml::encode($data->network); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conventions')); ?>:</b>
	<?php echo CHtml::encode($data->conventions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('style')); ?>:</b>
	<?php echo CHtml::encode($data->style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('budget')); ?>:</b>
	<?php echo CHtml::encode($data->budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monetization')); ?>:</b>
	<?php echo CHtml::encode($data->monetization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('risks')); ?>:</b>
	<?php echo CHtml::encode($data->risks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marketing')); ?>:</b>
	<?php echo CHtml::encode($data->marketing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_date')); ?>:</b>
	<?php echo CHtml::encode($data->production_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('launch_date')); ?>:</b>
	<?php echo CHtml::encode($data->launch_date); ?>
	<br />

	*/ ?>

</div>