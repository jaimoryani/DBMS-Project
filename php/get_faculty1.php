<?php   
session_start();
?>
        <?php 
        $conn=new mysqli("localhost","root","12345","feedback_management");
        require('connection.php');
            $sql = "select * from instructor;";  
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $arr=array();
                while($row=$result->fetch_assoc()){
                    $arr[]=$row;
                }
                $myJSON=json_encode($arr);
                echo $myJSON;
            }
            else
            echo "0 results";
            $conn->close();
                ?>  