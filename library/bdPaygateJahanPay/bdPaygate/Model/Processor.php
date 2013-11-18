<?php

class bdPaygateJahanPay_bdPaygate_Model_Processor extends XFCP_bdPaygateJahanPay_bdPaygate_Model_Processor
{
	public function getCurrencies()
	{
		$currencies = parent::getCurrencies();

		$currencies[bdPaygateJahanPay_Processor::CURRENCY_TOMAN] = 'Toman';

		return $currencies;
	}

	public function getProcessorNames()
	{
		$names = parent::getProcessorNames();

		$names['jahanPay'] = 'bdPaygateJahanPay_Processor';

		return $names;
	}

}
