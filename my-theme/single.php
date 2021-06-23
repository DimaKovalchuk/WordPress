<!-- подключить заголовок -->
<?php get_header(); ?>
 
<div class="container">
	<!-- нужен цикл, хотя там только один пост -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12">
			<!-- показать заголовок поста -->
			<h1><?php the_title(); ?></h1>
			<p class="author">
				<!-- показать автора -->
				Автор: <?php the_author(); ?>&bull;
				<!-- показать дату публикации -->
				Опубликовано: <?php echo get_the_date(); ?>&bull;
				<!-- показать количество комментариев -->
				<?php comments_number(); ?>
				<!-- показать теги, присвоенные статьи -->
				<?php the_tags(); ?>
			</p>
			<hr>
		</div>
	</div>
						
	<div class="row">
		<div class="col-xs-12">
			<div class="content">
				<!-- показать содержание статьи -->
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<hr>
	<!-- если комментарии разрешены, показать комментарии -->
	<?php if (comments_open() || get_comments_number()): ?>
	<div class="well">
		<?php comments_template(); ?>
	</div>
	<?php endif; ?>
 
	<?php endwhile; endif; ?>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="text-center">
				<!-- показать ссылки пагинации на предыдущую и следующую посты -->
				<?php echo previous_posts_link( '< Предыдущий пост' ); ?> &bull;
				<?php next_posts_link( 'Следующий пост >' ); ?>
				
				<?php posts_nav_link(); ?>
        <div class="e_next"><?php previous_posts_link('PREVIOUS PAGE') ?></div>
        <div class="e_prev"><?php next_posts_link('NEXT PAGE', $tv_query->max_num_pages) ?></div>
			</div>
		</div>
	</div>
	
	
</div>
 
<!-- подключить подвал -->
<?php get_footer(); ?>