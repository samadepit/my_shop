<?php
	class Customers
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "my_shop";
		public  $con;
		public function __construct()
		{
            try{
                $this->con = new PDO("mysql:host=".$this->servername.";dbname=".$this->database, $this->username, $this->password,); 
            } catch(PDOException $e){
               echo $e->getMessage();
            }
            return $this->con;
        }
		
		public function insertData($post)
		{
            if(!empty($post['name']) && !empty($post['email']) && !empty($post['username']) && !empty($post['password'])){

            $name = $post['name'];
			$email = $post['email'];
			$username = $post['username'];
			$password = $post['password'];
			$query="INSERT INTO users(name,email,username,password) VALUES('$name','$email','$username','$password')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexuser.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}

            }else {
                echo "champ vide";
            }
			
		}
		public function displayData()
		{
		    $query = "SELECT * FROM users";
		    $result = $this->con->query($query);
		if ($result->rowCount()> 0) {
		    // $data = array();
		    $row = $result->fetchAll();
		          
                //  $row;
		    
			 return $row;
		    }else{
			 echo "No found records";
		    }
		}
		public function displyaRecordById($id)
		{
			$query = "SELECT * FROM users WHERE id = '$id'";
			$result = $this->con->query($query);
			if ($result->rowCount()) {
				$row = $result->fetchAll();
				return $row;
			}else{
				echo "affichage incorrect";
			}
		//     $query = "SELECT * FROM users WHERE id = '$id'";
		//     $result = $this->con->query($query);
		// 	// $count = $result->rowCount();   
		// if ($result) {
        //     $row = $result->fetchAll();
		// 	// var_dump($row);
		// 	return $row;
		//     }else{
		// 	echo "Record not found";
		//     }
		}
		public function updateRecord($postData)
		{
			// if( !empty($postData)){

            //     $name = $postData['name'];
			// 	$email = $postData['email'];
			// 	$username = $postData['username'];
			// 	// $query = "UPDATE users SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
			// 	$query = "UPDATE users SET name=?, email=?, username=? WHERE id='$id'";
			// 	$stmt= $this->con->prepare($query);
			// 	$stmt->execute([$name,$email, $username]);
			// 	if ($stmt==true) {
			//     header("Location:index.php?msg2=update");
			// 	}else{
			//     echo "Registration updated failed try again!";
			// 	}

				// $query = "UPDATE users SET name=?, email=?, username=? WHERE id='$id'";
				// $stmt= $pdo->prepare($sql);
				// $stmt->execute([$name, $surname, $sex, $id]);
            // }

		    $name = $_POST['name'];
		    $email = $_POST['email'];
		    $username =$_POST['username'];
		    $id = $_POST['id'];
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE users SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }else {
				    echo "champ vide";
				}
			
		}
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM users WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>