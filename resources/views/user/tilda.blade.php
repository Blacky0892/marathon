@include('user.script')
<div id="allrecords" class="t-records t-records_animated t-records_visible" data-hook="blocks-collection-content-node"
     data-tilda-project-id="6060589" data-tilda-page-id="40226638" data-tilda-page-alias="participant_lk"
     data-tilda-formskey="e34a6a276a00575851180ee826060589" data-tilda-lazy="yes" data-tilda-project-lang="RU"
     data-tilda-root-zone="com" data-tilda-ts="y">
  <div id="rec650893044" class="r t-rec" style="opacity: 1;" data-animationappear="off" data-record-type="360">
    <!-- T360 -->
    <style>@media screen and (min-width: 980px) {
        .t-records {
          opacity: 0;
        }

        .t-records_animated {
          -webkit-transition: opacity ease-in-out .5s;
          -moz-transition: opacity ease-in-out .5s;
          -o-transition: opacity ease-in-out .5s;
          transition: opacity ease-in-out .5s;
        }

        .t-records.t-records_visible, .t-records .t-records {
          opacity: 1;
        }
      }</style>
    <script>t_onReady(function () {
        var allRecords = document.querySelector('.t-records');
        window.addEventListener('pageshow', function (event) {
          if (event.persisted) {
            allRecords.classList.add('t-records_visible');
          }
        });
        var rec = document.querySelector('#rec650893044');
        if (!rec) return;
        rec.setAttribute('data-animationappear', 'off');
        rec.style.opacity = '1';
        allRecords.classList.add('t-records_animated');
        setTimeout(function () {
          allRecords.classList.add('t-records_visible');
        }, 200);
      });</script>
    <script>t_onReady(function () {
        var selects = 'button:not(.t-submit):not(.t835__btn_next):not(.t835__btn_prev):not(.t835__btn_result):not(.t862__btn_next):not(.t862__btn_prev):not(.t862__btn_result):not(.t854__news-btn):not(.t862__btn_next),' +
          'a:not([href*="#"]):not(.carousel-control):not(.t-carousel__control):not(.t807__btn_reply):not([href^="#price"]):not([href^="javascript"]):not([href^="mailto"]):not([href^="tel"]):not([href^="link_sub"]):not(.js-feed-btn-show-more):not(.t367__opener):not([href^="https://www.dropbox.com/"])';
        var elements = document.querySelectorAll(selects);
        Array.prototype.forEach.call(elements, function (element) {
          if (element.getAttribute('data-menu-submenu-hook')) return;
          element.addEventListener('click', function (event) {
            var goTo = this.getAttribute('href');
            if (goTo !== null) {
              var ctrl = event.ctrlKey;
              var cmd = event.metaKey && navigator.platform.indexOf('Mac') !== -1;
              if (!ctrl && !cmd) {
                var target = this.getAttribute('target');
                if (target !== '_blank') {
                  event.preventDefault();
                  var allRecords = document.querySelector('.t-records');
                  if (allRecords) {
                    allRecords.classList.remove('t-records_visible');
                  }
                  setTimeout(function () {
                    window.location = goTo;
                  }, 500);
                }
              }
            }
          });
        });
      });</script>
    <style>.t360__bar {
        background-color: #030bff;
      }</style>
    <script>t_onReady(function () {
        var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
        if (!isSafari) {
          document.body.insertAdjacentHTML('beforeend', '<div class="t360__progress"><div class="t360__bar"></div></div>');
          setTimeout(function () {
            var bar = document.querySelector('.t360__bar');
            if (bar) bar.classList.add('t360__barprogress');
          }, 10);
        }
      });
      window.addEventListener('load', function () {
        var bar = document.querySelector('.t360__bar');
        if (!bar) return;
        bar.classList.remove('t360__barprogress');
        bar.classList.add('t360__barprogressfinished');
        setTimeout(function () {
          bar.classList.add('t360__barprogresshidden');
        }, 20);
        setTimeout(function () {
          var progress = document.querySelector('.t360__progress');
          if (progress) progress.style.display = 'none';
        }, 500);
      });</script>
  </div>
  <div id="rec650893046" class="r t-rec r_showed r_anim" style=" " data-record-type="257"> <!-- T228 -->
    <div id="nav650893046marker"></div>
    <div class="tmenu-mobile">
      <div class="tmenu-mobile__container">
        <div class="tmenu-mobile__text t-name t-name_md" field="menu_mob_title">меню</div>
        <button type="button" class="t-menuburger t-menuburger_first " aria-label="Навигационное меню"
                aria-expanded="false"><span style="background-color:#ffffff;"></span> <span
            style="background-color:#ffffff;"></span> <span style="background-color:#ffffff;"></span> <span
            style="background-color:#ffffff;"></span></button>
        <script>function t_menuburger_init(recid) {
            var rec = document.querySelector('#rec' + recid);
            if (!rec) return;
            var burger = rec.querySelector('.t-menuburger');
            if (!burger) return;
            var isSecondStyle = burger.classList.contains('t-menuburger_second');
            if (isSecondStyle && !window.isMobile && !('ontouchend' in document)) {
              burger.addEventListener('mouseenter', function () {
                if (burger.classList.contains('t-menuburger-opened')) return;
                burger.classList.remove('t-menuburger-unhovered');
                burger.classList.add('t-menuburger-hovered');
              });
              burger.addEventListener('mouseleave', function () {
                if (burger.classList.contains('t-menuburger-opened')) return;
                burger.classList.remove('t-menuburger-hovered');
                burger.classList.add('t-menuburger-unhovered');
                setTimeout(function () {
                  burger.classList.remove('t-menuburger-unhovered');
                }, 300);
              });
            }
            burger.addEventListener('click', function () {
              if (!burger.closest('.tmenu-mobile') && !burger.closest('.t450__burger_container') && !burger.closest('.t466__container') && !burger.closest('.t204__burger') && !burger.closest('.t199__js__menu-toggler')) {
                burger.classList.toggle('t-menuburger-opened');
                burger.classList.remove('t-menuburger-unhovered');
              }
            });
            var menu = rec.querySelector('[data-menu="yes"]');
            if (!menu) return;
            var menuLinks = menu.querySelectorAll('.t-menu__link-item');
            var submenuClassList = ['t978__menu-link_hook', 't978__tm-link', 't966__tm-link', 't794__tm-link', 't-menusub__target-link'];
            Array.prototype.forEach.call(menuLinks, function (link) {
              link.addEventListener('click', function () {
                var isSubmenuHook = submenuClassList.some(function (submenuClass) {
                  return link.classList.contains(submenuClass);
                });
                if (isSubmenuHook) return;
                burger.classList.remove('t-menuburger-opened');
              });
            });
            menu.addEventListener('clickedAnchorInTooltipMenu', function () {
              burger.classList.remove('t-menuburger-opened');
            });
          }

          t_onReady(function () {
            t_onFuncLoad('t_menuburger_init', function () {
              t_menuburger_init('650893046');
            });
          });</script>
        <style>.t-menuburger {
            position: relative;
            flex-shrink: 0;
            width: 28px;
            height: 20px;
            padding: 0;
            border: none;
            background-color: transparent;
            outline: none;
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            transition: transform .5s ease-in-out;
            cursor: pointer;
            z-index: 999;
          }

          .t-menuburger span {
            display: block;
            position: absolute;
            width: 100%;
            opacity: 1;
            left: 0;
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            transition: .25s ease-in-out;
            height: 3px;
            background-color: #000;
          }

          .t-menuburger span:nth-child(1) {
            top: 0px;
          }

          .t-menuburger span:nth-child(2), .t-menuburger span:nth-child(3) {
            top: 8px;
          }

          .t-menuburger span:nth-child(4) {
            top: 16px;
          }

          .t-menuburger__big {
            width: 42px;
            height: 32px;
          }

          .t-menuburger__big span {
            height: 5px;
          }

          .t-menuburger__big span:nth-child(2), .t-menuburger__big span:nth-child(3) {
            top: 13px;
          }

          .t-menuburger__big span:nth-child(4) {
            top: 26px;
          }

          .t-menuburger__small {
            width: 22px;
            height: 14px;
          }

          .t-menuburger__small span {
            height: 2px;
          }

          .t-menuburger__small span:nth-child(2), .t-menuburger__small span:nth-child(3) {
            top: 6px;
          }

          .t-menuburger__small span:nth-child(4) {
            top: 12px;
          }

          .t-menuburger-opened span:nth-child(1) {
            top: 8px;
            width: 0%;
            left: 50%;
          }

          .t-menuburger-opened span:nth-child(2) {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
          }

          .t-menuburger-opened span:nth-child(3) {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
          }

          .t-menuburger-opened span:nth-child(4) {
            top: 8px;
            width: 0%;
            left: 50%;
          }

          .t-menuburger-opened.t-menuburger__big span:nth-child(1) {
            top: 6px;
          }

          .t-menuburger-opened.t-menuburger__big span:nth-child(4) {
            top: 18px;
          }

          .t-menuburger-opened.t-menuburger__small span:nth-child(1), .t-menuburger-opened.t-menuburger__small span:nth-child(4) {
            top: 6px;
          }

          @media (hover),(min-width: 0\0
          ) {
            .t-menuburger_first:hover span:nth-child(1) {
              transform: translateY(1px);
            }

            .t-menuburger_first:hover span:nth-child(4) {
              transform: translateY(-1px);
            }

            .t-menuburger_first.t-menuburger__big:hover span:nth-child(1) {
              transform: translateY(3px);
            }

            .t-menuburger_first.t-menuburger__big:hover span:nth-child(4) {
              transform: translateY(-3px);
            }
          }

          .t-menuburger_second span:nth-child(2), .t-menuburger_second span:nth-child(3) {
            width: 80%;
            left: 20%;
            right: 0;
          }

          @media (hover),(min-width: 0\0
          ) {
            .t-menuburger_second.t-menuburger-hovered span:nth-child(2), .t-menuburger_second.t-menuburger-hovered span:nth-child(3) {
              animation: t-menuburger-anim 0.3s ease-out normal forwards;
            }

            .t-menuburger_second.t-menuburger-unhovered span:nth-child(2), .t-menuburger_second.t-menuburger-unhovered span:nth-child(3) {
              animation: t-menuburger-anim2 0.3s ease-out normal forwards;
            }
          }

          .t-menuburger_second.t-menuburger-opened span:nth-child(2), .t-menuburger_second.t-menuburger-opened span:nth-child(3) {
            left: 0;
            right: 0;
            width: 100% !important;
          }

          .t-menuburger_third span:nth-child(4) {
            width: 70%;
            left: unset;
            right: 0;
          }

          @media (hover),(min-width: 0\0
          ) {
            .t-menuburger_third:not(.t-menuburger-opened):hover span:nth-child(4) {
              width: 100%;
            }
          }

          .t-menuburger_third.t-menuburger-opened span:nth-child(4) {
            width: 0 !important;
            right: 50%;
          }

          .t-menuburger_fourth {
            height: 12px;
          }

          .t-menuburger_fourth.t-menuburger__small {
            height: 8px;
          }

          .t-menuburger_fourth.t-menuburger__big {
            height: 18px;
          }

          .t-menuburger_fourth span:nth-child(2), .t-menuburger_fourth span:nth-child(3) {
            top: 4px;
            opacity: 0;
          }

          .t-menuburger_fourth span:nth-child(4) {
            top: 8px;
          }

          .t-menuburger_fourth.t-menuburger__small span:nth-child(2), .t-menuburger_fourth.t-menuburger__small span:nth-child(3) {
            top: 3px;
          }

          .t-menuburger_fourth.t-menuburger__small span:nth-child(4) {
            top: 6px;
          }

          .t-menuburger_fourth.t-menuburger__small span:nth-child(2), .t-menuburger_fourth.t-menuburger__small span:nth-child(3) {
            top: 3px;
          }

          .t-menuburger_fourth.t-menuburger__small span:nth-child(4) {
            top: 6px;
          }

          .t-menuburger_fourth.t-menuburger__big span:nth-child(2), .t-menuburger_fourth.t-menuburger__big span:nth-child(3) {
            top: 6px;
          }

          .t-menuburger_fourth.t-menuburger__big span:nth-child(4) {
            top: 12px;
          }

          @media (hover),(min-width: 0\0
          ) {
            .t-menuburger_fourth:not(.t-menuburger-opened):hover span:nth-child(1) {
              transform: translateY(1px);
            }

            .t-menuburger_fourth:not(.t-menuburger-opened):hover span:nth-child(4) {
              transform: translateY(-1px);
            }

            .t-menuburger_fourth.t-menuburger__big:not(.t-menuburger-opened):hover span:nth-child(1) {
              transform: translateY(3px);
            }

            .t-menuburger_fourth.t-menuburger__big:not(.t-menuburger-opened):hover span:nth-child(4) {
              transform: translateY(-3px);
            }
          }

          .t-menuburger_fourth.t-menuburger-opened span:nth-child(1), .t-menuburger_fourth.t-menuburger-opened span:nth-child(4) {
            top: 4px;
          }

          .t-menuburger_fourth.t-menuburger-opened span:nth-child(2), .t-menuburger_fourth.t-menuburger-opened span:nth-child(3) {
            opacity: 1;
          }

          @keyframes t-menuburger-anim {
            0% {
              width: 80%;
              left: 20%;
              right: 0;
            }
            50% {
              width: 100%;
              left: 0;
              right: 0;
            }
            100% {
              width: 80%;
              left: 0;
              right: 20%;
            }
          }

          @keyframes t-menuburger-anim2 {
            0% {
              width: 80%;
              left: 0;
            }
            50% {
              width: 100%;
              right: 0;
              left: 0;
            }
            100% {
              width: 80%;
              left: 20%;
              right: 0;
            }
          }</style>
      </div>
    </div>
    <style>.tmenu-mobile {
        background-color: #111;
        display: none;
        width: 100%;
        top: 0;
        z-index: 990;
      }

      .tmenu-mobile_positionfixed {
        position: fixed;
      }

      .tmenu-mobile__text {
        color: #fff;
      }

      .tmenu-mobile__container {
        min-height: 64px;
        padding: 20px;
        position: relative;
        box-sizing: border-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
      }

      .tmenu-mobile__list {
        display: block;
      }

      .tmenu-mobile__burgerlogo {
        display: inline-block;
        font-size: 24px;
        font-weight: 400;
        white-space: nowrap;
        vertical-align: middle;
      }

      .tmenu-mobile__imglogo {
        height: auto;
        display: block;
        max-width: 300px !important;
        box-sizing: border-box;
        padding: 0;
        margin: 0 auto;
      }

      @media screen and (max-width: 980px) {
        .tmenu-mobile__menucontent_hidden {
          display: none;
          height: 100%;
        }

        .tmenu-mobile {
          display: block;
        }
      }

      @media screen and (max-width: 980px) {
        #rec650893046 .t-menuburger {
          -webkit-order: 1;
          -ms-flex-order: 1;
          order: 1;
        }
      }</style>
    <style> #rec650893046 .tmenu-mobile__burgerlogo a {
        color: #f73613;
        font-weight: 600;
        letter-spacing: 2.5px;
      }</style>
    <style> #rec650893046 .tmenu-mobile__burgerlogo__title {
        color: #f73613;
        font-weight: 600;
        letter-spacing: 2.5px;
      }</style>
    <style>@media screen and (max-width: 980px) {
        #rec650893046 .t228 {
          position: static;
        }
      }</style>
    <script>window.addEventListener('load', function () {
        t_onFuncLoad('t228_setWidth', function () {
          t228_setWidth('650893046');
        });
      });
      window.addEventListener('resize', t_throttle(function () {
        t_onFuncLoad('t228_setWidth', function () {
          t228_setWidth('650893046');
        });
        t_onFuncLoad('t_menu__setBGcolor', function () {
          t_menu__setBGcolor('650893046', '.t228');
        });
      }));
      t_onReady(function () {
        t_onFuncLoad('t_menu__highlightActiveLinks', function () {
          t_menu__highlightActiveLinks('.t228__list_item a');
        });
        t_onFuncLoad('t_menu__findAnchorLinks', function () {
          t_menu__findAnchorLinks('650893046', '.t228__list_item a');
        });
        t_onFuncLoad('t228__init', function () {
          t228__init('650893046');
        });
        t_onFuncLoad('t_menu__setBGcolor', function () {
          t_menu__setBGcolor('650893046', '.t228');
        });
        t_onFuncLoad('t_menu__interactFromKeyboard', function () {
          t_menu__interactFromKeyboard('650893046');
        });
        t_onFuncLoad('t228_setWidth', function () {
          t228_setWidth('650893046');
        });
        t_onFuncLoad('t_menu__changeBgOpacity', function () {
          t_menu__changeBgOpacity('650893046', '.t228');
          window.addEventListener('scroll', t_throttle(function () {
            t_menu__changeBgOpacity('650893046', '.t228');
          }));
        });
        t_onFuncLoad('t_menu__createMobileMenu', function () {
          t_menu__createMobileMenu('650893046', '.t228');
        });
      });</script>
    <!--[if IE 8]>
    <style>#rec650893046 .t228 {
      filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#D9000000', endColorstr='#D9000000');
    }</style> <![endif]-->
    <style>#rec650893046 .t-menu__link-item {
        -webkit-transition: color 0.3s ease-in-out, opacity 0.3s ease-in-out;
        transition: color 0.3s ease-in-out, opacity 0.3s ease-in-out;
        position: relative;
      }

      #rec650893046 .t-menu__link-item.t-active:not(.t978__menu-link) {
        color: #27ad0c !important;
        font-weight: 700 !important;
      }

      #rec650893046 .t-menu__link-item.t-active::after {
        content: '';
        position: absolute;
        left: 0;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        opacity: 1;
        width: 100%;
        height: 100%;
        bottom: -0px;
        border-bottom: 0px solid #ffffff;
        -webkit-box-shadow: inset 0px -1px 0px 0px #ffffff;
        -moz-box-shadow: inset 0px -1px 0px 0px #ffffff;
        box-shadow: inset 0px -1px 0px 0px #ffffff;
      }

      #rec650893046 .t-menu__link-item:not(.t-active):not(.tooltipstered):hover {
        color: #27ad0c !important;
      }

      #rec650893046 .t-menu__link-item:not(.t-active):not(.tooltipstered):focus-visible {
        color: #27ad0c !important;
      }

      @supports (overflow:-webkit-marquee) and (justify-content:inherit) {
        #rec650893046 .t-menu__link-item, #rec650893046 .t-menu__link-item.t-active {
          opacity: 1 !important;
        }
      }</style>
    <style> #rec650893046 .t228__leftcontainer a {
        color: #f73613;
        font-weight: 600;
        letter-spacing: 2.5px;
      }

      #rec650893046 a.t-menu__link-item {
        color: #ffffff;
        font-weight: 600;
        text-transform: uppercase;
      }

      #rec650893046 .t228__right_langs_lang a {
        color: #ffffff;
        font-weight: 600;
        text-transform: uppercase;
      }

      #rec650893046 .t228__right_descr {
        color: #ffffff;
      }</style>
    <style> #rec650893046 .t228__logo {
        color: #f73613;
        font-weight: 600;
        letter-spacing: 2.5px;
      }</style>
  </div>
  <div id="rec650893049" class="r t-rec" style=" " data-animationappear="off" data-record-type="131"> <!-- T123 -->
    <div class="t123">
      <div class="t-container_100 ">
        <div class="t-width t-width_100 "> <!-- nominify begin --> <!-- Как сделать анимированный прелоадер в TILDA? -->
          <!-- https://nolim.cc/preloader -->
          <div class="nl_reploader_father" style="display: none;">
            <div class="nl_preloader">
              <div class="loader">Loading...</div>
            </div>
          </div>
          <script> $(document).ready(function () {
              setTimeout(function () {
                $('.nl_reploader_father').fadeOut();
              }, 2000);
            }); </script>
          <style> .nl_preloader {
              position: absolute;
              top: 50%;
              left: 50%;
              margin-right: -50%;
              transform: translate(-50%, -50%)
            }

            .nl_reploader_father {
              display: block;
              position: fixed;
              left: 0;
              top: 0;
              right: 0;
              bottom: 0;
              z-index: 100005;
              width: 100%;
              height: 100%;
              background: #5866d1;
              z-index: 9999999
            }

            .loader, .loader:after, .loader:before {
              background: #ffffff !important;
              -webkit-animation: load1 1s infinite ease-in-out;
              animation: load1 1s infinite ease-in-out;
              width: 1em;
              height: 4em
            }

            .loader {
              color: #ffffff !important;
              text-indent: -9999em;
              margin: 88px auto;
              position: relative;
              font-size: 11px;
              -webkit-transform: translateZ(0);
              -ms-transform: translateZ(0);
              transform: translateZ(0);
              -webkit-animation-delay: -.16s;
              animation-delay: -.16s
            }

            .loader:after, .loader:before {
              position: absolute;
              top: 0;
              content: ''
            }

            .loader:before {
              left: -1.5em;
              -webkit-animation-delay: -.32s;
              animation-delay: -.32s
            }

            .loader:after {
              left: 1.5em
            }

            @-webkit-keyframes load1 {
              0%, 100%, 80% {
                box-shadow: 0 0;
                height: 4em
              }
              40% {
                box-shadow: 0 -2em;
                height: 5em
              }
            }

            @keyframes load1 {
              0%, 100%, 80% {
                box-shadow: 0 0;
                height: 4em
              }
              40% {
                box-shadow: 0 -2em;
                height: 5em
              }
            } </style> <!-- nominify end --> </div>
      </div>
    </div>
  </div>
  <div id="rec650893051" class="r t-rec" style=" " data-animationappear="off" data-record-type="415"> <!-- t415 -->
    <!-- cover -->
    <div class="t-cover" id="recorddiv650893051" bgimgfield="img"
         style="background-image: url(&quot;{{asset('vendor/img/4238566-02.png')}}&quot;); height: 842px;">
      <div class="t-cover__carrier loaded" id="coverCarry650893051" data-content-cover-id="650893051"
           data-content-cover-bg="{{asset('vendor/img/4238566-01.png')}}"
           data-display-changed="true" data-content-cover-height="60vh" data-content-cover-parallax="fixed"
           data-content-use-image-for-mobile-cover=""
           style="height: 842px; background-image: url(&quot;{{asset('vendor/img/4238566-01.png')}}&quot;);"
           itemscope="" itemtype="http://schema.org/ImageObject" data-content-cover-updated-height="842px">
        <meta itemprop="image"
              content="{{asset('vendor/img/4238566-01.png')}}">
      </div>
      <div class="t-cover__filter"
           style="height: 842px; background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));"></div>
      <div class="t415">
        <div class="t-container">
          <div class="t-width t-width_12 t415__mainblock">
            <div class="t-cover__wrapper t-valign_middle" style="height: 842px;">
              <div class="t415__content" data-hook-content="covercontent"><img class="t415__logo"
                                                                               src="{{asset('vendor/img/2-01.png')}}"
                                                                               imgfield="img2" style="max-width:170px;"
                                                                               data-tu-max-width="800"
                                                                               data-tu-max-height="800"
                                                                               data-hook-clogo="coverlogo" alt="">
                <div class="t415__textwrapper t-width t-width_12">
                  <div class="t415__uptitle t-uptitle t-uptitle_md t-animate t-animate_started"
                       data-animate-style="fadein" data-animate-group="yes" data-animate-order="2"
                       data-animate-delay="0.3" field="subtitle"><span style="font-weight: 100;">Просветительский марафон</span><br>«Дети
                    и молодежь против экстремизма<br>и терроризма»
                  </div>
                  <div class="t415__title t-title t-title_md" field="title">Личный кабинет участника</div>
                  <div class="t415__descr t-descr t-descr_md" field="descr">Марафон проходит<br>с 21 октября 2024 года
                    по 30 марта 2025 года<span style="font-size: 28px;"> </span><br><br>До конца 2 этапа мероприятия
                    осталось:
                  </div>
                </div>
                <div id="t415__timer650893051" class="t415__timer">
                  <div class="t415__col "><span class="t415__days t-title t-title_lg t415__number">30</span>
                    <div class="t415__text t-descr t-descr_xxs">Дни</div>
                  </div>
                  <div class="t415__col"><span class="t415__hours t-title t-title_lg t415__number">12</span>
                    <div class="t415__text t-descr t-descr_xxs">Часы</div>
                  </div>
                  <div class="t415__col"><span class="t415__minutes t-title t-title_lg t415__number">20</span>
                    <div class="t415__text t-descr t-descr_xxs">Минуты</div>
                  </div>
                  <div class="t415__col"><span class="t415__seconds t-title t-title_lg t415__number">46</span>
                    <div class="t415__text t-descr t-descr_xxs">Секунды</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">t_onReady(function () {
        function getTimeRemaining(endtime) {
          var time = Date.parse(endtime) - Date.parse(new Date());
          if (time < 0) {
            var seconds = 0;
            var minutes = 0;
            var hours = 0;
            var days = 0;
          } else {
            var seconds = Math.floor((time / 1000) % 60);
            var minutes = Math.floor((time / 1000 / 60) % 60);
            var hours = Math.floor((time / (1000 * 60 * 60)) % 24);
            var days = Math.floor(time / (1000 * 60 * 60 * 24));
          }
          return {total: time, days: days, hours: hours, minutes: minutes, seconds: seconds,};
        }

        function handleOverflowMonth(date) {
          var splittedDate = date.split('-');
          var year = parseInt(splittedDate[0], 10);
          var month = parseInt(splittedDate[1], 10);
          var day = parseInt(splittedDate[2], 10);
          var countDays = new Date(year, month, 0).getDate();
          if (day > countDays) {
            var difference = Math.abs(countDays - day);
            day = difference;
            month += 1;
            if (month > 12) {
              year += 1;
              month = 1;
            }
            return year + '-' + ('0' + month).slice(-2) + '-' + ('0' + day).slice(-2);
          }
          return date;
        }

        function initializeClock(id, endtime) {
          var clock = document.getElementById(id);
          if (!clock) return;
          var daysSpan = clock.querySelector('.t415__days');
          var hoursSpan = clock.querySelector('.t415__hours');
          var minutesSpan = clock.querySelector('.t415__minutes');
          var secondsSpan = clock.querySelector('.t415__seconds');

          function updateClock() {
            var time = getTimeRemaining(endtime);
            if (time.days >= 100) {
              daysSpan.innerHTML = time.days;
            } else {
              daysSpan.innerHTML = ('0' + time.days).slice(-2);
            }
            hoursSpan.innerHTML = ('0' + time.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + time.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + time.seconds).slice(-2);
            if (time.total <= 0) {
              clearInterval(timeInterval);
            }
          }

          updateClock();
          var timeInterval = setInterval(updateClock, 1000);
        }

        var deadlineDate = "2025-02-28".trim();
        var deadlineTime = "23:59".trim();
        var deadlineUtc = "+03:00".trim();
        if (deadlineUtc.charAt(0) !== '-' && deadlineUtc.charAt(0) !== '+') {
          deadlineUtc = '+' + deadlineUtc;
        }
        deadlineDate = handleOverflowMonth(deadlineDate);
        var deadline = new Date(deadlineDate + 'T' + ('0' + deadlineTime).slice(-5) + deadlineUtc);
        initializeClock('t415__timer650893051', deadline);
      });</script>
    <style>#rec650893051 .t-btn[data-btneffects-first], #rec650893051 .t-btn[data-btneffects-second], #rec650893051 .t-btn[data-btneffects-third], #rec650893051 .t-submit[data-btneffects-first], #rec650893051 .t-submit[data-btneffects-second], #rec650893051 .t-submit[data-btneffects-third] {
        position: relative;
        overflow: hidden;
        isolation: isolate;
      }

      #rec650893051 .t-btn[data-btneffects-first="btneffects-flash"] .t-btn_wrap-effects, #rec650893051 .t-submit[data-btneffects-first="btneffects-flash"] .t-btn_wrap-effects {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transform: translateX(-85px);
        -ms-transform: translateX(-85px);
        transform: translateX(-85px);
        -webkit-animation-name: flash;
        animation-name: flash;
        -webkit-animation-duration: 3s;
        animation-duration: 3s;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
      }

      #rec650893051 .t-btn[data-btneffects-first="btneffects-flash"] .t-btn_wrap-effects_md, #rec650893051 .t-submit[data-btneffects-first="btneffects-flash"] .t-btn_wrap-effects_md {
        -webkit-animation-name: flash-md;
        animation-name: flash-md;
      }

      #rec650893051 .t-btn[data-btneffects-first="btneffects-flash"] .t-btn_wrap-effects_lg, #rec650893051 .t-submit[data-btneffects-first="btneffects-flash"] .t-btn_wrap-effects_lg {
        -webkit-animation-name: flash-lg;
        animation-name: flash-lg;
      }

      #rec650893051 .t-btn[data-btneffects-first="btneffects-flash"] .t-btn_effects, #rec650893051 .t-submit[data-btneffects-first="btneffects-flash"] .t-btn_effects {
        background: -webkit-gradient(linear, left top, right top, from(rgba(255, 255, 255, .1)), to(rgba(255, 255, 255, .4)));
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, .1), rgba(255, 255, 255, .4));
        background: -o-linear-gradient(left, rgba(255, 255, 255, .1), rgba(255, 255, 255, .4));
        background: linear-gradient(90deg, rgba(255, 255, 255, .1), rgba(255, 255, 255, .4));
        width: 45px;
        height: 100%;
        position: absolute;
        top: 0;
        left: 30px;
        -webkit-transform: skewX(-45deg);
        -ms-transform: skewX(-45deg);
        transform: skewX(-45deg);
      }

      @-webkit-keyframes flash {
        20% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
        100% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
      }

      @keyframes flash {
        20% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
        100% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
      }

      @-webkit-keyframes flash-md {
        30% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
        100% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
      }

      @keyframes flash-md {
        30% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
        100% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
      }

      @-webkit-keyframes flash-lg {
        40% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
        100% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
      }

      @keyframes flash-lg {
        40% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
        100% {
          -webkit-transform: translateX(100%);
          transform: translateX(100%);
        }
      }</style>
    <script>t_onReady(function () {
        var rec = document.getElementById('rec650893051');
        if (!rec) return;
        var firstButton = rec.querySelectorAll('.t-btn[data-btneffects-first], .t-submit[data-btneffects-first]');
        Array.prototype.forEach.call(firstButton, function (button) {
          button.insertAdjacentHTML('beforeend', '<div class="t-btn_wrap-effects"><div class="t-btn_effects"></div></div>');
          var buttonEffect = button.querySelector('.t-btn_wrap-effects');
          if (button.offsetWidth > 230) {
            buttonEffect.classList.add('t-btn_wrap-effects_md');
          }
          ;
          if (button.offsetWidth > 750) {
            buttonEffect.classList.remove('t-btn_wrap-effects_md');
            buttonEffect.classList.add('t-btn_wrap-effects_lg');
          }
        });
      });</script>
  </div>

  <div id="rec671544400" class="r t-rec" style="opacity: 1;" data-animationappear="off" data-record-type="868">
    <!-- t868 -->
    <div class="t868">
      <div class="t-popup" data-tooltip-hook="#popup:embedcode" role="dialog" aria-modal="true" tabindex="-1"
           data-popup-inited="yes">
        <div class="t-popup__close t-popup__block-close">
          <button type="button" class="t-popup__close-wrapper t-popup__block-close-button"
                  aria-label="Закрыть диалоговое окно">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23"
                 version="1.1" xmlns="http://www.w3.org/2000/svg">
              <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
              </g>
            </svg>
          </button>
        </div>
        <div class="t-popup__container t-width t-width_10">
          <div class="t868__code-wrap"> <!-- nominify begin -->
            <iframe
              src="https://docs.google.com/forms/d/e/1FAIpQLScCRtVyL7pQ8yYj6fkMZok-sZSO-wp_QwHQuAx6QqmRAgXySQ/viewform?embedded=true"
              width="640" height="13093" frameborder="0" marginheight="0" marginwidth="0">Загрузка…
            </iframe> <!-- nominify end --> </div>
        </div>
      </div>
    </div>
    <script>t_onReady(function () {
        setTimeout(function () {
          t_onFuncLoad('t868_initPopup', function () {
            t868_initPopup('671544400');
          });
        }, 500);
      });</script>
  </div>
  <div id="rec650986631" class="r t-rec t-rec_pt_75 t-rec_pb_30 r_showed r_anim"
       style="padding-top:75px;padding-bottom:30px; " data-record-type="222"> <!-- T194 -->
    <div class="t194">
      <div class="t-container">
        <div class="t-col t-col_12 ">
          <div class="t194__text t-text t-text_md" field="text">
            <div style="font-size: 38px;" data-customstyle="yes"><p style="text-align: center;"><strong
                  style="color: rgb(88, 102, 209);">О марафоне</strong></p></div>
          </div>
        </div>
        <div class="t-col t-col_1 t-align_left" itemscope="" itemtype="http://schema.org/ImageObject">
          <meta itemprop="image" content="">
          <div class="t194__sectitle" field="imgtitle" itemprop="name"></div>
          <div class="t194__secdescr" field="imgdescr" itemprop="description"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec825378165" class="r t-rec t-rec_pt_45 t-rec_pb_75 r_showed r_anim"
       style="padding-top:45px;padding-bottom:75px; " data-record-type="223"> <!-- T195 -->
    <div class="t195">
      <div class="t-container">
        <div class="t-col t-col_6 t195__imgsection" itemscope="" itemtype="http://schema.org/ImageObject">
          <meta itemprop="image" content="{{asset('vendor/img/1.jpg')}}">
          <img class="t195__img t-img loaded"
               src="{{asset('vendor/img/1.jpg')}}"
               data-original="{{asset('vendor/img/1.jpg')}}" imgfield="img"
               data-tu-max-width="1200" data-tu-max-height="1200" alt=""><br>
          <div class="t195__sectitle t-descr" field="imgtitle" itemprop="name"></div>
          <div class="t195__secdescr t-descr" field="imgdescr" itemprop="description"></div>
        </div>
        <div class="t-col t-col_5 ">
          <div class="t195__text t-text t-text_md" field="text">
            <div style="font-size: 24px;" data-customstyle="yes"><p style="text-align: left;"><strong
                  style="font-size: 26px; font-family: Manrope, Arial, sans-serif; color: rgb(88, 102, 209);">Материалы установочного
                  совещания от 13.11.2024</strong></p><br><strong style="font-family: Manrope, Arial, sans-serif;">Презентация</strong><br><strong
                style="font-family: Manrope, Arial, sans-serif; font-size: 20px;"><a
                  href="https://uchastiesv-my.sharepoint.com/:b:/g/personal/romanovaln_gppc_ru/EeYuTufoKmhKvdOIKSkReeYBZgpQ_ktNZ9uYH2PZAlxMjA?e=FBIcc8"
                  target="_blank" rel="noreferrer noopener">скачать</a></strong><br><br><strong
                style="font-family: Manrope, Arial, sans-serif;">Установочное совещание 1 этап</strong><br><strong
                style="font-family: Manrope, Arial, sans-serif; font-size: 20px;"><a href="https://disk.yandex.ru/i/FpdEfP_sMydUMw"
                                                                  target="_blank" rel="noreferrer noopener">посмотреть и
                  скачать</a></strong></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec537816412" class="r t-rec t-rec_pt_45 t-rec_pb_75 r_showed r_anim"
       style="padding-top:45px;padding-bottom:75px; " data-record-type="223"> <!-- T195 -->
    <div class="t195">
      <div class="t-container">
        <div class="t-col t-col_6 t195__imgsection" itemscope="" itemtype="http://schema.org/ImageObject">
          <meta itemprop="image" content="{{asset('vendor/img/2.png')}}">
          <img class="t195__img t-img loaded"
               src="{{asset('vendor/img/2.png')}}"
               data-original="{{asset('vendor/img/2.png')}}" imgfield="img"
               data-tu-max-width="1200" data-tu-max-height="1200" alt=""><br>
          <div class="t195__sectitle t-descr" field="imgtitle" itemprop="name"></div>
          <div class="t195__secdescr t-descr" field="imgdescr" itemprop="description"></div>
        </div>
        <div class="t-col t-col_5 ">
          <div class="t195__text t-text t-text_md" field="text">
            <div style="font-size: 24px;" data-customstyle="yes"><p style="text-align: left;"><strong
                  style="font-size: 26px; font-family: Manrope, Arial, sans-serif; color: rgb(88, 102, 209);">Материалы установочного
                  совещания от 15.01.2025</strong></p><br><strong style="font-family: Manrope, Arial, sans-serif;">Презентация</strong><br><strong
                style="font-family: Manrope, Arial, sans-serif; font-size: 20px;"><a
                  href="{{asset('files/Презентация_к_15.01.2025_2-й_этап_Марафона.pdf')}}"
                  target="_blank" rel="noreferrer noopener">скачать</a></strong><br><br><strong
                style="font-family: Manrope, Arial, sans-serif;">Установочное совещание 2 этап</strong><br><strong
                style="font-family: Manrope, Arial, sans-serif; font-size: 20px;"><a href="https://disk.yandex.ru/i/Z2fRZpGpPIfwLw"
                                                                  target="_blank" rel="noreferrer noopener">посмотреть и
                  скачать</a></strong></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec650986765" class="r t-rec t-rec_pt_15 t-rec_pb_75 r_showed r_anim"
       style="padding-top:15px;padding-bottom:75px; " data-record-type="397"> <!-- t397 -->
    <div class="t397">
      <div class="t-container">
        <div class="t397__col t-width t-width_12">
          <ul class="t397__wrapper t-align_center" role="tablist" data-tab-current="1">
            <li role="presentation" class="t397__tab t397__tab_active t397__width_50"
                data-tab-rec-ids="650986866,654279363,650987082,812335312" data-tab-number="1"
                style="border-bottom: 3px solid #b5b5b5;" data-tab-index="0">
              <button type="button" class="t397__title t-name t-name_xs" id="tab1_650986765" role="tab"
                      aria-selected="true" aria-controls="rec650986866" tabindex="0" field="title"
                      data-redactor-notoolbar="yes">
                <div style="font-size: 22px;" data-customstyle="yes">общая информация</div>
              </button>
            </li>
            <li role="presentation" class="t397__tab t397__width_50" data-tab-rec-ids="653704775,812335312,824246225"
                data-tab-number="2" style="border-bottom: 3px solid #b5b5b5;" data-tab-index="1">
              <button type="button" class="t397__title t-name t-name_xs" id="tab2_650986765" role="tab"
                      aria-selected="false" aria-controls="rec653704775" tabindex="-1" field="title2"
                      data-redactor-notoolbar="yes">этапы проведения
              </button>
            </li>
          </ul>
          <div class="t397__wrapper_mobile">
            <div class="t397__firefoxfix"></div>
            <select autocomplete="off" class="t397__select t-name">
              <option value="650986866,654279363,650987082,812335312">общая информация</option>
              <option value="653704775,812335312,824246225">этапы проведения</option>
            </select></div>
        </div>
      </div>
    </div>
    <style>#rec650986765 .t397__tab_active {
        border-bottom-color: #5866d1 !important;
      }

      #rec650986765 .t397__tab_active .t397__title {
        color: #5866d1 !important;
        font-weight: 600 !important;
      }

      #rec650986765 .t397__select {
        border: 3px solid #5866d1;
        color: #5866d1;
      }

      #rec650986765 .t397__wrapper_mobile:after {
        border-color: #5866d1 transparent transparent transparent;
      }

      #rec650986765 .t397__firefoxfix {
        top: 3px;
        bottom: 3px;
        right: 3px;
      }

      #rec650986765 .t397__tab:not(.t397__tab_active):hover .t397__title {
        color: #ff4500 !important;
      }

      #allrecords [aria-labelledby$="650986765"]:focus-visible {
        outline-color: #2015FF;
        outline-offset: 2px;
        outline-style: auto;
      }</style>
    <style> #rec650986765 .t397__title {
        font-size: 20px;
        font-weight: 500;
        text-transform: uppercase;
      }</style>
    <script>t_onReady(function () {
        t_onFuncLoad('t397_init', function () {
          t397_init('650986765');
        });
      });</script>
  </div>
  <div id="rec824246225" class="r t-rec t-rec_pt_75 t-rec_pb_0 r_anim t397__off r_showed"
       style="padding-top:75px;padding-bottom:0px; " data-record-type="819" data-connect-with-tab="yes"
       data-animationappear="off" aria-hidden="true"> <!-- t819 -->
    <div class="t819">
      <div class="t-container t-align_center">
        <div class="t819__col t-col t-col_12 ">
          <div class="t819__tab-block" style="background-color: #ffffff;border: 3px solid #eeeeee;">
            <ul class="t819__wrapper" role="tablist" data-tab-current="1" style="border-bottom: 1px solid #eeeeee;">
              <li class="t819__tab t819__tab_active" role="presentation" data-tab-number="1">
                <button type="button" class="t819__tab-name t-name t-name_xs" id="tab1_824246225" role="tab"
                        aria-selected="true" aria-controls="content-tab1_824246225" tabindex="0">
                  <div style="font-size: 22px;" data-customstyle="yes"><span style="color: rgb(88, 102, 209);">Материалы для проведения 1 этапа.&nbsp;7 класс</span>
                  </div>
                </button>
              </li>
              <li class="t819__tab" role="presentation" data-tab-number="2">
                <button type="button" class="t819__tab-name t-name t-name_xs" id="tab2_824246225" role="tab"
                        aria-selected="false" aria-controls="content-tab2_824246225" tabindex="-1">
                  <div style="font-size: 22px;" data-customstyle="yes"><span style="color: rgb(88, 102, 209);">Материалы для проведения 1 этапа.&nbsp;8 класс</span>
                  </div>
                </button>
              </li>
            </ul>
            <div class="t819__wrapper_mobile">
              <div class="t819__firefoxfix" style="top: 1px;bottom: 1px;right: 1px;background-color: #5866d1;"></div>
              <select class="t819__select t-name" style="color: #000;border-color: #5866d1;background-color: #5866d1;"
                      data-tab-mobile-number="1">
                <option class="t819__tab-name_mobile" value="1">Материалы для проведения 1 этапа.&nbsp;7 класс</option>
                <option class="t819__tab-name_mobile" value="2">Материалы для проведения 1 этапа.&nbsp;8 класс</option>
              </select></div>
            <div class="t819__content-row">
              <div id="content-tab1_824246225" class="t819__content t819__content_active" role="tabpanel"
                   data-tab-content-number="1" aria-labelledby="tab1_824246225" tabindex="0">
                <div class="t819__content-col t819__content-col_2"><img class="t-img"
                                                                        src="{{asset('vendor/img/noroot.png')}}"
                                                                        data-original="{{asset('vendor/img/noroot2.png')}}"
                                                                        imgfield="li_img__8296607678570" alt=""></div>
                <div class="t819__content-col t819__content-col_2" style="padding-top:20px;padding-bottom:20px;">
                  <div class="t819__title t-heading t-heading_sm" field="li_title__8296607678570"><br><br><br><span
                      style="font-family: Manrope, Arial, sans-serif;">Материалы для проведения 1 этапа.</span><br><span
                      style="font-family: Manrope, Arial, sans-serif;">7 класс</span></div>
                  <div class="t-text t-text_sm" field="li_text__8296607678570"><br><strong
                      style="font-size: 24px; font-family: Manrope, Arial, sans-serif; color: rgb(88, 102, 209);"><a
                        href="https://uchebnik.mos.ru/material/lesson_template-2944113?sharing_key=101b30da-7080-48d6-9740-33aa334e5df9"
                        target="_blank" rel="noreferrer noopener"
                        style="color: rgb(88, 102, 209); border-bottom: 2px solid rgb(88, 102, 209); box-shadow: none; text-decoration: none;">Сценарий
                        классного часа</a></strong><br><span style="font-family: Manrope, Arial, sans-serif;"> </span><strong
                      style="font-family: Manrope, Arial, sans-serif;">МЭШ ID: </strong><span
                      style="font-family: Manrope, Arial, sans-serif;">2944113</span><br><br><strong
                      style="font-family: Manrope, Arial, sans-serif; font-size: 24px; color: rgb(88, 102, 209);"><a
                        href="https://uchebnik.mos.ru/material/test_specification-588912?sharing_key=d82a1d62-6c66-4749-b7ac-2cf5dfef2c2a"
                        target="_blank" rel="noreferrer noopener"
                        style="color: rgb(88, 102, 209); border-bottom: 2px solid rgb(88, 102, 209); box-shadow: none; text-decoration: none;">Тест</a></strong><br><strong
                      style="font-family: Manrope, Arial, sans-serif;">МЭШ ID: </strong><span
                      style="font-family: Manrope, Arial, sans-serif;">588912</span><br><br><strong
                      style="font-size: 24px; font-family: Manrope, Arial, sans-serif; color: rgb(88, 102, 209);"><a
                        href="https://disk.yandex.ru/d/V_NwYCUiG7cp0A" target="_blank" rel="noreferrer noopener"
                        style="color: rgb(88, 102, 209); border-bottom: 2px solid rgb(88, 102, 209); box-shadow: none; text-decoration: none;">Материалы
                        для интеллектуальной игры</a></strong><br><br></div>
                </div>
              </div>
              <div id="content-tab2_824246225" class="t819__content" role="tabpanel" data-tab-content-number="2"
                   aria-labelledby="tab2_824246225" tabindex="0" hidden="">
                <div class="t819__content-col t819__content-col_2"><img class="t-img"
                                                                        src="{{asset('vendor/img/noroot.png')}}"
                                                                        data-original="{{asset('vendor/img/noroot2.png')}}"
                                                                        imgfield="li_img__1731332163349" alt=""></div>
                <div class="t819__content-col t819__content-col_2" style="padding-top:20px;padding-bottom:20px;">
                  <div class="t819__title t-heading t-heading_sm" field="li_title__1731332163349"><br><br><br><span
                      style="font-family: Manrope, Arial, sans-serif;">Материалы для проведения 1 этапа.</span><br><span
                      style="font-family: Manrope, Arial, sans-serif;">8 класс</span></div>
                  <div class="t-text t-text_sm" field="li_text__1731332163349"><br><strong
                      style="font-family: Manrope, Arial, sans-serif; font-size: 24px; color: rgb(88, 102, 209);"><a
                        href="https://uchebnik.mos.ru/material/lesson_template-2952404?menuReferrer=my_materials"
                        target="_blank" rel="noreferrer noopener"
                        style="color: rgb(88, 102, 209); border-bottom: 2px solid rgb(88, 102, 209); box-shadow: none; text-decoration: none;">Сценарий
                        классного часа</a></strong><br><span style="font-family: Manrope, Arial, sans-serif;"> </span><strong
                      style="font-family: Manrope, Arial, sans-serif;">МЭШ ID: </strong><span
                      style="font-family: Manrope, Arial, sans-serif;">2952404</span><br><br><strong
                      style="font-size: 24px; font-family: Manrope, Arial, sans-serif; color: rgb(88, 102, 209);"><a
                        href="https://uchebnik.mos.ru/material/test_specification-593901?menuReferrer=my_materials"
                        target="_blank" rel="noreferrer noopener"
                        style="color: rgb(88, 102, 209); border-bottom: 2px solid rgb(88, 102, 209); box-shadow: none; text-decoration: none;">Тест</a></strong><br><strong
                      style="font-family: Manrope, Arial, sans-serif;">МЭШ ID: </strong><span
                      style="font-family: Manrope, Arial, sans-serif;">593901</span><br><br><strong
                      style="font-family: Manrope, Arial, sans-serif; font-size: 24px; color: rgb(88, 102, 209);"><a
                        href="https://disk.yandex.ru/d/4lpiZXv1hMJwOw" target="_blank" rel="noreferrer noopener"
                        style="color: rgb(88, 102, 209); border-bottom: 2px solid rgb(88, 102, 209); box-shadow: none; text-decoration: none;">Материалы
                        для интеллектуальной игры</a></strong><br><br></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>#rec824246225 .t819__tab_active .t819__tab-name {
        font-weight: 600 !important;
      }

      #rec824246225 .t819__tab_active:before {
        background-color: #1f5bff;
      }

      #rec824246225 .t819__wrapper_mobile:after {
        border-color: #000 transparent transparent transparent;
      }

      #rec824246225 .t819__tab:not(.t819__tab_active):hover .t819__tab-name {
        color: #ff8562;
        opacity: 0.7;
      }

      #rec824246225 .t819__tab-name:focus-visible {
        color: #ff8562;
        opacity: 0.7;
      }

      @media screen and (max-width: 960px) {
        #rec824246225 .t819__select {
          color: #ff8562 !important;
        }

        #rec824246225 .t819__wrapper_mobile:after {
          border-color: #ff8562 transparent transparent transparent;
        }
      }</style>
    <script>t_onReady(function () {
        t_onFuncLoad('t819_init', function () {
          t819_init('824246225');
        });
      });</script>
    <style>@media (hover: hover),(min-width: 0\0
      ) {
        #rec824246225 .t-btn:not(.t-animate_no-hover):hover {
          box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3) !important;
        }

        #rec824246225 .t-btn:not(.t-animate_no-hover):focus-visible {
          box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3) !important;
        }

        #rec824246225 .t-btn:not(.t-animate_no-hover) {
          transition-property: background-color, color, border-color, box-shadow;
          transition-duration: 0.2s;
          transition-timing-function: ease-in-out;
        }
      }</style>
    <style> #rec824246225 .t819__tab-name {
        font-size: 14px;
        font-weight: 400;
      }

      #rec824246225 .t819__select {
        font-size: 14px;
        font-weight: 400;
      }</style>
  </div>
  <div id="rec650986866" class="r t-rec t-rec_pt_45 t-rec_pb_45 r_hidden r_anim"
       style="padding-top:45px;padding-bottom:45px; " data-record-type="222" aria-labelledby="tab1_650986765"
       role="tabpanel" tabindex="0" aria-hidden="false"> <!-- T194 -->
    <div class="t194">
      <div class="t-container">
        <div class="t-col t-col_12 ">
          <div class="t194__text t-text t-text_md" field="text"><strong
              style="color: rgb(88, 102, 209); font-size: 24px;">Просветительский марафон:</strong><br>«Дети и молодежь
            против экстремизма и терроризма»<br><br><strong style="color: rgb(88, 102, 209); font-size: 24px;">Организатор:</strong><br>Государственное
            бюджетное учреждение города Москвы «Городской психолого-педагогический центр Департамента образования и
            науки города Москвы» <br><br><strong style="color: rgb(88, 102, 209); font-size: 24px;">Цель:</strong><br>повышение
            цифровой и правовой грамотности обучающихся Школ города Москвы в сфере противодействия идеологии терроризма
            и экстремизма<br><br><strong style="color: rgb(88, 102, 209); font-size: 24px;">Участники:</strong><br>обучающиеся
            7-8 классов образовательных организаций<br><br><strong style="color: rgb(88, 102, 209); font-size: 24px;">Период
              проведения:</strong> <br>21.10.2024 - 30.04.2025<br><br><strong
              style="color: rgb(88, 102, 209); font-size: 24px;">Положение</strong><br><strong><a
                href="https://uchastiesv-my.sharepoint.com/:b:/g/personal/romanovaln_gppc_ru/EbEePKC5lcRPqHSyiNVa6LQBKFCul0PVUkw1KsK_gv7iCg?e=rdORd0"
                target="_blank" rel="noreferrer noopener">ссылка на скачивание</a></strong></div>
        </div>
        <div class="t-col t-col_1 t-align_left" itemscope="" itemtype="http://schema.org/ImageObject">
          <meta itemprop="image" content="">
          <div class="t194__sectitle" field="imgtitle" itemprop="name"></div>
          <div class="t194__secdescr" field="imgdescr" itemprop="description"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec653704775" class="r t-rec t-rec_pt_0 t-rec_pb_15 r_anim t397__off r_showed"
       style="padding-top:0px;padding-bottom:15px; " data-record-type="510" aria-labelledby="tab2_650986765"
       role="tabpanel" tabindex="0" data-connect-with-tab="yes" data-animationappear="off" aria-hidden="true">
    <!-- t510 -->
    <div class="t510">
      <div class="t-section__container t-container t-container_flex">
        <div class="t-col t-col_12 ">
          <div class="t-section__title t-title t-title_xs t-align_center t-margin_auto" field="btitle">
            <div style="font-size: 30px;" data-customstyle="yes"></div>
          </div>
        </div>
      </div>
      <style>.t-section__descr {
          max-width: 560px;
        }

        #rec653704775 .t-section__title {
          margin-bottom: 90px;
        }

        #rec653704775 .t-section__descr {
        }

        @media screen and (max-width: 960px) {
          #rec653704775 .t-section__title {
            margin-bottom: 45px;
          }
        }</style>
      <ul role="list" class="t510__container t-container">
        <li class="t-col t-col_12 t-prefix_ t-item t-list__item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top"
                 style="background-color:#5866d1; color:#ffffff;; border: 2px solid #5866d1; ">1
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" field="li_title__3724100396310">
              <div style="font-size: 26px;" data-customstyle="yes"><p style="text-align: left;"><strong
                    style="color: rgb(88, 102, 209); font-family: Montserrat;">I ЭТАП</strong></p></div>
            </div>
            <div class="t-descr t-descr_sm" field="li_descr__3724100396310"><strong
                style="font-family: Montserrat; font-size: 20px;">Описание этапа:</strong><span
                style="font-family: Montserrat; font-size: 20px;"> </span><br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-family: Montserrat; font-size: 20px;">В каждом классе параллели 7-8 классов проводится классный час, с использованием методических материалов, размещенных в единой образовательной платформе «Московская электронная школа» (МЭШ) (отдельно для параллелей 7-х и 8-х классов)</span>
                </li>
              </ul>
              <br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-size: 20px; font-family: Montserrat;">После изучения материалов обучающиеся классов проходят тестирование, по результатам которого в каждом классе формируется команда из участников, показавших наиболее высокие результаты в количестве 6 человек</span>
                </li>
              </ul>
              <br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-size: 20px; font-family: Montserrat;">Интеллектуальная игра проводится среди сформированных команд классов (отдельно среди параллелей 7-х и 8-х классов) по сценарию, разработанному Оператором</span>
                </li>
              </ul>
              <br>
              <p style="text-align: left;"><strong style="font-size: 20px; font-family: Montserrat;">Материалы:</strong>
              </p>
              <ul>
                <li data-list="bullet" style="text-align: left;"><strong
                    style="font-size: 20px; font-family: Montserrat;"><a href="#rec824246225">ID материалов МЭШ и
                      Интеллектуальной игры</a> </strong></li>
              </ul>
              <br>
              <p style="text-align: left;"><strong style="font-size: 20px; font-family: Montserrat;">Отчетная
                  форма:</strong></p>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-size: 20px; font-family: Montserrat;">Заполняется после проведения мероприятий не позднее 27.12.2024 г. </span>
                </li>
              </ul>
              <p style="text-align: left;"><strong style="font-size: 20px; font-family: Montserrat;"><a
                    href="#popup:myform1" role="button" aria-haspopup="dialog">Заполнить форму</a></strong></p><br>
              <p style="text-align: left;"><strong
                  style="font-size: 20px; font-family: Montserrat;">Победители:</strong></p>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-size: 20px; font-family: Montserrat;">Команда школы из 6 человек для участия во 2-м этапе формируется из участников Интеллектуальной игры, показавших наилучшие результаты (в команду могут входить одновременно обучающиеся 7-х и 8-х классов)</span>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="t-col t-col_12 t-prefix_ t-item t-list__item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top"
                 style="background-color:#5866d1; color:#ffffff;; border: 2px solid #5866d1; ">2
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" field="li_title__1729168018024">
              <div style="font-size: 26px;" data-customstyle="yes"><p style="text-align: left;"><strong
                    style="color: rgb(88, 102, 209); font-family: Montserrat;">II ЭТАП</strong></p></div>
            </div>
            <div class="t-descr t-descr_sm" field="li_descr__1729168018024"><strong
                style="font-family: Montserrat; font-size: 20px;">Описание этапа:</strong><span
                style="font-family: Montserrat; font-size: 20px;"> </span><br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-family: Montserrat; font-size: 20px;">Проводится в период с </span><strong
                    style="font-family: Montserrat; font-size: 20px;">13.01.2025 г.</strong><span
                    style="font-family: Montserrat; font-size: 20px;"> по </span><strong
                    style="font-family: Montserrat; font-size: 20px;">28.03.2025 г. </strong></li>
              </ul>
              <br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-family: Montserrat; font-size: 20px;">На Втором этапе марафона команды представляют на конкурс проект на тему «Правовое просвещение, направленное на противодействие идеологии экстремизма и терроризма в молодежной среде», в формате «Дети-детям»</span>
                </li>
              </ul>
              <br>
              <p style="text-align: left;"><strong style="font-family: Montserrat; font-size: 20px;">Отчетная
                  форма:</strong></p>
              <ul>
                <li data-list="bullet"><span style="font-family: Montserrat; font-size: 20px;">Ответственный от ОО в срок до 28.02.2025 года размещает проект на Яндекс Диске и прикрепляет ссылку на размещенный проект в личном кабинете на сайте Марафона.</span>
                </li>
              </ul>
              <strong style="font-size: 20px;"><a href="#popup:myform2" role="button" aria-haspopup="dialog">Заполнить
                  форму</a></strong><br><br>
              <p style="text-align: left;"><strong style="font-family: Montserrat; font-size: 20px;">Список
                  победителей:</strong></p>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-family: Montserrat; font-size: 20px;"><a href="{{asset('files/Рейтинг команд по итогам 2 этапа марафона 2024-2025 год.pdf')}}" target="_blank">Рейтинг команд по итогам 2 этапа марафона</a></span></li>
              </ul>
            </div>
          </div>
        </li>
        <li class="t-col t-col_12 t-prefix_ t-item t-list__item">
          <div class="t-cell t-valign_top">
            <div class="t510__circle t-heading t-valign_top"
                 style="background-color:#5866d1; color:#ffffff;; border: 2px solid #5866d1; ">3
            </div>
          </div>
          <div class="t510__textwrapper t-cell t-valign_top" style="">
            <div class="t-name t-name_md t510__bottommargin" field="li_title__1729169981728">
              <div style="font-size: 26px;" data-customstyle="yes"><p style="text-align: left;"><strong
                    style="color: rgb(88, 102, 209); font-family: Montserrat;">III ЭТАП</strong></p></div>
            </div>
            <div class="t-descr t-descr_sm" field="li_descr__1729169981728"><strong
                style="font-size: 20px; font-family: Montserrat;">Описание этапа:</strong><span
                style="font-size: 20px; font-family: Montserrat;"> </span><br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-size: 20px; font-family: Montserrat;">Финал марафона проходит очно в формате «Беседа с мэтром» с участием экспертов с </span><strong
                    style="font-size: 20px; font-family: Montserrat;">31.03.2025 г. </strong><span
                    style="font-size: 20px; font-family: Montserrat;">по </span><strong
                    style="font-size: 20px; font-family: Montserrat;">30.04.2025 г.</strong><span
                    style="font-size: 20px; font-family: Montserrat;"> </span></li>
              </ul>
              <br>
              <ul>
                <li data-list="bullet" style="text-align: left;"><span
                    style="font-size: 20px; font-family: Montserrat;">В финале принимают участие команды-победительницы 2 этапа, 1 команда от административного округа</span>
                </li>
              </ul>
              <br>
              <p style="text-align: left;"><strong style="font-size: 20px; font-family: Montserrat;">Порядок
                  проведения:</strong></p>
              <ul>
                <li data-list="bullet"><a href="{{asset('files/Порядок проведения Финальной игры марафона.pdf')}}" target="_blank">Порядок проведения Финальной игры марафона</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div id="rec824161562" class="r t-rec" style="opacity: 1;" data-animationappear="off" data-record-type="702"
       data-popup-subscribe-inited="y"> <!-- T702 -->
    <div class="t702">
      <div class="t-popup" data-tooltip-hook="#popup:myform1" role="dialog" aria-modal="true" tabindex="-1"
           aria-label=" Отчетная форма 1 этап ">
        <div class="t-popup__close t-popup__block-close">
          <button type="button" class="t-popup__close-wrapper t-popup__block-close-button"
                  aria-label="Закрыть диалоговое окно">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23"
                 version="1.1" xmlns="http://www.w3.org/2000/svg">
              <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
              </g>
            </svg>
          </button>
        </div>
        <style>@media screen and (max-width: 560px) {
            #rec824161562 .t-popup__close-icon g {
              fill: #ffffff !important;
            }
          }</style>
        <div class="t-popup__container t-width t-width_6">
          <div class="t702__wrapper">
            <div class="t702__text-wrapper t-align_center">
              <div class="t702__title t-title t-title_xxs" id="popuptitle_824161562">
                <div style="font-size: 22px;" data-customstyle="yes"><strong style="font-family: Montserrat;">Отчетная
                    форма 1 этап</strong></div>
              </div>
            </div>
            <form  id="form824161562" name="form824161562" role="form" action="#" method="POST" data-formactiontype="2"
                  data-inputbox=".t-input-group" class="t-form js-form-proccess t-form_inputs-total_9 t-form_bbonly"
                  data-success-callback="t702_onSuccess"><input type="hidden" name="formservices[]"
                                                                value="b51b3983ece213b6420f82557a3ac02b"
                                                                class="js-formaction-services"> <input type="hidden"
                                                                                                       name="formservices[]"
                                                                                                       value="b7c2a50e913151ee5f4a4ab1ad64200f"
                                                                                                       class="js-formaction-services">
              <div class="js-successbox t-form__successbox t-text t-text_md" aria-live="polite"
                   style="display:none;"></div>
              <div class="t-form__inputsbox t-form__inputsbox_vertical-form t-form__inputsbox_inrow">
                <div class=" t-input-group t-input-group_sb " data-input-lid="0919215262380" data-field-type="sb"><label
                    for="input_0919215262380" class="t-input-title t-descr t-descr_md" id="field-title_0919215262380"
                    data-redactor-toolbar="no" field="li_title__0919215262380" style="color:;">Округ</label>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="округ"
                                                                                    id="input_0919215262380"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                        <option value="" style="color:#000000;">
                          Выберите из списка
                        </option>
                        @foreach($areas as $area)
                          <option value="{{$area->id}}" style="color:#000000;">
                            {{$area->short_name}}
                          </option>
                        @endforeach
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_0919215262380"></div>
                </div>
                <div class=" t-input-group t-input-group_sb " data-input-lid="0919215262381" data-field-type="sb"><label
                    for="input_0919215262381" class="t-input-title t-descr t-descr_md" id="field-title_0919215262381"
                    data-redactor-toolbar="no" field="li_title__0919215262381" style="color:;">МРСД</label>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="мрсд" id="input_0919215262381"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                        <option value="" style="color:#000000;">
                          Выберите из списка
                        </option>
                        @for($mrsd = 1; $mrsd <= 37; $mrsd++)
                          <option value="{{$mrsd}}" style="color:#000000;">
                            МРСД № {{$mrsd}}
                          </option>
                        @endfor
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_0919215262381"></div>
                </div>
                <div class=" t-input-group t-input-group_sb " data-input-lid="0919215262382" data-field-type="sb"><label
                    for="input_0919215262382" class="t-input-title t-descr t-descr_md" id="field-title_0919215262382"
                    data-redactor-toolbar="no" field="li_title__0919215262382" style="color:;">Образовательная
                    организация</label>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="ОО" id="input_0919215262382"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                        <option value="" style="color:#000000;">
                          Выберите из списка
                        </option>
                        @foreach($schools as $school)
                          <option value="{{$school->id}}" style="color:#000000;">
                            {{$school->short_name}}
                          </option>
                        @endforeach
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_0919215262382"></div>
                </div>
                <div class=" t-input-group t-input-group_in " data-input-lid="1730890178013" data-field-type="in"><label
                    for="input_1730890178013" class="t-input-title t-descr t-descr_md" id="field-title_1730890178013"
                    data-redactor-toolbar="no" field="li_title__1730890178013" style="color:;">Общее количество
                    обучающихся 7 - 8 параллели</label>
                  <div class="t-input-block "><input type="text" name="паралелли" id="input_1730890178013"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true"
                                                     aria-describedby="error_1730890178013"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_1730890178013"></div>
                </div>
                <div class=" t-input-group t-input-group_in " data-input-lid="1730891654392" data-field-type="in"><label
                    for="input_1730891654392" class="t-input-title t-descr t-descr_md" id="field-title_1730891654392"
                    data-redactor-toolbar="no" field="li_title__1730891654392" style="color:;">Количество обучающихся,
                    принявших участие в 1 этапе</label>
                  <div class="t-input-block "><input type="text" name="количество1" id="input_1730891654392"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true"
                                                     aria-describedby="error_1730891654392"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_1730891654392"></div>
                </div>
                <div class=" t-input-group t-input-group_in " data-input-lid="1730891810852" data-field-type="in"><label
                    for="input_1730891810852" class="t-input-title t-descr t-descr_md" id="field-title_1730891810852"
                    data-redactor-toolbar="no" field="li_title__1730891810852" style="color:;">Количество педагогов,
                    принявших участие в подготовке и проведении 1 этапа</label>
                  <div class="t-input-block "><input type="text" name="количество2" id="input_1730891810852"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true"
                                                     aria-describedby="error_1730891810852"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_1730891810852"></div>
                </div>
                <div class=" t-input-group t-input-group_ur " data-input-lid="1730891920207" data-field-type="ur"><label
                    for="input_1730891920207" class="t-input-title t-descr t-descr_md" id="field-title_1730891920207"
                    data-redactor-toolbar="no" field="li_title__1730891920207" style="color:;">Прикрепите ссылку/ссылки
                    на публикацию/публикации, освещающие деятельность ОО в рамках проведения первого этапа Марафона в
                    социальных сетях или на сайте ОО</label>
                  <div class="t-input-block "><input type="url"
                                                     name="Прикрепите ссылку/ссылки на публикацию/публикации, освещающие деятельность ОО в рамках проведения первого этапа Марафона в социальных сетях или на сайте ОО"
                                                     id="input_1730891920207"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true" data-tilda-rule="url"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_1730891920207"></div>
                </div>
                <div class=" t-input-group t-input-group_ta " data-input-lid="1730892052699" data-field-type="ta"><label
                    for="input_1730892052699" class="t-input-title t-descr t-descr_md" id="field-title_1730892052699"
                    data-redactor-toolbar="no" field="li_title__1730892052699" style="color:;">Список участников,
                    вошедших в команду от ОО, в количестве 6 человек (ФИО, класс)</label>
                  <div class="t-input-block "><textarea name="список" id="input_1730892052699"
                                                        class="t-input js-tilda-rule t-input_bbonly" data-tilda-req="1"
                                                        aria-required="true" aria-describedby="error_1730892052699"
                                                        style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;height:238px;"
                                                        rows="7"></textarea></div>
                  <div class="t-input-error" aria-live="polite" id="error_1730892052699"></div>
                </div>
                <div class=" t-input-group t-input-group_cb " data-input-lid="1730892143878" data-field-type="cb">
                  <div class="t-input-title t-descr t-descr_md" id="field-title_1730892143878"
                       data-redactor-toolbar="no" field="li_title__1730892143878" style="color:;">Я ознакомлен(а) с
                    порядком и сроками проведения второго этапа Марафона и критериями оценки проектных работ.
                  </div>
                  <div class="t-input-block "><label
                      class="t-checkbox__control t-checkbox__control_flex t-text t-text_xs" style=""> <input
                        type="checkbox"
                        name="Я ознакомлен(а) с порядком и сроками проведения второго этапа Марафона и критериями оценки проектных работ."
                        value="yes" class="t-checkbox js-tilda-rule" data-tilda-req="1" aria-required="true">
                      <div class="t-checkbox__indicator"></div>
                    </label></div>
                  <div class="t-input-error" aria-live="polite" id="error_1730892143878"></div>
                </div>
                <div class="t-form__errorbox-middle"> <!--noindex-->
                  <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                       tabindex="-1" aria-label="Ошибки при заполнении формы">
                    <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                    </ul>
                  </div> <!--/noindex--> </div>
                <div class="t-form__submit">
                  <button type="submit" class="t-submit"
                          style="color:#ffffff;background-color:#5866d1;border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;"
                          data-field="buttontitle" data-buttonfieldset="button">
                    Отправить
                  </button>
                </div>
              </div>
              <div class="t-form__errorbox-bottom"> <!--noindex-->
                <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                     tabindex="-1" aria-label="Ошибки при заполнении формы">
                  <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                  </ul>
                </div> <!--/noindex--> </div>
              <div style="position: absolute; left: -5000px; bottom: 0; display: none;"><input type="text"
                                                                                               name="form-spec-comments"
                                                                                               value="Its good"
                                                                                               class="js-form-spec-comments"
                                                                                               tabindex="-1"></div>
            </form>
            <style>#rec824161562 input::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 input::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 input:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 input:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 textarea::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 textarea::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 textarea:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec824161562 textarea:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }</style>
          </div>
        </div>
      </div>
    </div>
    <script>t_onReady(function () {
        t_onFuncLoad('t702_initPopup', function () {
          t702_initPopup('824161562');
        });
      });</script>
    <style> #rec824161562 .t702__title {
        color: #5866d1;
      }</style>
  </div>
  <div id="rec850872305" class="r t-rec" style="opacity: 1;" data-animationappear="off" data-record-type="702"
       data-popup-subscribe-inited="y"> <!-- T702 -->
    <div class="t702">
      <div class="t-popup" data-tooltip-hook="#popup:myform2" role="dialog" aria-modal="true" tabindex="-1"
           aria-label=" Отчетная форма 2 этап ">
        <div class="t-popup__close t-popup__block-close">
          <button type="button" class="t-popup__close-wrapper t-popup__block-close-button"
                  aria-label="Закрыть диалоговое окно">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23"
                 version="1.1" xmlns="http://www.w3.org/2000/svg">
              <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
              </g>
            </svg>
          </button>
        </div>
        <style>@media screen and (max-width: 560px) {
            #rec850872305 .t-popup__close-icon g {
              fill: #ffffff !important;
            }
          }</style>
        <div class="t-popup__container t-width t-width_6">
          <div class="t702__wrapper">
            <div class="t702__text-wrapper t-align_center">
              <div class="t702__title t-title t-title_xxs" id="popuptitle_850872305">
                <div style="font-size: 22px;" data-customstyle="yes"><strong style="font-family: Montserrat;">Отчетная
                    форма 2 этап</strong></div>
              </div>
            </div>
            <form id="form850872305" name="form850872305" role="form" action="#" method="POST" data-formactiontype="2"
                  data-inputbox=".t-input-group" class="t-form js-form-proccess t-form_inputs-total_7 t-form_bbonly"
                  data-success-callback="t702_onSuccess">
              @csrf
              <div class="js-successbox t-form__successbox t-text t-text_md" aria-live="polite"
                   style="display:none;"></div>
              <div class="t-form__inputsbox t-form__inputsbox_vertical-form t-form__inputsbox_inrow">
                <div class=" t-input-group t-input-group_sb " data-input-lid="8858241615620" data-field-type="sb"><label
                    for="input_8858241615620" class="t-input-title t-descr t-descr_md" id="field-title_8858241615620"
                    data-redactor-toolbar="no" field="li_title__8858241615620" style="color:;">Округ</label>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="area"
                                                                                    id="input_8858241615620"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                        <option value="" style="color:#000000;">
                          Выберите из списка
                        </option>
                        @foreach($areas as $area)
                          <option value="{{$area->id}}" style="color:#000000;">
                            {{$area->short_name}}
                          </option>
                        @endforeach
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615620"></div>
                </div>
                <div class=" t-input-group t-input-group_sb " data-input-lid="8858241615621" data-field-type="sb"><label
                    for="input_8858241615621" class="t-input-title t-descr t-descr_md" id="field-title_8858241615621"
                    data-redactor-toolbar="no" field="li_title__8858241615621">МРСД</label>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="mrsd" id="input_8858241615621"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                        <option value="" style="color:#000000;">
                          Выберите из списка
                        </option>
                        @for($mrsd = 1; $mrsd <= 37; $mrsd++)
                          <option value="{{$mrsd}}" style="color:#000000;">
                            МРСД № {{$mrsd}}
                          </option>
                        @endfor
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615621"></div>
                </div>
                <div class=" t-input-group t-input-group_sb " data-input-lid="8858241615622" data-field-type="sb"><label
                    for="input_8858241615622" class="t-input-title t-descr t-descr_md" id="field-title_8858241615622"
                    data-redactor-toolbar="no" field="li_title__8858241615622" style="color:;">Образовательная
                    организация</label>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="school" id="input_8858241615622"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                        <option value="" style="color:#000000;">
                          Выберите из списка
                        </option>
                        @foreach($schools as $school)
                          <option value="{{$school->id}}" style="color:#000000;">
                            {{$school->short_name}}
                          </option>
                        @endforeach
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615622"></div>
                </div>
                <div class=" t-input-group t-input-group_in " data-input-lid="8858241615623" data-field-type="in"><label
                    for="input_8858241615623" class="t-input-title t-descr t-descr_md" id="field-title_8858241615623"
                    data-redactor-toolbar="no" field="li_title__8858241615623" style="color:;">Классы, принявшие участие
                    в проекте</label>
                  <div class="t-input-block "><input type="text" name="class" id="input_8858241615623"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true"
                                                     aria-describedby="error_8858241615623"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615623"></div>
                </div>
                <div class=" t-input-group t-input-group_in " data-input-lid="8858241615624" data-field-type="in"><label
                    for="input_8858241615624" class="t-input-title t-descr t-descr_md" id="field-title_8858241615624"
                    data-redactor-toolbar="no" field="li_title__8858241615624" style="color:;">Количество участников
                    (обучающиеся)</label>
                  <div class="t-input-block "><input type="number" name="count_student" id="input_8858241615624"
                                                     max="100"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true"
                                                     aria-describedby="error_8858241615624"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615624"></div>
                </div>
                <div class=" t-input-group t-input-group_in " data-input-lid="8858241615625" data-field-type="in"><label
                    for="input_8858241615625" class="t-input-title t-descr t-descr_md" id="field-title_8858241615625"
                    data-redactor-toolbar="no" field="li_title__8858241615625" style="color:;">Количество участников
                    (взрослые)</label>
                  <div class="t-input-block "><input type="number" name="count_adult" id="input_8858241615625"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     data-tilda-req="1" aria-required="true"
                                                     aria-describedby="error_8858241615625"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615625"></div>
                </div>
                <div class=" t-input-group t-input-group_ur " data-input-lid="8858241615626" data-field-type="ur"><label
                    for="input_8858241615626" class="t-input-title t-descr t-descr_md" id="field-title_8858241615626"
                    data-redactor-toolbar="no" field="li_title__8858241615626" style="color:;">Ссылка на проектную
                    работу в рамках второго этапа Марафона</label>
                  <div class="t-input-block "><input type="url"
                                                     name="link"
                                                     id="input_8858241615626"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder="(Яндекс диск, доступ по ссылке)" data-tilda-req="1"
                                                     aria-required="true" data-tilda-rule="url"
                                                     style="color:#000000;border:1px solid #c9c9c9;border-radius:5px;">
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_8858241615626"></div>
                </div>
                <div class="t-form__errorbox-middle"> <!--noindex-->
                  <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                       tabindex="-1" aria-label="Ошибки при заполнении формы">
                    <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                    </ul>
                  </div> <!--/noindex--> </div>
                <div class="t-form__submit">
                  <button type="submit" class="t-submit"
                          style="color:#ffffff;background-color:#5866d1;border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;"
                          data-field="buttontitle" data-buttonfieldset="button">
                    Отправить
                  </button>
                </div>
              </div>
              <div class="t-form__errorbox-bottom"> <!--noindex-->
                <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                     tabindex="-1" aria-label="Ошибки при заполнении формы">
                  <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                  </ul>
                </div> <!--/noindex--> </div>
              <div style="position: absolute; left: -5000px; bottom: 0; display: none;"><input type="text"
                                                                                               name="form-spec-comments"
                                                                                               value="Its good"
                                                                                               class="js-form-spec-comments"
                                                                                               tabindex="-1"></div>
            </form>
            <style>#rec850872305 input::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 input::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 input:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 input:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 textarea::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 textarea::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 textarea:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec850872305 textarea:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }</style>
          </div>
        </div>
      </div>
    </div>
    <script>t_onReady(function () {
        t_onFuncLoad('t702_initPopup', function () {
          t702_initPopup('850872305');
        });
      });</script>
    <style> #rec850872305 .t702__title {
        color: #5866d1;
      }</style>
  </div>
  <div id="rec812335312" class="r t-rec t-rec_pt_90 t-rec_pb_30 r_hidden r_anim"
       style="padding-top:90px;padding-bottom:30px; " data-record-type="3" aria-hidden="false"> <!-- T107 -->
    <div class="t107">
      <div class="t-align_center" itemscope="" itemtype="http://schema.org/ImageObject">
        <meta itemprop="image" content="https://static.tildacdn.com/tild3962-6639-4433-b337-613963333839/noroot.png">
        <img class="t-img t-width t107__width t-width_4"
             src="https://thb.tildacdn.com/tild3962-6639-4433-b337-613963333839/-/empty/noroot.png"
             data-original="https://static.tildacdn.com/tild3962-6639-4433-b337-613963333839/noroot.png" imgfield="img"
             alt="">
        <div class="t-container_8">
          <div class="t-col t-col_8 t107__title t-text" field="title" itemprop="name"><strong>Партнеры</strong></div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec650893125" class="r t-rec" style="background-color: rgb(239, 239, 239); opacity: 1;"
       data-animationappear="off" data-record-type="702" data-bg-color="#efefef" data-popup-subscribe-inited="y">
    <!-- T702 -->
    <div class="t702">
      <div class="t-popup" data-tooltip-hook="#2" role="dialog" aria-modal="true" tabindex="-1"
           aria-label=" Форма обратной связи ">
        <div class="t-popup__close t-popup__block-close">
          <button type="button" class="t-popup__close-wrapper t-popup__block-close-button"
                  aria-label="Закрыть диалоговое окно">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23"
                 version="1.1" xmlns="http://www.w3.org/2000/svg">
              <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
              </g>
            </svg>
          </button>
        </div>
        <style>@media screen and (max-width: 560px) {
            #rec650893125 .t-popup__close-icon g {
              fill: #ffffff !important;
            }
          }</style>
        <div class="t-popup__container t-width t-width_6">
          <div class="t702__wrapper">
            <div class="t702__text-wrapper t-align_left">
              <div class="t702__title t-title t-title_xxs" id="popuptitle_650893125"><strong
                  style="color: rgb(88, 102, 209);">Форма обратной связи</strong></div>
              <div class="t702__descr t-descr t-descr_xs">
                <div style="font-size: 16px;" data-customstyle="yes"></div>
              </div>
            </div>
            <form id="form650893125" name="form650893125" role="form" action="#" method="POST" data-formactiontype="2"
                  data-inputbox=".t-input-group" class="t-form js-form-proccess t-form_inputs-total_4 t-form_bbonly"
                  data-success-callback="t702_onSuccess"><input type="hidden" name="formservices[]"
                                                                value="706f3dc386062f7d392ae3849403919a"
                                                                class="js-formaction-services">
              <div class="js-successbox t-form__successbox t-text t-text_md" aria-live="polite" style="display:none;"
                   data-success-message="<div style=&quot;text-align: left;&quot; data-customstyle=&quot;yes&quot;><span style=&quot;font-family: Montserrat; font-weight: 100;&quot;>Спасибо за ваше обращение! </span></div>"></div>
              <div class="t-form__inputsbox t-form__inputsbox_vertical-form t-form__inputsbox_inrow">
                <div class=" t-input-group t-input-group_nm " data-input-lid="1518534405414" data-field-type="nm">
                  <div class="t-input-block "><input type="text" autocomplete="name" name="ФИО" id="input_1518534405414"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder="имя" data-tilda-req="1" aria-required="true"
                                                     data-tilda-rule="name" aria-describedby="error_1518534405414"
                                                     style="color:#000000;border:1px solid #b3b3b3;"></div>
                  <div class="t-input-error" aria-live="polite" id="error_1518534405414"></div>
                </div>
                <div class=" t-input-group t-input-group_em " data-input-lid="1544542453943" data-field-type="em">
                  <div class="t-input-block "><input type="email" autocomplete="email" name="email"
                                                     id="input_1544542453943"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder="электронная почта" data-tilda-req="1"
                                                     aria-required="true" data-tilda-rule="email"
                                                     aria-describedby="error_1544542453943"
                                                     style="color:#000000;border:1px solid #b3b3b3;"></div>
                  <div class="t-input-error" aria-live="polite" id="error_1544542453943"></div>
                </div>
                <div class=" t-input-group t-input-group_sb " data-input-lid="1638897605933" data-field-type="sb">
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="Selectbox"
                                                                                    id="input_1638897605933"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #b3b3b3;">
                        <option value="Пленарная часть" style="color:#000000;">
                          Пленарная часть
                        </option>
                        <option value="Секция 1" style="color:#000000;">
                          Секция 1
                        </option>
                        <option value="Секция 2" style="color:#000000;">
                          Секция 2
                        </option>
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_1638897605933"></div>
                </div>
                <div class=" t-input-group t-input-group_ta " data-input-lid="1543689943760" data-field-type="ta">
                  <div class="t-input-block "><textarea name="Вопрос" id="input_1543689943760"
                                                        class="t-input js-tilda-rule t-input_bbonly"
                                                        placeholder="вопрос " data-tilda-req="1" aria-required="true"
                                                        aria-describedby="error_1543689943760"
                                                        style="color:#000000;border:1px solid #b3b3b3;height:170px;"
                                                        rows="5"></textarea></div>
                  <div class="t-input-error" aria-live="polite" id="error_1543689943760"></div>
                </div>
                <div class="t-form__errorbox-middle"> <!--noindex-->
                  <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                       tabindex="-1" aria-label="Ошибки при заполнении формы">
                    <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                    </ul>
                  </div> <!--/noindex--> </div>
                <div class="t-form__submit">
                  <button type="submit" class="t-submit"
                          style="color:#ffffff;background-color:#5866d1;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;"
                          data-field="buttontitle" data-buttonfieldset="button">
                    Отправить письмо
                  </button>
                </div>
              </div>
              <div class="t-form__errorbox-bottom"> <!--noindex-->
                <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                     tabindex="-1" aria-label="Ошибки при заполнении формы">
                  <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                  </ul>
                </div> <!--/noindex--> </div>
              <div style="position: absolute; left: -5000px; bottom: 0; display: none;"><input type="text"
                                                                                               name="form-spec-comments"
                                                                                               value="Its good"
                                                                                               class="js-form-spec-comments"
                                                                                               tabindex="-1"></div>
            </form>
            <style>#rec650893125 input::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 input::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 input:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 input:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 textarea::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 textarea::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 textarea:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893125 textarea:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }</style>
            <div class="t702__form-bottom-text t-text t-text_xs t-align_left">Отправляя письмо, я подтверждаю согласие
              на обработку моих персональных данных (закон №152-ФЗ «О персональных данных»)
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>t_onReady(function () {
        t_onFuncLoad('t702_initPopup', function () {
          t702_initPopup('650893125');
        });
      });</script>
  </div>
  <div id="rec650893126" class="r t-rec" style="background-color: rgb(239, 239, 239); opacity: 1;"
       data-animationappear="off" data-record-type="702" data-bg-color="#efefef" data-popup-subscribe-inited="y">
    <!-- T702 -->
    <div class="t702">
      <div class="t-popup" data-tooltip-hook="#3" role="dialog" aria-modal="true" tabindex="-1"
           aria-label=" Внести предложение в резолюцию ">
        <div class="t-popup__close t-popup__block-close">
          <button type="button" class="t-popup__close-wrapper t-popup__block-close-button"
                  aria-label="Закрыть диалоговое окно">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23"
                 version="1.1" xmlns="http://www.w3.org/2000/svg">
              <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
              </g>
            </svg>
          </button>
        </div>
        <style>@media screen and (max-width: 560px) {
            #rec650893126 .t-popup__close-icon g {
              fill: #ffffff !important;
            }
          }</style>
        <div class="t-popup__container t-width t-width_6">
          <div class="t702__wrapper">
            <div class="t702__text-wrapper t-align_left">
              <div class="t702__title t-title t-title_xxs" id="popuptitle_650893126"><strong
                  style="color: rgb(88, 102, 209);">Внести предложение в резолюцию</strong></div>
              <div class="t702__descr t-descr t-descr_xs">
                <div style="font-size: 16px;" data-customstyle="yes"></div>
              </div>
            </div>
            <form id="form650893126" name="form650893126" role="form" action="#" method="POST" data-formactiontype="2"
                  data-inputbox=".t-input-group" class="t-form js-form-proccess t-form_inputs-total_3 t-form_bbonly"
                  data-success-callback="t702_onSuccess"><input type="hidden" name="formservices[]"
                                                                value="706f3dc386062f7d392ae3849403919a"
                                                                class="js-formaction-services">
              <div class="js-successbox t-form__successbox t-text t-text_md" aria-live="polite" style="display:none;"
                   data-success-message="<div style=&quot;text-align: left;&quot; data-customstyle=&quot;yes&quot;><span style=&quot;font-family: Montserrat; font-weight: 100;&quot;>Спасибо за ваше обращение! </span></div>"></div>
              <div class="t-form__inputsbox t-form__inputsbox_vertical-form t-form__inputsbox_inrow">
                <div class=" t-input-group t-input-group_nm " data-input-lid="1518534405414" data-field-type="nm">
                  <div class="t-input-block "><input type="text" autocomplete="name" name="ФИО" id="input_1518534405414"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder="имя" data-tilda-req="1" aria-required="true"
                                                     data-tilda-rule="name" aria-describedby="error_1518534405414"
                                                     style="color:#000000;border:1px solid #b3b3b3;"></div>
                  <div class="t-input-error" aria-live="polite" id="error_1518534405414"></div>
                </div>
                <div class=" t-input-group t-input-group_em " data-input-lid="1544542453943" data-field-type="em">
                  <div class="t-input-block "><input type="email" autocomplete="email" name="email"
                                                     id="input_1544542453943"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder="электронная почта" data-tilda-req="1"
                                                     aria-required="true" data-tilda-rule="email"
                                                     aria-describedby="error_1544542453943"
                                                     style="color:#000000;border:1px solid #b3b3b3;"></div>
                  <div class="t-input-error" aria-live="polite" id="error_1544542453943"></div>
                </div>
                <div class=" t-input-group t-input-group_ta " data-input-lid="1543689943760" data-field-type="ta">
                  <div class="t-input-block "><textarea name="Вопрос" id="input_1543689943760"
                                                        class="t-input js-tilda-rule t-input_bbonly"
                                                        placeholder="предложение" data-tilda-req="1"
                                                        aria-required="true" aria-describedby="error_1543689943760"
                                                        style="color:#000000;border:1px solid #b3b3b3;height:170px;"
                                                        rows="5"></textarea></div>
                  <div class="t-input-error" aria-live="polite" id="error_1543689943760"></div>
                </div>
                <div class="t-form__errorbox-middle"> <!--noindex-->
                  <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                       tabindex="-1" aria-label="Ошибки при заполнении формы">
                    <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                    </ul>
                  </div> <!--/noindex--> </div>
                <div class="t-form__submit">
                  <button type="submit" class="t-submit"
                          style="color:#ffffff;background-color:#5866d1;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;"
                          data-field="buttontitle" data-buttonfieldset="button">
                    Отправить письмо
                  </button>
                </div>
              </div>
              <div class="t-form__errorbox-bottom"> <!--noindex-->
                <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                     tabindex="-1" aria-label="Ошибки при заполнении формы">
                  <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                  </ul>
                </div> <!--/noindex--> </div>
              <div style="position: absolute; left: -5000px; bottom: 0; display: none;"><input type="text"
                                                                                               name="form-spec-comments"
                                                                                               value="Its good"
                                                                                               class="js-form-spec-comments"
                                                                                               tabindex="-1"></div>
            </form>
            <style>#rec650893126 input::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 input::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 input:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 input:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 textarea::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 textarea::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 textarea:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec650893126 textarea:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }</style>
            <div class="t702__form-bottom-text t-text t-text_xs t-align_left">Отправляя письмо, я подтверждаю согласие
              на обработку моих персональных данных (закон №152-ФЗ «О персональных данных»)
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>t_onReady(function () {
        t_onFuncLoad('t702_initPopup', function () {
          t702_initPopup('650893126');
        });
      });</script>
  </div>
  <div id="rec713915812" class="r t-rec" style="background-color: rgb(239, 239, 239); opacity: 1;"
       data-animationappear="off" data-record-type="702" data-bg-color="#efefef" data-popup-subscribe-inited="y">
    <!-- T702 -->
    <div class="t702">
      <div class="t-popup" data-tooltip-hook="#4" role="dialog" aria-modal="true" tabindex="-1"
           aria-label=" По итогам проведения брейн-ринга &quot;Вопрос эксперту&quot; ">
        <div class="t-popup__close t-popup__block-close">
          <button type="button" class="t-popup__close-wrapper t-popup__block-close-button"
                  aria-label="Закрыть диалоговое окно">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23"
                 version="1.1" xmlns="http://www.w3.org/2000/svg">
              <g stroke="none" stroke-width="1" fill="#fff" fill-rule="evenodd">
                <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
                <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) "
                      x="10.3137085" y="-3.6862915" width="2" height="30"></rect>
              </g>
            </svg>
          </button>
        </div>
        <style>@media screen and (max-width: 560px) {
            #rec713915812 .t-popup__close-icon g {
              fill: #ffffff !important;
            }
          }</style>
        <div class="t-popup__container t-width t-width_6">
          <div class="t702__wrapper">
            <div class="t702__text-wrapper t-align_left">
              <div class="t702__title t-title t-title_xxs" id="popuptitle_713915812"><strong
                  style="color: rgb(88, 102, 209);">По итогам проведения брейн-ринга "Вопрос эксперту"</strong></div>
              <div class="t702__descr t-descr t-descr_xs">
                <div style="font-size: 16px;" data-customstyle="yes"></div>
              </div>
            </div>
            <form id="form713915812" name="form713915812" role="form" action="#" method="POST" data-formactiontype="2"
                  data-inputbox=".t-input-group" class="t-form js-form-proccess t-form_inputs-total_6 t-form_bbonly"
                  data-success-callback="t702_onSuccess"><input type="hidden" name="formservices[]"
                                                                value="194a46827af295bb02b02608f77a5a73"
                                                                class="js-formaction-services">
              <div class="js-successbox t-form__successbox t-text t-text_md" aria-live="polite" style="display:none;"
                   data-success-message="<div style=&quot;text-align: left;&quot; data-customstyle=&quot;yes&quot;><span style=&quot;font-family: Montserrat; font-weight: 100;&quot;>Спасибо за ваше обращение! </span></div>"></div>
              <div class="t-form__inputsbox t-form__inputsbox_vertical-form t-form__inputsbox_inrow">
                <div class=" t-input-group t-input-group_sb " data-input-lid="2276508931260" data-field-type="sb">
                  <div class="t-input-subtitle t-descr t-descr_xxs t-opacity_70" data-redactor-toolbar="no"
                       field="li_subtitle__2276508931260" style="color:;">Образовательная организация
                  </div>
                  <div class="t-input-block ">
                    <div class="t-select__wrapper t-select__wrapper_bbonly"><select name="Selectbox"
                                                                                    id="input_2276508931260"
                                                                                    class="t-select js-tilda-rule t-select_bbonly"
                                                                                    data-tilda-req="1"
                                                                                    aria-required="true"
                                                                                    style="color:#000000;border:1px solid #b3b3b3;">
                        <option value="Выбрать из списка" style="color:#000000;">
                          Выбрать из списка
                        </option>
                        <option value="ГБОУ Школа № 171" style="color:#000000;">
                          ГБОУ Школа № 171
                        </option>
                        <option value="ГБОУ Инженерная школа № 1581" style="color:#000000;">
                          ГБОУ Инженерная школа № 1581
                        </option>
                        <option value="ГБПОУ КМБ № 4" style="color:#000000;">
                          ГБПОУ КМБ № 4
                        </option>
                        <option value="ГБОУ Школа № 763" style="color:#000000;">
                          ГБОУ Школа № 763
                        </option>
                        <option value="ГБОУ Школа № 1955" style="color:#000000;">
                          ГБОУ Школа № 1955
                        </option>
                        <option value="ГБОУ Школа № 1370" style="color:#000000;">
                          ГБОУ Школа № 1370
                        </option>
                        <option value="ГБОУ Школа № 293" style="color:#000000;">
                          ГБОУ Школа № 293
                        </option>
                        <option value="ГБОУ Школа № 1531" style="color:#000000;">
                          ГБОУ Школа № 1531
                        </option>
                        <option value="ГБОУ Школа № 1518" style="color:#000000;">
                          ГБОУ Школа № 1518
                        </option>
                        <option value="ГБОУ Школа № 1413" style="color:#000000;">
                          ГБОУ Школа № 1413
                        </option>
                        <option value="ГБОУ Школа № 1506" style="color:#000000;">
                          ГБОУ Школа № 1506
                        </option>
                        <option value="ГБОУ Школа Глория" style="color:#000000;">
                          ГБОУ Школа Глория
                        </option>
                        <option value="ГБОУ Школа № 1302" style="color:#000000;">
                          ГБОУ Школа № 1302
                        </option>
                        <option value="ГБОУ Школа № 1747" style="color:#000000;">
                          ГБОУ Школа № 1747
                        </option>
                        <option value="ГБОУ Школа № 1619" style="color:#000000;">
                          ГБОУ Школа № 1619
                        </option>
                        <option value="ГБОУ Школа № 1191" style="color:#000000;">
                          ГБОУ Школа № 1191
                        </option>
                        <option value="ГБОУ Школа № 1286" style="color:#000000;">
                          ГБОУ Школа № 1286
                        </option>
                        <option value="ГБОУ Школа № 1285" style="color:#000000;">
                          ГБОУ Школа № 1285
                        </option>
                        <option value="ГБОУ Школа № 2097" style="color:#000000;">
                          ГБОУ Школа № 2097
                        </option>
                        <option value="ГБОУ Школа№ 138" style="color:#000000;">
                          ГБОУ Школа№ 138
                        </option>
                        <option value="ГБОУ Школа № 1210" style="color:#000000;">
                          ГБОУ Школа № 1210
                        </option>
                        <option value="ГБОУ Школа № 1517" style="color:#000000;">
                          ГБОУ Школа № 1517
                        </option>
                        <option value="ГБОУ Школа № 2127" style="color:#000000;">
                          ГБОУ Школа № 2127
                        </option>
                        <option value="ГБГКОУ СКОШИ № 31" style="color:#000000;">
                          ГБГКОУ СКОШИ № 31
                        </option>
                        <option value="ГБОУ Школа № 2031" style="color:#000000;">
                          ГБОУ Школа № 2031
                        </option>
                        <option value="ГКОУ СКОШИ №30 им.К.А. Микаэльяна " style="color:#000000;">
                          ГКОУ СКОШИ №30 им.К.А. Микаэльяна
                        </option>
                        <option value="ГБОУ Школа № 1598" style="color:#000000;">
                          ГБОУ Школа № 1598
                        </option>
                        <option value="ГБОУ Школа № 429" style="color:#000000;">
                          ГБОУ Школа № 429
                        </option>
                        <option value="ГБОУ Школа №1290" style="color:#000000;">
                          ГБОУ Школа №1290
                        </option>
                        <option value="ГБОУ Школа № 1508" style="color:#000000;">
                          ГБОУ Школа № 1508
                        </option>
                        <option value="ГБОУ Школа № 1476" style="color:#000000;">
                          ГБОУ Школа № 1476
                        </option>
                        <option value="ГБОУ Школа № 1373" style="color:#000000;">
                          ГБОУ Школа № 1373
                        </option>
                        <option value="ГБОУ Школа № 1798" style="color:#000000;">
                          ГБОУ Школа № 1798
                        </option>
                        <option value="ГБОУ Школа № 491" style="color:#000000;">
                          ГБОУ Школа № 491
                        </option>
                        <option value="ГБОУ Школа Спектр" style="color:#000000;">
                          ГБОУ Школа Спектр
                        </option>
                        <option value="ГБОУ Школа им. Полбина" style="color:#000000;">
                          ГБОУ Школа им. Полбина
                        </option>
                        <option value="ГБОУ Школа № 2010" style="color:#000000;">
                          ГБОУ Школа № 2010
                        </option>
                        <option value="ГБОУ Школа № 460" style="color:#000000;">
                          ГБОУ Школа № 460
                        </option>
                        <option value="ГБОУ Школа № 1420" style="color:#000000;">
                          ГБОУ Школа № 1420
                        </option>
                        <option value="ГБОУ Школа № 777" style="color:#000000;">
                          ГБОУ Школа № 777
                        </option>
                        <option value="ГБОУ Школа № 2090" style="color:#000000;">
                          ГБОУ Школа № 2090
                        </option>
                        <option value="ГБОУ Школа Содружество" style="color:#000000;">
                          ГБОУ Школа Содружество
                        </option>
                        <option value="ГБОУ Школа № 1492" style="color:#000000;">
                          ГБОУ Школа № 1492
                        </option>
                        <option value="ГБОУ Школа № 1533 ЛИТ" style="color:#000000;">
                          ГБОУ Школа № 1533 ЛИТ
                        </option>
                        <option value="ГБОУ Школа № 1206" style="color:#000000;">
                          ГБОУ Школа № 1206
                        </option>
                        <option value="ГБОУ Школа № 46" style="color:#000000;">
                          ГБОУ Школа № 46
                        </option>
                        <option value="ГБОУ Школа № 626" style="color:#000000;">
                          ГБОУ Школа № 626
                        </option>
                        <option value="ГБОУ Школа № 536" style="color:#000000;">
                          ГБОУ Школа № 536
                        </option>
                        <option value="ГБОУ Школа № 1273" style="color:#000000;">
                          ГБОУ Школа № 1273
                        </option>
                        <option value="ГБОУ Школа № 1101" style="color:#000000;">
                          ГБОУ Школа № 1101
                        </option>
                        <option value="ГБОУ Школа № 113" style="color:#000000;">
                          ГБОУ Школа № 113
                        </option>
                        <option value="ГБОУ Школа № 1371 Крылатское" style="color:#000000;">
                          ГБОУ Школа № 1371 Крылатское
                        </option>
                        <option value="ГБОУ Школа № 1400" style="color:#000000;">
                          ГБОУ Школа № 1400
                        </option>
                        <option value="ГБОУ Школа № 1593" style="color:#000000;">
                          ГБОУ Школа № 1593
                        </option>
                        <option value="ГБОУ Школа № 1248" style="color:#000000;">
                          ГБОУ Школа № 1248
                        </option>
                        <option value="ГКОУ СКШ № 571" style="color:#000000;">
                          ГКОУ СКШ № 571
                        </option>
                        <option value="ГБОУ Школа № 814" style="color:#000000;">
                          ГБОУ Школа № 814
                        </option>
                        <option value="ГБОУ Школа № 2025" style="color:#000000;">
                          ГБОУ Школа № 2025
                        </option>
                        <option value="ГБОУ Школа № 1467" style="color:#000000;">
                          ГБОУ Школа № 1467
                        </option>
                        <option value="ГБОУ Школа № 1596" style="color:#000000;">
                          ГБОУ Школа № 1596
                        </option>
                        <option value="ГБОУ Школа № 1542" style="color:#000000;">
                          ГБОУ Школа № 1542
                        </option>
                        <option value="ГБОУ Школа № 1636" style="color:#000000;">
                          ГБОУ Школа № 1636
                        </option>
                        <option value="ГБОУ Школа № 1034" style="color:#000000;">
                          ГБОУ Школа № 1034
                        </option>
                        <option value="ГБОУ Школа № 949" style="color:#000000;">
                          ГБОУ Школа № 949
                        </option>
                        <option value="ГБОУ Школа № 1173" style="color:#000000;">
                          ГБОУ Школа № 1173
                        </option>
                        <option value="ГБОУ Школа № 1582" style="color:#000000;">
                          ГБОУ Школа № 1582
                        </option>
                        <option value="ГБОУ Школа № 1245" style="color:#000000;">
                          ГБОУ Школа № 1245
                        </option>
                        <option value="ГБОУ Школа № 904" style="color:#000000;">
                          ГБОУ Школа № 904
                        </option>
                        <option value="ГБОУ Школа № 947" style="color:#000000;">
                          ГБОУ Школа № 947
                        </option>
                        <option value="ГБОУ Школа № 667" style="color:#000000;">
                          ГБОУ Школа № 667
                        </option>
                        <option value="ГБОУ Школа № 507" style="color:#000000;">
                          ГБОУ Школа № 507
                        </option>
                        <option value="ГБОУ Школа № 1527" style="color:#000000;">
                          ГБОУ Школа № 1527
                        </option>
                        <option value="ГБОУ ПМКК" style="color:#000000;">
                          ГБОУ ПМКК
                        </option>
                        <option value="ГБОУ Школа № 1213" style="color:#000000;">
                          ГБОУ Школа № 1213
                        </option>
                        <option value="ГБОУ Школа № 1454" style="color:#000000;">
                          ГБОУ Школа № 1454
                        </option>
                        <option value="ГБОУ Школа №167 им. Маршала Л.А. Говорова" style="color:#000000;">
                          ГБОУ Школа №167 им. Маршала Л.А. Говорова
                        </option>
                        <option value="ГБОУ Школа № 1576" style="color:#000000;">
                          ГБОУ Школа № 1576
                        </option>
                        <option value="ГБОУ Школа № 648" style="color:#000000;">
                          ГБОУ Школа № 648
                        </option>
                        <option value="ГБОУ Школа № 771" style="color:#000000;">
                          ГБОУ Школа № 771
                        </option>
                        <option value="ГБОУ Школа № 2098 имени Героя Советского Союза Л.М. Доватора"
                                style="color:#000000;">
                          ГБОУ Школа № 2098 имени Героя Советского Союза Л.М. Доватора
                        </option>
                        <option value="ГБОУ Школа № 236" style="color:#000000;">
                          ГБОУ Школа № 236
                        </option>
                        <option value="ГБОУ Школа № 853" style="color:#000000;">
                          ГБОУ Школа № 853
                        </option>
                        <option value="ГБОУ Школа № 1194" style="color:#000000;">
                          ГБОУ Школа № 1194
                        </option>
                        <option value="ГБОУ Школа № 2045 имени Героя Российской Федерации Д.А. Разумовского"
                                style="color:#000000;">
                          ГБОУ Школа № 2045 имени Героя Российской Федерации Д.А. Разумовского
                        </option>
                        <option value="ГБОУ Школа № 2117" style="color:#000000;">
                          ГБОУ Школа № 2117
                        </option>
                        <option value="ГБОУ Школа № 547" style="color:#000000;">
                          ГБОУ Школа № 547
                        </option>
                        <option value="ГБОУ Школа № 2070" style="color:#000000;">
                          ГБОУ Школа № 2070
                        </option>
                      </select></div>
                  </div>
                  <div class="t-input-error" aria-live="polite" id="error_2276508931260"></div>
                </div>
                <div class=" t-input-group t-input-group_nm " data-input-lid="2276508931262" data-field-type="nm">
                  <div class="t-input-block "><input type="text" autocomplete="name" name="Name"
                                                     id="input_2276508931262"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder="ФИО" data-tilda-req="1" aria-required="true"
                                                     data-tilda-rule="name" aria-describedby="error_2276508931262"
                                                     style="color:#000000;border:1px solid #b3b3b3;"></div>
                  <div class="t-input-error" aria-live="polite" id="error_2276508931262"></div>
                </div>
                <div class=" t-input-group t-input-group_ta " data-input-lid="2276508931263" data-field-type="ta">
                  <div class="t-input-block "><textarea name="Textarea" id="input_2276508931263"
                                                        class="t-input js-tilda-rule t-input_bbonly"
                                                        placeholder=" Должность" data-tilda-req="1" aria-required="true"
                                                        aria-describedby="error_2276508931263"
                                                        style="color:#000000;border:1px solid #b3b3b3;height:102px;"
                                                        rows="3"></textarea></div>
                  <div class="t-input-error" aria-live="polite" id="error_2276508931263"></div>
                </div>
                <div class=" t-input-group t-input-group_ph " data-input-lid="1709301380699" data-field-type="ph">
                  <div class="t-input-block "><input type="tel" autocomplete="tel" name="Phone" id="input_1709301380699"
                                                     class="t-input js-tilda-rule t-input_bbonly" value=""
                                                     placeholder=" Контактный телефон" data-tilda-req="1"
                                                     aria-required="true" data-tilda-rule="phone" pattern="[0-9]*"
                                                     aria-describedby="error_1709301380699"
                                                     style="color:#000000;border:1px solid #b3b3b3;"></div>
                  <div class="t-input-error" aria-live="polite" id="error_1709301380699"></div>
                </div>
                <div class=" t-input-group t-input-group_ta " data-input-lid="2276508931264" data-field-type="ta">
                  <div class="t-input-block "><textarea name="Textarea_2" id="input_2276508931264"
                                                        class="t-input js-tilda-rule t-input_bbonly"
                                                        placeholder="Ваш вопрос от команды" data-tilda-req="1"
                                                        aria-required="true" aria-describedby="error_2276508931264"
                                                        style="color:#000000;border:1px solid #b3b3b3;height:204px;"
                                                        rows="6"></textarea></div>
                  <div class="t-input-error" aria-live="polite" id="error_2276508931264"></div>
                </div>
                <div class=" t-input-group t-input-group_ta " data-input-lid="1709301117199" data-field-type="ta">
                  <div class="t-input-block "><textarea name="Textarea_3" id="input_1709301117199"
                                                        class="t-input js-tilda-rule t-input_bbonly"
                                                        placeholder="Ссылка на видео с вопросом"
                                                        aria-describedby="error_1709301117199"
                                                        style="color:#000000;border:1px solid #b3b3b3;height:102px;"
                                                        rows="3"></textarea></div>
                  <div class="t-input-error" aria-live="polite" id="error_1709301117199"></div>
                </div>
                <div class="t-form__errorbox-middle"> <!--noindex-->
                  <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                       tabindex="-1" aria-label="Ошибки при заполнении формы">
                    <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                      <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                    </ul>
                  </div> <!--/noindex--> </div>
                <div class="t-form__submit">
                  <button type="submit" class="t-submit"
                          style="color:#ffffff;background-color:#5866d1;border-radius:30px; -moz-border-radius:30px; -webkit-border-radius:30px;"
                          data-field="buttontitle" data-buttonfieldset="button">
                    Отправить
                  </button>
                </div>
              </div>
              <div class="t-form__errorbox-bottom"> <!--noindex-->
                <div class="js-errorbox-all t-form__errorbox-wrapper" style="display:none;" data-nosnippet=""
                     tabindex="-1" aria-label="Ошибки при заполнении формы">
                  <ul role="list" class="t-form__errorbox-text t-text t-text_md">
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-all"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-req"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-email"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-name"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-phone"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-minlength"></li>
                    <li class="t-form__errorbox-item js-rule-error js-rule-error-string"></li>
                  </ul>
                </div> <!--/noindex--> </div>
              <div style="position: absolute; left: -5000px; bottom: 0; display: none;"><input type="text"
                                                                                               name="form-spec-comments"
                                                                                               value="Its good"
                                                                                               class="js-form-spec-comments"
                                                                                               tabindex="-1"></div>
            </form>
            <style>#rec713915812 input::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 input::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 input:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 input:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 textarea::-webkit-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 textarea::-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 textarea:-moz-placeholder {
                color: #000000;
                opacity: 0.5;
              }

              #rec713915812 textarea:-ms-input-placeholder {
                color: #000000;
                opacity: 0.5;
              }</style>
            <div class="t702__form-bottom-text t-text t-text_xs t-align_left">Отправляя форму, я подтверждаю согласие на
              обработку моих персональных данных (закон №152-ФЗ «О персональных данных»)
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>t_onReady(function () {
        t_onFuncLoad('t702_initPopup', function () {
          t702_initPopup('713915812');
        });
      });</script>
  </div> <!-- Секция 1 -->
  <div id="rec650990690" class="r t-rec t-rec_pt_0 t-rec_pb_0 r_hidden r_anim"
       style="padding-top:0px;padding-bottom:0px; " data-record-type="455"> <!-- t455 --> <!-- cover -->
    <style>#rec650990690 .t455 .t-sociallinks__item a:before {
        background: #525252;
      }</style>
    <!--[if IE 8]>
    <style>.t455 .t-sociallinks__item a:before {
      background: none !important;
    }

    .t455 .t-sociallinks__item a {
      overflow: visible !important;
    }</style> <![endif]-->
    <div class="t-cover" id="recorddiv650990690" bgimgfield="img"
         style="background-image: url(&quot;https://thb.tildacdn.com/tild6532-3765-4833-b134-656538623334/-/resize/20x/4238566-01.png&quot;); height: 280px;">
      <div class="t-cover__carrier" id="coverCarry650990690" data-content-cover-id="650990690"
           data-content-cover-bg="https://static.tildacdn.com/tild6532-3765-4833-b134-656538623334/4238566-01.png"
           data-display-changed="true" data-content-cover-height="280px" data-content-cover-parallax="fixed"
           data-content-use-image-for-mobile-cover="" style="height:280px; " itemscope=""
           itemtype="http://schema.org/ImageObject">
        <meta itemprop="image"
              content="https://static.tildacdn.com/tild6532-3765-4833-b134-656538623334/4238566-01.png">
      </div>
      <div class="t-cover__filter" style="height:280px;background-color: #000;opacity: 0.6;"></div>
      <div class="t455">
        <div class="t-container">
          <div class="t-cover__wrapper t-valign_middle" style="height:280px;">
            <div class="t455__wrapper" data-hook-content="covercontent">
              <div class="t455__textwrapper t-width t-width_7">
                <div class="t455__descr t-descr t-descr_md" field="descr"><p style="text-align: center;"><strong>Организационный
                      комитет:</strong></p>
                  <p style="text-align: center;">marathon@gppc.ru</p></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="rec650893158" class="r t-rec r_hidden r_anim" style=" " data-record-type="215"><a name="2"
                                                                                             style="font-size:0;"></a>
  </div>
  <div id="rec650893159" class="r t-rec" style=" " data-animationappear="off" data-record-type="602"> <!-- T602 -->
    <div class="t602">
      <div class="t602__indicator" style=""></div>
    </div>
    <script>t_onReady(function () {
        t_onFuncLoad('t602_init', function () {
          t602_init('650893159');
        });
      });</script>
  </div>
  <div id="rec650893160" class="r t-rec" style=" " data-animationappear="off" data-record-type="367"> <!-- T367 -->
    <div class="t367"></div>
    <script>t_onReady(function () {
        t_onFuncLoad('t367_autoInit', function () {
          t367_autoInit('650893160');
        });
      });</script>
  </div>
  <div id="rec650893161" class="r t-rec r_hidden r_anim" style=" " data-record-type="215"><a name="form"
                                                                                             style="font-size:0;"></a>
  </div>
</div>
