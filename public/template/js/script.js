$(window).bind("load", function () {
    $('.selectBox span.filter-option.pull-left').text('موردی انتخاب نشده');
    $('.selectBox .dropdown-menu ul li.selected').removeClass('selected');
    $('body').addClass(getCookie('themeColorClass'));

    skinChanger();
    activateNotificationAndTasksScroll();

    setSkinListHeightAndScroll();
    setSettingListHeightAndScroll();
    $(window).resize(function () {
        setSkinListHeightAndScroll();
        setSettingListHeightAndScroll();
    });


//Skin changer
    function skinChanger() {
        $('.left-sidebar .demo-choose-skin li').on('click', function () {
            var $body = $('body');
            var $this = $(this);

            var existTheme = $('.left-sidebar .demo-choose-skin li.active').data('theme');
            $('.left-sidebar .demo-choose-skin li').removeClass('active');
            $body.removeClass('theme-' + existTheme);
            $this.addClass('active');

            var color = "theme-" + $this.data('theme');

            $body.addClass(color);

            setCookie('themeColorClass', color);

            location.reload();

        });
    }

//Skin tab content set height and show scroll
    function setSkinListHeightAndScroll() {
        var height = $(window).height() - ($('.navbar').innerHeight() + $('.left-sidebar .nav-tabs').outerHeight());
        var $el = $('.demo-choose-skin');

        $el.slimScroll({ destroy: true }).height('auto');
        $el.parent().find('.slimScrollBar, .slimScrollRail').remove();

        $el.slimscroll({
            height: height + 'px',
            color: 'rgba(0,0,0,0.5)',
            size: '4px',
            alwaysVisible: false,
            borderRadius: '0',
            railBorderRadius: '0'
        });
    }

//Setting tab content set height and show scroll
    function setSettingListHeightAndScroll() {
        var height = $(window).height() - ($('.navbar').innerHeight() + $('.left-sidebar .nav-tabs').outerHeight());
        var $el = $('.left-sidebar .demo-settings');

        $el.slimScroll({ destroy: true }).height('auto');
        $el.parent().find('.slimScrollBar, .slimScrollRail').remove();

        $el.slimscroll({
            height: height + 'px',
            color: 'rgba(0,0,0,0.5)',
            size: '4px',
            alwaysVisible: false,
            borderRadius: '0',
            railBorderRadius: '0'
        });
    }

//Activate notification and task dropdown on top right menu
    function activateNotificationAndTasksScroll() {
        $('.navbar-right .dropdown-menu .body .menu').slimscroll({
            height: '254px',
            color: 'rgba(0,0,0,0.5)',
            size: '4px',
            alwaysVisible: false,
            borderRadius: '0',
            railBorderRadius: '0'
        });
    }

//Google Analiytics ======================================================================================
    addLoadEvent(loadTracking);
    var trackingId = 'UA-30038099-6';

    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function () {
                oldonload();
                func();
            }
        }
    }

    function loadTracking() {
        /*(function (i, s, o, g, r, a, m) {
         i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
         (i[r].q = i[r].q || []).push(arguments)
         }, i[r].l = 1 * new Date(); a = s.createElement(o),
         m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
         })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

         ga('create', trackingId, 'auto');
         ga('send', 'pageview');*/
    }

    function setCookie(cname, cvalue) {
        document.cookie = cname + "=" + cvalue + ";";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var user = getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }
//========================================================================================================
});