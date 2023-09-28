<?php
require_once 'connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ime = $data['ime'];
    $prezime = $data['prezime'];
    $ocena = $data['ocena'];
    if ( $ime != '' || $prezime != '' || $ocena != '') 
    {
        $q = "INSERT INTO `studenti` (`ime`, `prezime`, `ocena`) VALUES
        ('" . $ime . "', '" . $prezime . "', '" . $ocena . "');";        
        
        $r = $conn->prepare($q);
        $r->execute();
        if ($r) 
        {
            $response =
                [
                'id' => $conn->lastInsertId(),
                'ime' => $ime,
                'prezime' => $prezime,
                'ocena' => $ocena
                ];
            
                echo json_encode($response);
            
        } 
        else 
        {
            //doslo je do greske
            echo json_encode([]);
        }
    }
    else
    {
        echo json_encode([]);
    }

    
}