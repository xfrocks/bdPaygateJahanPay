<?php

class bdPaygateJahanPay_XenForo_DataWriter_UserUpgrade extends XFCP_bdPaygateJahanPay_XenForo_DataWriter_UserUpgrade
{
	protected function _getFields()
	{
		$fields = parent::_getFields();
		
		$fields['xf_user_upgrade']['cost_currency']['allowedValues'][] = bdPaygateJahanPay_Processor::CURRENCY_TOMAN;
		
		return $fields;
	}
}
