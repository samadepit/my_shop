<?php
	class Category
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
            // if(!empty($post['name']) && !empty($post['price'])  && !empty($post['description'])){
            $name = $post['name'];
			// $parent_id =$post['parent_id'];
            
            // $parent_id=0;
            // $image=$this->con->htmlspecialchars( $post['image']);
			$query="INSERT INTO categories(name) VALUES('$name')";
			$sql = $this->con->query($query);
            // $parentid="SELECT id FROM categories WHERE name='$name'";
            // $parent=$this->con->query($parentid);
            // $essaie="INSERT INTO categorie(parent_id) VALUES ('$parent')";
            // $essaitrue=$this->con->query($essaie);
			if ($sql==true) {
			    header("Location:indexcategory.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}

            // }else {
            //     echo "champ vide";
            // }
			
		}
		public function displayData()
		{
		    $query = "SELECT * FROM categories";
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
			$query = "SELECT * FROM categories WHERE id = '$id'";
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

            // $image= file_get_contents ($_FILES['image']['tmp_name']);
            // $image= $_FILES['image']['tmp_name'];
            // $upload="./image/" . $image;
            // move_uploaded_file($_FILES['image']['tmp_name'],$upload);
           
            $name = $postData['name'];
			// $parent_id =$postData['parent_id'];
		    $id = $postData['id'];
		    if (!empty($id) && !empty($postData)) {
			$query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexcategory.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }else {
				    echo "champ vide";
				}
                
		}
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM categories WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:indexcategory.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>