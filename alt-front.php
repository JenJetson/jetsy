<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jen Jetson</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Jen Jetson">
    <meta name="author" content="http://jenjetson.com">
    <meta name="keywords" content="Resume, Responsive, Template, Free, Skillset">
    <script src="https://kit.fontawesome.com/17d1f167a2.js" crossorigin="anonymous"></script>

</head>
<style>
    html, body, .page {
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
        transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
        -webkit-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
        -moz-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
        -o-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
        color: #fff;
        overflow: hidden;
    }

    * {
        font-family: 'open sans', 'lato', 'helvetica', sans-serif;
    }

    .page {
        position: absolute;
    }

    #p1 {
        left: 0;
    }

    #p2, #p3, #p4, #p5 {
        left: 200%;
    }

    #p1 {
        background: #ff581a;
    }

    #p2 {
        background: rebeccapurple;
    }

    #p3 {
        background: #f53933;
    }

    #p4 {
        background: deeppink;
    }

    #p5 {
        background: rgba(0, 0, 128, 1);
    }

    #contact-home:target #p2,
    #wp-site:target #p3,
    #code:target #p4,
    #resume:target #p5 {
        transform: translateX(-190%);
        -webkit-transform: translateX(-190%);
        -moz-transform: translateX(-190%);
        -o-transform: translateX(-190%);
        transition-delay: .4s !important;
    }

    #contact-home:target #p1,
    #wp-site:target #p1,
    #code:target #p1,
    #resume:target #p1 {
        background: black;
    }

    #contact-home:target #p1 .icon,
    #wp-site:target #p1 .icon,
    #code:target #p1 .icon,
    #resume:target #p1 .icon {
        -webkit-filter: blur(3px);
    }

    .icon {
        color: #fff;
        font-size: 32px;
        display: block;
    }

    ul .icon:hover {
        opacity: 0.5;
    }

    .page .icon .title {
        line-height: 1.8;
    }

    #contact-home:target ul .icon,
    #wp-site:target ul .icon,
    #code:target ul .icon,
    #resume:target ul .icon {
        transform: scale(.6);
        -webkit-transform: scale(.6);
        -moz-transform: scale(.6);
        -o-transform: scale(.6);
        transition-delay: .25s;
    }

    #contact-home:target
    #wp-site:target
    #code:target
    #code:target {
        transform: scale(1.2) !important;
        -webkit-transform: scale(1.2) !important;
        -moz-transform: scale(1.2) !important;
        -o-transform: scale(1.2) !important;
    }

    ul {
        position: fixed;
        z-index: 1;
        top: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        height: 280px;
        width: 10%;
        padding: 0;
        text-align: center;
    }

    #home-menu li{
        font-size: .95em;
        color: white;
    }

    #home-menu .icon {
        margin: 30px 0;
        transition: all .5s ease-out !important;
        -webkit-transition: all .5s ease-out;
        -moz-transition: all .5s ease-out;
        -o-transition: all .5s ease-out;
    }

    a {
        text-decoration: none;
    }


    .title, .hint {
        display: block;
    }

    .title {
        font-size: 32px;
    }

    .hint {
        font-size: 17px;
    }

    #p4 .hint {
        display: inherit !important;
    }

    .hint a {
        color: rgba(255, 255, 255, .9);

        transition: all 250ms ease-out;
        -webkit-transition: all 250ms ease-out;
        -moz-transition: all 250ms ease-out;
        -o-transition: all 250ms ease-out;
    }

    .hint {
        color: rgba(255, 255, 255, .7);
    }

    .hint a:hover {
        color: #FFF;
    }

    .line-trough {
        text-decoration: line-through;
    }

    .logo {
        display: block;
        margin: auto;
    }

    .page .icon {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 10%;
        left: 0;
        width: 200px; /* adjust here kari for main content width*/
        /*height: 170px;*/
        height: auto;
        padding-top: 150px;
        margin: auto;
        text-align: center;
        font-size: 80px;
        line-height: 1.3;
        transform: translateX(360%);
        -webkit-transform: translateX(360%);
        -moz-transform: translateX(360%);
        -o-transform: translateX(360%);
        transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
        -webkit-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
        -moz-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
        -o-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
    }


    .page#p1 .icon {
        transform: translateX(10%) !important;
    }

    #contact-home:target .page#p2 .icon,
    #wp-site:target .page#p3 .icon,
    #code:target .page#p4 .icon,
    #resume:target .page#p5 .icon {
        transform: translateX(0) !important;
        -webkit-transform: translateX(0) !important;
        -moz-transform: translateX(0) !important;
        -o-transform: translateX(0) !important;
        transition-delay: 1s;
    }

    .page#p1 .icon {
        height: auto;
        padding-top: 200px;
    }


    .page#p3 .icon {
        height: auto;
        padding-top: 80px;
        color: rgba(0, 191, 255, 1);
    }

    #p4 .icon {
        height: auto;
        padding-top: 100px;
    }

    #p5 .icon {
        height: auto;
        padding-top: 50px;
    }

    #home-menu a{
        color:white;
    }
    #home-menu a:hover{
         color:lightskyblue;
     }


</style>


<body>
<div class="ct" id="home">
    <div class="ct" id="contact-home">
        <div class="ct" id="wp-site">
            <div class="ct" id="code">
                <div class="ct" id="resume">
                    <ul id="home-menu">
                        <a href="#home">
                            <li class="icon fas fa-fighter-jet" title="Home"></li>
                        </a>
                        <a href="#resume">
                            <li class="icon fas fa-file" title="Resume"></li>
                        </a>
                        <a href="#code">
                            <li class="icon fas fa-code" title="Github"></li>
                        </a>
                        <a href="#wp-site">
                            <li class="icon fab fa-wordpress" title="WP Sites"></li>
                        </a>
                        <a href="#contact-home">
                            <li class="icon fas fa-envelope-open" title="Contact"></li>
                        </a>
                        <a href="/bio">
                            <li class="fas fa-female" title="Bio" style="color: white"></li>
                        </a>


                    </ul>
                    <div class="page" id="p1">
                    <?php $slogan = get_bloginfo('description'); ?>
                        <section class="icon"><?php the_custom_logo(); ?>
                            <span class="title"><?php bloginfo('name'); ?>
                                <span class="hint"><?php echo $slogan; ?></span>
                        </section>

                    </div>
                    <div class="page" id="p2">
                        <section class="icon fas fa-envelope-open"><span class="title">Contact Me</span>
                            <p class="hint">kc at jenjetson dot com</p>
                            <p class="hint">702.530.5755</p>
                        </section>
                    </div>
                    <div class="page" id="p3">
                        <section class="icon fab fa-wordpress">
                            <!--                            <span class="hint">WordPress Sites</span>-->


                            <p class="hint"><a href="http://howtobathbombs.com/wp"
                                               target="_blsank">HowToBathBombs.com</a></p>
                            <p class="hint"><a href="http://www.ahernaustralia.com.au/" target="_blank">Ahern
                                    Australia</a></p>
                            <p class="hint"><a href="https://www.aherncanada.ca" target="_blank">Ahern
                                    Canada</a></p>
                            <p class="hint"><a href="http://www.axtransportation.com/"
                                               target="_blank">AXTransportation</a></p>
                            <p class="hint"><a href="http://www.rhinosturf.com"
                                               target="_blank">Rhino's Turf</a></p>


                            <p class="hint"><a href="http://jenjetson.com/wp" target="_blank">Jetsy WordPress
                                    Template</a></p>
                        </section>


                    </div>
                    <div class="page" id="p4">
                        <!--                        <section class="icon fas fa-code">-->
                        <section class="icon fab fa-java">

                            <span class="title">Code</span>
                            <p class="hint">

                                <a href="https://github.com/JenJetson?tab=repositories" target="_blank">GitHub
                                    Repository</a></p>
                            <hr style="color:white">

                            <p class="hint">

                                <a href="https://github.com/JenJetson?tab=repositories" target="_blank"><img
                                            src="/github-logo.png" width="50" height="50" alt="Github link"></a>
                            </p>

                        </section>

                    </div>
                    <div class="page" id="p5">
                        <section class="icon"><img src="/picture.png" alt="picture" width="100" height="100">
                            <span class="title" style="color:darkorange">Resume</span>
                            <p class="hint">I am a seasoned WordPress / PHP developer who is also interested in Java
                                development.</p>
                            <p class="hint">I am based in Las Vegas and am also open to re-location or remote work.
                            <p class="hint" style="color:darkorange">Get a copy of my resume <a href="/wp/resume.php"
                                                                                                target="_blank">here.</a>
                            <p>

                            </p>
                        </section>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>