<?php
/*
 * Template Name: page-contact
 */
get_header(); ?>
<?php /* =============== BODY START =============== */ ?>

        <main role="main" id="page__contact" class="l-main">
            <div class="l-main__inner">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
                <header class="p-page-header">
                    <div class="p-page-header__inner">
                        <div class="c-box">
                            <div class="c-box__fixed c-box__padding--lr">
                                <div class="heading-group">
                                    <h1 class="primary">お問い合わせ</h1>
                                    <p class="secondary">contact</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="c-box u-bg--circle--lightgray">
                    <div class="c-box__fixed c-box__padding">
                        <div class="p-content p-content--s">
                            <div class="contact-form">
<?php the_content();?>
                            </div>
                        </div>

                        <div id="privacypolicy" class="p-content p-content--s privacypolicy">
                            <h3 class="p-heading--green">プライバシーポリシー</h3>

                            <h4 class="title">【個人情報の取り扱いについて】</h4>
                            <p>みらくいでは、個人情報の性格と重要性を十分に認識し、園児ならびに保護者・家庭に関わる個人情報の取り扱いについては、関係法令及び厚生労働省が定めたガイドラインを遵守するとともに、「個人情報保護の方針」を定め、個人情報の適切な保護に万全を尽くすとともに、よりよい保育のため適正に活用していくことにより、保護者のみならず地域から信頼される保育園を目指します。<br />
また、職員に対しては入職時に、実習・ボランティアへの参加者に対しては開始前のオリエンテーションの際に誓約書を取り交わすとともに、個人情報保護に関する意識啓発に努めています。</p>

                            <h4 class="title">【個人情報保護に関して保護者の方へのお願い】</h4>
                            <p>個人情報保護に対する基本方針に基づき、当園では、個人情報が外部に出ることのないように当園職員に周知徹底しております。<br />
ただし、下記の情報管理については当園で把握することが困難でございます。</p>

                            <ul>
                                <li>保護者の方が行事やイベントでの撮影された写真、ビデオ</li>
                                <li>業務委託など外部の者による写真撮影やビデオ録画</li>
                                <li>その他、上記以外で情報の把握が難しいと思われるもの</li>
                                <li>保護者の方や第三者によるインターネット上での掲載（ブログなど）</li>
                            </ul>

                            <p>つきましては、保護者さまが持ち出された情報はお子さまの成長記録以外に使用しないというご協力をお願いします。</p>
                        </div>
                    </div>

                </section><!-- /.c-box -->
<style>
.mw_wp_form_preview .form_lead{ display:none; }
</style>
                <div class="u-bg--circle--lightgray">
<?php get_template_part( 'template/common', 'footer_navi' ); ?>
                </div>
                
    <?php endwhile; ?>
<?php endif; ?>
            </div>
        </main>

<?php /* =============== BODY END =============== */ ?>
<?php get_footer(); ?>