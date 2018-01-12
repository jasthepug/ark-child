<?php
/*
 * Template Name: Ad template
 * description: >-
  Snorel Ad page
 */

get_header('custom'); ?>
<div class="container page-container">
    <section class="brand-info row">
        <div class="col-xs-12 col-sm-2">
            <div class="text-center">
                <?php
                if (has_post_thumbnail()):
                    echo get_the_post_thumbnail($post, 'large', array('class' => 'brand-image'));
                endif;
                ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <?php
            while (have_posts()) : the_post();
                echo the_content();
            endwhile; ?>
        </div>
    </section>
    <?php while (have_posts()) : the_post(); ?>
        <?php
        $entries_store = get_post_meta(get_the_ID(), 'stores_ad_demo', true);

        if ($entries_store) {
            ?>
            <section class="row availability">
                <div class="col-xs-12">
                    <h2 class="heading">Available at:</h2>
                </div>
                <?php
                foreach ((array)$entries_store as $key => $entry) {

                    $img = $title = $desc = $caption = '';

                    if (isset($entry['title'])) {
                        $title = esc_html($entry['title']);
                    }

                    if (isset($entry['image_id'])) {
                        $img = wp_get_attachment_image($entry['image_id'], 'medium', null, array(
                            'class' => 'img-responsive',
                        ));
                    }

                    // Do something with the data
                    ?>
                    <div class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-4">
                        <?php echo $img; ?>
                    </div>
                    <?php
                    // <span class="store-name"> echo $title; </span>
                }
                ?>
            </section>
            <?php
        }
    endwhile; // end of the loop. ?>

    <?php while (have_posts()) : the_post(); ?>
        <?php
        $entries_online_store = get_post_meta(get_the_ID(), 'online_stores_demo', true);

        if ($entries_online_store) {
            ?>
            <section class="row availability">
            <div class="col-xs-12">
                <h2 class="heading border-top border-top--dashed">Available Online at:</h2>
            </div>
            <?php
            foreach ((array)$entries_online_store as $key => $entry) {

                $img = $title = $desc = $caption = '';

                if (isset($entry['title'])) {
                    $title = esc_html($entry['title']);
                }

                if (isset($entry['online_store_url'])) {
                    $online_store_ad_link = esc_html($entry['online_store_url']);
                }

                if (isset($entry['image_id'])) {
                    $img = wp_get_attachment_image($entry['image_id'], 'medium', null, array(
                        'class' => 'img-responsive',
                    ));
                }

                $caption = isset($entry['image_caption']) ? wpautop($entry['image_caption']) : '';

                // Do something with the data
                ?>
                <div class="col-xs-offset-1 col-sm-offset-0 col-xs-10 col-sm-4">
                    <a class="store-link" href="<?php echo $online_store_ad_link; ?>" target="_blank">
                        <?php echo $img; ?>
                    </a>
                </div>
                <?php
                //<span class="store-name"> echo $title; </span>
            }
        }
        ?>
        </section>
        <?php
    endwhile; // end of the loop. ?>
    <?php get_footer('custom'); ?>
