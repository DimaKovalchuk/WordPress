
<?php get_header(); ?>
 
<div class="container">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="col-xs-12">
			
			<h2><?php the_title(); ?></h2>
			<p class="author">
				
				Автор: <?php the_author(); ?>&bull;
				
				Опубликовано: <?php the_date(); ?>&bull;
				
				<?php comments_number(); ?>&bull;
				
				<?php the_tags(); ?>
			</p>
			<hr>
		</div>
	</div>
						
	<div class="row">
		<div class="col-xs-12">
			<div class="content">
				
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	
	
	<?php if (comments_open() || get_comments_number()): ?>
	<div class="well">
		<?php comments_template(); ?>
	</div>
	<?php endif; ?>
 
	<?php endwhile; endif; ?>
</div>
 

<?php get_footer(); ?>
