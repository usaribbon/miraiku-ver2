<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__error" class="l-main">
            <div class="l-main__inner">
    
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">Error 404</h1>
                                    <p class="secondary">Error 404</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <div class="contact-form">
                            <p>お探しのページは見つかりませんでした。</p>
                        </div>
                    </div>
                </section><!-- /.c-box -->

                <div class="u-bg--circle--lightgray">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>