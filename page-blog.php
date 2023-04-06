<?php get_header(); ?>
   <section class="py-5">
       <div class="container">
           <div class="row">
               <?php
               $args = array(
                   'post_type' => 'post', // Fetch only posts
                   'posts_per_page' => 10, // Fetch 10 posts per page
               );

               $query = new WP_Query( $args );
               $dec = get_the_content();
               echo $dec;


               //            echo $trimmed_content;


               if ( $query->have_posts() ) {
                   while ( $query->have_posts() ) {
                       $query->the_post();
                       $content = get_the_content();
                       $trimmed_content = wp_trim_words($content, 15);?>
                       <div class="col-lg-4 img1">
                           <a class="" href="<?php the_permalink(); ?>"><div class="img2"><?php echo get_the_post_thumbnail(); ?></div></a>
                           <a href="<?php the_permalink(); ?>"><h6 class="pt-2"><?php the_title(); ?></h6></a>
                           <p class=""><?php echo $trimmed_content; ?></p>
                           <a href="<?php the_permalink(); ?>"><button class="custom_btn" >Read More</button></a>
                       </div>
                       <?php
                   }
               } else {

               }

               wp_reset_postdata(); // Reset post data

               ?>
           </div>
       </div>
   </section>

<?php get_footer(); ?>