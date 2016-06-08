<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 10:50 AM
 */

namespace AppCode\RiskModule;


class RiskAnalysisCustomerTuple
{
    private $numberOfWins;
    private $numberOfLosses;
    private $bets;
    private $customerId;

    public function __construct($custId)
    {
        $this->customerId = $custId;
        $this->numberOfWins = 0;
        $this->numberOfLosses = 0;
    }

    public function GetCustomerId()
    {
        return $this->customerId;
    }

    public function AddBet($betAmount)
    {
        $betAmountInt = intval($betAmount);
        $this->bets[] = $betAmountInt;
    }

    public function AddWin()
    {
        $this->numberOfWins++;
    }

    public function AddLoss()
    {
        $this->numberOfLosses++;
    }

    public function GetTotalWins()
    {
        return $this->numberOfWins;
    }

    public function GetTotalLosses()
    {
        return $this->numberOfLosses;
    }

    public function GetAverageBet()
    {
        $average = array_sum($this->bets) / count($this->bets);
        return $average;
    }

    public function IsUnusualAtWinning()
    {
        if ($this->GetTotalWins() + $this->GetTotalLosses() !== count($this->bets))
        {
            return false;
        }

        $percentageOfWins = ($this->GetTotalWins() / ($this->GetTotalLosses() + $this->GetTotalWins())) * 100;
        if ($percentageOfWins >= 60)
            return true;
        else
            return false;
    }
};