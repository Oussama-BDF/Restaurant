<?php 
    /*******************************************AUTH FUNCTIONS************************************** */

    function hashing($field){
        if ($field == "password")
            $_POST[$field] = md5($_POST[$field]);
    }


    function signIn(){
        global $siteTexts;
        if (isset($_POST['email']) && isset($_POST['password'])) {
            if (!($errorMsgs = isEmpty())){
                if (!select("email")){
                    $errorMsgs["email"] = $siteTexts["msgErr"]['notAssociated'];
                } else if (($row = select("email", "password"))) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location:". $BASE_URL . "home.php");
                    exit();
                }else{
                    $errorMsgs["password"] = $siteTexts["msgErr"]['notCorrect'];
                }
            }
            return $errorMsgs;
        }
    }

    function signUp(){
        global $siteTexts;
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])) {
            if (!($errorMsgs = isEmpty()) && !($errorMsgs["re_password"] = isMatch("password", "re_password"))){
                if (select("email")){
                    $errorMsgs["email"] = $siteTexts["msgErr"]['isTaken'];
                }else {
                    if (insert("email", "password", "name")) {
                        header("Location: ". $BASE_URL . "signup.php?success=Your account has been created successfully");
                        exit();
                    }
                }
            }
            return $errorMsgs;
        }
    }

    function signOut(){
        if (isset($_POST['signout'])){        
            session_unset();
            session_destroy();
            header("Location: ". $BASE_URL . "signin.php");
        }
    }

    function changePass(){
        global $siteTexts;
        if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
            if (!($errorMsgs = isEmpty()) && !($errorMsgs["c_np"] = isMatch("np", "c_np"))){
                $_POST['password'] = $_POST['op'];
                $_POST['id'] = $_SESSION['id'];
                $id = $_SESSION['id'];
                if (select("password", "id")){
                    $_POST['password'] = $_POST['np'];
                    update($id, "password");
                    header("Location: ". $BASE_URL . "changePass.php?success=Your password has been changed successfully");
                    exit();
                }else {
                    $errorMsgs["op"] = $siteTexts["msgErr"]['notCorrect'];
                }
            }
            return $errorMsgs;
        }  
    }


    function displayErrMsg(&$errorMsgs, $field){
        if(isset($errorMsgs[$field])){
            // "<script>document.getElementById('$field').focus();</script>"
            return '<p class="errMsg">'.$errorMsgs[$field].'</p>' . "<style>.$field{border-color: rgb(43 12 3);}</style>";
        }
    }


