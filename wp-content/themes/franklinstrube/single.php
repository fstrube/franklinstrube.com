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
 * The main template file.
 *
 * @package WordPress
 * @subpackage Franklin_Strube
 * @since Franklin Strube 1.0
 */

get_header(); ?>
<?php //get_sidebar(); ?>

    <div role="main" class="main">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', get_post_format() ); ?>
        <nav class="nav-single">
            <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
            <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
            <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
        </nav><!-- .nav-single -->
    <?php endwhile; // end of the loop. ?>
    </div>
    <div class="comments">
        <div class="main">
            <?php comments_template( '', true ); ?>
        </div>
    </div>
<?php get_footer(); ?>
