                <div class="footer-navi">
                    <aside class="footer-navi__inner u-bg--roof">
                        <div class="c-box__fixed c-box__padding">
                            <div class="table">
                                <div class="logo table_cell">
                                    <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/common/logo2.svg" alt="企業主導型保育所 みらいく" /></a>
                                </div>
                                <nav class="navi table__cell hide-sp">
                                    <h2 class="navi__heading"><span class="c-icon c-icon--pencil"><a href="<?php echo home_url( '/about/vision' ); ?>">みらいくについて</a></span></h2>
                                    <ul class="navi__items">
                                        <li class="navi__items__item"><a href="<?php echo home_url( '/about/vision' ); ?>">ビジョン</a></li>
                                        <li class="navi__items__item"><a href="<?php echo home_url( '/about/policy' ); ?>">教育方針</a></li>
                                        <li class="navi__items__item"><a href="<?php echo home_url( '/about/company' ); ?>">法人情報</a></li>
                                    </ul>
                                    <h2 class="navi__heading"><span class="c-icon c-icon--heart"><a href="<?php echo home_url( '/quality' ); ?>">みらいくのこだわり</a></span></h2>

<?php
/* 農園の最新の一件を表示 */
$page_about = get_page_by_path('about');
$args = array(
    'posts_per_page' => 1,
    'post_type' => 'farmer',
    'status' => 'publish',
    'orderby' => 'menu_order',
    );
?>
<?php $the_query = new WP_Query($args);?>
<?php if ($the_query->have_posts()):?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                    <ul class="navi__items">
                                        <li class="navi__items__item"><a href="<?php the_permalink();?>">生産者のご紹介</a></li>
                                        <li class="navi__items__item"><a href="/sickchild/">病児・病後時保育について</a></li>
                                    </ul>
<?php endwhile; ?>
<?php endif;?>
<?php wp_reset_query();?>
                                </nav>
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
                                <nav class="navi table__cell hide-sp">
                                    <h2 class="navi__heading"><span class="c-icon c-icon--house"><a href="<?php echo home_url( '/preschool' ); ?>">園舎紹介</a></span></h2>
                                    <ul class="navi__items">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>

<?php $preschool_link_url = get_field('preschool_link_url');?>
<?php if(empty($preschool_link_url)):?>
                                        <li class="navi__items__item"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
<?php else:?>
                                        <li class="navi__items__item"><a href="<?php the_field('preschool_link_url');?>" target="_blank"><?php the_title();?></a></li>
<?php endif;?>

<?php endwhile; ?>
                                    </ul>
                                </nav>
<?php endif;?>
<?php wp_reset_query();?>

<?php
// 園舎を一覧表示する（スケジュール）
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
                                <nav class="navi table__cell hide-sp">
                                    <h2 class="navi__heading"><span class="c-icon c-icon--calendar"><a href="<?php echo home_url( '/schedule' ); ?>">年間スケジュール</a></span></h2>
                                    <ul class="navi__items">
<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>

<?php $preschool_link_url = get_field('preschool_link_url');?>
<?php if(empty($preschool_link_url)):?>
                                        <li class="navi__items__item"><a href="<?php the_permalink();?>#schedule"><?php the_title();?></a></li>
<?php else:?>
                                        <li class="navi__items__item"><a href="<?php the_field('preschool_link_url');?>" target="_blank"><?php the_title();?></a></li>
<?php endif;?>

<?php endwhile; ?>
                                    </ul>
                                </nav>
<?php endif;?>
<?php wp_reset_query();?>
                                <nav class="navi table__cell hide-sp">
                                    <h2 class="navi__heading"><span class="c-icon c-icon--human"><a href="<?php echo home_url( '/recruit' ); ?>">採用情報</a></span></h2>
                                </nav>
                                <nav class="navi table__cell">
                                    <ul class="navi__buttons">
                                        <li class="navi__buttons__item"><a href="<?php echo home_url( '/contact' ); ?>" class="p-contact_button"><i class="fa fa-envelope-o" aria-hidden="true"></i> お問い合わせ</a></li>
                                        <li class="navi__buttons__item"><a href="https://www.facebook.com/chiikihoiku/" class="p-fb_button" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </aside>
                </div>
