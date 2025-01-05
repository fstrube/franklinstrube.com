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
<?php get_sidebar(); ?>

    <div role="main" class="main">
        <?php //query_posts('showposts=6'); ?>
        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="excerpt">
                    <article>
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <time datetime="<?php the_time('c'); ?>">Posted on <?php the_time('l, F j, Y'); ?></time>
                        <div class="tags"><?php the_tags(); ?></div>
                    </article>
                </div>
            <?php endwhile; ?>
            <!--div class="load-more">
                <a href="">more</a>
            </div-->

        <?php else : ?>

            <article id="post-0" class="post no-results not-found">

            <?php if ( current_user_can( 'edit_posts' ) ) :
                // Show a different message to a logged-in user who can add posts.
            ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
                </header>

                <div class="entry-content">
                    <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
                </div><!-- .entry-content -->

            <?php else :
                // Show the default message to everyone else.
            ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
                </header>

                <div class="entry-content">
                    <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            <?php endif; // end current_user_can() check ?>

            </article><!-- #post-0 -->

        <?php endif; // end have_posts() check ?>
    </div><!-- #primary -->

<?php get_footer(); ?>
