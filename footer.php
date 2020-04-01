</main>
<footer id="page-foooter" class="page-footer border-top">
    <div class="container">
        <div class="d-flex align-items-start py-3">

            <div class="col footer-section footer-section-one">
                <?php
                /*                 * *
                 * Widget Call
                 */
                ?>
                <?php
                wp_nav_menu(array(
                    'menu' => 'footer_menu',
                    'menu_id' => 'footer_menu',
                    'theme_location' => 'footer_menu',
                    'menu_class' => 'footer-menu-wrap menu-wrap'
                ));
                ?>
            </div>
            <div class="col footer-section footer-section-two">
                <?php if (is_active_sidebar('footer-widget')) : ?>
                    <div id="secondary" class="widget-area" role="complementary">
                        <?php dynamic_sidebar('footer-widget'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="text-center py-3 bg-light">
            © <?php echo date("Y"); ?> <a href="/"><?php echo bloginfo('name'); ?></a>
        </div>
    </div>
</footer> 

<?php wp_footer(); ?>
<script>
jQuery(document).ready(function ($) {
    var $ = jQuery;
    $(".dynamic-load-more-button").on("click", function () {
        $this = $(this);
        $taxonomy = $(this).attr("data-taxonomy");
        $termid = $(this).attr("data-term-id");
        $dataloaded = $(this).attr("data-loaded");
        $posttype = $(this).attr("data-post-type");
        $post_per_page = $(this).attr("data-posts-per-page");
        $dataloop = $(this).attr("data-loop");
        $postcounter = parseInt($dataloop) + parseInt($post_per_page);
        $postcounter_result = $(this).attr("data-loop", $postcounter);
        $exclude_id = $(this).attr("exclude-post");
        $currentpage = $(this).attr("data-current-page");
        $searchkeyward = $(this).attr("data-search-keyward");
        $currentpage++;
        $maxpage = $(this).attr("data-max-pages");
        $currentpageval = $(this).attr("data-current-page", $currentpage);
        var str = '&taxonomy=' + $taxonomy + '&termid=' + $termid + '&posttype=' + $posttype + '&dataloop=' + $postcounter + '&keyword=' + $searchkeyward + '&currentpage=' + $currentpage + '&exclude_id=' + $exclude_id + '&postperpage=' + $post_per_page + '&action=dynamicloadmore';
        $.ajax({
            data: str,
            dataType: "html",
            type: 'post',
            url: ajaxurl,
            beforeSend: function () {
                $(".load-more-button").addClass("disable-btn");
                $(".load-more-button .load-more-text").hide();
                $(".load-more-button .loader").css("display", "inline-block");
            },
            success: function (data) {
                if ($dataloaded) {
                    $("#" + $dataloaded).append(data);
                } else {
                    $("#dynamic-load-more-content").append(data);
                }
                $(".load-more-button").removeClass("disable-btn");
                $(".load-more-button .load-more-text").show();
                $(".load-more-button .loader").css("display", "none");
                if ($currentpage >= $maxpage) {
                    $($this).hide();
                }
            }
        });
    });
});
</script>
</body>
</html>