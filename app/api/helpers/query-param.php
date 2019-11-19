<?php
    class QueryParamHelper {
        public function getParam($param) {
            return htmlspecialchars($_REQUEST[$param]);
        }
    }
?>