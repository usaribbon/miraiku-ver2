<?php
/*
 * Template Name: page-about_vision
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__about" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">みらいくについて</h1>
                                    <p class="secondary">about Miraiku</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <header class="p-page-subheader-with-theme">
                                            <h2 class="primary">VISION</h2>
                                            <p class="copy"><?php the_field('about_vision_copy');?></p>
                                        </header>

                                        <div class="p-content">
                                            <div class="center-pc left-sp"><?php the_field('about_vision_leadtext');?></div>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">企業主導型保育とは？</h3>
                                            <p>企業主導型保育とは、仕事と子育てとの両立を支援するために内閣府が平成28年度から始めた取り組みです。<br />企業のニーズに合わせて会社が保育所を設置・運営することを助成する制度となっています。</p>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">企業主導型保育所の特徴</h3>
                                            <ul class="p-ul">
                                                <li class="p-ul__item">企業のニーズに合わせて会社が保育所を設置・運営する</li>
                                                <li class="p-ul__item">会社のお子さんだけでなく地域のお子さんの受け入れもでき、地域の実情に応じて、柔軟な運営が可能。</li>
                                                <li class="p-ul__item">運営費・施設整備費について認可施設並みの助成が受けられるため保育料を認可保育所並みに設定可能。</li>
                                                <li class="p-ul__item">保育料は収入に応じた額ではなく、各施設で定めることが可能。</li>
                                            </ul>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">利用者のメリット</h3>
                                            <ul class="p-ul">
                                                <li class="p-ul__item">就労形態に合わせた託児ができる</li>
                                                <li class="p-ul__item">保育所の近隣地域の方も利用できるので便利</li>
                                                <li class="p-ul__item">認可保育所並みの利用料金で利用できる</li>
                                                <li class="p-ul__item">職員数や設備に一定の基準があるので安心</li>
                                            </li>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--redorange">企業主導型保育所みらいくの特徴</h3>
                                            <p class="u-margin--b40">企業主導型保育所は認可外施設ということもあり、提供する保育サービスにも保育所ごとに大きな差があります。<br />みらいくは、子育てしながら働くお父さんやお母さんが、安心して働ける環境を作るため、保育料や保育サービス、教育方針にこだわりを持って運営しています。</p>

                                            <ul class="p-link-box">
                                                <li class="p-link-box__item"><a href="<?php echo home_url( '/quality' ); ?>" class="c-button c-button--redorange">みらいくのこだわり</a></li>
                                                <li class="p-link-box__item"><a href="<?php echo home_url( '/about/policy' ); ?>" class="c-button c-button--redorange">教育方針</a></li>
                                            </ul>

                                        </div>
                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar( 'about' ); ?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

                <div class="u-bg--circle--lightgray">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>

    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>