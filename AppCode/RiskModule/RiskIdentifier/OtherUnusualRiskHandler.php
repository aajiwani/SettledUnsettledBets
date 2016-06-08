<?php

/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 11:53 AM
 */

namespace AppCode\RiskModule\RiskIdentifier;

use AppCode\CSVModule\CSVUserTuple;
use AppCode\RiskModule\RiskType;

class OtherUnusualRiskHandler extends RiskHandler
{
    protected function process(RiskRequest $request)
    {
        if ($request->GetAssociatedData()->win >= 1000)
        {
            return RiskType::OTHER_UNUSUAL;
        }
        else
        {
            return null;
        }
    }
}