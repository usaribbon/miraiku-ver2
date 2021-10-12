// Copyright (c) 2013 Keith Perhac @ DelfiNet (http://delfi-net.com)
//
// Based on the AutoRuby library created by:
// Copyright (c) 2005-2008 spinelz.org (http://script.spinelz.org/)
//
// Permission is hereby granted, free of charge, to any person obtaining
// a copy of this software and associated documentation files (the
// "Software"), to deal in the Software without restriction, including
// without limitation the rights to use, copy, modify, merge, publish,
// distribute, sublicense, and/or sell copies of the Software, and to
// permit persons to whom the Software is furnished to do so, subject to
// the following conditions:
//
// The above copyright notice and this permission notice shall be
// included in all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
// EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
// NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
// LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
// OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
// WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

(function ($) {
    $.fn.autoKana = function (element1, element2, passedOptions) {

        var options = $.extend(
            {
                'katakana': false
            }, passedOptions);

        var kana_extraction_pattern = new RegExp('[^ 　ぁあ-んー]', 'g');
        var kana_compacting_pattern = new RegExp('[ぁぃぅぇぉっゃゅょ]', 'g');
        var elName,
            elKana,
            active = false,
            timer = null,
            flagConvert = true,
            input,
            values,
            ignoreString,
            baseKana;

        elName = $(element1);
        elKana = $(element2);
        active = true;
        _stateClear();

        elName.blur(_eventBlur);
        elName.focus(_eventFocus);
        elName.keydown(_eventKeyDown);

        function start() {
            active = true;
        };

        function stop() {
            active = false;
        };

        function toggle(event) {
            var ev = event || window.event;
            if (event) {
                var el = Event.element(event);
                if (el.checked) {
                    active = true;
                } else {
                    active = false;
                }
            } else {
                active = !active;
            }
        };

        function _checkConvert(new_values) {
            if (!flagConvert) {
                if (Math.abs(values.length - new_values.length) > 1) {
                    var tmp_values = new_values.join('').replace(kana_compacting_pattern, '').split('');
                    if (Math.abs(values.length - tmp_values.length) > 1) {
                        _stateConvert();
                    }
                } else {
                    if (values.length == input.length && values.join('') != input) {
                        if (input.match(kana_extraction_pattern)) {
                            _stateConvert();
                        }
                    }
                }
            }
        };

        function _checkValue() {
            var new_input, new_values;
            new_input = elName.val()
            if (new_input == '') {
                _stateClear();
                _setKana();
            } else {
                new_input = _removeString(new_input);
                if (input == new_input) {
                    return;
                } else {
                    input = new_input;
                    if (!flagConvert) {
                        new_values = new_input.replace(kana_extraction_pattern, '').split('');
                        _checkConvert(new_values);
                        _setKana(new_values);
                    }
                }
            }
        };

        function _clearInterval() {
            clearInterval(timer);
        };

        function _eventBlur(event) {
            _clearInterval();
        };
        function _eventFocus(event) {
            _stateInput();
            _setInterval();
        };
        function _eventKeyDown(event) {
            if (flagConvert) {
                _stateInput();
            }
        };
        function _isHiragana(chara) {
            return ((chara >= 12353 && chara <= 12435) || chara == 12445 || chara == 12446);
        };
        function _removeString(new_input) {
            if (new_input.indexOf(ignoreString) !== -1) {
                return new_input.replace(ignoreString, '');
            } else {
                var i, ignoreArray, inputArray;
                ignoreArray = ignoreString.split('');
                inputArray = new_input.split('');
                for (i = 0; i < ignoreArray.length; i++) {
                    if (ignoreArray[i] == inputArray[i]) {
                        inputArray[i] = '';
                    }
                }
                return inputArray.join('');
            }
        };
        function _setInterval() {
            var self = this;
            timer = setInterval(_checkValue, 30);
        };
        function _setKana(new_values) {
            if (!flagConvert) {
                if (new_values) {
                    values = new_values;
                }
                if (active) {
                    var _val = _toKatakana(baseKana + values.join(''));
                    elKana.val(_val);
                }
            }
        };
        function _stateClear() {
            baseKana = '';
            flagConvert = false;
            ignoreString = '';
            input = '';
            values = [];
        };
        function _stateInput() {
            baseKana = elKana.val();
            flagConvert = false;
            ignoreString = elName.val();
        };
        function _stateConvert() {
            baseKana = baseKana + values.join('');
            flagConvert = true;
            values = [];
        };
        function _toKatakana(src) {
            if (options.katakana) {
                var c, i, str;
                str = new String;
                for (i = 0; i < src.length; i++) {
                    c = src.charCodeAt(i);
                    if (_isHiragana(c)) {
                        str += String.fromCharCode(c + 96);
                    } else {
                        str += src.charAt(i);
                    }
                }
                return str;
            } else {
                return src;
            }
        }
    };
})(jQuery);

/*!--------------------------------------------------------------------------*
 *  
 *  jquery.heightLine.js
 *  
 *  MIT-style license. 
 *  
 *  2013 Kazuma Nishihata 
 *  http://www.to-r.net
 *  
 *--------------------------------------------------------------------------*/
;(function($){
	$.fn.heightLine = function(){
		var target = this,fontSizeChangeTimer,windowResizeId= Math.random();
		var heightLineObj = {
			op : {
				"maxWidth" : 10000,
				"minWidth" : 0,
				"fontSizeCheck" : false
			},
			setOption : function(op){
				this.op = $.extend(this.op,op);
			},
			destroy : function(){
				target.css("height","");
			},
			create : function(op){
				var self = this,
					maxHeight = 0,
					windowWidth = $(window).width();
				self.setOption(op);
				if( windowWidth<=self.op.maxWidth && windowWidth>=self.op.minWidth ){
					target.each(function(){
						if($(this).outerHeight()>maxHeight){
							maxHeight = $(this).outerHeight();
						}
					}).each(function(){
						var height = maxHeight
								   - parseInt($(this).css("padding-top"))
								   - parseInt($(this).css("padding-bottom"));
						$(this).height(height);
					});
				}
			},
			refresh : function(op){
				this.destroy();
				this.create(op);
			},
			removeEvent :function(){
				$(window).off("resize."+windowResizeId);
				target.off("destroy refresh");
				clearInterval(fontSizeChangeTimer);
			}
		}
		if(typeof arguments[0] === "string" && arguments[0] === "destroy"){
			target.trigger("destroy");
		}else if(typeof arguments[0] === "string" && arguments[0] === "refresh"){
			target.trigger("refresh");
		}else{
			heightLineObj["create"](arguments[0]);
			
			$(window).on("resize."+windowResizeId,function(){
				heightLineObj["refresh"]();
			});

			target.on("destroy",function(){
				heightLineObj["removeEvent"]();
				heightLineObj["destroy"]();
			}).on("refresh",function(){
				heightLineObj["refresh"]();
			});

			if(heightLineObj.op.fontSizeCheck){
				
				if($("#fontSizeChange").length<=0){
					var fontSizeChange = $("<span id='fontSizeChange'></span>").css({
						width:0,
						height:"1em",
						position:"absolute",
						left:0,
						top:0
					}).appendTo("body");
				}
				var defaultFontSize = $("#fontSizeChange").height();
				fontSizeChangeTimer = setInterval(function(){
					if(defaultFontSize != $("#fontSizeChange").height()){
						heightLineObj["refresh"]();
					}
				},100);
			}
		}
		return target;
	}
})(jQuery);

(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";
/**
 * Base
 *
 * version 1.0
 * Copyright Hirotomo Kambe
 */
var Base = function() {
};

/**
 * _
 * id名から該当の要素を返す
 *
 * @param {string} elm
 * @return {Object} obj
 */
Base.prototype._= function(elm) {
    var obj = document.getElementById(elm);
    return obj;
};

/**
 * exec
 * コンストラクタ
 *
 * @return {void}
 */
Base.prototype.exec = function() {
    //console.log(1);
};

/**
 * object-assign定義
 */
var objectAssign = require('object-assign');

/**
 * inherits
 * 継承用メソッド
 *
 * @param {Object} childCtor
 * @param {Object} parentCtor
 * @return {void}
 * https://github.com/google/closure-library/blob/master/closure/goog/base.js#L2170
 */
function inherits(childCtor, parentCtor) {
    if (!Object.getPrototypeOf) {
        /** @constructor */
        tempCtor.prototype = parentCtor.prototype;
        childCtor.superClass_ = parentCtor.prototype;
        childCtor.prototype = new tempCtor();

        /** @override */
        childCtor.prototype.constructor = childCtor;
    } else {
        Object.setPrototypeOf(childCtor.prototype, parentCtor.prototype);
    }

    var obj = new childCtor();
    obj.exec();
}

/**
 * tempCtor
 * 継承用ダミー
 *
 * @return {void}
 */
function tempCtor() {}

/**
 * pluginExists
 * プラグインの有無をチェック
 *
 * @param {string} pluginName
 * @return {boolean} result
 */
function pluginExists(pluginName) {
    var result = $.fn[pluginName] ? true : false;
    //var prefix = "Message:\n";
    //var postfix = "\n";
    //if(!result) {
    //    var output = prefix + pluginName + " is not defined." + postfix;
    //    console.log(output);
    //}
    return result;
}

"use strict";
/*!
 * PageLoader ver. 1.0
 * Copyright Hirotomo Kambe
 */

var PageLoader = function() {
    Base.call(this);
    objectAssign(this, Base);

    this.is_page_fadein = false;
};

PageLoader.prototype.exec = function() {
    this.loader();
};

PageLoader.prototype.loader = function() {
    if (this.is_page_fadein) {
        //ホストを取得
        var pattern = location.host;
        var regexp = new RegExp('(http:|https:)?//' + pattern + '(\/)?', 'i');

        // 遷移時のアニメーションは不要
        $('a[target != "_blank"]').click(function(){
            // クリックされたリンクのURIを取得
            var uri = $(this).attr('href');

            // ページ内リンクであるかどうかを判別
            var is_match = uri.replace(regexp, '').match(/^#[a-zA-Z0-9_-]+/);
            if (uri !== '' && ! is_match) {
                // ローディング画面をフェードイン
                $('#js-loader').fadeIn(100, function() {
                    // URLにリンクする
                    location.href = uri;
                });

                return false;
            }
        });
    }
     
    // ページのロードが終わった後の処理
    $(window).on('load', function(){
        $('#js-loader').delay(300).fadeOut(300, function() {
            $('*', this).hide();
        });
    });
     
    // ページのロードが終わらなくても10秒たったら強制的に処理を実行
    $(function(){ setTimeout(function() {
        $('#js-loader').delay(300).fadeOut(300, function() {
            $('*', this).hide();
        });
    }, 10000); });
};

inherits(PageLoader, Base);

"use strict";
/*!
 * FixedNavi ver. 1.0
 * Copyright Hirotomo Kambe
 */

var FixedNavi = function() {
    Base.call(this);
    objectAssign(this, Base);
};

FixedNavi.prototype.exec = function() {
    this.fixedNavi();
};

//固定ナビ
//複数個必要な場合はメソッドおよびCSSを追加
FixedNavi.prototype.fixedNavi = function() {
    this.applyFixedNavi('js-fixed-navi');
};

FixedNavi.prototype.applyFixedNavi = function(target_id) {
	var nav_id = target_id;
	var nav_wrap_id = nav_id + '__wrap';

    //本体要素の取得
	var nav = $(this._(target_id));

    if(nav.length) {
        var nav_top = nav.offset().top;
    
        //本体をラップ
        nav.wrap('<div id="' + nav_wrap_id + '" />');
        
        //ラップ要素を取得
        var nav_wrap = $(nav).parent();
        $(window).scroll(function () {
            //ラップの高さ：ラップの高さおよび本体の下マージン
            var nav_wrap_height = (nav_wrap.height() + Number(nav.css('margin-bottom').replace(/px/, ''))) + 'px';
        	var win_top = $(this).scrollTop();
        
        	if (win_top > nav_top) {
            //スクロール時
            nav_wrap.css({'height': nav_wrap_height});
        		nav.addClass('fixed');
        	} else if (win_top <= nav_top) {
            //非スクロール時
        		nav.removeClass('fixed');
            nav_wrap.css({'height': 'auto'});
        	}
        });
    }
};

inherits(FixedNavi, Base);

"use strict";
/*!
 * CurrentNavi ver. 1.0
 * Copyright Hirotomo Kambe
 */

var CurrentNavi = function() {
    Base.call(this);
    objectAssign(this, Base);
};

CurrentNavi.prototype.exec = function() {
    this.currentNavi();
};

//該当ナビのピックアップ
CurrentNavi.prototype.currentNavi = function() {
    var nav_class = '.js-global-navi';
    
    if(location.pathname !== '/') {
        var pattern = location.pathname.split('/')[1];
        $(nav_class).each(function() {
            $('li', this).each(function() {
                var regexp = new RegExp(pattern, 'i');
                if($('a', this).attr('href').match(regexp)) {
                    $('a', this).addClass('active');
                }
            }); 
        });
    }
};

inherits(CurrentNavi, Base);

"use strict";
/**
 * SmoothScroll
 *
 * version 1.0
 * Copyright Hirotomo Kambe
 */
var SmoothScroll = function() {
    Base.call(this);
    objectAssign(this, Base);
};

/**
 * exec
 * コンストラクタ
 *
 * @return {void}
 */
SmoothScroll.prototype.exec = function() {
    //スムーススクロール
    this.smoothScroll();

    //ページトップスムーススクロール
    this.backToTop();

    //別ページからのスムーススクロール
    this.smoothScrollFromOtherPage();
};

/**
 * smoothScroll 
 * スムーススクロール
 *
 * @return {void}
 */
SmoothScroll.prototype.smoothScroll = function() {
    var target = '.smooth-scroll';
    var speed = 700; //ms
    var position = 0;
    var offset = 0;
    var href = '';

    $(target).each(function() {
        $(this).filter(function(){

            //ホストを取得
            var pattern = location.host;
            var regexp = new RegExp('(http:|https:)?//' + pattern + '(\/)?', 'i');

            //URIからホスト部分を削除(自ページ内のみを対象）
            var href = $(this).attr('href').replace(regexp, '');

            //判定
            var result = href.match(/^#[a-zA-Z0-9]+/);

            return result;
        }).click(function(event) {
            //初期動作無効
            event.preventDefault();
            event.stopPropagation();

            //移動先／スピード
            href = this.hash;

            //座標取得
            if($(href).length) {
                position = $(href).offset().top;
            }
            $('body, html').animate({
                scrollTop: position + offset 
            }, speed, 'swing');
            return false;
        });
    });
};

/**
 * backToTop
 * ページトップへ戻る
 *
 * @return {void}
 */
SmoothScroll.prototype.backToTop = function() {
    var back_to_top_selector = '#js-back-to-top';
    var show_flag = false;
    var back_to_top_button = $(back_to_top_selector);
    var pos_top = '0px';
    var pos_bottom = '-100px';

    back_to_top_button.css('bottom', pos_bottom);
    show_flag = false;

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            if (show_flag === false) {
                show_flag = true;
                back_to_top_button.stop().animate({
                    'bottom': pos_top
                }, 200);
            }
        } else {
            if (show_flag) {
                show_flag= false;
                back_to_top_button.stop().animate({
                    'bottom': pos_bottom
                }, 200);
            }
        }
    });
};

/**
 * smoothScrollFromOtherPage 
 * 別ページからのスムーススクロール
 *
 * @return {void}
 */
SmoothScroll.prototype.smoothScrollFromOtherPage = function() {
    var headerHeight = 95;
    var param = '?aid=';
    $(window).on('load', function() {
        var url = $(location).attr('href');
        if(url.indexOf(param) !== -1){
            var id = url.split(param);
            var $target = $('#' + id[id.length - 1]);
            if($target.length){
                var pos = $target.offset().top-headerHeight;
                $('html, body').animate({scrollTop:pos}, 400);
            }
        }
    });
};

inherits(SmoothScroll, Base);

"use strict";
/**
 * ChangeFontSize
 *
 * version 1.0
 * Copyright Hirotomo Kambe
 */
var ChangeFontSize = function() {
    Base.call(this);
    objectAssign(this, Base);

    this.item_active = 'is-active';
    this.item = '.p-change-font-size__items__item';
    this.prefix = 'js-fs__indicator';
    this.target = 'body';
    this.cookie_key = 'font-size';
    this.default_size = 'js-fs__indicator--md';

};

/**
 * exec
 * コンストラクタ
 *
 * @return {void}
 */
ChangeFontSize.prototype.exec = function() {
    var _this = this;

    // クリックイベント
    $( _this.item ).each( function() {
        $( '.switch', this ).on( 'click', function(e) {
            e.preventDefault();

            // サイズ取得
            //var href = $( this ).attr( 'href' );
            //var size = href.replace( /#/, '');
            var size = $( this ).attr( 'id' );
            //console.log(this);

            // 設定
            _this.setSize(size);

            return false;
        });
    });

    // 初期設定
    _this.setSize(Cookies.get(_this.cookie_key));
};

/**
 * 対象とサイズの受け取り、設定
 *
 * @return {void}
 */
ChangeFontSize.prototype.setSize = function(size) {
    var _this = this;

    if (typeof size === 'undefined' || size === '') {
        size = _this.default_size;
    }

    // リセット
    $( _this.target ).removeClass(_this.prefix + '--sm');
    $( _this.target ).removeClass(_this.prefix + '--md');
    $( _this.target ).removeClass(_this.prefix + '--lg');
    $( _this.item ).each( function() {
        $( this ).removeClass( _this.item_active );
    });

    // サイズ設定
    $( _this.target ).addClass( size );
    $( _this._(size) ).parent().addClass( _this.item_active );

    // Cookie設定
    Cookies.set(_this.cookie_key, size);
};

ChangeFontSize.prototype._ = function(name) {
    return '#' + name;
};

inherits(ChangeFontSize, Base);

"use strict";
/*!
 * ImgLoader ver. 1.0
 * Copyright Hirotomo Kambe
 */

var ImgLoader= function() {
    Base.call(this);
    objectAssign(this, Base);
};

ImgLoader.prototype.exec = function() {
    if(typeof ImgLoader === 'function') {
        var $preload = $('.preload');
        var imgSrcs = [];
         
        $preload.each(function(){
            imgSrcs.push($(this).attr('src'));
        });
         
        var loader = new $.ImgLoader({
            srcs: imgSrcs, //画像などのパスを配列に格納
            pipesize: 2, //同時にロードできる数の上限
            delay: 500,    //次のロードまでの遅延をミリ秒で指定
            timeout: 500,    //タイムアウトまでの時間をミリ秒で指定
            useXHR2: false //XMLHttpRequestVersion2を利用するかどうか
        });
         
        //loader.on('progress', function(progress){
        //    var prog = progress.loadedRatio; //進捗率を取得
        //    console.log(prog);
        //});
        // 
        //loader.on('itemload', function($img){
        //    console.log($img);
        //});
        // 
        //loader.on('allload', function($img){
        //    console.log('complete');
        //});
         
        loader.load();    //ローディングを実行
    }
};

inherits(ImgLoader, Base);

"use strict";
/*!
 * AjaxZip ver. 1.0
 * Copyright Hirotomo Kambe
 */

var AjaxZip = function() {
    Base.call(this);
    objectAssign(this, Base);
};

AjaxZip.prototype.exec = function() {
    if(typeof AjaxZip3 === 'function') {
        $("#js-zip1, #js-zip2").keyup(function() {
        	AjaxZip3.zip2addr('zip1', 'zip2', 'pref', 'address1', 'address2');
        });
        $("#js-zip12").keyup(function() {
        	AjaxZip3.zip2addr(this, '', 'pref', 'address1', 'address2');

        	AjaxZip3.onSuccess = function() {
                var address1 = $('input[name="address1"]');
                if(address1.val() !== '') {
                    address1.addClass('required-filled');
                } else {
                    address1.removeClass('required-filled');
                }
            };
        });
    }
};

inherits(AjaxZip, Base);

"use strict";
/*!
 * AutoKana ver. 1.0
 * Copyright Hirotomo Kambe
 */

var AutoKana = function() {
    Base.call(this);
    objectAssign(this, Base);
};

AutoKana.prototype.exec = function() {
    var target = '.autokana';
    var suffix = '_kana';
    var is_katakana = false;//true：カタカナ、false：ひらがな（デフォルト）
    var pair = [];
    var from, to;

    if(pluginExists('autoKana')) {
        if ($(target).length > 0) {
            $(target).each(function() {
                pair.push('#' + $(this).attr('id'));
            });

            for (var i = 0; i < pair.length; i++) {
                from = pair[i];
                to = pair[i] + suffix;
                $.fn.autoKana(from, to, {
                    katakana : is_katakana
                });
            }
        }
    }
};

inherits(AutoKana, Base);

"use strict";
/*!
 * DateTimePicker ver. 1.0
 * Copyright Hirotomo Kambe
 */

var DateTimePicker = function() {
  Base.call(this);
  objectAssign(this, Base);
};

DateTimePicker.prototype.exec = function() {
  if(pluginExists('datetimepicker')) {
    jQuery.datetimepicker.setLocale('ja');
    jQuery('#js-datetimepicker').datetimepicker({
     i18n:{
      ja:{
       months:[
        '1月','2月','3月','4月',
        '5月','6月','7月','8月',
        '9月','10月','11月','12月',
       ],
       dayOfWeek:[
        "日", "月", "火", "水", 
        "木", "金", "土",
       ]
      }
     },
     timepicker:true,
     format:'Y-m-d H:i:s'
    });
  }
};

inherits(DateTimePicker, Base);

"use strict";
/*!
 * Form ver. 1.0
 * Copyright Hirotomo Kambe
 */

var Form = function() {
    Base.call(this);
    objectAssign(this, Base);
};

Form.prototype.exec = function() {
    //フォーム入力チェック
    var fillclass = 'required-filled';
    var formclass = '.c-form';

    //テキスト/テキストエリア
    $(formclass + ' input[type="text"], ' + formclass + ' input[type="email"], ' + formclass + ' textarea').each(function() {
        $(this).keyup(function() {
            if( $(this).val() !== '') {
                $(this).addClass(fillclass);
            } else {
                $(this).removeClass(fillclass);
            }

            if($(this).hasClass('autokana')) {
                var kana = $('#' + $(this).attr('id') + '_kana');
                if(kana.val() !== '') {
                    kana.addClass(fillclass);
                } else {
                    kana.removeClass(fillclass);
                }
            }
        });
    });

    //セレクトボタン
    $(formclass + ' select').each(function() {
        $(this).change(function() {
            if( $(this).val() !== 0) {
                $(this).parent().parent().addClass(fillclass);
            } else {
                $(this).parent().parent().removeClass(fillclass);
            }
        });
    });

    //ラジオボタン
    $(formclass + ' .radiogroup').each(function() {
        var radiogroup = $(this);
        var radiogroup_name = $('input[type=radio]:first-child', radiogroup).attr('name');
        $('input[name=' + radiogroup_name + ']').change(function() {
            if($('[name=' + radiogroup_name + ']:checked').val() !== '') {
                radiogroup.parent().addClass(fillclass);
            } else {
                radiogroup.parent().removeClass(fillclass);
            }
        });
    });

    //チェックボックス
    $(formclass + ' .checkboxgroup').each(function() {
        var checkboxgroup = $(this);
        $('input[type=checkbox]', checkboxgroup).each(function() {
            $(this).change(function() {
                if(countcheckbox()) {
                    checkboxgroup.parent().addClass(fillclass);
                } else {
                    checkboxgroup.parent().removeClass(fillclass);
                }
            });
        });

        function countcheckbox() {
            var count = 0;
            $('input[type=checkbox]', checkboxgroup).each(function() {
                if($(this).prop('checked')) {
                    count++;
                }
            });
            return (count > 0 ? true : false);
        }
    });
};

inherits(Form, Base);

"use strict";
/*!
 * Drawer ver. 1.0
 * Copyright Hirotomo Kambe
 * Special Thanks
 * https://www.willstyle.co.jp/blog/150/
 * https://increment-log.com/css-transition-drawer/
 */

var Drawer = function() {
    Base.call(this);
    objectAssign(this, Base);
};

Drawer.prototype.exec = function() {
    var touch = false;
    var canvas = 'body';
    var trigger = '#js-drawer__trigger';
    var overlay = '#js-drawer__overlay';
    var anchor = '#js-drawer__anchor';
    var bodyclass = 'js-drawer__body--hidden';
    var opendclass = 'js-drawer--opened';
    var itemanchor = '.p-drawer__navi__item a';

    $(trigger).on('click touchstart',function(e){
        var result = true;
        switch (e.type) {
            case 'touchstart':
                drawerToggle();
                touch = true;
                result = false;
            break;
            case 'click':
                if(!touch) {
                    drawerToggle();
                }
                result = false;
            break;
        }
        return result;
    });

    $(overlay).on('click touchstart',function(e){
        //e.preventDefault();
        e.stopPropagation();
        drawerToggle();
    });

    $(anchor).on('click touchstart',function(e){
        //e.preventDefault();
        e.stopPropagation();
        drawerToggle();
    });

    $(itemanchor).on('click touchstart',function(e){
        //e.preventDefault();
        e.stopPropagation();

        //座標取得
        var href = this.hash;
        if($(href).length) {
            var position = $(href).offset().top;
            $('body, html').animate({
                scrollTop: position + 0 
            }, 700, 'swing');
        }
    });

    function drawerToggle(){
        $(canvas).toggleClass(opendclass);
        $(canvas).parent().toggleClass('js-drawer--active');
        $('body').toggleClass(bodyclass);
        touch = false;
    }
};

inherits(Drawer, Base);

"use strict";
/**
 * Switch
 *
 * version 1.0
 * Copyright Hirotomo Kambe
 */
var Switch = function() {
  Base.call(this);
  objectAssign(this, Base);
};

/*!
 * 画像切り替え
 * 基本はPC画像であり、switchクラスが付いた画像のみを変換対象とする
 */
Switch.prototype.exec = function() {
	var elem = $('.switch');
	var prefix = 'sp_';
	var replaceWidth = 768;
    var regexp = new RegExp("^" + prefix);

    $(window).on('load resize', function(){
		//var windowWidth = parseInt($(window).width());
        var windowWidth = window.innerWidth;
		elem.each(function () {
			var _this = this;
            var src = $(_this).attr('src');
            if (typeof src !== 'undefined' && src !== '') {
                var path = src.split('/');
                var name = path[path.length - 1];
			    if (windowWidth < replaceWidth) {
                    if ( ! name.match(regexp)) {
                        name = name.replace(/^/, prefix);
                    }
			    } else {
                    name = name.replace(prefix, '');
			    }
                path[path.length - 1] = name;

                // 置換
                $(_this).attr('src', path.join('/'));
            }
		});
    });
};

inherits(Switch, Base);

"use strict";
/*!
 * Slider ver. 1.0
 * Copyright Hirotomo Kambe
 */

var Slider = function() {
    Base.call(this);
    objectAssign(this, Base);
};

Slider.prototype.exec = function() {
    this.slick();
    this.slide('#js-slide .p-slide__item');
    //this.bxSlider();
};

Slider.prototype.slick = function() {
    if(pluginExists('slick')) {
        $('.slick-slider').slick({
            'arrows': true,
            'infinite': true,
            'autoplay': true,
            'dots': false,
            'speed': 3000,
            'variableWidth': true,
            'centerMode': true,
            'slidesToShow': 1,
            'slidesToScroll': 1,
            'responsive': [
                {
                    'breakpoint': 1040,
                    'settings': {
                        'slidesToShow': 1,
                        'slidesToScroll': 1,
                        'variableWidth': false,
                        'centerMode': false,
                    }
                },
            ]
        });
    }
};

Slider.prototype.bxSlider = function() {
    if(pluginExists('bxSlider')) {
        $('#bxslider-slide').bxSlider({
            'auto': true,
            'mode': 'fade',
            'speed': 1000,
            'pause': 4000,
            'captions': true,
            'infiniteLoop': true,
            //'pager': false,
            //'controls': false
        });
    }
};

Slider.prototype.slide= function(slidebox) {
    var _this = this;

    setTimeout(function() {
        var idx = $(slidebox).index($(slidebox + '.active'));
        idx++;
        
        if (idx > $(slidebox).length - 1) {
                idx = 0;
        }
        
        var idx_prev = idx - 1;
        if (idx_prev < 0) {
                idx_prev = $(slidebox).length - 1;
        }
        
        $(slidebox).eq(idx_prev).addClass('prev');
        $(slidebox).eq(idx).addClass('active');
        $(slidebox).eq(idx_prev).removeClass('active');
        setTimeout(function(){
                $(slidebox).eq(idx_prev).removeClass('prev');
        }, 3000);
        
        _this.slide(slidebox);
    }, 5000);
};
inherits(Slider, Base);

"use strict";
/*!
 * Private ver. 1.0
 * Copyright Hirotomo Kambe
 */

var Private = function() {
    Base.call(this);
    objectAssign(this, Base);
};

Private.prototype.exec = function() {
    this.matchheight();
};

Private.prototype.matchheight = function() {
    // 高さ揃え
    // 園舎一覧
    $('#page__preschool .preschool-box .preschool-box__item .frame').matchHeight();
};

inherits(Private, Base);

"use strict";
/**
1. コアモジュールはconfig.jsonにて定義
2. 本ファイルを含めて全てのスクリプトはbrowserifyによって管理される
3. スクリプトは基本的にmodules以下（主にPrivate.js）に記述してjsonへ追加する
4. jsonファイルにおいて「_test（先頭にアンダースコア）」と記載されたモジュールは無効となる
5. 本ファイルには上記モジュール以外のスクリプトを記載する
*/

},{"object-assign":2}],2:[function(require,module,exports){
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/

'use strict';
/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};

},{}]},{},[1]);
