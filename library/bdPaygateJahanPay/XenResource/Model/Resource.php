<?php

class bdPaygateJahanPay_XenResource_Model_Resource extends XFCP_bdPaygateJahanPay_XenResource_Model_Resource
{
    public function prepareResource(array $resource, array $category = null, array $viewingUser = null)
    {
        $resource = parent::prepareResource($resource, $category, $viewingUser);

        if (isset($resource['currency'])
            && $resource['currency'] == bdPaygateJahanPay_Processor::CURRENCY_TOMAN
            && isset($resource['price'])
            && isset($resource['cost'])
        ) {
            $resource['cost'] = XenForo_Locale::numberFormat($resource['price'], 0)
                . ' ' . bdPaygateJahanPay_Processor::CURRENCY_TOMAN_NAME;
        }

        return $resource;
    }
}