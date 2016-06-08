<?php

/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 11:52 AM
 */

namespace AppCode\RiskModule\RiskIdentifier;

use AppCode\RiskModule\RiskType;

class UnusualRiskHandler extends RiskHandler
{
    protected function process(RiskRequest $request)
    {
        $result = $request->GetAssociatedData()->stake / $request->GetHistory()->GetAverageBet();
        if ($result >= 10)
        {
            return RiskType::UNUSUAL;
        }
        else
        {
            return null;
        }
    }
}