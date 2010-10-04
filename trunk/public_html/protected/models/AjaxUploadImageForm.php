<?php

class AjaxUploadImageForm extends CFormModel
{
	public $image;

	public function rules()
	{
		return array(
			array('image', 'file', 'types'=>array('jpg', 'gif', 'png')),
		);
	}

	public function attributeLabels()
	{
		return array(
			'img'=>'Upload Image',
		);
	}
}
