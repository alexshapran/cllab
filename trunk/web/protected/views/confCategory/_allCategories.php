<h3>Categories</h3>
<ul>
<?php
foreach ($aParentCategories as $oParent) {
	$this->renderPartial('/confCategory/_parentCategory', array('oParCat' => $oParent, 'aChildCats'=>$aChildCats, 'aParentCategories'=>$aParentCategories));
	} ?>
</ul>