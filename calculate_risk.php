<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 07/06/2016
 * Time: 11:52 PM
 */

namespace AppCode;
require_once('vendor/autoload.php');

if (!isset($_FILES["settled_file"]) || !isset($_FILES["unsettled_file"]))
{
    echo "You must select unsettle and settled data for the risk analysis to be done";
    die();
}

$settledFile = $_FILES["settled_file"]["tmp_name"];
$unSettledFile = $_FILES["unsettled_file"]["tmp_name"];

$transformer = new CSVToUserTupleTransformer();
$reader = new CSVFileReader();
$settledResult = $reader->ReadFile($settledFile, true, $transformer);
$unSettledResult = $reader->ReadFile($unSettledFile, true, $transformer);

$riskAnalysisData = RiskAnalysisDataExtractor::ExtractData($settledResult);
$riskAnalysisCasted = (array)$riskAnalysisData;

foreach ($riskAnalysisCasted as $analysisPoint)
{
    print_r([
        $analysisPoint->GetCustomerId(),
        $analysisPoint->IsUnusualAtWinning(),
        $analysisPoint->GetAverageBet()
    ]);
}
//echo json_encode($riskAnalysisData);
//$user = new UserTuple();
//var_dump($user);