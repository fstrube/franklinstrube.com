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
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
                <div class="article">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="entry-title"><?php the_title() ?></h1>
                        <time datetime="<?php the_time('c'); ?>">Posted on <?php the_time('l, F j, Y'); ?></time>

                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style ">
                        <a class="addthis_button_preferred_1"></a>
                        <a class="addthis_button_preferred_2"></a>
                        <a class="addthis_button_preferred_3"></a>
                        <a class="addthis_button_preferred_4"></a>
                        <a class="addthis_button_compact"></a>
                        <a class="addthis_counter addthis_bubble_style"></a>
                        </div>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5146a1ae3d533013"></script>
                        <!-- AddThis Button END -->

                        <?php if ( comments_open() ) : ?>
                        <div class="comments-link">
                            <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
                        </div><!-- .comments-link -->
                        <?php endif; // comments_open() ?>

                        <?php the_content() ?>
                    </article>
                </div>
