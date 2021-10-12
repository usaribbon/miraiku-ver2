<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__preschool" class="l-main">
            <div class="l-main__inner">
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">園舎紹介</h1>
                                    <p class="secondary">preschool</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post();?>
                <div class="c-box u-bg--stripe--type1">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <header class="p-page-subheader">
                                            <h2 class="primary"><?php the_title();?></h2>
                                        </header>

<?php $preschool_keyvisual = get_field('preschool_keyvisual');?>
<?php if( ! empty($preschool_keyvisual)):?>
                                        <div class="p-content-keyvisual p-content">
                                            <figure><?php echo wp_get_attachment_image( get_field('preschool_keyvisual'), 'image1560x800' ); ?></figure>
                                        </div>
<?php endif;?>

                                        <div class="p-content">
                                            <h3 class="p-heading--seagreen-s">園の特徴</h3>
                                            <div class="p-content-copy p-content-copy--seagreen"><?php echo nl2br(get_field('preschool_feature_copy'));?></div>
                                            <div class="p-content-text p-editor"><?php the_field('preschool_feature_text');?></div>

<?php $preschool_feature_image1 = get_field('preschool_feature_image1');?>
<?php $preschool_feature_image2 = get_field('preschool_feature_image2');?>
<?php $preschool_feature_image3 = get_field('preschool_feature_image3');?>
<?php $preschool_feature_image4 = get_field('preschool_feature_image4');?>
<?php if( ! empty($preschool_feature_image1) || ! empty($preschool_feature_image2) || ! empty($preschool_feature_image3) || ! empty($preschool_feature_image4)):?>
                                            <ul class="p-content-image-box">
<?php $preschool_feature_image1 = get_field('preschool_feature_image1');?>
<?php if( ! empty($preschool_feature_image1)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('preschool_feature_image1'), 'image312x312' ); ?></figure></li>
<?php endif;?>
<?php $preschool_feature_image2 = get_field('preschool_feature_image2');?>
<?php if( ! empty($preschool_feature_image2)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('preschool_feature_image2'), 'image312x312' ); ?></figure></li>
<?php endif;?>
<?php $preschool_feature_image3 = get_field('preschool_feature_image3');?>
<?php if( ! empty($preschool_feature_image3)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('preschool_feature_image3'), 'image312x312' ); ?></figure></li>
<?php endif;?>
<?php $preschool_feature_image4 = get_field('preschool_feature_image4');?>
<?php if( ! empty($preschool_feature_image4)):?>
                                                <li class="p-content-image-box__item"><figure><?php echo wp_get_attachment_image( get_field('preschool_feature_image4'), 'image312x312' ); ?></figure></li>
<?php endif;?>
                                            </ul>
<?php endif;?>
                                        </div>

<?php $preschool_schedule = get_field('preschool_schedule');
	  $preschool_calender = get_field('preschool_calender');?>
<?php if( ! empty($preschool_schedule)):?>
                                        <div id="schedule" class="p-content">
                                            <h3 class="p-heading--seagreen-s">年間スケジュール</h3>
                                            <p class="center-pc left-sp">みらいくでは、年間を通して様々なイベントを行っております。</p>
                                            <p class="u-align--center"><a href="<?php the_field('preschool_schedule');?>" class="c-button c-button--l c-button--brightyellow">年間スケジュールPDF</a></p>
                                            <div class="google-calendar">
                                            <?php if( ! empty($preschool_calender)):
                                           		the_field('preschool_calender');
											endif; ?>
                                            </div>
                                        </div>
<?php endif; ?>

                                        <!--<div class="p-content">
                                            <h3 class="p-heading--seagreen-s">利用者さまの声</h3>
<?php if(have_rows('preschool_voice')): ?>
<?php while(have_rows('preschool_voice')): the_row(); ?>
                                            <div class="p-content-voice p-content-voice--seagreen">
                                                <div class="p-content-voice__copy"><?php echo nl2br(get_sub_field('preschool_voice_copy'));?></div>
                                                <div class="p-content-voice__text"><?php echo nl2br(get_sub_field('preschool_voice_text'));?></div>
                                                <p class="p-content-voice__from"><?php the_sub_field('preschool_voice_info');?></p>
                                            </div>
<?php endwhile; ?>
<?php else: ?>
                                            <p>Comming soon</p>
<?php endif; ?>
                                        </div>-->

                                        <div class="p-content">
                                            <h3 class="p-heading--seagreen-s">職員の紹介</h3>
<?php if(have_rows('preschool_staff')): ?>
<?php while(have_rows('preschool_staff')): the_row(); ?>
                                            <div class="p-content__grid p-content-staff">
                                                <div class="p-content__grid__item">
                                                    <figure><?php echo wp_get_attachment_image( get_sub_field('preschool_staff_image'), 'image580x470' ); ?></figure>
                                                </div>
                                                <div class="p-content__grid__item u-flex-grow">
                                                    <h3 class="p-content-staff__name"><?php if (the_sub_field('preschool_staff_position')) { ?><span class="position"><?php the_sub_field('preschool_staff_position');?></span><?php } ?><?php the_sub_field('preschool_staff_name');?></h3>
                                                    <div class="p-content-staff__text"><?php echo nl2br(get_sub_field('preschool_staff_text'));?></div>

                                                </div>
                                            </div>
<?php endwhile; ?>
<?php else: ?>
                                            <p>Comming soon</p>
<?php endif; ?>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--seagreen-s">園での一日</h3>
<?php $preschool_timetable_image = get_field('preschool_timetable_image');?>
<?php if( ! empty($preschool_timetable_image)):?>
                                            <div class="p-content__grid p-content__grid--space">
                                                <div class="p-content__grid__item">

<?php if(have_rows('preschool_timetable')): ?>
                                                    <table class="p-content-schedule">
                                                        <tbody>
<?php while(have_rows('preschool_timetable')): the_row(); ?>
                                                            <tr>
                                                                <th scope="row"><?php the_sub_field('preschool_timetable_time');?></th>
                                                                <td><?php echo nl2br(get_sub_field('preschool_timetable_text'));?></td>
                                                            </tr>
<?php endwhile; ?>
                                                        </tbody>
                                                    </table>
<?php endif; ?>

                                                </div>
                                                <div class="image p-content__grid__item">
                                                    <figure><?php echo wp_get_attachment_image( get_field('preschool_timetable_image'), 'image740x570' ); ?></figure>
                                                </div>
                                            </div>
<?php else: ?>
<?php if(have_rows('preschool_timetable')): ?>
                                                    <table class="p-content-schedule">
                                                        <tbody>
<?php while(have_rows('preschool_timetable')): the_row(); ?>
                                                            <tr>
                                                                <th scope="row"><?php the_sub_field('preschool_timetable_time');?></th>
                                                                <td><?php echo nl2br(get_sub_field('preschool_timetable_text'));?></td>
                                                            </tr>
<?php endwhile; ?>
                                                        </tbody>
                                                    </table>
<?php endif; ?>
<?php endif; ?>
                                        </div>

<?php $preschool_about_text = get_field('preschool_about_text');?>
<?php if( ! empty($preschool_about_text)):?>
                                        <div class="p-content">
                                            <h3 class="p-heading--seagreen-s">入園・見学・園開放について</h3>
                                            <div>
                                                <?php echo nl2br(get_field('preschool_about_text'));?>
                                            </div>
                                        </div>
<?php endif; ?>

                                        <div class="p-content address">
                                            <h3 class="p-heading--seagreen-s">所在地</h3>
                                            <div class="p-content__grid p-content__grid--space">
                                                <div class="p-content__grid__item">
                                                    <dl class="p-content-info p-content-info--seagreen">
<?php $preschool_location_address = get_field('preschool_location_address');?>
<?php if( ! empty($preschool_location_address)):?>
                                                        <dt>住所</dt>
                                                        <dd><?php echo nl2br(get_field('preschool_location_address'));?></dd>
<?php endif; ?>
<?php $preschool_location_tel = get_field('preschool_location_tel');?>
<?php if( ! empty($preschool_location_tel)):?>
                                                        <dt>TEL</dt>
                                                        <dd><?php echo nl2br(get_field('preschool_location_tel'));?></dd>
<?php endif; ?>
                                                    </dl>
                                                </div>
                                                <div class="p-content__grid__item map"><?php the_field('preschool_location_map');?></div>
                                            </div>
                                        </div>

                                        <div class="p-content">
                                            <h3 class="p-heading--seagreen-s">運営企業</h3>
                                            <p><a href="">一般社団法人信州子育てみらいネット</a></p>
                                        </div>

                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar( 'preschool' ); ?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

                <div class="u-bg--stripe--type1">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
<?php endwhile;?>
<?php endif;?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>
