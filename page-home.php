<?php get_header(); ?>


<section class="py-4 ">
    <div class="container">
        <h1 class="text-center">Our Services</h1>
    </div>
    <div class="container ">
        <div class="row py-5">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => 3,
                'orderby' => 'title',
                'order' => 'ASC',
            );

            $services_query = new WP_Query($args);

            if($services_query->have_posts()) {
                while($services_query->have_posts()) {
                    $services_query->the_post();?>
                        <div class="col-md-4 servicesec ">
                            <div class="text-center">
                                <div class="custom1"><?php echo get_the_post_thumbnail(); ?></div>
                            </div>
                            <h5 class="text-center pt-2"><?php the_title(); ?></h5>
                            <div class="text-center"><p class=""><?php the_excerpt(); ?></p></div>
                        </div>
                <?php
                }
            } else {
                echo 'No services found';
            }

            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
