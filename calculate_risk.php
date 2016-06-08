<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 07/06/2016
 * Time: 11:52 PM
 */

use AppCode\CSVModule\CSVToUserTupleTransformerSettled;
use AppCode\CSVModule\CSVToUserTupleTransformerUnsettled;
use AppCode\CSVModule\CSVFileReader;
use AppCode\RiskModule\RiskAnalysisDataExtractor;

require_once('vendor/autoload.php');

if (!isset($_FILES["settled_file"]) || !isset($_FILES["unsettled_file"]))
{
    echo "You must select unsettle and settled data for the risk analysis to be done";
    die();
}

$settledFile = $_FILES["settled_file"]["tmp_name"];
$unSettledFile = $_FILES["unsettled_file"]["tmp_name"];

$settledTransformer = new CSVToUserTupleTransformerSettled();
$unSettledTransformer = new CSVToUserTupleTransformerUnsettled();
$reader = new CSVFileReader();
$settledResult = $reader->ReadFile($settledFile, true, $settledTransformer);
$unSettledResult = $reader->ReadFile($unSettledFile, true, $unSettledTransformer);

$riskAnalysisData = RiskAnalysisDataExtractor::ExtractData($settledResult);

foreach ($riskAnalysisData as $analysisPoint)
{
    var_dump($analysisPoint);
    /*print_r([
        $analysisPoint->GetCustomerId(),
        $analysisPoint->IsUnusualAtWinning(),
        $analysisPoint->GetAverageBet()
    ]);*/
}
//echo json_encode($riskAnalysisData);
//$user = new UserTuple();
//var_dump($user);