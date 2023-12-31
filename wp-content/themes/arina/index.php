<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage arina
 * @since 1.0.0
 */

 
 
get_header();
?>
<div class="breadcumb-wrapper">
    <div class="container ">
	<ul class="page-breadcrumb xt">
	<li><?php esc_html_e( 'Blog', 'arina' ); ?></li>
	</ul>
</div><!-- /.breadcumb-wrapper -->

<section class="blog-style-one sec-pad blog-page mrmain_blog mrindex">
    <div class="container">
        <div class="row wrapper">
			
			<?php if(is_active_sidebar('sidebar-left')) : ?> 
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
			<?php  else : ?>
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<?php  endif ; ?> 
				
				
				
                   
				   <div id="primary" class="content-area">
                        <main id="main" class="blog_list site-main ">

							<?php
							if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) :
									?>
                                    <header>
                                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                    </header>
								<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;?>

                                <div class="dope-pagination text-center">
							<?php the_posts_pagination(); ?>
                                </div>

							<?php else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>

                        </main><!-- #main -->
                    </div>
                </div>
			
				<!-- sidebar area -->
			<?php if(is_active_sidebar('sidebar-left')) { ?>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="sidebar">
				<?php dynamic_sidebar('sidebar-left'); ?>
				</div>
			</div>
			<?php } ?>
            <!--Sidebar-->
				
            </div>
        </div>
    </section>
<?php
get_footer();
