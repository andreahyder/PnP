<?php
$servername = "localhost";
$usernamedb = "root";
$password = "pnpdbpassword1";
$usernamePerson = "cc98";
try {

	    $conn = new PDO("mysql:host=$servername;dbname=pnpdb", $usernamedb, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo  $space = $_POST['space'];
        echo $price= $_POST['price'];
        echo  $rating = $_POST['rating'];
        echo  $pets = $_POST['pets'];
        $alcohol = $_POST['alcohol'];
        $wheelchair = $_POST['wheelchair'];
        $smoking = $_POST['smoking'];
        $outdoor= $_POST['outdoor'];
        $stmt = $conn->prepare('SELECT * FROM Places WHERE TypeOfSpace = :space AND PricePerNight = :price AND Rating = :rating AND Pets = :pets AND Alcohol= :alcohol AND Wheelchair= :wheelchair AND OutdoorAccess= :outdoor');
        $stmt->execute(['space' => $space, 'price' => $price, 'rating' => $rating, 'pets' => $pets, 'alcohol' => $alcohol, 'wheelchair' => $wheelchair, 'outdoor' => $outdoor]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '  <section class="placeContainer">
                <div id="placeImage">
                        <img id= "image" src="img/house.jpeg" alt="House">
                </div>
            
                <div id="details">
                    <div>Address:</div>
                    <div>Description: $space </div>
                    <div>Price per night: $price </div>
                </div>
            
                <div id = "userInfo">
                    <div id = "user">  
                            User:
                    </div>
                    <div id = "rating">
                            Rating: $rating
                    </div>
                </div>
            </section>
            <form  method="POST" action="http://localhost/pnp/php/getPlace.php">
                <button type="submit"  name= "test" id = "bookPlace"> Book </button>
            </form>
        </section>
';
}

catch(PDOException $e){
    echo "        u       ck";
    exit();
}


?>
