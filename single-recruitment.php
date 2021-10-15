<?php get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__recruitment" class="l-main">
            <div class="l-main__inner">
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">求人情報</h1>
                                    <p class="secondary">job information</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>


                <!--  求人情報 -->
                <section class="c-box u-bg--circle--lightpurple">
                    <div class="c-box__fixed c-box__padding">
                        <div class="c-column">
                            <div class="c-column__inner">
                                <div class="c-column__item">
                                    <section>
                                        <div class="p-content">
                                            <?php if ( have_posts() ) :?>

                                            <?php
                                            //職種アイコンの表示
                                            $terms = get_the_terms( $post->ID, 'recruitment_category' );
                                            if ($terms) {
                                                foreach($terms as $term) {
                                                  echo '<div class="job-category">'.$term->name.'</div>';
                                                } 
                                            }

                                           ?>
                                            
                                            <h2 class="recruit-box__item__name center-sp"><?php the_title();?></h2>

                                            <?php
                                            //職業の特徴アイコンの表示
                                            $check_position = get_field('check_position');
                                            if( $check_position ): ?>
                                            <?php foreach( $check_position as $pos ): ?>
                                                <span class="job-type"><?php echo $pos; ?></span>
                                            <?php endforeach; ?>
                                            <?php endif; ?>

                                            <?php $label = get_field_object('job_description');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__title center-sp"><?php the_field('job_description');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('qualification');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__position center-sp"><?php the_field('qualification');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('number_positions');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <?php 
                                                //主張アイコン
                                                $check = get_field('check_background');
                                                if( $check ): ?>
                                                <div class="iconArea">
                                                <?php foreach( $check as $c ): ?>
                                                    <span class="icon icon--feature"><?php echo $c; ?></span>
                                                <?php endforeach; ?>
                                                </div>
                                                <?php endif; ?>
                                                <p class="recruit-box__item__position center-sp"><?php the_field('number_positions');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('location');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__title center-sp"><?php the_field('location');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('access');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__position center-sp"><?php the_field('access');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('job_time');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__position center-sp"><?php the_field('job_time');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('salary');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__title center-sp"><?php the_field('salary');?></p>
                                            <?php endif;?>


                                            <?php $label = get_field_object('holiday');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                
                                                <?php 
                                                //主張アイコン
                                                $check = get_field('check_holiday');
                                                if( $check ): ?>
                                                <div class="iconArea">
                                                <?php foreach( $check as $c ): ?>
                                                    <span class="icon icon--feature"><?php echo $c; ?></span>
                                                <?php endforeach; ?>
                                                </div>
                                                <?php endif; ?>

                                                <p class="recruit-box__item__title center-sp"><?php the_field('holiday');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('welfare');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <?php 
                                                //主張アイコン
                                                $check = get_field('check_welfare');
                                                if( $check ): ?>
                                                <div class="iconArea">
                                                <?php foreach( $check as $c ): ?>
                                                    <span class="icon icon--feature"><?php echo $c; ?></span>
                                                <?php endforeach; ?>
                                                </div>
                                                <?php endif; ?>
                                                <p class="recruit-box__item__position center-sp"><?php the_field('welfare');?></p>
                                            <?php endif;?>

                                            <?php $label = get_field_object('etc');?>
                                            <?php if ( strlen($label['value'])>0 ) :?>
                                                <h3 class="p-heading--grapepurple"><?php echo $label['label'];?></h3>
                                                <p class="recruit-box__item__position center-sp"><?php the_field('etc');?></p>
                                            <?php endif;?>
                                        </div>
                                          <?php endif;?>
                                    </section>
                                </div><!-- /.c-column__primary -->

                                <div class="c-column__item"><!-- c-column__item -->
                                    <div class="p-widget p-widget--grapepurple">
                                        <h2 class="title">求人情報</h2>
                                        <ul class="list">
                                            <li class="list__item"><a href="../../recruit/#rec1"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 中途採用</a></li>
                                            <li class="list__item"><a href="../../recruit/#rec2"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 新卒採用</a></li>
                                            <li class="list__item"><a href="../../recruit/#rec3"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> アルバイト</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /.c-column__secondary -->
                            </div>
                        </div>
                    </div><!-- /.c-box__fixed c-box__padding -->
                </section><!-- 求人情報section -->

                <div class="u-bg--circle--lightpurple">
<?php get_template_part( 'template/common', 'contact_box' ); ?>
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>
