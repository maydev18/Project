<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js.js"></script>
  <link rel="stylesheet" href="registerStyle.css">
  <link rel="stylesheet" href="style.css">
  <style>
    #statusFailed .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    
}
    #statusSuccess .alert {
    padding: 20px;
    background-color: #04AA6D;
    color: white;
    z-index: 10000;
  }
  header{
    position: absolute;
  }
  </style>
</head>
<body>
<div id="statusFailed"></div>
  <div id="statusSuccess"></div>
  
  <section class="register" id="register">
    <h1 class="heading"></h1>
    <form action="sendrequest.php"  method = "post">
        <div class="inputBox">
            <input type="text" placeholder="full name" name = "fullname" id ="fullname">
        </div>
        <div class="inputBox">
            <input type="email" placeholder="your email" name = "email" id ="email">
            <input type="number" placeholder="your number" name = "number" id ="number">
        </div>
        <textarea  cols="30" rows="10" placeholder="message" name = "message" id ="message"></textarea>
        <input type="submit" class="btn" value="register" >
    </form>
    <script>
        let plan = localStorage.getItem("plan");
        document.getElementsByClassName('heading')[0].innerHTML = `
          register now for ${plan} plan`;
          var input =document.createElement("input");
          input.type = "text";
          input.name = "plan";
          input.placeholder = "your plan";
          input.id = "plan";
          input.value = plan;
          input.readOnly = true;
          document.getElementsByClassName("inputBox")[0].appendChild(input);

      </script>
    <script> if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
      }
    </script>
    <?php
        include_once("config.php");
        if($_SERVER['REQUEST_METHOD']=="POST"){
          $name = $_POST['fullname'];
          $email = $_POST['email'];
          $number = $_POST['number'];
          $plan = $_POST['plan'];
          $message = $_POST['message'];
          $sql =" INSERT INTO `user details` (`fullname`, `email`, `phone`, `plan`, `message`) VALUES ('$name','$email', '$number','$plan','$message')";
          $result = mysqli_query($conn , $sql);

          if($result){
            echo '<script> 
              document.getElementById("statusSuccess").innerHTML = `
                   <div class="alert">
                     <h1>Submitted Successfully</h1>
                   </div>
              `;
             </script>';
         }
          else{
            echo '<script>
         document.getElementById("statusFailed").innerHTML = `
              <div class="alert">
                <h1>Failed to submit</h1>
              </div>
              `;
        </script>';
          }
        }
    ?>
    <script>
            let status1 = document.getElementById("statusFailed");
            if(status1.innerHTML!=""){
              setTimeout(()=>{
                status1.innerHTML = "";
              } , 1000)
            }
            let status2 = document.getElementById("statusSuccess");
            if(status2.innerHTML!=""){
              setTimeout(()=>{
                status2.innerHTML = "";
              } , 1000)
            }
    </script>
    </section>
</body>
</html>