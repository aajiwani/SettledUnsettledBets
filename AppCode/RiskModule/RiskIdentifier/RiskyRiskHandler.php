<?php

/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 11:52 AM
 */

namespace AppCode\RiskModule\RiskIdentifier;

use AppCode\RiskModule\RiskType;

class RiskyRiskHandler extends RiskHandler
{

    protected function process(RiskRequest $request)
    {
        if ($request->GetHistory()->IsUnusualAtWinning())
        {
            return RiskType::RISKY;
        }
        else
        {
            return null;
        }
    }
}