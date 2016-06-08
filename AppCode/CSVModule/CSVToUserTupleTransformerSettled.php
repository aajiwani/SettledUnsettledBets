<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/7/2016
 * Time: 6:38 PM
 */

namespace AppCode\CSVModule;

class CSVToUserTupleTransformerSettled implements CSVTransformer
{
    public function Transform($rowNumber, $rowAssociatedData, $hasHeader)
    {
        $user = new CSVUserTuple();
        $user->customer = intval(($hasHeader) ? $rowAssociatedData['Customer'] : $rowAssociatedData[0]);
        $user->event = intval(($hasHeader) ? $rowAssociatedData['Event'] : $rowAssociatedData[1]);
        $user->participant = intval(($hasHeader) ? $rowAssociatedData['Participant'] : $rowAssociatedData[2]);
        $user->stake = intval(($hasHeader) ? $rowAssociatedData['Stake'] : $rowAssociatedData[3]);
        $user->win = intval(($hasHeader) ? $rowAssociatedData['Win'] : $rowAssociatedData[4]);
        $user->rowNum = $rowNumber;

        return $user;
    }
}