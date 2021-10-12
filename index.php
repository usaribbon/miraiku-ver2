<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__index" class="l-main">
            <div class="l-main__inner">   
                <aside class="c-box keyvisual">
                    <div class="slick-slider">
<?php for ($i = 0; $i < 3; $i++):?>
                        <div class="slick-slider__wrap">
                            <div class="slick-slider__slide">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/demo/1600x1200.jpg" alt="" /></figure>
                            </div>
                            <h2 class="slick-slider__copy">キャッチコピーが入ります。<br />キャッチコピーが入ります。</h2>
                        </div>
<?php endfor;?>
                    </div>
                </aside>

<?php
/* CPT */
$paged = get_query_var('paged', 1);
$args = array(
 'posts_per_page' => 4,
 'paged' => $paged,
 'orderby' => 'post_date',
 'order' => 'DESC',
 'post_type' => array('post'),
 'post_status' => 'publish'
);
?>
<?php $the_query = new WP_Query($args);?>
                <section class="c-box stripebox">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-header__section">
                            <h1 class="c-heading">リスト</h1>
                        </header>

                        <ul class="p-archive">
<?php if ($the_query->have_posts()):?>
    <?php while ($the_query->have_posts()) : $the_query->the_post();?>
                            <li class="p-archive__item">
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                                    <time><?php echo date( 'Y.m.d', strtotime($post->post_date));?></time> <?php the_title(); ?>
                                </a>
                            </li>
    <?php endwhile; ?>
                        </ul>
                        <div class="infobox__more"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="c-button c-button--arrow">一覧はこちら</a></div>
                </section>
<?php endif; ?>
<?php wp_reset_query(); ?>

<?php
/* CPT */
$paged = get_query_var('paged', 1);
$args = array(
 'posts_per_page' => 4,
 'paged' => $paged,
 'orderby' => 'post_date',
 'order' => 'DESC',
 'post_type' => array('post'),
 'post_status' => 'publish'
);
?>
<?php $the_query = new WP_Query($args);?>
                <section class="c-box stripebox">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-header">
                            <h2 class="c-heading">画像つきリスト1</h2>
                        </header>
                        <div class="panel-box">
<?php if ($the_query->have_posts()):?>
    <?php while ($the_query->have_posts()) : $the_query->the_post();?>
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="panel-box__item">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/demo/320x240.jpg" alt="" /></figure>
                                <div class="panel-box__item__inner">
                                    <?php echo date( 'Y.m.d', strtotime($post->post_date));?></time>
                                    <h3 class="heading"><?php the_title(); ?></h3>
                                    <p class="text"><?php the_excerpt(); ?></p>
                                </div>
                            </a>
    <?php endwhile; ?>
                        </div>
                        <div class="infobox__more"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="c-button c-button--arrow">一覧はこちら</a></div>
                    </div>
                </section>
<?php endif; ?>
<?php wp_reset_query(); ?>

                <section class="c-box stripebox">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-header">
                            <h2 class="c-heading">画像つきリスト2</h2>
                        </header>
                        <div class="image-box">
<?php for ($i = 0; $i < 8; $i++):?>
                            <a href="#" class="image-box__item">
                                <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/demo/320x240.jpg" alt="" /></figure>
                            </a>
<?php endfor;?>
                        </div>
                    </div>
                </section>

                <section class="c-box stripebox">
                    <div class="c-box__padding--tb">
                        <header class="c-box__fixed c-box__padding--lr p-header">
                            <h2 class="c-heading">イメージパネル</h2>
                        </header>
                        <div class="p-image-panel p-image-panel--square">
<?php for ($i = 0; $i < 5; $i++):?>
                            <div class="p-image-panel__item">
                                <a href="#" class="p-image-panel__item__inner">
                                    <p class="p-image-panel__item__copy">テキスト</p>
                                </a>
                            </div>
<?php endfor;?>
                        </div>
                    </div>
                </section>

                <section class="c-box stripebox">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-header">
                            <h2 class="c-heading">タイトル</h2>
                        </header>
                        <dl>
                            <dt>タイトル</dt>
                            <dd>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</dd>
                        </dl>
                        <dl>
                            <dt>タイトル</dt>
                            <dd>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</dd>
                        </dl>
                        <dl>
                            <dt>タイトル</dt>
                            <dd>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</dd>
                        </dl>
                        <dl>
                            <dt>タイトル</dt>
                            <dd>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</dd>
                        </dl>
                    </div>
                </section>

                <section class="c-box stripebox">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-header">
                            <h2 class="c-heading">タイトル</h2>
                        </header>
                        <div class="c-box__fixed--sm">
                            <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                        </div>
                        <div class="c-box__fixed--md">
                            <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                        </div>
                        <div class="c-box__fixed--lg">
                            <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                        </div>
                    </div>
                </section>
                
                <section class="c-box stripebox">
                    <div class="c-box__fixed c-box__padding">
                        <header class="p-header">
                            <h2 class="c-heading">基本設定</h2>
<?php /* =============== 基本設定 =============== */ ?>
<ul>
<li><?php echo site_url(); ?></li>
<li><?php the_permalink();?></li>
<li><?php the_post_thumbnail('medium');?></li>
<li><?php echo get_the_date(); ?></li>
<li><?php echo get_the_title();?></li>
<li><?php echo get_the_ID($post->ID);?></li>
<li><?php echo get_the_title($post->ID);?></li>
<li><?php echo get_the_permalink($post->ID);?></li>
</ul>
                    </div>
                </section>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>
