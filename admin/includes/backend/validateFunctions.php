<?php
    /*******************************************VALIDATE FUNCTIONS************************************** */

    function rmv_unnecessary_chars($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function isEmpty(){
        $pageName = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
        global $siteTexts;
        $errorMsgs = array();
        foreach ($_POST as $key => $value) {
            $value = rmv_unnecessary_chars($value);
            if (empty($value)) {
                $errorMsgs[$key] = $siteTexts[$pageName]["form"][$key]["libelle"] . $siteTexts["msgErr"]['required'];
                break;
            }
        }
        return $errorMsgs;
    }

    function isMatch($field1,$field2){
        global $siteTexts;
        return ($_POST[$field1] !== $_POST[$field2])? $siteTexts["msgErr"]['match'] : NULL;
    }