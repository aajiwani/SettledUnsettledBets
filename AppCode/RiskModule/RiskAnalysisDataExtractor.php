<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 10:55 AM
 */

namespace AppCode\RiskModule;

class RiskAnalysisDataExtractor
{
    public static function ExtractData($settledData)
    {
        $result = new \stdClass();

        foreach ($settledData as $data)
        {
            if (!property_exists($result , strval($data->customer)))
            {
                $result->{strval($data->customer)} = new RiskAnalysisCustomerTuple($data->customer);
            }

            if ($data->win !== 0)
            {
                $result->{strval($data->customer)}->AddWin();
            }
            else
            {
                $result->{strval($data->customer)}->AddLoss();
            }

            $result->{strval($data->customer)}->AddBet($data->stake);
        }

        return self::ConvertToArray($result);
    }

    private static function ConvertToArray($obj)
    {
        return array_values((array)$obj);
    }

    public static function FindCustomerHistoryById($customerId, $historyRecords)
    {
        $result = array_filter(
            $historyRecords,
            function ($e) use ($customerId)
            {
                return $e->GetCustomerId() === $customerId;
            }
        );

        if (count($result) === 1)
            return current($result);
        else
            return null;
    }
}