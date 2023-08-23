<?php

    $siteTexts=[
            "index" => [
                "title" => "WELCOME"
            ],
            "signin" => [
                "title" => "SIGN IN",
                "form" => [
                    "email" => [
                        "libelle" => "Email",
                        "placeholder" => "Your Email"
                    ],
                    "password" => [
                        "libelle" => "Password",
                        "placeholder" => "Your Password"
                    ],
                    "submit" => "Sign In",
                    "anchor" => "Create an account"
                ]
            ],
            "signup" => [
                "title" => "SIGN UP",
                "form" => [
                    "email" => [
                        "libelle" => "Email",
                        "placeholder" => "Your Email"
                    ],
                    "password" => [
                        "libelle" => "Password",
                        "placeholder" => "Your Password"
                    ],
                    "re_password" => [
                        "libelle" => "Re Password",
                        "placeholder" => "Your Re Password"
                    ],
                    "name" => [
                        "libelle" => "Name",
                        "placeholder" => "Your Name"
                    ],
                    "submit" => "Sign Up",
                    "anchor" => "Already have an account?"
                ]
            ],
            "home" => [
                "title" => "HOME",
                "submit" => "Sign Out",
                "anchor" => "Change Password"
            ],
            "changePass" => [                
                "title" => "CHANGE PASSWORD",
                "form" => [
                    "op" => [
                        "libelle" => "Old Password",
                        "placeholder" => "Your Old Password"
                    ],
                    "np" => [
                        "libelle" => "New Password",
                        "placeholder" => "Your New Password"
                    ],
                    "c_np" => [
                        "libelle" => "Confirm New Password",
                        "placeholder" => "Confirm New Password"
                    ],
                    "submit" => "CHANGE",
                    "anchor" => "HOME"
                ]
            ],
            "msgErr" => [
                "required"=>  " is required",
                "match" => "The confirmation password  does not match",
                "notAssociated" => "The email you entered is not associated with any account",
                "notCorrect" => "Incorect password",
                "isTaken" => "The username is taken, try another"  
            ]
        ];
    

