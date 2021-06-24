<?php

if(isset($_POST)){
    include "conn.php";

    $Tt = mysqli_escape_string($mysqli,$_POST['Tt']);
    $Hh = mysqli_escape_string($mysqli,$_POST['Hh']);
    $Pp = mysqli_escape_string($mysqli,$_POST['Pp']);

    $comm = "C:\\Python39\\python.exe C:\\xampp\\htdocs\\pc2021\\label.py -t".sprintf("%.2f", $Tt)." -u ".sprintf("%.2f", $Hh)." -p ".sprintf("%.2f", $Pp);

    $label = shell_exec($comm);
    
    $hasilquery = mysqli_query($mysqli, "INSERT INTO pc2021(Tt,Hh,Pp,Label) VALUES ($Tt, $Hh, $Pp, '$label')");

    if($hasilquery==True){
        exit("Data has been inserted succesfully");
    }else{
        exit("Error occured");
    }
}