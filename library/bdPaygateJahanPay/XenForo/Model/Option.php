<?php

class bdPaygateJahanPay_XenForo_Model_Option extends XFCP_bdPaygateJahanPay_XenForo_Model_Option
{
	private static $_bdPaygateJahanPay_hijackOptions = false;

	public function getOptionsByIds(array $optionIds, array $fetchOptions = array())
	{
		if (self::$_bdPaygateJahanPay_hijackOptions === true)
		{
			$optionIds[] = 'bdPaygateJahanPay_api';
		}

		$options = parent::getOptionsByIds($optionIds, $fetchOptions);

		self::$_bdPaygateJahanPay_hijackOptions = false;

		return $options;
	}

	public function bdPaygateJahanPay_hijackOptions()
	{
		self::$_bdPaygateJahanPay_hijackOptions = true;
	}

}
