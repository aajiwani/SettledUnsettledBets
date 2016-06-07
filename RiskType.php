<?php

/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/7/2016
 * Time: 6:07 PM
 */

class RiskType
{
    // All upcoming (i.e. unsettled) bets from customers that win at an unusual rate
    const RISKY = 0;

    // Bets where the stake is more than 10 times higher than that customer’s average bet in their betting history
    const UNUSUAL = 1;

    // Bets where the stake is more than 30 times higher than that customer’s average bet in their betting history
    const HIGHLY_UNUSUAL = 2;

    // Bets where the amount to be won is $1000 or more.
    const OTHER_UNUSUAL = 3;
};