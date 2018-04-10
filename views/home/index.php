<main>
    <div id="gallery">
        <div class="wrapper-text-home">
            <div class="text-home">
                <h1>Welcome to my WebSite/Portfolio</h1>
                <p class="lead">Go to Shares page</p>
                <a href="<?php echo ROOT_PATH; ?>shares">Take a look</a>
            </div>
        </div>
        <img class="mySlides one" src="assets/img/3.jpg" alt="">
        <img class="mySlides two" src="assets/img/2.jpg" alt="">
        <img class="mySlides three" src="assets/img/1.jpg" alt="">

        <button class="left" onclick="plusDivs(-1)"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
        <button class="right" onclick="plusDivs(1)"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div> 
</main>  
<section>
    <div id="about-me" class="red-cube">
        <div class="left">
            <div class="img">

            </div>
            <ul id="skills">
                <li><i class="fas fa-suitcase"></i>Web Developer</li>
                <li><i class="fas fa-home"></i>Veliko Tarnovo, Bulgaria</li>
                <li><i class="fas fa-envelope"></i>niksan870@abv.bg</li>
                <li><i class="fas fa-phone"></i>088 930 2605</li>
            </ul>
            <hr>
            <div id="skill-bar">
                <i class="fas fa-cog"></i><h1>Skills</h1>

                <p>HTML</p>
                <div class="container">
                    <div class="skills html">90%</div>
                </div>

                <p>CSS</p>
                <div class="container">
                    <div class="skills css">75%</div>
                </div>

                <p>JavaScript</p>
                <div class="container">
                    <div class="skills js">65%</div>
                </div>

                <p>PHP</p>
                <div class="container">
                    <div class="skills php">80%</div>
                </div>
            </div>
        </div>
        <div class="right" id="aboutMe">
            <h1>About me</h1>
            <p>Hi, I am Nikola Pashov - a Web Developer from Veliko Tarnovo.</p>

            <p> I am a first year student(part time) in Technical University of Gabrovo.
                I am nineteen years old, determined to made up a career in IT field, and dead serious about my given work.
                I have a lot of experience with clients, because of my formal job as Hotel receptionist.
                Hence my social skills have become so highly developed.
                I have been developing Web Sites for more than half a year and 
                I am sure if you hire me that I will be the asset you have been waiting for so long - determined, passionate, honest  
                and friendly, with a lot of desire to learn!</p>
            <p>Here's my CodeWars account: <a target="_blank" href="https://www.codewars.com/users/niksan870">niksan870</a>.</p>
            <br />
            <br />
            <small id='skillz'>HTML, HTML5, CSS, CSS3, SASS, JavaScript, Jquery, PHP, MySQL</small>

        </div>
    </div>
</section> 

<section id="projects">
    <div id="h2-projects"><h2 >Projects</h2></div>
    <div class="posts">
        <h4 id="html">HTML/CSS<i class="fas fa-arrow-right"></i></h4>
        <div class="box HTML-CSS">
            <div class="post">
                <img src="assets/img/projectPic1.png" alt="Proect 1">
                <a href="assets/Projects/HTML_CSS1/index.html" target="_blank"> <div class="post-s">
                        <h2>New York Times</h2>
                    </div>
                </a>
            </div>
            <h3>Layout</h3>
            <p>Responsive Design  <i class="fas fa-times" style="color: #fc3535;"></i></p>
            <p>Preferable width: 1349px</p>
        </div>
        <div class="box HTML-CSS">
            <div class="post">
                <img src="assets/img/projectPic2.png" alt="Proect 1">
                <a href="assets/Projects/HTML_CSS2/index.html" target="_blank"><div class="post-s">
                        <h2>TNW</h2>
                    </div>
                </a>
            </div>
            <h3>Layout</h3>
            <p>Responsive Design  <i class="fas fa-check"></i></p>
        </div>
        <div class="box HTML-CSS">
            <div class="post">
                <img src="assets/img/projectPic3.png" alt="Proect 1">
                <a href="assets/Projects/HTML_CSS3/index.html" target="_blank"><div class="post-s">
                        <h2>Hover</h2>
                    </div>    
                </a>
            </div>
            <h3>Layout</h3>
            <p>Responsive Design  <i class="fas fa-times" style="color: #fc3535;"></i></p>
            <p>Preferable width: 1349px</p>
        </div>
    </div>
    <div class="posts">
        <h4 id="js">Javascript/jQuery<i class="fas fa-arrow-right"></i></h4>
        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject1.png" alt="Proect 1">
                <a href="assets/Projects/JS1/index.html" target="_blank"><div class="post-s">
                        <h2>Wikipedia API search</h2>
                    </div>
                </a>
            </div>
            <h3>Project: 1</h3>
        </div>
        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject2.png" alt="Proect 1">
                <a href="assets/Projects/JS2/index.html" target="_blank"><div class="post-s">
                        <h2>Weather App</h2>
                    </div>
                </a>
            </div>
            <h3>Project: 2</h3>
        </div>
        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject3.png" alt="Proect 1">
                <a href="assets/Projects/JS3/index.html" target="_blank"><div class="post-s">
                        <h2>Weather App</h2>
                    </div>
                </a>
            </div>
            <h3>Project: 3</h3>
        </div>

        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject4.png" alt="Proect 1">
                <a href="assets/Projects/JS4/index.html" target="_blank"><div class="post-s">
                        <h2>Weather App</h2>
                    </div>
                </a>
            </div>
            <h3>Project: 4</h3>
        </div>
        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject5.png" alt="Proect 1">
                <a href="assets/Projects/JS5/index.html" target="_blank"><div class="post-s">
                        <h2>Drum Kit</h2>
                    </div>    
                </a>
            </div>
            <h3>Project: 5</h3>
        </div>
        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject6.png" alt="Proect 1">
                <a href="assets/Projects/JS6/index.html" target="_blank"><div class="post-s">
                        <h2>Updating CSS variables with JS</h2>
                    </div>   
                </a>
            </div>
            <h3>Project: 6</h3> 
        </div>
        <div class="box JS">
            <div class="post">
                <img src="assets/img/JSProject7.png" alt="Proect 1">
                <a href="assets/Projects/JS7/index.html" target="_blank"> <div class="post-s">
                        <h2>Breack Out</h2>
                    </div>    
                </a>
            </div>
            <h3>Project: 7</h3>
        </div>
    </div>
</section>

<section class="map-section">
    <h3><i class="fas fa-arrow-left"></i> My current location</h3>
    <div id="map"></div> 
</section>





<div class="contact-form">
    <form method="post" action="" id="contact-form">
        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
        <input type="email" id="name" name="email" class="form-control" placeholder="Your E-mail" required>
        <textarea name="message" class="form-control" placeholder="Message" rows="4" required>
        </textarea>
        <input type="submit" name="submit" class="form-control submit" value="Send Message">
    </form>
</div>
