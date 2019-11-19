<?php
require 'api/country.php';

class Router {
    public function run() {
        // I didn't have time to set this up into a proper routing class, so I'm simply routing 
        // straight to the country search endpoint!
        $endpoint = New CountrySearch();

        return $endpoint->response();
    }
}
?>