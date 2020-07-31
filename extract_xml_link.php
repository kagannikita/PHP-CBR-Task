<?php
require "includes/db_1.php";
$url="http://www.cbr.ru/scripts/XML_daily.asp";
$ch=curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_URL,$url);
$data=curl_exec($ch);
curl_close($ch);
$xml=simplexml_load_string($data);
    foreach ($xml->Valute as $ValuteNode)
   {
       $date =  (string) $xml['Date'];
      $id =  (string) $ValuteNode['ID'];
       $numCode =  (string) $ValuteNode->NumCode;
      $name =  (string) $ValuteNode->Name;
       $value =  (string) $ValuteNode->Value;
     $CharCode =  (string) $ValuteNode->CharCode;
$sql = "INSERT INTO currency (valuteID, numCode, charCode,name,value,date)
       VALUES ('$id', '$numCode', '$CharCode','$name','$value','$date')";
        if (mysqli_query($connection, $sql)) {
           echo "New record created successfully";
       } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
}

