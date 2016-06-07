<?php
/**
 * Created by PhpStorm.
 * User: amiralijiwani
 * Date: 07/06/2016
 * Time: 11:52 PM
 */

namespace AppCode;
require_once('vendor/autoload.php');

$settledFile = $_FILES["settled_file"]["tmp_name"];

$transformer = new CSVToUserTupleTransformer();
$reader = new CSVFileReader();
$result = $reader->ReadFile($settledFile, true, $transformer);
echo json_encode($result);
//$user = new UserTuple();
//var_dump($user);