ภาคเหนือ :<?php $args = array(
	            "post_type"         => 'contact',
	            "posts_per_page"    => '-1',
	            "orderby"           => "id",
	            "order"             => "DESC",
	            'tax_query' 		=> array(
										array(
											'taxonomy' => 'contact_category',
											'field'    => 'slug',
											'terms'    => 'ภาคเหนือ',
										),
				),
	            
	            );
	    $the_query = new WP_Query( $args );
	    // echo $the_query->found_posts;
	    if($the_query->have_posts()){
	    	while($the_query->have_posts()){
	    		$the_query->the_post();
	    		echo 'title : '.get_the_title().'<br>';
	    		echo 'excerpt : '.get_the_excerpt().'<br>';
	    		echo 'tel : '.get_post_meta( get_the_ID(), '_cmb_tel', true ).'<br>';
	    		echo 'fax : '.get_post_meta( get_the_ID(), '_cmb_fax', true ).'<br>';
			}
		}
		?>
<br>

ภาคกลาง :<?php $args = array(
	            "post_type"         => 'contact',
	            "posts_per_page"    => '-1',
	            "orderby"           => "id",
	            "order"             => "DESC",
	            'tax_query' 		=> array(
										array(
											'taxonomy' => 'contact_category',
											'field'    => 'slug',
											'terms'    => 'ภาคกลาง',
										),
				),
	            
	            );
	    $the_query = new WP_Query( $args );
	    // echo $the_query->found_posts;
	    if($the_query->have_posts()){
	    	while($the_query->have_posts()){
	    		$the_query->the_post();
	    		echo 'title : '.get_the_title().'<br>';
	    		echo 'excerpt : '.get_the_excerpt().'<br>';
	    		echo 'tel : '.get_post_meta( get_the_ID(), '_cmb_tel', true ).'<br>';
	    		echo 'fax : '.get_post_meta( get_the_ID(), '_cmb_fax', true ).'<br>';
			}
		}
		?>
<br>

ภาคตะวันออก :<?php $args = array(
	            "post_type"         => 'contact',
	            "posts_per_page"    => '-1',
	            "orderby"           => "id",
	            "order"             => "DESC",
	            'tax_query' 		=> array(
										array(
											'taxonomy' => 'contact_category',
											'field'    => 'slug',
											'terms'    => 'ภาคตะวันออก',
										),
				),
	            
	            );
	    $the_query = new WP_Query( $args );
	    // echo $the_query->found_posts;
	    if($the_query->have_posts()){
	    	while($the_query->have_posts()){
	    		$the_query->the_post();
	    		echo 'title : '.get_the_title().'<br>';
	    		echo 'excerpt : '.get_the_excerpt().'<br>';
	    		echo 'tel : '.get_post_meta( get_the_ID(), '_cmb_tel', true ).'<br>';
	    		echo 'fax : '.get_post_meta( get_the_ID(), '_cmb_fax', true ).'<br>';
			}
		}
		?>
<br>

ภาคตะวันออกเฉียงเหนือ :<?php $args = array(
	            "post_type"         => 'contact',
	            "posts_per_page"    => '-1',
	            "orderby"           => "id",
	            "order"             => "DESC",
	            'tax_query' 		=> array(
										array(
											'taxonomy' => 'contact_category',
											'field'    => 'slug',
											'terms'    => 'ภาคตะวันออกเฉียงเหนือ',
										),
				),
	            
	            );
	    $the_query = new WP_Query( $args );
	    // echo $the_query->found_posts;
	    if($the_query->have_posts()){
	    	while($the_query->have_posts()){
	    		$the_query->the_post();
	    		echo 'title : '.get_the_title().'<br>';
	    		echo 'excerpt : '.get_the_excerpt().'<br>';
	    		echo 'tel : '.get_post_meta( get_the_ID(), '_cmb_tel', true ).'<br>';
	    		echo 'fax : '.get_post_meta( get_the_ID(), '_cmb_fax', true ).'<br>';
			}
		}
		?>
<br>

ภาคตะวันตก :<?php $args = array(
	            "post_type"         => 'contact',
	            "posts_per_page"    => '-1',
	            "orderby"           => "id",
	            "order"             => "DESC",
	            'tax_query' 		=> array(
										array(
											'taxonomy' => 'contact_category',
											'field'    => 'slug',
											'terms'    => 'ภาคตะวันตก',
										),
				),
	            
	            );
	    $the_query = new WP_Query( $args );
	    // echo $the_query->found_posts;
	    if($the_query->have_posts()){
	    	while($the_query->have_posts()){
	    		$the_query->the_post();
	    		echo 'title : '.get_the_title().'<br>';
	    		echo 'excerpt : '.get_the_excerpt().'<br>';
	    		echo 'tel : '.get_post_meta( get_the_ID(), '_cmb_tel', true ).'<br>';
	    		echo 'fax : '.get_post_meta( get_the_ID(), '_cmb_fax', true ).'<br>';
			}
		}
		?>
<br>

ภาคใต้ :<?php $args = array(
	            "post_type"         => 'contact',
	            "posts_per_page"    => '-1',
	            "orderby"           => "id",
	            "order"             => "DESC",
	            'tax_query' 		=> array(
										array(
											'taxonomy' => 'contact_category',
											'field'    => 'slug',
											'terms'    => 'ภาคใต้',
										),
				),
	            
	            );
	    $the_query = new WP_Query( $args );
	    // echo $the_query->found_posts;
	    if($the_query->have_posts()){
	    	while($the_query->have_posts()){
	    		$the_query->the_post();
	    		echo 'title : '.get_the_title().'<br>';
	    		echo 'excerpt : '.get_the_excerpt().'<br>';
	    		echo 'tel : '.get_post_meta( get_the_ID(), '_cmb_tel', true ).'<br>';
	    		echo 'fax : '.get_post_meta( get_the_ID(), '_cmb_fax', true ).'<br>';
			}
		}
		?>