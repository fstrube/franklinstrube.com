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

/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
            <div role="sidebar" class="sidebar">
                <aside>
                    <div class="callout callout-tweet">
                        <h3>Tweet</h3>
                        <p>Is anybody else happy that @magento is leveraging the use of MySQL triggers in CE1.8 and EE1.13?</p>
                        <time datetime="2013-05-03 01:00-400">Friday, May 3, 2013</time>
                    </div>
                    <div class="callout callout-protip">
                        <h3>Protip</h3>
                        <h2>Proxying SSH Connections</h2>
                        <p>Have you ever had to connect to an SSH server that is behind some sort of firewall? Luckily, SSH makes connecting to these systems simple by allowing us to "proxy" through any command, even another SSH connection!</p>
                        <p><a href="https://coderwall.com/p/bhhvya">read more</a></p>
                    </div>
                    <div class="callout callout-tweet">
                        <h3>Tweet!</h3>
                        <p>@colinmollenhour Nice! Just got to the Excalibur and are now gorging at the buffet. Should be to M resort in time for the welcoming.</p>
                        <time datetime="2013-04-08 21:02-400">Monday, April 8th, 2013</time>
                    </div>
                    <div class="callout callout-tweet">
                        <h3>Tweet!</h3>
                        <p>On our way to Magento Imagine. Should land in about 6 hours. See you there? @colinmollenhour</p>
                        <time datetime="2013-04-08 13:49-400">Monday, April 8th, 2013</time>
                    </div>
                    <div class="callout callout-protip">
                        <h3>Protip</h3>
                        <h2>Best sudo alias ever</h2>
                        <p>Who doesn't love a good terminal alias? I was perusing some dotfile repos on Github when I came across this little gem...</p>
                        <p><a href="https://coderwall.com/p/pvteqw">read more</a></p>
                        <time datetime="2012-01-04 04:00-400">Wednesday, March 26th, 2013</time>
                    </div>
                    <div class="callout callout-snippet">
                        <h3>Snippet</h3>
                        <h2>Magento Javascript</h2>
                        <pre><code class="language-markup">&lt;?xml version="1.0"?&gt;
&lt;layout version="0.1.0"&gt;
    &lt;default&gt;
        &lt;reference name="head"&gt;
            &lt;action method="addJs"&gt;&lt;script&gt;lib/PIE.js&lt;/script&gt;&lt;/action&gt;
        &lt;/reference&gt;
    &lt;/default&gt;
&lt;/layout&gt;</code></pre>
                        <time datetime="2012-01-04 04:00-400">Wednesday, March 26th, 2013</time>
                    </div>
                    <div class="callout callout-tweet">
                        <h3>Tweet!</h3>
                        <p>I brave the treacherous gap of Kaza'Dum, where I will meet my foe. The fiery Balrog of the Magento Developer Exam...you SHALL NOT PASS!</p>
                        <time datetime="2012-01-04 04:00-400">Wednesday, December 28th, 2012</time>
                    </div>
                    <div class="callout callout-tweet">
                        <h3>Tweet!</h3>
                        <p>@toekneestuck I know... I know... not sure where that came from, I was probably drunk...</p>
                        <time datetime="2012-01-04 04:00-400">Tuesday, December 6th, 2012</time>
                    </div>
                </aside>
                <!--
                    <a class="twitter-timeline" href="https://twitter.com/strube" data-widget-id="310966744325963777" data-chrome="noborders noheader nobackground">Tweets by @strube</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                -->
                </aside>
            </div>
