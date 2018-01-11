<div class="row">
    <div class="col-xs-12">
        <p class="text-muted disclaimer border-top">Use only as directed. If symptoms persist, consult a healthcare
            professional for further advice. Individual results may vary.</p>
        <?php while (have_posts()) : the_post(); ?>
            <?php

            $trademark_text = get_post_meta(get_the_ID(), 'trademark_text', true);

            // Do something with the data
            ?>
            <p class="text-muted disclaimer">
                <?php echo $trademark_text; ?>
            </p>
            <?php
            ?>
        <?php endwhile; // end of the loop. ?>
    </div>
</div>
</div> <?php // closing tag from ad template ?>
</body>