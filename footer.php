                <footer class="l-footer">
                    <div id="copyright" class="c-box copyright">
                        <div class="c-box__fixed c-box__padding--lr copyright__inner">
                            <p class="copyright-text">&#169; 企業主導型保育所 みらいく</p>
                            <nav class="copyright-navi">
                                <ul class="copyright-navi__items">
                                    <li class="copyright-navi__items__item"><a href="<?php echo home_url( '/about/company' ); ?>">企業情報</a></li>
                                    <li class="copyright-navi__items__item"><a href="<?php echo home_url( '/contact' ); ?>#privacypolicy">プライバシーポリシー</a></li>
                                </ul>
                            </nav>
                        </div>
                        <p class="back-to-top"><a href="#l-canvas" class="smooth-scroll">トップへ戻る</a></p>
                    </div>
                </footer>
                <!-- Drawer -->
                <div id="js-drawer__overlay" class="p-drawer__overlay"></div>
                <div id="js-drawer__trigger" class="p-drawer__trigger">
                    <div class="bars">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                    
                <div id="js-drawer__content" class="p-drawer__content">
                    <div class="p-drawer__content__inner">
                        <nav>
                            <ul class="p-drawer__navi">
                                <li class="p-drawer__navi__item"><a href="<?php echo home_url( '/' ); ?>">ホーム</a></li>
                                <li class="p-drawer__navi__item line"><a href="<?php echo home_url( '/about/vision' ); ?>"><span class="c-icon c-icon--pencil">みらいくについて</span></a></li>
                                <li class="p-drawer__navi__item line"><a href="<?php echo home_url( '/quality' ); ?>"><span class="c-icon c-icon--heart">みらいくのこだわり</span></a></li>
                                <li class="p-drawer__navi__item line"><a href="<?php echo home_url( '/preschool' ); ?>"><span class="c-icon c-icon--house">園舎紹介</span></a></li>
                                <li class="p-drawer__navi__item line"><a href="<?php echo home_url( '/schedule' ); ?>"><span class="c-icon c-icon--calendar">年間スケジュール</span></a></li>
                                <li class="p-drawer__navi__item"><a href="<?php echo home_url( '/recruit' ); ?>"><span class="c-icon c-icon--human">採用情報</span></a></li>
                                <li class="p-drawer__navi__item p-drawer-navi__items__item--contact"><a href="<?php echo home_url( '/contact' ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> お問い合わせ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div><!-- //#js-drawer__canvas -->
        </div><!-- /.l-canvas -->
            
    
    
	<!-- Global site tag (gtag.js) - Google Ads: 734982849 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-734982849"></script><script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-734982849'); </script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163824794-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-163824794-1');
    </script>

     <?php if (!wp_is_mobile()) :?>
        <!-- Web Font -->
        <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/css/fonts/slick.woff" as="font" type="font/woff2" crossorigin>
        <!--script type="text/javascript" src="//typesquare.com/3/tsst/script/ja/typesquare.js?9LrUrwExAfY%3D" charset="utf-8"></script-->
        <!-- Page Loader -->
        <div id="js-loader" class="p-loader">
            <div class="p-loader-frame"><div class="p-loader-shape"></div></div>
        </div><!-- /.p-loader -->
     <?php endif; ?>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/minified-vendor.js<?php echo '?v=' . strtotime(date("Y-m-d H:i:s"));?>"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/minified-main.js<?php echo '?v=' . strtotime(date("Y-m-d H:i:s"));?>" async="async" defer="defer"></script>
<?php get_template_part( 'template/common', 'ga' ); ?>
<?php wp_footer(); ?>
    </body>
</html>