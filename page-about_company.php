<?php
/*
 * Template Name: page-about_company
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
									<section class="youtube">
										<iframe width="560" height="315" src="https://www.youtube.com/embed/EE5oj_hG0MQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</section>
                                    <section>
                                        <header class="p-page-subheader">
                                            <h2 class="primary">法人情報</h2>
                                        </header>

                                        <div class="p-content">
                                            <table class="p-table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">法人名</th>
                                                        <td>信州子育てみらいネット</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">代表者名</th>
                                                        <td>山岸 裕始</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">設立日</th>
                                                        <td>2015年4月10日</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">所在地</th>
                                                        <td>長野市西三才2280-1</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">電話番号</th>
                                                        <td>026-262-1572</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">業務内容</th>
                                                        <td>
                                                            <ul>
                                                                <li>保育事業</li>
                                                                <li>子育て相談、情報提供および助言事業</li>
                                                                <li>地域における支援団体とのネットワーク事業</li>
                                                                <li>子育て家庭の雇用環境を含んだより望ましい子育て環境作りの事業</li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-page-subheader-l-circle--redorange">組織図</h3>
                                            <figure class="chart"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about/chart.svg?20200414" alt="組織図" /></figure>
                                        </div>

<?php
// 園舎を一覧表示する
$page_about = get_page_by_path('about');
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'preschool',
    'status' => 'publish',
    'orderby' => 'menu_order',
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>

                                        <div class="p-content">
                                            <h3 class="p-page-subheader-l-circle--redorange">園舎リンク</h3>
                                            <ul class="p-link-box">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
<?php $preschool_link_url = get_field('preschool_link_url');?>
<?php if(empty($preschool_link_url)):?>
                                                <li class="p-link-box__item"><a href="<?php the_permalink();?>" class="c-button c-button--redorange"><?php the_title();?></a></li>
<?php else:?>
                                                <li class="p-link-box__item"><a href="<?php the_field('preschool_link_url');?>" class="c-button c-button--redorange" target="_blank"><?php the_title();?></a></li>
<?php endif;?>
<?php endwhile; ?>
                                            </ul>
                                        </div>
<?php endif;?>
<?php wp_reset_query();?>
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