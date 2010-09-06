<li>
<div style='clear:both'><div id='plusminus<?php echo $oParCat->id ?>' class='category' 
							 onclick='$("#childCats<?php echo $oParCat->id ?>").toggleClass("hidden"); $("#plusminus<?php echo $oParCat->id ?>").toggleClass("minus") '></div><?php $this->renderPartial('/confCategory/_categoryTemplate', array('model'=>$oParCat, 'aParentCategories'=>$aParentCategories)); ?>
<?php
if(count($aChildCats[$oParCat->id])) { ?>
<ul id='childCats<?php echo $oParCat->id ?>' class='hidden'>
<?php	foreach ($aChildCats[$oParCat->id] as $oCateg) { ?>
	<li><?php $this->renderPartial('/confCategory/_categoryTemplate', array('model'=>$oCateg, 'aParentCategories'=>$aParentCategories)) ?></li>
	<?php } ?>
</ul>
	<?php } ?></div>
</li>