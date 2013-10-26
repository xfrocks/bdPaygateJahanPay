<?php

class bdPaygateJahanPay_XenForo_Model_UserUpgrade extends XFCP_bdPaygateJahanPay_XenForo_Model_UserUpgrade
{
	public function prepareUserUpgrade(array $upgrade)
	{
		if ($upgrade['cost_currency'] == bdPaygateJahanPay_Processor::CURRENCY_TOMAN)
		{
			$upgrade['bdPaygateJahanPay_costCurrency'] = $upgrade['cost_currency'];
			$upgrade['cost_currency'] = 'Toman';
		}

		$upgrade = parent::prepareUserUpgrade($upgrade);

		if (!empty($upgrade['bdPaygateJahanPay_costCurrency']))
		{
			$upgrade['cost_currency'] = $upgrade['bdPaygateJahanPay_costCurrency'];
			unset($upgrade['bdPaygateJahanPay_costCurrency']);
		}

		return $upgrade;
	}

}
