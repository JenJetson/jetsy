<?php
//Alternative front page with flashy CSS
?>
<div class="ct" id="home">
    <div class="ct" id="contact">
        <div class="ct" id="wp-site">
            <div class="ct" id="code">
                <div class="ct" id="resume">
                    <ul id="home-menu">
                        <a href="#home">
                            <li class="icon2 fas fa-fighter-jet" title="Home"></li>
                        </a>
                        <a href="#resume">
                            <li class="icon2 fas fa-file" title="Resume"></li>
                        </a>
                        <a href="#code">
                            <li class="icon2 fas fa-code" title="Github"></li>
                        </a>
                        <a href="#wp-site">
                            <li class="icon2 fab fa-wordpress" title="WP Sites"></li>
                        </a>
                        <a href="#contact">
                            <li class="icon2 fas fa-envelope-open" title="Contact"></li>
                        </a>
                        <a href="/wp/bio/">
                            <li class="icon2 fas fa-female" title="Bio" style="color: white"></li>
                        </a>

                    </ul>
                    <div class="alt-page" id="p1">
                        <?php $slogan = get_bloginfo('description'); ?>
                        <section class="icon"><?php the_custom_logo(); ?>
                            <span class="title"><?php bloginfo('name'); ?>
                                <span class="hint"><?php echo $slogan; ?></span>
                        </section>

                    </div>
                    <div class="alt-page" id="p2">
                        <section class="icon fas fa-envelope-open"><span class="title">Contact Me</span>
                            <p class="hint">kc at jenjetson dot com</p>
                            <p class="hint">702.530.5755</p>
                        </section>
                    </div>
                    <div class="alt-page" id="p3">
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
                    <div class="alt-page" id="p4">
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
                    <div class="alt-page" id="p5">
                        <section class="icon"><img src="/picture.png" alt="picture" width="100" height="100">
                            <span class="title" style="color:darkorange">Resume</span>
                            <p class="hint">I am a seasoned WordPress / PHP developer who is also interested in Java
                                development.</p>
                            <p class="hint">I am based in Las Vegas and am also open to re-location or remote work.</p>
                            <p class="hint" style="color:darkorange">Get a copy of my resume
                                <a href="/wp/resume.php" target="_blank">here.</a>

                        </section>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


</div> <!--end alt-body -->
</html>