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
    $sql = "SELECT * FROM users where email= :email and password = :password";

    

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
            
            if($stmt->rowCount() == 1){
                
                header("location: index.php");
                exit();


            } else{
                
                header("location: error.php");
                exit();
            }


        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);

    



     
    // Close statement
    
}else{

    header("location: password.php");
                exit();

}

// Close connection
unset($pdo);




?>