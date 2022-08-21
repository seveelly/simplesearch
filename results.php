<?php
include 'soapRequest.php';
$soapRequest = new Request();
$populated =  $soapRequest->getPopulatedrequest();
$populated->destination = $_POST["destination"];
$populated->checkInDate = date_format(date_create($_POST["range-start"]), "Y-m-d");
$populated->checkOutDate = date_format(date_create($_POST["range-end"]), "Y-m-d");
$populated->numberOfAdults = $_POST["adult"];
$response = $populated->search($populated);

$results = $response->searchresult;
echo  json_encode($response);
