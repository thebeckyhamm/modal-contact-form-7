	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- The data-target contains the post ID -->
				<a href="" data-toggle="modal" data-target="#modal-<?php the_ID(); ?>">
					<div class="entry-box">
						<h4 class="entry-title"><?php the_title(); ?></h4>
					</div> 
				</a>   
				<!-- the modal id matches the data-target above -->
				<div class="modal fade" id="modal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close btn btn-sm" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><?php the_title(); ?></h4>
							</div>
							<div class="modal-body">
								<?php the_content(); ?>
								<p>Request a detailed case study.</p>
								<div>
									<!-- use Contact Form 7's shortcode - change to your form's id -->
									<?php echo do_shortcode( '[contact-form-7 id="1" title="Contact Form"]' ); ?> 
								</div>
							</div><!--end modal-body-->
						</div><!--end modal-content-->
					</div><!--end modal-dialog-->
				</div><!--end modal-->
			</article>
			<?php endwhile; ?>            
	<?php endif; ?>
