<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 12:43 PM
 */

namespace AppCode\RiskModule;


use AppCode\CSVModule\CSVFileReader;
use AppCode\CSVModule\CSVRiskUserTuple;
use AppCode\RiskModule\RiskIdentifier\RiskIdentifierClient;
use AppCode\RiskModule\RiskIdentifier\RiskRequest;

class RiskRunner
{
    private $settledTransformer;
    private $unSettledTransformer;
    private $settledFile;
    private $unSettledFile;

    public function __construct($settledTransformer, $unSettledTransformer, $settledFile, $unSettledFile)
    {
        $this->settledFile = $settledFile;
        $this->unSettledFile = $unSettledFile;
        $this->settledTransformer = $settledTransformer;
        $this->unSettledTransformer = $unSettledTransformer;
    }

    public function Run($riskHandlers)
    {
        // Read the settled and unsettled files first
        $reader = new CSVFileReader();
        $settledResult = $reader->ReadFile($this->settledFile, true, $this->settledTransformer);
        $unSettledResult = $reader->ReadFile($this->unSettledFile, true, $this->unSettledTransformer);

        // Fetch the risk analysis data first
        $riskAnalysisData = RiskAnalysisDataExtractor::ExtractData($settledResult);

        $riskClient = new RiskIdentifierClient($riskHandlers);
        $result = [];

        foreach ($unSettledResult as $row)
        {
            $customerHistory = RiskAnalysisDataExtractor::FindCustomerHistoryById($row->customer, $riskAnalysisData);
            if ($customerHistory === null)
                continue;

            $riskType = $riskClient->process(new RiskRequest(
                $customerHistory,
                $row
            ));

            if ($riskType === null)
            {
                $riskType = RiskType::NONE;
            }

            $riskTuple = new CSVRiskUserTuple($row);
            $riskTuple->SetRiskType($riskType);
            $riskTuple->SetCustomerHistory($customerHistory);
            $result[] = $riskTuple;
        }

        return $result;
    }
}