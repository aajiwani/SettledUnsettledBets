<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 12:47 PM
 */

namespace AppCode\CSVModule;


class CSVRiskUserTuple
{
    protected $csvTuple;
    private $riskType;
    private $history;

    public function __construct(CSVUserTuple $obj)
    {
        $this->csvTuple = $obj;
    }

    public function GetRiskType()
    {
        return $this->riskType;
    }

    public function SetRiskType($riskType)
    {
        $this->riskType = $riskType;
    }

    public function GetAssociatedData()
    {
        return $this->csvTuple;
    }

    public function SetCustomerHistory($history)
    {
        $this->history = $history;
    }

    public function GetCustomerHistory()
    {
        return $this->history;
    }
}