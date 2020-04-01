<?php
/* * *****
 *  Template Name: Services Page
 */
get_header();
?>
<?php
// get list of all the categories 
// cat_link, cat_name, cat_description, view_cat link
?>
<div class="services-cat-wrap py-5">
    <div class="container">
        <h1 class="text-center"><?php echo get_the_title(); ?></h1>
        <div class="row">
            <div class="col-md-8">
                <?php
                $terms = get_terms('services_cat', array(
                    'hide_empty' => false,
                ));

                foreach ($terms as $term) {
                    ?>
                    <div class="service-cat-item bg-light mb-3 p-3">
                        <h3>
                            <?php echo $term->name; ?>
                        </h3>
                        <p>
                            <?php echo $term->description; ?>
                        </p>
                        <a class="btn btn-sm btn-outline-dark" href="<?php echo get_term_link($term); ?>">
                            View All posts
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="co-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
