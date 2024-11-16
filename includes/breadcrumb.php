<?php
function output_breadcrumb() {
    $home = '<li><a href="' .get_bloginfo('url'). '"><i class="bi bi-house"></i></a></li>';
    echo '<ul class="breadcrumb">';

    //トップページの場合
    if(is_home() || is_front_page()) {
        //何も表示しない

    } elseif(is_category()) {
        $cat = get_queried_object();
        $cat_id = $cat->parent;
        $cat_list = array();
        while($cat_id != 0) {
            $cat = get_category($cat_id);
            $cat_link = get_category_link($cat_id);
                array_unshift($cat_list, '<li><a href="' .$cat_link. '">' .$cat->name. '</a></li>');
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach($cat_list as $value) {
            echo $value;
        }
        the_title('<li>','</li>');

    } elseif(is_archive()) {
        echo $home;
        the_archive_title('<li>','</li>');

    } elseif(is_single()) {
         echo $home;

        $categories = get_the_category();
        if($categories) {
            echo '<li><a href="' . get_category_link( $categories[0]->term_id ) . '">' . $categories[0]->name . '</a><i class="fa-solid fa-arrow-right"></i></li>';
        }
        the_title('<li>','</li>');

    } elseif(is_page()) {
        global $post;
        $parent_id = $post->post_parent;
        $parent_title = get_post($parent_id)->post_title;

        if(is_page() && $post->post_parent) {
            echo $home;
            echo '<li><a href="' .get_permalink($parent_id). '">' .$parent_title.'</a></li>';
            echo the_title('<li>', '</li>');
        }else{
            echo $home;
            echo the_title('<li>', '</li>');
        }
    
    } elseif(is_search()) {
        echo $home;
        echo '<li>「' .get_search_query(). '」の検索結果</li>';
    
    } elseif(is_404()) {
        echo $home;
        echo '<li>404 ページが見つかりません</li>';
    }

    echo '</ul>';
}

?>