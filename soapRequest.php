<?php
ini_set('extension', 'soap');
class Request
{
    public $userName;
    public $password;
    public $language;
    public $currencies;
    public $checkInDate;
    public $checkOutDate;
    public $numberOfRooms;
    public $destination;
    public $destinationID;
    public $hotelIDs;
    public $resortIDs;
    public $accommodationTypes;
    public $numberOfAdults;
    public $numberOfChildren;
    public $childrenAges;
    public $infant;
    public $sortBy;
    public $sortOrder;
    public $exactDestinationMatch;
    public $blockSuperdeal;
    public $showTransfer;
    public $mealIds;
    public $showCoordinates;
    public $showReviews;
    public $referencePointLatitude;
    public $referencePointLongitude;
    public $maxDistanceFromReferencePoint;
    public $minStarRating;
    public $maxStarRating;
    public $featureIds;
    public $minPrice;
    public $maxPrice;
    public $themeIds;
    public $excludeSharedRooms;
    public $excludeSharedFacilities;
    public $prioritizedHotelIds;
    public $totalRoomsInBatch;
    public $paymentMethodId;
    public $CustomerCountry;
    public $B2C;

    public function __Construt()
    {
    }

    public function getPopulatedrequest()
    {
        $this->userName = "LiyanaHotelsTEST";
        $this->password = "awe9LVJRwt";
        $this->language = "en";
        $this->currencies = "EUR";
        $this->checkInDate;
        $this->checkOutDate;
        $this->numberOfRooms = 1;
        $this->destination = '';
        // $this->destinationID = 0;
        //$this->hotelIDs = '';
        //$this->resortIDs = '';
        $this->accommodationTypes = '';
        $this->numberOfAdults = 2;
        $this->numberOfChildren = 0;
        $this->childrenAges = '';
        $this->infant = 0;
        $this->sortBy = '';
        $this->sortOrder = '';
        $this->exactDestinationMatch = '';
        $this->blockSuperdeal = '';
        $this->showTransfer = '';
        $this->mealIds = '';
        $this->showCoordinates = '';
        $this->showReviews = '';
        $this->referencePointLatitude = '';
        $this->referencePointLongitude = '';
        $this->maxDistanceFromReferencePoint = '';
        $this->minStarRating = '';
        $this->maxStarRating = '';
        $this->featureIds = '';
        $this->minPrice = '';
        $this->maxPrice = '';
        $this->themeIds = '';
        $this->excludeSharedRooms = '';
        $this->excludeSharedFacilities = '';
        $this->prioritizedHotelIds = '';
        $this->totalRoomsInBatch = '';
        $this->paymentMethodId = '';
        $this->CustomerCountry = "ke";
        $this->B2C = '';
        return $this;
    }



    public function search($Request)
    {
        $urlString = "http://xml.sunhotels.net/15/PostGet/NonStaticXMLAPI.asmx?wsdl";
        $webService = new SoapClient($urlString);
        $myParams = array(
            'userName' => $Request->userName,
            'password' =>  $Request->password,
            'language' =>  $Request->language,
            'currencies' =>  $Request->currencies,
            'checkInDate' => $Request->checkInDate,
            'checkOutDate' => $Request->checkOutDate,
            'numberOfRooms' =>  $Request->numberOfRooms,
            'destination' =>  $Request->destination,
            'destinationID' => $Request->destinationID,
            'hotelIDs' =>  $Request->hotelIDs,
            'resortIDs' =>  $Request->resortIDs,
            'accommodationTypes' => $Request->accommodationTypes,
            'numberOfAdults' =>  $Request->numberOfAdults,
            'numberOfChildren' =>  $Request->numberOfChildren,
            'childrenAges' =>  $Request->childrenAges,
            'infant' =>  $Request->infant,
            'sortBy' =>  $Request->sortBy,
            'sortOrder' =>  $Request->sortOrder,
            'exactDestinationMatch' =>  $Request->exactDestinationMatch,
            'blockSuperdeal' => $Request->blockSuperdeal,
            'showTransfer' =>  $Request->showTransfer,
            'mealIds' =>  $Request->mealIds,
            'showCoordinates' =>  $Request->showCoordinates,
            'showReviews' =>  $Request->showReviews,
            'referencePointLatitude' =>  $Request->referencePointLatitude,
            'referencePointLongitude' =>  $Request->referencePointLongitude,
            'maxDistanceFromReferencePoint' =>  $Request->maxDistanceFromReferencePoint,
            'minStarRating' =>  $Request->minStarRating,
            'maxStarRating' =>  $Request->maxStarRating,
            'featureIds' =>  $Request->featureIds,
            'minPrice' =>  $Request->minPrice,
            'maxPrice' =>  $Request->maxPrice,
            'themeIds' =>  $Request->themeIds,
            'excludeSharedRooms' =>  $Request->excludeSharedRooms,
            'excludeSharedFacilities' =>  $Request->excludeSharedFacilities,
            'prioritizedHotelIds' =>  $Request->prioritizedHotelIds,
            'totalRoomsInBatch' =>  $Request->totalRoomsInBatch,
            'paymentMethodId' => $Request->paymentMethodId,
            'CustomerCountry' =>  $Request->CustomerCountry,
            'B2C' =>  $Request->B2C

        );

        try {
            $Result = $webService->SearchV2($myParams);
            return  $Result;
        } catch (Exception $e) {
            return $e;
        }
    }
}
