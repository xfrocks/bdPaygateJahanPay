<?php

class bdPaygateJahanPay_XenForo_Model_UserUpgrade extends XFCP_bdPaygateJahanPay_XenForo_Model_UserUpgrade
{
    public function prepareUserUpgrade(array $upgrade)
    {
        $upgrade = parent::prepareUserUpgrade($upgrade);

        if (isset($upgrade['cost_currency'])
            && $upgrade['cost_currency'] == bdPaygateJahanPay_Processor::CURRENCY_TOMAN
            && isset($upgrade['cost_amount'])
            && isset($upgrade['costPhrase'])
        ) {
            $costAmount = XenForo_Template_Helper_Core::numberFormat($upgrade['cost_amount'], 0);
            $currencyName = bdPaygateJahanPay_Processor::CURRENCY_TOMAN_NAME;

            $cost = "$costAmount $currencyName";

            if ($upgrade['costPhrase'] instanceof XenForo_Phrase) {
                $upgrade['costPhrase']->setParams(array('cost' => $cost));
            } else {
                $upgrade['costPhrase'] = $cost;
            }
        }

        return $upgrade;
    }
}
