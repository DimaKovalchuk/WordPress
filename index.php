<!-- include our header -->
<?php get_header(); ?>
 
<div class="container">
	<div class="row">
		<!-- цикл через все посты -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="col-xs-12">
			<!-- название статьи на страницу c ссылкой на полное содержание -->
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="author">
				
				Автор: <?php the_author(); ?> &bull;
				
				Опубликовано: <?php the_date(); ?> &bull;
				
				<?php comments_number(); ?> &bull;
				
				<?php the_tags(); ?>
			</p>
			<div class="excerpt">
				
				<?php the_excerpt(); ?>
			</div>
			<div class="text-right">
				
				<a class="more-link" href="<?php the_permalink(); ?>">Читать далее</a>
			</div>
			<hr>
		</div>
		<?php endwhile; endif; ?>
		<?php
			$args = array( 'post_type' => 'movies', 'posts_per_page' => 10 );
			$the_query = new WP_Query( $args );
		?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<p>Автор: 
					<?php echo (get_post_meta($post->ID, 'Автор', true)); ?>
				</p>
				
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php endwhile; else: ?>
			<p><?php _e( 'Записи не найдены.' ); ?></p>
		<?php endif; ?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="text-center">
				
				<?php previous_posts_link( '< Предыдущий пост' ); ?> &bull;
				<?php next_posts_link( 'Следующий пост >' ); ?>
			</div>
		</div>
	</div>
</div>
 
<?php get_footer(); ?>
