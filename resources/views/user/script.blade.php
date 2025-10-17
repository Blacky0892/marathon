<script>
  function tma__addLang() {
    var t = tma__getProfileObjFromLS()
      , e = "";
    "RU" !== (e = (t.lang || (window.tildaMembers.settingStyles && window.tildaMembers.settingStyles.projectlang ? window.tildaMembers.settingStyles.projectlang : (navigator.language || navigator.userLanguage).substring(0, 2))).toUpperCase()) && "DE" !== e && "ES" !== e && "PT" !== e && (e = "EN"),
      tildaMembers.userLang = e,
    window.lang || (window.lang = e)
  }
  function tma__onFuncLoad(o, n, a) {
    function i(t) {
      return "function" == typeof window[t] || "object" == typeof window[t]
    }
    var r, l;
    i(o) ? n() : (r = Date.now(),
      l = new Error(o + " is undefined"),
      setTimeout(function t() {
        var e = Date.now();
        if (i(o))
          n();
        else {
          if ("complete" === document.readyState && 15e3 < e - r && !i(o))
            throw l;
          setTimeout(t, a || 100)
        }
      }))
  }
  function t_onReady(t) {
    "loading" != document.readyState ? t() : document.addEventListener("DOMContentLoaded", t)
  }
  function t_onFuncLoad(t, e, o) {
    tma__onFuncLoad(t, e, o)
  }
  function t_throttle(t, e, o) {
    return function() {
      t.apply(o || this, arguments)
    }
  }
  function t_menu__highlightActiveLinks(e) {
    var t = window.location.href, n, r = window.location.pathname;
    "/" === t[t.length - 1] && (n = t.slice(0, -1)),
    "/" === r[r.length - 1] && (r = r.slice(0, -1)),
    "/" === r[0] && (r = r.slice(1)),
    "" === r && (r = "/");
    var i = document.querySelectorAll(e);
    Array.prototype.forEach.call(i, (function(e) {
        var i = e.getAttribute("href");
        if (i) {
          var o = e.href, a = "/" === i[0] ? i.slice(1) : i, l;
          -1 !== r.indexOf("tpost") && (l = "/" + r.slice(0, r.indexOf("tpost"))),
          o !== t && o !== r && i !== t && i !== r && a !== r && n !== t && n !== r && i !== l || e.classList.add("t-active")
        }
      }
    ))
  }
  function t_menu__findAnchorLinks(e, t) {
    var n = document.getElementById("rec" + e);
    if (n && t_menu__isBlockVisible(n)) {
      var r = t + '[href*="#"]:not(.tooltipstered)'
        , i = n ? n.querySelectorAll(r) : [];
      i.length && t_menu__updateActiveLinks(i, t)
    }
  }
  function t_menu__updateActiveLinks(e, t) {
    var n = t.slice(2);
    n = ".t" + (n = parseInt(n, 10)),
      e = Array.prototype.slice.call(e);
    var r = null
      , i = []
      , o = {};
    (e = e.reverse()).forEach((function(e) {
        var t = t_menu__getSectionByHref(e);
        t && t.id && (i.push(t),
          o[t.id] = e)
      }
    )),
      t_menu__updateSectionsOffsets(i),
      i.sort((function(e, t) {
          var n = parseInt(e.getAttribute("data-offset-top"), 10) || 0, r;
          return (parseInt(t.getAttribute("data-offset-top"), 10) || 0) - n
        }
      )),
      window.addEventListener("resize", t_throttle((function() {
          t_menu__updateSectionsOffsets(i)
        }
      ), 200));
    var a = document.querySelectorAll(n);
    Array.prototype.forEach.call(a, (function(e) {
        e.addEventListener("displayChanged", (function() {
            t_menu__updateSectionsOffsets(i)
          }
        ))
      }
    )),
      t_menu__highlightNavLinks(e, i, o, r),
      e.forEach((function(t, n) {
          t.addEventListener("click", (function() {
              var i = t_menu__getSectionByHref(t);
              !t.classList.contains("tooltipstered") && i && i.id && (e.forEach((function(e, t) {
                  t === n ? e.classList.add("t-active") : e.classList.remove("t-active")
                }
              )),
                r = i.id)
            }
          ))
        }
      )),
      window.addEventListener("scroll", t_throttle((function() {
          r = t_menu__highlightNavLinks(e, i, o, r)
        }
      ), 100)),
    "ResizeObserver"in window && setTimeout((function() {
        var e;
        new ResizeObserver((function() {
            t_menu__updateSectionsOffsets(i)
          }
        )).observe(document.body)
      }
    ), 500)
  }
  function t_menu__updateSectionsOffsets(e) {
    e.forEach((function(e) {
        var t = e.getBoundingClientRect().top + window.pageYOffset;
        e.getAttribute("data-offset-top") !== t.toString() && e.setAttribute("data-offset-top", t)
      }
    ))
  }
  function t_menu__getSectionByHref(e) {
    if (e) {
      var t = e.getAttribute("href")
        , n = t ? t.replace(/\s+/g, "") : "";
      if (0 === n.indexOf("/") && (n = n.slice(1)),
      t && e.matches('[href*="#rec"]'))
        return n = n.replace(/.*#/, ""),
          document.getElementById(n);
      var r = t ? t.trim() : ""
        , i = -1 !== r.indexOf("#") && r.indexOf("#");
      ("number" == typeof i || "number" == typeof (i = -1 !== r.indexOf("/") && r.indexOf("/"))) && (r = r.slice(i + 1));
      var o = '.r[data-record-type="215"] a[name="' + r + '"]'
        , a = document.querySelector(o);
      return a ? a.closest(".r") : null
    }
  }
  function t_menu__highlightNavLinks(e, t, n, r) {
    if (document.documentElement.classList.contains("t-body_scroll-locked"))
      return null;
    var i = window.pageYOffset
      , o = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight)
      , a = r
      , l = t.length ? t[t.length - 1] : null
      , s = l && parseInt(l.getAttribute("data-offset-top"), 10) || 0;
    if (t.length && null === r && s > i + 300)
      return e.forEach((function(e) {
          e.classList.remove("t-active")
        }
      )),
        null;
    for (var u = 0; u < t.length; u++) {
      var c = parseInt(t[u].getAttribute("data-offset-top"), 10)
        , d = t[u].id ? n[t[u].id] : null;
      if (i + 300 >= c || 0 === u && i >= o - window.innerHeight) {
        null === r && d && !d.classList.contains("t-active") ? (e.forEach((function(e) {
            e.classList.remove("t-active")
          }
        )),
        d && d.classList.add("t-active"),
          a = null) : null !== r && t[u].id && r === t[u].id && (a = null);
        break
      }
    }
    return a
  }
  function t_menu__setBGcolor(e, t) {
    var n = document.querySelectorAll(t);
    Array.prototype.forEach.call(n, (function(e) {
        window.innerWidth > 980 ? "yes" === e.getAttribute("data-bgcolor-setbyscript") && (e.style.backgroundColor = e.getAttribute("data-bgcolor-rgba")) : (e.style.backgroundColor = e.getAttribute("data-bgcolor-hex"),
          e.setAttribute("data-bgcolor-setbyscript", "yes"),
        e.style.transform && (e.style.transform = ""),
        e.style.opacity && (e.style.opacity = ""))
      }
    ))
  }
  function t_menu__showFixedMenu(e, t) {
    var n, r = [".t280", ".t282", ".t450", ".t451", ".t466", ".t453"].some((function(e) {
        return e === t
      }
    ));
    if (!(window.innerWidth <= 980) || r) {
      var i = document.getElementById("rec" + e);
      if (!i)
        return !1;
      var o = i.querySelectorAll(t);
      Array.prototype.forEach.call(o, (function(e) {
          var t = e.getAttribute("data-appearoffset");
          if (t) {
            -1 !== t.indexOf("vh") && (t = Math.floor(window.innerHeight * (parseInt(t) / 100))),
              t = parseInt(t, 10);
            var n = e.clientHeight;
            "number" == typeof t && window.pageYOffset >= t ? e.style.transform === "translateY(-" + n + "px)" && t_menu__slideElement(e, n, "toBottom") : "translateY(0px)" === e.style.transform ? t_menu__slideElement(e, n, "toTop") : (e.style.transform = "translateY(-" + n + "px)",
              e.style.opacity = "0")
          }
        }
      ))
    }
  }
  function t_menu__changeBgOpacity(e, t) {
    var n, r = ["t280", "t282", "t451", "t466"].some((function(e) {
        return -1 !== t.indexOf(e)
      }
    ));
    if (!(window.innerWidth <= 980) || r) {
      var i = document.getElementById("rec" + e);
      if (!i)
        return !1;
      var o = i.querySelectorAll(t);
      Array.prototype.forEach.call(o, (function(e) {
          var t = e.getAttribute("data-bgcolor-rgba")
            , n = e.getAttribute("data-bgcolor-rgba-afterscroll")
            , r = e.getAttribute("data-bgopacity")
            , i = e.getAttribute("data-bgopacity-two")
            , o = parseInt(e.getAttribute("data-menushadow"), 10) || 0;
          o /= 100;
          var a = e.getAttribute("data-menushadow-css");
          e.style.backgroundColor = window.pageYOffset > 20 ? n : t,
            window.pageYOffset > 20 && "0" === i || window.pageYOffset <= 20 && ("0.0" === r || "0" === r) || !o && !a ? e.style.boxShadow = "none" : a ? e.style.boxShadow = a : o && (e.style.boxShadow = "0px 1px 3px rgba(0,0,0," + o + ")")
        }
      ))
    }
  }
  function t_menu__createMobileMenu(e, t) {
    var n = document.getElementById("rec" + e);
    if (n) {
      var r = n.querySelector(t)
        , i = r ? r.getAttribute("data-mobile-burgerhook") : ""
        , o = n.querySelector(t + "__mobile")
        , a = o || n.querySelector(".tmenu-mobile")
        , l = o ? t.slice(1) + "_opened" : "tmenu-mobile_opened"
        , s = "t-menuburger-opened";
      if (a)
        if (r && r.classList.contains(t.slice(1) + "__mobile_burgerhook") && i) {
          if (a.querySelector(".tmenu-mobile__burger"))
            var u = a.querySelector(".tmenu-mobile__burger");
          else if (a.querySelector(".t-menuburger"))
            var u = a.querySelector(".t-menuburger");
          if (u) {
            var c = u.parentElement
              , d = document.createElement("a");
            d.href = i,
            c && (d.appendChild(u),
              c.appendChild(d))
          }
        } else {
          var u = a.querySelector(".t-menuburger");
          a.addEventListener("click", (function(n) {
              if (!n.target.closest("a")) {
                if (a.classList.contains(l))
                  t_menu__FadeOut(r, 300),
                    a.classList.remove(l),
                    u.classList.remove(s),
                    u.setAttribute("aria-expanded", "false");
                else if (t_menu__fadeIn(r, 300, (function() {
                    r.style.transform && (r.style.transform = ""),
                    r.style.opacity && (r.style.opacity = "")
                  }
                )),
                  a.classList.add(l),
                  u.classList.add(s),
                  u.setAttribute("aria-expanded", "true"),
                  r.classList.contains("tmenu-mobile__menucontent_fixed")) {
                  var i = getComputedStyle(a).height;
                  r.style.top = i
                }
                t_menu_checkOverflow(e, t)
              }
            }
          ))
        }
      screen.width < 980 && n.addEventListener("click", (function(n) {
          if (r && r.classList.contains("tmenu-mobile__menucontent_fixed")) {
            var i = n.target.closest(".t-menu__link-item, .t978__submenu-link, .t978__innermenu-link, .t966__menu-link, .t-menusub__link-item, .t-btn, .t794__link"), o, c;
            if (i)
              ["t978__menu-link_hook", "t978__tm-link", "t966__tm-link", "t794__tm-link", "t-menusub__target-link"].some((function(e) {
                  return i.classList.contains(e)
                }
              )) ? r.addEventListener("menuOverflow", (function() {
                  t_menu_checkOverflow(e, t)
                }
              )) : (t_menu__FadeOut(r, 300),
              a && a.classList.remove(l),
              a && u.classList.remove(s))
          }
        }
      )),
        window.addEventListener("resize", t_throttle((function() {
            window.innerWidth > 980 && (r && (r.style.opacity = ""),
            r && (r.style.display = ""),
            r && (r.style.top = ""),
            a && a.classList.remove(l)),
              t_menu_checkOverflow(e, t)
          }
        ), 200))
    }
  }
  function t_menu_checkOverflow(e, t) {
    var n = document.getElementById("rec" + e)
      , r = n ? n.querySelector(t) : null;
    if (r) {
      var i = n.querySelector(t + "__mobile")
        , o = i || n.querySelector(".tmenu-mobile");
      if (o) {
        var a = o.offsetHeight
          , l = document.documentElement.clientHeight
          , s = r.style.position || window.getComputedStyle(r).position
          , u = r.offsetHeight;
        "fixed" === s && u > l - a && (r.style.overflow = "auto",
          r.style.maxHeight = "calc(100% - " + a + "px)")
      }
    }
  }
  function t_menu__FadeOut(e, t, n) {
    if (!e)
      return !1;
    var r = 1;
    t = parseInt(t, 10);
    var i, o = setInterval((function() {
        e.style.opacity = r,
        (r -= .1) <= .1 && (e.style.opacity = "0",
          e.style.display = "none",
        "function" == typeof n && n(),
          clearInterval(o))
      }
    ), t > 0 ? t / 10 : 40)
  }
  function t_menu__fadeIn(e, t, n) {
    if (!e)
      return !1;
    if (("1" === getComputedStyle(e).opacity || "" === getComputedStyle(e).opacity) && "none" !== getComputedStyle(e).display)
      return !1;
    var r = 0
      , i = (t = parseInt(t, 10)) > 0 ? t / 10 : 40;
    e.style.opacity = r,
      e.style.display = "block";
    var o = setInterval((function() {
        e.style.opacity = r,
        (r += .1) >= 1 && (e.style.opacity = "1",
        "function" == typeof n && n(),
          clearInterval(o))
      }
    ), i)
  }
  function t_menu__slideElement(e, t, n) {
    var r = "toTop" === n ? 0 : t
      , i = "toTop" === n ? 1 : 0
      , o = setInterval((function() {
        e.style.transform = "translateY(-" + r + "px)",
          e.style.opacity = i.toString(),
          i = "toTop" === n ? i - .1 : i + .1,
          r = "toTop" === n ? r + t / 20 : r - t / 20,
        "toTop" === n && r >= t && (e.style.transform = "translateY(-" + t + "px)",
          e.style.opacity = "0",
          clearInterval(o)),
        "toBottom" === n && r <= 0 && (e.style.transform = "translateY(0px)",
          e.style.opacity = "1",
          clearInterval(o))
      }
    ), 10)
  }
  function t_menu__interactFromKeyboard(e) {
    var t = document.getElementById("rec" + e);
    if (t) {
      var n = t.querySelectorAll(".t-menu__list > li > a"), r = t.querySelectorAll(".t-menu__list > li li"), i = 9, o = 13, a = 27, l = 32, s = 0, u, t_menu__focusOnCurrentMenuItem = function(e) {
        e === n.length ? e = 0 : e < 0 && (e = n.length - 1),
          n[e].focus(),
          s = e
      }, t_menu__focusOnCurrentSubmenuItem = function(e, t) {
        var n = e.querySelectorAll("a");
        t == n.length ? t = 0 : t < 0 && (t = n.length - 1),
          n[t].focus(),
          u = t
      }, t_menu__interactWithMenuFromKeyboard = function(e) {
        e.addEventListener("keydown", (function(e) {
            var t = this.parentNode.querySelector(".t-menusub__list");
            switch (e.keyCode) {
              case i:
                if (!e.shiftKey && s <= n.length - 2)
                  t_menu__focusOnCurrentMenuItem(s + 1);
                else {
                  if (!(e.shiftKey && s > 0))
                    return;
                  t_menu__focusOnCurrentMenuItem(s - 1)
                }
                break;
              case o:
              case l:
                if (!t)
                  return;
                this.click(),
                  u = 0,
                  t_menu__focusOnCurrentSubmenuItem(t, 0)
            }
            e.preventDefault()
          }
        ))
      }, t_menu__focusOnMenuItem = function(e) {
        e.addEventListener("focus", (function() {
            u = 0
          }
        ))
      }, t_menu__clickOnMenuItem = function(e) {
        var t = e.parentNode.querySelector(".t-menusub__menu");
        e.addEventListener("click", (function(n) {
            if ("false" == this.getAttribute("aria-expanded") || null == this.getAttribute("aria-expanded")) {
              this.setAttribute("aria-expanded", "true");
              var r = e.nextElementSibling
                , i = r ? r.getAttribute("data-submenu-margin") : 0;
              t_menusub__showSubmenu(e, t, i)
            } else
              this.setAttribute("aria-expanded", "false");
            return n.preventDefault(),
              !1
          }
        ))
      }, t_menu__interactWithSubmenuFromKeyboard = function(e) {
        var t = e.closest(".t-menusub__menu")
          , r = !1;
        e.addEventListener("keydown", (function(e) {
            var c = this.parentNode;
            switch (e.keyCode) {
              case i:
                r = !0;
                var d = c.querySelectorAll(".t-menusub__link-item").length;
                if (e.shiftKey)
                  0 === u ? (t_menu__focusOnCurrentMenuItem(s),
                    t_menusub__hideSubmenu(t)) : t_menu__focusOnCurrentSubmenuItem(c, u - 1);
                else if (u === d - 1) {
                  if (t_menusub__hideSubmenu(t),
                  s === n.length - 1)
                    return;
                  t_menu__focusOnCurrentMenuItem(s + 1)
                } else
                  t_menu__focusOnCurrentSubmenuItem(c, u + 1);
                break;
              case o:
              case l:
                r = !1,
                  t_menusub__hideSubmenu(t);
                break;
              case a:
                r = !0,
                  t_menu__focusOnCurrentMenuItem(s),
                  t_menusub__hideSubmenu(t)
            }
            r && (e.preventDefault(),
              e.stopPropagation())
          }
        ))
      };
      Array.prototype.forEach.call(n, (function(e) {
          var t;
          t_menu__focusOnMenuItem(e),
            t_menu__interactWithMenuFromKeyboard(e),
          !e.parentNode.querySelector(".t-menusub__menu") || window.isMobile || "ontouchend"in document || t_menu__clickOnMenuItem(e)
        }
      )),
        Array.prototype.forEach.call(r, (function(e) {
            t_menu__interactWithSubmenuFromKeyboard(e)
          }
        ))
    }
  }
  function t_menu__isBlockVisible(e) {
    var t = window.innerWidth
      , n = e.getAttribute("data-screen-min")
      , r = e.getAttribute("data-screen-max");
    return !(n && t < parseInt(n, 10)) && !(r && t > parseInt(r, 10))
  }
  function t_animate__init() {
    t_animate__checkAnimationAvailability() && (t_animate__generateStyles(),
      t_animate__wrapTextWithOpacity(),
      t_animate__addNoHoverClassToBtns(),
      t_animate__preventHorizontalScroll(),
    1200 <= window.innerWidth && t_animate__parseNumberText(),
      setTimeout(function() {
        t_animate__startAnimation()
      }, 1500))
  }
  function t_animate__checkMobile(t) {
    return t.filter(function(t) {
      var e = t.closest(".t396__elem, .t396__group");
      return !(!e || "y" !== e.getAttribute("data-animate-mobile")) || (t.classList.contains("r") ? Array.prototype.forEach.call(t.querySelectorAll(".t-animate"), function(t) {
        t_animate__removeAnimationClass(t, "")
      }) : t_animate__removeAnimationClass(t, ""),
        !1)
    })
  }
  function t_animate__removeAnimationClass(e, t) {
    var a;
    e && (e.classList.remove(a = "t-animate"),
    t && (t = "string" == typeof t ? [t] : t).forEach(function(t) {
      e.classList.remove(a + "_" + t)
    }))
  }
  function t_animate__preventHorizontalScroll() {
    var t = document.querySelectorAll("[data-animate-style=fadeinleft]");
    !Array.prototype.filter.call(t, function(t) {
      return !t.classList.contains("t396__elem") && !t.closest(".t-cover")
    }).length || window.innerWidth < 980 || (t = document.querySelector(".t-records")) && (t.style.overflowX = "hidden")
  }
  function t_animate__checkAnimationAvailability() {
    var t = document.querySelector(".t-records")
      , e = t ? t.getAttribute("data-blocks-animationoff") : null
      , t = t ? t.getAttribute("data-tilda-mode") : null;
    return !/Bot/i.test(navigator.userAgent) && "yes" !== e && !t_animate__checkIE() && "edit" !== t || (e = document.querySelectorAll(".t-animate"),
      Array.prototype.forEach.call(e, function(t) {
        t_animate__removeAnimationClass(t, "")
      }),
      !1)
  }
  function t_animate__generateStyles() {
    if (!!document.querySelector(".t396")) {
      for (var t = t_animate__getBreakpointsArr(), e = '.t396 .t-animate[data-animate-style="fadein"],.t396 .t-animate[data-animate-style="fadeinup"],.t396 .t-animate[data-animate-style="fadeindown"],.t396 .t-animate[data-animate-style="fadeinleft"],.t396 .t-animate[data-animate-style="fadeinright"],.t396 .t-animate[data-animate-style="zoomin"],.t396 .t-animate[data-animate-style="zoomout"] {opacity: 0;-webkit-transition-property: opacity, transform;transition-property: opacity, transform;-webkit-transition-duration: 1s;transition-duration: 1s;-webkit-transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);-webkit-backface-visibility: hidden;backface-visibility: hidden;}', a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + ".t396 .t-animate[data-animate-style-res-" + n.minRes + '="fadein"],.t396 .t-animate[data-animate-style-res-' + n.minRes + '="fadeinup"],.t396 .t-animate[data-animate-style-res-' + n.minRes + '="fadeindown"],.t396 .t-animate[data-animate-style-res-' + n.minRes + '="fadeinleft"],.t396 .t-animate[data-animate-style-res-' + n.minRes + '="fadeinright"],.t396 .t-animate[data-animate-style-res-' + n.minRes + '="zoomin"],.t396 .t-animate[data-animate-style-res-' + n.minRes + '="zoomout"] {opacity: 0;-webkit-transition-property: opacity, transform;transition-property: opacity, transform;-webkit-transition-duration: 1s;transition-duration: 1s;-webkit-transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);-webkit-backface-visibility: hidden;backface-visibility: hidden;}}');
      e += '.t396 .t-title.t-animate {-webkit-transition-duration: 1.2s;transition-duration: 1.2s;}.t396 .t-descr.t-animate,.t396 .t-uptitle.t-animate,.t396 .t-subtitle.t-animate,.t396 .t-text.t-animate {-webkit-transition-duration: 0.7s;transition-duration: 0.7s;}.t396 .t-item.t-animate {-webkit-transition-duration: 0.5s;transition-duration: 0.5s;}.t396 .t-animate[data-animate-style="fadein"] {opacity: 0;transform: none;}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="fadein"] {opacity: 0;transform: none;}}');
      e += '.t396 .t-animate_started[data-animate-style="fadein"] {opacity: 1;}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="fadein"] {opacity: 1;}}');
      e += '.t396 .t-animate[data-animate-style="fadeinup"] {-webkit-transform: translate(0, 100px);transform: translate(0, 100px);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="fadeinup"] {-webkit-transform: translate(0, 100px);transform: translate(0, 100px);}}');
      e += '.t396 .t-animate_started[data-animate-style="fadeinup"] {opacity: 1;-webkit-transform: none;transform: none;}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="fadeinup"] {opacity: 1;-webkit-transform: none;transform: none;}}');
      e += '.t396 .t-animate[data-animate-style="fadeindown"] {-webkit-transform: translate(0, -100px);transform: translate(0, -100px);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="fadeindown"] {-webkit-transform: translate(0, -100px);transform: translate(0, -100px);}}');
      e += '.t396 .t-animate_started[data-animate-style="fadeindown"] {opacity: 1;-webkit-transform: none;transform: none;}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="fadeindown"] {opacity: 1;-webkit-transform: none;transform: none;}}');
      e += '.t396 .t-animate[data-animate-style="fadeinleft"] {-webkit-transform: translate(100px, 0);transform: translate(100px, 0);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="fadeinleft"] {-webkit-transform: translate(100px, 0);transform: translate(100px, 0);}}');
      e += '.t396 .t-animate_started[data-animate-style="fadeinleft"] {opacity: 1;-webkit-transform: none;transform: none;}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="fadeinleft"] {opacity: 1;-webkit-transform: none;transform: none;}}');
      e += '.t396 .t-animate[data-animate-style="fadeinright"] {-webkit-transform: translate(-100px, 0);transform: translate(-100px, 0);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="fadeinright"] {-webkit-transform: translate(-100px, 0);transform: translate(-100px, 0);}}');
      e += '.t396 .t-animate_started[data-animate-style="fadeinright"] {opacity: 1;-webkit-transform: none;transform: none;}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="fadeinright"] {opacity: 1;-webkit-transform: none;transform: none;}}');
      e += '.t396 .t-animate[data-animate-style="zoomin"] {-webkit-transform: scale(0.9);transform: scale(0.9);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="zoomin"] {-webkit-transform: scale(0.9);transform: scale(0.9);}}');
      e += '.t396 .t-animate_started[data-animate-style="zoomin"] {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="zoomin"] {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}}');
      e += '.t396 .t-animate[data-animate-style="zoomout"] {-webkit-transform: scale(1.2);transform: scale(1.2);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate[data-animate-style-res-" + n.minRes + '="zoomout"] {-webkit-transform: scale(1.2);transform: scale(1.2);}}');
      e += '.t396 .t-animate_started[data-animate-style="zoomout"] {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}';
      for (a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="zoomout"] {opacity: 1;-webkit-transform: scale(1);transform: scale(1);}}');
      e += ".t396 .t-animate_started[data-animate-distance],.t396 .t-animate_started[data-animate-scale]{-webkit-transform: none !important;transform: none !important;}";
      for (var n, a = 0; a < t.length; a++)
        (n = t_animate__getMediaQuery(t, a)).isContinue || (e += n.text + "#allrecords .t396 .t-animate_started[data-animate-distance-res-" + n.minRes + "],#allrecords .t396 .t-animate_started[data-animate-style-res-" + n.minRes + '="zoomout"] {-webkit-transform: none !important;transform: none !important;}}');
      var i = document.createElement("style")
        , r = document.head || document.querySelector("head");
      i.textContent = e,
        r.appendChild(i)
    }
  }
  function t_animate__getBreakpointsArr() {
    var e = []
      , t = Array.prototype.slice.call(document.querySelectorAll('.r[data-record-type="396"]:not(.t397__off):not(.t395__off):not(.t400__off) .t396__artboard'));
    return Array.prototype.forEach.call(t, function(t) {
      t.classList.contains("t396__artboard") && (t = (t = (t = (t = t.getAttribute("data-artboard-screens")) ? t.split(",") : [1200, 960, 640, 480, 320]).map(function(t) {
        return parseInt(t, 10)
      })).filter(function(t) {
        return -1 === e.indexOf(t)
      }),
        e = e.concat(t))
    }),
      e = t_animate__sortArr(e)
  }
  function t_animate__getMediaQuery(t, e) {
    var a = ""
      , n = !1
      , i = t[e + 1]
      , r = t[e] - 1
      , o = e === t.length - 1
      , e = e === t.length - 2;
    return o ? n = !0 : a += e ? "@media screen and (max-width: " + r + "px) {" : "@media screen and (min-width: " + i + "px) and (max-width: " + r + "px) {",
      {
        text: a,
        isContinue: n,
        minRes: i
      }
  }
  function t_animate__sortArr(t) {
    return t.sort(function(t, e) {
      return e - t
    })
  }
  function t_animate__startAnimation() {
    var t, a, e, n = document.querySelectorAll(".r"), i = Array.prototype.filter.call(n, function(t) {
      return t.querySelector(".t-animate[data-animate-group=yes]")
    }), r = Array.prototype.filter.call(n, function(t) {
      return t.querySelector('.t-animate[data-animate-chain="yes"]')
    }), o = document.querySelectorAll(".t-animate");
    o = Array.prototype.filter.call(o, function(t) {
      return !("yes" === t.getAttribute("data-animate-group") || "yes" === t.getAttribute("data-animate-chain") || t.getAttribute("observer-ready"))
    }),
    window.innerWidth < 1200 && (i = t_animate__checkMobile(i),
      r = t_animate__checkMobile(r),
      o = t_animate__checkMobile(o)),
    (i.length || o.length || r.length) && (t_animate__setAnimationState(i, r, o),
      i = t_animate__hasWaitAnimation(i),
      o = t_animate__hasWaitAnimation(o),
      r = t_animate__hasWaitAnimation(r),
      t = "undefined" != typeof navigator && /^((?!chrome|android).)*(safari|mobile)/i.test(navigator.userAgent) && /(os |version\/)15(.|_)[4-9]/i.test(navigator.userAgent),
      "IntersectionObserver"in window && !t ? (i.length && (a = [],
        i.forEach(function(t) {
          var e = t.querySelector(".t-animate");
          "fadeindown" === e.getAttribute("data-animate-style") && e.closest(".t-cover") && (t = t.querySelector(".t-animate:not(:first-child)")) && (e = t),
            a.push(e)
        }),
        a.forEach(function(t) {
          var e = {
            rootMargin: t.offsetHeight / 5 * -1 + "px 0px"
          };
          new IntersectionObserver(function(t, a) {
              t.forEach(function(t) {
                var e;
                t.isIntersecting && (t = t.target,
                  a.unobserve(t),
                  e = t.closest(".r").querySelectorAll(".t-animate"),
                  e = Array.prototype.filter.call(e, function(t) {
                    return !(t.classList.contains("t-animate__btn-wait-chain") || "yes" === t.getAttribute("data-animate-chain"))
                  }),
                  t_animate__makeSectionButtonWait(t),
                  t_animate__saveSectionHeaderStartTime(t),
                  Array.prototype.forEach.call(e, function(t) {
                    t.classList.remove("t-animate_wait"),
                      t_animate__removeNoHoverClassFromBtns(t),
                      t_animate__setStartAnimationClass(t, !1)
                  }))
              })
            }
            ,e).observe(t)
        })),
      o.length && o.forEach(function(t) {
        var e = {}
          , a = t_animate__getAttrByResBase(t, "trigger-offset")
          , a = (a && (e.rootMargin = "0px 0px " + -1 * a.replace("px", "") + "px 0px"),
          new IntersectionObserver(function(t, n) {
              t.forEach(function(t) {
                var e, a = t.target;
                !a.demandTransform && a.style.transform ? (a.demandTransform = a.style.transform,
                  a.style.transform = "unset") : (e = window.getComputedStyle(a).transform,
                a.style.transform || "none" === e || (a.demandTransform = e,
                  a.style.transform = "unset")),
                t.isIntersecting && (a.closest(".t1093") || n.unobserve(a),
                  e = -1 !== (e = a.style.transitionDelay || "0ms").indexOf("ms") ? parseInt(e) + 250 : 1e3 * parseFloat(e) + 250,
                a.demandTransform && -1 !== a.demandTransform.indexOf("matrix") && (a.style.transform = ""),
                a.demandTransform && "unset" === a.style.transform && (a.style.transform = a.demandTransform,
                  delete a.demandTransform),
                  setTimeout(function() {
                    a.classList.remove("t-animate_wait"),
                      t_animate__removeNoHoverClassFromBtns(a),
                      t_animate__setStartAnimationClass(a, !0),
                    "animatednumber" === t_animate__getAttrByResBase(a, "style") && t_animate__animateNumbers(a)
                  }, e))
              })
            }
            ,e));
        t.dataset.observerReady = !0,
          a.observe(t)
      }),
      r.length && ((e = function() {
          t_animate__getChainOffsets(r)
        }
      )(),
        window.addEventListener("resize", t_throttle(function() {
          e()
        })),
        setInterval(e, 5e3),
        window.addEventListener("scroll", t_throttle(function() {
          var t = window.pageYOffset + window.innerHeight;
          t_animate__animateChainsBlocks(r, t)
        })))) : ((e = function() {
          t_animate__getGroupsOffsets(i),
            t_animate__getChainOffsets(r),
            t_animate__getElemsOffsets(o)
        }
      )(),
        window.addEventListener("resize", t_throttle(e)),
        setInterval(e, 5e3),
        window.addEventListener("scroll", t_throttle(function() {
          var t = t_animate__deleteAnimatedEls(i, o)
            , t = (o = t[0],
            t_animate__animateOnScroll(i = t[1], r, o));
          t && t.length && (i = t[0],
            r = t[1],
            o = t[2])
        }))),
      Array.prototype.forEach.call(n, function(t) {
        var a = t.querySelector(".t-popup");
        a && a.addEventListener("scroll", t_throttle(function() {
          var t, e = window.pageYOffset + window.innerHeight;
          (a.classList.contains("t-animate") && "yes" === a.getAttribute("data-animate-chain") || a.querySelector(".t-animate[data-animate-chain=yes]")) && (t_animate__setAnimationStateChains(t = [a]),
            t_animate__getChainOffsets(t = Array.prototype.filter.call(t, function(t) {
              return t.querySelector(".t-animate_wait")
            })),
            t_animate__animateChainsBlocks(t, e))
        }))
      }))
  }
  function t_animate__animateOnScroll(t, e, a) {
    var n, i;
    if (t.length || e.length || a.length)
      return n = window.pageYOffset,
        i = n + window.innerHeight,
        [t_animate__animateGroups(t, i, n), t_animate__animateChainsBlocks(e, i, n), t_animate__animateElems(a, i, n)]
  }
  function t_animate__animateGroups(t, a) {
    return t.forEach(function(t) {
      var e;
      t.curTopOffset < a && (e = t.querySelectorAll(".t-animate"),
        e = Array.prototype.filter.call(e, function(t) {
          return !(t.classList.contains("t-animate__btn-wait-chain") || "yes" === t.getAttribute("data-animate-chain"))
        }),
        t_animate__makeSectionButtonWait(t),
        t_animate__saveSectionHeaderStartTime(t),
        Array.prototype.forEach.call(e, function(t) {
          t.classList.remove("t-animate_wait"),
            t_animate__removeNoHoverClassFromBtns(t),
            t_animate__setStartAnimationClass(t, !1)
        }))
    }),
      t
  }
  function t_animate__animateChainsBlocks(t, e) {
    return t.forEach(function(t) {
      t.itemsOffsets[0] < e && t.querySelectorAll(".t-animate_wait").length && (t_animate__animateChainItemsOnScroll(t, e),
      t.itemsOffsets.length && t_animate__checkSectionButtonAnimation__outOfTurn(t))
    }),
      t
  }
  function t_animate__animateElems(t, a, n) {
    return Array.prototype.filter.call(t, function(t) {
      var e = t_animate__detectElemTriggerOffset(t, a);
      return t.curTopOffset < e ? (t.classList.remove("t-animate_wait"),
        t_animate__removeNoHoverClassFromBtns(t),
        t_animate__setStartAnimationClass(t, !1),
      "animatednumber" === t_animate__getAttrByResBase(t, "style") && t_animate__animateNumbers(t),
        !0) : !(t.curTopOffset < n) && void 0
    }),
      t
  }
  function t_animate__deleteAnimatedEls(t, e) {
    var a = window.pageYOffset
      , n = []
      , i = [];
    return t.forEach(function(t) {
      var e;
      t.curTopOffset <= a ? (e = t.querySelectorAll(".t-animate"),
        Array.prototype.forEach.call(e, function(t) {
          t_animate__removeAnimationClass(t, ["wait", "no-hover"])
        })) : n.push(t)
    }),
      e.forEach(function(t) {
        t.curTopOffset <= a ? (t_animate__removeAnimationClass(t, ["wait", "no-hover"]),
          t_animate__setStartAnimationClass(t, !1)) : i.push(t)
      }),
      [i, n]
  }
  function t_animate__animateChainItemsOnScroll(t, e) {
    var a = t.querySelectorAll(".t-animate_wait[data-animate-chain=yes]")
      , a = Array.prototype.slice.call(a)
      , n = 0
      , i = 0
      , r = t.itemsOffsets[0]
      , o = t_animate__getDelayFromPreviousScrollEvent(t, .16)
      , s = t_animate__getSectionHeadDealy(t);
    a.length && a[0].classList.add("t-animate__chain_first-in-row");
    for (var l = 0; l < a.length; l++) {
      var m = a[l]
        , c = t.itemsOffsets[l];
      if (!(c < e))
        break;
      c !== r && (m.classList.add("t-animate__chain_first-in-row"),
        n = ++i,
        r = c);
      var _ = .16 * n + o + s;
      m.style.transitionDelay = _ + "s",
        m.classList.remove("t-animate_wait"),
        t_animate__setStartAnimationClass(m, !1),
        m.setAttribute("data-animate-start-time", Date.now() + 1e3 * _),
      m[0] === a[a.length - 1] && t_animate__checkSectionButtonAnimation(t, _),
      +c == +r && n++,
        a.splice(l, 1),
        t.itemsOffsets.splice(l, 1),
        l--
    }
    t_animate__catchTransitionEndEvent(t)
  }
  function t_animate__getSectionHeadDealy(t) {
    var e = t.querySelector(".t-section__title.t-animate")
      , t = t.querySelector(".t-section__descr.t-animate")
      , a = 0;
    if (e) {
      e = e.getAttribute("data-animate-start-time") || 0;
      if (Date.now() - e <= 160)
        return a = .16
    }
    if (t) {
      e = t.getAttribute("data-animate-start-time") || 0;
      if (Date.now() - e <= 160)
        return a = .16
    }
    return a
  }
  function t_animate__getDelayFromPreviousScrollEvent(t, e) {
    var a = !t.querySelectorAll(".t-animate_started").length
      , t = t.querySelectorAll(".t-animate__chain_first-in-row.t-animate_started")
      , t = Array.prototype.filter.call(t, function(t) {
      return !t.classList.contains("t-animate__chain_showed")
    });
    return a || !t.length ? 0 : t.length ? (a = (t[t.length - 1].getAttribute("data-animate-start-time") || 0) - Date.now()) <= 0 ? e : a / 1e3 + e : void 0
  }
  function t_animate__setStartAnimationClass(t, e) {
    var a;
    t && (e && (a = t.closest("." + (e = "t-animate-for-wrapper"))) && a.classList.remove(e),
      t.classList.add("t-animate_started"))
  }
  function t_animate__catchTransitionEndEvent(t) {
    t = t.querySelectorAll(".t-animate__chain_first-in-row.t-animate_started"),
      t = Array.prototype.filter.call(t, function(t) {
        return !t.classList.contains("t-animate__chain_showed")
      });
    Array.prototype.forEach.call(t, function(e) {
      ["transitionend", "webkitTransitionEnd", "oTransitionEnd", "otransitionend", "MSTransitionEnd"].forEach(function(t) {
        e.addEventListener(t, function() {
          t_animate__addEventOnAnimateChain(e)
        }),
          e.removeEventListener(t, function() {
            t_animate__addEventOnAnimateChain(e)
          })
      })
    })
  }
  function t_animate__parseNumberText() {
    var r = window.pageYOffset
      , t = document.querySelectorAll(".t-animate[data-animate-style='animatednumber']");
    Array.prototype.forEach.call(t, function(t) {
      var e, a, n = "", i = t.querySelectorAll("span");
      Array.prototype.forEach.call(i, function(t) {
        n += t.getAttribute("style") || "",
          t.removeAttribute("style"),
          t.removeAttribute("data-redactor-style")
      }),
        t.querySelectorAll('div[data-customstyle="yes"]').length ? (e = (i = t.querySelector('div[data-customstyle="yes"]')) ? i.innerHTML : "",
          i = t.getAttribute("style") || "",
        (a = (a = t.querySelector("div[data-customstyle]")) ? a.getAttribute("style") : "") && (i += a),
          t.setAttribute("style", i)) : e = t.innerHTML,
        n = n.split(";").filter(function(t, e) {
          return n.split(";").indexOf(t) === e
        }).join(";"),
      t.getBoundingClientRect().top + window.pageYOffset < r - 500 || e.length && (i = a = e.replace(/<br>/g, " ").replace(/[^\d., ]+/g, "").replace(/ (\.|,)/g, "").replace(/(\d)(?=\d) /g, "$1").trim(),
      -1 === e.indexOf(a) && (i = a = a.split(" ")[0]),
      "" !== a && (t.setAttribute("data-animate-number-count", e),
        t_animate__changeNumberOnZero(t, e.replace(i, "num")),
        a = t.querySelectorAll("span"),
        a = Array.prototype.filter.call(a, function(t) {
          return !t.classList.contains(".t-animate__number")
        }),
        Array.prototype.forEach.call(a, function(t) {
          t.setAttribute("style", n)
        })))
    })
  }
  function t_animate__changeNumberOnZero(t, e) {
    t.innerHTML = e.replace(/num/g, '<span class="t-animate__number">0</span>')
  }
  function t_animate__animateNumbers(e) {
    if (!e)
      return !1;
    var a, n, i, r, o, s, l = e.getAttribute("data-animate-number-count"), m = [], t = e.querySelectorAll("span"), c = ((t = Array.prototype.filter.call(t, function(t) {
      return !t.classList.contains(".t-animate__number")
    })).length && (m = t[0].getAttribute("style") || ""),
      []), _ = null, f = (l && (_ = l.match(/\d+\.\d+|\d+,\d+/g),
      a = l.match(/\d+/g),
      l.replace(/(\d)(?= \d) /g, "$1").split(" ").forEach(function(t) {
        isNaN(parseInt(t.replace(/[^\d., ]+/g, ""), 10)) || c.push(t.replace(/[^\d., ]+/g, ""))
      })),
      0), u = !1, d = !1, y = (e.removeAttribute("data-animate-number-count"),
    null !== _ && (d = -1 !== _[0].indexOf(",")),
      c.forEach(function(t, e) {
        var a;
        null !== _ && (-1 !== t.indexOf(",") && (a = t.split(",")),
        -1 !== t.indexOf(".") && (a = t.split(".")),
        -1 === t.indexOf(",") && -1 === t.indexOf(".") || (f = a[1].length,
          c[e] = +a.join("."),
          u = !0))
      }),
      e.querySelector(".t-animate__number"));
    c[0] && (n = Number(c[0]) || 0,
      i = 0,
      r = Math.pow(10, f),
    u && (n *= r,
      i *= r),
      o = 0,
      s = setInterval(function() {
        var t;
        i += n / 108,
          o = u ? (Math.round(i) / r).toFixed(f) + "" : Math.floor(i) + "",
        1 < a.length && (o = o.replace(/(\d)(?=(\d{3})+([^\d]|$))/g, "$1 ")),
        d && (o = o.replace(/\./g, ",")),
        y && (y.textContent = o),
        n <= i && (clearInterval(s),
          e.innerHTML = l,
          t = e.querySelectorAll("span"),
          Array.prototype.forEach.call(t, function(t) {
            t.setAttribute("style", m)
          }))
      }, 12))
  }
  function t_animate__setAnimationState(t, e, a) {
    var n = window.pageYOffset
      , i = n + window.innerHeight;
    t_animate__setGroupsBlocksState(t, n, i),
      e.forEach(function(t) {
        t_animate__assignChainDelay(t, i, n),
          t_animate__checkSectionButtonAnimation__outOfTurn(t)
      }),
      t_animate__setAnimELemsState(a, n, i),
      window.addEventListener("resize", t_throttle(t_animate__removeInlineAnimStyles))
  }
  function t_animate__setAnimELemsState(t, n, i) {
    t.forEach(function(t) {
      var e = t.getBoundingClientRect().top + window.pageYOffset;
      if (e < n - 500)
        return t_animate__removeAnimationClass(t, "no-hover"),
        "animatednumber" === t_animate__getAttrByResBase(t, "style") && t_animate__animateNumbers(t),
          !0;
      var a = t_animate__detectElemTriggerOffset(t, i);
      t_animate__setCustomAnimSettings(t, e, i),
      e < a && !t.closest(".t1093") && (t_animate__removeNoHoverClassFromBtns(t),
        t_animate__setStartAnimationClass(t, !0),
      "animatednumber" === t_animate__getAttrByResBase(t, "style") && t_animate__animateNumbers(t)),
      (a <= e || t.closest(".t1093")) && t.classList.add("t-animate_wait")
    })
  }
  function t_animate__setGroupsBlocksState(t, i, r) {
    t.forEach(function(a) {
      var t = a.querySelectorAll(".t-animate")
        , t = Array.prototype.filter.call(t, function(t) {
        return !("yes" === t.getAttribute("data-animate-chain"))
      })
        , n = a.getBoundingClientRect().top + window.pageYOffset
        , e = (t_animate__removeAnimFromHiddenSlides(a),
        t_animate__assignSectionDelay(a));
      t_animate__assignGroupDelay(a, e),
        Array.prototype.forEach.call(t, function(t) {
          var e = t.closest(".t397__off") || t.closest(".t395__off") || t.closest(".t400__off");
          if (t.classList.contains("t-animate_no-hover") && e && t.classList.remove("t-animate_no-hover"),
          n <= i - 100)
            return t_animate__saveSectionHeaderStartTime(a),
              t_animate__removeAnimationClass(t, "no-hover"),
              !(t.style.transitionDelay = "");
          n < r && i - 100 < n && (t_animate__makeSectionButtonWait(a),
          t.classList.contains(".t-animate__btn-wait-chain") || (t_animate__removeNoHoverClassFromBtns(t),
            e ? t.classList.add("t-animate_wait") : t_animate__setStartAnimationClass(t, !1))),
          r <= n && t.classList.add("t-animate_wait")
        })
    })
  }
  function t_animate__setAnimationStateChains(t) {
    if (!t || !t.length)
      return !1;
    var e = window.pageYOffset
      , a = e + window.innerHeight;
    Array.prototype.forEach.call(t, function(t) {
      t_animate__assignChainDelay(t, a, e),
        t_animate__checkSectionButtonAnimation__outOfTurn(t)
    })
  }
  function t_animate__assignSectionDelay(t) {
    var e = 0
      , a = t.querySelectorAll(".t-section__title.t-animate")
      , t = t.querySelectorAll(".t-section__descr.t-animate");
    return a.length && (e = .16),
    t.length && (Array.prototype.forEach.call(t, function(t) {
      t.style.transitionDelay = e + "s"
    }),
      e += .16),
      e
  }
  function t_animate__assignGroupDelay(t, e) {
    var a, n, i, r, o, s = 0;
    t.querySelectorAll("[data-animate-order]").length ? t_animate__assignOrderedElemsDelay(t, e) : (e = t.querySelectorAll(".t-img.t-animate"),
      a = t.querySelectorAll(".t-uptitle.t-animate"),
      n = t.querySelectorAll(".t-title.t-animate"),
      n = Array.prototype.filter.call(n, function(t) {
        return !t.classList.contains("t-section__title")
      }),
      i = t.querySelectorAll(".t-descr.t-animate"),
      i = Array.prototype.filter.call(i, function(t) {
        return !t.classList.contains("t-section__descr")
      }),
      r = t.querySelectorAll(".t-btn.t-animate, .t-btnwrapper.t-animate"),
      r = Array.prototype.filter.call(r, function(t) {
        return !t.closest(".t-section__bottomwrapper")
      }),
      o = t.querySelectorAll(".t-timer.t-animate"),
      t = t.querySelectorAll("form.t-animate"),
    e.length && (s = .5),
    n.length && Array.prototype.forEach.call(n, function(t) {
      t.style.transitionDelay = s + "s"
    }),
    n.length && (s += .3),
    i.length && Array.prototype.forEach.call(i, function(t) {
      t.style.transitionDelay = s + "s"
    }),
    i.length && (s += .3),
    a.length && Array.prototype.forEach.call(a, function(t) {
      t.style.transitionDelay = s + "s"
    }),
    a.length && (s += .3),
    (a.length || n.length || i.length) && (s += .2),
    o.length && Array.prototype.forEach.call(o, function(t) {
      t.style.transitionDelay = s + "s"
    }),
    o.length && (s += .5),
    r.length && (r[0].style.transitionDelay = s + "s"),
    2 === r.length && (s += .4),
    2 === r.length && (r[1].style.transitionDelay = s + "s"),
    0 !== t.length && Array.prototype.forEach.call(t, function(t) {
      t.style.transitionDelay = s + "s"
    }))
  }
  function t_animate__assignOrderedElemsDelay(t, e) {
    var a = 0
      , e = (e && (a = e),
      t.querySelectorAll('.t-animate[data-animate-order="1"]'))
      , n = t.querySelectorAll('.t-animate[data-animate-order="2"]')
      , i = t.querySelectorAll('.t-animate[data-animate-order="3"]')
      , r = t.querySelectorAll('.t-animate[data-animate-order="4"]')
      , o = t.querySelectorAll('.t-animate[data-animate-order="5"]')
      , s = t.querySelectorAll('.t-animate[data-animate-order="6"]')
      , l = t.querySelectorAll('.t-animate[data-animate-order="7"]')
      , m = t.querySelectorAll('.t-animate[data-animate-order="8"]')
      , t = t.querySelectorAll('.t-animate[data-animate-order="9"]');
    e.length && Array.prototype.forEach.call(e, function(t) {
      t.style.transitionDelay = a + "s"
    }),
    e.length && n.length && (a += +t_animate__getAttrByResBase(n[0], "delay"),
      Array.prototype.forEach.call(n, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length) && i.length && (a += +t_animate__getAttrByResBase(i[0], "delay"),
      Array.prototype.forEach.call(i, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length || i.length) && r.length && (a += +t_animate__getAttrByResBase(r[0], "delay"),
      Array.prototype.forEach.call(r, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length || i.length || r.length) && o.length && (a += +t_animate__getAttrByResBase(o[0], "delay"),
      Array.prototype.forEach.call(o, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length || i.length || r.length || o.length) && s.length && (a += +t_animate__getAttrByResBase(s[0], "delay"),
      Array.prototype.forEach.call(s, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length || i.length || r.length || o.length || s.length) && l.length && (a += +t_animate__getAttrByResBase(l[0], "delay"),
      Array.prototype.forEach.call(l, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length || i.length || r.length || o.length || s.length || l.length) && m.length && (a += +t_animate__getAttrByResBase(m[0], "delay"),
      Array.prototype.forEach.call(m, function(t) {
        t.style.transitionDelay = a + "s"
      })),
    (e.length || n.length || i.length || r.length || o.length || s.length || l.length || m.length) && t.length && (a += +t_animate__getAttrByResBase(t[0], "delay"),
      Array.prototype.forEach.call(t, function(t) {
        t.style.transitionDelay = a + "s"
      }))
  }
  function t_animate__assignChainDelay(a, n, i) {
    var r, o, s, l = a.querySelectorAll(".t-animate[data-animate-chain=yes]"), m = 0;
    l.length && (r = l[0],
      o = r.getBoundingClientRect().top + window.pageYOffset,
      r.classList.add("t-animate__chain_first-in-row"),
      s = t_animate__getCurBlockSectionHeadDelay(a),
      Array.prototype.forEach.call(l, function(e) {
        var t = e.getBoundingClientRect().top + window.pageYOffset;
        if (t < i)
          return t_animate__removeAnimationClass(e, ""),
            !0;
        t < n ? (t !== o && (e.classList.add("t-animate__chain_first-in-row"),
          o = t),
          t = .16 * m + s,
          e.style.transitionDelay = t + "s",
          t_animate__setStartAnimationClass(e, !1),
          e.setAttribute("data-animate-start-time", Date.now() + 1e3 * t),
        r === l[l.length - 1] && t_animate__checkSectionButtonAnimation(a, t),
          m++,
          ["transitionend", "webkitTransitionEnd", "oTransitionEnd", "otransitionend", "MSTransitionEnd"].forEach(function(t) {
            e.addEventListener(t, function() {
              t_animate__addEventOnAnimateChain(e)
            }),
              e.removeEventListener(t, function() {
                t_animate__addEventOnAnimateChain(e)
              })
          })) : e.classList.add("t-animate_wait")
      }))
  }
  function t_animate__getAttrByResBase(t, e) {
    var a, n = t.closest(".t396__artboard");
    if (!n)
      return t.getAttribute("data-animate-" + e);
    var i, r, n = "ab" + n.getAttribute("data-artboard-recid"), o = void 0 !== window.tn[n] ? (i = window.tn[n].curResolution,
      r = window.tn[n].curResolution_max,
      window.tn[n].screens.slice()) : (i = window.tn.curResolution,
      [320, 480, 640, 960, r = 1200]), n = t.closest(".t396__elem, .t396__group"), n = n && n.getAttribute("data-animate-mobile");
    if (i === r)
      a = t.getAttribute("data-animate-" + e);
    else {
      if ("y" !== n && i < 1200)
        return t.style.transition = "none",
          null;
      a = t.getAttribute("data-animate-" + e + "-res-" + i)
    }
    if (!a && "" !== a)
      for (var s = 0; s < o.length; s++) {
        var l = o[s];
        if (!(l <= i) && (a = l === r ? t.getAttribute("data-animate-" + e) : t.getAttribute("data-animate-" + e + "-res-" + l)))
          break
      }
    return a
  }
  function t_animate__hasWaitAnimation(t) {
    return t.filter(function(t) {
      return t.classList.contains("t-animate_wait") || t.querySelector(".t-animate_wait")
    })
  }
  function t_animate__addEventOnAnimateChain(t) {
    t.classList.add("t-animate__chain_showed")
  }
  function t_animate__setCustomAnimSettings(t, e, a) {
    var n = t_animate__getAttrByResBase(t, "style")
      , i = t_animate__getAttrByResBase(t, "distance");
    if (i && "" !== i) {
      switch (i = i.replace("px", ""),
        t.style.transitionDuration = "0s",
        t.style.transitionDelay = "0s",
        n) {
        case "fadeinup":
          t.style.transform = "translate3d(0," + i + "px,0)";
          break;
        case "fadeindown":
          t.style.transform = "translate3d(0,-" + i + "px,0)";
          break;
        case "fadeinleft":
          t.style.transform = "translate3d(" + i + "px,0,0)";
          break;
        case "fadeinright":
          t.style.transform = "translate3d(-" + i + "px,0,0)"
      }
      t_animate__forceElemInViewPortRepaint(t, e, a),
        t.style.transitionDuration = "",
        t.style.transitionDelay = ""
    }
    n = t_animate__getAttrByResBase(t, "scale"),
    n && (t.style.transitionDuration = "0s",
      t.style.transitionDelay = "0s",
      t.style.transform = "scale(" + n + ")",
      t_animate__forceElemInViewPortRepaint(t, e, a),
      t.style.transitionDuration = "",
      t.style.transitionDelay = ""),
      n = t_animate__getAttrByResBase(t, "delay"),
    n && (t.style.transitionDelay = n + "s"),
      e = t_animate__getAttrByResBase(t, "duration");
    e && (t.style.transitionDuration = e + "s")
  }
  function t_animate__removeInlineAnimStyles() {
    var t;
    window.innerWidth < 980 && (t = document.querySelectorAll(".t396__elem.t-animate:not(.t-animate_wait)"),
      Array.prototype.forEach.call(t, function(t) {
        t.style.transform = "",
          t.style.transitionDuration = "",
          t.style.transitionDelay = ""
      }))
  }
  function t_animate__forceElemInViewPortRepaint(t, e, a) {
    t && e < a + 500 && t.offsetHeight
  }
  function t_animate__detectElemTriggerOffset(t, e) {
    var t = t_animate__getAttrByResBase(t, "trigger-offset")
      , a = e;
    return a = t ? e - +(t = t.replace("px", "")) : a
  }
  function t_animate__saveSectionHeaderStartTime(t) {
    var e = t.querySelectorAll(".t-section__title.t-animate")
      , t = t.querySelectorAll(".t-section__descr.t-animate");
    e.length && Array.prototype.forEach.call(e, function(t) {
      t.setAttribute("data-animate-start-time", Date.now())
    }),
    t.length && Array.prototype.forEach.call(t, function(t) {
      t.setAttribute("data-animate-start-time", Date.now() + 160)
    })
  }
  function t_animate__getCurBlockSectionHeadDelay(t) {
    var e = 0;
    return t.querySelectorAll(".t-section__title.t-animate").length && (e += .16),
    t.querySelectorAll(".t-section__descr.t-animate").length && (e += .16),
      e
  }
  function t_animate__makeSectionButtonWait(t) {
    var e = t.querySelectorAll(".t-animate[data-animate-chain=yes]").length
      , t = t.querySelectorAll(".t-section__bottomwrapper .t-btn.t-animate");
    e.length && t.length && Array.prototype.forEach.call(t, function(t) {
      t.classList.add("t-animate__btn-wait-chain")
    })
  }
  function t_animate__checkSectionButtonAnimation(t, e) {
    t = t.querySelectorAll(".t-animate__btn-wait-chain");
    t.length && Array.prototype.forEach.call(t, function(t) {
      t.style.transitionDelay = e + .16 + "s",
        t_animate__removeNoHoverClassFromBtns(t),
        t.classList.remove("t-animate__btn-wait-chain"),
        t_animate__setStartAnimationClass(t, !1)
    })
  }
  function t_animate__checkSectionButtonAnimation__outOfTurn(t) {
    var e = t.querySelectorAll(".t-animate[data-animate-chain=yes]");
    Array.prototype.filter.call(e, function(t) {
      return !t.classList.contains("t-animate_started")
    }).length || t_animate__checkSectionButtonAnimation(t, .16)
  }
  function t_animate__addNoHoverClassToBtns() {
    var t = document.querySelectorAll(".t-btn.t-animate");
    Array.prototype.forEach.call(t, function(t) {
      t.classList.add("t-animate_no-hover")
    })
  }
  function t_animate__removeNoHoverClassFromBtns(t) {
    if (!t)
      return !1;
    var e = t.classList.contains("t-btn") ? t : null;
    e && (e.ontransitionend = function(t) {
        "opacity" !== t.propertyName && "transform" !== t.propertyName || (e.classList.remove("t-animate_no-hover"),
          e.style.transitionDelay = "",
          e.style.transitionDuration = "",
          this.ontransitionend = null)
      }
    )
  }
  function t_animate__getGroupsOffsets(t) {
    t.forEach(function(t) {
      var e = t.querySelector(".t-animate");
      e && (t.curTopOffset = e.getBoundingClientRect().top + window.pageYOffset,
        e = t_animation__getZoom(t),
      window.isOnlyScalable || (t.curTopOffset *= e))
    })
  }
  function t_animation__getZoom(t) {
    if (void 0 !== t.scaleFactor)
      return t.scaleFactor;
    t = t.closest(".t396__artboard");
    if (!t)
      return 1;
    var e = document.querySelector('script[src*="tilda-blocks-2.7"]');
    return t.classList.contains("t396__artboard_scale") || !e && "undefined" != typeof t396_ab__getFieldValue && "window" === t396_ab__getFieldValue(t, "upscale") ? window.tn_scale_factor : 1
  }
  function t_animate__getChainOffsets(t) {
    t.forEach(function(a) {
      var t = a.querySelectorAll(".t-animate_wait[data-animate-chain=yes]");
      a.itemsOffsets = [],
        Array.prototype.forEach.call(t, function(t, e) {
          a.itemsOffsets[e] = t.getBoundingClientRect().top + window.pageYOffset
        })
    })
  }
  function t_animate__getElemsOffsets(t) {
    t.forEach(function(t) {
      t.curTopOffset = window.pageYOffset + t.getBoundingClientRect().top;
      var e = t_animation__getZoom(t);
      window.isOnlyScalable || (t.curTopOffset *= e)
    })
  }
  function t_animate__removeAnimFromHiddenSlides(t) {
    var e;
    t.querySelectorAll(".t-slides").length && (t = t.querySelectorAll(".t-slides__item"),
      t = Array.prototype.filter.call(t, function(t) {
        return !t.classList.contains("t-slides__item_active")
      }),
      e = [],
      t.forEach(function(t) {
        t = t.querySelector(".t-animate");
        t && e.push(t)
      }),
      e.forEach(function(t) {
        t_animate__removeAnimationClass(t, "no-hover")
      }))
  }
  function t_animate__wrapTextWithOpacity() {
    var t = document.querySelectorAll(".t-title.t-animate, .t-descr.t-animate, .t-uptitle.t-animate, .t-text.t-animate");
    Array.prototype.forEach.call(t, function(t) {
      var e, a = t.getAttribute("style");
      a && -1 !== a.indexOf("opacity") && (a = t.style.opacity) && 0 < a && (t.style.opacity = "",
        (e = document.createElement("div")).style.opacity = a,
        a = t.childNodes,
        Array.prototype.forEach.call(a, function(t) {
          t = t.cloneNode(!0);
          e.appendChild(t)
        }),
        t.innerHTML = "",
        t.appendChild(e))
    })
  }
  function t_animate__checkIE() {
    var t = window.navigator.userAgent
      , e = t.indexOf("MSIE")
      , a = !1;
    return 0 < e && (8 !== (t = parseInt(t.substring(e + 5, t.indexOf(".", e)))) && 9 !== t || (a = !0)),
      a
  }
  "loading" !== document.readyState ? t_animate__init() : document.addEventListener("DOMContentLoaded", t_animate__init);
  function t_cover__parallax(e) {
    var t = window.innerHeight;
    window.addEventListener("resize", (function() {
        t = window.innerHeight
      }
    )),
    document.body.style.webkitTransform && (e.style.position = "relative");
    var o = t_cover__getFullHeight(e), r = .2, n;
    ["scroll", "resize"].forEach((function(n) {
        window.addEventListener(n, (function() {
            t_cover__parallaxUpdate(e, r, t, o)
          }
        ))
      }
    )),
    "complete" !== document.readyState && window.addEventListener("load", (function() {
        t_cover__parallaxUpdate(e, r, t, o)
      }
    )),
      t_cover__parallaxUpdate(e, r, t, o)
  }
  function t_cover__parallaxUpdate(e, t, o, r) {
    var n = window.pageYOffset, i = e.getBoundingClientRect().top + n, c = e.getBoundingClientRect().top, a, d;
    if (!(i + r < n || i > n + o)) {
      var _ = -1 * Math.round(c * t);
      document.body.style.webkitTransform ? e.style.webkitTransform = "translateY(" + _ + "px)" : e.style.top = _ + "px"
    }
  }
  function cover_init(e) {
    var t = document.getElementById("allrecords")
      , o = !!t && "yes" === t.getAttribute("data-tilda-lazy")
      , r = document.getElementById("rec" + e)
      , n = document.getElementById("coverCarry" + e)
      , i = r ? r.querySelector("img[data-hook-clogo]") : null;
    if (n) {
      var c = {
        "cover-bg": "",
        "cover-height": "",
        "cover-parallax": "",
        "video-url-mp4": "",
        "video-url-webm": "",
        "video-url-youtube": "",
        "video-url-vimeo": "",
        "video-url-rutube": "",
        "video-url-kinescope": "",
        "video-url-vkvideo": "",
        "video-noloop": "",
        "video-nomute": "",
        "video-nocover": "",
        "bg-base64": "",
        "use-image-for-mobile-cover": ""
      };
      for (var a in c) {
        var d = n.getAttribute("data-content-" + a);
        (d || "use-image-for-mobile-cover" === a) && (c[a] = d)
      }
      var _ = r ? r.getAttribute("data-bg-color") : "";
      _ && (c["parent-bg"] = _);
      var u = ["mp4", "webm", "youtube", "vimeo", "rutube", "kinescope", "vkvideo"];
      "yes" === c["video-nocover"] ? u.forEach((function(e) {
          c["video-url-" + e] = ""
        }
      )) : c["video-nomute"] = "";
      var l = u.some((function(e) {
          return !!c["video-url-" + e]
        }
      ));
      (window.t_cover__isMobile || "ontouchend"in document) && l && !o && (n.style.backgroundImage = 'url("' + c["cover-bg"] + '")'),
        setTimeout((function() {
            t_cover__recalcContentHeight(e, !1, 0),
              t_cover__fixBgFixedNode(e)
          }
        ), 300),
      i && (i.onload = function() {
          t_cover__recalcContentHeight(e, !1, 500)
        }
      ),
        window.t_cover__isMobile || "ontouchend"in document ? window.addEventListener("orientationchange", (function() {
            t_cover__recalcContentHeight(e, !0, 200)
          }
        )) : window.addEventListener("resize", (function() {
            t_cover__recalcContentHeight(e, !1, 0)
          }
        )),
        t_cover__setListenerToArrow(e),
        t_cover__setCoverParams(n, c, l),
        n.addEventListener("displayChanged", (function() {
            t_cover__recalcContentHeight(e, !1, 0)
          }
        ))
    }
  }
  function t_cover__recalcContentHeight(e, t, o) {
    o ? setTimeout((function() {
        t_cover__fixBgFixedStyles(e),
          t_cover__recalcCoverHeight(e, t)
      }
    ), o) : (t_cover__fixBgFixedStyles(e),
      t_cover__recalcCoverHeight(e, t))
  }
  function t_cover__setCoverParams(e, t, o) {
    var r = "fixed" === t["cover-parallax"], n = "dynamic" === t["cover-parallax"], i = "yes" === t["bg-base64"], c;
    if (t["parent-bg"]) {
      var a = e.closest(".t-cover");
      a && a.classList.add("t-cover__transparent")
    }
    if (t_cover__setCoverVideoParams(e, t, o, r),
    r && window.isOpera && (e.style.transform = "unset"),
    n && !window.t_cover__isMobile) {
      var d = t_cover__getPureHeight(e);
      if (d < window.innerHeight) {
        var _ = .2 * window.innerHeight;
        e.style.height = d + _ + "px"
      }
      t_cover__parallax(e)
    }
    if (i && t["cover-bg"] && !o) {
      var u = !1
        , l = document.createElement("img");
      l.src = t["cover-bg"],
        l.onload = function() {
          l.parentElement && l.parentElement.removeChild(l),
            e.style.backgroundImage = 'url("' + t["cover-bg"] + '")',
            e.style.opacity = "1",
            u = !0
        }
        ,
      u || (e.style.backgroundImage = "",
        e.style.opacity = "0",
        e.style.transition = "opacity 25ms")
    }
  }
  function t_cover__setCoverVideoParams(e, t, o, r) {
    var n = "";
    if (t["video-url-youtube"] && (n = "youtube"),
    (t["video-url-vimeo"] || t["video-url-rutube"] || t["video-url-kinescope"] || t["video-url-vkvideo"]) && (n = "iframe"),
    (!window.t_cover__isMobile && !("ontouchend"in document) || -1 === ["on", null].indexOf(t["use-image-for-mobile-cover"])) && o)
      switch (t_cover__setStylesForCoverVideo(e, "youtube" === n ? "youtube" : ""),
        n) {
        case "youtube":
          t_cover__processYouTubeVideo(e, t);
          break;
        case "iframe":
          t_cover__processIframeVideo(e, t);
          break;
        default:
          t_cover__processHTML5Video(e, t, r)
      }
  }
  function t_cover__processYouTubeVideo(e, t) {
    var o;
    "IntersectionObserver"in window ? new IntersectionObserver((function(e, o) {
        e.forEach((function(e) {
            if (e.isIntersecting) {
              var r = e.target;
              o.unobserve(r),
                t_onFuncLoad("processYoutubeVideo", (function() {
                    window.processYoutubeVideo(r, t["cover-height"])
                  }
                ))
            }
          }
        ))
      }
    )).observe(e) : (t_cover__createYoutubeCover(e, t["cover-height"]),
      window.addEventListener("scroll", t_throttle((function() {
          t_cover__createYoutubeCover(e, t["cover-height"])
        }
      ), 100)))
  }
  function t_cover__processHTML5Video(e, t, o) {
    e.style.backgroundSize = "auto";
    var r, n = !!(-1 !== t["cover-height"].indexOf("vh")) && parseInt(t["cover-height"], 10) > 100, i, c = !!(-1 !== t["cover-height"].indexOf("px")) && parseInt(t["cover-height"], 10) > window.innerHeight, a = !1;
    o && (n || c) && (e.style.height = "100vh",
      a = !0);
    var d = !t["video-noloop"], _ = !t["video-nomute"], u;
    "IntersectionObserver"in window ? new IntersectionObserver((function(e, o) {
        e.forEach((function(e) {
            if (e.isIntersecting) {
              var r = e.target;
              o.unobserve(r),
                t_cover__createAndProcessHTML5Video(r, t, d, _)
            }
          }
        ))
      }
    )).observe(e) : (t_cover__createHTMLVideoCover(e, t, a, o, d, _),
      window.addEventListener("scroll", t_throttle((function() {
          t_cover__createHTMLVideoCover(e, t, a, o, d, _)
        }
      ), 100)));
    window.addEventListener("scroll", (function() {
        if (o && a) {
          var t = e.parentElement, r = window.pageYOffset, n, i = r + window.innerHeight, c = t_cover__getPureHeight(t), d = t.getBoundingClientRect().top + r, _;
          i >= d + c ? (e.style.position = "absolute",
            e.style.bottom = "0px",
            e.style.top = "auto") : r >= d ? (e.style.position = "fixed",
            e.style.top = "0px") : r < d && (e.style.position = "relative",
            e.style.top = "auto")
        }
      }
    ))
  }
  function t_cover__processIframeVideo(e, t) {
    var o;
    "IntersectionObserver"in window ? new IntersectionObserver((function(e, o) {
        e.forEach((function(e) {
            if (e.isIntersecting) {
              var r = e.target;
              o.unobserve(r),
                t_onFuncLoad("t_videoprocessor__processIframeVideo", (function() {
                    window.t_videoprocessor__processIframeVideo(r, t)
                  }
                ))
            }
          }
        ))
      }
    )).observe(e) : (t_cover__createIframeCover(e, t),
      window.addEventListener("scroll", t_throttle((function() {
          t_cover__createIframeCover(e, t)
        }
      ), 100)))
  }
  function t_cover__setStylesForCoverVideo(e, t) {
    e.style.backgroundColor = "#000000",
      e.style.backgroundImage = "youtube" === t ? "" : 'url("https://tilda.ws/img/spinner-white.gif")',
      e.style.backgroundSize = "youtube" === t ? "" : "unset",
      e.style.backgroundPosition = "youtube" === t ? "" : "center",
      e.style.backgroundRepeat = "youtube" === t ? "" : "no-repeat",
      e.setAttribute("data-content-cover-bg", "")
  }
  function t_cover__setListenerToArrow(e) {
    var t = document.getElementById("rec" + e);
    if (t) {
      var o = t.querySelector(".t-cover__arrow-wrapper");
      o && o.addEventListener("click", (function() {
          var e, o;
          t.offsetHeight && t_cover__scrollToNextSection(t.offsetHeight + t.getBoundingClientRect().top + window.pageYOffset)
        }
      ))
    }
  }
  function t_cover__initCovers() {
    var e = document.querySelector(".t-records"), t;
    if (!(!!e && "edit" === e.getAttribute("data-tilda-mode"))) {
      var o = document.querySelectorAll(".t-cover__carrier");
      Array.prototype.forEach.call(o, (function(e) {
          var t = e.getAttribute("data-content-cover-id");
          t && cover_init(t)
        }
      )),
        window.addEventListener("load", (function() {
            var e = Array.prototype.slice.call(document.querySelectorAll(".t-cover__wrapper"))
              , t = window.t_cover__isMobile ? document.documentElement.clientWidth : window.innerWidth;
            e.forEach((function(e) {
                !e.closest(".t-slds") && Math.floor(e.getBoundingClientRect().right) > t && (e.style.wordBreak = "break-all")
              }
            ))
          }
        ))
    }
  }
  function t_cover__createYoutubeCover(e, t) {
    if (!e.querySelector("iframe")) {
      var o = window.pageYOffset, r = window.innerHeight, n = t_cover__getPureHeight(e), i = e.getBoundingClientRect().top + o, c, a, d = 500;
      o + r > i - d && i + n + d >= o && t_onFuncLoad("processYoutubeVideo", (function() {
          window.processYoutubeVideo(e, t)
        }
      ))
    }
  }
  function t_cover__createHTMLVideoCover(e, t, o, r, n, i) {
    if (!e.querySelector("video")) {
      var c = window.pageYOffset, a = window.innerHeight, d = t_cover__getPureHeight(e), _ = e.getBoundingClientRect().top + c, u, l, v = 500;
      c + a > _ - v && c <= d + _ + v && t_cover__createAndProcessHTML5Video(e, t, n, i)
    }
  }
  function t_cover__createIframeCover(e, t) {
    if (!e.querySelector("iframe")) {
      var o = window.pageYOffset, r = window.innerHeight, n = t_cover__getPureHeight(e), i = e.getBoundingClientRect().top + o, c, a, d = 500;
      o + r > i - d && i + n + d >= o && t_onFuncLoad("t_videoprocessor__processIframeVideo", (function() {
          window.t_videoprocessor__processIframeVideo(e, t)
        }
      ))
    }
  }
  function t_cover__createAndProcessHTML5Video(e, t, o, r) {
    t_onFuncLoad("t_videoprocessor__processHTML5Video", (function() {
        t_videoprocessor__processHTML5Video(e, {
          mp4: t["video-url-mp4"],
          ogv: "",
          webm: t["video-url-webm"],
          poster: "",
          autoplay: !0,
          loop: o,
          scale: !0,
          position: "absolute",
          opacity: 1,
          textReplacement: !1,
          zIndex: 0,
          width: "100%",
          height: 0,
          volume: 1,
          muted: r,
          fullscreen: !1,
          imgFallback: !0
        })
      }
    ))
  }
  function t_cover__recalcCoverHeight(e, t) {
    var o = document.getElementById("rec" + e);
    if (o) {
      var r = o.querySelector(".t-cover")
        , n = o.getAttribute("data-record-type");
      if (r && "935" !== n) {
        var i = o.querySelector(".t-cover__carrier")
          , c = i ? i.getAttribute("data-content-cover-height") : "";
        if (!c) {
          var a = o.querySelector("[data-content-cover-height]");
          c = a ? a.getAttribute("data-content-cover-height") : ""
        }
        var d = "y" === o.getAttribute("data-fixed-bg")
          , _ = [".t-cover", ".t-cover__filter", ".t-cover__carrier", ".t-cover__wrapper"];
        ("734" === n || o.querySelector(".t734")) && _.push(".t-slds__items-wrapper");
        var u = "dynamic" === i.getAttribute("data-content-cover-parallax")
          , l = t_cover__getHeightFromAttr(c);
        l && _.forEach((function(e) {
            var t;
            u && ".t-cover__carrier" === e || Array.prototype.slice.call(o.querySelectorAll(e)).forEach((function(e) {
                e && (e.style.height = Math.round(l) + "px")
              }
            ))
          }
        ));
        var v = t_cover__getHeightFromAttr(c)
          , s = t_cover__getPureHeight(r)
          , g = v || s;
        if (!d) {
          var f = r.style.height;
          r.style.height = "",
            g = s,
          f && (r.style.height = f)
        }
        var h = t_cover__getContentHeight(o)
          , p = 40
          , m = 300
          , y = !!i && "100vh" === i.getAttribute("data-content-cover-height");
        h > m && g < h + p || d || (window.t_cover__isMobile || "ontouchend"in document) && t ? (t_cover__setRecalculatedHeight(o, h),
          t_cover__updateResizeElem(o)) : window.t_cover__isMobile && y ? _.forEach((function(e) {
            var t = o.querySelector(e);
            t && (t.style.height = document.documentElement.clientHeight + "px")
          }
        )) : g > h + p && (t_cover__setRecalculatedHeight(o, h),
          t_cover__updateResizeElem(o))
      }
    }
  }
  function t_cover__getContentHeight(e) {
    var t = Array.prototype.slice.call(e.querySelectorAll("div[data-hook-content]"));
    if (t.length <= 1)
      return t_cover__getPureHeight(t[0]);
    var o = t.map((function(e) {
        return t_cover__getPureHeight(e)
      }
    ));
    return o.sort((function(e, t) {
        return t - e
      }
    )),
    o[0] || 0
  }
  function t_cover__getHeightFromAttr(e) {
    return e ? -1 !== e.indexOf("vh") ? parseInt(e, 10) * document.documentElement.clientHeight / 100 : parseInt(e, 10) : 0
  }
  function t_cover__setRecalculatedHeight(e, t) {
    var o = e.querySelector(".t-cover__carrier")
      , r = o ? o.getAttribute("data-content-cover-height") : "";
    if (!r) {
      var n = e.querySelector("[data-content-cover-height]");
      r = n ? n.getAttribute("data-content-cover-height") : "0"
    }
    var i = t_cover__getHeightFromAttr(r)
      , c = o ? "dynamic" === o.getAttribute("data-content-cover-parallax") : ""
      , a = "734" === e.getAttribute("data-record-type")
      , d = window.innerWidth <= 568 ? 40 : 120
      , _ = window.innerWidth <= 568 ? 50 : 100;
    a && (d = 0,
      _ = 0),
    (t += d) > 1e3 && (t += _);
    var u = t > i ? t : i
      , l = 0
      , v = [".t-cover", ".t-cover__filter", ".t-cover__carrier", ".t-cover__wrapper"];
    (a || e.querySelector(".t734")) && v.push(".t-slds__items-wrapper"),
      v.forEach((function(t) {
          var o;
          Array.prototype.slice.call(e.querySelectorAll(t)).forEach((function(e) {
              c && e && e.classList.contains("t-cover__carrier") && u < document.documentElement.clientHeight ? (l = .2 * document.documentElement.clientHeight,
                e.style.height = u + l + "px") : e && (e.style.height = u + "px")
            }
          ))
        }
      )),
      o.setAttribute("data-content-cover-updated-height", u + l + "px");
    var s = document.createEvent("Event");
    s.initEvent("coverHeightUpdated", !0, !0),
      o.dispatchEvent(s)
  }
  function t_cover__updateResizeElem(e) {
    var t = document.getElementById("allrecords"), o;
    if (!!t && "yes" === t.getAttribute("data-tilda-lazy")) {
      var r = e.querySelector(".t-cover__carrier");
      t_onFuncLoad("t_lazyload_updateResize_elem", (function() {
          t_lazyload_updateResize_elem(r)
        }
      ))
    }
  }
  function t_cover__checkIsFixForBgNeeded(e) {
    var t = document.getElementById("rec" + e)
      , o = t ? t.querySelector(".t-cover__carrier") : null;
    if (!o)
      return !1;
    var r = "y" === t.getAttribute("data-fixed-bg")
      , n = ["mp4", "webm", "youtube", "vimeo", "rutube", "kinescope", "vkvideo", "boomstream"];
    n = n.map((function(e) {
        return o.getAttribute("data-content-video-url-" + e)
      }
    ));
    var i = "fixed" === o.getAttribute("data-content-cover-parallax")
      , c = n.some((function(e) {
        return e
      }
    ))
      , a = window.t_cover__isMobile || "ontouchend"in document;
    return i && window.isSafari && !a && !c && !r
  }
  function t_cover__fixBgFixedNode(e) {
    var t = t_cover__checkIsFixForBgNeeded(e)
      , o = document.getElementById("rec" + e);
    if (t && o) {
      var r = o.getAttribute("data-record-type")
        , n = o.querySelector(".t-cover")
        , i = n ? n.parentElement : null;
      if (!document.getElementById("fixed-bg-cover")) {
        var c = document.createElement("style");
        c.id = "fixed-bg-cover";
        var a = "";
        a += ".t-cover__container {",
          a += "position: relative;",
          a += "}",
          a += ".t-cover__container .t-cover {",
          a += "clip: rect(0, auto, auto, 0);",
          a += "position: absolute;",
          a += "top: 0;",
          a += "left: 0;",
          a += "width: 100%;",
          a += "height: 100% !important;",
          a += "}",
          a += ".t-cover__container .t-cover .t-cover__carrier {",
          a += "position: fixed;",
          a += "display: block;",
          a += "top: 0;",
          a += "left: 0;",
          a += "width: 100%;",
          a += "height: 100% !important;",
          a += "background-size: cover;",
          a += "background-position: center center;",
          a += "transform: translateZ(0);",
          a += "will-change: transform;",
          a += "}",
          c.textContent = a,
          document.head.insertAdjacentElement("beforeend", c)
      }
      var d = document.createElement("div");
      d.classList.add("t-cover__container"),
        i.insertAdjacentElement("afterbegin", d),
        d.style.height = t_cover__getPureHeight(n) + "px",
        d.appendChild(n);
      var _, u = {
        275: ".t256__video-container",
        286: ".t266__video-container",
        337: ".t-container",
        906: ".t906__video-container"
      }[r], l = u ? o.querySelector(u) : null;
      l && d.appendChild(l)
    }
  }
  function t_cover__fixBgFixedStyles(e) {
    var t = document.getElementById("rec" + e)
      , o = t_cover__checkIsFixForBgNeeded(e)
      , r = t ? t.querySelector(".t-cover") : null
      , n = t ? t.querySelector(".t-cover__container") : null;
    if (o && n && r) {
      var i = r.style.height;
      r.style.height = 0,
        n.style.height = i,
        t.setAttribute("data-fixed-bg", "y")
    }
  }
  function t_cover__getPureHeight(e) {
    if (!e)
      return 0;
    var t = parseInt(e.style.paddingTop) || 0
      , o = parseInt(e.style.paddingBottom) || 0;
    return e.clientHeight ? e.clientHeight - (t + o) : parseInt(window.getComputedStyle(e).height, 10)
  }
  function t_cover__getFullHeight(e) {
    return e ? e.offsetHeight + (parseInt(e.style.marginTop) || 0) + (parseInt(e.style.marginBottom) || 0) : 0;
    var t, o, r
  }
  function t_cover__scrollToNextSection(e) {
    var t, o = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight) - document.documentElement.clientHeight;
    if (e > o && (e = o),
    e === window.pageYOffset)
      return !1;
    var r = window.pageYOffset
      , n = (e - r) / 30
      , i = window.pageYOffset
      , c = setInterval((function() {
        i += n,
          window.scrollTo(0, i),
          document.body.setAttribute("data-scrollable", "true"),
        (e - r < 0 && window.pageYOffset <= e || e - r > 0 && window.pageYOffset >= e) && (clearInterval(c),
          document.body.removeAttribute("data-scrollable"))
      }
    ), 10)
  }
  function cover_setRecalculatedCoverHeight(e, t) {
    t_cover__setRecalculatedHeight(e, t)
  }
  function t_cover__getHeightWithoutPadding(e) {
    return t_cover__getPureHeight(e)
  }
  window.t_cover__isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
    t_onReady((function() {
        t_onFuncLoad("t_cover__initCovers", (function() {
            t_cover__initCovers()
          }
        ))
      }
    ));
  function t_forms__initForms() {
    var t = document.querySelectorAll('.r:not([data-record-type="1093"])');
    window.t_forms__inputData = {},
      t_forms__addRecaptcha(),
      Array.prototype.forEach.call(t, (function(t) {
          var e = t.id;
          window.initForms[e] || (t_forms__initEventPlaceholder(t),
            t_forms__addInputItsGood(t),
            //t_forms__addAttrAction(t),
            t_forms__onSubmit(t),
            t_forms__onClick(t),
            t_forms__onRender(t),
            t_forms__addFocusOnTab(t),
            t_onFuncLoad("t_throttle", (function() {
                window.addEventListener("resize", t_throttle((function() {
                    t_forms__calculateInputsWidth(e)
                  }
                )))
              }
            )),
            window.initForms[e] = !0)
        }
      ))
  }
  function t_forms__addFocusOnTab(t) {
    if (!window.isMobile) {
      var e = t.querySelectorAll(".t-input, .t-select");
      if (e) {
        var r = null;
        document.addEventListener("keydown", (function() {
            r = "keyboard"
          }
        )),
          document.addEventListener("mousedown", (function() {
              r = "mouse"
            }
          )),
          document.addEventListener("visibilitychange", (function() {
              r = "mouse"
            }
          )),
          Array.prototype.forEach.call(e, (function(t) {
              t.addEventListener("focus", (function() {
                  "keyboard" === r && ((t.classList.contains("t-input_pvis") || t.classList.contains("t-input-phonemask")) && (t = t.parentElement),
                    t.classList.add("t-focusable"),
                    r = null)
                }
              )),
                t.addEventListener("blur", (function() {
                    t.classList.remove("t-focusable")
                  }
                ))
            }
          ))
      }
    }
  }
  function t_forms__initEventPlaceholder(t) {
    var e = "focus"
      , r = "blur";
    document.addEventListener || (e = "focusin",
      r = "focusout"),
      t_removeEventListener(t, e, t_forms__removePlaceholder),
      t_addEventListener(t, e, t_forms__removePlaceholder, !0),
      t_removeEventListener(t, r, t_forms__addPlaceholder),
      t_addEventListener(t, r, t_forms__addPlaceholder, !0)
  }
  function t_forms__removePlaceholder(t) {
    var e = (t = t || window.event).target || t.srcElement;
    if ("INPUT" === e.tagName) {
      var r = e.closest("[data-input-lid]")
        , o = e.getAttribute("placeholder")
        , n = "";
      if (r)
        n = r.getAttribute("data-input-lid");
      else {
        var a = e.closest("form");
        a && (n = a.getAttribute("data-input-lid"))
      }
      o && n && (window.t_forms__inputData[n] = o,
        e.setAttribute("placeholder", ""))
    }
  }
  function t_forms__addMoveToInputWithErrorClickHandler(t, e) {
    e && t && (e.TElementToFocus = t,
      e.removeEventListener("click", t_forms__handleClickOnError),
      e.addEventListener("click", t_forms__handleClickOnError))
  }
  function t_forms__handleClickOnError(t) {
    t.preventDefault();
    var e = t.target.closest(".t-form__errorbox-item"), r;
    e && t_forms__focusInput(e.TElementToFocus)
  }
  function t_forms__addPlaceholder(t) {
    var e = (t = t || window.event).target || t.srcElement
      , r = e.closest("[data-input-lid]")
      , o = "";
    if (r)
      o = r.getAttribute("data-input-lid");
    else {
      var n = e.closest("form");
      n && (o = n.getAttribute("data-input-lid"))
    }
    var a = window.t_forms__inputData[o] || "";
    a && o && (e.setAttribute("placeholder", a),
      window.t_forms__inputData[o] = "")
  }
  function t_forms__addInputItsGood(t) {
    var e = t.querySelectorAll(".js-form-proccess[data-formactiontype]");
    Array.prototype.forEach.call(e, (function(t) {
        var e = t.getAttribute("data-formactiontype")
          , r = t.querySelector('input[name="form-spec-comments"]');
        "1" === e || r || t.insertAdjacentHTML("beforeend", '<div style="position: absolute; left: -5000px; bottom: 0; display: none;"><input type="text" name="form-spec-comments" value="Its good" class="js-form-spec-comments" tabindex="-1" /></div>')
      }
    ))
  }
  function t_forms__addAttrAction(t) {
    var e = t.querySelectorAll(".js-form-proccess");
    Array.prototype.forEach.call(e, (function(t) {
        var e;
        "2" === t.getAttribute("data-formactiontype") && t.setAttribute("action", "#")
      }
    ))
  }
  function t_forms__calculateInputsWidth(t) {
    t && (t = t.replace("rec", ""));
    var e = document.querySelector("#rec" + t);
    if (t || !document.body.classList.contains("t706__body_cartwinshowed") && !document.body.classList.contains("t706__body_cartpageshowed") || (e = document.querySelector(".t706")),
      e) {
      var r = e.querySelector(".t-form__inputsbox");
      if (r) {
        r.closest(".t706") && r.classList.add("t-form__inputsbox_inrow");
        var o = e.querySelectorAll(".t-input-group_widthdef, .t-input-group_inrow");
        if (r.classList.contains("t-form__inputsbox_inrow") || (o = e.querySelectorAll(".t-input-block_width")),
        0 !== o.length) {
          (r.classList.contains("t-form__inputsbox_vertical-form") || r.closest(".t706")) && r.classList.add("t-form__inputsbox_flex");
          var n = r.offsetWidth
            , a = ["rd", "ri", "uc", "ws", "hd", "fr", "st"];
          Array.prototype.forEach.call(o, (function(t) {
              if (r.classList.contains("t-form__inputsbox_inrow") || (t = t.closest(".t-input-group")),
              t && t.classList.contains("t-input-group_inrow-withsibling")) {
                var e = t.nextElementSibling
                  , o = a.filter((function(t) {
                    return e.classList.contains("t-input-group_" + t)
                  }
                ));
                if (!e || 0 !== o.length || !(e.classList.contains("t-input-group_inrow") && !t.classList.contains("t-input-group_widthdef") || t.classList.contains("t-input-group_widthdef") && e.classList.contains("t-input-group") && !e.classList.contains("t-input-group_inrow")))
                  return t.classList.remove("t-input-group_inrow-withsibling"),
                    void t.classList.add("t-input-group_inrow-last");
                e.classList.add("t-input-group_inonerow")
              } else
                t.classList.add("t-input-group_inrow-last");
              e && t.classList.contains("t-input-group_widthdef") && t.classList.contains("t-input-group_inrow-withsibling") && e.classList.contains("t-input-group_inonerow") && !e.classList.contains("t-input-group_inrow") && (e.classList.add("t-input-group_widthdef"),
              e.classList.contains("t-input-group_inrow-withsibling") || e.classList.add("t-input-group_inrow-last"),
              e.classList.contains("t-input-group_inrow") && t.classList.add("t-input-group_inrow-last")),
              r.classList.contains("t-form__inputsbox_inrow") || t_forms__calculateFieldsWidthInJS(t, n)
            }
          ));
          var i = e.querySelectorAll(".t-input-group_inrow.t-input-group_inonerow.t-input-group_inrow-last");
          i.length > 0 && t_forms__moveFieldToNextRow(i);
          var s = e.querySelectorAll(".t-input-group_widthdef.t-input-group_inrow-last");
          r.classList.contains("t-form__inputsbox_inrow") && s.length > 0 && t_forms__combineFieldsWithDefWidth(s, t)
        }
      }
    }
  }
  function t_forms__moveFieldToNextRow(t) {
    var e;
    t_forms__createArrWithAllRows(t, "t-input-group_inrow").forEach((function(t) {
        var e = !1;
        if (t.forEach((function(t) {
            t.classList.contains("t-input-group_inrow-last") && t.nextElementSibling && !t.nextElementSibling.classList.contains("t-input-group_inonerow") && (e = !0)
          }
        )),
          !e) {
          var r = t.reduce((function(t, e) {
              var r, o = e.classList.value.split(" ").filter((function(t) {
                  return -1 !== t.indexOf("t-input-group_width")
                }
              )), n = 2, a;
              return -1 !== (o = o[0]).indexOf("100") && (n = 3),
              t + Number(o.substr(o.length - 2, n))
            }
          ), 0);
          r <= 100 || t.forEach((function(t) {
              t.classList.contains("t-input-group_inrow-last") && (t.style.marginRight = "calc(100% - (" + (r - 100) + "%)",
                t.style.flex = "0 0 auto")
            }
          ))
        }
      }
    ))
  }
  function t_forms__combineFieldsWithDefWidth(t, e) {
    var r = [], o;
    t_forms__createArrWithAllRows(t, "t-input-group_widthdef").forEach((function(t) {
        var e = 4;
        if (t.length > 4)
          for (var o = 0; o < t.length; o += 4) {
            var n = t.slice(o, o + 4);
            r.push(n)
          }
        else
          r.push(t)
      }
    )),
      r.forEach((function(t) {
          var r, o = "t-input-group_width" + ({
            4: "25",
            3: "33",
            2: "50"
          }[t.length] || "100");
          t.forEach((function(t) {
              if (t.classList.add(o),
                t.classList.contains("t-input-group_rg")) {
                var r = t.getAttribute("data-input-lid");
                t_input_range_init(e, r)
              }
            }
          ))
        }
      ))
  }
  function t_forms__createArrWithAllRows(t, e) {
    var r = []
      , o = [];
    return Array.prototype.forEach.call(t, (function(t) {
        for (o.push(t); t.previousElementSibling && t.previousElementSibling.classList.contains(e) && !t.previousElementSibling.classList.contains("t-input-group_inrow-last"); )
          t = t.previousElementSibling,
            o.push(t);
        r.push(o.reverse()),
          o = []
      }
    )),
      r
  }
  function t_forms__calculateFieldsWidthInJS(t, e) {
    var r = 15
      , o = {
      1: "t-input-block_width100",
      2: "t-input-block_width50",
      3: "t-input-block_width33",
      4: "t-input-block_width25"
    };
    for (var n in o)
      if (t.classList.contains(o[n])) {
        t.style.width = (e - r * (n - 1)) / n + "px";
        var a = t.previousElementSibling;
        a && a.classList.contains("t-input-title") && (a.style.width = (e - r * (n - 1)) / n + "px"),
        window.innerWidth < 480 && (t && (t.style.width = "100%"),
        a && (a.style.width = "100%"))
      }
  }
  function t_forms__onSubmit(t) {
    var e = t.querySelectorAll(".js-form-proccess");
    Array.prototype.forEach.call(e, (function(t) {
        t_removeEventListener(t, "submit", t_forms__submitEvent),
          t_addEventListener(t, "submit", t_forms__submitEvent)
      }
    ))
  }
  function t_forms__onClick(t) {
    t_addEventListener(t, "dblclick", t_forms__initBtnDblClick),
      t_removeEventListener(t, "click", t_forms__initBtnClick),
      t_addEventListener(t, "click", t_forms__initBtnClick)
  }
  function t_forms__initBtnDblClick(t) {
    var e;
    if (((t = t || window.event).target || t.srcElement).closest('[type="submit"]'))
      return t.preventDefault ? t.preventDefault() : t.returnValue = !1,
        !1
  }
  function t_forms__initBtnClick(t) {
    var e = (t = t || window.event).target || t.srcElement
      , r = !!e.closest('[type="submit"]') && e;
    if (r) {
      var o = r.closest(".js-form-proccess");
      if (o) {
        t.preventDefault ? t.preventDefault() : t.returnValue = !1;
        var n = o.getAttribute("id")
          , a = []
          , i = "";
        if (r.tildaSendingStatus && (i = r.tildaSendingStatus),
          !(i && i >= 1 || t_hasClass(r, "t706__submit_disable"))) {
          if (t_addClass(r, "t-btn_sending"),
            r.tildaSendingStatus = "1",
            window.tildaForm.hideErrors(o),
            a = window.tildaForm.validate(o),
            window.tildaForm.showErrors(o, a))
            return t_removeClass(r, "t-btn_sending"),
              void (r.tildaSendingStatus = "0");
          var s, l = document.getElementById("allrecords").getAttribute("data-tilda-formskey"), c = parseInt(o.getAttribute("data-formactiontype")), d;
          if (!o.querySelectorAll(".js-formaction-services").length && 1 !== c && !l) {
            var u = t_forms__getErrorContainers(o, "")
              , m = u.errorBoxes
              , p = u.allError;
            return Array.prototype.forEach.call(p, (function(t) {
                t.innerHTML = "Please set receiver in block with forms",
                  t.style.display = "block"
              }
            )),
              Array.prototype.forEach.call(m, (function(t) {
                  t.style.display = "block"
                }
              )),
              t_addClass(o, "js-send-form-error"),
              t_removeClass(r, "t-btn_sending"),
              r.tildaSendingStatus = "0",
              void t_triggerEvent(o, "tildaform:aftererror")
          }
          if (o.querySelector(".g-recaptcha") && grecaptcha) {
            window.tildaForm.currentFormProccessing = {
              form: o,
              btn: r,
              formtype: c,
              formskey: l
            };
            var f = o.tildaCaptchaClientId;
            if (f)
              grecaptcha.reset(f);
            else {
              var _ = {
                size: "invisible",
                sitekey: o.getAttribute("data-tilda-captchakey"),
                callback: window.tildaForm.captchaCallback
              };
              f = grecaptcha.render(n + "recaptcha", _),
                o.tildaCaptchaClientId = f
            }
            grecaptcha.execute(f)
          } else
            window.tildaForm.send(o, r, c, l)
        }
      }
    }
  }
  function t_forms__onRender(t) {
    var e;
    !!t.querySelector(".t396") && (t_removeEventListener(t, "render", t_forms__renderEvent),
      t_addEventListener(t, "render", t_forms__renderEvent))
  }
  function t_forms__renderEvent() {
    t_forms__onSubmit(this)
  }
  function t_forms__submitEvent(t) {
    var e = t;
    if (t.target && (e = t.target),
      e) {
      var r = e.querySelector('[type="submit"]')
        , o = "";
      r && r.tildaSendingStatus && (o = r.tildaSendingStatus),
        o && "3" === o ? r.tildaSendingStatus = "" : (r && !t_hasClass(r, "t706__submit_disable") && r.click(),
          t.preventDefault ? t.preventDefault() : t.returnValue = !1)
    }
  }
  function t_asyncLoad(t) {
    var e = t.getAttribute("data-tilda-mask")
      , r = t.getAttribute("data-tilda-mask-holder")
      , o = t.getAttribute("data-tilda-mask-init");
    e && !o && (r ? t_onFuncLoad("t_customMask__mask", (function() {
        t_customMask__mask(t, e, {
          placeholder: r
        })
      }
    )) : t_onFuncLoad("t_customMask__mask", (function() {
        t_customMask__mask(t, e)
      }
    )),
      t.setAttribute("data-tilda-mask-init", "1"))
  }
  function t_forms__getErrorContainers(t, e) {
    var r = t.querySelectorAll(".js-errorbox-all")
      , o = t.querySelectorAll(".js-errorbox-all .js-rule-error-all");
    return r.length || (t.insertAdjacentHTML("afterbegin", '<div class="js-errorbox-all"></div>'),
      r = t.querySelectorAll(".js-errorbox-all")),
    o.length || (Array.prototype.forEach.call(r, (function(t) {
        t.insertAdjacentHTML("beforeend", '<p class="js-rule-error-all">' + e + "</p>")
      }
    )),
      o = t.querySelectorAll(".js-errorbox-all .js-rule-error-all")),
      {
        errorBoxes: r,
        allError: o
      }
  }
  function t_forms__addRecaptcha() {
    var t = document.querySelectorAll(".js-tilda-captcha");
    Array.prototype.forEach.call(t, (function(t) {
        var e = t.getAttribute("data-tilda-captchakey");
        if (e) {
          var r = t.getAttribute("id");
          if (!window.tildaForm.isRecaptchaScriptInit) {
            var o = document.head
              , n = document.createElement("script");
            window.tildaForm.isRecaptchaScriptInit = !0,
              n.type = "text/javascript",
              n.src = "https://www.google.com/recaptcha/api.js?render=explicit",
              n.async = !0,
              o.appendChild(n),
              o.insertAdjacentHTML("beforeend", '<style type="text/css">.js-send-form-success .grecaptcha-badge {display: none;}</style>')
          }
          document.getElementById(r + "recaptcha") || t.insertAdjacentHTML("beforeend", '<div id="' + r + 'recaptcha" class="g-recaptcha" data-sitekey="' + e + '" data-callback="window.tildaForm.captchaCallback" data-size="invisible"></div>')
        } else
          t_removeClass(t, "js-tilda-captcha")
      }
    ))
  }
  function t_forms__showEmptyFormError(t) {
    var e = t.querySelectorAll(".js-rule-error-all"), r = t_forms__getMsg("emptyfill"), o;
    e.forEach((function(t) {
        t_forms__setFormErrorMsg(t, r)
      }
    )),
      t_forms__addMoveToInputWithErrorClickHandler(t.querySelector(".t-input-group"), e[0])
  }
  function t_forms__showInputErrors(t, e, r) {
    if (e && "none" !== r.obj) {
      e.classList.add("js-error-control-box");
      var o = e.querySelectorAll(".t-input-error");
      r.type.forEach((function(e) {
          var r, n = t_forms__getCustomMessage(t, e) || t_forms__getFieldErrorText(e);
          n && o.forEach((function(t) {
              t.innerHTML = n
            }
          ))
        }
      ))
    }
  }
  function t_forms__showFormErrors(t, e, r) {
    e.type.forEach((function(o) {
        var n = t.querySelectorAll(".js-rule-error-" + o), a, i = t_forms__getCustomMessage(t, o) || t_forms__getMsg(o), s;
        (n.length ? n : t.querySelectorAll(".js-rule-error-all")).forEach((function(t) {
            t_forms__setFormErrorMsg(t, i, o),
              r.add(o, e.obj, t)
          }
        ))
      }
    ))
  }
  window.t_forms__lang = (window.navigator.userLanguage || window.navigator.language).toUpperCase().slice(0, 2),
    window.scriptSysPayment = {},
    window.handlerSysPayment = {},
    window.isInitEventsZB = {},
    window.isInitEventsCustomMask = {},
    window.initForms = {},
    window.tildaForm = {
      versionLib: "02.001",
      endpoint: "forms.tildacdn.com",
      isRecaptchaScriptInit: !1,
      currentFormProccessing: !1
    },
    t_onReady((function() {
        var t = document.getElementById("allrecords");
        if (t) {
          var e = t.getAttribute("data-tilda-project-lang");
          e && (window.t_forms__lang = e);
          var r = t.getAttribute("data-tilda-root-zone");
          r && (window.tildaForm.endpoint = "forms.tildaapi." + r)
        }
        t_forms__initForms();

      }
    )),
    window.tildaForm.captchaCallback = function() {
      if (!window.tildaForm.currentFormProccessing || !window.tildaForm.currentFormProccessing.form)
        return !1;
      window.tildaForm.send(window.tildaForm.currentFormProccessing.form, window.tildaForm.currentFormProccessing.btn, window.tildaForm.currentFormProccessing.formtype, window.tildaForm.currentFormProccessing.formskey),
        window.tildaForm.currentFormProccessing = !1
    }

    ,
    window.tildaForm_initMasks = function() {
      var t = document.querySelectorAll(".js-tilda-mask");
      if (t.length && !0 !== window.isInitEventsCustomMask)
        return window.tildaForm_customMasksLoad(),
          void window.setTimeout((function() {
              window.tildaForm_initMasks()
            }
          ), 100);
      !0 === window.isInitEventsCustomMask && Array.prototype.forEach.call(t, (function(t) {
          t_asyncLoad(t)
        }
      ))
    }
    ,
    t_onReady((function() {
        window.tildaForm_initMasks()
      }
    )),
    window.tildaForm.validate = function(t) {
      for (var e = t_forms__getElement(t), r = e.querySelectorAll(".js-tilda-rule"), o = [], n = !0, a, i = t_forms__getConditionCheckHandler(e).isHiddenByCondition, s = 0; s < r.length; s++) {
        var l = r[s];
        if (!i(l)) {
          var c = !!parseInt(l.getAttribute("data-tilda-req") || 0, 10)
            , d = l.getAttribute("data-tilda-rule") || "none"
            , u = ""
            , m = ""
            , p = l.getAttribute("data-tilda-rule-minlength") || 0
            , f = l.getAttribute("data-tilda-rule-maxlength") || 0
            , _ = {}
            , w = l.value
            , y = ""
            , h = l.getAttribute("type")
            , g = l.getAttribute("name")
            , v = e.getAttribute("data-formcart");
          _.obj = l,
            _.type = [],
          w && w.length && (y = w.replace(/[\s\u0000—\u001F\u2000-\u200F\uFEFF\u2028-\u202F\u205F-\u206F]/gi, ""),
            w = w.trim()),
          p && (p = parseInt(p, 10)),
          f && (f = parseInt(f, 10));
          var b = !w.length && !y.length
            , E = "checkbox" === h || "radio" === h
            , F = e.querySelectorAll('[name="' + g + '"]:checked').length;
          if ((w.length && !E || E && F) && (n = !1),
          c && (b || E && !F))
            _.type.push("req");
          else {
            switch (d) {
              case "email":
                u = /^(?!\.)(?!.*\.\.)[a-zA-Zёа-яЁА-Я0-9\u2E80-\u2FD5\u3190-\u319f\u3400-\u4DBF\u4E00-\u9FCC\uF900-\uFAAD_\.\-\+]{0,63}[a-zA-Zёа-яЁА-Я0-9\u2E80-\u2FD5\u3190-\u319f\u3400-\u4DBF\u4E00-\u9FCC\uF900-\uFAAD_\-\+]@[a-zA-Zёа-яЁА-ЯЁёäöüÄÖÜßèéû0-9][a-zA-Zёа-яЁА-ЯЁёäöüÄÖÜßèéû0-9\.\-]{0,253}\.[a-zA-Zёа-яЁА-Я]{2,11}$/gi,
                w.length && !w.match(u) && _.type.push("email");
                break;
              case "url":
                u = /^((https?|ftp):\/\/)?[a-zA-Zёа-яЁА-ЯЁёäöüÄÖÜßèéûşç0-9][a-zA-Zёа-яЁА-ЯЁёäöüÄÖÜßèéûşç0-9_\.\-]{0,253}\.[a-zA-Zёа-яЁА-Я]{2,10}\/?$/gi,
                w.length && ((m = (m = (m = w.split("//")) && m.length > 1 ? m[1] : m[0]).split("/")) && m.length && m[0] ? (m = m[0]).match(u) || _.type.push("url") : (m && !m[0] || _.type.push("url"),
                  m = ""));
                break;
              case "phone":
                var x = l.getAttribute("data-tilda-mask")
                  , A = "^[0-9()+-";
                x && (-1 !== x.indexOf("*") ? A += "a-zёа-я" : (-1 !== x.indexOf("a") && (A += "a-z"),
                -1 !== x.indexOf("а") && (A += "а-яё"))),
                  A += "]+$",
                  u = new RegExp(A,"gi"),
                (y.length && !y.match(u) || 1 == (m = y.replace(/[^0-9]+/g, "")).indexOf("000") || 1 == m.indexOf("111") && "9" != m.substring(0, 1) || 1 == m.indexOf("222") && "5" != m.substring(0, 1) || 1 == m.indexOf("333") || 1 == m.indexOf("444") || 1 == m.indexOf("555") && "0" != m.substring(0, 1) || 1 == m.indexOf("666") && "0" != m.substring(0, 1) || 1 == m.indexOf("8888") && "4" != m.substring(0, 1)) && _.type.push("phone");
                break;
              case "number":
                u = /^[0-9]+$/gi,
                y.length > 0 && !y.match(u) && _.type.push("number");
                break;
              case "date":
                t_onFuncLoad("t_datepicker__readDateFromInput", (function() {
                    var t = t_datepicker__readDateFromInput(l);
                    y.length > 0 && !t_datepicker__isDateValid(t) && _.type.push("date")
                  }
                ));
                break;
              case "time":
                u = /^[0-9]{2}[:\.][0-9]{2}$/gi,
                  //! TODO: 00:00 - 23:59. Заменить на /^([0-1][0-9]|2[0-3])[:\.][0-5][0-9]$/gi
                y.length > 0 && !y.match(u) && _.type.push("time");
                break;
              case "name":
                u = /^([ЁёäöüÄÖÜßèéûҐґЄєІіЇїӐӑЙйК̆к̆Ӄ̆ӄ̆Ԛ̆ԛ̆Г̆г̆Ҕ̆ҕ̆ӖӗѢ̆ѣ̆ӁӂꚄ̆ꚅ̆ҊҋО̆о̆Ө̆ө̆Ꚍ̆ꚍ̆ЎўХ̆х̆Џ̆џ̆Ꚏ̆ꚏ̆Ꚇ̆ꚇ̆Ҽ̆ҽ̆Ш̆ш̆Ꚗ̆ꚗ̆Щ̆щ̆Ы̆ы̆Э̆э̆Ю̆ю̆Я̆я̆А́а́ЃѓД́д́Е́е́Ё́ёӘ́ә́З́з́И́и́І́і́Ї́ї́ЌќЛ́л́Н́н́О́о́Р́р́С́с́Т́т́У́у́Ӱ́ӱ́Ү́ү́Х́х́Ц́ц́Ы́ы́Э́э́Ӭ́ӭ́Ю́ю́Ю̈́ю̈́Я́я́Ѣ́ѣ́ҒғӺӻҒ̌ғ̌Ј̵ј̵ҞҟҜҝԞԟӨөҎҏҰұӾӿҸҹҌҍҢңҚқҒғӘәҺһІіҰұҮүӨөȺⱥꜺꜻƂƃɃƀȻȼꞒꞓƋƌĐđɆɇǤǥꞠꞡĦħƗɨƗ́ɨ́Ɨ̀ɨ̀Ɨ̂ɨ̂Ɨ̌ɨ̌Ɨ̃ɨ̃Ɨ̄ɨ̄Ɨ̈ɨ̈Ɨ̋ɨ̋Ɨ̏ɨ̏Ɨ̧ɨ̧Ɨ̧̀ɨ̧̀Ɨ̧̂ɨ̧̂Ɨ̧̌ɨ̧̌ᵼɈɉɟɟ̟ʄʄ̊ʄ̥K̵k̵ꝀꝁꝂꝃꝄꝅꞢꞣŁłł̓Ł̣ł̣ᴌȽƚⱠⱡꝈꝉƛƛ̓ꞤꞥꝊꝋØøǾǿØ̀ø̀Ø̂øØ̌ø̌Ø̄ø̄Ø̃ø̃Ø̨ø̨Ø᷎ø᷎ᴓⱣᵽꝐꝑꝖꝗꝘꝙɌɍꞦꞧꞨꞩẜẝŦŧȾⱦᵺꝤꝥꝦꝧɄʉɄ́ʉ́Ʉ̀ʉ̀Ʉ̂ʉ̂Ʉ̌ʉ̌Ʉ̄ʉ̄Ʉ̃ʉ̃Ʉ̃́ʉ̃́Ʉ̈ʉ̈ʉ̞ᵾU̸u̸ᵿꝞꝟw̸ɎɏƵƶA-Za-z\u00C0\u00C0-\u00C3\u00C8-\u00CA\u00CC\u00CD\u00D2-\u00D9\u00DA\u00DD\u00E0-\u00E3\u00E8\u00E9\u00EA\u00EC\u00ED\u00F2-\u00F5\u00F9\u00FA\u00FD\u0102\u0103\u0110\u0111\u0128\u0129\u0168\u0169\u01A0\u01A1\u01AF\u01B0\u1EA0\u1EA1-\u1EF9\u0027\u2019\u0300-\u03FF\u0400-\u04FF\u0500-\u05FF\u0600-\u06FF\u3040-\u30FF\u0041-\u007A\u00C0-\u02B8\uFB1D-\uFB1F\uFB2A-\uFB4E\u0E00-\u0E7F\u10A0-\u10FF\u3040-\u309F\u30A0-\u30FF\u2E80-\u2FD5\u3190-\u319f\u3400-\u4DBF\u4E00-\u9FCC\uF900-\uFAAD]{1,})([ЁёäöüÄÖÜßèéûҐґЄєІіЇїӐӑЙйК̆к̆Ӄ̆ӄ̆Ԛ̆ԛ̆Г̆г̆Ҕ̆ҕ̆ӖӗѢ̆ѣ̆ӁӂꚄ̆ꚅ̆ҊҋО̆о̆Ө̆ө̆Ꚍ̆ꚍ̆ЎўХ̆х̆Џ̆џ̆Ꚏ̆ꚏ̆Ꚇ̆ꚇ̆Ҽ̆ҽ̆Ш̆ш̆Ꚗ̆ꚗ̆Щ̆щ̆Ы̆ы̆Э̆э̆Ю̆ю̆Я̆я̆А́а́ЃѓД́д́Е́е́Ё́ёӘ́ә́З́з́И́и́І́і́Ї́ї́ЌќЛ́л́Н́н́О́о́Р́р́С́с́Т́т́У́у́Ӱ́ӱ́Ү́ү́Х́х́Ц́ц́Ы́ы́Э́э́Ӭ́ӭ́Ю́ю́Ю̈́ю̈́Я́я́Ѣ́ѣ́ҒғӺӻҒ̌ғ̌Ј̵ј̵ҞҟҜҝԞԟӨөҎҏҰұӾӿҸҹҌҍҢңҚқҒғӘәҺһІіҰұҮүӨөȺⱥꜺꜻƂƃɃƀȻȼꞒꞓƋƌĐđɆɇǤǥꞠꞡĦħƗɨƗ́ɨ́Ɨ̀ɨ̀Ɨ̂ɨ̂Ɨ̌ɨ̌Ɨ̃ɨ̃Ɨ̄ɨ̄Ɨ̈ɨ̈Ɨ̋ɨ̋Ɨ̏ɨ̏Ɨ̧ɨ̧Ɨ̧̀ɨ̧̀Ɨ̧̂ɨ̧̂Ɨ̧̌ɨ̧̌ᵼɈɉɟɟ̟ʄʄ̊ʄ̥K̵k̵ꝀꝁꝂꝃꝄꝅꞢꞣŁłł̓Ł̣ł̣ᴌȽƚⱠⱡꝈꝉƛƛ̓ꞤꞥꝊꝋØøǾǿØ̀ø̀Ø̂øØ̌ø̌Ø̄ø̄Ø̃ø̃Ø̨ø̨Ø᷎ø᷎ᴓⱣᵽꝐꝑꝖꝗꝘꝙɌɍꞦꞧꞨꞩẜẝŦŧȾⱦᵺꝤꝥꝦꝧɄʉɄ́ʉ́Ʉ̀ʉ̀Ʉ̂ʉ̂Ʉ̌ʉ̌Ʉ̄ʉ̄Ʉ̃ʉ̃Ʉ̃́ʉ̃́Ʉ̈ʉ̈ʉ̞ᵾU̸u̸ᵿꝞꝟw̸ɎɏƵƶA-Za-z\u00C0\u00C0-\u00C3\u00C8-\u00CA\u00CC\u00CD\u00D2-\u00D9\u00DA\u00DD\u00E0-\u00E3\u00E8\u00E9\u00EA\u00EC\u00ED\u00F2-\u00F5\u00F9\u00FA\u00FD\u0102\u0103\u0110\u0111\u0128\u0129\u0168\u0169\u01A0\u01A1\u01AF\u01B0\u1EA0\u1EA1-\u1EF9\u0041-\u007A\u00C0-\u02B8\u0300-\u03FF\u0400-\u04FF\u0500-\u05FF\u0600-\u06FF\u3040-\u30FF\uFB1D-\uFB1F\uFB2A-\uFB4E\u0E00-\u0E7F\u10A0-\u10FF\u3040-\u309F\u30A0-\u30FF\u2E80-\u2FD5\u3190-\u319f\u3400-\u4DBF\u4E00-\u9FCC\uF900-\uFAAD\-\'\‘\ʼ\s\.]{0,})$/gi,
                w.length && !w.match(u) && _.type.push("name");
                break;
              case "nameeng":
                u = /^([A-Za-z\s]{1,}((\-)?[A-Za-z\.\s](\')?){0,})*$/i,
                w.length && !w.match(u) && _.type.push("nameeng");
                break;
              case "namerus":
                u = /^([А-Яа-яЁё\s]{1,}((\-)?[А-Яа-яЁё\.\s](\')?){0,})*$/i,
                w.length && !w.match(u) && _.type.push("namerus");
                break;
              case "string":
                u = /^[A-Za-zА-Яа-я0-9ЁёЁёäöüÄÖÜßèéûӐӑЙйК̆к̆Ӄ̆ӄ̆Ԛ̆ԛ̆Г̆г̆Ҕ̆ҕ̆ӖӗѢ̆ѣ̆ӁӂꚄ̆ꚅ̆ҊҋО̆о̆Ө̆ө̆Ꚍ̆ꚍ̆ЎўХ̆х̆Џ̆џ̆Ꚏ̆ꚏ̆Ꚇ̆ꚇ̆Ҽ̆ҽ̆Ш̆ш̆Ꚗ̆ꚗ̆Щ̆щ̆Ы̆ы̆Э̆э̆Ю̆ю̆Я̆я̆А́а́ЃѓД́д́Е́е́Ё́ёӘ́ә́З́з́И́и́І́і́Ї́ї́ЌќЛ́л́Н́н́О́о́Р́р́С́с́Т́т́У́у́Ӱ́ӱ́Ү́ү́Х́х́Ц́ц́Ы́ы́Э́э́Ӭ́ӭ́Ю́ю́Ю̈́ю̈́Я́я́Ѣ́ѣ́ҒғӺӻҒ̌ғ̌Ј̵ј̵ҞҟҜҝԞԟӨөҎҏҰұӾӿҸҹҌҍҢңҚқҒғӘәҺһІіҰұҮүӨөȺⱥꜺꜻƂƃɃƀȻȼꞒꞓƋƌĐđɆɇǤǥꞠꞡĦħƗɨƗ́ɨ́Ɨ̀ɨ̀Ɨ̂ɨ̂Ɨ̌ɨ̌Ɨ̃ɨ̃Ɨ̄ɨ̄Ɨ̈ɨ̈Ɨ̋ɨ̋Ɨ̏ɨ̏Ɨ̧ɨ̧Ɨ̧̀ɨ̧̀Ɨ̧̂ɨ̧̂Ɨ̧̌ɨ̧̌ᵼɈɉɟɟ̟ʄʄ̊ʄ̥K̵k̵ꝀꝁꝂꝃꝄꝅꞢꞣŁłł̓Ł̣ł̣ᴌȽƚⱠⱡꝈꝉƛƛ̓ꞤꞥꝊꝋØøǾǿØ̀ø̀Ø̂øØ̌ø̌Ø̄ø̄Ø̃ø̃Ø̨ø̨Ø᷎ø᷎ᴓⱣᵽꝐꝑꝖꝗꝘꝙɌɍꞦꞧꞨꞩẜẝŦŧȾⱦᵺꝤꝥꝦꝧɄʉɄ́ʉ́Ʉ̀ʉ̀Ʉ̂ʉ̂Ʉ̌ʉ̌Ʉ̄ʉ̄Ʉ̃ʉ̃Ʉ̃́ʉ̃́Ʉ̈ʉ̈ʉ̞ᵾU̸u̸ᵿꝞꝟw̸ɎɏƵƶ\u0041-\u007A\u00C0-\u02B8\u0300-\u03FF\u0400-\u04FF\u0500-\u05FF\u0600-\u06FF\u3040-\u30FF\uFB1D-\uFB1F\uFB2A-\uFB4E\u0E00-\u0E7F\u10A0-\u10FF\u3040-\u309F\u30A0-\u30FF\u2E80-\u2FD5\u3190-\u319f\u3400-\u4DBF\u4E00-\u9FCC\uF900-\uFAAD,\.:;\"\'\`\-\_\+\?\!\%\$\@\*\&\^\s]$/i,
                w.length && !w.match(u) && _.type.push("string");
                break;
              case "chosevalue":
                var S;
                "true" === l.getAttribute("data-option-selected") || _.type.push("chosevalue");
                break;
              case "promocode":
                "y" !== v || !y.length || !window.tcart || window.tcart.promocode && window.tcart.prodamount_discountsum || _.type.push("promocode");
                break;
              case "deliveryreq":
                _.type.push("deliveryreq");
                break;
              case "unauthorized_order":
                _.type.push("unauthorized_order")
            }
            p > 0 && w.length && w.length < p && _.type.push("minlength"),
            f > 0 && w.length && w.length > f && _.type.push("maxlength")
          }
          _.type && _.type.length && (o[o.length] = _)
        }
      }
      if ("y" === v) {
        var k = window.tcart_minorder > 0, C = window.tcart_mincntorder > 0, j, _, _;
        if (k)
          if ((window.tcart.prodamount_withdiscount > 0 ? window.tcart.prodamount_withdiscount : void 0 !== window.tcart.prodamount_withdyndiscount && window.t_cart__discounts && window.t_cart__discounts.length > 0 ? window.tcart.prodamount_withdyndiscount : window.tcart.prodamount) < window.tcart_minorder)
            (_ = {
              obj: {},
              type: []
            }).type.push("minorder"),
              o.push(_);
        if (C && window.tcart.total < window.tcart_mincntorder)
          (_ = {
            obj: {},
            type: []
          }).type.push("minquantity"),
            o.push(_)
      }
      return n && !o.length && r.length && (o = [{
        obj: "none",
        type: ["emptyfill"]
      }]),
        o
    }
    ,
    window.tildaForm.hideErrors = function(t) {
      if ("object" != typeof t || t.length) {
        var e = t_forms__getElement(t)
          , r = e.querySelectorAll(".js-errorbox-all")
          , o = e.querySelectorAll(".js-rule-error")
          , n = e.querySelectorAll(".js-error-rule-all")
          , a = e.querySelectorAll(".js-successbox")
          , i = e.querySelectorAll(".js-error-control-box")
          , s = e.querySelectorAll(".js-error-control-box .t-input-error")
          , l = document.getElementById("tilda-popup-for-error");
        Array.prototype.forEach.call(r, (function(t) {
            t.style.display = "none"
          }
        )),
          Array.prototype.forEach.call(o, (function(t) {
              t.style.display = "none"
            }
          )),
          Array.prototype.forEach.call(n, (function(t) {
              t.innerHTML = ""
            }
          )),
          Array.prototype.forEach.call(a, (function(t) {
              t.style.display = "none"
            }
          )),
          Array.prototype.forEach.call(s, (function(t) {
              t.innerHTML = ""
            }
          )),
          Array.prototype.forEach.call(i, (function(t) {
              t_removeClass(t, "js-error-control-box")
            }
          )),
          t_removeClass(e, "js-send-form-error"),
          t_removeClass(e, "js-send-form-success"),
        l && t_fadeOut(l)
      }
    }
    ,
    window.tildaForm.showErrorInPopup = function(t, e) {
      var r = t_forms__getElement(t);
      if (!e || !e.length)
        return !1;
      var o = r.getAttribute("id")
        , n = r.getAttribute("data-inputbox");
      n || (n = ".blockinput");
      var a = ""
        , i = !1
        , s = !0
        , l = ""
        , c = ""
        , d = ""
        , u = ""
        , m = document.getElementById("tilda-popup-for-error");
      m || (document.body.insertAdjacentHTML("beforeend", '<div id="tilda-popup-for-error" class="js-form-popup-errorbox tn-form__errorbox-popup" style="display: none;"> <div class="t-form__errorbox-text t-text t-text_xs"> error </div> <div class="tn-form__errorbox-close js-errorbox-close"> <div class="tn-form__errorbox-close-line tn-form__errorbox-close-line-left"></div> <div class="tn-form__errorbox-close-line tn-form__errorbox-close-line-right"></div> </div> </div>'),
        t_addEventListener(m = document.getElementById("tilda-popup-for-error"), "click", (function(t) {
            var e, r;
            if (((t = t || window.event).target || t.srcElement).closest(".js-errorbox-close"))
              return t.preventDefault ? t.preventDefault() : t.returnValue = !1,
                t_fadeOut(m),
                !1
          }
        )));
      for (var p = 0; p < e.length; p++)
        if (e[p] && e[p].obj) {
          if (0 === p && "none" === e[p].obj) {
            u = '<p class="t-form__errorbox-item">' + t_forms__getMsg("emptyfill") + "</p>";
            break
          }
          var f = t_forms__getElement(e[p].obj);
          f && (a = f.closest(n)),
          a && (c = a.querySelectorAll(".t-input-error"),
            t_addClass(a, "js-error-control-box"),
          c.length && (i = !0));
          for (var _ = 0; _ < e[p].type.length; _++) {
            var w = e[p].type[_]
              , y = t_forms__getMsg(w);
            d = "",
              (l = r.querySelector(".js-rule-error-" + w)) ? l.textContent && l.innerText || !y || -1 !== u.indexOf(y) ? (d = l.textContent || l.innerText,
              -1 === u.indexOf(d) && (u = u + '<p class="t-form__errorbox-item">' + d + "</p>")) : u = u + '<p class="t-form__errorbox-item">' + y + "</p>" : y && -1 === u.indexOf(y) && (u = u + '<p class="t-form__errorbox-item">' + y + "</p>"),
            i && (!d && t_forms__getMsg(w + "field") ? d = t_forms__getMsg(w + "field") : y && (d = y),
            d && a && (c = a.querySelectorAll(".t-input-error"),
              Array.prototype.forEach.call(c, (function(t) {
                  t.innerHTML = d,
                    t_fadeIn(t)
                }
              ))))
          }
        }
      if (u) {
        m.querySelector(".t-form__errorbox-text").innerHTML = u;
        var h = m.querySelectorAll(".t-form__errorbox-item");
        if (Array.prototype.forEach.call(h, (function(t) {
            t.style.display = "block"
          }
        )),
          document.querySelector('.t1093 [data-elem-type="form"]')) {
          var g = window.tPopupObj && window.tPopupObj.openPopUpList;
          if (g && g.length) {
            var v, b = '.t1093 .t-popup[data-tooltip-hook="' + g[g.length - 1] + '"]', E = document.querySelector(b), F = E ? getComputedStyle(E).zIndex : 0, x;
            F > 1e4 && (m.style.zIndex = F + 1)
          } else
            m.style.zIndex = ""
        }
        t_fadeIn(m)
      }
      function A(t) {
        var e;
        if ("INPUT" === ((t = t || window.event).target || t.srcElement).tagName) {
          var r = S.querySelectorAll("form .t-input-error");
          t_fadeOut(m),
            Array.prototype.forEach.call(r, (function(t) {
                t.innerHTML = "",
                  t_fadeOut(t)
              }
            )),
          window.t_forms__errorTimerID && (window.clearTimeout(window.t_forms__errorTimerID),
            window.t_forms__errorTimerID = 0),
            window.isInitEventsZB[o] = !0
        }
      }
      if (window.t_forms__errorTimerID && window.clearTimeout(window.t_forms__errorTimerID),
        window.t_forms__errorTimerID = window.setTimeout((function() {
            t_fadeOut(m),
              c = r.querySelectorAll(".t-input-error"),
              Array.prototype.forEach.call(c, (function(t) {
                  t.innerHTML = "",
                    t_fadeOut(t)
                }
              )),
              window.t_forms__errorTimerID = 0
          }
        ), 1e4),
        !window.isInitEventsZB[o]) {
        var S = r.closest(".r")
          , k = "focus";
        document.addEventListener || (k = "focusin"),
          t_removeEventListener(S, k, A),
          t_addEventListener(S, k, A, !0),
          t_removeEventListener(S, "change", A),
          t_addEventListener(S, "change", A, !0)
      }
      return t_triggerEvent(r, "tildaform:aftererror"),
        !0
    }
    ,
    window.tildaForm.showErrors = function(t, e, r) {
      var o = t_forms__getElement(t);
      if (!e || !e.length)
        return !1;
      if ("y" === o.getAttribute("data-error-popup"))
        return window.tildaForm.showErrorInPopup(o, e);
      for (var n, a = (r || {}).inputBoxSelector, i, s = void 0 === a ? o.getAttribute("data-inputbox") || ".blockinput" : a, l = t_forms__createErrorFocusHash(), c = 0; c < e.length; c++) {
        var d = 0 === c
          , u = e[c];
        if (u && u.obj) {
          var m = u.obj;
          if ("none" === m && d) {
            t_forms__showEmptyFormError(o);
            break
          }
          var p = t_forms__getElement(m), f;
          if (p && p instanceof Element)
            t_forms__showInputErrors(o, p.closest(s), u);
          t_forms__showFormErrors(o, u, l)
        }
      }
      return t_forms__scrollToInputWithError(e[0]),
        t_forms__showFormErrorsContainers(o),
        t_triggerEvent(o, "tildaform:aftererror"),
        !0
    }
    ,
    window.tildaForm.addTildaCaptcha = function(t, e) {
      var r = t_forms__getElement(t), o = document.getElementById("tildaformcaptchabox"), n = document.getElementById("js-tildaspec-captcha"), a;
      o && t_removeEl(o),
      n && t_removeEl(n),
        r.insertAdjacentHTML("beforeend", '<input type="hidden" name="tildaspec-tildacaptcha" id="js-tildaspec-captcha">');
      try {
        a = (new Date).getTime() + "=" + parseInt(8 * Math.random(), 10)
      } catch (s) {
        a = "rnd=" + parseInt(8 * Math.random(), 10)
      }
      var i = '<div id="tildaformcaptchabox" tabindex="-1" style="z-index: 99999999999; position:fixed; text-align: center; vertical-align: middle; top: 0px; left:0px; bottom: 0px; right: 0px; background: rgba(255,255,255,0.97);"><iframe id="captchaIframeBox" src="//' + window.tildaForm.endpoint + "/procces/captcha/?tildaspec-formid=" + r.getAttribute("id") + "&tildaspec-formskey=" + e + "&" + a + '" frameborder="0" width="100%" height="100%"></iframe></div>';
      document.body.insertAdjacentHTML("beforeend", i),
        window.removeEventListener("message", checkVerifyTildaCaptcha),
        window.addEventListener("message", checkVerifyTildaCaptcha),
        document.getElementById("tildaformcaptchabox").focus()
    }
    ,
    window.tildaForm.addMembersInfoToForm = function(t) {
      var e = t_forms__getElement(t);
      if (e)
        try {
          var r = e.querySelector(".js-tilda-mauserinfo");
          if (r && t_removeEl(r),
            !window.mauser)
            return;
          window.tildaForm.tildamember = {},
          window.mauser.name && (window.tildaForm.tildamember.name = window.mauser.name),
          window.mauser.code && window.mauser.email && (window.tildaForm.tildamember.email = window.mauser.email,
            window.tildaForm.tildamember.code = window.mauser.code),
          window.mauser.token && (window.tildaForm.tildamember.token = window.mauser.token)
        } catch (o) {
          return void console.log("addMembersInfoToForm exception: ", o)
        }
    }
    ,
    window.tildaForm.closeSuccessPopup = function() {
      var t = document.getElementById("tildaformsuccesspopup");
      t && (t_removeClass(document.body, "t-body_success-popup-showed"),
      /iPhone|iPad|iPod/i.test(navigator.userAgent) && !window.MSStream && window.tildaForm.unlockBodyScroll(),
        t_fadeOut(t))
    }
    ,
    window.tildaForm.lockBodyScroll = function() {
      var t = document.body;
      if (!t_hasClass(t, "t-body_scroll-locked")) {
        var e = void 0 !== window.pageYOffset ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
        t_addClass(t, "t-body_scroll-locked"),
          t.style.top = "-" + e + "px",
          t.setAttribute("data-popup-scrolltop", e)
      }
    }
    ,
    window.tildaForm.unlockBodyScroll = function() {
      var t = document.body;
      if (t_hasClass(t, "t-body_scroll-locked")) {
        var e = t.getAttribute("data-popup-scrolltop");
        t_removeClass(t, "t-body_scroll-locked"),
          t.style.top = null,
          t.removeAttribute("data-popup-scrolltop"),
          document.documentElement.scrollTop = parseInt(e)
      }
    }
    ,
    window.tildaForm.showSuccessPopup = function(t) {
      var e = ""
        , r = document.getElementById("tildaformsuccesspopup")
        , o = document.getElementById("tildaformsuccesspopuptext")
        , n = document.body;
      if (!r) {
        e += '<style media="screen"> .t-form-success-popup { display: none; position: fixed; background-color: rgba(0,0,0,.8); top: 0px; left: 0px; width: 100%; height: 100%; z-index: 10000; overflow-y: auto; cursor: pointer; } .t-body_success-popup-showed { height: 100vh; min-height: 100vh; overflow: hidden; } .t-form-success-popup__window { width: 100%; max-width: 400px; position: absolute; top: 50%; -webkit-transform: translateY(-50%); transform: translateY(-50%); left: 0px; right: 0px; margin: 0 auto; padding: 20px; box-sizing: border-box; } .t-form-success-popup__wrapper { background-color: #fff; padding: 40px 40px 50px; box-sizing: border-box; border-radius: 5px; text-align: center; position: relative; cursor: default; } .t-form-success-popup__text { padding-top: 20px; } .t-form-success-popup__close-icon { position: absolute; top: 14px; right: 14px; cursor: pointer; } @media screen and (max-width: 480px) { .t-form-success-popup__text { padding-top: 10px; } .t-form-success-popup__wrapper { padding-left: 20px; padding-right: 20px; } } </style>',
          e += '<div class="t-form-success-popup" style="display:none;" id="tildaformsuccesspopup"> <div class="t-form-success-popup__window"> <div class="t-form-success-popup__wrapper"> <svg class="t-form-success-popup__close-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" class="t657__icon-close" viewBox="0 0 23 23"> <g fill-rule="evenodd"> <path d="M0 1.41L1.4 0l21.22 21.21-1.41 1.42z"/> <path d="M21.21 0l1.42 1.4L1.4 22.63 0 21.21z"/> </g> </svg> <svg width="50" height="50" fill="#62C584"> <path d="M25.1 49.28A24.64 24.64 0 0 1 .5 24.68 24.64 24.64 0 0 1 25.1.07a24.64 24.64 0 0 1 24.6 24.6 24.64 24.64 0 0 1-24.6 24.61zm0-47.45A22.87 22.87 0 0 0 2.26 24.68 22.87 22.87 0 0 0 25.1 47.52a22.87 22.87 0 0 0 22.84-22.84A22.87 22.87 0 0 0 25.1 1.83z"/> <path d="M22.84 30.53l-4.44-4.45a.88.88 0 1 1 1.24-1.24l3.2 3.2 8.89-8.9a.88.88 0 1 1 1.25 1.26L22.84 30.53z"/> </svg> <div class="t-form-success-popup__text t-descr t-descr_sm" id="tildaformsuccesspopuptext"> Thank You! </div> </div> </div> </div>',
          n.insertAdjacentHTML("beforeend", e),
          r = document.getElementById("tildaformsuccesspopup"),
          o = document.getElementById("tildaformsuccesspopuptext");
        var a = r.querySelector(".t-form-success-popup__close-icon");
        t_addEventListener(r, "click", (function(t) {
            var e;
            ((t = t || window.event).target || t.srcElement) === this && window.tildaForm.closeSuccessPopup()
          }
        )),
          t_addEventListener(a, "click", (function() {
              window.tildaForm.closeSuccessPopup()
            }
          )),
          t_addEventListener(n, "keydown", (function(t) {
              var e;
              27 == ((t = t || window.event).keyCode || t.which) && window.tildaForm.closeSuccessPopup()
            }
          ))
      }
      o.innerHTML = t,
        t_fadeIn(r),
        t_addClass(n, "t-body_success-popup-showed"),
      /iPhone|iPad|iPod/i.test(navigator.userAgent) && !window.MSStream && setTimeout((function() {
          window.tildaForm.lockBodyScroll()
        }
      ), 500)
    }
    ,
    window.tildaForm.successEnd = function(formNode, successUrl, successCallback) {
      var form = t_forms__getElement(formNode)
        , successBox = form.querySelector(".js-successbox")
        , successStr = t_forms__getMsg("success");
      if (successBox) {
        var dataSuccessMessage = successBox.getAttribute("data-success-message");
        dataSuccessMessage ? successBox.innerHTML = dataSuccessMessage : successBox.textContent && successBox.innerText || dataSuccessMessage || !successStr || (successBox.innerHTML = successStr),
          "y" === form.getAttribute("data-success-popup") ? window.tildaForm.showSuccessPopup(successBox.innerHTML) : successBox.style.display = "block"
      }
      t_addClass(form, "js-send-form-success"),
      successCallback && 0 === successCallback.indexOf("window.") && (successCallback = successCallback.split(".")[1]),
        successCallback && "function" == typeof window[successCallback] ? "undefined" != typeof jQuery ? eval(successCallback + "(jQuery(form))") : eval(successCallback + "(form)") : successUrl && setTimeout((function() {
            window.location.href = successUrl
          }
        ), 500),
        window.tildaForm.clearTCart(form);
      var upwidgetRemoveBtns = form.querySelectorAll(".t-upwidget-container__data_table_actions_remove svg")
        , inputText = form.querySelectorAll('input[type="text"]')
        , inputNumber = form.querySelectorAll('input[type="number"]')
        , inputEmail = form.querySelectorAll('input[type="email"]')
        , inputPhone = form.querySelectorAll('input[type="tel"], input[type="hidden"][data-tilda-rule="phone"]')
        , inputTextarea = form.querySelectorAll("textarea");
      Array.prototype.forEach.call(upwidgetRemoveBtns, (function(t) {
          t_triggerEvent(t, "click")
        }
      )),
        Array.prototype.forEach.call(inputText, (function(t) {
            t.value = ""
          }
        )),
        Array.prototype.forEach.call(inputNumber, (function(t) {
            t.value = ""
          }
        )),
        Array.prototype.forEach.call(inputEmail, (function(t) {
            t.value = ""
          }
        )),
        Array.prototype.forEach.call(inputPhone, (function(t) {
            t.value = ""
          }
        )),
        Array.prototype.forEach.call(inputTextarea, (function(t) {
            t.innerHTML = "",
              t.value = ""
          }
        )),
      "undefined" != typeof jQuery && jQuery(form).data("tildaformresult", {
        tranId: "0",
        orderId: "0"
      }),
        form.tildaTranId = "0",
        form.tildaOrderId = "0"
    }
    ,
    window.tildaForm.clearTCart = function(t) {
      var e;
      if ("y" === t_forms__getElement(t).getAttribute("data-formcart")) {
        if (window.clearTCart = !0,
          window.tcart = {
            amount: 0,
            currency: "",
            system: "",
            products: []
          },
          window.tcart.system = "none",
        "object" == typeof localStorage)
          try {
            localStorage.removeItem("tcart")
          } catch (r) {
            console.error("Your web browser does not support localStorage. Code status: ", r)
          }
        try {
          delete window.tcart,
            tcart__loadLocalObj()
        } catch (r) {}
        window.tcart_success = "yes"
      }
    }
    ,
    window.tildaForm.send = function(formNode) {
      var form = t_forms__getElement(formNode)
      return form.submit()
    }
    ,
    window.validateForm = function(t) {
      return window.tildaForm.validate(t)
    }
    ,
    function() {
      try {
        var t = window.location.href
          , e = ""
          , r = "";
        if (-1 !== t.toLowerCase().indexOf("utm_") && "string" == typeof (e = (e = (t = t.toLowerCase()).split("?"))[1])) {
          var o, n, a = e.split("&");
          for (n in a)
            "function" != typeof a[n] && "utm_" == (o = a[n].split("="))[0].substring(0, 4) && (r = r + a[n] + "|||");
          if (r.length > 0 && (!window.tildastatcookie || "no" != window.tildastatcookie)) {
            var i = new Date;
            i.setDate(i.getDate() + 30),
              document.cookie = "TILDAUTM=" + encodeURIComponent(r) + "; path=/; expires=" + i.toUTCString()
          }
        }
      } catch (s) {}
    }();
  var t_forms__setFormErrorMsg = function t(e, r) {
    e.getAttribute("data-rule-filled") ? e.style.display = "block" : r && (e.innerHTML = '<a href="#" class="t-form__errorbox-link">' + r + "</a>",
      e.style.display = "block")
  };
  function t_forms__getFieldErrorText(t) {
    var e = t_forms__getMsg(t + "field"), r;
    return e || t_forms__getMsg(t)
  }
  function t_forms__getCustomMessage(t, e) {
    var r = t.querySelector(".js-rule-error-" + e);
    if (!r)
      return "";
    var o = r.getAttribute("data-original-msg");
    if (null != o)
      return o;
    var n = r ? r.textContent : "";
    return r.setAttribute("data-original-msg", n),
      n
  }
  function t_forms__createErrorFocusHash() {
    var t = {};
    return {
      add: function e(r, o, n) {
        var a = o instanceof Element;
        !t[r] && o && a && (t_forms__addMoveToInputWithErrorClickHandler(o, n),
          t[r] = o)
      }
    }
  }
  function t_forms__scrollToInputWithError(t) {
    if (t) {
      var e = t.obj
        , r = e instanceof Element;
      "none" !== e && r && t_forms__focusInput(e)
    }
  }
  function t_forms__focusInput(t) {
    if (t) {
      var e = t.closest(".t-input-group");
      if (e) {
        var r = function t(e) {
          return e && e.focus()
        }
          , o = e.getAttribute("data-field-type")
          , n = "ph" === o
          , a = "contact_method" === o
          , i = "ri" === o
          , s = "cb" === e.getAttribute("data-field-radcb") || "cb" === o
          , l = "sb" === o
          , c = "uw" === o || "uc" === o;
        if (n) {
          var d;
          r(e.querySelector('.t-input[type="tel"]'))
        } else {
          if (a) {
            var u, m = e.querySelector(".t-contact-method__value-container > :not(.t-contact-method__hidden)").querySelector(".t-input-block:not(.t-contact-method__hidden)"), p = m.querySelector(".js-username-input"), f;
            return p ? void r(p) : void r(m.querySelector(".t-input-phonemask"))
          }
          var _, w, y;
          if (i)
            r(e.querySelector(".t-img-select"));
          else if (s)
            r(e.querySelector(".t-checkbox"));
          else if (l)
            r(e.querySelector(".t-select"));
          else if (c)
            e.scrollIntoView({
              block: "center"
            });
          else {
            var h = t.querySelector(".t-input");
            h && "hidden" !== h.type ? r(h) : r(t)
          }
        }
      }
    }
  }
  function t_forms__showFormErrorsContainers(t) {
    var e;
    t.querySelectorAll(".js-errorbox-all").forEach((function(t) {
        t.style.display = "block"
      }
    ))
  }
  function t_forms__getElement(t) {
    return t instanceof Element ? t : t[0]
  }
  function t_forms__getMsg(t) {
    var e = []
      , r = window.t_forms__lang;
    return e.EN = {
      success: "Thank you! Your data has been submitted.",
      successorder: "Thank you! Order created. Please wait while you are redirected to the payment page...",
      email: "Please enter a valid email address",
      url: "Please put a correct URL",
      phone: "Please put a correct phone number",
      number: "Please put a correct number",
      date: "Please put a correct date",
      time: "Please put a correct time (HH:mm)",
      name: "Please put a name",
      namerus: "Please put a correct name (only cyrillic letters)",
      nameeng: "Please put a correct name (only latin letters)",
      string: "You put incorrect symbols. Only letters, numbers and punctuation symbols are allowed",
      req: "Please fill out all required fields",
      reqfield: "Required field",
      minlength: "Value is too short",
      maxlength: "Value too big",
      emptyfill: "None of the fields are filled in",
      chosevalue: "Please select an address from the options",
      deliveryreq: "It is not possible to place an order without delivery. Please refresh the page and try again",
      unauthorized_order: "Please log in to proceed with your order",
      promocode: "Please activate promo code or clear input field"
    },
      e.RU = {
        success: "Спасибо! Данные успешно отправлены.",
        successorder: "Спасибо! Заказ оформлен. Пожалуйста, подождите. Идет переход к оплате...",
        email: "Укажите, пожалуйста, корректный email",
        url: "Укажите, пожалуйста, корректный URL",
        phone: "Укажите, пожалуйста, корректный номер телефона",
        number: "Укажите, пожалуйста, корректный номер",
        date: "Укажите, пожалуйста, корректную дату",
        time: "Укажите, пожалуйста, корректное время (ЧЧ:ММ)",
        name: "Укажите, пожалуйста, имя",
        namerus: "Укажите, пожалуйста, имя (только кириллица)",
        nameeng: "Укажите, пожалуйста, имя (только латиница)",
        string: "Вы написали некорректные символы. Разрешены только буквы, числа и знаки пунктуации",
        req: "Пожалуйста, заполните все обязательные поля",
        reqfield: "Обязательное поле",
        minlength: "Слишком короткое значение",
        maxlength: "Слишком длинное",
        emptyfill: "Ни одно поле не заполнено",
        chosevalue: "Пожалуйста, выберите адрес из предложенных вариантов",
        deliveryreq: "Невозможно оформить заказ без доставки. Пожалуйста, перезагрузите страницу и попробуйте еще раз.",
        unauthorized_order: "Пожалуйста, авторизуйтесь для оформления заказа",
        promocode: "Активируйте, пожалуйста, промокод или очистите поле"
      },
    "function" == typeof t_forms__getDict && "RU" !== r && "EN" !== r && (e = t_forms__getDict()),
      e[r] ? e[r][t] : e.EN[t]
  }
  function checkVerifyTildaCaptcha(t) {
    if (-1 !== (t = t || window.event).origin.indexOf(window.tildaForm.endpoint)) {
      var e = document.getElementById("js-tildaspec-captcha")
        , r = document.getElementById("tildaformcaptchabox");
      if ("closeiframe" == t.data)
        return r && t_removeEl(r),
          void (e && t_removeEl(e));
      var o = t.data;
      if ("object" == typeof o && (o = JSON.stringify(o),
      Array.isArray(window.t_jserrors) || (window.t_jserrors = []),
        window.t_jserrors.push({
          message: "Recaptcha returned object, instead of string: " + o,
          filename: "tilda-form-1.0",
          lineno: 0,
          colno: 0
        })),
        e) {
        e.value = o,
        r && t_removeEl(r);
        var n = e.closest("form");
        n && t_forms__submitEvent(n)
      }
    }
  }
  function t_parseScripts(t, e) {
    var r = t.querySelectorAll(e + "script");
    Array.prototype.forEach.call(r, (function(e) {
        for (var r = document.createElement("script"), o = 0; o < e.attributes.length; o++) {
          var n = e.attributes[o];
          r.setAttribute(n.name, n.value)
        }
        if (e.innerHTML.length)
          r.appendChild(document.createTextNode(e.innerHTML)),
            e.parentNode.replaceChild(r, e);
        else {
          var a = document.createElement("script");
          a.src = e.attributes.src.value,
            t.appendChild(a),
            t_removeEl(e)
        }
      }
    ))
  }
  function t_forms__onSuccess(t) {
    var e = t_forms__getElement(t), r = e.closest(".r"), o = r.getAttribute("data-record-type"), n = e.querySelector(".t-form__inputsbox"), a = getComputedStyle(n, null), i = parseInt(a.paddingTop) || 0, s = parseInt(a.paddingBottom) || 0, l, c, d = n.clientHeight - (i + s) + (n.getBoundingClientRect().top + window.pageYOffset), u = e.querySelector(".t-form__successbox"), m = u ? u.getBoundingClientRect().top + window.pageYOffset : 0, p = 0, f = window.innerHeight, _ = document.body, w = document.documentElement, y = Math.max(_.scrollHeight, _.offsetHeight, w.clientHeight, w.scrollHeight, w.offsetHeight);
    if (121 == o) {
      var h = e.getAttribute("data-success-callback");
      h && (o = h.split("_onSuccess")[0].replace("t", ""))
    }
    var g = "t" + o + "__inputsbox_hidden"
      , v = [702, 708, 862, 945, 1014, 1114]
      , b = !0;
    p = window.innerWidth > 960 ? m - 200 : m - 100;
    var E = document.querySelector(".t-tildalabel");
    if (m > window.scrollY || y - d < f - 100)
      n.classList.add(g),
      f > y && E && setTimeout((function() {
          t_fadeOut(E)
        }
      ), 300);
    else {
      for (var F = 0; F < v.length; F++)
        if (v[F] == o) {
          b = !1;
          break
        }
      b && t_forms__scrollBeginForm(p),
        setTimeout((function() {
            n.classList.add(g)
          }
        ), 400)
    }
    var x = e.getAttribute("data-success-url");
    if (x && setTimeout((function() {
        window.location.href = x
      }
    ), 500),
    835 == o || 862 == o) {
      var A = r.querySelector(".t" + o + "__btn_prev")
        , S = r.querySelector(".t" + o + "__wrapper")
        , k = r.querySelector(".t" + o + "__quiz-form-wrapper");
      A && (A.style.display = "none"),
      S && (S.style.minHeight = ""),
      k && (k.style.minHeight = "")
    }
  }
  function t_forms__scrollBeginForm(t) {
    var e = 400
      , r = (window.pageYOffset || document.documentElement.scrollTop) - (document.documentElement.clientTop || 0)
      , o = t - r
      , n = 0
      , a = 16;
    function i(t) {
      return (t /= e / 2) < 1 ? o / 2 * t * t * t + r : o / 2 * ((t -= 2) * t * t + 2) + r
    }
    function s() {
      n += a,
        window.scrollTo(0, i(n)),
        n < e ? setTimeout(s, a) : document.body.removeAttribute("data-scrollable")
    }
    document.body.setAttribute("data-scrollable", "true"),
      s()
  }
  function t_forms__getConditionCheckHandler(t) {
    var e = Array.from(t.querySelectorAll('[data-hidden-by-condition="true"]')), r;
    return {
      isHiddenByCondition: function t(r) {
        return e.some((function(t) {
            return t === r || t.contains(r)
          }
        ))
      }
    }
  }
  function t_removeEl(t) {
    t && t.parentNode && t.parentNode.removeChild(t)
  }
  Array.prototype.some || (Array.prototype.some = function(t) {
      "use strict";
      if (null == this)
        throw new TypeError("Array.prototype.some called on null or undefined");
      if ("function" != typeof t)
        throw new TypeError;
      for (var e = Object(this), r = e.length >>> 0, o = arguments.length >= 2 ? arguments[1] : void 0, n = 0; n < r; n++)
        if (n in e && t.call(o, e[n], n, e))
          return !0;
      return !1
    }
  ),
    function(t) {
      var e = t.matches || t.matchesSelector || t.webkitMatchesSelector || t.mozMatchesSelector || t.msMatchesSelector || t.oMatchesSelector;
      t.matches = t.matchesSelector = e || function t(e) {
        var t = document.querySelectorAll(e)
          , r = this;
        return Array.prototype.some.call(t, (function(t) {
            return t === r
          }
        ))
      }
    }(Element.prototype),
  Element.prototype.closest || (Element.prototype.closest = function(t) {
      for (var e = this; e && 1 === e.nodeType; ) {
        if (Element.prototype.matches.call(e, t))
          return e;
        e = e.parentElement || e.parentNode
      }
      return null
    }
  ),
  String.prototype.trim || (String.prototype.trim = function() {
      return this.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "")
    }
  ),
  Array.prototype.indexOf || (Array.prototype.indexOf = function(t, e) {
      "use strict";
      var r;
      if (null == this)
        throw new TypeError('"this" is null or not defined');
      var o = Object(this)
        , n = o.length >>> 0;
      if (0 === n)
        return -1;
      var a = 0 | e;
      if (a >= n)
        return -1;
      for (r = Math.max(a >= 0 ? a : n - Math.abs(a), 0); r < n; r++)
        if (r in o && o[r] === t)
          return r;
      return -1
    }
  );
  var t_forms__htmlEvents = {
    onblur: 1,
    onchange: 1,
    onfocus: 1,
    onsubmit: 1,
    onclick: 1,
    ondblclick: 1,
    onkeydown: 1,
    onkeypress: 1,
    onpaste: 1,
    oninput: 1
  };
  function t_removeEventListener(t, e, r) {
    t.removeEventListener ? t.removeEventListener(e, r, !1) : t.detachEvent && t_forms__htmlEvents["on" + e] ? t.detachEvent("on" + e, r) : t["on" + e] = null
  }
  function t_addEventListener(t, e, r, o) {
    t.addEventListener ? t.addEventListener(e, r, o) : t.attachEvent && t_forms__htmlEvents["on" + e] ? t.attachEvent("on" + e, r) : t["on" + e] = r
  }
  function t_serializeArray(t) {
    for (var e = [], r = t.querySelectorAll("input, textarea, button, select"), o, n = t_forms__getConditionCheckHandler(t).isHiddenByCondition, a = 0; a < r.length; a++)
      if (!(!r[a].name || r[a].disabled || ["file", "reset", "submit", "button"].indexOf(r[a].type) > -1 || n(r[a])))
        if ("select-multiple" !== r[a].type)
          ["checkbox", "radio"].indexOf(r[a].type) > -1 && !r[a].checked || e.push({
            name: r[a].name,
            value: r[a].value
          });
        else
          for (var i = r[a].options, s = 0; s < i.length; s++)
            i[s].selected && e.push({
              name: i[s].name,
              value: i[s].value
            });
    return e
  }
  function t_addClass(t, e) {
    document.body.classList ? t.classList.add(e) : t.className += (t.className ? " " : "") + e
  }
  function t_removeClass(t, e) {
    document.body.classList ? t.classList.remove(e) : t.className = t.className.replace(new RegExp("(^|\\s+)" + e + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, "")
  }
  function t_hasClass(t, e) {
    return document.body.classList ? t.classList.contains(e) : new RegExp("(\\s|^)" + e + "(\\s|$)").test(t.className)
  }
  function t_forms__formData(t) {
    for (var e = "", r = 0; r < t.length; r++)
      "" !== e && (e += "&"),
        e += encodeURIComponent(t[r].name) + "=" + encodeURIComponent(t[r].value);
    return e.replace(/%20/g, "+")
  }
  function t_fadeOut(t) {
    if ("none" !== t.style.display)
      var e = 1
        , r = setInterval((function() {
          t.style.opacity = e,
          (e -= .1) <= .1 && (clearInterval(r),
            t.style.display = "none",
            t.style.opacity = null)
        }
      ), 30)
  }
  function t_fadeIn(t) {
    if ("block" !== t.style.display) {
      var e = 0;
      t.style.opacity = e,
        t.style.display = "block";
      var r = setInterval((function() {
          t.style.opacity = e,
          (e += .1) >= 1 && clearInterval(r)
        }
      ), 30)
    }
  }
  function t_triggerEvent(t, e) {
    var r;
    document.createEvent ? (r = document.createEvent("HTMLEvents")).initEvent(e, !0, !1) : document.createEventObject && ((r = document.createEventObject()).eventType = e),
      r.eventName = e,
      t.dispatchEvent ? t.dispatchEvent(r) : t.fireEvent ? t.fireEvent("on" + r.eventType, r) : t[e] ? t[e]() : t["on" + e] && t["on" + e]()
  }
  function t_lazyload__init() {
    t_lazyload__detectwebp();
    var elAllRecs = document.querySelector("#allrecords");
    elAllRecs && "yes" === elAllRecs.getAttribute("data-tilda-imgoptimoff") ? window.lazy_imgoptimoff = "yes" : window.lazy_imgoptimoff = "";
    for (var elstoSkip = document.querySelectorAll(".t156 .t-img"), i = 0; i < elstoSkip.length; i++)
      elstoSkip[i].setAttribute("data-lazy-rule", "skip");
    var elstoRound = document.querySelectorAll(".t492,.t552,.t251,.t603,.t660,.t661,.t662,.t680,.t827,.t909,.t218,.t740,.t132,.t694,.t762,.t786,.t546");
    Array.prototype.forEach.call(elstoRound, (function(el) {
        var bars = el.querySelectorAll(".t-bgimg");
        Array.prototype.forEach.call(bars, (function(bar) {
            bar.setAttribute("data-lazy-rule", "comm:resize,round:100")
          }
        ))
      }
    )),
      setTimeout((function() {
          window.lazyload_cover = new window.LazyLoad({
            elements_selector: ".t-cover__carrier",
            show_while_loading: !1,
            data_src: "content-cover-bg",
            placeholder: "",
            threshold: 700
          })
        }
      ), 100),
      setTimeout((function() {
          var $;
          if (window.lazyload_img = new window.LazyLoad({
            elements_selector: ".t-img",
            threshold: 800
          }),
            window.lazyload_bgimg = new window.LazyLoad({
              elements_selector: ".t-bgimg",
              show_while_loading: !1,
              placeholder: "",
              threshold: 800
            }),
            window.lazyload_iframe = new window.LazyLoad({
              elements_selector: ".t-iframe"
            }),
          window.jQuery && ($ = jQuery)(document).bind("slide.bs.carousel", (function() {
              setTimeout((function() {
                  t_lazyload_update()
                }
              ), 500)
            }
          )),
          /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && document.body && "object" == typeof document.body && document.body.classList) {
            if (document.querySelector(".t-mbfix"))
              return;
            var elmbfix = document.createElement("div");
            elmbfix.classList.add("t-mbfix"),
              document.body.appendChild(elmbfix),
              setTimeout((function() {
                  elmbfix.classList.add("t-mbfix_hide")
                }
              ), 50),
              setTimeout((function() {
                  elmbfix && elmbfix.parentNode && elmbfix.parentNode.removeChild(elmbfix)
                }
              ), 1e3)
          }
        }
      ), 500),
      window.addEventListener("resize", (function() {
          clearTimeout(window.t_lazyload_resize_timerid),
            window.t_lazyload_resize_timerid = setTimeout(t_lazyload__onWindowResize, 1e3)
        }
      )),
      setTimeout((function() {
          "object" == typeof performance && "object" == typeof performance.timing && (window.t_lazyload_domloaded = 1 * window.performance.timing.domContentLoadedEventEnd - 1 * window.performance.timing.navigationStart)
        }
      ), 0)
  }
  function t_lazyload_update() {
    "undefined" != typeof lazyload_cover && window.lazyload_cover.update(),
    "undefined" != typeof lazyload_img && window.lazyload_img.update(),
    "undefined" != typeof lazyload_bgimg && window.lazyload_bgimg.update(),
    "undefined" != typeof lazyload_iframe && window.lazyload_iframe.update()
  }
  function t_lazyload__onWindowResize() {
    if (t_lazyload_update(),
    "yes" !== window.lazy_imgoptimoff) {
      var els = document.querySelectorAll(".t-cover__carrier, .t-bgimg, .t-img");
      Array.prototype.forEach.call(els, (function(elem) {
          window.t_lazyload_updateResize_elem(elem)
        }
      ))
    }
  }
  function t_lazyload__detectwebp() {
    var WebP = new Image;
    WebP.onload = WebP.onerror = function() {
      2 != WebP.height || (window.lazy_webp = "y")
    }
      ,
      WebP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA"
  }
  function t_lazyLoad__appendImgStatToArr(img, startTime) {
    if (void 0 !== navigator.sendBeacon) {
      var now = (new Date).getTime()
        , imgSrc = img.getAttribute("src");
      if (imgSrc) {
        var imgLoadingTime = {
          time: now - startTime
        };
        0 === imgSrc.indexOf("https://" + t_lazyload__getThumbDomainName()) && (imgLoadingTime.th = "y"),
        0 === imgSrc.indexOf("https://static.tildacdn") && (imgLoadingTime.st = "y"),
        (imgLoadingTime.th || imgLoadingTime.st) && window.t_loadImgStats.push(imgLoadingTime)
      }
    }
  }
  function t_lazyload__ping(type) {
    var domain = "https://" + type + ".tildacdn.com";
    if ("static" == type) {
      var cs = document.currentScript;
      if ("object" == typeof cs && "string" == typeof cs.src && 0 === cs.src.indexOf(domain))
        return;
      if (null === document.head.querySelector('script[src^="' + domain + '"]'))
        return
    }
    var img = new Image;
    img.src = domain + "/pixel.png",
      img.onload = function() {
        window["lazy_ok_" + type] = "y"
      }
      ,
      setTimeout((function() {
          if ("y" !== window["lazy_ok_" + type]) {
            window["lazy_err_" + type] = "y",
              console.log(type + " ping error");
            var els = document.querySelectorAll(".loading");
            Array.prototype.forEach.call(els, (function(el) {
                var src = "";
                src = el.lazy_loading_src,
                "string" == typeof str && 0 === src.indexOf(domain) && (el.classList.remove("loading"),
                  el.wasProcessed = !1)
              }
            )),
              t_lazyload_update()
          }
        }
      ), 1e4)
  }
  function t_lazyload__getThumbDomainName() {
    return "optim.tildacdn"
  }
  !function(root, factory) {
    "function" == typeof define && define.amd ? define([], factory) : "object" == typeof exports ? module.exports = factory() : root.LazyLoad = factory()
  }(this, (function() {
      var _defaultSettings, _supportsClassList, _isInitialized = !1, _popularResolutions, _popularResolutionsOther, _supportsObserver = !1, _staticUrlRegex = /\/static\.tildacdn\.(info|.{1,3})\//, _staticUrlReplaces = {};
      function _init() {
        _isInitialized || (_defaultSettings = {
          elements_selector: "img",
          container: window,
          threshold: 300,
          throttle: 50,
          data_src: "original",
          data_srcset: "original-set",
          class_loading: "loading",
          class_loaded: "loaded",
          skip_invisible: !0,
          show_while_loading: !0,
          callback_load: null,
          callback_error: null,
          callback_set: null,
          callback_processed: null,
          placeholder: "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
        },
        document.body && "object" == typeof document.body && (_supportsClassList = !!document.body.classList),
          _supportsObserver = "IntersectionObserver"in window,
          _isInitialized = !0,
          _popularResolutions = ["200x151", "640x712", "320x356", "670x744", "335x372", "300x225", "500x375", "400x301", "748x832", "374x416", "670x502", "335x251", "360x234", "560x622", "280x311", "640x416"],
          _popularResolutionsOther = ["353x245", "155x151", "158x164", "372x495", "280x272", "117x117", "291x280", "280x269", "335x241", "283x283", "150x156", "353x233", "414x730", "372x362", "275x206", "290x322", "248x207", "177x136", "173x173", "280x308", "195x214", "248x191", "155x196", "163x203", "320x444", "158x162", "176x203", "412x700", "360x88", "360x616", "167x167", "130x144", "280x233", "560x314", "320x299", "372x275", "320x178", "372x242", "360x352", "353x294", "260x182", "372x310", "335x344", "374x432", "414x500", "374x360", "220x338", "150x146", "335x239", "176x176", "320x302", "374x260", "360x568", "191x221", "192x192", "372x558", "335x188", "320x358", "335x258", "374x575", "26x26", "353x360", "360x206", "335x248", "335x322", "167x256", "560x364", "155x172", "163x216", "163x181", "360x257", "374x561", "374x243", "220x212", "177x148", "291x324", "167x160", "375x749", "335x387", "172x172", "260x302", "414x700", "220x254", "177x172", "374x519", "176x169", "320x352", "335x233", "150x203", "360x207", "158x121", "360x396", "158x131", "150x98", "220x169", "182x202", "320x179", "372x413", "181x226", "353x200", "158x153", "375x628", "176x271", "374x364", "320x492", "374x247", "414x833", "353x393", "335x218", "560x399", "412x264", "293x164", "56x56", "177x204", "248x382", "181x181", "118x118", "260x346", "374x497", "260x202", "393x251", "158x158", "372x200", "373x414", "320x229", "177x177", "312x175", "374x312", "84x84", "320x329", "177x194", "353x350", "335x503", "335x446", "335x326", "374x200", "158x182", "320x237", "335x221", "176x196", "150x229", "320x224", "248x276", "360x299", "260x289", "196x216", "335x279", "177x272", "320x426", "260x172", "155x194", "320x369", "372x350", "360x302", "360x402", "169x186", "158x242", "173x199", "167x185", "360x238", "220x123", "320x308", "414x265", "374x350", "300x333", "177x170", "320x222", "320x311", "260x169", "150x173", "320x246", "353x265", "192x222", "158x151", "372x414", "150x144", "760x502", "314x176", "320x208", "182x182", "320x211", "163x163", "372x279", "360x202", "360x252", "260x252", "260x286", "353x392", "160x104", "374x281", "353x353", "150x231", "320x267", "372x372", "177x197", "275x154", "158x175", "374x374", "150x167", "260x146"],
          _staticUrlReplaces = {
            com: "com",
            info: "pub",
            pub: "pub",
            ink: "ink",
            pro: "pro",
            biz: "biz",
            net: "net",
            one: "one"
          })
      }
      function _now() {
        var d;
        return (new Date).getTime()
      }
      function _merge_objects(obj1, obj2) {
        var obj3 = {}, propertyName;
        for (propertyName in obj1)
          Object.prototype.hasOwnProperty.call(obj1, propertyName) && (obj3[propertyName] = obj1[propertyName]);
        for (propertyName in obj2)
          Object.prototype.hasOwnProperty.call(obj2, propertyName) && (obj3[propertyName] = obj2[propertyName]);
        return obj3
      }
      function _convertToArray(nodeSet) {
        var elsArray;
        try {
          elsArray = Array.prototype.slice.call(nodeSet)
        } catch (e) {
          var array = [], i, l = nodeSet.length;
          for (i = 0; i < l; i++)
            array.push(nodeSet[i]);
          elsArray = array
        }
        return elsArray.forEach((function(element) {
            element.isSkipByPosition = null === element.offsetParent && !1 === _isExist(_getParent(element, "t396__carrier-wrapper")) && "fixed" !== element.getAttribute("data-content-cover-parallax");
            var elRec = _getParent(element, "t-rec");
            _isExist(elRec) && (element.isNotUnderScreenRange = !1 === elRec.hasAttribute("data-screen-max") && !1 === elRec.hasAttribute("data-screen-min"))
          }
        )),
          elsArray
      }
      function _addClass(element, className) {
        _supportsClassList ? element.classList.add(className) : element.className += (element.className ? " " : "") + className
      }
      function _removeClass(element, className) {
        _supportsClassList ? element.classList.remove(className) : element.className = element.className.replace(new RegExp("(^|\\s+)" + className + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, "")
      }
      function _hasClass(element, className) {
        return _supportsClassList ? element.classList.contains(className) : new RegExp(" " + className + " ").test(" " + element.className + " ")
      }
      function _getParent(element, className) {
        for (var p = element.parentNode; p && p !== document; ) {
          if (!0 === _hasClass(p, className))
            return p;
          p = p.parentNode
        }
        return null
      }
      function _isExist(element) {
        return null != element
      }
      function _getOffset(element) {
        var rect = element.getBoundingClientRect();
        return {
          top: rect.top + document.body.scrollTop,
          left: rect.left + document.body.scrollLeft
        }
      }
      function _isStaticUrl(url) {
        return _staticUrlRegex.test(url)
      }
      function _getThumbUrl(staticUrl) {
        return staticUrl.replace(_staticUrlRegex, (function(_, domain) {
            return "/" + t_lazyload__getThumbDomainName() + "." + (_staticUrlReplaces[domain] || "com") + "/"
          }
        ))
      }
      function _setSources(target, source, srcsetDataAttribute, srcDataAttribute) {
        var src = source.getAttribute("data-" + srcDataAttribute);
        if (src) {
          var width = source.clientWidth, height = source.clientHeight, wrp, wrp;
          if ((_hasClass(source, "t-slds__bgimg") || _hasClass(source, "t-slds__img")) && !_hasClass(source, "t827__image"))
            (wrp = _getParent(source, "t-slds__wrapper")) || (wrp = _getParent(source, "t-slds__container")),
            !1 === _isExist(wrp) && (wrp = _getParent(source, "t-slds__thumbsbullet")),
            _isExist(wrp) && (width = wrp.clientWidth,
              height = wrp.clientHeight);
          if (_hasClass(source, "tn-atom") && _hasClass(source, "t-bgimg"))
            if (_isExist(wrp = _getParent(source, "tn-atom__scale-wrapper"))) {
              var rect = wrp.getBoundingClientRect(), foo;
              width = (foo = t_lazyload__round("round", rect.width, rect.height, 10))[0],
                height = foo[1]
            }
          var x = "", y = "", bgsize = "", bgatt = "", comm = "", rule = "", round = 1, doo = !0, skip = !1, foo;
          if ("yes" == window.lazy_imgoptimoff && (doo = !1),
          "y" !== window.lazy_err_thumb && "y" !== window.lazy_err_static || (doo = !1),
          "IMG" === source.tagName)
            comm = "resize";
          else if ("undefined" != typeof getComputedStyle) {
            var sourceStyles = getComputedStyle(source), bgPos = sourceStyles.backgroundPosition, foo;
            if (bgPos)
              "50%" == (x = (foo = bgPos.split(" "))[0]) ? x = "center" : "0%" == x ? x = "left" : "100%" == x && (x = "right"),
                "50%" == (y = foo[1]) ? y = "center" : "0%" == y ? y = "top" : "100%" == y && (y = "bottom");
            comm = "contain" == (bgsize = sourceStyles.backgroundSize) ? "contain" : "cover",
            "fixed" == (bgatt = sourceStyles.backgroundAttachment) && (skip = !0)
          } else
            skip = !0;
          if (rule = source.getAttribute("data-lazy-rule")) {
            var a = rule.split(","), i;
            for (i = 0; i < a.length; i++)
              a[i].indexOf("round:") > -1 && (round = 1 * a[i].split(":")[1]),
              a[i].indexOf("comm:") > -1 && "resize" != (comm = a[i].split(":")[1]) && "cover" != comm && "contain" != comm && (doo = !1),
              a[i].indexOf("skip") > -1 && (skip = !0),
              a[i].indexOf("optimoff") > -1 && (doo = !1)
          }
          if (round > 1)
            width = (foo = t_lazyload__round(comm, width, height, round))[0],
              height = foo[1];
          if ("cover" == comm && width > 0 && height > 0 && width <= 1e3)
            if (width === 5 * Math.ceil(width / 5) && height === 5 * Math.ceil(height / 5))
              ;
            else if (_popularResolutions.indexOf(width + "x" + height) > -1)
              ;
            else if (_popularResolutionsOther.indexOf(width + "x" + height) > -1)
              ;
            else if (_hasClass(source, "tn-atom") || _hasClass(source, "tn-atom__img"))
              ;
            else {
              var foo;
              _hasClass(source, "t-cover__carrier") || (comm = "resize"),
                width = (foo = t_lazyload__round(comm, width, height, 100))[0],
                height = foo[1]
            }
          if ("resize" == comm && width < 30 && (skip = !0),
          !0 === doo && (src = !0 === skip || width > 1e3 || height > 1e3 || 0 == width || "IMG" != source.tagName && 0 == height ? t_lazyload__getWebPUrl(src) : t_lazyload__getResizeUrl(source.tagName, comm, src, width, height, x, y, bgsize)),
          "y" === window.lazy_err_static && _isStaticUrl(src) && (src = src.replace(_staticUrlRegex, "/static3.tildacdn.com/")),
            src) {
            if ("IMG" === target.tagName)
              target.setAttribute("src", src);
            else if ("IFRAME" === target.tagName)
              target.setAttribute("src", src);
            else if ("OBJECT" === target.tagName)
              target.setAttribute("data", src);
            else {
              var gradient, split;
              if (-1 !== target.style.backgroundImage.indexOf("-gradient("))
                gradient = target.style.backgroundImage.split("), ")[1];
              gradient ? target.style.backgroundImage = "url(" + src + "), " + gradient : (target.style.backgroundImage = "url(" + src + ")",
                t_lazyload__checkParentBackground(target, src))
            }
            source.lazy_loading_src = src
          }
        } else
          _removeClass(source, "loading")
      }
      function t_lazyload__checkParentBackground(el, imageUrl) {
        var coverId = el.getAttribute("data-content-cover-id");
        if (coverId) {
          var srcType = imageUrl.split(".");
          srcType = srcType[srcType.length - 1];
          var parentEl = document.getElementById("recorddiv" + coverId);
          "svg" === srcType && (parentEl.style.backgroundImage = "")
        }
      }
      function t_lazyload__round(comm, width, height, round) {
        if ("cover" == comm && width > 0 && height > 0) {
          var rr = width / height
            , ratio = 1;
          rr <= 1 ? (rr <= .8 && (ratio = .8),
          rr <= .751 && (ratio = .75),
          rr <= .667 && (ratio = .667),
          rr <= .563 && (ratio = .562),
          rr <= .501 && (ratio = .5),
            height = Math.ceil(height / round) * round,
            width = Math.ceil(height * ratio),
            width = 10 * Math.ceil(width / 10)) : (rr >= 1.25 && (ratio = 1.25),
          rr >= 1.332 && (ratio = 1.333),
          rr >= 1.5 && (ratio = 1.5),
          rr >= 1.777 && (ratio = 1.777),
          rr >= 2 && (ratio = 2),
            width = Math.ceil(width / round) * round,
            height = Math.ceil(width / ratio),
            height = 10 * Math.ceil(height / 10))
        } else
          width > 0 && (width = Math.ceil(width / round) * round),
          height > 0 && (height = Math.ceil(height / round) * round);
        return [width, height]
      }
      function t_lazyload__getResizeUrl(tagName, comm, str, width, height, x, y) {
        if ("undefined" == str || null == str)
          return str;
        if (str.indexOf(".svg") > 0 || str.indexOf(".gif") > 0 || str.indexOf(".ico") > 0 || -1 === str.indexOf("static.tildacdn.") || str.indexOf("-/empty/") > 0 || str.indexOf("-/resizeb/") > 0)
          return str;
        if (str.indexOf("/-/") > -1)
          return str;
        if (0 == width && 0 == height)
          return str;
        if ("y" == window.lazy_err_thumb)
          return str;
        if (str.indexOf("lib") > -1)
          return str;
        if ("IMG" !== tagName && "DIV" !== tagName && "TD" !== tagName && "A" !== tagName)
          return str;
        var k = 1, newstr;
        if (1 === window.devicePixelRatio && Math.max(width, height) <= 400 && (k = 1.2),
        window.devicePixelRatio > 1 && (k = 2),
        width > 0 && (width = parseInt(k * width)),
        height > 0 && (height = parseInt(k * height)),
        width > 1e3 || height > 1800)
          return newstr = t_lazyload__getWebPUrl(str);
        if ("resize" == comm) {
          var arrr;
          (arrr = str.split("/")).splice(str.split("/").length - 1, 0, "-/resize/" + width + "x" + ("DIV" == tagName && height > 0 ? height : "") + "/" + ("y" == window.lazy_webp ? "-/format/webp" : ""));
          var newstr = _getThumbUrl(arrr.join("/"))
        } else {
          if (width <= 0 && height <= 0)
            return str;
          var arrr;
          "left" !== x && "right" !== x && (x = "center"),
          "top" !== y && "bottom" !== y && (y = "center"),
            (arrr = str.split("/")).splice(str.split("/").length - 1, 0, "-/" + comm + "/" + width + "x" + height + "/" + x + "/" + y + "/" + ("y" == window.lazy_webp ? "-/format/webp" : ""));
          var newstr = _getThumbUrl(arrr.join("/"))
        }
        return newstr
      }
      function t_lazyload__getWebPUrl(str) {
        if ("undefined" == str || null == str)
          return str;
        if (str.indexOf(".svg") > 0 || str.indexOf(".gif") > 0 || str.indexOf(".ico") > 0 || -1 === str.indexOf("static.tildacdn.") || str.indexOf("-/empty/") > 0 || str.indexOf("-/resizeb/") > 0)
          return str;
        if (str.indexOf("/-/") > -1)
          return str;
        if (str.indexOf("lib") > -1)
          return str;
        if ("y" !== window.lazy_webp)
          return str;
        if ("y" === window.lazy_err_thumb)
          return str;
        var arrr = str.split("/"), newstr;
        return arrr.splice(str.split("/").length - 1, 0, "-/format/webp"),
          _getThumbUrl(arrr.join("/"))
      }
      function t_lazyload__reloadonError(element, src, startTime) {
        if ("string" == typeof src && null != src && "" != src) {
          var newsrc;
          if (console.log("lazy loading err"),
            _isStaticUrl(src))
            return window.lazy_err_static = "y",
              void t_lazyload__reloadonError__reload(element, newsrc = src.replace(_staticUrlRegex, "/static3.tildacdn.com/"));
          if (-1 !== src.indexOf(t_lazyload__getThumbDomainName()) && -1 !== src.indexOf("/-/")) {
            window.lazy_err_thumb = "y";
            var arrr = src.split("/"), uid = "", name = "", newsrc;
            if (arrr.length > 3)
              for (var i = 0; i < arrr.length; i++)
                "" !== arrr[i] && ("til" == arrr[i].substring(0, 3) && 36 == arrr[i].length && 4 == (arrr[i].match(/-/g) || []).length && (uid = arrr[i]),
                i == arrr.length - 1 && (name = arrr[i]));
            if ("" !== uid && "" !== name)
              t_lazyload__reloadonError__reload(element, newsrc = "https://static3.tildacdn.com/" + uid + "/" + name);
            if ("function" != typeof t_errors__sendCDNErrors) {
              var s = document.createElement("script");
              s.src = "https://static.tildacdn.com/js/tilda-errors-1.0.min.js",
                s.type = "text/javascript",
                s.async = !0,
                document.body.appendChild(s)
            }
            var qTime = startTime > 1 ? _now() - startTime : "";
            "object" != typeof window.t_cdnerrors && (window.t_cdnerrors = []),
              window.t_cdnerrors.push({
                url: src,
                time: qTime,
                debug: {
                  domloaded: window.t_lazyload_domloaded
                }
              })
          }
        }
      }
      function t_lazyload__reloadonError__reload(element, src) {
        console.log("try reload: " + src),
          "IMG" === element.tagName ? src && element.setAttribute("src", src) : src && (element.style.backgroundImage = "url(" + src + ")")
      }
      function LazyLoad(instanceSettings) {
        _init(),
          this._settings = _merge_objects(_defaultSettings, instanceSettings),
          this._queryOriginNode = this._settings.container === window ? document : this._settings.container,
          this._previousLoopTime = 0,
          this._loopTimeout = null,
        _supportsObserver && this._initializeObserver(),
          this.update(),
          this.loadAnimatedImages()
      }
      return LazyLoad.prototype._showOnLoad = function(element) {
        var fakeImg, settings = this._settings, startTime;
        function loadCallback() {
          null !== settings && (t_lazyLoad__appendImgStatToArr(fakeImg, startTime),
          settings.callback_load && settings.callback_load(element),
            _setSources(element, element, settings.data_srcset, settings.data_src),
          settings.callback_set && settings.callback_set(element),
            _removeClass(element, settings.class_loading),
            _addClass(element, settings.class_loaded),
            fakeImg.removeEventListener("load", loadCallback))
        }
        !element.getAttribute("src") && settings.placeholder && element.setAttribute("src", settings.placeholder),
          (fakeImg = document.createElement("img")).addEventListener("load", loadCallback),
          fakeImg.addEventListener("error", (function(ev) {
              _removeClass(element, settings.class_loading),
              settings.callback_error && settings.callback_error(element),
                void 0 !== ev.path ? t_lazyload__reloadonError(element, ev.path[0].currentSrc, startTime) : void 0 !== ev.target && t_lazyload__reloadonError(element, ev.target.currentSrc, startTime)
            }
          )),
          _addClass(element, settings.class_loading),
          startTime = _now(),
          _setSources(fakeImg, element, settings.data_srcset, settings.data_src)
      }
        ,
        LazyLoad.prototype._showOnAppear = function(element) {
          var settings = this._settings, startTime;
          function loadCallback() {
            null !== settings && (t_lazyLoad__appendImgStatToArr(element, startTime),
            settings.callback_load && settings.callback_load(element),
              _removeClass(element, settings.class_loading),
              _addClass(element, settings.class_loaded),
              element.removeEventListener("load", loadCallback))
          }
          "IMG" !== element.tagName && "IFRAME" !== element.tagName || (element.addEventListener("load", loadCallback),
            element.addEventListener("error", (function(ev) {
                element.removeEventListener("load", loadCallback),
                  _removeClass(element, settings.class_loading),
                settings.callback_error && settings.callback_error(element),
                  void 0 !== ev.path ? t_lazyload__reloadonError(element, ev.path[0].currentSrc, startTime) : void 0 !== ev.target && t_lazyload__reloadonError(element, ev.target.currentSrc, startTime)
              }
            )),
            _addClass(element, settings.class_loading)),
            startTime = _now(),
            _setSources(element, element, settings.data_srcset, settings.data_src),
          settings.callback_set && settings.callback_set(element)
        }
        ,
        LazyLoad.prototype._show = function(element) {
          this._settings.show_while_loading ? this._showOnAppear(element) : this._showOnLoad(element)
        }
        ,
        LazyLoad.prototype._initializeObserver = function() {
          var self = this;
          this._intersectionObserver = new IntersectionObserver((function(entries) {
              var scrollY = window.scrollY;
              entries.forEach((function(entry) {
                  var element = entry.target;
                  if (!(self._settings.skip_invisible && element.isSkipByPosition && element.isNotUnderScreenRange)) {
                    var isAboveViewport = entry.boundingClientRect.top + scrollY < 0
                      , parentZeroElem = element.closest(".t396__elem")
                      , isAboveInnerViewport = parentZeroElem && 0 === parentZeroElem.style.top.indexOf("-");
                    if (element.wasProcessed)
                      return self._intersectionObserver.unobserve(element),
                        void (self._settings.callback_processed && self._settings.callback_processed(self._elements.length));
                    (entry.isIntersecting || isAboveViewport || isAboveInnerViewport) && (self._show(element),
                      element.wasProcessed = !0)
                  }
                }
              ))
            }
          ),{
            rootMargin: this._settings.threshold + "px",
            threshold: [0]
          })
        }
        ,
        LazyLoad.prototype.loadAnimatedImages = function() {
          var i, element, settings = this._settings, elements = this._elements, elementsLength = elements ? elements.length : 0;
          function getTriggerElementOffset(element, type) {
            var trgEl;
            if ("trigger" === type) {
              var trgId = element.getAttribute("data-animate-sbs-trgels");
              trgId && (trgEl = document.querySelector('[data-elem-id="' + trgId + '"]'))
            } else
              "viewport" === type && (trgEl = _getParent(element, "t396"));
            return _isExist(trgEl) ? _getOffset(trgEl) : null
          }
          function isFarAway(element, type) {
            var trgOffset = getTriggerElementOffset(element, type);
            if (!trgOffset)
              return !1;
            var elemOffset = _getOffset(element)
              , distanceTopBottomBetween = Math.abs(trgOffset.top - elemOffset.top)
              , distanceRightLeftBetween = Math.abs(trgOffset.left - elemOffset.left);
            return distanceTopBottomBetween > settings.threshold || distanceRightLeftBetween > settings.threshold
          }
          for (i = 0; i < elementsLength; i++)
            if (_hasClass(element = elements[i], "tn-atom__img") || _hasClass(element, "tn-atom")) {
              var elContainer = _getParent(element, "tn-elem"), isAnimated = elContainer.getAttribute("data-animate-sbs-opts"), animEvent = elContainer.getAttribute("data-animate-sbs-event"), animTrgEls, animType;
              "intoview" !== animEvent && "blockintoview" !== animEvent || (animType = "viewport"),
              elContainer.getAttribute("data-animate-sbs-trgels") || (animType = "trigger"),
              settings.skip_invisible && null === element.offsetParent || !isAnimated || isFarAway(elContainer, animType) && (settings.show_while_loading ? this._showOnAppear(element) : this._showOnLoad(element),
                element.wasProcessed = !0,
              settings.callback_processed && settings.callback_processed(elements.length))
            }
        }
        ,
        LazyLoad.prototype.update = function() {
          var self = this;
          if (this._elements = _convertToArray(this._queryOriginNode.querySelectorAll(this._settings.elements_selector)),
          _supportsObserver && this._intersectionObserver)
            return this._intersectionObserver.disconnect(),
              this._elements.forEach((function(element) {
                  self._intersectionObserver.observe(element)
                }
              ));
          this._elements.forEach((function(element) {
              self._show(element),
              self._settings.callback_processed && self._settings.callback_processed(self._elements.length),
                element.wasProcessed = !0
            }
          ))
        }
        ,
        LazyLoad.prototype.destroy = function() {
          this._intersectionObserver.disconnect(),
            this._elements = null,
            this._queryOriginNode = null,
            this._settings = null
        }
        ,
        LazyLoad
    }
  )),
    window.lazy = "y",
    "loading" != document.readyState ? t_lazyload__init() : document.addEventListener("DOMContentLoaded", t_lazyload__init),
    window.t_lazyload_updateResize_elem = function(elem) {
      if (window.jQuery && elem instanceof jQuery) {
        if (0 == elem.length)
          return;
        elem = elem.get(0)
      }
      if (null != elem) {
        var tagName = elem.tagName;
        if ("IMG" == tagName)
          var str = elem.getAttribute("src")
            , prefix = "-/resize/";
        else if ("undefined" != typeof getComputedStyle) {
          var elemStyles = getComputedStyle(elem)
            , str = elemStyles.backgroundImage.replace("url(", "").replace(")", "").replace(/"/gi, "");
          if ("contain" === elemStyles.backgroundSize)
            var prefix = "-/contain/";
          else
            var prefix = "-/cover/"
        } else
          var prefix = "-/cover/";
        if (!(null == str || -1 === str.indexOf(prefix) || str.indexOf(".svg") > 0 || str.indexOf(".gif") > 0 || str.indexOf(".ico") > 0 || -1 === str.indexOf(t_lazyload__getThumbDomainName()) || str.indexOf("-/empty/") > 0 && str.indexOf("-/resizeb/") > 0)) {
          var pos = str.indexOf(prefix) + prefix.length
            , pos2 = str.indexOf("/", pos);
          if (pos > 0 && pos2 > 0) {
            var modWH = str.slice(pos, pos2).split("x")
              , width = elem.clientWidth
              , height = elem.clientHeight;
            if (width > 0 && height > 0 && (modWH[0] > 0 || modWH[1] > 0) && (modWH[0] > 0 && width > modWH[0] || modWH[1] > 0 && height > modWH[1]) && (modWH[0] > 0 && width - modWH[0] > 100 || modWH[1] > 0 && height - modWH[1] > 100)) {
              var newstr = str.slice(0, pos) + (modWH[0] > 0 ? width : "") + "x" + (modWH[1] > 0 ? height : "") + str.substring(pos2);
              "IMG" == tagName ? elem.setAttribute("src", newstr) : elem.style.backgroundImage = "url('" + newstr + "')"
            }
          }
        }
      }
    }
    ,
    window.t_loadImgStats = [];
  function t_popup__trapFocus(t) {
    var t = t.querySelectorAll('a, button, input:not([type="hidden"]):not(.js-form-spec-comments), select, textarea, embed, video, iframe, [tabindex="0"]')
      , e = t[0]
      , o = t[t.length - 1];
    document.addEventListener("keydown", function(t) {
      !document.body.classList.contains("t-body_popupshowed") || "Tab" !== t.key && 9 !== t.keyCode || (t.shiftKey && document.activeElement.classList.contains("t-popup_show") && o.focus(),
      "Tab" !== t.key || t.shiftKey || document.activeElement !== o || (t.preventDefault(),
        e.focus()),
      "Tab" === t.key && t.shiftKey && document.activeElement === e && (t.preventDefault(),
        o.focus()))
    })
  }
  function t_popup__addAttributesForAccessibility(t) {
    t = document.querySelectorAll('a[href="' + t + '"]');
    Array.prototype.forEach.call(t, function(t) {
      t && (t.setAttribute("role", "button"),
        t.setAttribute("aria-haspopup", "dialog"))
    })
  }
  function t_popup__resizePopup(t) {
    var e, o, p, n, t = document.getElementById("rec" + t);
    !t || (e = t.querySelector(".t-popup__container")) && (p = getComputedStyle(e, null),
      o = parseInt(p.paddingTop) || 0,
      p = parseInt(p.paddingBottom) || 0,
      o = e.clientHeight - (o + p),
      p = 120,
      t = 1093 === (n = Number(t.getAttribute("data-record-type"))) || 121 === n && t.querySelector(".t1093"),
    364 !== n && 365 !== n || (p = 30),
    868 !== n && 331 !== n && 358 !== n && 1013 !== n && 746 !== n && !t || (p = 0),
      o > window.innerHeight - p ? e.classList.add("t-popup__container-static") : e.classList.remove("t-popup__container-static"))
  }
  function t_popup__showPopup(e) {
    e && (e.style.display = "block"),
      setTimeout(function() {
        e.focus();
        var t = e ? e.querySelector(".t-popup__container") : null;
        t && t.classList.add("t-popup__container-animated"),
        e && e.classList.add("t-popup_show"),
          t_onFuncLoad("t_popup__trapFocus", function() {
            t_popup__trapFocus(e)
          })
      }, 50)
  }
  function t_popup__addClassOnTriggerButton(t, e) {
    var o = document.querySelectorAll(".t-popup__triggered-btn");
    Array.prototype.forEach.call(o, function(t) {
      t.classList.remove("t-popup__triggered-btn")
    }),
      t.addEventListener("keydown", function(t) {
        13 === t.keyCode && (t = !!(t = t.target).closest('a[href="' + e + '"]') && t) && !window.isMobile && t.classList.add("t-popup__triggered-btn")
      })
  }
  function t_popup__addFocusOnTriggerButton() {
    var t = document.querySelector(".t-popup__triggered-btn");
    t && (t.focus(),
      t.classList.remove("t-popup__triggered-btn"))
  }
  Element.prototype.matches || (Element.prototype.matches = Element.prototype.matchesSelector || Element.prototype.msMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.webkitMatchesSelector || Element.prototype.oMatchesSelector),
  Element.prototype.closest || (Element.prototype.closest = function(t) {
      for (var e = this; e && 1 === e.nodeType; ) {
        if (Element.prototype.matches.call(e, t))
          return e;
        e = e.parentElement || e.parentNode
      }
      return null
    }
  );
  function t_onReady(t) {
    "loading" != document.readyState ? t() : document.addEventListener("DOMContentLoaded", t)
  }
  function t_addClass(t, e) {
    document.body.classList ? t.classList.add(e) : t.className += (t.className ? " " : "") + e
  }
  function t_removeClass(t, e) {
    document.body.classList ? t.classList.remove(e) : t.className = t.className.replace(new RegExp("(^|\\s+)" + e + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, "")
  }
  function t_removeEl(t) {
    t && t.parentNode && t.parentNode.removeChild(t)
  }
  function t_outerWidth(t) {
    var e = getComputedStyle(t)
      , n = e.width
      , i = e.marginLeft
      , o = e.marginRight;
    return "auto" === n && (n = 0),
    "auto" === i && (i = 0),
    "auto" === o && (o = 0),
      n = parseInt(n) + parseInt(i) + parseInt(o)
  }
  var version, version;
  (window.isSearchBot = !1,
  /Bot/i.test(navigator.userAgent) && (window.isSearchBot = !0),
    window.isMobile = !1,
    window.$isMobile = !1,
  /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && (window.isMobile = !0,
    window.$isMobile = !0),
    window.isTablet = /(ipad|tablet|(android(?!.*mobile))|(windows(?!.*phone)(.*touch))|kindle|playbook|silk|(puffin(?!.*(IP|AP|WP))))/i.test(navigator.userAgent),
    window.isiOS = !1,
  /iPhone|iPad|iPod/i.test(navigator.userAgent) && (window.isiOS = !0),
    window.isiOSChrome = !!navigator.userAgent.match("CriOS"),
    window.isFirefox = /firefox/i.test(navigator.userAgent),
    window.isOpera = !!window.opr && !!window.opr.addons || !!window.opera || navigator.userAgent.indexOf(" OPR/") >= 0,
    window.isiOSVersion = "",
    window.isiOS) && (null !== (version = navigator.appVersion.match(/OS (\d+)_(\d+)_?(\d+)?/)) && (window.isiOSVersion = [parseInt(version[1], 10), parseInt(version[2], 10), parseInt(version[3] || 0, 10)]));
  (window.isSafari = !1,
  /^((?!chrome|android).)*safari/i.test(navigator.userAgent) && (window.isSafari = !0),
    window.isIE = !!document.documentMode,
    window.isSafariVersion = "",
    window.isSafari) && (null !== (version = navigator.appVersion.match(/Version\/(\d+)\.(\d+)\.?(\d+)? Safari/)) && (window.isSafariVersion = [parseInt(version[1], 10), parseInt(version[2], 10), parseInt(version[3] || 0, 10)]));
  function t_throttle(t, e, n) {
    var i, o;
    return e || (e = 250),
      function() {
        var r = n || this
          , a = +new Date
          , l = arguments;
        i && a < i + e ? (clearTimeout(o),
          o = setTimeout((function() {
              i = a,
                t.apply(r, l)
            }
          ), e)) : (i = a,
          t.apply(r, l))
      }
  }
  function t_onFuncLoad(t, e, n) {
    var i = 15e3
      , o = t_checkIsEditMode()
      , r = function t() {
      return !o || o && t_checkEditorIsReady()
    }
      , a = function t(e) {
      return "function" == typeof window[e] || "object" == typeof window[e]
    };
    if (a(t) && r())
      e();
    else {
      var l = Date.now()
        , d = new Error(t + " is undefined")
        , s = function t() {
        throw d
      };
      setTimeout((function o() {
          var d = Date.now();
          a(t) && r() ? e() : ("complete" === document.readyState && d - l > i && !a(t) && s(),
            setTimeout(o, n || 100))
        }
      ))
    }
  }
  function t_checkIsEditMode() {
    var t = !1
      , e = document.getElementById("allrecords");
    if (!e)
      return !1;
    var n = e.getAttribute("data-tilda-mode");
    return !!(t = n && "edit" === n)
  }
  function t_checkEditorIsReady() {
    var t = !1;
    if (!t_checkIsEditMode())
      return !1;
    var e = document.body.getAttribute("data-ready-status");
    return !!(t = e && "ready" === e)
  }
  function t_scrollBarWidthCompensator__setObject() {
    window.scrollBarWidthCompensator = {};
    var t = window.scrollBarWidthCompensator;
    t.isInited = !1,
      t.scrollBarWidth = Math.abs(window.innerWidth - document.documentElement.clientWidth),
      t.delay = 0,
      t.cancelTimeout = null;
    var e = ["t450", "t282__container", "t282__container__bg_opened", "t282__menu__container", "t830m", "t830__panel", "t451m", "t204__menu"]
      , n = document.querySelectorAll("*");
    n = Array.prototype.filter.call(n, (function(t) {
        return !t.closest(".t1093") && !e.some((function(e) {
            return t.classList.contains(e)
          }
        ))
      }
    )),
      t.fixedElements = [],
      Array.prototype.forEach.call(n, (function(e) {
          if (!e.classList.contains("t975")) {
            var n = window.getComputedStyle(e)
              , i = n.getPropertyValue("position")
              , o = n.getPropertyValue("width")
              , r = n.getPropertyValue("height")
              , a = "100%" === o || o === window.innerWidth + "px" || o === window.innerWidth - t.scrollBarWidth + "px" || "100vw" === o
              , l = "100%" === r || r === window.innerHeight + "px" || r === window.innerHeight - t.scrollBarWidth + "px" || "auto" === r || "100vh" === r;
            ("fixed" === i || "absolute" === i && a && !l) && t.fixedElements.push({
              el: e,
              computedStyle: n
            })
          }
        }
      ))
  }
  function t_scrollBarWidthCompensator__init() {
    if (!window.isMobile) {
      window.scrollBarWidthCompensator || t_scrollBarWidthCompensator__setObject();
      var t = window.scrollBarWidthCompensator;
      if (t.scrollBarWidth = Math.abs(window.innerWidth - document.documentElement.clientWidth),
      t.cancelTimeout && (window.clearTimeout(t.cancelTimeout),
        t.cancelTimeout = null),
      !t.isInited && t.scrollBarWidth) {
        t.isInited = !0;
        var e = window.getComputedStyle(document.body).getPropertyValue("padding-right");
        e = parseInt(e.replace("px", ""), 10);
        var n = document.body.style.paddingRight;
        n && document.body.setAttribute("data-tilda-initial-padding-right", n),
          document.body.style.paddingRight = t.scrollBarWidth + e + "px",
          document.body.style.height = "100vh",
          document.body.style.minHeight = "100vh",
          document.body.style.overflow = "hidden";
        var i = [];
        Array.prototype.forEach.call(t.fixedElements, (function(e) {
            var n = e.el;
            if (document.body.contains(n) && !n.classList.contains("t975") && !n.classList.contains("t975")) {
              var o = e.computedStyle
                , r = o.getPropertyValue("position");
              if ("fixed" === r || "absolute" === r) {
                var a = o.getPropertyValue("transition-duration");
                a.indexOf("ms") + 1 ? (a = parseInt(a.replace("ms", ""), 10),
                  i.push(a)) : a.indexOf("s") + 1 && (a = 1e3 * parseFloat(a.replace("s", "")),
                  i.push(a));
                var l = o.getPropertyValue("right");
                l = parseInt(l.replace("px", ""), 10);
                var d = o.getPropertyValue("width")
                  , s = o.getPropertyValue("height")
                  , c = n.style.right;
                c && n.setAttribute("data-tilda-initial-right", c);
                var u = n.style.width;
                u && n.setAttribute("data-tilda-initial-width", u);
                var h = "100%" === d || d === window.innerWidth + "px" || d === window.innerWidth - t.scrollBarWidth + "px" || "100vw" === d
                  , m = "100%" === s || s === window.innerHeight + "px" || s === window.innerHeight - t.scrollBarWidth + "px" || "auto" === s || "100vh" === s;
                !l && 0 !== l || "auto" === n.style.right || "absolute" === r || h ? h && !m && (n.style.width = "calc(100vw - " + t.scrollBarWidth + "px)") : n.style.right = t.scrollBarWidth + l + "px"
              }
            }
          }
        )),
        i.length && (t.delay = Math.max.apply(null, i))
      }
    }
  }
  function t_scrollBarWidthCompensator__cancel() {
    var t = window.scrollBarWidthCompensator;
    t && t.isInited && (t.isInited = !1,
      t.delay = 0,
      document.body.hasAttribute("data-tilda-initial-padding-right") ? (document.body.style.paddingRight = document.body.getAttribute("data-tilda-initial-padding-right"),
        document.body.removeAttribute("data-tilda-initial-padding-right")) : document.body.style.removeProperty("padding-right"),
      document.body.style.removeProperty("height"),
      document.body.style.removeProperty("min-height"),
      document.body.style.removeProperty("overflow"),
      Array.prototype.forEach.call(t.fixedElements, (function(t) {
          var e = t.el
            , n = e.classList.contains("tn-atom__sticky-wrapper") || e.classList.contains("tn-atom__sbs-anim-wrapper");
          e.hasAttribute("data-tilda-initial-right") ? (e.style.right = e.getAttribute("data-tilda-initial-right"),
            e.removeAttribute("data-tilda-initial-right")) : e.style.removeProperty("right"),
            e.hasAttribute("data-tilda-initial-width") ? (e.style.width = e.getAttribute("data-tilda-initial-width"),
              e.removeAttribute("data-tilda-initial-width")) : (e.style.removeProperty("width"),
            n && (e.style.width = "inherit"))
        }
      )))
  }
  function t_triggerEvent(t, e) {
    var n;
    document.createEvent ? (n = document.createEvent("HTMLEvents")).initEvent(e, !0, !1) : document.createEventObject && ((n = document.createEventObject()).eventType = e),
      n.eventName = e,
      t.dispatchEvent ? t.dispatchEvent(n) : t.fireEvent ? t.fireEvent("on" + n.eventType, n) : t[e] ? t[e]() : t["on" + e] && t["on" + e]()
  }
  function t_loadJsFile(t, e) {
    if (document.querySelector('script[src^="' + t + '"]'))
      e && e();
    else {
      var n = document.createElement("script");
      n.type = "text/javascript",
        n.src = t,
      e && n.addEventListener("load", e),
        n.addEventListener("error", (function(t) {
            console.log("Upload script error: " + t)
          }
        )),
        document.head.appendChild(n)
    }
  }
  function t_loadCSSFile(t, e) {
    if (document.querySelector('link[href^="' + t + '"]'))
      e && e();
    else {
      var n = document.createElement("link");
      n.rel = "stylesheet",
        n.type = "text/css",
        n.media = "all",
        n.href = t,
        n.crossOrigin = "anonymous",
      e && n.addEventListener("load", e),
        n.addEventListener("error", (function(t) {
            console.log("Upload style error: " + t)
          }
        )),
        document.head.appendChild(n)
    }
  }
  function t_scrollTo(t, e) {
    if (t) {
      var n = e || {}
        , i = n.useNativeScrollTo
        , o = n.duration
        , r = n.behavior
        , a = void 0 === r ? "instant" : r
        , l = n.offset
        , d = void 0 === l ? 0 : l
        , s = Math.max(parseInt(t.getBoundingClientRect().top + window.scrollY - d, 10), 0);
      i || "instant" === a ? window.scrollTo({
        left: 0,
        top: s,
        behavior: a
      }) : t_smoothScrollTo(s, o)
    }
  }
  function t_smoothScrollTo(t, e) {
    void 0 === e && (e = 500);
    var n = document.body
      , i = window.scrollY || window.pageYOffset
      , o = t - i
      , r = performance.now();
    function a(t) {
      return Math.pow(t, 2)
    }
    function l() {
      var d = performance.now()
        , s = Math.min((d - r) / e, 1)
        , c = a(s);
      window.scrollTo(0, i + o * c),
        s < 1 ? requestAnimationFrame(l) : (n.removeAttribute("data-scroll"),
          n.removeAttribute("data-scrollable"),
          window.scrollTo(0, t))
    }
    n.setAttribute("data-scroll", "true"),
      n.setAttribute("data-scrollable", "true"),
      requestAnimationFrame(l)
  }
  window.browserLang = (window.navigator.userLanguage || window.navigator.language).toUpperCase().slice(0, 2),
    window.tildaBrowserLang = window.browserLang,
    t_onReady((function() {
        var t = document.getElementById("allrecords");
        if (t)
          var e = t.getAttribute("data-tilda-project-lang");
        e && (window.browserLang = e)
      }
    )),
    t_onReady((function() {
        var t = window.navigator.userAgent, e = -1 !== t.indexOf("Instagram"), n = -1 !== t.indexOf("FBAV"), i = -1 !== t.indexOf("YaSearchBrowser"), o = -1 !== t.indexOf("SamsungBrowser"), r = -1 !== t.indexOf("DuckDuckGo"), a;
        if (-1 !== t.indexOf("Android") && (n || e || i || o || r)) {
          var l = document.createElement("p");
          l.style.lineHeight = "100px",
            l.style.padding = "0",
            l.style.margin = "0",
            l.style.height = "auto",
            l.style.position = "absolute",
            l.style.opacity = "0.001",
            l.innerText = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",
            document.body.appendChild(l);
          var d = 100 / l.getBoundingClientRect().height;
          l.parentNode.removeChild(l),
          d < .98 && document.body.insertAdjacentHTML("beforeend", '<style>.t396 [data-elem-type="text"] .tn-atom {zoom: ' + 100 * d + "%;}</style>")
        }
        window.isiOS && !window.MSStream && (document.body.style.setProperty("-webkit-text-size-adjust", "100%"),
          document.body.style.setProperty("text-size-adjust", "100%"))
      }
    )),
    t_onReady((function() {
        setTimeout((function() {
            var t = document.querySelector("html")
              , e = document.querySelector(".t-tildalabel")
              , n = t.offsetHeight;
            if (document.body && (n = Math.max(document.body.scrollHeight, document.body.offsetHeight, document.body.clientHeight, t.offsetHeight)),
            (document.getElementById("tildacopy") || e) && e.querySelectorAll("div"))
              n + 70 > window.innerHeight && e && e.setAttribute("style", "display: block !important; visibility: visible !important; position: relative !important; width: 100% !important; pointer-events: all !important; opacity: 1 !important; margin: 0 !important; z-index: 1 !important");
            else {
              for (var i = document.body.childNodes, o = [], r = 0; r < i.length; r++) {
                var a = i[r];
                8 === a.nodeType && o.push(a)
              }
              for (var r = 0; r < o.length; r++)
                -1 !== o[r].nodeValue.indexOf("'t remove this l") && document.getElementById("allrecords").insertAdjacentHTML("afterend", '<div class="t-tildalabel t-tildalabel-free" style="display: block !important; visibility: visible !important; position: relative !important; width: 100% !important; pointer-events: all !important; opacity: 1 !important; margin: 0 !important; z-index: 99900 !important"><div class="t-tildalabel-free__main"><a href="https://tilda.cc" target="_blank" style="padding-bottom:12px; display: block;"><img style="width:40px;" src="https://static.tildacdn.com/img/tildacopy.png"></a><div style="padding-bottom: 15px;">This site was made on <a href="https://tilda.cc" target="_blank" style="text-decoration: none; color:inherit;">Tilda — a website builder</a> that helps to&nbsp;create a&nbsp;website without any code</div><a href="https://tilda.cc/registration/" target="_blank" style="display: inline-block; padding: 10px 20px; font-size: 13px; border-radius: 50px; background-color: #fa8669; color: #fff; text-decoration: none;">Create a website</a></div><div class="t-tildalabel-free__links-wr"><a class="t-tildalabel-free__txt-link" href="https://help' + ("RU" === window.browserLang ? "-ru" : "") + '.tilda.cc/white-label" target="_blank">' + ("RU" === window.browserLang ? "Как удалить этот лейбл" : "How to remove this block") + "?</a></div></div>")
            }
          }
        ), 500)
      }
    )),
    t_onReady((function() {
        var t = document.getElementById("allrecords");
        if (!window.isMobile && t && "yes" !== t.getAttribute("data-blocks-animationoff") && !1 === window.isSearchBot) {
          for (var e = document.querySelectorAll(".r"), n = 0; n < e.length; n++) {
            var i, o = (i = e[n]).getAttribute("style");
            o && -1 !== o.indexOf("background-color") && i.setAttribute("data-animationappear", "off")
          }
          for (var r = Array.prototype.slice.call(e).filter((function(t) {
              return !t.getAttribute("data-animationappear") && !t.getAttribute("data-screen-min") && !t.getAttribute("data-screen-max")
            }
          )), n = 0; n < r.length; n++) {
            var i, a = (i = r[n]).getBoundingClientRect().top + window.pageYOffset, l = window.pageYOffset + window.innerHeight + 300;
            t_addClass(i, a > 1e3 && a > l ? "r_hidden" : "r_showed"),
              t_addClass(i, "r_anim")
          }
          if (r.length) {
            function d() {
              for (var t = r.length - 1; t >= 0; t--) {
                var e = r[t], n, i = 0;
                e.getBoundingClientRect().top + window.pageYOffset < (i = e.offsetHeight <= 100 ? window.pageYOffset + window.innerHeight : window.pageYOffset + window.innerHeight - 100) && (t_removeClass(e, "r_hidden"),
                  t_addClass(e, "r_showed"),
                  (r = Array.prototype.slice.call(r)).splice(t, 1))
              }
            }
            var s = document.querySelectorAll('[data-record-type="400"]');
            if (s.length > 0)
              var c = 0
                , u = 0
                , h = setInterval((function() {
                  300 === (u += 1) && clearInterval(h);
                  for (var t = 0; t < s.length; t++) {
                    var e;
                    "yes" === s[t].getAttribute("data-hiding-completed") && (c += 1)
                  }
                  c === s.length && (d(),
                    clearInterval(h))
                }
              ), 100);
            window.addEventListener("scroll", t_throttle((function() {
                d()
              }
            ), 200)),
              setTimeout((function() {
                  d()
                }
              ))
          }
        }
        var m = document.querySelector("html")
          , p = document.body;
        "none" === m.style.display && (m.style.display = "block");
        var w = document.querySelector(".t-tildalabel"), f;
        (f = p ? Math.max(p.scrollHeight, p.offsetHeight, p.clientHeight, m.offsetHeight) : m.offsetHeight) + 70 < window.innerHeight ? w && (w.style.display = "none") : w && w.setAttribute("style", "display: block !important")
      }
    )),
    function() {
      function t() {
        window.winWidth = window.innerWidth,
          window.winHeight = window.innerHeight
      }
      function e() {
        var t = window.isMobile ? document.documentElement.clientWidth : window.innerWidth, e = document.querySelectorAll(".r[data-screen-max], .r[data-screen-min]"), n, i, o;
        -1 !== navigator.userAgent.indexOf("Instagram") && (t = screen.width);
        for (var r = 0; r < e.length; r++) {
          var a = e[r]
            , l = a.id.replace("rec", "");
          if ("yes" === a.getAttribute("data-connect-with-tab") || document.querySelector('[data-popup-rec-ids="' + l + '"]'))
            return;
          o = getComputedStyle(a).display,
          (n = a.getAttribute("data-screen-max")) || (n = 1e4),
          (i = a.getAttribute("data-screen-min")) || (i = 0),
            n = parseInt(n),
          (i = parseInt(i)) <= n && (t <= n && t > i ? "block" !== o && (a.style.display = "block") : "none" !== o && (a.style.display = "none"))
        }
      }
      t_onReady((function() {
          t(),
            e(),
            window.addEventListener("resize", t_throttle((function() {
                t()
              }
            ), 200)),
            window.addEventListener("resize", t_throttle((function() {
                e()
              }
            ), 200))
        }
      ))
    }(),
    function() {
      var t = -1 !== navigator.userAgent.indexOf("Instagram");
      function e() {
        for (var t = document.querySelectorAll(".t-cover__carrier"), e = 0, n = 0; n < t.length; n++) {
          var i, o;
          if ((o = (i = t[n]).style).height.indexOf("vh") > -1) {
            e = parseInt(o.height, 10) / 100;
            var r = document.createElement("div");
            r.id = "tempDiv",
              r.style.cssText = "position:absolute;top:0;left:0;width:100%;height:100vh;visibility:hidden;",
              document.body.appendChild(r);
            var a = document.getElementById("tempDiv")
              , l = parseInt(getComputedStyle(a).height.replace("px", ""));
            t_removeEl(a);
            var d = Math.round(l * e) + "px"
              , s = i.closest(".t-cover");
            if (s) {
              var c = s.querySelector(".t-cover__filter")
                , u = s.querySelector(".t-cover__wrapper");
              s.style.height = d,
              c && (c.style.height = d),
              u && (u.style.height = d)
            }
            o.height = d
          }
        }
        var h = document.querySelectorAll("[data-height-correct-vh]")
          , m = window.innerHeight;
        e = 0;
        for (var n = 0; n < h.length; n++) {
          var i, o;
          (o = (i = h[n]).style).height.indexOf("vh") > -1 && (e = parseInt(o.height) / 100,
            d = m + "px",
            o.height = d)
        }
      }
      function n() {
        var e = t ? screen.width : window.innerWidth;
        window.isMobile && !t && (e = document.documentElement.clientWidth);
        for (var n = document.querySelectorAll('.r:not([data-record-type="396"]):not([data-record-type="1003"])'), i = [], o = 0; o < n.length; o++) {
          var r = n[o]
            , a = getComputedStyle(r);
          "none" !== a.display && "hidden" !== a.visibility && "0" !== a.opacity && i.push(r)
        }
        for (var l = 0; l < i.length; l++)
          for (var d = i[l], s = d.querySelectorAll('div:not([data-auto-correct-mobile-width="false"]):not(.tn-elem):not(.tn-atom):not(.tn-atom__sbs-anim-wrapper):not(.tn-atom__prx-wrapper):not(.tn-atom__videoiframe):not(.tn-atom__sticky-wrapper):not(.t-store__relevants__container):not(.t-slds__items-wrapper):not(.js-product-controls-wrapper):not(.js-product-edition-option):not(.t-product__option-variants)'), c = 0; c < s.length; c++) {
            var u = s[c];
            d.style.wordBreak = "";
            var h = t_outerWidth(u);
            if (h > e) {
              if ("yes" === u.getAttribute("[data-customstyle]") && "false" === u.parentNode.getAttribute("[data-auto-correct-mobile-width]"))
                return;
              console.log("Block not optimized for mobile width. Block width:" + h + " Block id:" + d.getAttribute("id")),
                console.log(u),
                d.style.overflow = "auto",
                d.style.wordBreak = h - 3 > e ? "break-word" : ""
            }
          }
      }
      function i(t) {
        for (var e = document.querySelectorAll('.t-text:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-name:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-title:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-descr:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-heading:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-text-impact:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-subtitle:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-uptitle:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"])'), n = 0; n < e.length; n++) {
          var i = e[n]
            , o = i.getAttribute("style");
          if (o) {
            var r = "rem" === i.getAttribute("data-auto-correct-font-size"), a;
            if (document.documentElement.clientWidth > t)
              a = (a = o.replace("lineheight", "line-height")).replace("fontsize", "font-size"),
                i.setAttribute("style", a);
            else {
              if (-1 === o.indexOf("font-size"))
                continue;
              if (parseInt(getComputedStyle(i).fontSize.replace("px", "")) < 26)
                continue;
              a = o.replace("line-height", "lineheight"),
                a = r ? a.replace(/font-size.*px;/gi, "font-size: 1.6rem;") : a.replace("font-size", "fontsize"),
                i.setAttribute("style", a)
            }
          }
        }
      }
      (window.isMobile || window.parent.isPagePreview) && (t_onReady((function() {
          setTimeout(e, 400)
        }
      )),
        window.addEventListener("load", (function() {
            setTimeout(e, 400)
          }
        )),
        window.innerWidth < 480 || window.isMobile && document.documentElement.clientWidth < 480 || t && screen.width < 480 ? (t_onReady((function() {
            for (var t = document.querySelectorAll('[data-customstyle="yes"]'), e = document.querySelectorAll("[field] span, [field] strong, [field] em, [field] a"), n = 0; n < t.length; n++) {
              var o = t[n];
              parseInt(getComputedStyle(o).fontSize.replace("px", "")) > 26 && (o.style.fontSize = null,
                o.style.lineHeight = null)
            }
            for (var n = 0; n < e.length; n++) {
              var o = e[n];
              parseInt(getComputedStyle(o).fontSize.replace("px", "")) > 26 && (o.style.fontSize = null)
            }
            i(480),
              window.addEventListener("orientationchange", (function() {
                  setTimeout((function() {
                      i(480)
                    }
                  ), 500)
                }
              ))
          }
        )),
          window.addEventListener("load", n),
          window.addEventListener("orientationchange", (function() {
              setTimeout((function() {
                  n()
                }
              ), 500)
            }
          ))) : (window.innerWidth < 900 || window.isMobile && document.documentElement.clientWidth < 900 || t && screen.width < 900) && t_onReady((function() {
            for (var t = document.querySelectorAll('[data-customstyle="yes"]'), e = document.querySelectorAll("[field] span, [field] strong, [field] em, [field] a"), n = 0; n < t.length; n++) {
              var i = t[n];
              parseInt(getComputedStyle(i).fontSize.replace("px", "")) > 30 && (i.style.fontSize = null,
                i.style.lineHeight = null)
            }
            for (var n = 0; n < e.length; n++) {
              var i = e[n];
              parseInt(getComputedStyle(i).fontSize.replace("px", "")) > 30 && (i.style.fontSize = null)
            }
            for (var o = document.querySelectorAll('.t-text:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-name:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-title:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-descr:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-heading:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-text-impact:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-subtitle:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"]), .t-uptitle:not(.tn-elem):not(.tn-atom):not([data-auto-correct-line-height="false"])'), n = 0; n < o.length; n++) {
              var i, r = (i = o[n]).getAttribute("style");
              if (r && r.indexOf("font-size") > -1 && parseInt(getComputedStyle(i).fontSize.replace("px", "")) > 30)
                if ("rem" === i.getAttribute("data-auto-correct-font-size")) {
                  var a = r.replace(/font-size.*px;/gi, "font-size: 1.6rem;").replace("line-height", "lineheight");
                  i.setAttribute("style", a)
                } else {
                  var a = r.replace("font-size", "fontsize").replace("line-height", "lineheight");
                  i.setAttribute("style", a)
                }
            }
          }
        )))
    }(),
    t_onReady((function() {
        setTimeout((function() {
            for (var t = document.querySelectorAll('a[href^="http"][target="_blank"]'), e = 0; e < t.length; e++) {
              var n = t[e]
                , i = n.getAttribute("rel") || "";
              "" === i ? n.setAttribute("rel", "noopener") : -1 === i.indexOf("noopener") && n.setAttribute("rel", i + " noopener")
            }
          }
        ), 2500)
      }
    )),
    function(t, e) {
      t.onerror = function(e, n, i, o, r) {
        "object" != typeof t.t_jserrors && (t.t_jserrors = []),
          t.t_jserrors.push({
            message: e,
            filename: n,
            lineno: i,
            colno: o,
            error: r
          })
      }
    }(window, Math),
    t_onReady((function() {
        document.body.addEventListener("popupShowed", t_scrollBarWidthCompensator__init),
          document.body.addEventListener("popupHidden", (function() {
              var t = window.scrollBarWidthCompensator;
              t && (t.cancelTimeout && (window.clearTimeout(t.cancelTimeout),
                t.cancelTimeout = null),
                t.cancelTimeout = window.setTimeout((function() {
                    t.cancelTimeout = null,
                      t_scrollBarWidthCompensator__cancel()
                  }
                ), Math.min(300, t.delay)))
            }
          ))
      }
    )),
    window.scrollBarWidthCompensator;
  function t_skiplink__addButton() {
    var e, t = document.getElementById("allrecords");
    t && t.querySelector("#t-header") && (e = '<noindex><a href="#t-main-content" class="t-skiplink" rel="nofollow" aria-label="' + t_skiplink__dict("skiplinkAriaLabel") + '" style="opacity:0;">' + t_skiplink__dict("skiplink") + "</a></noindex>",
      document.head.insertAdjacentHTML("beforeend", '<style>.t-skiplink{position:absolute;top:0;left:20px;z-index:99999;padding:8px 10px;font-family:"Arial",sans-serif;font-size:18px;text-align:center;text-decoration:none;background-color:#c7d2e9;border:1px solid #c7d2e9;border-radius:8px;transform:translateY(-200px);transition:transform .3s ease;}.t-skiplink:focus{transform:translateY(20px);opacity:1 !important;}#allrecords a.t-skiplink{color:#000000;}</style>'),
      t.insertAdjacentHTML("afterbegin", e),
      t_skiplink__addAnchor())
  }
  function t_skiplink__addAnchor() {
    var e = document.querySelectorAll('[data-menu="yes"]')
      , t = document.getElementById("t-header")
      , n = '<div id="t-main-content"></div>';
    if (t && t.insertAdjacentHTML("afterend", n),
    e && 0 < e.length && !t) {
      t = e[0].parentNode;
      if (1 === e.length)
        t.insertAdjacentHTML("afterend", n);
      else
        for (var i = 0; i < e.length; i++) {
          var r = e[i].closest(".t-rec");
          if (r.nextSibling && null === r.nextSibling.querySelector('[data-menu="yes"]'))
            return void r.insertAdjacentHTML("afterend", n)
        }
    }
  }
  function t_skiplink__dict(e) {
    var t = [];
    t.skiplink = {
      EN: "To main content",
      RU: "К основному контенту"
    },
      t.skiplinkAriaLabel = {
        EN: "Skip to main content",
        RU: "К основному контенту"
      };
    var n = document.querySelector("html").getAttribute("lang")
      , n = n ? n.toUpperCase() : window.browserLang;
    return t[e] ? t[e][n] || t[e].EN : "Text not found #" + e
  }
  t_skiplink__addButton(),
  Element.prototype.closest || (Element.prototype.closest = function(e) {
      for (var t = this; t && 1 === t.nodeType; ) {
        if (Element.prototype.matches.call(t, e))
          return t;
        t = t.parentElement || t.parentNode
      }
      return null
    }
  );
  window.isMobile = !1;
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    window.isMobile = !0
  }
  window.isiOS = !1;
  if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
    window.isiOS = !0
  }
  window.isiOSVersion = '';
  if (window.isiOS) {
    var version = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
    if (version !== null) {
      window.isiOSVersion = [parseInt(version[1], 10), parseInt(version[2], 10), parseInt(version[3] || 0, 10)]
    }
  }
  window.isSafari = !1;
  if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
    window.isSafari = !0
  }
  window.isSafariVersion = '';
  if (window.isSafari) {
    var version = (navigator.appVersion).match(/Version\/(\d+)\.(\d+)\.?(\d+)? Safari/);
    if (version !== null) {
      window.isSafariVersion = [parseInt(version[1], 10), parseInt(version[2], 10), parseInt(version[3] || 0, 10)]
    }
  }

  function t228__init(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    var menuBlock = rec.querySelector('.t228');
    var mobileMenu = rec.querySelector('.t228__mobile');
    var menuSubLinkItems = rec.querySelectorAll('.t-menusub__link-item');
    var rightBtn = rec.querySelector('.t228__right_buttons_but .t-btn');
    var mobileMenuPosition = mobileMenu ? mobileMenu.style.position || window.getComputedStyle(mobileMenu).position : '';
    var mobileMenuDisplay = mobileMenu ? mobileMenu.style.display || window.getComputedStyle(mobileMenu).display : '';
    var isFixedMobileMenu = mobileMenuPosition === 'fixed' && mobileMenuDisplay === 'block';
    var overflowEvent = document.createEvent('Event');
    var noOverflowEvent = document.createEvent('Event');
    overflowEvent.initEvent('t228_overflow', !0, !0);
    noOverflowEvent.initEvent('t228_nooverflow', !0, !0);
    if (menuBlock) {
      menuBlock.addEventListener('t228_overflow', function() {
        t228_checkOverflow(recid)
      });
      menuBlock.addEventListener('t228_nooverflow', function() {
        t228_checkNoOverflow(recid)
      })
    }
    rec.addEventListener('click', function(e) {
      var targetLink = e.target.closest('.t-menusub__target-link');
      if (targetLink && window.isMobile && window.innerWidth <= 980) {
        if (targetLink.classList.contains('t-menusub__target-link_active')) {
          if (menuBlock)
            menuBlock.dispatchEvent(overflowEvent)
        } else {
          if (menuBlock)
            menuBlock.dispatchEvent(noOverflowEvent)
        }
      }
      var currentLink = e.target.closest('.t-menu__link-item:not(.tooltipstered):not(.t-menusub__target-link):not(.t794__tm-link):not(.t966__tm-link):not(.t978__tm-link):not(.t978__menu-link)');
      if (currentLink && mobileMenu && isFixedMobileMenu)
        mobileMenu.click()
    });
    Array.prototype.forEach.call(menuSubLinkItems, function(linkItem) {
      linkItem.addEventListener('click', function() {
        if (mobileMenu && isFixedMobileMenu)
          mobileMenu.click()
      })
    });
    if (rightBtn) {
      rightBtn.addEventListener('click', function() {
        if (mobileMenu && isFixedMobileMenu)
          mobileMenu.click()
      })
    }
    if (menuBlock) {
      menuBlock.addEventListener('showME601a', function() {
        var menuLinks = rec.querySelectorAll('.t966__menu-link');
        Array.prototype.forEach.call(menuLinks, function(menuLink) {
          menuLink.addEventListener('click', function() {
            if (mobileMenu && isFixedMobileMenu)
              mobileMenu.click()
          })
        })
      })
    }
    t_onFuncLoad('t_throttle', function() {
      var onResizeThrottled = t_throttle(function() {
        t228_setWidth(recid)
      }, 50)
      window.addEventListener('resize', onResizeThrottled)
    })
  }
  function t228_checkOverflow(recid) {
    var rec = document.getElementById('rec' + recid);
    var menu = rec ? rec.querySelector('.t228') : null;
    if (!menu)
      return;
    var mobileContainer = document.querySelector('.t228__mobile_container');
    var mobileContainerHeight = t228_getFullHeight(mobileContainer);
    var windowHeight = document.documentElement.clientHeight;
    var menuPosition = menu.style.position || window.getComputedStyle(menu).position;
    if (menuPosition === 'fixed') {
      menu.classList.add('t228__overflow');
      menu.style.setProperty('height', (windowHeight - mobileContainerHeight) + 'px', 'important')
    }
  }
  function t228_checkNoOverflow(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return !1;
    var menu = rec.querySelector('.t228');
    var menuPosition = menu ? menu.style.position || window.getComputedStyle(menu).position : '';
    if (menuPosition === 'fixed') {
      if (menu)
        menu.classList.remove('t228__overflow');
      if (menu)
        menu.style.height = 'auto'
    }
  }
  function t228_setWidth(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    var menuCenterSideList = rec.querySelectorAll('.t228__centerside');
    Array.prototype.forEach.call(menuCenterSideList, function(menuCenterSide) {
      menuCenterSide.classList.remove('t228__centerside_hidden')
    });
    if (window.innerWidth <= 980)
      return;
    var menuBlocks = rec.querySelectorAll('.t228');
    Array.prototype.forEach.call(menuBlocks, function(menu) {
      var maxWidth;
      var centerWidth = 0;
      var paddingWidth = 40;
      var leftSide = menu.querySelector('.t228__leftside');
      var rightSide = menu.querySelector('.t228__rightside');
      var menuList = menu.querySelector('.t228__list');
      var mainContainer = menu.querySelector('.t228__maincontainer');
      var leftContainer = menu.querySelector('.t228__leftcontainer');
      var rightContainer = menu.querySelector('.t228__rightcontainer');
      var centerContainer = menu.querySelector('.t228__centercontainer');
      var centerContainerLi = centerContainer ? centerContainer.querySelectorAll('li') : [];
      var leftContainerWidth = t228_getFullWidth(leftContainer);
      var rightContainerWidth = t228_getFullWidth(rightContainer);
      var mainContainerWidth = mainContainer ? mainContainer.offsetWidth : 0;
      var dataAlign = menu.getAttribute('data-menu-items-align');
      var isDataAlignCenter = dataAlign === 'center' || dataAlign === null;
      maxWidth = leftContainerWidth >= rightContainerWidth ? leftContainerWidth : rightContainerWidth;
      maxWidth = Math.ceil(maxWidth);
      Array.prototype.forEach.call(centerContainerLi, function(li) {
        centerWidth += t228_getFullWidth(li)
      });
      leftSide.style.minWidth = ''
      rightSide.style.minWidth = ''
      if (mainContainerWidth - (maxWidth * 2 + paddingWidth * 2) > centerWidth + 20) {
        if (isDataAlignCenter) {
          if (leftSide)
            leftSide.style.minWidth = maxWidth + 'px';
          if (rightSide)
            rightSide.style.minWidth = maxWidth + 'px'
        }
      } else {
        if (leftSide)
          leftSide.style.minWidth = maxWidth + '';
        if (rightSide)
          rightSide.style.minWidth = maxWidth + ''
      }
      if (menuList && menuList.classList.contains('t228__list_hidden'))
        menuList.classList.remove('t228__list_hidden')
    })
  }
  function t228_getFullWidth(el) {
    if (!el)
      return 0;
    var marginLeft = el.style.marginLeft || window.getComputedStyle(el).marginLeft;
    var marginRight = el.style.marginRight || window.getComputedStyle(el).marginRight;
    marginLeft = parseInt(marginLeft, 10) || 0;
    marginRight = parseInt(marginRight, 10) || 0;
    return el.offsetWidth + marginLeft + marginRight
  }
  function t228_getFullHeight(el) {
    if (!el)
      return 0;
    var marginTop = el.style.marginTop || window.getComputedStyle(el).marginTop;
    var marginBottom = el.style.marginBottom || window.getComputedStyle(el).marginBottom;
    marginTop = parseInt(marginTop, 10) || 0;
    marginBottom = parseInt(marginBottom, 10) || 0;
    return el.offsetHeight + marginTop + marginBottom
  }
  function t702_initPopup(recId) {
    var rec = document.getElementById('rec' + recId);
    if (!rec)
      return;
    var container = rec.querySelector('.t702');
    if (!container)
      return;
    rec.setAttribute('data-animationappear', 'off');
    rec.setAttribute('data-popup-subscribe-inited', 'y');
    rec.style.opacity = 1;
    var documentBody = document.body;
    var popup = rec.querySelector('.t-popup');
    var popupTooltipHook = popup.getAttribute('data-tooltip-hook');
    var analitics = popup.getAttribute('data-track-popup');
    var popupCloseBtn = popup.querySelector('.t-popup__close');
    var hrefs = rec.querySelectorAll('a[href*="#"]');
    var submitHref = rec.querySelector('.t-submit[href*="#"]');
    if (popupTooltipHook) {
      t_onFuncLoad('t_popup__addAttributesForAccessibility', function() {
        t_popup__addAttributesForAccessibility(popupTooltipHook)
      });
      document.addEventListener('click', function(event) {
        var target = event.target;
        var href = target.closest('a[href$="' + popupTooltipHook + '"]') ? target : !1;
        if (!href)
          return;
        event.preventDefault();
        t702_showPopup(recId);
        t_onFuncLoad('t_popup__resizePopup', function() {
          t_popup__resizePopup(recId)
        });
        t702__lazyLoad();
        if (analitics && window.Tilda) {
          Tilda.sendEventToStatistics(analitics, popupTooltipHook)
        }
      });
      t_onFuncLoad('t_popup__addClassOnTriggerButton', function() {
        t_popup__addClassOnTriggerButton(document, popupTooltipHook)
      })
    }
    popup.addEventListener('scroll', t_throttle(function() {
      t702__lazyLoad()
    }));
    popup.addEventListener('click', function(event) {
      var windowWithoutScrollBar = window.innerWidth - 17;
      if (event.clientX > windowWithoutScrollBar)
        return;
      if (event.target === this)
        t702_closePopup(recId)
    });
    popupCloseBtn.addEventListener('click', function() {
      t702_closePopup(recId)
    });
    if (submitHref) {
      submitHref.addEventListener('click', function() {
        if (documentBody.classList.contains('t-body_scroll-locked')) {
          documentBody.classList.remove('t-body_scroll-locked')
        }
      })
    }
    for (var i = 0; i < hrefs.length; i++) {
      hrefs[i].addEventListener('click', function() {
        var url = this.getAttribute('href');
        if (!url || url.substring(0, 7) != '#price:') {
          t702_closePopup(recId);
          if (!url || url.substring(0, 7) == '#popup:') {
            setTimeout(function() {
              if (typeof t_triggerEvent === 'function')
                t_triggerEvent(document.body, 'popupShowed');
              documentBody.classList.add('t-body_popupshowed')
            }, 300)
          }
        }
      })
    }
    function t702_escClosePopup(event) {
      if (event.key === 'Escape')
        t702_closePopup(recId)
    }
    popup.addEventListener('tildamodal:show' + popupTooltipHook, function() {
      document.addEventListener('keydown', t702_escClosePopup)
    });
    popup.addEventListener('tildamodal:close' + popupTooltipHook, function() {
      document.removeEventListener('keydown', t702_escClosePopup)
    });
    rec.addEventListener('conditional-form-init', function() {
      t_onFuncLoad('t_form__conditionals_addFieldsListeners', function() {
        t_form__conditionals_addFieldsListeners(recId, function() {
          t_popup__resizePopup(recId)
        })
      })
    }, {
      once: !0
    })
  }
  function t702_lockScroll() {
    var documentBody = document.body;
    if (!documentBody.classList.contains('t-body_scroll-locked')) {
      var bodyScrollTop = typeof window.pageYOffset !== 'undefined' ? window.pageYOffset : (document.documentElement || documentBody.parentNode || documentBody).scrollTop;
      documentBody.classList.add('t-body_scroll-locked');
      documentBody.style.top = '-' + bodyScrollTop + 'px';
      documentBody.setAttribute('data-popup-scrolltop', bodyScrollTop)
    }
  }
  function t702_unlockScroll() {
    var documentBody = document.body;
    if (documentBody.classList.contains('t-body_scroll-locked')) {
      var bodyScrollTop = documentBody.getAttribute('data-popup-scrolltop');
      documentBody.classList.remove('t-body_scroll-locked');
      documentBody.style.top = null;
      documentBody.removeAttribute('data-popup-scrolltop');
      document.documentElement.scrollTop = parseInt(bodyScrollTop)
    }
  }
  function t702_showPopup(recId) {
    var rec = document.getElementById('rec' + recId);
    if (!rec)
      return;
    var container = rec.querySelector('.t702');
    if (!container)
      return;
    var windowWidth = window.innerWidth;
    var screenMin = rec.getAttribute('data-screen-min');
    var screenMax = rec.getAttribute('data-screen-max');
    if (screenMin && windowWidth < parseInt(screenMin, 10))
      return;
    if (screenMax && windowWidth > parseInt(screenMax, 10))
      return;
    var popup = rec.querySelector('.t-popup');
    var popupTooltipHook = popup.getAttribute('data-tooltip-hook');
    var ranges = rec.querySelectorAll('.t-range');
    var documentBody = document.body;
    if (ranges.length) {
      Array.prototype.forEach.call(ranges, function(range) {
        t702__triggerEvent(range, 'popupOpened')
      })
    }
    t_onFuncLoad('t_popup__showPopup', function() {
      t_popup__showPopup(popup)
    });
    if (typeof t_triggerEvent === 'function')
      t_triggerEvent(document.body, 'popupShowed');
    documentBody.classList.add('t-body_popupshowed');
    documentBody.classList.add('t702__body_popupshowed');
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent) && !window.MSStream && window.isiOSVersion && window.isiOSVersion[0] === 11) {
      setTimeout(function() {
        t702_lockScroll()
      }, 500)
    }
    t702__lazyLoad();
    t702__triggerEvent(popup, 'tildamodal:show' + popupTooltipHook);
    t_onFuncLoad('t_forms__calculateInputsWidth', function() {
      t_forms__calculateInputsWidth(recId)
    })
  }
  function t702_closePopup(recId) {
    var rec = document.getElementById('rec' + recId);
    var popup = rec.querySelector('.t-popup');
    var popupTooltipHook = popup.getAttribute('data-tooltip-hook');
    var popupAll = document.querySelectorAll('.t-popup_show:not(.t-feed__post-popup):not(.t945__popup)');
    if (popupAll.length == 1) {
      if (typeof t_triggerEvent === 'function')
        t_triggerEvent(document.body, 'popupHidden');
      document.body.classList.remove('t-body_popupshowed')
    } else {
      var newPopup = [];
      for (var i = 0; i < popupAll.length; i++) {
        if (popupAll[i].getAttribute('data-tooltip-hook') === popupTooltipHook) {
          popupAll[i].classList.remove('t-popup_show');
          newPopup.push(popupAll[i])
        }
      }
      if (newPopup.length === popupAll.length) {
        if (typeof t_triggerEvent === 'function')
          t_triggerEvent(document.body, 'popupHidden');
        document.body.classList.remove('t-body_popupshowed')
      }
    }
    if (typeof t_triggerEvent === 'function')
      t_triggerEvent(document.body, 'popupHidden');
    popup.classList.remove('t-popup_show');
    document.body.classList.remove('t702__body_popupshowed');
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent) && !window.MSStream && window.isiOSVersion && window.isiOSVersion[0] === 11) {
      t702_unlockScroll()
    }
    t_onFuncLoad('t_popup__addFocusOnTriggerButton', function() {
      t_popup__addFocusOnTriggerButton()
    });
    setTimeout(function() {
      var popupHide = document.querySelectorAll('.t-popup:not(.t-popup_show)');
      for (var i = 0; i < popupHide.length; i++) {
        popupHide[i].style.display = 'none'
      }
    }, 300);
    t702__triggerEvent(popup, 'tildamodal:close' + popupTooltipHook)
  }
  function t702_sendPopupEventToStatistics(popupName) {
    var virtPage = '/tilda/popup/';
    var virtTitle = 'Popup: ';
    if (popupName.substring(0, 7) == '#popup:') {
      popupName = popupName.substring(7)
    }
    virtPage += popupName;
    virtTitle += popupName;
    if (window.Tilda && typeof Tilda.sendEventToStatistics == 'function') {
      Tilda.sendEventToStatistics(virtPage, virtTitle, '', 0)
    } else {
      if (ga) {
        if (window.mainTracker != 'tilda') {
          ga('send', {
            hitType: 'pageview',
            page: virtPage,
            title: virtTitle
          })
        }
      }
      if (window.mainMetrika && window[window.mainMetrika]) {
        window[window.mainMetrika].hit(virtPage, {
          title: virtTitle,
          referer: window.location.href
        })
      }
    }
  }
  function t702_onSuccess(form) {
    t_onFuncLoad('t_forms__onSuccess', function() {
      t_forms__onSuccess(form)
    })
  }
  function t702__lazyLoad() {
    if (window.lazy === 'y' || document.getElementById('allrecords').getAttribute('data-tilda-lazy') === 'yes') {
      t_onFuncLoad('t_lazyload_update', function() {
        t_lazyload_update()
      })
    }
  }
  function t702__triggerEvent(el, eventName) {
    var event;
    if (typeof window.CustomEvent === 'function') {
      event = new CustomEvent(eventName)
    } else if (document.createEvent) {
      event = document.createEvent('HTMLEvents');
      event.initEvent(eventName, !0, !1)
    } else if (document.createEventObject) {
      event = document.createEventObject();
      event.eventType = eventName
    }
    event.eventName = eventName;
    if (el.dispatchEvent) {
      el.dispatchEvent(event)
    } else if (el.fireEvent) {
      el.fireEvent('on' + event.eventType, event)
    } else if (el[eventName]) {
      el[eventName]()
    } else if (el['on' + eventName]) {
      el['on' + eventName]()
    }
  }
  function t868_initPopup(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    rec.setAttribute('data-animationappear', 'off');
    rec.style.opacity = '1';
    var popup = rec.querySelector('.t-popup');
    if (!popup)
      return;
    var hook = popup.getAttribute('data-tooltip-hook');
    if (!hook)
      return;
    var analitics = popup.getAttribute('data-track-popup');
    var customCodeHTML = t868__readCustomCode(rec);
    var recBlocks = document.querySelectorAll('.r');
    for (var i = 0; i < recBlocks.length; i++) {
      recBlocks[i].addEventListener('click', function(event) {
        var target = event.target;
        var href = target.closest('a[href$="' + hook + '"]') ? target : !1;
        if (!href)
          return;
        event.preventDefault();
        t868_showPopup(rec, customCodeHTML);
        t_onFuncLoad('t_popup__resizePopup', function() {
          t_popup__resizePopup(recid)
        });
        if (hook.substring(0, 7) === '#popup:' && analitics && window.Tilda) {
          var virtTitle = hook;
          virtTitle = virtTitle.substring(7);
          Tilda.sendEventToStatistics(analitics, virtTitle)
        }
      })
    }
    if (!popup.getAttribute('data-popup-inited') && 'MutationObserver'in window) {
      popup.setAttribute('data-popup-inited', 'yes');
      var stores = document.querySelectorAll('body .t-store');
      Array.prototype.forEach.call(stores, function(store) {
        new MutationObserver(function(mutationsList) {
            for (var mutation in mutationsList) {
              var event = mutationsList[mutation];
              if (event.type === 'attributes') {
                if (event.target.className.indexOf('t-popup_show') !== -1) {
                  popup.style.zIndex = '99999999';
                  t868_initPopup(recid);
                }
              }
            }
          }
        ).observe(store, {
          attributes: !0,
          attributeFilter: ['class'],
          subtree: !0,
        })
      })
    }
  }
  function t868__readCustomCode(rec) {
    var codeWrap = rec.querySelector('.t868 .t868__code-wrap');
    if (!codeWrap)
      return;
    var customCode = codeWrap.innerHTML;
    return customCode
  }
  function t868_showPopup(rec) {
    var popup = rec.querySelector('.t-popup');
    if (!popup)
      return;
    var popupContainer = popup.querySelector('.t-popup__container');
    if (!popupContainer)
      return;
    var codeWrap = popup.querySelector('.t868__code-wrap');
    if (!codeWrap)
      return;
    var windowWidth = window.innerWidth;
    var screenMin = rec.getAttribute('data-screen-min');
    var screenMax = rec.getAttribute('data-screen-max');
    if (screenMin && windowWidth < parseInt(screenMin, 10))
      return;
    if (screenMax && windowWidth > parseInt(screenMax, 10))
      return;
    popup.style.display = 'block';
    codeWrap.style.display = 'block';
    t868_setHeight(rec);
    setTimeout(function() {
      popupContainer.classList.add('t-popup__container-animated');
      popup.classList.add('t-popup_show')
    }, 100);
    if (typeof t_triggerEvent === 'function')
      t_triggerEvent(document.body, 'popupShowed');
    document.body.classList.add('t-body_popupshowed');
    popup.addEventListener('click', function(event) {
      var container = event.target.closest('.t-popup__container');
      if (!container)
        t868_closePopup(rec)
    });
    var closeButton = rec.querySelector('.t-popup__close');
    if (closeButton) {
      closeButton.addEventListener('click', function() {
        t868_closePopup(rec)
      })
    }
    var buttons = rec.querySelectorAll('a[href*="#"]');
    Array.prototype.forEach.call(buttons, function(button) {
      button.addEventListener('click', function() {
        var url = button.getAttribute('href');
        if (url.indexOf('#order') !== -1) {
          var popupContainer = rec.querySelector('.t-popup__container');
          setTimeout(function() {
            while (popupContainer.firstChild) {
              popupContainer.removeChild(popupContainer.firstChild)
            }
          }, 600)
        }
        if (!url || url.substring(0, 7) !== '#price:') {
          t868_closePopup(rec);
          if (!url || url.substring(0, 7) === '#popup:') {
            setTimeout(function() {
              if (typeof t_triggerEvent === 'function')
                t_triggerEvent(document.body, 'popupShowed');
              document.body.classList.add('t-body_popupshowed')
            }, 300)
          }
        }
      })
    });
    document.addEventListener('keydown', function(event) {
      if (event.keyCode === 27) {
        t868_closePopup(rec)
      }
    })
  }
  function t868_closePopup(rec) {
    var popup = rec.querySelector('.t-popup');
    var codeWrap = rec.querySelector('.t868 .t868__code-wrap');
    if (typeof t_triggerEvent === 'function')
      t_triggerEvent(document.body, 'popupHidden');
    document.body.classList.remove('t-body_popupshowed');
    popup.classList.remove('t-popup_show');
    setTimeout(function() {
      if (!popup.classList.contains('.t-popup_show')) {
        popup.style.display = 'none';
        if (codeWrap) {
          codeWrap.style.display = 'none'
        }
      }
    }, 300)
  }
  function t868_setHeight(rec) {
    var videoCarier = rec.querySelector('.t868__video-carier');
    if (!videoCarier)
      return;
    var paddingLeft = parseInt(videoCarier.style.paddingLeft, 10) || 0;
    var paddingRight = parseInt(videoCarier.style.paddingRight, 10) || 0;
    var height = (videoCarier.clientWidth - (paddingLeft + paddingRight)) / (16 / 9);
    videoCarier.style.height = height;
    Array.prototype.forEach.call(videoCarier.closest, function(parent) {
      parent.style.height = height
    })
  }
  if (!Element.prototype.matches) {
    Element.prototype.matches = Element.prototype.matchesSelector || Element.prototype.msMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.webkitMatchesSelector || Element.prototype.oMatchesSelector
  }
  if (!Element.prototype.closest) {
    Element.prototype.closest = function(s) {
      var el = this;
      while (el && el.nodeType === 1) {
        if (Element.prototype.matches.call(el, s)) {
          return el
        }
        el = el.parentElement || el.parentNode
      }
      return null
    }
  }
  function t397_init(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    var allRecords = document.getElementById('allrecords');
    var tildaMode = allRecords ? allRecords.getAttribute('data-tilda-mode') : '';
    var tildaLazyMode = allRecords ? allRecords.getAttribute('data-tilda-lazy') : '';
    var tabs = rec ? rec.querySelectorAll('.t397__tab') : [];
    if (tildaMode !== 'edit' && tildaMode !== 'preview') {
      t397_scrollToTabs(recid);
      var activeTab = rec.querySelector('.t397__tab_active');
      if (activeTab) {
        var currentButton = activeTab.querySelector('.t397__title');
        if (currentButton) {
          currentButton.setAttribute('tabindex', 0);
          currentButton.setAttribute('aria-selected', !0)
        }
        var currentTabIndex = activeTab.getAttribute('data-tab-number');
        var wrapper = rec.querySelector('.t397__wrapper');
        wrapper.setAttribute('data-tab-current', currentTabIndex)
      }
    }
    t397_addAttributesToBlocksInsideTabs(recid, tabs);
    Array.prototype.forEach.call(tabs, function(tab, i) {
      tab.setAttribute('data-tab-index', i);
      tab.addEventListener('click', function(event) {
        var tabNumber = i + 1;
        var targetTab = event.target.closest('.t397__tab');
        if (targetTab && targetTab.classList.contains('t397__tab_active') && !event.isTrusted)
          return;
        t397_switchBetweenTabs(recid, tabNumber, targetTab, tildaMode, tildaLazyMode)
      });
      tab.addEventListener('keydown', function(event) {
        var currentIndex = Number(rec.querySelector('.t397__wrapper').getAttribute('data-tab-current'));
        var targetTab = event.target.closest('.t397__tab');
        if (targetTab && targetTab.classList.contains('t397__tab_active') && !event.isTrusted)
          return;
        var prevent = !1;
        switch (event.key) {
          case 'Left':
          case 'ArrowLeft':
            currentIndex = currentIndex === 1 ? tabs.length : currentIndex - 1;
            targetTab = rec.querySelector('[data-tab-number="' + currentIndex + '"]');
            t397_switchBetweenTabs(recid, currentIndex, targetTab, tildaMode, tildaLazyMode);
            t397_showActiveTabFromKeyboard(recid, currentIndex, tabs);
            prevent = !0;
            break;
          case 'Right':
          case 'ArrowRight':
            currentIndex = currentIndex === tabs.length ? 1 : currentIndex + 1;
            targetTab = rec.querySelector('[data-tab-number="' + currentIndex + '"]');
            t397_switchBetweenTabs(recid, currentIndex, targetTab, tildaMode, tildaLazyMode);
            t397_showActiveTabFromKeyboard(recid, currentIndex, tabs);
            prevent = !0;
            break;
          default:
            break
        }
        if (prevent) {
          event.stopPropagation();
          event.preventDefault()
        }
      })
    });
    if (tabs.length) {
      t397_alltabs_updateContent(recid);
      t397_updateContentBySelect(recid);
      var bgColor = rec ? rec.style.backgroundColor : '#ffffff';
      var bgColorTargets = rec.querySelectorAll('.t397__select, .t397__firefoxfix');
      Array.prototype.forEach.call(bgColorTargets, function(target) {
        target.style.background = bgColor
      })
    }
    document.addEventListener('click', function(e) {
      if (e.target.closest('[href*="#!/tab/' + recid + '"]')) {
        var currentLink = e.target.closest('[href*="#!/tab/' + recid + '"]');
        var hash = currentLink.hash;
        t397_scrollToTabs(recid, hash)
      }
    })
  }
  function t397_addAttributesToBlocksInsideTabs(recid, tabs) {
    if (tabs.length > 0) {
      Array.prototype.forEach.call(tabs, function(tab, i) {
        var firstBlockInsideTabId = tab.getAttribute('data-tab-rec-ids').split(',')[0];
        var firstBlockInsideTab = document.querySelector('#rec' + firstBlockInsideTabId);
        if (firstBlockInsideTab && !firstBlockInsideTab.getAttribute('aria-labelledby')) {
          firstBlockInsideTab.setAttribute('aria-labelledby', 'tab' + (i + 1) + '_' + recid)
        }
        if (firstBlockInsideTab && !firstBlockInsideTab.getAttribute('role')) {
          firstBlockInsideTab.setAttribute('role', 'tabpanel')
        }
        if (firstBlockInsideTab && !firstBlockInsideTab.getAttribute('tabindex')) {
          firstBlockInsideTab.setAttribute('tabindex', '0')
        }
      })
    }
  }
  function t397_switchBetweenTabs(recid, tabNumber, targetTab, tildaMode, tildaLazyMode) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    var activeTab = rec.querySelector('.t397__tab_active');
    if (activeTab) {
      activeTab.classList.remove('t397__tab_active');
      var activeButton = activeTab.querySelector('.t397__title');
      if (activeButton) {
        activeButton.setAttribute('tabindex', -1);
        activeButton.setAttribute('aria-selected', !1)
      }
    }
    targetTab.classList.add('t397__tab_active');
    var targetButton = targetTab.querySelector('.t397__title');
    if (targetButton) {
      targetButton.setAttribute('tabindex', 0);
      targetButton.setAttribute('aria-selected', !0)
    }
    t397_removeUrl();
    if (tildaMode !== 'edit' && tildaMode !== 'preview' && tabNumber && typeof history.replaceState !== 'undefined') {
      try {
        window.history.replaceState('', '', window.location.origin + window.location.pathname + '#!/tab/' + recid + '-' + tabNumber)
      } catch (err) {}
    }
    rec.querySelector('.t397__wrapper').setAttribute('data-tab-current', tabNumber);
    t397_alltabs_updateContent(recid);
    t397_updateSelect(recid);
    var hookBlocks = targetTab.getAttribute('data-tab-rec-ids').split(',');
    var event = document.createEvent('Event');
    event.initEvent('displayChanged', !0, !0);
    var hooksCopy = hookBlocks.slice();
    hooksCopy.forEach(function(recid) {
      var currentRec = document.getElementById('rec' + recid);
      if (!currentRec)
        return;
      var recordType = currentRec.getAttribute('data-record-type');
      if (recordType === '395' || recordType === '397') {
        var selector = '.t' + recordType + '__tab_active';
        var activeIDs = currentRec.querySelector(selector).getAttribute('data-tab-rec-ids');
        activeIDs = activeIDs.split(',');
        hookBlocks = hookBlocks.concat(activeIDs)
      }
    });
    hookBlocks.forEach(function(curRecid) {
      var currentRec = document.getElementById('rec' + curRecid);
      if (!currentRec)
        return;
      var currentRecChildren = currentRec.querySelectorAll('.t-feed, .t-store, .t-store__product-snippet, .t117, .t121, .t132, .t223, .t226, .t228, .t229, .t230, .t268, .t279, .t341, .t346, .t347, .t349, .t351, .t353, .t384, .t385, .t386, .t396, .t400, .t404, .t409, .t410, .t412, .t418, .t422, .t425, .t428, .t433, .t448, .t456, .t477, .t478, .t480, .t486, .t498, .t504, .t506, .t509, .t511, .t517, .t518, .t519, .t520, .t532, .t533, .t538, .t539, .t544, .t545, .t552, .t554, .t569, .t570, .t577, .t592, .t598, .t599, .t601, .t604, .t605, .t609, .t615, .t616, .t650, .t659, .t670, .t675, .t686, .t688, .t694, .t698, .t700, .t726, .t728, .t730, .t734, .t738, .t740, .t744, .t754, .t760, .t762, .t764, .t774, .t776, .t778, .t780, .t786, .t798, .t799, .t801, .t813, .t814, .t822, .t826, .t827, .t829, .t842, .t843, .t849, .t850, .t851, .t856, .t858, .t859, .t860, .t881, .t889, .t902, .t912, .t923, .t937, .t958, .t959, .t979, .t982, .t983, .t989, .t994, .t1067, .t1068, .t1069, .t1070, .t1071, .t1072, .t1053');
      Array.prototype.forEach.call(currentRecChildren, function(child) {
        child.dispatchEvent(event)
      });
      var displayChangedBlock = currentRec.querySelector('[data-display-changed="true"]');
      if (displayChangedBlock)
        displayChangedBlock.dispatchEvent(event)
    });
    var galaxyEffectBlocks = document.querySelectorAll('.t826');
    Array.prototype.forEach.call(galaxyEffectBlocks, function(galaxyEffectBlock) {
      galaxyEffectBlock.dispatchEvent(event)
    });
    if (window.lazy === 'y' || tildaLazyMode === 'yes') {
      t_onFuncLoad('t_lazyload_update', function() {
        t_lazyload_update()
      })
    }
  }
  function t397_showActiveTabFromKeyboard(recid, currentIndex, tabs) {
    var rec = document.querySelector('#rec' + recid);
    var currentTab = rec.querySelector('[data-tab-number="' + currentIndex + '"]');
    if (!currentTab)
      return;
    var currentButton = currentTab.querySelector('.t397__title');
    if (currentButton) {
      currentButton.focus()
    }
    var tabList = rec.querySelector('.t397__wrapper');
    if (tabList)
      tabList.setAttribute('data-tab-current', currentIndex)
  }
  function t397_alltabs_updateContent(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    var tabs = Array.prototype.slice.call(rec.querySelectorAll('.t397__tab:not(.t397__tab_active)'));
    var activeTab = rec.querySelector('.t397__tab_active');
    var select = rec.querySelector('.t397__select');
    if (!activeTab)
      return;
    var hookBlocks = activeTab.getAttribute('data-tab-rec-ids').split(',');
    var noActive = [];
    var popupBlocks = [190, 217, 312, 331, 358, 364, 365, 390, 702, 706, 746, 750, 756, 768, 862, 868, 890, 945, 1013, 1014];
    Array.prototype.forEach.call(tabs, function(tab) {
      if (tab !== activeTab) {
        var noActiveHooks = tab.getAttribute('data-tab-rec-ids').split(',');
        noActiveHooks.forEach(function(hook) {
          if (noActive.indexOf(hook) === -1 && hookBlocks.indexOf(hook) === -1)
            noActive.push(hook);
          var tabBlock = document.getElementById('rec' + hook);
          if (tabBlock && (tabBlock.getAttribute('data-record-type') == 397 || tabBlock.getAttribute('data-record-type') == 395)) {
            var activeTab = tabBlock.querySelector('.t397__tab_active, .t395__tab_active');
            if (activeTab) {
              var noActiveSubHooks = activeTab.getAttribute('data-tab-rec-ids').split(',');
              noActiveSubHooks.forEach(function(subhook) {
                if (noActive.indexOf(subhook) === -1 && hookBlocks.indexOf(subhook) === -1)
                  noActive.push(subhook)
              })
            }
          }
        })
      }
    });
    if (t397_checkVisibillityEl(activeTab) || t397_checkVisibillityEl(select)) {
      hookBlocks.forEach(function(hook) {
        if (!hook)
          return;
        var hookEl = document.getElementById('rec' + hook);
        var hookElRecordType = hookEl ? hookEl.getAttribute('data-record-type') : '';
        if (hookEl) {
          hookEl.classList.remove('t397__off');
          hookEl.classList.remove('t395__off');
          hookEl.setAttribute('aria-hidden', !1);
          hookEl.style.opacity = ''
        }
        t397_updateTabsByHook(hookElRecordType, hookEl, hook, recid)
      })
    } else {
      hookBlocks.forEach(function(hook) {
        var hookEl = document.getElementById('rec' + hook);
        var hookElRecordType = hookEl ? hookEl.getAttribute('data-record-type') : '';
        var isPopupBlock = popupBlocks.some(function(id) {
          return hookElRecordType == id
        });
        if (hookEl && !isPopupBlock) {
          hookEl.setAttribute('data-animationappear', 'off');
          hookEl.classList.add('t397__off');
          hookEl.setAttribute('aria-hidden', !0)
        }
        t397_updateTabsByHook(hookElRecordType, hookEl, hook, recid)
      })
    }
    noActive.forEach(function(noActiveID) {
      if (!noActiveID)
        return;
      var hookEl = document.getElementById('rec' + noActiveID);
      var hookElRecordType = hookEl ? hookEl.getAttribute('data-record-type') : '';
      var isPopupBlock = popupBlocks.some(function(id) {
        return hookElRecordType == id
      });
      if (hookEl && !isPopupBlock) {
        hookEl.setAttribute('data-connect-with-tab', 'yes');
        hookEl.setAttribute('data-animationappear', 'off');
        hookEl.classList.add('t397__off');
        hookEl.setAttribute('aria-hidden', !0)
      }
      t397_updateTabsByHook(hookElRecordType, hookEl, noActiveID, recid)
    });
    var scrollHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight);
    if (scrollHeight - window.innerHeight < window.pageYOffset) {
      window.scrollTo(0, scrollHeight - window.innerHeight)
    }
  }
  function t397_updateTabsByHook(hookElRecordType, hookEl, currentID, recid) {
    var hookElTab;
    switch (hookElRecordType) {
      case '395':
        if (window.t395_alltabs_updateContent && window.t395_updateSelect && recid !== currentID) {
          window.t395_alltabs_updateContent(currentID);
          window.t395_updateSelect(currentID);
          hookElTab = hookEl ? hookEl.querySelector('.t395__tab') : null;
          if (hookElTab)
            hookElTab.click()
        }
        break;
      case '397':
        if (recid !== currentID) {
          t397_alltabs_updateContent(currentID);
          t397_updateSelect(currentID);
          hookElTab = hookEl ? hookEl.querySelector('.t397__tab') : null;
          if (hookElTab)
            hookElTab.click()
        }
        break
    }
  }
  function t397_checkVisibillityEl(el) {
    return !!(el && (el.offsetWidth || el.offsetHeight || el.getClientRects().length))
  }
  function t397_updateContentBySelect(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return !1;
    var select = rec.querySelector('.t397__select');
    if (select) {
      select.addEventListener('change', function() {
        var tabIndex = rec.querySelector('.t397__tab[data-tab-rec-ids=\'' + select.value + '\'][data-tab-index="' + select.selectedIndex + '"]');
        if (tabIndex)
          tabIndex.click()
      })
    }
  }
  function t397_updateSelect(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return !1;
    var activeTab = rec.querySelector('.t397__tab_active');
    var currentTabHooks = activeTab ? activeTab.getAttribute('data-tab-index') : '';
    var select = rec.querySelector('.t397__select');
    if (select)
      select.selectedIndex = currentTabHooks
  }
  function t397_scrollToTabs(recid, hash) {
    var rec = document.getElementById('rec' + recid);
    var curUrl = hash || decodeURI(window.location.href);
    var tabIndexNumber = curUrl.indexOf('#!/tab/');
    if (tabIndexNumber === -1)
      return !1;
    var tabIndexNumberStart = curUrl.indexOf('tab/');
    var firstOptionSelect = rec ? rec.querySelector('.t397__wrapper_mobile .t397__select option') : null;
    if (firstOptionSelect)
      firstOptionSelect.selected = !1;
    var tabRec = curUrl.substring(tabIndexNumberStart + 4, tabIndexNumberStart + 4 + recid.length);
    if (tabRec !== recid)
      return !1;
    var tabBlock = rec ? rec.querySelector('.t397') : null;
    var tabNumber = parseInt(curUrl.slice(tabIndexNumberStart + 4 + recid.length + 1), 10);
    var tabs = rec.querySelectorAll('.t397__tab');
    Array.prototype.forEach.call(tabs, function(tab, i) {
      if (i === tabNumber - 1) {
        tab.click();
        tab.classList.add('t397__tab_active')
      } else {
        tab.classList.remove('t397__tab_active')
      }
    });
    var tabsMob = rec.querySelectorAll('.t397__wrapper_mobile .t397__select option');
    var activeTabMob = tabsMob.length ? tabsMob[tabNumber - 1] : null;
    if (activeTabMob)
      activeTabMob.selected = !0;
    setTimeout(function() {
      t397_scrollToEl(tabBlock)
    }, 50)
  }
  function t397_scrollToEl(el) {
    function getElTopPos() {
      var elTopPos = el.getBoundingClientRect().top + window.pageYOffset;
      elTopPos = window.innerWidth > 960 ? elTopPos - 200 : elTopPos - 100;
      if (elTopPos < 0)
        elTopPos = 0;
      var documentHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight);
      var bottomViewportPoint = documentHeight - document.documentElement.clientHeight;
      if (elTopPos > bottomViewportPoint)
        elTopPos = bottomViewportPoint;
      return elTopPos
    }
    var startPosition = window.pageYOffset;
    var startTime = null;
    var duration = 300;
    function scrollAnimation(currentTime) {
      if (startTime === null)
        startTime = currentTime;
      var timeElapsed = currentTime - startTime;
      var elTopPos = getElTopPos();
      var distance = elTopPos - startPosition;
      var run = easeInQuad(timeElapsed, startPosition, distance, duration);
      window.scrollTo(0, run);
      document.body.setAttribute('data-scrollable', 'true');
      if (timeElapsed < duration) {
        requestAnimationFrame(scrollAnimation)
      } else {
        window.scrollTo(0, elTopPos);
        document.body.removeAttribute('data-scrollable')
      }
    }
    function easeInQuad(timeElapsed, startPosition, distance, duration) {
      timeElapsed /= duration;
      return distance * timeElapsed * timeElapsed + startPosition
    }
    requestAnimationFrame(scrollAnimation)
  }
  function t397_removeUrl() {
    var curUrl = window.location.href;
    var indexToRemove = curUrl.indexOf('#!/tab/');
    if (indexToRemove === -1) {
      indexToRemove = curUrl.indexOf('%23!/tab/')
    }
    curUrl = curUrl.substring(0, indexToRemove);
    if (indexToRemove !== -1) {
      if (typeof history.replaceState != 'undefined') {
        try {
          window.history.replaceState('', '', curUrl)
        } catch (err) {}
      }
    }
  }
  function t819_init(recid) {
    var rec = document.querySelector('#rec' + recid);
    if (!rec)
      return;
    var currentMode = document.querySelector('.t-records').getAttribute('data-tilda-mode');
    var tabs = rec.querySelectorAll('.t819__tab');
    var select = rec.querySelector('.t819__select');
    var content = rec.querySelectorAll('.t819__content');
    if (!tabs.length)
      return;
    if (!content.length)
      return;
    if (currentMode !== 'edit' && currentMode !== 'preview') {
      t819_scrollToTabs(recid);
      window.onload = function() {
        t819_scrollToTabs(recid)
      }
    }
    t819_showTabByUrl(recid, tabs, content, select);
    t819_showTab(recid, tabs, content, currentMode);
    t819_showTabMobile(recid, select, content, currentMode)
  }
  function t819_showTab(recid, tabs, content, currentMode) {
    var rec = document.querySelector('#rec' + recid);
    if (!rec)
      return;
    Array.prototype.forEach.call(tabs, function(tabItem) {
      tabItem.addEventListener('click', function(event) {
        var tabNumber = this.getAttribute('data-tab-number');
        rec.querySelector('.t819__wrapper').setAttribute('data-tab-current', tabNumber);
        Array.prototype.forEach.call(tabs, function(tabItem) {
          tabItem.classList.remove('t819__tab_active');
          var button = tabItem.querySelector('.t817__tab-name');
          if (button) {
            button.setAttribute('tabindex', -1);
            button.setAttribute('aria-selected', !1)
          }
        });
        Array.prototype.forEach.call(content, function(contentItem) {
          contentItem.classList.remove('t819__content_active');
          if (parseInt(contentItem.getAttribute('data-tab-content-number'), 10) === parseInt(tabNumber, 10)) {
            contentItem.classList.add('t819__content_active')
          }
        });
        tabItem.classList.add('t819__tab_active');
        var currentButton = tabItem.querySelector('.t817__tab-name');
        if (currentButton) {
          currentButton.setAttribute('tabindex', 0);
          currentButton.setAttribute('aria-selected', !0)
        }
        t819_changeUrl(recid, currentMode, tabNumber);
        t819__updateLazyLoad(currentMode);
        event.preventDefault()
      });
      tabItem.addEventListener('keydown', function(event) {
        var currentIndex = Number(rec.querySelector('.t819__wrapper').getAttribute('data-tab-current'));
        var prevent = !1;
        switch (event.key) {
          case 'Left':
          case 'ArrowLeft':
            currentIndex = currentIndex === 1 ? tabs.length : currentIndex - 1;
            t819_showActiveTabFromKeyboard(recid, tabs, content, currentMode, currentIndex);
            prevent = !0;
            break;
          case 'Right':
          case 'ArrowRight':
            currentIndex = currentIndex === tabs.length ? 1 : currentIndex + 1;
            t819_showActiveTabFromKeyboard(recid, tabs, content, currentMode, currentIndex);
            prevent = !0;
            break;
          default:
            break
        }
        if (prevent) {
          event.stopPropagation();
          event.preventDefault()
        }
      })
    })
  }
  function t819_showActiveTabFromKeyboard(recid, tabs, content, currentMode, currentIndex) {
    var rec = document.querySelector('#rec' + recid);
    Array.prototype.forEach.call(tabs, function(tabItem) {
      tabItem.classList.remove('t819__tab_active');
      var button = tabItem.querySelector('.t819__tab-name');
      if (button) {
        button.setAttribute('tabindex', -1);
        button.setAttribute('aria-selected', !1)
      }
    });
    Array.prototype.forEach.call(content, function(contentItem) {
      contentItem.classList.remove('t819__content_active')
    });
    var currentTab = rec.querySelector('[data-tab-number="' + currentIndex + '"]');
    if (!currentTab)
      return;
    currentTab.classList.add('t819__tab_active');
    var currentButton = currentTab.querySelector('.t819__tab-name');
    if (currentButton) {
      currentButton.setAttribute('tabindex', 0);
      currentButton.setAttribute('aria-selected', !0);
      currentButton.focus()
    }
    var currentContent = rec.querySelector('[data-tab-content-number="' + currentIndex + '"]');
    if (currentContent)
      currentContent.classList.add('t819__content_active');
    var tabList = rec.querySelector('.t819__wrapper');
    if (tabList)
      tabList.setAttribute('data-tab-current', currentIndex);
    t819_changeUrl(recid, currentMode, currentIndex);
    t819__updateLazyLoad(currentMode)
  }
  function t819_changeUrl(recid, currentMode, index) {
    t819_removeUrl();
    if (currentMode !== 'edit' && currentMode !== 'preview') {
      if (typeof history.replaceState === 'function') {
        window.history.replaceState('', '', window.location.href + '#!/tab/' + recid + '-' + index)
      }
    }
  }
  function t819__updateLazyLoad(currentMode) {
    if (!currentMode) {
      if (window.lazy === 'y' || document.querySelector('#allrecords').getAttribute('data-tilda-lazy') === 'yes') {
        t_onFuncLoad('t_lazyload_update', function() {
          t_lazyload_update()
        })
      }
    }
  }
  function t819_showTabMobile(recid, select, content, currentMode) {
    select.addEventListener('change', function(event) {
      var tabNumberMobile = this.value;
      Array.prototype.forEach.call(content, function(contentItem) {
        contentItem.classList.remove('t819__content_active');
        if (parseInt(contentItem.getAttribute('data-tab-content-number'), 10) === parseInt(tabNumberMobile, 10)) {
          contentItem.classList.add('t819__content_active')
        }
      });
      t819_removeUrl();
      if (currentMode !== 'edit' && currentMode !== 'preview') {
        if (typeof history.replaceState === 'function') {
          window.history.replaceState('', '', window.location.href + '#!/tab/' + recid + '-' + tabNumberMobile)
        }
      }
      if (!currentMode) {
        if (window.lazy === 'y' || document.querySelector('#allrecords').getAttribute('data-tilda-lazy') === 'yes') {
          t_onFuncLoad('t_lazyload_update', function() {
            t_lazyload_update()
          })
        }
      }
      event.preventDefault()
    })
  }
  function t819_showTabByUrl(recid, tabs, content, select) {
    var rec = document.querySelector('#rec' + recid);
    var currentUrl = window.location.href;
    var tabIndexNumber = currentUrl.indexOf(recid + '-');
    var tabIndex = currentUrl.substring(tabIndexNumber + recid.length + 1);
    if (tabIndexNumber !== -1) {
      Array.prototype.forEach.call(tabs, function(tabItem) {
        if (parseInt(tabItem.getAttribute('data-tab-number'), 10) === parseInt(tabIndex, 10)) {
          tabItem.classList.add('t819__tab_active');
          tabItem.querySelector('.t819__tab-name').setAttribute('tabindex', 0);
          tabItem.querySelector('.t819__tab-name').setAttribute('aria-selected', !0)
        }
      });
      Array.prototype.forEach.call(content, function(contentItem) {
        if (parseInt(contentItem.getAttribute('data-tab-content-number'), 10) === parseInt(tabIndex, 10)) {
          contentItem.classList.add('t819__content_active')
        }
      });
      select.value = tabIndex;
      rec.querySelector('.t819__wrapper').setAttribute('data-tab-current', tabIndex)
    } else {
      tabs[0].classList.add('t819__tab_active');
      content[0].classList.add('t819__content_active');
      rec.querySelector('.t819__wrapper').setAttribute('data-tab-current', 1);
      tabs[0].querySelector('.t819__tab-name').setAttribute('tabindex', 0);
      tabs[0].querySelector('.t819__tab-name').setAttribute('aria-selected', !0)
    }
  }
  function t819_scrollToTabs(recid) {
    var currentUrl = window.location.href;
    var tabIndexNumber = currentUrl.indexOf('#!/tab/');
    var tabIndexNumberStart = currentUrl.indexOf('tab/');
    if (parseInt(tabIndexNumber, 10) !== -1) {
      var tabRecord = currentUrl.substring(tabIndexNumberStart + 4, tabIndexNumberStart + 4 + recid.length);
      if (parseInt(tabRecord, 10) === parseInt(recid, 10)) {
        var tabBlock = document.querySelector('#rec' + tabRecord).querySelector('.t819');
        var targetOffset = tabBlock.getBoundingClientRect().top + window.pageYOffset;
        if (window.innerWidth > 960) {
          var target = targetOffset - 200
        } else {
          var target = targetOffset - 100
        }
        t819_scrollToEl(target, 300)
      }
    }
  }
  function t819_removeUrl() {
    var currentUrl = window.location.href;
    var indexToRemove = currentUrl.indexOf('#!/tab/');
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent) && indexToRemove < 0) {
      indexToRemove = currentUrl.indexOf('%23!/tab/')
    }
    currentUrl = currentUrl.substring(0, indexToRemove);
    if (parseInt(indexToRemove, 10) !== -1) {
      if (typeof history.replaceState === 'function') {
        window.history.replaceState('', '', currentUrl)
      }
    }
  }
  function t819_scrollToEl(elTopPos, duration) {
    if (elTopPos === window.pageYOffset)
      return !1;
    var difference = window.pageYOffset;
    var cashedDiff = window.pageYOffset;
    var step = (10 * (elTopPos || window.pageYOffset)) / duration;
    var timer = setInterval(function() {
      if (cashedDiff > elTopPos) {
        difference -= step
      } else {
        difference += step
      }
      window.scrollTo(0, difference);
      document.body.setAttribute('data-scrollable', 'true');
      if (cashedDiff > elTopPos && window.pageYOffset <= elTopPos) {
        document.body.removeAttribute('data-scrollable');
        clearInterval(timer)
      } else if (cashedDiff <= elTopPos && window.pageYOffset >= elTopPos) {
        document.body.removeAttribute('data-scrollable');
        clearInterval(timer)
      }
    }, 10);
    var timer2 = setTimeout(function() {
      clearInterval(timer);
      document.body.removeAttribute('data-scrollable');
      clearTimeout(timer2)
    }, duration * 2)
  }
  function t602_init(recid) {
    var rec = document.getElementById('rec' + recid);
    if (!rec)
      return;
    var indicator = rec.querySelector('.t602__indicator');
    if (!indicator)
      return;
    window.addEventListener('scroll', t_throttle(function() {
      var documentHeight = document.body.clientHeight;
      var windowScrollTop = document.documentElement.scrollTop;
      var windowHeight = window.innerHeight;
      var scrollPercent = (windowScrollTop / (documentHeight - windowHeight)) * 100;
      indicator.style.width = scrollPercent + '%'
    }, 100))
  }
  function t367_createCookie(cookieName, cookieValue, cookieTime) {
    var expires = '';
    if (cookieTime) {
      if (Number(cookieTime) > 9999999) {
        cookieTime = 9999999
      }
      var date = new Date();
      date.setTime(date.getTime() + cookieTime * 24 * 60 * 60 * 1000);
      expires = '; expires=' + date.toGMTString()
    }
    document.cookie = cookieName + '=' + cookieValue + expires + '; path=/'
  }
  function t367_readCookie(cookieName) {
    cookieName = cookieName + '=';
    var allCookies = document.cookie.split(';');
    for (var i = 0; i < allCookies.length; i++) {
      var cookie = allCookies[i];
      while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1, cookie.length)
      }
      if (cookie.indexOf(cookieName) === 0) {
        return cookie.substring(cookieName.length, cookie.length)
      }
    }
    return null
  }
  function t367_autoInit(recid) {
    var rec = document.querySelector('#rec' + recid);
    if (!rec)
      return;
    var screenMin = rec.getAttribute('data-screen-min');
    var screenMax = rec.getAttribute('data-screen-max');
    var windowWidth = window.innerWidth;
    if (typeof screenMin === 'string') {
      if (windowWidth < parseInt(screenMin, 10)) {
        return !0
      }
    }
    if (typeof screenMax === 'string') {
      if (windowWidth > parseInt(screenMax, 10)) {
        return !0
      }
    }
    var openerLink = rec.querySelector('.t367__opener');
    if (!t367_isPopupRecVisible(openerLink))
      return;
    var linkhook = openerLink.getAttribute('href');
    if (!linkhook)
      return;
    var cookieName = openerLink.getAttribute('data-cookie-name');
    var cookieTime = openerLink.getAttribute('data-cookie-time');
    var cookieValue = 't367cookie';
    var cookie = t367_readCookie(cookieName);
    var timeout = parseInt(openerLink.getAttribute('data-trigger-time'), 10) * 1000;
    var wrapperBlock = rec.querySelector('.t367');
    if (!wrapperBlock)
      return;
    if (cookie)
      wrapperBlock.innerHTML = '';
    else if (openerLink) {
      setTimeout(function() {
        openerLink.click();
        wrapperBlock.innerHTML = '';
        t367_createCookie(cookieName, cookieValue, cookieTime)
      }, timeout)
    }
  }
  function t367_isPopupRecVisible(openerLink) {
    if (openerLink) {
      var linkText = openerLink.getAttribute('href');
      var popupElement = document.querySelector('.t-popup[data-tooltip-hook="' + linkText + '"]');
      if (popupElement) {
        var popupElementRec = popupElement.closest('.r');
        var minScreen = popupElementRec.getAttribute('data-screen-min');
        if (minScreen && minScreen !== '') {
          minScreen = minScreen.replace('px', '');
          if (parseInt(minScreen, 10) > window.innerWidth) {
            return !1
          }
        }
        var maxScreen = popupElementRec.getAttribute('data-screen-max');
        if (maxScreen && maxScreen !== '') {
          maxScreen = maxScreen.replace('px', '');
          if (parseInt(maxScreen, 10) < window.innerWidth) {
            return !1
          }
        }
      }
      return !0
    }
  }

</script>
