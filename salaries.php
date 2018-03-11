<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <link rel="stylesheet" href="login.css">

    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   


            $('#datatab').DataTable();

            

        });
    </script>
</head>
<body>

<section class="text">
                
                <h1><span class="fontawesome-star star"></span> <span>Salary Slips</span> <span class="fontawesome-star star"></span></h1>
</section>



    <div class="wrapper">

    
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
                        
                    </div>
                    <?php
                    // Include config file
                    require_once 'config.php';
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM salary";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo "<table id='datatab' class='table table-striped table-bordered table-hover' cellspacing='0' width='100%'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>Payment ID</th>";
                                        echo "<th>Employee ID</th>";
                                        echo "<th>Employee Name</th>";
                                        echo "<th>Salary</th>";
                                        echo "<th>Date</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['employee_id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>

$(document).ready(function() {
$('#datatab').DataTable();
});
</script>

</body>
</html>