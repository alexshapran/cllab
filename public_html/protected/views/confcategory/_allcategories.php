<div style='height: 65px;'>
	<?php
		$this->renderPartial('/confcategory/_categoryform', array('model'=>$oNewCategory, 'aParCats'=>$aParentCategories));
	?>
</div>

Categories
<ul>
	<?php
		foreach ($aParentCategories as $oParent) 
		{
			$this->renderPartial('/confcategory/_parentcategory', array('oParCat' => $oParent, 'aChildCats'=>$aChildCats, 'aParentCategories'=>$aParentCategories));
		}
	?>
</ul>