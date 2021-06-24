<?php
    if(isset($_POST)){
        if(isset($_POST['key'])){

            include "conn.php";

            if($_POST['key']=='getdataTt'){
                $hasilquery = mysqli_query($mysqli, "SELECT Tt FROM pc2021 ORDER BY ID DESC LIMIT 1;");
                if(mysqli_num_rows($hasilquery)>0){
                    $response = "";
                    while($data = mysqli_fetch_array($hasilquery)){
                        $response .= "".$data['Tt'];
                        exit($response);
                    }
                }else{
                    exit('nodata');
                }
            }elseif($_POST['key']=='getdataHh'){
                $hasilquery = mysqli_query($mysqli, "SELECT Hh FROM pc2021 ORDER BY ID DESC LIMIT 1;");
                if(mysqli_num_rows($hasilquery)>0){
                    $response = "";
                    while($data = mysqli_fetch_array($hasilquery)){
                        $response .= "".$data['Hh'];
                        exit($response);
                    }
                }else{
                    exit('nodata');
                }
            }elseif($_POST['key']=='getdataPp'){
                $hasilquery = mysqli_query($mysqli, "SELECT Pp FROM pc2021 ORDER BY ID DESC LIMIT 1;");
                if(mysqli_num_rows($hasilquery)>0){
                    $response = "";
                    while($data = mysqli_fetch_array($hasilquery)){
                        $response .= "".$data['Pp'];
                        exit($response);
                    }
                }else{
                    exit('nodata');
                }
            }elseif($_POST['key']=='getdataLabel'){
                $hasilquery = mysqli_query($mysqli, "SELECT Label FROM pc2021 ORDER BY ID DESC LIMIT 1;");
                if(mysqli_num_rows($hasilquery)>0){
                    $response = "";
                    while($data = mysqli_fetch_array($hasilquery)){
                        $response .= "".$data['Label'];
                        exit($response);
                    }
                }else{
                    exit('nodata');
                }
            }
        }
    }
?>