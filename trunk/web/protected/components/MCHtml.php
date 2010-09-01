<?php
// для кодировки
class MCHtml extends CHtml
{

	/**
	 * Generates a drop down list for a model attribute.
	 * If the attribute has input error, the input field's CSS class will
	 * be appended with {@link errorCss}.
	 * @param CModel the data model
	 * @param string the attribute
	 * @param array data for generating the list options (value=>display)
	 * You may use {@link listData} to generate this data.
	 * Please refer to {@link listOptions} on how this data is used to generate the list options.
	 * Note, the values and labels will be automatically HTML-encoded by this method.
	 * @param array additional HTML attributes. Besides normal HTML attributes, a few special
	 * attributes are recognized. See {@link clientChange} and {@link tag} for more details.
	 * In addition, the following options are also supported:
	 * <ul>
	 * <li>encode: boolean, specifies whether to encode the values. Defaults to true. This option has been available since version 1.0.5.</li>
	 * <li>prompt: string, specifies the prompt text shown as the first list option. Its value is empty.</li>
	 * <li>empty: string, specifies the text corresponding to empty selection. Its value is empty.
	 * Starting from version 1.0.10, the 'empty' option can also be an array of value-label pairs.
	 * Each pair will be used to render a list option at the beginning.</li>
	 * <li>options: array, specifies additional attributes for each OPTION tag.
	 *     The array keys must be the option values, and the array values are the extra
	 *     OPTION tag attributes in the name-value pairs. For example,
	 * <pre>
	 *     array(
	 *         'value1'=>array('disabled'=>true, 'label'=>'value 1'),
	 *         'value2'=>array('label'=>'value 2'),
	 *     );
	 * </pre>
	 *     This option has been available since version 1.0.3.
	 * </li>
	 * </ul>
	 * @return string the generated drop down list
	 * @see clientChange
	 * @see listData
	 */

	public static function activeDropDownList($model,$attribute,$data,$htmlOptions=array())
	{
		self::resolveNameID($model,$attribute,$htmlOptions);
		$selection=self::resolveValue($model,$attribute);
		$options="\n".self::listOptions($selection,$data,$htmlOptions);
		parent::clientChange('change',$htmlOptions);
		if($model->hasErrors($attribute))
		parent::addErrorCss($htmlOptions);
		if(isset($htmlOptions['multiple']))
		{
			if(substr($htmlOptions['name'],-2)!=='[]')
			$htmlOptions['name'].='[]';
		}
		return self::tag('select',$htmlOptions,$options);
	}

	/**
	 * Generates a check box for a model attribute.
	 * The attribute is assumed to take either true or false value.
	 * If the attribute has input error, the input field's CSS class will
	 * be appended with {@link errorCss}.
	 * @param CModel the data model
	 * @param string the attribute
	 * @param array additional HTML attributes. Besides normal HTML attributes, a few special
	 * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
	 * Since version 1.0.2, a special option named 'uncheckValue' is available that can be used to specify
	 * the value returned when the checkbox is not checked. By default, this value is '0'.
	 * Internally, a hidden field is rendered so that when the checkbox is not checked,
	 * we can still obtain the posted uncheck value.
	 * If 'uncheckValue' is set as NULL, the hidden field will not be rendered.
	 * @return string the generated check box
	 * @see clientChange
	 * @see activeInputField
	 */
	public static function activeCheckBox($model,$attribute,$htmlOptions=array())
	{
		self::resolveNameID($model,$attribute,$htmlOptions);
		if(!isset($htmlOptions['value']))
		$htmlOptions['value']=1;
		if(!isset($htmlOptions['checked']) && parent::resolveValue($model,$attribute)==$htmlOptions['value'])
		$htmlOptions['checked']='checked';
		parent::clientChange('click',$htmlOptions);

		if(array_key_exists('uncheckValue',$htmlOptions))
		{
			$uncheck=$htmlOptions['uncheckValue'];
			unset($htmlOptions['uncheckValue']);
		}
		else
		$uncheck='0';

		$hiddenOptions=isset($htmlOptions['id']) ? array('id'=>self::ID_PREFIX.$htmlOptions['id']) : array();
		$hidden=$uncheck!==null ? parent::hiddenField($htmlOptions['name'],$uncheck,$hiddenOptions) : '';

		return $hidden . parent::activeInputField('checkbox',$model,$attribute,$htmlOptions);
	}

	/**
	 * Generates input name and ID for a model attribute.
	 * This method will update the HTML options by setting appropriate 'name' and 'id' attributes.
	 * This method may also modify the attribute name if the name
	 * contains square brackets (mainly used in tabular input).
	 * @param CModel the data model
	 * @param string the attribute
	 * @param array the HTML options
	 */

	public static function resolveNameID($model,&$attribute,&$htmlOptions)
	{
		if(!isset($htmlOptions['name']))
		$htmlOptions['name']=self::resolveName($model,$attribute, $htmlOptions['preName']);
		if(!isset($htmlOptions['id']))
		$htmlOptions['id']=parent::getIdByName($htmlOptions['name']);
		else if($htmlOptions['id']===false)
		unset($htmlOptions['id']);
	}

	/**
	 * Generates input name for a model attribute.
	 * Note, the attribute name may be modified after calling this method if the name
	 * contains square brackets (mainly used in tabular input) before the real attribute name.
	 * @param CModel the data model
	 * @param string the attribute
	 * @return string the input name
	 * @since 1.0.2
	 */
	public static function resolveName($model, &$attribute, $preName)
	{
		if(($pos=strpos($attribute,'['))!==false)
		{
			if($pos!==0)  // e.g. name[a][b]
			return get_class($model).'['.substr($attribute,0,$pos).']'.substr($attribute,$pos);
			if(($pos=strrpos($attribute,']'))!==false && $pos!==strlen($attribute)-1)  // e.g. [a][b]name
			{
				$sub=substr($attribute,0,$pos+1);
				$attribute=substr($attribute,$pos+1);
				return get_class($model).$sub.'['.$attribute.']';
			}
			if(preg_match('/\](\w+\[.*)$/',$attribute,$matches))
			{
				$name=get_class($model).'['.str_replace(']','][',trim(strtr($attribute,array(']['=>']','['=>']')),']')).']';
				$attribute=$matches[1];
				return $name;
			}
		}
		else
		return get_class($model).'['.$preName.']'.'['.$attribute.']';
	}

	/**
	 * Generates a text field input for a model attribute.
	 * If the attribute has input error, the input field's CSS class will
	 * be appended with {@link errorCss}.
	 * @param CModel the data model
	 * @param string the attribute
	 * @param array additional HTML attributes. Besides normal HTML attributes, a few special
	 * attributes are also recognized (see {@link clientChange} and {@link tag} for more details.)
	 * @return string the generated input field
	 * @see clientChange
	 * @see activeInputField
	 */
	public static function activeTextField($model,$attribute,$htmlOptions=array())
	{
		self::resolveNameID($model, $attribute, $htmlOptions);
		parent::clientChange('change',$htmlOptions);
		return parent::activeInputField('text',$model,$attribute,$htmlOptions);
	}
}
?>