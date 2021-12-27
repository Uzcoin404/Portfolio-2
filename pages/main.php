<?
include_once('./components/db.php');
$isMyProfile = $_SESSION['username'] && !$getId ? true : false;
$myProfile = getUser($_SESSION['id']);
$comments = getComments();
$sizeComments = count($comments);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="styles/all.min.css">
    <link rel="stylesheet" href="styles/color.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="icon" href="img/icon.jpg">
</head>
<body>

    <main class="main day">
        
        <div class="loader">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
                <symbol id="wave">
                <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
                <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
                <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
                <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
                </symbol>
            </svg>
            <div class="box">
                <div class="percent">
                <div class="percentNum" id="count">0</div>
                <div class="percentB">%</div>
                </div>
                <div id="water" class="water">
                <svg viewBox="0 0 560 20" class="water_wave water_wave_back">
                    <use xlink:href="#wave"></use>
                </svg>
                <svg viewBox="0 0 560 20" class="water_wave water_wave_front">
                    <use xlink:href="#wave"></use>
                </svg>
                </div>
            </div>
        </div>

        <div class="delete_alert">
            <p class="delete_alert_text">Do you really want to delete this comment</p>
            <a href="#" class="btn delete_alert_btn">Yes</a>
        </div>

        <header class="header" id="home">
            <?include_once('nav.php');?>
            <div class="header_blog">
                <div class="container_glass">
                    <div class="header_content">
                        <h2 class="header_text">Hello, I am</h2>
                        <h1 class="header_title">Suyunbek</h1>
                        <div class="header_info">
                            <div class="header_info_content"><span>Frontend Developer</span><span>Backend Developer</span></div>
                        </div>
                        <a href="#about" class="btn header_btn">About me</a>
                        <div class="social_media">
                            <a href="https://t.me/MrUzcoin" class="messangers">
                                <i class="fab fa-telegram"></i>
                                <span class="tooltiptext">MrUzcoin</span>
                            </a>
                            <a href="https://twitter.com/MrUzcoin" class="messangers">
                                <i class="fab fa-twitter"></i>
                                <span class="tooltiptext">MrUzcoin</span>
                            </a>
                            <a href="https://www.facebook.com/suyunbek.saydazimov.18/" class="messangers">
                                <i class="fab fa-facebook"></i>
                                <span class="tooltiptext">Suyunbek</span>
                            </a>
                        </div>
                    </div>
                    <img src="img/illustration2.png" alt="" class="header_img">
                </div>
            </div>
        </header>

        <div class="main_content">

            <section class="about" id="about">
                <div class="container">
                    <h2 class="title about_title">About <span>me</span></h2>
                    <div class="about_content">
                        <div class="about_box about_image" data-aos="fade-right" data-aos-duration="1000">
                            <img src="img/about_img.jpeg" alt="" class="about_img">
                        </div>             
                        <div class="about_box about_cv" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
                            <h3 class="content_titles about_title">Hey there! I am <span>Suyunbek (Uzcoin)</span></h3>
                            <p class="about_text">Hardworking and passionate job seeker with strong organizational skills eager to secure entry-level Middle position in developer environment. Ready to help team achieve company goals. Friendly student available for weekend, evening and holiday shifts.<span class="read_more"> Considered hardworking, punctual and driven. I want to increase my work experience and meet more friends and teams.</span><span class="read_more_btn"> Read more ...</span></p>
                        </div>
                        <div class="about_box" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">
                            <h3 class="content_titles about_title">My <span>CV</span></h3>
                            <p class="about_text">I am Saydazimov Suyunbek Zokirjon o'g'li, and I'm a student at IT Center.   In March I began Studying in IT Center. Continuing education in Backend course Completed professional development in Frontend course Received IT Center certificate<span class="read_more"> Although I have little experience in programming, I keep moving every day and I control my past. Coding is my main occupation and my profession. </span><span class="read_more_btn"> Read more ...</span></p>
                            <div class="about_buttons">
                                <a href="files/mycv.pdf" class="btn about_btn cv_view" >View full CV</a>
                                <a href="files/mycv.pdf" class="btn about_btn cv_download" download>Download CV</a>
                            </div>
                        </div>
                        <div class="iframe_wrap">
                            <iframe src="files/mycv.pdf" width="100%" height="100%" frameborder="0" class="fixedPdf"></iframe>
                        </div>
                    </div>
                </div>
            </section>

            <section class="skills" id="skills">
                <div class="container_glass">
                    <h2 class="title skills_title">My <span>Skills</span></h2>
                    <div class="skills_content">
                        <div class="skills_cards">
                            <div class="skills_card" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="200">
                                <div class="skills_img_blog">
                                    <i class="fas fa-pencil-ruler"></i>
                                    <p class="skills_card_text">I also have skills working with Photoshop, Figma, and Microsoft Office programs.</p>
                                </div>
                                <h4 class="skills_card_title">Web Design</h4>
                            </div>
                            <div class="skills_card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                <div class="skills_img_blog">
                                    <i class="fas fa-laptop-code"></i>
                                    <p class="skills_card_text">I know HTML, CSS, JS, JQuery, Bootstrap, Github, Gulp, Pug, SCSS, Php, Mysql, JAVA Now I am learning Wordpress.</p>
                                </div>
                                <h4 class="skills_card_title">Web Development</h4>
                            </div>
                            <div class="skills_card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="100">
                                <div class="skills_img_blog">
                                    <i class="fas fa-server"></i>
                                    <p class="skills_card_text">Now all my attention is focused on the backend and I am doing interesting projects with it</p>
                                </div>
                                <h4 class="skills_card_title">Backend</h4>
                            </div>
                        </div>
                        <div class="skills_box">
                            <div class="skills_app" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                                <h2 class="title skills_app_title">Uzcoin</h2>
                                <img src="img/icon_vsCode.png" alt="" class="skills_img1 skills_app_img">
                                <img src="img/icon_figma.png" alt="" class="skills_img2 skills_app_img">
                                <img src="img/icon_gulp.png" alt="" class="skills_img3 skills_app_img">
                                <img src="img/icon_IJ.png" alt="" class="skills_img4 skills_app_img">
                                <img src="img/icon_photoshop.png" alt="" class="skills_img5 skills_app_img">
                                <img src="img/icon_github.png" alt="" class="skills_img6 skills_app_img">
                            </div>
                            <div class="skills_about" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                                <h2 class="content_titles skills_about_title">About My <span>Skills</span></h2>
                                <p class="skills_about_text">Although I have little experience in programming, I keep moving every day and I control my past. Coding is my main occupation and my profession.
                                    I know HTML, CSS, JS, JQuery, Bootstrap, Github, Gulp, Pug, SCSS, Php, Mysql, JAVA Now I am learning Wordpress. I also have skills working with Photoshop, Figma, and Microsoft Office programs.
                                    My main focus is Frontend. I think I can work on big projects and teams. I don’t have a lot of work experience but I’ve done a lot of individual projects and team projects during my studies You can see this through my GitHub profile. Through Github you can see my two portfolios of my projects and teamwork.</p>
                                <a href="https://uzcoin404.github.io/Portfolio-1/" class="btn skills_btn" target="_blank">My another Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="projects" id="projects">
                <div class="container">
                    <h2 class="title projects_title">My <span>Projects</span></h2>
                    <div class="projects_content" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="100">
                        <div class="glide">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <li class="glide__slide teamwork">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Team Work</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">Our little Project! The main goal of the project is to gain teamwork experience. The site made with Ulanbek Jahongir and Suyunbek</p>
                                            <a href="https://uzcoin404.github.io/TeamWork/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide php_website">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Php Website</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">We will continue to explore the backend! in This site you can see Awesome Login registration and Realtime comments system | Made with IT Center Group Buloqboshi</p>
                                            <a href="http://uzcoin.epizy.com/?route=main" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide vue_cinema">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Vue-cinema</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">Awesome template!!! We will continue to explore the Gulp! The site build with Pug and SCSS | Made with IT Center Group</p>
                                            <a href="https://uzcoin404.github.io/Vue-Cinemas/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide video_player">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Video player</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">simple and functional video-player You can video change playback speed and volume. Videoplayer have remaining and wasted time, pause, stop, timebar and download Button.</p>
                                            <a href="https://uzcoin404.github.io/videoPlayer/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide galleria">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Galleria</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">My creative and productive Site in this site use Css grid and this is Awesome for Gallery</p>
                                            <a href="https://uzcoin404.github.io/Galleria/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide music_site">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Music site</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">Who like Musics ? let's Discover this Site Site have functional music player made by Uzcoin</p>
                                            <a href="https://uzcoin404.github.io/Music-site/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide clock">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Clock</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">Analog clock & Stopwatch. Awesome design clock and stopwatch this is Beautiful. made with js by Uzcoin</p>
                                            <a href="https://uzcoin404.github.io/Clock/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide food100">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Fodd100</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">Let's buy Some foods Amazing site for delivry company simple and easy buy products. made with js by Uzcoin</p>
                                            <a href="https://uzcoin404.github.io/Food100/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                    <li class="glide__slide calculator">
                                        <div class="glide_header">
                                            <h2 class="title glide_title">Calculator</h2>
                                            <div class="glide_items">
                                                <span class="glide_icons"><i class="far fa-heart love_icon" id="animateIcon"></i></span>
                                                <span class="glide_icons"><i class="fas fa-share-alt"></i></span>
                                                <span class="glide_icons"><i class="far fa-comment-dots" id="animateIcon"></i></span>
                                            </div>
                                        </div>
                                        <div class="glide_content">
                                            <p class="glide_text">Let's Calculate something. fast and easy Calculator and Calculator can work with keyboard! made with js by Uzcoin</p>
                                            <a href="https://uzcoin404.github.io/Calculator/" class="btn glide_btn" target="_blank">Review</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-chevron-left"></i></button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-chevron-right"></i></button>
                              </div>
                            <div class="glide__bullets" data-glide-el="controls[nav]">
                                <button class="glide__bullet" data-glide-dir="=0"></button>
                                <button class="glide__bullet" data-glide-dir="=1"></button>
                                <button class="glide__bullet" data-glide-dir="=2"></button>
                                <button class="glide__bullet" data-glide-dir="=3"></button>
                                <button class="glide__bullet" data-glide-dir="=4"></button>
                                <button class="glide__bullet" data-glide-dir="=5"></button>
                                <button class="glide__bullet" data-glide-dir="=6"></button>
                                <button class="glide__bullet" data-glide-dir="=7"></button>
                                <button class="glide__bullet" data-glide-dir="=8"></button>
                              </div>
                          </div>
                    </div>
                </div>
            </section>

            <section class="service" id="service">
                <div class="container_glass">
                    <h2 class="title service_title">My <span>service</span></h2>
                    <div class="service_cards">
                        <div class="service_card" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="service_card_main">
                                <img src="img/service3.png" alt="" class="service_card_img">
                                <p class="learn_more">Learn more <i class="fas fa-chevron-right"></i></p>
                            </div>
                            <div class="service_card_content">
                                <h3 class="content_titles service_card_title">Fast <span>code</span></h3>
                                <p class="service_card_text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quas rem aperiam adipisci, optio earum officiis veritatis ex molestiae provident tempora, quos, explicabo molestias. Voluptatem.</p>
                                <p class="learn_back"><i class="fas fa-chevron-left"></i> Back</p>
                            </div>
                        </div>
                        <div class="service_cards_content">
                            <div class="service_card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="500">
                                <div class="service_card_main">
                                    <img src="img/service2.png" alt="" class="service_card_img">
                                    <p class="learn_more">Learn more <i class="fas fa-chevron-right"></i></p>
                                </div>
                                <div class="service_card_content">
                                    <h3 class="content_titles service_card_title">Awesome <span>design</span></h3>
                                    <p class="service_card_text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quas rem aperiam adipisci, optio earum officiis veritatis ex molestiae provident tempora, quos, explicabo molestias. Voluptatem.</p>
                                    <p class="learn_back"><i class="fas fa-chevron-left"></i> Back</p>
                                </div>
                            </div>
                            <div class="service_card" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="500">
                                <div class="service_card_main">
                                    <img src="img/service1.png" alt="" class="service_card_img">
                                    <p class="learn_more">Learn more <i class="fas fa-chevron-right"></i></p>
                                </div>
                                <div class="service_card_content">
                                    <h3 class="content_titles service_card_title">Amazing <span>Website</span></h3>
                                    <p class="service_card_text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium quas rem aperiam adipisci, optio earum officiis veritatis ex molestiae provident tempora, quos, explicabo molestias. Voluptatem.</p>
                                    <p class="learn_back"><i class="fas fa-chevron-left"></i> Back</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact" id="contact">
                <div class="container_glass">
                    <h2 class="title contact_title">Contact <span>me</span></h2>
                    <div class="contact_content">
                        <div class="contact_me">
                            <h3 class="content_titles contact_content_title" data-aos="fade-down" data-aos-duration="1000">Get in <span>touch</span></h3>
                            <p class="contact_content_text" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">If you have a questions or suggestion please feel free to drop me a line. Contact me on my social media profiles or You can write comment for me here. I always online (telegram) send me a message and Of course I reply your message</p>
                            <div class="contact_content_box" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                                <span class="contact_box_icon"><i class="fas fa-envelope"></i></span>
                                <div class="contact_box_info">
                                    <h5 class="contact_box_title">Email</h5>
                                    <a href="https://Uzcointg@gmail.com" class="contact_box_link" target="_blank">Uzcointg@gmail.com</a>
                                </div>
                            </div>
                            <div class="contact_content_box" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
                                <span class="contact_box_icon"><i class="fas fa-map-marker-alt"></i></span>
                                <div class="contact_box_info">
                                    <h5 class="contact_box_title">Address</h5>
                                    <a href="https://goo.gl/maps/XfgYswd8KoFmTBLE6" class="contact_box_link" target="_blank">Andijan, Uzbekistan 170506</a>
                                </div>
                            </div>
                            <div class="contact_content_box" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                                <span class="contact_box_icon"><i class="fab fa-telegram"></i></span>
                                <div class="contact_box_info">
                                    <h5 class="contact_box_title">Telephone</h5>
                                    <a href="https://t.me/MrUzcoin" class="contact_box_link" target="_blank">+998906225022</a>
                                </div>
                            </div>
                            <div class="social_media">
                                <a href="https://t.me/MrUzcoin" class="messangers">
                                    <i class="fab fa-telegram"></i>
                                    <span class="tooltiptext">MrUzcoin</span>
                                </a>
                                <a href="https://twitter.com/MrUzcoin" class="messangers">
                                    <i class="fab fa-twitter"></i>
                                    <span class="tooltiptext">MrUzcoin</span>
                                </a>
                                <a href="https://www.facebook.com/suyunbek.saydazimov.18/" class="messangers">
                                    <i class="fab fa-facebook"></i>
                                    <span class="tooltiptext">Suyunbek</span>
                                </a>
                            </div>
                        </div>
                        <div class="send_comment">
                            <h3 class="content_titles send_comment_title" data-aos="fade-up" data-aos-duration="1000">Write & See <span>Comments</span></h3>
                            <form action="" class="comments_form">
                                <label for="job" class="comments_label">Your job</label>
                                <div class="select" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                    <button type="button" name="job" id="job" class="select_input">Not selected</button>
                                    <div class="options">
                                        <p class="options_item active">Web Developer</p>
                                        <p class="options_item">Web Designer</p>
                                    </div>
                                </div>
                                <label for="country" class="comments_label">Your Country</label>
                                <div class="select" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <button type="button" name="country" id="country" class="select_input">Not selected</button>
                                    <div class="options">
                                        <p class="options_item active">Uzbekistan</p>
                                        <p class="options_item">Russia</p>
                                    </div>
                                </div>
                                <label for="comment" class="comments_label">Write comment</label>
                                <div class="comment_textarea" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <textarea name="comment" class="comment_area" maxlength="300" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn comment_btn" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="comments" id="comments">
                <div class="container_glass">
                    <h2 class="title comments_title">What <span>my clients</span> Say ?</h2>
                    <div class="comments_content">
                    <? for ($i=$sizeComments-1; $i > 0; $i--): ?>
                        <div class="comment">
                            <div class="comment_img_blog">
                                <a href="#"><img src="../img/about_img.jpeg" alt="" class="comment_img" title="View profile"></a>
                            </div>
                            <div class="comment_body">
                                <div class="comment_item">
                                    <p class="comment_text"><?= $comments[$i]['comment']?></p>
                                    <form action="" method="post" class="comment_edit_form" style="display: none;">
                                        <textarea name="comment" class="comment_area" placeholder="Message" required></textarea>
                                        <div class="edit_comment_buttons">
                                            <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                                            <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                                        </div>
                                    </form>
                                    <div class="comment_functions" style="display: <?= $isMyProfile ? 'flex' : 'none'?>;">
                                        <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                                        <a href="#" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                                    </div>
                                </div>
                                <div class="comment_footer">
                                    <a href="#" class="comment_name" title="View profile">Suyunbek</a>
                                    <p class="comment_date" title="Comment created Date">2021-10-26 09:42</p>
                                </div>
                            </div>
                        </div>
                    <?endfor;?>
                    </div>
                    <a href="#" class="btn load_more" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Load more</a>
                </div>
            </section>

        </div>

        <footer class="footer">
            <div class="container">
                <div class="footer_nav">
                    <ul class="foot_list"><span>Pages</span>
                        <li><a href="#home" class="foot_link">Home</a></li>
                        <li><a href="#about" class="foot_link">About</a></li>
                        <li><a href="#skills" class="foot_link">Skills</a></li>
                        <li><a href="#projects" class="foot_link">Projects</a></li>
                        <li><a href="#service" class="foot_link">Service</a></li>
                        <li><a href="#contact" class="foot_link">Contact</a></li>
                        <li><a href="#comments  " class="foot_link">Comments</a></li>
                    </ul>
                    <ul class="foot_list"><span>Projects</span>
                        <li><a href="#" class="foot_link">Team-Work</a></li>
                        <li><a href="#" class="foot_link">Vue-cinema</a></li>
                        <li><a href="#" class="foot_link">Music site</a></li>
                        <li><a href="#" class="foot_link">Videoplayer</a></li>
                        <li><a href="#" class="foot_link">Calculator</a></li>
                        <li><a href="#" class="foot_link">Php Website</a></li>
                    </ul>
                    <ul class="foot_list"><span>Contact me</span>
                        <li><a href="https://Uzcointg@gmail.com" class="foot_link">Uzcointg@gmail.com</a></li>
                        <li><a href="https://goo.gl/maps/XfgYswd8KoFmTBLE6" class="foot_link">Andijan, Uzbekistan 170506</a></li>
                        <li><a href="https://t.me/MrUzcoin" class="foot_link">+998906225022</a></li>
                    </ul>
                    <ul class="foot_list"><span>Social media</span>
                        <li><a href="/" class="nav_logo"><img src="img/icon.jpg" alt="" class="logo"><p class="logo_text">Uzcoin</p></a></li>
                        <p class="foot_text">Fast, Secure, simple, Perfect design, Glassmorphism Landing page</p>
                        <div class="social_media">
                            <a href="https://t.me/MrUzcoin" class="messangers">
                                <i class="fab fa-telegram"></i>
                                <span class="tooltiptext">MrUzcoin</span>
                            </a>
                            <a href="https://twitter.com/MrUzcoin" class="messangers">
                                <i class="fab fa-twitter"></i>
                                <span class="tooltiptext">MrUzcoin</span>
                            </a>
                            <a href="https://www.facebook.com/suyunbek.saydazimov.18/" class="messangers">
                                <i class="fab fa-facebook"></i>
                                <span class="tooltiptext">Suyunbek</span>
                            </a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="footer_foot">
                <div class="container">
                    <div>Copyright <i class="far fa-copyright"></i> 2010-2021 All rights reserved | Created by <a href="https://github.com/Uzcoin404" class="creator_name">UzCoin</a></div>
                </div>
            </div>
        </footer>
    </main>

    <script src="js/glide.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/script.js"></script>

</body>
</html>