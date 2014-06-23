#Bootstrap Modal + Contact Form 7

A way to add your contact form into a modal in WordPress.  Great for case study or item request forms where the user must supply contact info for more detail, and you need multiple contact forms on page but each case is dynamic.

***

##Requirements

1. Contact Form 7
2. `modal.js` and `modal.css`
3. Array of items that have their own post ID (meaning you add them via post, page, or custom post type).
4. Code in `modal-contact-form.php`

***

##How to Use

###1. Install and activate the [Contact Form 7 plugin](http://wordpress.org/plugins/contact-form-7/)

###2. Enqueue your CSS and JS for the modal

Add the `modal.js` file and the `modal.css` file to your theme directory. Load them property by adding the following to your `functions.php` file in your theme:

	function BH_scripts() {

		// Make sure the file path is pointing to the folders where you added the files

	    wp_enqueue_script( 'bootstrap-modal', get_template_directory_uri() . '/scripts/modal.js', array(), null, true );

        wp_register_style( 'modal-css', get_template_directory_uri().'/css/modal.css', array(), null, 'all' );
        wp_enqueue_style( 'modal-css' );
	}

	add_action( 'wp_enqueue_scripts', 'BH_scripts' );

Check your DevTools to make sure the modal scripts are loaded.

###3. Add a New Contact Form 

Include whatever [mail tag](http://contactform7.com/special-mail-tags/) you need in the Message Body section of the contact form interface.  This will let you know which item your user is requesting.  For example, I named each of my case studies so I called the `[_post_title]` tag in my contact email.

###4. Create or Edit a Template File and add the code in the `modal-contact-form.php` file.

This can be one of your existing templates (`archive.php`, `your-custom-post-type.php`, etc.).

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

###5. Style your items as you wish!






