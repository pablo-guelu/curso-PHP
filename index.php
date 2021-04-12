<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./index-style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <header class="flex-container">
            <?php include 'header.php' ?>
        </header>
  
        <nav>
            <ul class="flex-container">
                <li class="flex-center"><a href="#"> BLOG </a></li>
                <li class="flex-center"><a href="#"> ABOUT </a></li>
                <li class="flex-center"><a href="#"> CONTACT </a></li>
                <li class="flex-center"><a href="#"> APPS </a></li>
                <li class="flex-center"><a href="#"> TEAM </a></li>
            </ul>
        </nav>
        
        <!--https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Using_HTML_sections_and_outlines#how_do_sectional_elements_work-->
        <section class="flex-container">
            
            <article class="flex-center">
                <img src="images/highlight-1.webp" alt="highlight image"/>
                <div class="highlight-content">
                    <h4>New Samsung web app brings Android to iPhones</h4>
                    <a href="#" class="myButton">read more</a>
                </div>
            </article>
            
            <article class="flex-center">
                <img src="images/highlight-2.png" alt="highlight image"/>
                <div class="highlight-content">
                    <h4>Win 10 taskbar pushing MS Edge web apps</h4>
                    <a href="#" class="myButton">read more</a>
                </div>
            </article>
            
            <article class="flex-center">
                <img src="images/highlight-3.jpg" alt="highlight image"/>
                <div class="highlight-content">
                    <h4>Google kills the Google Shopping mobile app</h4>
                    <a href="#" class="myButton">read more</a>
                </div>
            </article>
            
        </section>
        
        <section id="central" class="flex-container">
            <aside class="flex-center">
                ADVERTISING SPACE
            </aside>

            <article id="main-article">
                <h3> Progressive Web Apps </h3>
                <img src="images/progressive-web-apps.jpg" alt="progressive-web-apps"/ style="float: right; width: 300px;">
                <p>
                    A progressive web application (PWA) is a type of application software delivered through the web, built using common web technologies including HTML, CSS and JavaScript.
                     It is intended to work on any platform that uses a standards-compliant browser, including both desktop and mobile devices. </p>
                <p>
                    Since a progressive web app is a type of webpage or website known as a web application, they do not require separate bundling or distribution. 
                    Developers can just publish the web application online, ensure that it meets baseline "installability requirements", and users will be able to add the application to their home screen. 
                    Publishing the app to digital distribution systems like Apple App Store or Google Play is optional.</p>
                <p>
                    As of 2021, PWA features are supported to varying degrees by Google Chrome, Apple Safari, Firefox for Android, and Microsoft Edge but not Firefox for desktop.
                    Several businesses highlight significant improvements[5] in a wide variety of key performance indicators after PWA implementation, like increased time spent on page, conversions, or revenue.
                </p>
            </article>

            <aside class="flex-center">
                ADVERTISING SPACE
            </aside>
        </section>
        
        
        <footer class="flex-center">
            <?php include ('footer.php'); ?>
        </footer>
    </body>
</html>