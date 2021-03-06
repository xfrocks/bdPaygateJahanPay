<?php

class bdPaygateJahanPay_Listener
{
	public static function load_class($class, array &$extend)
	{
		static $classes = array(
			'bdPaygate_Model_Processor',

			'XenForo_ControllerAdmin_UserUpgrade',
			'XenForo_ControllerPublic_Misc',
			'XenForo_Model_Option',
			'XenForo_Model_UserUpgrade',

			'XenResource_Model_Resource',
		);

		if (in_array($class, $classes))
		{
			$extend[] = 'bdPaygateJahanPay_' . $class;
		}
	}

	public static function file_health_check(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
	{
		$hashes += bdPaygateJahanPay_FileSums::getHashes();
	}

}
