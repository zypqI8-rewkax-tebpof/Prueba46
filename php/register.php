<?php

$db_name = 'mysql:host=localhost;dbname=book_db';
$db_user_name = 'root';
$db_user_pass = '';

$conn = new PDO($db_name, $db_user_name, $db_user_pass);

function create_unique_id(){
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $characters_lenght = strlen($characters);
   $random_string = '';
   for($i = 0; $i < 20; $i++){
      $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
   }
   return $random_string;
}

if(isset($_POST['send'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $location = $_POST['location'];
   $guests = $_POST['guests'];
   $arrivals = $_POST['arrivals'];
   $leaving = $_POST['leaving'];

   $insert_book = $conn->prepare("INSERT INTO `book_form`(id, name, email, phone, address, location, guests, arrivals, leaving) VALUES(?,?,?,?,?,?,?,?,?)");
   $insert_book->execute([$id, $name, $email, $phone, $address, $location, $guests, $arrivals, $leaving]);

   $success_msg[] = 'booked successfully!'; 

}

?>
