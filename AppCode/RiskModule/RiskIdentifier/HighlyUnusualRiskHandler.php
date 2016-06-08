<?php

/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 11:52 AM
 */

namespace AppCode\RiskModule\RiskIdentifier;

use AppCode\RiskModule\RiskType;

class HighlyUnusualRiskHandler extends RiskHandler
{

    protected function process(RiskRequest $request)
    {
        $result = $request->GetAssociatedData()->stake / $request->GetHistory()->GetAverageBet();
        if ($result >= 30)
        {
            return RiskType::HIGHLY_UNUSUAL;
        }
        else
        {
            return null;
        }
    }
}