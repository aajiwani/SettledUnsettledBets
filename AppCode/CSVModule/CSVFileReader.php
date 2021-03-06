<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/7/2016
 * Time: 6:27 PM
 */

namespace AppCode\CSVModule;


class CSVFileReader
{
    private function AssociateHeader($headerRow, $dataRow)
    {
        if ($headerRow === null)
            return $dataRow;

        if (count($headerRow) !== count($dataRow))
            throw new \Exception('Data row is out of bound of headers');

        $result = [];
        for ($i = 0; $i < count($headerRow); $i++)
        {
            $result[$headerRow[$i]] = $dataRow[$i];
        }

        return $result;
    }

    public function ReadFile($filePath, $hasHeader, CSVTransformer $transformer = null)
    {
        if (isset($filePath))
        {
            if (($handle = fopen($filePath, "r")) !== FALSE)
            {
                $count = 0;
                $header = null;
                $resultSet = [];
                if ($hasHeader)
                {
                    $data = fgetcsv($handle, 5000, ",");
                    $header = $data;
                    $count++;
                }

                while (($data = fgetcsv($handle, 5000, ",")) !== FALSE)
                {
                    $rowData = $this->AssociateHeader($header, $data);
                    if ($transformer !== null)
                        $rowData = $transformer->Transform($count++, $rowData, $hasHeader);

                    $resultSet[] = $rowData;
                }

                fclose($handle);

                return $resultSet;
            }
        }

        return null;
    }
}