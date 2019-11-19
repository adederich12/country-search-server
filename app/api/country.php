<?php
require 'models/country.php';
require 'helpers/query-param.php';

class CountrySearch {
    private $nameEndpoint = 'https://restcountries.eu/rest/v2/name/';
    private $codeEndpoint = 'https://restcountries.eu/rest/v2/alpha/';
    private $countryList = array();

    private function searchByName($query) {
        return json_decode(file_get_contents($this->nameEndpoint.$query), true);
    }

    private function searchByFullName($query) {
        return json_decode(file_get_contents($this->nameEndpoint.$query."?fullText=true"), true);
    }

    private function searchByCode($query) {
        return json_decode(file_get_contents($this->codeEndpoint.$query), true);
    }
    
    private function fetchCountries($query) {
        $response = false;
        //probably could have used a regex for this check, but seems ISO country codes will be either 2 or 3 chars
        if (strlen($query) > 1 && strlen($query) < 4) {
            $response = $this->searchByCode($query);
        } else {
            $response = $this->searchByFullName($query);
        }

        // if we didn't get results, try the partial name search
        if (!$response) {
            $response = $this->searchByName($query);
        }

        // if we still have no results, lets get out
        if (!$response) {
            return;
        } else if (gettype(reset($response)) !== 'array') { // if the first element isnt an array, its a single country result
            $response = array($response);
        }

        foreach($response as $ind => $country) {
            if ($ind > 49) {
                break;
            }
            $countryObj = New CountryModel($country);
            $this->countryList[] = $countryObj->toArray();
        }
    }

    private function sortCountries() {
        usort($this->countryList, function($a, $b) {
            return strcmp($a['countryName'], $b['countryName']);
        });
    }

    public function response() {
        $queryHelper = New QueryParamHelper();
        $countryQuery = $queryHelper->getParam('country');

        $this->fetchCountries($countryQuery);
        $this->sortCountries();

        return $this->countryList;
    }
}
?>