<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="form-group">
        <input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'your_theme_text_domain' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
    </div>
</form>