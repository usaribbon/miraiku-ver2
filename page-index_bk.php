<?php
/*
 * Template Name: page-index
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main id="l-main" class="l-main">
            <div id="page__index" class="l-main__inner keyvisual-after">
                <section class="vision c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-page-subheader-with-theme">
                            <h2 class="primary">VISION</h2>
                            <p class="copy">子育てしやすい未来をつくる</p>
                        </header>

                        <div class="p-content-box">
                            <div class="text center-pc left-sp">みらいくは「ちいきの」の保育園です。 <br class="hide-sp" />
子育て世代に限らず、文化活動・お祭り・防犯・防災・世代間交流等幅広く<br class="hide-sp" />
「ちいき」に根ざした活動に関わっていきます。<br class="hide-sp" />
地域と子育て世代を繋ぐことでお父さんやお母さんがイキイキと働き、楽しく子育てをする。 <br class="hide-sp" />
そんな社会はきっと心豊かな子どもを育むでしょう。<br class="hide-sp" />
みらいくは、子育てしやすい社会を目指し、笑顔あふれる未来をつくりたいと願っています。</div>

                            <p class="u-align--center"><a href="<?php echo home_url( '/about/vision' ); ?>" class="c-button c-button--l c-button--redorange">みらいくについて</a></p>
                        </div>
                    </div>
                </section>

                <section class="c-box u-bg--triangle">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-page-section-header p-page-section-header--heart">
                            <h2 class="primary">みらいくのこだわり</h2>
                            <p class="sectondary">4 unique Miraiku qualities</p>
                        </header>

                        <div class="quality">
                            <div class="quality__item">
                                <div class="quality__item__inner">
                                    <h3 class="heading">POINT<span>01</span></h3>
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/quality1@2x.png" alt="安全な食材を使ったおいしい給食" /></figure>
                                    <p class="text">安全な食材を使った<br class="show-sp hide-pc">おいしい給食</p>
                                    <p class="u-align--center"><a href="<?php echo home_url( '/quality' ); ?>#point1" class="c-button c-button--m c-button--paleblue">詳しく見る</a></p>
                                </div>
                            </div>

                            <div class="quality__item">
                                <div class="quality__item__inner">
                                    <h3 class="heading">POINT<span>02</span></h3>
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/quality2@2x.png" alt="木をふんだんに使った快適な保育室" /></figure>
                                    <p class="text">木をふんだんに使った<br class="show-sp hide-pc">快適な保育室</p>
                                    <p class="u-align--center"><a href="<?php echo home_url( '/quality' ); ?>#point2" class="c-button c-button--m c-button--paleblue">詳しく見る</a></p>
                                </div>
                            </div>

                            <div class="quality__item">
                                <div class="quality__item__inner">
                                    <h3 class="heading">POINT<span>03</span></h3>
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/quality3@2x.png" alt="病児・病後児の保育も可能" /></figure>
                                    <p class="text">病児・病後児の保育も可能</p>
                                    <p class="u-align--center"><a href="<?php echo home_url( '/quality' ); ?>#point3" class="c-button c-button--m c-button--paleblue">詳しく見る</a></p>
                                </div>
                            </div>

                            <div class="quality__item">
                                <div class="quality__item__inner">
                                    <h3 class="heading">POINT<span>04</span></h3>
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/quality4@2x.png" alt="保育料実質０円" /></figure>
                                    <p class="text">保育料実質０円</p>
                                    <p class="u-align--center"><a href="<?php echo home_url( '/quality' ); ?>#point4" class="c-button c-button--m c-button--paleblue">詳しく見る</a></p>
                                </div>
                            </div>
                        </div>

<?php
// 今日の給食を一覧表示する
$page_about = get_page_by_path('about');
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'status' => 'publish',
    'orderby' => 'desc',
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                        <div class="p-todayslunch u-frame--arc">
                            <div class="grid">
                                <div class="image grid__item">
                                    <figure class="image u-frame--brackets"><?php the_post_thumbnail( 'image830x630' ); ?></figure>
                                </div>
                                <div class="content grid__item">
                                    <header class="p-todayslunch-header">
                                        <h2 class="primary">今日の給食</h2>
                                        <p class="secondary">Today's lunch</p>
                                    </header>
                                    <div class="recipe p-editor">
                                        <div class="p-editor">
                                            <?php the_content();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="u-align--center"><a href="https://chiikihoiku.net/lunch/" class="c-button c-button--l c-button--samonpink">これまでの給食</a></p>
                        </div>
<?php endwhile; ?>
<?php endif;?>
<?php wp_reset_query();?>
                    </div>
                </section>

                <section class="c-box u-bg--stripe--type1">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-page-section-header p-page-section-header--pencil">
                            <h2 class="primary">みらいくについて</h2>
                            <p class="sectondary">about Miraiku</p>
                        </header>
                        <div class="about-miraiku">
                            <div class="about-miraiku__item">
                                <a href="<?php echo home_url( '/about/policy' ); ?>">
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/about1@2x.jpg" alt="" /></figure>
                                    <h3 class="heading">教育方針</h3>
                                </a>
                            </div>

                            <div class="about-miraiku__item">
                                <a href="<?php echo home_url( '/preschool' ); ?>">
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/about2@2x.jpg" alt="" /></figure>
                                    <h3 class="heading">園舎紹介</h3>
                                </a>
                            </div>

                            <div class="about-miraiku__item">
                                <a href="<?php echo home_url( '/schedule' ); ?>">
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/about3@2x.jpg" alt="" /></figure>
                                    <h3 class="heading">年間スケジュール</h3>
                                </a>
                            </div>
							
							<div class="about-miraiku__item">
                                <a href="<?php echo home_url( '/newspaper' ); ?>">
                                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/index/about4@2x.jpg" alt="" /></figure>
                                    <h3 class="heading">みらいく新聞</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="u-bg--stripe--type1">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>