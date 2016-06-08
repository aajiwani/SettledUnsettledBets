<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 07/06/2016
 * Time: 11:52 PM
 */

use AppCode\CSVModule\CSVToUserTupleTransformerSettled;
use AppCode\CSVModule\CSVToUserTupleTransformerUnsettled;

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

$runner = new \AppCode\RiskModule\RiskRunner($settledTransformer, $unSettledTransformer, $settledFile, $unSettledFile);
$result = $runner->Run([
    new \AppCode\RiskModule\RiskIdentifier\OtherUnusualRiskHandler(),
    new \AppCode\RiskModule\RiskIdentifier\HighlyUnusualRiskHandler(),
    new \AppCode\RiskModule\RiskIdentifier\UnusualRiskHandler(),
    new \AppCode\RiskModule\RiskIdentifier\RiskyRiskHandler()
]);

require 'show_results.php';