<?php

class bdPaygateJahanPay_Listener
{
	public static function load_class($class, array &$extend)
	{
		static $classes = array(
			'bdPaygate_Model_Processor',

			'XenForo_ControllerAdmin_UserUpgrade',
			'XenForo_ControllerPublic_Misc',
			'XenForo_DataWriter_UserUpgrade',
			'XenForo_Model_Option',
			'XenForo_Model_UserUpgrade',
		);

		if (in_array($class, $classes))
		{
			$extend[] = 'bdPaygateJahanPay_' . $class;
		}
	}

	public static function template_post_render($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
	{
		if ($template instanceof XenForo_Template_Admin)
		{
			if ($templateName === 'user_upgrade_edit')
			{
				$selected = '';
				$paramUpgrade = $template->getParam('upgrade');
				if (!empty($paramUpgrade['cost_currency']) AND $paramUpgrade['cost_currency'] === bdPaygateJahanPay_Processor::CURRENCY_TOMAN)
				{
					$selected = ' selected="selected"';
				}
				$insert = sprintf('<option value="%1$s"%2$s>Toman</option>', bdPaygateJahanPay_Processor::CURRENCY_TOMAN, $selected);

				$search = '<select name="cost_currency" class="textCtrl autoSize" id="ctrl_cost_currency">';

				$content = str_replace($search, $search . $insert, $content);
			}
		}
	}

	public static function file_health_check(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
	{
		$hashes += bdPaygateJahanPay_FileSums::getHashes();
	}

}
