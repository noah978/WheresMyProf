<!DOCTYPE html>
<html>
<body>

<?php
  $xml = simplexml_load_file("professors.xml") or die("Error: Cannot create object");

  if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
  } else {
    $result = $xml->xpath('/faculty');
    echo $result->professor[0]->name;

    foreach ($result as $node) {
      echo $node->asXML();
    }

    for($i = 0; $i < count($result); $i++){
      echo $result->professor[$i]->name  . "<br>";
      echo $xml->faculty->professor[$i]->email . "<br>";
      echo $xml->faculty->professor[$i]->department . "<br>";
      echo $xml->faculty->professor[$i]->phone . "<br><br>";
    }
  }
?>

</body>
</html>
