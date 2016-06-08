<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 12:47 PM
 */

namespace AppCode\CSVModule;


class CSVRiskUserTuple extends CSVUserTuple
{
    protected $csvTuple;
    private $riskType;

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
}