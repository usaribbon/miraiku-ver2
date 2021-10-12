<?php
/*
 * Template Name: page-sickchild
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__sickchild" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">病児・病後時保育について</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="c-box">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <header class="p-page-subheader">
                                            <h2 class="primary"><?php the_field('sickchild_copy');?></h2>
                                        </header>

                                        <div class="p-content">
                                            <div class="center-pc left-sp p-editor"><?php the_field('sickchild_text');?></div>
                                        </div>

<?php if(have_rows('sickchild_preschool')): ?>
                                        <div id="sickchild10" class="p-content">
                                            <h3 class="p-heading--samonpink">実施施設</h3>
<?php while(have_rows('sickchild_preschool')): the_row(); ?>
                                            <div class="preschool">
                                                <div class="p-content__grid">
                                                    <div class="p-content__grid__item">
                                                        <figure><?php echo wp_get_attachment_image( get_sub_field('sickchild_preschool_image'), 'image700x360' ); ?></figure>
                                                    </div>
                                                    <div class="p-content__grid__item">
                                                        <h4 class="preschool__title"><?php the_sub_field('sickchild_preschool_name');?></h4>
                                                        <ul class="preschool__info">
                                                            <li class="preschool__info__item">定　　員：<?php the_sub_field('sickchild_preschool_capacity');?></li>
                                                            <li class="preschool__info__item">住　　所：<?php the_sub_field('sickchild_preschool_address');?></li>
                                                            <li class="preschool__info__item">電話番号：<?php the_sub_field('sickchild_preschool_tel');?></li>
                                                        </ul>
                                                    </div>
                                                </div>
												

<?php if ( ! empty(get_sub_field('sickchild_preschool_available')) || ! empty(get_sub_field('sickchild_preschool_etc'))):?>
<?php if ( ! empty(get_sub_field('sickchild_preschool_available'))):?>
                                                <dl class="preschool__item">
                                                    <dt class="preschool__item__title">ご利用できる方</dt>
                                                    <dd><?php the_sub_field('sickchild_preschool_available');?></dd>
                                                </dl>
<?php endif;?>
                                                
<?php if ( ! empty(get_sub_field('sickchild_preschool_etc'))):?>
                                                <dl class="preschool__item">
                                                    <dt class="preschool__item__title">その他</dt>
                                                    <dd><?php the_sub_field('sickchild_preschool_etc');?></dd>
                                                </dl>
<?php endif;?>
<?php else:?>
                                                <p class="preschool__item__title">Coming soon</p>
<?php endif;?>
                                            </div>
<?php endwhile; ?>
											<div><strong>※どの施設でも1歳2ヵ月以上でMR(風・麻疹)の予防接種をしていない方はお預かりできません。</strong></div>
                                        </div>
<?php endif; ?>

<?php $sickchild_time = get_field('sickchild_time');?>
<?php if( ! empty($sickchild_time)):?>
                                        <div id="sickchild20" class="p-content">
                                            <h3 class="p-heading--samonpink">ご利用時間</h3>
                                            <div class="p-editor">
                                                <?php the_field('sickchild_time');?>
                                            </div>
                                        </div>
<?php endif; ?>

<?php $sickchild_fee = get_field('sickchild_fee');?>
<?php if( ! empty($sickchild_fee)):?>
                                        <div id="sickchild30" class="p-content">
                                            <h3 class="p-heading--samonpink">ご利用料金</h3>
                                            <div class="p-editor">
                                                <?php the_field('sickchild_fee');?>
                                            </div>
                                        </div>
<?php endif; ?>

<?php $sickchild_lunch = get_field('sickchild_lunch');?>
<?php if( ! empty($sickchild_lunch)):?>
                                        <div id="sickchild40" class="p-content">
                                            <h3 class="p-heading--samonpink">給食</h3>
                                            <div class="p-editor">
                                                <?php the_field('sickchild_lunch');?>
                                            </div>
                                        </div>
<?php endif; ?>

<?php $sickchild_doctor = get_field('sickchild_doctor');?>
<?php if( ! empty($sickchild_doctor)):?>
                                        <div id="sickchild50" class="p-content">
                                            <h3 class="p-heading--samonpink">嘱託医</h3>
                                            <div class="p-editor">
                                                <?php the_field('sickchild_doctor');?>
                                            </div>
                                        </div>
<?php endif; ?>

<?php $sickchild_pickupsupport = get_field('sickchild_pickupsupport');?>
<?php if( ! empty($sickchild_pickupsupport)):?>
                                        <div id="sickchild60" class="p-content">
                                            <h3 class="p-heading--samonpink">お迎えサポート</h3>
                                            <div class="p-editor">
                                                <?php the_field('sickchild_pickupsupport');?>
                                            </div>
                                        </div>
<?php endif; ?>

<?php $sickchild_preregistration = get_field('sickchild_preregistration');?>
<?php if( ! empty($sickchild_preregistration)):?>
                                        <div id="sickchild70" class="p-content">
                                            <h3 class="p-heading--samonpink">事前登録</h3>
                                            <div class="p-editor">
                                                <?php the_field('sickchild_preregistration');?>
                                            </div>
                                        </div>
<?php endif; ?>

<?php if(have_rows('sickchild_flow')): ?>
<?php $count = 1;?>
                                        <div id="sickchild80" class="p-content">
                                            <h3 class="p-heading--samonpink">ご利用までの流れ</h3>
                                            <div class="step-box">
<?php while(have_rows('sickchild_flow')): the_row(); ?>
                                                <div class="step-box__item">
                                                    <h4 class="title"><span class="seq">STEP<?php echo $count;?>.</span><?php the_sub_field('sickchild_flow_title');?></h4>
                                                    <div class="text p-editor">
                                                        <?php the_sub_field('sickchild_flow_text');?>
                                                    </div>
                                                </div>
<?php $count++;?>
<?php endwhile; ?>
                                            </div>
                                        </div>
<?php endif; ?>
                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item">
<?php get_sidebar( 'sickchild' ); ?>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.c-box -->

<?php get_template_part( 'template/common', 'footer_navi' ); ?>

    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>