<?php

class bdPaygateJahanPay_bdPaygate_Model_Processor extends XFCP_bdPaygateJahanPay_bdPaygate_Model_Processor
{
	public function getProcessorNames()
	{
		$names = parent::getProcessorNames();

		$names['jahanPay'] = 'bdPaygateJahanPay_Processor';

		return $names;
	}

}
