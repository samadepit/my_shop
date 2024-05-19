<?php
	class Produits
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
			$price = $post['price'];
            $image= $_FILES['image']['name'];
            $image_tmp_name= $_FILES['image']['tmp_name'];
            $upload="./image/" . $image;
            move_uploaded_file($image_tmp_name,$upload);
            // $image=$this->con->htmlspecialchars( $post['image']);
			$description = $post['description'];
			$category_id = $post['category_id']; 
			$query="INSERT INTO products(name,price,image,description,category_id) VALUES('$name','$price','$image','$description','category_id')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexproduct.php?msg1=insert");
			}else{
			    echo "Registration failed try again!";
			}

            // }else {
            //     echo "champ vide";
            // }
			
		}
		public function displayData()
		{
		    $query = "SELECT * FROM products";
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

		public function displaycategorie()
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
			$query = "SELECT * FROM products WHERE id = '$id'";
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

		    $image= $_FILES['image']['name'];
            $image_tmp_name= $_FILES['image']['tmp_name'];
            $upload="./image/" . $image;
            move_uploaded_file($image_tmp_name,$upload);


            $description =$postData['description'];
            $name = $postData['name'];
			$price =$postData['price'];
		    $id = $postData['id'];
		    if (!empty($id) && !empty($postData)) {
			$query = "UPDATE products SET name = '$name', price = '$price', image = '$image', description ='$description' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:indexproduct.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }else {
				    echo "champ vide";
				}
                
		}
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM products WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:indexproduct.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>