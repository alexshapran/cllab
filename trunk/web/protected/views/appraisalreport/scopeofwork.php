<div class='scopeofwork'>
<?php echo CHtml::beginForm(yii::app()->controller->createUrl(	'appraisalreport/scopeofwork', 
																array(	'id'=>$oAppraisal->alias)), 
																		'POST'); ?>

<div class='scope_row'>
	<?php echo CHtml::activeCheckBox($oScopeOfWork, 'active') ?>&nbsp; Active
</div>

<div class='scope_row'>
	<label>Section Title:</label><?php echo CHtml::activeTextField($oScopeOfWork, 'sec_title', array('class'=>'scope_textfield')); ?>
</div>

<div class='scope_row'>
	<label>Problem to Solve:</label><?php 
		echo CHtml::activeDropDownList(	$oScopeOfWork, 
										'problem_to_solve', 
										CHtml::listData($aConfScopeOfSettings[0]->confScopeOfValues, 'id', 'name'),
										array(	'id'=>'scopeofworkdd',
												'empty'=>array(current(array_keys(unserialize($oScopeOfWork->problem_to_solve)))=>'-Choose One-'),
												'class'=>'dropdown',
//												'prompt'=>'-Choose One-',
//												'empty'=> current(array_keys(unserialize($oScopeOfWork->problem_to_solve))),
												'onchange'=>"busy(); jQuery.ajax({
																		'dataType':'json',
																		url:'".yii::app()->controller->createUrl(	'appraisalreport/getscopetext',	
																													array(	'id'=>$oAppraisal->alias,
																															'type'=>'problem',
																															'sett_id'=>'')).
																		 "' + $('#scopeofworkdd').val(),
																		 success: function(transport){ $('#scopeofworkvalue').val(transport); unbusy(); },
																		  })")); ?>
	<div>
		<?php echo CHtml::textArea(	'scopeofworkvalue', 
									!$oScopeOfWork->problem_to_solve ? '' : current(unserialize($oScopeOfWork->problem_to_solve)), 
									array(	'id'=>'scopeofworkvalue',
											'class'=>'scope_textarea')); ?>
	</div>

</div>

<div class='scope_row'>
	<label>Categories of Items Examined:</label><br />
	<?php echo CHtml::activeTextArea($oScopeOfWork, 'categories', array('class'=>'scope_textarea')); ?>
</div>

<div class='scope_row'>
	<label>Client:</label>
	<?php echo CHtml::activeTextField($oScopeOfWork, 'client', array('class'=>'scope_textfield')) ?>
</div>

<div class='scope_row'>
	<label>Owner of the Collection/Artwork:</label>
	<?php echo CHtml::activeTextField(	$oScopeOfWork, 
																		'owner', 
																		array('class'=>'scope_textfield')) ?>
</div>

<div class='scope_row'>
	<label>Intended Use:</label><?php echo CHtml::activeTextField($oScopeOfWork, 'int_use', array('class'=>'scope_textfield')) ?>
</div>

<div class='scope_row'>
	<label>Intended User(s):</label>
	<?php 
		echo CHtml::activeDropDownList(	$oScopeOfWork, 
										'int_users', 
										CHtml::listData($aConfScopeOfSettings[1]->confScopeOfValues, 'id', 'name'),
										array(	'id'=>'scopeintusers',
//												'prompt'=>'-Choose One-',
												'class'=>'dropdown',
												'empty'=>array(current(array_keys(unserialize($oScopeOfWork->int_users)))=>'-Choose One-'),
												'onchange'=>"busy(); jQuery.ajax({
																		'dataType':'json',
																		url:'".yii::app()->controller->createUrl(	'appraisalreport/getscopetext',	
																													array(	'id'=>$oAppraisal->alias,
																															'type'=>'int_users',
																															'sett_id'=>'')).
																		 "' + $('#scopeintusers').val(),
																		 success: function(transport){ $('#intended_users').val(transport); unbusy(); },
																		  })")); ?>
	<div>
		<?php echo CHtml::textArea(	'intusers', 
									!$oScopeOfWork->int_users ? '' :	current(unserialize($oScopeOfWork->int_users)), 
									array(	'id'=>'intended_users',
											'class'=>'scope_textarea')); ?>
	</div>

</div>

<div class='scope_row'>
	<label>Type of Value:</label>
	<?php echo CHtml::activeTextField($oScopeOfWork, 'type_of_value', array('class'=>'scope_textfield')); ?>
</div>

<div class='scope_row'>
	<label>Definition of Value:</label><br />
	<?php echo CHtml::activeTextArea($oScopeOfWork, 'def_of_value', array('class'=>'scope_textarea')) ?>
</div>

<div class='scope_row'>
	<label>Source of Definition of Value:</label><br />
	<?php echo CHtml::activeTextArea($oScopeOfWork, 'source_of_def_value', array('class'=>'scope_textarea')) ?>
</div>



<div class='scope_row'>
	<label>Approach to Value:</label>
	<?php 
		echo CHtml::activeDropDownList(	$oScopeOfWork, 
										'app_to_value', 
										CHtml::listData($aConfScopeOfSettings[2]->confScopeOfValues, 'id', 'name'),
										array(	'id'=>'app_to_valuedd',
												'class'=>'dropdown',
												'empty'=>array(current(array_keys(unserialize($oScopeOfWork->app_to_value)))=>'-Choose One-'),
												'onchange'=>"busy(); jQuery.ajax({
																		'dataType':'json',
																		url:'".yii::app()->controller->createUrl(	'appraisalreport/getscopetext',	
																													array(	'id'=>$oAppraisal->alias,
																															'type'=>'app_to_value',
																															'sett_id'=>'')).
																		 "' + $('#app_to_valuedd').val(),
																		 success: function(transport){ $('#app_to_value').val(transport); unbusy(); },
																		  })")); ?>
	<div>
		<?php echo CHtml::textArea(	'app_to_value', 
									!$oScopeOfWork->app_to_value ? '' : current(unserialize($oScopeOfWork->app_to_value)), 
									array(	'id'=>'app_to_value',
											'class'=>'scope_textarea')); ?>
	</div>

</div>



<div class='scope_row'>
	<label>Market Examined:</label>
	<?php 
		echo CHtml::activeDropDownList(	$oScopeOfWork, 
										'mark_exam', 
										CHtml::listData($aConfScopeOfSettings[3]->confScopeOfValues, 'id', 'name'),
										array(	'id'=>'mark_examdd',
												'class'=>'dropdown',
												'empty'=>array(current(array_keys(unserialize($oScopeOfWork->mark_exam)))=>'-Choose One-'),
												'onchange'=>"busy(); jQuery.ajax({
																		'dataType':'json',
																		url:'".yii::app()->controller->createUrl(	'appraisalreport/getscopetext',	
																													array(	'id'=>$oAppraisal->alias,
																															'type'=>'mark_exam',
																															'sett_id'=>'')).
																		 "' + $('#mark_examdd').val(),
																		 success: function(transport){ $('#mark_exam').val(transport); unbusy(); },
																		  })")); ?>
	<div>
		<?php echo CHtml::textArea(	'mark_exam',
									!$oScopeOfWork->mark_exam ? '' : current(unserialize($oScopeOfWork->mark_exam)), 
									array(	'id'=>'mark_exam',
											'class'=>'scope_textarea')); ?>
	</div>

</div>

<div class='scope_row'>
	<label>Effective Valuation Date:</label>
	<?php echo CHtml::activeTextField($oScopeOfWork, 'eff_val_date', array('class'=>'scope_textfield')); ?>
</div>

<div class='scope_row'>
	<label>Assignment Conditions</label><br />
	<?php
	$selected = explode(', ', $oScopeOfWork->ass_cond);
		foreach($aConfScopeOfSettings[5]->confScopeOfValues as $oValue)
		{
			$parameters = array('preName'=>$oValue->id,
								'category'=>'ass_cond');
			
			if(in_array($oValue->id, $selected))
				$parameters['checked']=null;
			
			echo MCHtml::activeCheckBox(
				$oValue, 
				'value', 
				$parameters				)
			?> 
			<?php echo $oValue->value; ?><br />
	<?php } ?>
</div>

<div class='scope_row'>
	<label>Extent of Physical Inspection:</label><br />
	<?php
	$selected = explode(', ',$oScopeOfWork->ext_of_phys_insp);
	
		foreach($aConfScopeOfSettings[6]->confScopeOfValues as $oValue)
		{ 
			$parameters = array('preName'=>$oValue->id,
								'category'=>'ass_cond');
			
			if(in_array($oValue->id, $selected))
				$parameters['checked']=null;
				
			echo MCHtml::activeCheckBox(
						$oValue, 
						'value', 
						$parameters) ?> <?php echo $oValue->value; ?><br />
	<?php } ?>
</div>

<div class='scope_row'>
	<label>Method of research:</label><br />
	<?php echo CHtml::activeTextArea(	$oScopeOfWork, 
										'meth_of_research', 
										array('class'=>'scope_textarea')); ?>
</div>


<div class='scope_row'>
	<label>Photography:</label><br />
	<?php
	$selected = explode(', ',$oScopeOfWork->photography);
	
		foreach($aConfScopeOfSettings[8]->confScopeOfValues as $oValue)
		{ 
			$parameters = array('preName'=>$oValue->id,
								'category'=>'photography');
			
			if(in_array($oValue->id, $selected))
				$parameters['checked']=null;
				
			echo MCHtml::activeCheckBox(
						$oValue, 
						'value', 
						$parameters) ?> <?php echo $oValue->value; ?><br />
	<?php } ?>
</div>



<div class='scope_row'>
	<label>USPAP Compilancy:</label> 
	<?php
//		echo CHtml::activeDropDownList(	$oScopeOfWork, 
//										'uspap_comp', 
//										CHtml::listData($aConfScopeOfSettings[9]->confScopeOfValues, 'id', 'name'),
//										array(	'id'=>'uspap_compdd',
//												'empty'=>array(current(array_keys(unserialize($oScopeOfWork->uspap_comp)))=>'-Choose One-'),
//												'onchange'=>"busy(); jQuery.ajax({
//																		'dataType':'json',
//																		url:'".yii::app()->controller->createUrl(	'appraisalreport/getscopetext',	
//																													array(	'id'=>$oAppraisal->alias,
//																															'type'=>'uspap_comp',
//																															'sett_id'=>'')).
//																		 "' + $('#uspap_compdd').val(),
//																		 success: function(transport){ $('#uspap_comp').val(transport); unbusy(); },
//																		  })")); ?>
	<div>
		<?php
//		echo CHtml::textArea(	'uspap_comp', 
//									!$oScopeOfWork->uspap_comp ? '' : current(unserialize($oScopeOfWork->uspap_comp)), 
//									array('id'=>'uspap_comp')); 
		?>
	</div>

</div>




<div class='scope_row'>
	<label>Assumptions:</label><br />
	<?php
	$selected = explode(', ',$oScopeOfWork->assumps);
	
		foreach($aConfScopeOfSettings[10]->confScopeOfValues as $oValue)
		{ 
			$parameters = array('preName'=>$oValue->id,
								'category'=>'assumps');
			
			if(in_array($oValue->id, $selected))
				$parameters['checked']=null;
				
			echo MCHtml::activeCheckBox(
						$oValue, 
						'value', 
						$parameters) ?> <?php echo $oValue->value; ?><br />
	<?php } ?>
</div>


<div class='scope_row'>
	<label>Extraordinary Assumptions:</label><br />
	<?php
	$selected = explode(', ', $oScopeOfWork->extr_assumps);
		foreach($aConfScopeOfSettings[11]->confScopeOfValues as $oValue)
		{
			$parameters = array('preName'=>$oValue->id,
								'category'=>'extr_assumps');
			
			if(in_array($oValue->id, $selected))
				$parameters['checked']=null;
			
			echo MCHtml::activeCheckBox(
				$oValue, 
				'value', 
				$parameters				)
			?> 
			<?php echo $oValue->value; ?><br />
	<?php } ?>
</div>

<div class='scope_row'>
	<label>Hypothetical Conditions:</label><br />
	<?php
	$selected = explode(', ', $oScopeOfWork->hypoth_cond);
		foreach($aConfScopeOfSettings[12]->confScopeOfValues as $oValue)
		{
			$parameters = array('preName'=>$oValue->id,
								'category'=>'hypoth_cond');
			
			if(in_array($oValue->id, $selected))
				$parameters['checked']=null;
			
			echo MCHtml::activeCheckBox(
				$oValue, 
				'value', 
				$parameters				)
			?> 
			<?php echo $oValue->value; ?><br />
	<?php } ?>
</div>



<div class='scope_row'>
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div>