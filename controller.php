<?php
include 'model.php';

$theDBA = new DatabaseAdapter();

if (isset($_GET))
    if (isset($_GET[ "getQuote" ]) && $_GET[ "getQuote" ] === "true")
        echo json_encode ($theDBA->getAllQuotations());
elseif (isset($_POST)) {
    // Register/login user
    if (isset( $_POST[ "userName" ] ) && isset( $_POST[ "password" ] ) )
        echo "";
    
    // Adding quote
        if (isset( $_POST[ "addQuote" ] ) && isset( $_POST[ "author" ] ) ) {
            $theDBA->addQuote($_POST[ "addQuote" ], $_POST[ "author" ]);
        }
}