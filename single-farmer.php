<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__farmer" class="l-main">
            <div class="l-main__inner">
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">契約農家のご紹介</h1>
                                    <p class="secondary">contracted farmers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post();?>
                <div class="c-box u-bg--triangle">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <header class="p-page-subheader">
                                            <h2 class="primary"><?php the_title();?></h2>
                                        </header>

<?php $farmer_keyvisual = get_field('farmer_keyvisual');?>
<?php if( ! empty($farmer_keyvisual)):?>
                                        <div class="p-content-keyvisual p-content">
                                            <figure><?php echo wp_get_attachment_image( get_field('farmer_keyvisual'), 'image1560x800' ); ?></figure>
                                        </div>
<?php endif;?>

                                        <div class="p-content">
                                            <h3 class="p-heading--samonpink-s">特徴</h3>
                                            <div class="p-content-copy p-content-copy--samonpink"><?php echo nl2br(get_field('farmer_feature_copy'));?></div>
                                            <div class="p-content-text"><?php echo nl2br(get_field('farmer_feature_text'));?></div>

<?php $farmer_feature_image1 = get_field('farmer_feature_image1');?>
<?php $farmer_feature_image2 = get_field('farmer_feature_image2');?>
<?php $farmer_feature_image3 = get_field('farmer_feature_image3');?>
<?php $farmer_feature_image4 = get_field('farmer_feature_image4');?>
<?php if( ! empty($farmer_feature_image1) || ! empty($farmer_feature_image2) || ! empty($farmer_feature_image3) || ! empty($farmer_feature_image4)):?>
                                            <ul class="p-content-image-box p-content-image-box--gray">
<?php $farmer_feature_image1 = get_field('farmer_feature_image1');?>
<?php if( ! empty($farmer_feature_image1)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('farmer_feature_image1'), 'image312x312' ); ?></figure></li>
<?php endif;?>
<?php $farmer_feature_image2 = get_field('farmer_feature_image2');?>
<?php if( ! empty($farmer_feature_image2)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('farmer_feature_image2'), 'image312x312' ); ?></figure></li>
<?php endif;?>
<?php $farmer_feature_image3 = get_field('farmer_feature_image3');?>
<?php if( ! empty($farmer_feature_image3)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('farmer_feature_image3'), 'image312x312' ); ?></figure></li>
<?php endif;?>
<?php $farmer_feature_image4 = get_field('farmer_feature_image4');?>
<?php if( ! empty($farmer_feature_image4)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('farmer_feature_image4'), 'image312x312' ); ?></figure></li>
<?php endif;?>
                                            </ul>
<?php endif;?>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--samonpink-s">こだわり</h3>
<?php $farmer_detail_image = get_field('farmer_detail_image');?>
<?php if( ! empty($farmer_detail_image)):?>
                                            <div class="p-content__grid p-content__grid--space">
                                                <div class="p-content__grid__item">
                                                    <?php echo nl2br(get_field('farmer_detail_text'));?>
                                                </div>
                                                <div class="p-content__grid__item">
                                                    <figure><?php echo wp_get_attachment_image( get_field('farmer_detail_image'), 'image740x570' ); ?></figure>
                                                </div>
                                            </div>
<?php else:?>
                                            <div><?php echo nl2br(get_field('farmer_detail_text'));?></div>
<?php endif;?>
                                        </div>

                                        <div class="p-content address">
                                            <h3 class="p-heading--samonpink-s">所在地</h3>
                                            <div class="p-content__grid p-content__grid--space">
                                                <div class="p-content__grid__item">
                                                    <dl class="p-content-info p-content-info--samonpink">
<?php $farmer_location_address = get_field('farmer_location_address');?>
<?php if( ! empty($farmer_location_address)):?>
                                                        <dt>住所</dt>
                                                        <dd><?php echo nl2br(get_field('farmer_location_address'));?></dd>
<?php endif;?>
<?php $farmer_location_tel = get_field('farmer_location_tel');?>
<?php if( ! empty($farmer_location_tel)):?>
                                                        <dt>TEL</dt>
                                                        <dd><?php echo nl2br(get_field('farmer_location_tel'));?></dd>
<?php endif;?>
<?php $farmer_location_mail = get_field('farmer_location_mail');?>
<?php if( ! empty($farmer_location_mail)):?>
                                                        <dt>MAIL</dt>
                                                        <dd><a href="mailto:<?php echo nl2br(get_field('farmer_location_mail'));?>"><?php echo nl2br(get_field('farmer_location_mail'));?></a></dd>
<?php endif;?>
<?php $farmer_location_hp = get_field('farmer_location_hp');?>
<?php if( ! empty($farmer_location_hp)):?>
                                                        <dt>HP</dt>
                                                        <dd><a href="<?php echo nl2br(get_field('farmer_location_hp'));?>" target="_blank"><?php the_field('farmer_location_hp');?> <i class="fa fa-external-link" aria-hidden="true"></i></a></dd>
<?php endif;?>
                                                    </dl>
                                                </div>
                                                <div class="p-content__grid__item map"><?php the_field('farmer_location_map');?></div>
                                            </div>
                                        </div>

                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar( 'farmer' ); ?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

                <div class="u-bg--triangle">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
<?php endwhile;?>
<?php endif;?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>