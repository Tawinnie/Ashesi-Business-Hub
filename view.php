<?php
///conect ot database
include "dbconnect.php";
session_start();//statr a session

$db = mysqli_connect('localhost', 'root', 'Tawinnie', 'business');

  //get the id of the clicked product 
        $id=$_GET['id'];
    //select  the product details from database
        $sql= "SELECT * FROM product WHERE product_id='$id' LIMIT 1";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) >0)
        {
            while($row=mysqli_fetch_array($result))
            {//specifying product attributes to be posted on homepage 
                $image=$row["image"];
                $product_name=$row["product_name"];
                $price=$row["price"];
                $date=strftime("%b %d,%Y",strtotime($row["Date_posted"]));
                $location=$row["location"];
                $description=$row["description"];
    
            }
    
        }else
        {
            echo "That item doesn,t exist";
            exit();
    
        }
    
    

?>

<!DOCTYPE html>
<html>
    <head>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>
    <div align=" center">
        <!-- show these details on the selected product-->
            <div>
              <img src="<?php echo $image; ?>" width="35%" height="300" alt="<?php echo $product_name; ?>"/></td>
            </div>

            <div>
                <?php echo "$product_name" ?>
            </div>

            <div>
                <?php echo "GHC". "$price" ?>
            </div>
                
            <div>
                <?php echo "$date" ?>
            </div>

            <div>
                <?php echo "$description" ?>
            </div>

            <div>
                <?php echo "$location" ?>
            </div>

       
</div>

    <div align=" center">

    <h2>Message Window</h2>
    <p>Interested in this product? Send a Message.</p>

    <button class="open-button" onclick="openForm()">Message Seller</button>

    <div class="chat-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
                <h1>Chat</h1>

                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

            <script>
            function openForm() {
            document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
            </script>
</div>
</body>
</html>
