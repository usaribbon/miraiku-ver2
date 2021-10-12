<?php
/*
 * Template Name: page-contact
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__contact" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">お問い合わせ</h1>
                                    <p class="secondary">contact</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <div class="p-content p-content--s">
                            <div class="contact-form">
<?php the_content();?>
                            </div>
                        </div>
                    </div>

                </section><!-- /.c-box -->
<style>
.mw_wp_form_preview .form_lead{ display:none; }
</style>
                <div class="u-bg--circle--lightgray">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>