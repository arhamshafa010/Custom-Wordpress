<?php get_header(); ?>
    <section class="py-5">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <h1>Search Results for "<?php echo get_search_query(); ?>"</h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <h1>No Results Found</h1>
                <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                <?php get_search_form(); ?>
            <?php endif; ?>

        </div>
    </section>
<?php get_footer();?>
