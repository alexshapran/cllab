<div style='height: 65px;'>
	<?php
		$this->renderPartial('/confCategory/_categoryForm', array('model'=>$oNewCategory, 'aParCats'=>$aParentCategories));
	?>
</div>

Categories
<ul>
	<?php
		foreach ($aParentCategories as $oParent) 
		{
			$this->renderPartial('/confCategory/_parentCategory', array('oParCat' => $oParent, 'aChildCats'=>$aChildCats, 'aParentCategories'=>$aParentCategories));
		}
	?>
</ul>