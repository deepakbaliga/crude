<?php


// Include config file
require_once 'config.php';

$email = $_GET['email'];
$password = $_GET['password'];

echo $email;

echo $password;




// Check input errors before inserting in database
if(!empty($email) && !empty($password)){


    


    // Prepare an insert statement
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        
        
        // Set parameters
        $param_email = $name;
        $param_password = $password;
        
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records created successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
}

// Close connection
unset($pdo);




?>