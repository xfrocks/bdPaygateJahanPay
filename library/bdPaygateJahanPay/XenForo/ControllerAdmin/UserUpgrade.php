<?php

class bdPaygateJahanPay_XenForo_ControllerAdmin_UserUpgrade extends XFCP_bdPaygateJahanPay_XenForo_ControllerAdmin_UserUpgrade
{
	public function actionIndex()
	{
		$optionModel = $this->getModelFromCache('XenForo_Model_Option');
		$optionModel->bdPaygateJahanPay_hijackOptions();

		return parent::actionIndex();
	}

}
