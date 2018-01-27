<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

class message
{
    public $id;
    public $mykey;
    public $value;
    public function __construct($p_id, $p_mykey, $p_value) {
              $this->id = $p_id;
              $this->mykey = $p_mykey;
              $this->value = $p_value;
            }
}
      

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      
      if (isset($_POST["messageText"])){ 

          $addmessage = array(
          'id' => '9',
          'mykey' => '12345',
          'value'=> $_POST["messageText"]
          );  
      
          //open or read json data
          $myfile = fopen("database.json", "w") or die("Cannot open json file");
          $data_results = file_get_contents('database.json');

          $tempArray = json_decode($data_results);
          //append additional json to json file
          $tempArray[]=$addmessage;
          $jsonData = json_encode($tempArray);

          file_put_contents('database.json', $jsonData);

          fclose($myfile);
      }
  }

if ($_SERVER["REQUEST_METHOD"] == "GET"){

        $myfile = fopen("database.json", "r") or die("Unable to open file!");    
        $messages = json_decode(fread($myfile, filesize("database.json")));
        fclose($myfile);
        
        $minimumID = 1;
        $requestedMessages = array();
        
        $i;
        for($i = 0; $i < count($messages); $i++){
            array_push($requestedMessages, $messages[$i]);
        }        
        echo json_encode($requestedMessages);
    
}


/*  $myfile = fopen("database.json", "r") or die("Cannot open file: ".$my_file);
      $data = json_decode($myfile, true); // decode the JSON into an associative array
      // $data = json_decode(fread($myfile, filesize("database.json")));
      echo '<pre>' . print_r($data, true) . '</pre>';
      fclose($myfile);  */
	?>
