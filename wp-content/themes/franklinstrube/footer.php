<?php
/**
 * Copyright 2013 Franklin P. Strube
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
?>
            <div class="push"></div>
        </div>
        <div id="footer" class="hcard">
            <footer>
                <div class="about">
                    <section>
                        <h4><a name="about">Who is <em>strube</em>?</a></h4>
                        <img class="photo grayscale" src="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/images/me.jpg" alt="avatar" width="100" />
                        <!--p>I am a web developer living and working in Alexandria, VA. I have been working in the web industry for four years. In addition to programming the web, I enjoy playing endless hours of Civilization II (sad ... I know).</p-->
                        <p>Contrary to what the header of this page suggests, <strong>strube</strong> is not a computer program. Rather, it is the surname of Franklin P. Strube, <a href="/">decorated</a> web developer and <a href="http://www.reddit.com/r/maille" target="_blank" title="(the kind for your torso, not your inbox)">chainmail</a> creator.</p>
                        <p>Frank spends his daylight hours working with open-source tools to build complex web software and middleware. He is currently:</p>
                        <dl>
                            <dt>Living In</dt>
                            <dd>Alexandria, VA</dd>

                            <dt>Working At</dt>
                            <dd><a href="http://globalthinking.com">Global Thinking</a> as a Senior Web Developer</dd>

                            <dt>Learning About</dt>
                            <!--dd>Python GUI programming, Mobile development, Raspberry Pi…</dd-->
                            <dd>Responsive design, Raspberry Pi</dd>

                            <dt>Trained At</dt>
                            <dd>Rochester Institute of Technology<br />
                                B.S. in Networking, Security, and System Administration<br />
                                Minors in Economics and Entrepreneurship
                            </dd>
                        </dl>
                    </section>
                </div>
                <a name="contact"></a>
                <div class="social-media">
                    <a class="github" title="GitHub: fstrube" href="http://github.com/fstrube" rel="me">fstrube</a>
                    <a class="forrst" title="Forrst: fstrube" href="http://forrst.com/people/fstrube" rel="me">fstrube</a>
                    <a class="twitter" title="Twitter: @strube" href="http://twitter.com/strube" rel="me">@strube</a>
                    <a class="linkedin" title="LinkedIn: fstrube" href="http://linkedin.com/in/fstrube" rel="me">fstrube</a>
                </div>
                <div class="copyright">
                    &copy; 2013
                    <span class="n">
                        <span class="given-name">Franklin</span>
                        <span class="additional-name">P.</span>
                        <span class="family-name">Strube</span>
                    </span>
                    <a class="url" href="http://franklinstrube.com">//franklinstrube.com</a>
                </div>
            </footer>
        </div>

        <!--
        <div class="debug">
            <div class="media-query-portrait"></div>
            <div class="media-query-landscape"></div>
            <div class="media-query-1000"></div>
            <div class="media-query-500"></div>
            <div class="media-query-320"></div>
        </div>
        -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/js/vendor/prism.min.js"></script>
        <script src="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/js/plugins.js"></script>
        <script src="<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>/js/main.js"></script>
        <?php wp_footer() ?>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script-->
        <script type="text/javascript">
            var theme_path = "<?php echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH); ?>";
            (new Image()).src = theme_path + "/images/icons/gray/Twitter.png";
            (new Image()).src = theme_path + "/images/icons/gray/Github.png";
            (new Image()).src = theme_path + "/images/icons/gray/LinkedIn.png";
            (new Image()).src = theme_path + "/images/icons/gray/Forrst.png";
            (new Image()).src = theme_path + "/images/icons/gray/Feed.png";
            (new Image()).src = theme_path + "/images/icons/color/Twitter.png";
            (new Image()).src = theme_path + "/images/icons/color/Github.png";
            (new Image()).src = theme_path + "/images/icons/color/LinkedIn.png";
            (new Image()).src = theme_path + "/images/icons/color/Forrst.png";
            (new Image()).src = theme_path + "/images/icons/color/Feed.png";
        </script>
    </body>
</html>
