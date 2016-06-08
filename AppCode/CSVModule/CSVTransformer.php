<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/7/2016
 * Time: 6:48 PM
 */

namespace AppCode\CSVModule;

interface CSVTransformer
{
    // @rowNumber           int     row number to process
    // @rowAssociatedData   array   associated array with headers as keys and values as the csv data

    public function Transform($rowNumber, $rowAssociatedData, $hasHeader);
}