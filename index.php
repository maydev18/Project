<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UV Fitness</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js.js"></script>
    <script>
        function register(plan){
            localStorage.setItem("plan" , plan);
            window.open("sendrequest.php");
        }
    </script>
</head>
<body>
<?php
include_once("header.php");
?>
<section class="home" id="home">

<h1>it's never too easy but <br> you have to try</h1>

<a href="#plan"><button class="btn">get started</button></a>

</section>




<section class="about" id="about">

<div class="row">

    <div class="image">
        <img src="images/about.jpg" alt="img">
    </div>

    <div class="content">
        <h3>a word about us</h3>
        <p>UV Fitness provides a 24/7 Fitness facility as well as surrounding areas to help people reach and maintain their goals. We combine different types of fitness equipment to meet different fitness needs and levels.</p>
        
        <p>At UV Fitness you’ll find all the latest strength and cardio equipment along with a energetic group exercise program that includes POUND, Zumba, Kickboxing, Bootcamp, Muscle Building and many other cardio classes. You’ll find a supportive environment with all kinds of people who are working just as hard as you to meet their goals.</p>

        <p>Our Staff, Trainers & Group exercise instructors are committed to offering our members a great fitness experience. Whether you’re a mom looking to get back into shape, a marathon runner trying to shave a few minutes off your personal best or just trying to stay healthy we would love to help you realize your potential and meet your goals!!<br><br></p>

        <a href="https://www.google.com/search?q=uv%20fitness%20gym&oq=uv+fitness+gym&aqs=chrome.0.69i59j0i390l4j69i60l3.1898j0j7&sourceid=chrome&ie=UTF-8&tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=ALiCzsZ2lTHKdk2cRRPvQ95m1h3jjeqtqg:1667012965412&rflfq=1&num=10&rldimm=13471236511174798528&lqi=Cg51diBmaXRuZXNzIGd5bUjGr_Lal7mAgAhaHBAAEAEQAhgAGAEYAiIOdXYgZml0bmVzcyBneW2SAQNneW0&ved=2ahUKEwjTqY6du4T7AhUKTmwGHdDjA5cQvS56BAgLEAE&sa=X&rlst=f#rlfi=hd:;si:13471236511174798528,l,Cg51diBmaXRuZXNzIGd5bUjGr_Lal7mAgAhaHBAAEAEQAhgAGAEYAiIOdXYgZml0bmVzcyBneW2SAQNneW0;mv:[[28.729950099999996,77.2174931],[28.6855771,77.1888305]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m1!1e3!2m4!1e17!4m2!17m1!1e2!3sIAE,lf:1,lf_ui:2" target="_blank"><button class="btn">learn more</button></a>
    </div>

</div>

</section>



<section class="service" id="service">

<h1 class="heading">our services</h1>

<div class="box-container">

    <div class="box">
        <img src="images/img1.jpg" alt="">
        <div class="info">
            <h3>Cardio</h3>
            <p>Cardio exercise is any rhythmic activity that raises your heart rate into your target heart rate zone. This is the zone where you burn the most fat and calories.</p>
            <a href="#"><button class="btn">more</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/img2.jpg" alt="">
        <div class="info">
            <h3>yoga</h3>
            <p>Yoga is a mind and body practice. Various styles of yoga combine physical postures, breathing techniques, and meditation or relaxation.</p>
            <a href="#"><button class="btn">more</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/img3.jpg" alt="">
        <div class="info">
            <h3>Personal trainer</h3>
            <p>creates one-on-one fitness programmes for their clients, motivating and guiding them to achieve their goals.</p>
            <a href="#"><button class="btn">more</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/img4.jpg" alt="">
        <div class="info">
            <h3>equipments</h3>
            <ul>
                <li>Treadmill</li>
                <li>Cross-Trainer</li>
                <li>Exercise Bike</li>
                <li>Gym Bench</li>
                <li>Weight bar</li>
                <li>kettlebell</li>
            </ul>
            <a href="#"><button class="btn">more</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/img5.jpg" alt="">
        <div class="info">
            <h3>boxing</h3>
            <p>Typical boxing exercise includes movement and footwork drills to evade punches, as well as punching drills on equipment like heavy bags, speed bags, and focus mitts.</p>
            <a href="#"><button class="btn">more</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/img6.jpg" alt="">
        <div class="info">
            <h3>weight lifting</h3>
            <p>Weight training is a type of strength training that uses weights for resistance. Weight training provides a stress to the muscles that causes them to adapt and get stronger.</p>
            <a href="#"><button class="btn">more</button></a>
        </div>
    </div>

</div>

</section>



<section class="trainer" id="trainer">

<h1 class="heading">our trainers</h1>

<div class="box-container">

    <div class="box">
        <img src="images/coach1.jpg" alt="">
        <div class="info">
            <h3>Karan Soni</h3>
        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
    </div>

    <div class="box">
        <img src="images/coach3.jpg" alt="">
        <div class="info">
            <h3>Sumit</h3>
        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
    </div>

    <div class="box">
        <img src="images/coach2.jpg" alt="">
        <div class="info">
            <h3>Jatin</h3>
        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/p/CUPHdHXl34L/" class="fab fa-instagram"></a>
        </div>
    </div>

    <div class="box">
        <img src="images/coach4.jpg" alt="">
        <div class="info">
            <h3>Ravi Kumar</h3>
        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
    </div>

</div>

</section>



<section class="plan" id="plan">

<h1 class="heading">membership plan</h1>

<div class="box-container">

    <div class="box">
        <h3 class="title">basic</h3>
        <h3 class="price">₹2,000</h3>
        <h3 class="month">1 month</h3>
        <ul>
            <li><i class="fas fa-check"></i>weight lifting</li>
            <li><i class="fas fa-check"></i>cardio</li>
            <li><i class="fas fa-check"></i>yoga</li>
            <li><i class="fas fa-check"></i>training</li>
            <li><i class="fas fa-check"></i>protein powder</li>
        </ul>
        <button class="btn" onclick="register('basic')">check out</button>
    </div>
    <div class="box">
        <h3 class="title">standard</h3>
        <h3 class="price">₹4,000</h3>
        <h3 class="month">3 months</h3>
        <ul>
            <li><i class="fas fa-check"></i>weight lifting</li>
            <li><i class="fas fa-check"></i>cardio</li>
            <li><i class="fas fa-check"></i>yoga</li>
            <li><i class="fas fa-check"></i>training</li>
            <li><i class="fas fa-check"></i>protein powder</li>
        </ul>
        <a><button class="btn" onclick="register('standard')">check out</button></a>
    </div>

    <div class="box">
        <h3 class="title">premium</h3>
        <h3 class="price">₹18,000</h3>
        <h3 class="month">12 months</h3>
        <ul>
            <li><i class="fas fa-check"></i>weight lifting</li>
            <li><i class="fas fa-check"></i>cardio</li>
            <li><i class="fas fa-check"></i>yoga</li>
            <li><i class="fas fa-check"></i>training</li>
            <li><i class="fas fa-check"></i>protein powder</li>
        </ul>
        <a><button class="btn" onclick="register('premium')">check out</button></a>
    </div>

</div>

</section>

<section class="map">
<h1>find us here</h1>
<div id="map" class="container-fluid">
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d111978.36495716193!2d77.13466303671198!3d28.709864563424528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390cfda533d5b65f%3A0x7af89b42d5016d91!2s851%2C%20Banda%20Bahadur%20Marg%2C%20Dhaka%20Village%2C%20Mukherjee%20Nagar%2C%20Delhi%2C%20110009!3m2!1d28.7098826!2d77.20470329999999!5e0!3m2!1sen!2sin!4v1669234345806!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
</section>

<section class="footer">
<footer>
      <div id="gym-base" class="footer-div">
          <div class="footer-div-heading">Gym Base<hr></div>
          <div id="gym-base-desc">
              <br>One of the best gym in Model Town.<br> Owned and operated by a Personal Trainer with over 7 years of experience.
          </div>
          <div class="contact-info">
                <span class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>51s, Model Town,New Delhi</span>
                </span>
              <span class="address">
                    <i class="fas fa-phone"></i>
                    <span>+91 8130367206</span>
                </span>
              <span class="address">
                    <i class="fas fa-envelope"></i>
                    <span>UVfitness08@gmail.com</span>
                </span>
          </div>
      </div>
      
      <div id="timings" class="footer-div">
          <div class="footer-div-heading">Opening Hours<hr></div>
          <div class="timings-content">
              <span class="day"><br>Monday</span>
              <span class="time"><br>6:00 AM - 9:30 PM &nbsp;</span>
          </div>
          <hr class="timings-hr">
          <div class="timings-content">
              <span class="day">Tuesday</span>
              <span class="time">6:00 AM - 9:30 PM &nbsp;</span>
          </div>
          <hr class="timings-hr">
          <div class="timings-content">
              <span class="day">Wednesday</span>
              <span class="time">6:00 AM - 9:30 PM &nbsp;</span>
          </div>
          <hr class="timings-hr">
          <div class="timings-content">
              <span class="day">Thursday</span>
              <span class="time">6:00 AM - 9:30 PM &nbsp;</span>
          </div>
          <hr class="timings-hr">
          <div class="timings-content">
              <span class="day">Friday</span>
              <span class="time">6:00 AM - 9:30 PM &nbsp;</span>
          </div>
          <hr class="timings-hr">
          <div class="timings-content">
              <span class="day">Saturday</span>
              <span class="time">6:00 AM - 9:30 PM &nbsp;</span>
          </div>
          <hr class="timings-hr">
      </div>

  </footer>
</section>

<section class="footer-base">
    © Copyright - UV Fitness and M&M Enterprises 

</body>
</html>