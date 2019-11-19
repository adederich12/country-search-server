<?php
    class CountryModel {
        private $countryName = null;
        private $flagUrl = null;
        private $alphaCode2 = null;
        private $alphaCode3 = null;
        private $region = null;
        private $subregion = null;
        private $population = null;
        private $languages = null;

        function __construct($data) {
            $this->countryName = $data['name'];
            $this->flagUrl = $data['flag'];
            $this->alphaCode2 = $data['alpha2Code'];
            $this->alphaCode3 = $data['alpha3Code'];
            $this->region = $data['region'];
            $this->subregion = $data['subregion'];
            $this->population = $data['population'];
            $this->languages = array();
            
            foreach($data['languages'] as $key => $language) {
                $this->languages[] = $language['name'];
            }
        }

        function toArray() {
            $result = array();
            foreach($this as $key => $val) {
                $result[$key] = $val;
            }
            return $result;
        }
    }
?>