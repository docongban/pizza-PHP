<?php

    require_once ('config.php');

    function execute($sql){
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        //insert,update,delete
        mysqli_query($con, $sql);

        //close connection
        // mysqli_close($con);
    }

    function executeResult2($sql, $onlyOne = false) {
        //Mo ket noi toi database
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
    
        //query
        $resultset = mysqli_query($conn, $sql);
    
        if($onlyOne) {
            $data = mysqli_fetch_array($resultset, 1);
        } else {
            $data = [];
            while(($row = mysqli_fetch_array($resultset, 1)) != null) {
                $data[] = $row;
            }
        }
        //Dong ket noi
        mysqli_close($conn);
    
        return $data;
    } 

    function executeResult($sql){
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        //insert,update,delete
        $result = mysqli_query($con, $sql);
        $data=[];
        while($row = mysqli_fetch_array($result,1)){
            $data[]=$row;
        }
        //close connection
        mysqli_close($con);
        return $data;
    }

    function executeSingleResult($sql){
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        //insert,update,delete
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result,1);
        //close connection
        mysqli_close($con);
        return $row;
    }

?>