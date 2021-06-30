<!-- include our header -->
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<?php get_sidebar(); ?> 
		<center>
			<?php 
				echo do_shortcode( '[weather]' );
			?>	
		</center>
		
		
		
		<!-- цикл через все посты -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="col-xs-12">
			<!-- название статьи на страницу c ссылкой на полное содержание -->
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="author">
				<!-- показать автора -->
				Автор поста: <?php the_author(); ?> &bull;
				<!-- показать дату опубликованной статьи -->
				Опубликовано: <?php echo get_the_date(); ?> &bull;
				<!-- показать количество комментариев -->
				<?php comments_number(); ?>&bull;
				<!-- показывать метки, присвоенные статьи -->
				<?php the_tags(); echo get_post_meta($post->ID, 'meta1_field_1', true); ?>
			</p>
			<div class="excerpt">
				<!-- вывести отрывок статьи -->
				<?php the_excerpt(); ?>
			</div>
			<div class="text-right">
				<!-- показать ссылку "Читать далее" связанной со статьей -->
				<a class="more-link" href="<?php the_permalink(); ?>">Читать далее</a>
			</div>
			<hr>
		</div>
		<?php endwhile; endif; ?>
	
	
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="text-center">
				<!-- показать ссылки пагинации на предыдущую и следующую посты -->
				<?php previous_posts_link( '< Предыдущий пост' ); ?> &bull;
				<?php next_posts_link( 'Следующий пост >' ); ?>
			</div>
		</div>
	</div>
</div>

 
<!-- подключить футер -->
<?php get_footer(); ?>
