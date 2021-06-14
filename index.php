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
