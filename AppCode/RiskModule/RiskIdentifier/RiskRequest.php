<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 12:14 PM
 */

namespace AppCode\RiskModule\RiskIdentifier;


use AppCode\CSVModule\CSVUserTuple;
use AppCode\RiskModule\RiskAnalysisCustomerTuple;

class RiskRequest
{
    private $history;
    private $csvTuple;

    public function __construct(RiskAnalysisCustomerTuple $customerHistory, CSVUserTuple $customerCsvTuple)
    {
        $this->history = $customerHistory;
        $this->csvTuple = $customerCsvTuple;
    }

    public function GetHistory()
    {
        return $this->history;
    }

    public function GetAssociatedData()
    {
        return $this->csvTuple;
    }
}