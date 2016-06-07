<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 08/06/2016
 * Time: 1:01 AM
 */

namespace AppCode;


class UserWinsCalculator
{
    public static function AccumulateData($data)
    {
        $result = [];

        foreach ($data as $elem)
        {
            if (!in_array('User_' . $elem->customer, $result))
            {
                $result['User_' . $elem->customer] = [
                    'wins'          => 0,
                    'loss'          => 0
                ];
            }

            if ($elem->win !== 0)
            {
                $result['User_' . $elem->customer]['wins']++;
            }
            else
            {
                $result['User_' . $elem->customer]['loss']++;
            }
        }

        return $result;
    }
}