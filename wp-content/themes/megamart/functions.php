<?php

function wordpress_resources(){
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), null);
}
add_action('wp_enqueue_scripts','wordpress_resources');

register_nav_menus(array(
    'primary'=> __('Primary Menu'),
    'footer'=>__('Footer Menu')
));


function smartphones_list(){
    ob_start(); // Start output buffering
    // Ensure WooCommerce is active
    if (class_exists('WooCommerce')) {
        // Get products
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 5,
            'stock_status'   => 'instock',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug', // You can also use 'term_id' if you want to use category ID
                    'terms'    => 'samsung', // Slug of the Samsung category
                ),
            ),
        );

        $loop = new WP_Query($args);

        if ($loop->have_posts()) {

            echo '<div class="product-container">';
            echo '<div class="products">';

            while ($loop->have_posts()) : $loop->the_post();
                global $product;

                if( $product->get_sale_price() != ''){
                    $offer = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100). '% OFF';

                    $saves = wc_price($product->get_regular_price() - $product->get_sale_price()); 
                }else{
                    $offer = "0% OFF";

                    $saves = 0;
                }

                echo '<div class="product-card">';
                echo '<a href="' . get_permalink() . '" class="product-link">';
                echo '<div class="product-discount">'. $offer .'</div>';
                echo woocommerce_get_product_thumbnail();
                echo '<h3>' . get_the_title() . '</h3>';
                echo '<p class="price">' . $product->get_price_html() . '</p>';
                echo '<p class="save">Save - ' . $saves . '</p>';
                echo '</a>';
                echo '</div>';

            endwhile;

            echo '</div>'; // Close .products
            echo '</div>'; // Close .product-container

            wp_reset_postdata();
        }
    }

    $output = ob_get_clean(); // Get the buffer and end buffering
    return $output;
}

add_shortcode('smartphones','smartphones_list');


function wc_category_list_shortcode() {
    ob_start(); // Start output buffering

    // Get product categories
    $product_categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => true,
    ));

    if (!empty($product_categories) && !is_wp_error($product_categories)) {
        echo '<div class="top-categories">';
        echo '<div class="categories-list">';

        foreach ($product_categories as $category) {
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($thumbnail_id);

            $category_link = get_term_link($category->term_id, 'product_cat');

            if ($image_url) {
                echo '<div class="category-item">';
                echo '<a href="' . esc_url($category_link) . '" class="category-link">';
                echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($category->name) . '" />';
                echo '<h3>' . esc_html($category->name) . '</h3>';
                echo '</a>';
                echo '</div>';
            }
        }

        echo '</div>';
        echo '</div>';
    }

    $output = ob_get_clean(); // Get the buffer and end buffering
    return $output;
}
add_shortcode('wc_top_categories', 'wc_category_list_shortcode');

function get_daily_essentials_shortcode(){

    ob_start(); // Start output buffering
    echo '<div class="daily-essentials-container">';
    echo '<div class="categories-container">';
    echo '<div class="category-card">';
    echo '<img src="http://localhost/megamart/wp-content/uploads/2024/03/daily-essentials.jpg" alt="Daily Essentials">';
    echo '<h5>Daily Essentials</h5>';
    echo '<p class="discount">Up to 50% OFF</p>';
    echo '</div>';
    echo '<div class="category-card">';
    echo '<img src="http://localhost/megamart/wp-content/uploads/2024/03/vegitables.jpeg" alt="Vegetables">';
    echo '<h5>Vegetables</h5>';
    echo '<p class="discount">Up to 50% OFF</p>';
    echo '</div>';
    echo '<div class="category-card">';
    echo '<img src="http://localhost/megamart/wp-content/uploads/2024/03/fruites.jpeg" alt="Fruits">';
    echo '<h5>Fruits</h5>';
    echo '<p class="discount">Up to 50% OFF</p>';
    echo '</div>';
    echo '<div class="category-card">';
    echo '<img src="http://localhost/megamart/wp-content/uploads/2024/03/starwberry.jpeg" alt="Strawberry">';
    echo '<h5>Strawberry</h5>';
    echo '<p class="discount">Up to 50% OFF</p>';
    echo '</div>';
    echo '<div class="category-card">';
    echo '<img src="http://localhost/megamart/wp-content/uploads/2024/03/mango.jpeg" alt="Mango">';
    echo '<h5>Mango</h5>';
    echo '<p class="discount">Up to 50% OFF</p>';
    echo '</div>';
    echo '<div class="category-card">';
    echo '<img src="http://localhost/megamart/wp-content/uploads/2024/03/cherry.jpeg" alt="Cherry">';
    echo '<h5>Cherry</h5>';
    echo '<p class="discount">Up to 50% OFF</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    $output = ob_get_clean(); // Get the buffer and end buffering
    return $output;
}

add_shortcode('get_daily_essentials', 'get_daily_essentials_shortcode');



function headersearch_form_shortcode(){?>
   <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-container">
        <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search essentials, groceries and more&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>">
            <span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'woocommerce' ); ?></span>
            <i class="fa fa-search"></i>
        </button>
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>

<?php
}
add_shortcode('headersearch_form', 'headersearch_form_shortcode');