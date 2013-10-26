<?php

class bdPaygateJahanPay_Processor extends bdPaygate_Processor_Abstract
{
	const CURRENCY_TOMAN = 'tom';

	public function isAvailable()
	{
		$options = XenForo_Application::getOptions();

		$api = $options->get('bdPaygateJahanPay_api');
		if (empty($api))
		{
			// no API
			return false;
		}

		if ($this->_sandboxMode())
		{
			// Jahan Pay doesn't support Sandbox environment
			// so let's disable itself if the system is
			// expecting sandboxed pay gates
			return false;
		}

		return true;
	}

	public function getSupportedCurrencies()
	{
		return array(self::CURRENCY_TOMAN);
	}

	public function isRecurringSupported()
	{
		return false;
	}

	public function validateCallback(Zend_Controller_Request_Http $request, &$transactionId, &$paymentStatus, &$transactionDetails, &$itemId)
	{
		throw new XenForo_Exception('to be implemented');
	}

	public function generateFormData($amount, $currency, $itemName, $itemId, $recurringInterval = false, $recurringUnit = false, array $extraData = array())
	{
		$this->_assertAmount($amount);
		$this->_assertCurrency($currency);
		$this->_assertItem($itemName, $itemId);
		$this->_assertRecurring($recurringInterval, $recurringUnit);

		$formAction = XenForo_Link::buildPublicLink('canonical:misc/jahan-pay');
		$callToAction = new XenForo_Phrase('bdpaygatejahanpay_call_to_action');
		$callbackUrl = $this->_generateCallbackUrl($extraData);
		$_xfToken = XenForo_Visitor::getInstance()->get('csrf_token_page');

		$form = <<<EOF
<form action="{$formAction}" method="POST">
	<input type="hidden" name="amount" value="{$amount}" />
	<input type="hidden" name="itemName" value="{$itemName}" />
	<input type="hidden" name="itemId" value="{$itemId}" />
	<input type="hidden" name="callbackUrl" value="{$callbackUrl}" />
	<input type="hidden" name="_xfToken" value="{$_xfToken}" />
	
	<input type="submit" value="{$callToAction}" class="button" />
</form>
EOF;

		return $form;
	}

}
