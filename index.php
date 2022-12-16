<?php
/*
*Plugin Name:Carousel-Plugin
*Author:Solomon Designs
*Version:1.0.0
*Description:This plugin aims to display an OwlCarousel Section.
*/

add_action('init', 'register_script');
function register_script()
{
    // wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
    wp_register_style('new_style', plugins_url('/style.css', __FILE__), false, '1.0.0', 'all');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_style('owl_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_register_style('owl_theme_carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    wp_register_script('owl_carousel_script', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
    wp_register_style('linear_icons', 'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style()
{
    wp_enqueue_style('new_style');
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_style('owl_carousel');
    wp_enqueue_style('owl_theme_carousel');
    wp_enqueue_script('owl_carousel_script');
    wp_enqueue_style("linear_icons");
}



add_shortcode('carousel-plugin-shortcode', 'functionExecutedByCarouselShortCode');

function functionExecutedByCarouselShortCode()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3 pt-10 child1">
                    <h5 class="subtitle">New</h5>
                    <h1 class="title">Featured Products</h1>
                    <p class="description">Mauris imperdiet orci dapibus commodo libero nec, interdum tortorbi amet et
                        magna.
                    </p>
                    <div class="owl-nav">
                        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous"><span class="lnr lnr-arrow-left"></span></span></button>
                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next"><span class="lnr lnr-arrow-right"></span></span></button>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-9 child2">
                    <div class="owl-carousel">
                        <?php
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 10,
                        );

                        $loop = new WP_Query($args);

                        while ($loop->have_posts()) : $loop->the_post();
                            global $product;
                            echo
                            '       
                            <div class="item">
                            <a class="product-item" href="' . get_permalink() . '">
                            <div class="img-container"><img class="thumb-img" src=' . woocommerce_get_product_thumbnail('woocommerce_full_size') . '</div>
                            <div class="product-content">
                                <h5 class="product-title">' . get_the_title() . '</h5>
                                <span class="product-price">' . $product->get_price() . ' $</span>
                                </a> 
                                <div id="custom-add-to-cart">', woocommerce_template_loop_add_to_cart(), ' </div>
                            </div>
                        </div> 
                        ';

                        endwhile;

                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>

        </div>



    </body>

    </html>
<?php
    wp_enqueue_script('app', plugin_dir_url(__FILE__) . 'app.js');
};
