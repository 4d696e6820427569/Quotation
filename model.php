<?php
// Minh Bui
class DatabaseAdapter
{
    
    // The instance variable used in every method below.
    private $DB;
    
    // Connect to an existing database named 'first'
    public function __construct()
    {
        $dataBase = 'mysql:dbname=quotes;charset=utf8;host=127.0.0.1';
        $user = 'root';
        $password = '';
        
        try {
            $this->DB = new PDO($dataBase, $user, $password);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo ('Error establishing Connection');
            exit();
        }
    }
       
    // Return a PHP array of all columns in all quotations
    public function getAllQuotations() {
        $sqlStmt = $this->DB->prepare("SELECT * FROM quotations");
        $sqlStmt->execute();
        return $sqlStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Return a PHP array of all columns in all quotations
    public function getAllUsers() {
        $sqlStmt = $this->DB->prepare("SELECT * FROM users");
        $sqlStmt->execute();
        return $sqlStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Return true if the given string $accountName's password matches the given string $psw, 
    // false if there no match or the user does not exist
    public function verifyCredentials($accountName, $psw) {
        $sqlStmt = $this->DB->prepare("SELECT username, password FROM users WHERE username='" . $accountName . "' AND password='" . $psw . "'");
        $sqlStmt->execute();
        return ! empty( $sqlStmt->fetchAll(PDO::FETCH_ASSOC) );
    }
    
    // Insert string $quote to the quotations table with the string $author of the quote. 
    // Set rating and flagged to default values of 0. added should be set to NOW()
    public function addQuote($quote, $author) {
        $sqlStmt = $this->DB->prepare("INSERT INTO quotations(quote, added, author, rating, flagged) values('" . $quote . "', NOW(), '" . $author . "', 0, 0)");
        return $sqlStmt->execute();
    }
    
    // Insert a new user.
    public function addUser($accountName, $psw) {
        $sqlStmt = $this->DB->prepare("INSERT INTO users(username, password) values('" . $accountName . "', '" . $psw . "')");
        return $sqlStmt->execute();
        
    }
}

// Run as CLI console app
//$theDBA = new DatabaseAdapter();
// Testing code that should not be run when a part of MVC

//$theDBA->addUser('Dakota','abcd');
//$theDBA->addQuote('Mine too', 'Devon');
/*
if ($theDBA->verifyCredentials('Kim', '1234'))
    echo 'works' . PHP_EOL;
else
    echo 'broken' . PHP_EOL;
        
if (! $theDBA->verifyCredentials('Dakota', 'abXX'))
    echo 'works' . PHP_EOL;
else
    echo 'broken' . PHP_EOL;
                
if (! $theDBA->verifyCredentials('Not Here', 'abXX'))
    echo 'works' . PHP_EOL;
else
    echo 'broken' . PHP_EOL;

echo  PHP_EOL;
                        
$arr = $theDBA->getAllQuotations();
print_r($arr);
$arr = $theDBA->getAllUsers();
print_r($arr);
*/
?>