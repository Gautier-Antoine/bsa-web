<?php
/**
 * Register the block patterns for the theme
 *
 * @return void
 */
function bsa_web_theme_blocks_pattern() {

                        // ? DESIGN IMAGE
                        // ? See ICon
                        // ?? ADD BUTTON + Arrow
                // ?? VERIFY CENTER, see bold + Arrow?

    register_block_pattern(
        'bsaweb/qui-sommes-nous',
        array(
            'title'       => 'Qui Sommes Nous?',
            'description' => 'Block 2 columns',
            'categories' => ['bsaweb'],
            'content'     => "
                <!-- wp:columns {\"className\":\"qui-sommes-nous\"} -->
                <div class=\"wp-block-columns qui-sommes-nous\">
                    <!-- wp:column -->
                    <div class=\"wp-block-column\">
                        <!-- wp:image {\"width\":56,\"height\":56,\"sizeSlug\":\"large\"} -->
                        <figure class=\"wp-block-image size-large is-resized\"><img src=\"https://images.unsplash.com/photo-1617634667039-8e4cb277ab46?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bmF0dXJlJTIwbGFuZHNjYXBlfGVufDB8fDB8fA%3D%3D&w=1000&q=80\" alt=\"\" width=\"56\" height=\"56\"/></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class=\"wp-block-column\">
                        <!-- wp:image {\"width\":56,\"height\":56,\"sizeSlug\":\"large\"} -->
                        <figure class=\"wp-block-image size-large is-resized\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlObaqZaeYinRO5D5CX1rwGITnojvrINgNGg&amp;usqp=CAU\" alt=\"\" width=\"56\" height=\"56\"/></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {\"level\":3} -->
                        <h3>Qui sommes-nous?</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph -->
                        <p>You have to reproduce this section by using default Gutenberg blocks for the title and the background and a custom bloc</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {\"layout\":{\"type\":\"flex\"}} -->
                        <div class=\"wp-block-buttons\">
                            <!-- wp:button -->
                            <div class=\"wp-block-button\"><a class=\"wp-block-button__link wp-element-button\">Découvrir Appart'City</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->

                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            ",
        )
    );

    register_block_pattern(
        'bsaweb/query-slider',
        array(
            'title'       => 'Query/Slider',
            'description' => 'This will grab the last 3 posts.<br><b><!> You will need to set the link</b>',
            'categories' => ['bsaweb'],
            'content'     => "
                <!-- wp:query {\"className\":\"query-slider\", \"queryId\":7,\"query\":{\"perPage\":3,\"pages\":1,\"offset\":0,\"postType\":\"post\",\"order\":\"desc\",\"orderBy\":\"date\",\"author\":\"\",\"search\":\"\",\"exclude\":[],\"sticky\":\"\",\"inherit\":false},\"layout\":{\"type\":\"default\"}} -->
                <div class=\"wp-block-query query-slider\">
                    <!-- wp:paragraph {\"align\":\"right\"} -->
                    <p class=\"has-text-align-right\"><a href=\"/posts\">Voir toute l'actu</a></p>
                    <!-- /wp:paragraph -->
        
                    <!-- wp:post-template -->
                        <!-- wp:post-featured-image {\"isLink\":true,\"align\":\"wide\"} /-->                
                        <!-- wp:post-date {\"format\":\"j M Y\"} /-->                
                        <!-- wp:post-title {\"isLink\":true} /-->
                        <!-- wp:post-excerpt {\"moreText\":\"\u003e\"} /-->
                    <!-- /wp:post-template -->
                </div>
                <!-- /wp:query -->
            ",
        )
    );
    register_block_pattern_category(
        'bsaweb',
        array( 'label' => 'BSA Web' )
    );
  }
   
  add_action( 'init', 'bsa_web_theme_blocks_pattern' );