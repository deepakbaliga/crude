<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':id', $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $salary = $row["salary"];
                $email = $row["email"];



    $sql_salary = "INSERT INTO salary (employee_id, name, salary, date) VALUES (:employee_id, :name, :salary, :date)";
 
        if($stm = $pdo->prepare($sql_salary)){
            // Bind variables to the prepared statement as parameters
            $stm->bindParam(':employee_id', $param_id_);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':salary', $salary);
            $stm->bindParam(':date', $param_date);

            $param_id_ = $param_id;
            $param_name = $name;
            $param_salary = $salary;
            $param_date = date("Y-m-d h:i:sa");

         
            
            
            // Attempt to execute the prepared statement
            if($stm->execute()){

                mail($email, "Salary Slip ".date("Y-m-d h:i:sa"), "Hello ".$name.",\n Salary of ".$salary." euros have been credited to your account. \n\n Thanks and regards,");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stm);








            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
    
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Salary Paid </h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
    
                    <div class="form-group">
                        <label>Salary</label>
                        <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>