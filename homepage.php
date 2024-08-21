<?php //Template Name: Homepage ?>
<?php get_header() ?>

	<section id="home" class="section intro_mod" style="background-image: url('<?php echo get_field('top_home_section')['homepage_main_bg_image'] ?>');">
	  <h2 class="section_title intro_mod"><span class="title1 intro_mod">Creative Template</span><span class="title2 intro_mod">Welcome To Mogo</span>
	  </h2>
	</section>

	<section id="about" class="section">
	  <h2 class="section_title"><span class="title1"><?php echo get_field('about_section')['about_subtitle'] ?></span>
	  	<span class="title2"><?php echo get_field('about_section')['about_title'] ?></span>
	  </h2>
	  <div class="section_descr">
	    <p><?php echo get_field('about_section')['about_description'] ?></p>
	  </div>
	  <?php $about_posts = get_field('about_section')['about_posts']; ?>
	  <?php if ( ($about_posts['about_post_preview_1'] !== false 
	  	|| $about_posts['about_post_preview_2'] !== false
	  		|| $about_posts['about_post_preview_3'] !== false)
	  			&& is_array( $about_posts ) ) : ?>
			<ul class="stories_list">
				<?php foreach ($about_posts as $key => $post) : setup_postdata($post) ?>
					<li class="stories_l_item">
						<a href="<?php echo get_the_permalink() ?>" class="image_link">
						    <figure class="image_wrap effect1_mod">
						    	<img src="<?php echo get_the_post_thumbnail_url() ?>" class="img"/>
						     	<figcaption class="image_caption story_mod"><?php the_title() ?></figcaption>
						    </figure>
						</a>
					</li>
				<?php endforeach ?>
				<?php wp_reset_postdata() ?>
			</ul>
		<?php endif ?>

		<?php $about_list = get_field('about_section')['about_list']; ?>
		<?php 
			$about_list_count_empty = 0;
			foreach ($about_list as $key => $item) :

				if ( empty($item['list_item_name']) && empty($item['list_item_value']) )
					$about_list_count_empty++;

			endforeach;
		?>
		<?php if ( (count( $about_list ) !== $about_list_count_empty) && is_array( $about_list ) ) : ?>
			<ul class="facts_list">
				<?php foreach ($about_list as $key => $item) : ?>
					<li class="facts_l_item">
					  <dl class="fact_block">
					    <dt class="fact_text"><?php echo $item['list_item_name'] ?></dt>
					    <dd class="fact_num"><?php echo $item['list_item_value'] ?></dd>
					  </dl>
					</li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
	</section>

	<section id="service" class="section">
	  <h2 class="section_title"><span class="title1"><?php echo get_field('service_section')['service_subtitle'] ?></span>
	  	<span class="title2"><?php echo get_field('service_section')['service_title'] ?></span>
	  </h2>
	    <?php $service_list = get_field('service_section')['service_list']; ?>
	  	<?php if ( is_array( $service_list ) ) : ?>
	  		<ul class="services_list">
	  			<?php foreach ($service_list as $key => $item) : ?>
	  				<?php $class = !empty($item['item_css_class']) ? ' ' . $item['item_css_class'] : '' ?>
	  				<li class="services_l_item">
	  				  <div class="service_block<?php echo $class ?>">
	  				    <h3 class="service_title"><?php echo $item['item_title'] ?></h3>
	  				    <div class="service_text">
	  				      <p><?php echo $item['item_description'] ?></p>
	  				    </div>
	  				  </div>
	  				</li>
	  			<?php endforeach ?>
	  		</ul>
	  	<?php endif ?>
	</section>

	<section class="section">
	  <h2 class="section_title">
	  	<span class="title1"><?php echo get_field('what_we_do_section')['what_we_do_subtitle'] ?></span>
	  	<span class="title2"><?php echo get_field('what_we_do_section')['what_we_do_title'] ?></span>
	  </h2>
	  <div class="section_descr">
	    <p><?php echo get_field('what_we_do_section')['what_we_do_description'] ?></p>
	  </div>
	  <div class="what">
	    <figure class="image_wrap what_mod"><img src="<?php echo get_field('what_we_do_section')['what_we_do_image'] ?>" class="img"></figure>

	      <?php $accordion = get_field('what_we_do_section')['what_we_do_list']; ?>
	    	<?php if ( !empty( $accordion ) && is_array( $accordion ) ) : ?>
	    		<ul class="accordion">
	    			<?php foreach ($accordion as $key => $item) : ?>
	    				<?php if ( empty($item['item_title']) || empty($item['item_description']) ) : continue; endif; ?>
	    				<?php $class = !empty($item['item_css_class']) ? ' ' . $item['item_css_class'] : '' ?>
	    				<li class="accordion_item">
	    				  <h3 class="accordion_title<?php echo $class ?>"><?php echo $item['item_title'] ?></h3>
	    				  <div class="accordion_content">
	    				    <p><?php echo $item['item_description'] ?></p>
	    				  </div>
	    				</li>
	    			<?php endforeach ?>
	    		</ul>
	    	<?php endif ?>
	  </div>
	</section>

	<section class="section">
	  <h2 class="section_title">
	  	<span class="title1"><?php echo get_field('team_section')['team_subtitle'] ?></span>
	  	<span class="title2"><?php echo get_field('team_section')['team_title'] ?></span>
	  </h2>
	  <div class="section_descr">
	    <p><?php echo get_field('team_section')['team_description'] ?></p>
	  </div>
	  <?php 
	  	$set_count_of_team_posts = get_field('team_section')['team_posts']['set_count_of_team_posts'];
	  	
	  	if ( $set_count_of_team_posts == 'count' ){
	  		$posts_per_page = (int)get_field('team_section')['team_posts']['count_of_team_posts'];
	  	} elseif ( $set_count_of_team_posts == 'all' ) {
	  		$posts_per_page = -1;
	  	}

	  	$args = [
	  		'post_type' => 'team',
	  		'posts_per_page' => $posts_per_page,
	  		'order' => 'ASC'
	  	];

	  	$team = get_posts($args);
	  ?>

	  <?php if ( !empty( $team ) && is_array( $team ) ) : ?>
	  	<ul class="team_list">
	  		<?php foreach ($team as $key => $post) : setup_postdata($post) ?>
	  			<li class="team_l_item">
	  			  <div class="teammate_block">
	  			    <figure class="image_wrap effect1_mod"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" class="img"/>
	  			    <?php $socials = get_field('team_social', $post->ID) ?>	
	  			    <?php if ( !empty( $socials ) && is_array( $socials ) ) : ?>
	  			      <figcaption class="image_caption">
	  			        <ul class="teammate_socials">
	  			    	<?php foreach ($socials as $key => $item) : ?>
	  			    		<?php if ( empty($item['social_url']) ) : continue; endif; ?>
	  			    		<?php $class = !empty($item['_social_css_class']) ? ' ' . $item['_social_css_class'] : '' ?>
		  			        <li class="teammate_s_item">
		  			        	<a href="<?php echo $item['social_url'] ?>" class="teammate_s_link<?php echo $class ?>"></a>
		  			        </li>
		  			    <?php endforeach ?>
	  			        </ul>
	  			      </figcaption>
	  			      <?php endif ?>
	  			    </figure><span class="image_c_title"><?php the_title() ?></span><span class="image_c_text"><?php echo get_field('team_position', $post->ID) ?></span>
	  			  </div>
	  			</li>
	  		<?php endforeach ?>
	  		<?php wp_reset_postdata() ?>
	  	</ul>
	  <?php endif ?>
	</section>


	<?php 
		$testimonials_posts = get_field('testimonials_section')['testimonials_posts'];
	?>
	<?php if ( !empty( $testimonials_posts ) && is_array( $testimonials_posts ) ) : ?>
		<section class="section what_mod" style="background-image: url('<?php echo get_field('testimonials_section')['testimonials_background_image'] ?>');">
		  <h2 class="section_title">
		  		<span class="title1"><?php echo get_field('testimonials_section')['testimonials_subtitle'] ?></span>
		  	  	<span class="title2"><?php echo get_field('testimonials_section')['testimonials_title'] ?></span>
		  </h2>
		  <div class="clients">
		  <?php foreach ($testimonials_posts as $key => $post) : setup_postdata($post) ?>
		    <div class="client_block">
		      <div class="client_image"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img"/></div>
		      <div class="text_wrap">
		        <div class="image_c_title"><?php the_title() ?></div>
		        <div class="image_c_text"><?php echo get_field('testimonials_position', $post->ID) ?></div>
		        <div class="text">
		          <?php echo get_the_content($post->ID) ?>
		        </div>
		      </div>
		    </div>
		  <?php endforeach ?>
		  </div>
		  <?php wp_reset_postdata() ?>
		</section>  	
	<?php endif ?>

	<?php 
	
		$args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC'
		];

		$posts = get_posts($args);
	?>
	<?php if ( !empty( $posts ) && is_array( $posts ) ) : ?>
		<section id="blog" class="section">
		  <h2 class="section_title">
		  	<span class="title1">Our stories</span>
		  	<span class="title2">Latest Blog</span>
		  </h2>
		  <ul class="recent_list">
		  	<?php foreach ($posts as $key => $post) : setup_postdata($post) ?>
			    <li class="recent_item">
			      <article class="post">
			        <div class="image_wrap blog_mod"><img src="<?php echo get_the_post_thumbnail_url() ?>" class="img blog_mod"/></div>
			        <h2 class="post_title"><a href="#" class="post_link"><?php the_title() ?></a></h2>
			        <div class="post_text">
			          <?php the_content() ?>
			        </div>
			        <a href="<?php echo get_the_permalink() ?>" class="post_date">
			        	<span class="post_d_day"><?php echo get_the_date('j') ?></span>
			        	<span class="post_d_month"><?php echo get_the_date('F') ?></span>
			        </a>
			        <div class="post_stat_wrap"><a href="#views" class="post_stat views_mod">123</a><a href="#comments" class="post_stat comm_mod">20</a></div>
			      </article>
			    </li>
		    <?php endforeach ?>
		    <?php wp_reset_postdata() ?>
		  </ul>
		</section>
	<?php endif ?>	
<?php get_footer() ?>