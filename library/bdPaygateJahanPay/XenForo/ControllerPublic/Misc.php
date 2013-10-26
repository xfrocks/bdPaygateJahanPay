<?php

class bdPaygateJahanPay_XenForo_ControllerPublic_Misc extends XFCP_bdPaygateJahanPay_XenForo_ControllerPublic_Misc
{
	public function actionJahanPay()
	{
		$input = $this->_input->filter(array(
			'amount' => XenForo_Input::STRING,
			'itemName' => XenForo_Input::STRING,
			'itemId' => XenForo_Input::STRING,
			'callbackUrl' => XenForo_Input::STRING,
		));

		$api = XenForo_Application::getOptions()->get('bdPaygateJahanPay_api');
		if (empty($api))
		{
			throw new XenForo_Exception('API has not been configured');
		}

		$invoiceUrl = bdPaygateJahanPay_Helper::requestPayment($api, $input['amount'], $input['itemName'], $input['itemId'], $input['callbackUrl']);

		return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED, $invoiceUrl);

	}

}
