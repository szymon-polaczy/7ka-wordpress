<?php 
		$taxonomies = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
			//'parent' => 0
		) );
echo '<pre>';
		echo get_term_link($taxonomies[1]);
    echo '</pre>';

    $term = get_queried_object();

    $children = get_terms( $term->taxonomy, array(
    'parent'    => $term->term_id,
    'hide_empty' => false
    ) );
    // print_r($children); // uncomment to examine for debugging
    if($children) { // get_terms will return false if tax does not exist or term wasn't found.
        // term has children
        $taxonomies = get_terms( array(
          'taxonomy' => 'product_cat',
          'hide_empty' => true,
          'parent' => $term->term_id,
        ) );

        print_r($taxonomies);
        echo '<pre>';
            echo get_term_link($taxonomies[0]);
            echo '</pre>';
    } else {
      //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'numberposts' => -1,
        //'posts_per_page' => get_field('ilosc_na_strone') ?? 12,
        //'paged' => $paged,
        'order' => 'ASC',
        'post_type' => 'product',
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $term->name,
          )
        )
      );
      $akt_query = new WP_Query($args);

      print_r($akt_query->found_posts);
    }
    
    
		?>
    <h1 class="page-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>
