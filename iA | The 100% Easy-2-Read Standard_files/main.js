/*!
 Autosize 1.18.17
 license: MIT
 http://www.jacklmoore.com/autosize
 */
!function(e){var t,o={className:"autosizejs",id:"autosizejs",append:"\n",callback:!1,resizeDelay:10,placeholder:!0},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',a=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent","whiteSpace"],n=e(i).data("autosize",!0)[0];n.style.lineHeight="99px","99px"===e(n).css("lineHeight")&&a.push("lineHeight"),n.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),n.parentNode!==document.body&&e(document.body).append(n),this.each(function(){function o(){var t,o=window.getComputedStyle?window.getComputedStyle(u,null):null;o?(t=parseFloat(o.width),("border-box"===o.boxSizing||"border-box"===o.webkitBoxSizing||"border-box"===o.mozBoxSizing)&&e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){t-=parseFloat(o[i])})):t=p.width(),n.style.width=Math.max(t,0)+"px"}function s(){var s={};if(t=u,n.className=i.className,n.id=i.id,d=parseFloat(p.css("maxHeight")),e.each(a,function(e,t){s[t]=p.css(t)}),e(n).css(s).attr("wrap",p.attr("wrap")),o(),window.chrome){var r=u.style.width;u.style.width="0px";{u.offsetWidth}u.style.width=r}}function r(){var e,a;t!==u?s():o(),n.value=!u.value&&i.placeholder?p.attr("placeholder")||"":u.value,n.value+=i.append||"",n.style.overflowY=u.style.overflowY,a=parseFloat(u.style.height)||0,n.scrollTop=0,n.scrollTop=9e4,e=n.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=z,Math.abs(a-e)>.01&&(u.style.height=e+"px",n.className=n.className,w&&i.callback.call(u,u),p.trigger("autosize.resized"))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==b&&(b=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),z=0,w=e.isFunction(i.callback),f={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},b=p.width(),g=p.css("resize");p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(z=p.outerHeight()-p.height()),c=Math.max(parseFloat(p.css("minHeight"))-z||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word"}),"vertical"===g?p.css("resize","none"):"both"===g&&p.css("resize","horizontal"),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(f).removeData("autosize")}),r())})):this}}(jQuery||$);

/*! jQuery requestAnimationFrame - v0.1.2 - 2013-04-15
 * https://github.com/gnarf37/jquery-requestAnimationFrame
 * Copyright (c) 2013 Corey Frang; Licensed MIT */
(function(e){function o(){t&&(i(o),jQuery.fx.tick())}var t,n=0,r=["webkit","moz"],i=window.requestAnimationFrame,s=window.cancelAnimationFrame;for(;n<r.length&&!i;n++)i=window[r[n]+"RequestAnimationFrame"],s=s||window[r[n]+"CancelAnimationFrame"]||window[r[n]+"CancelRequestAnimationFrame"];i?(window.requestAnimationFrame=i,window.cancelAnimationFrame=s,jQuery.fx.timer=function(e){e()&&jQuery.timers.push(e)&&!t&&(t=!0,o())},jQuery.fx.stop=function(){t=!1}):(window.requestAnimationFrame=function(e,t){var r=(new Date).getTime(),i=Math.max(0,16-(r-n)),s=window.setTimeout(function(){e(r+i)},i);return n=r+i,s},window.cancelAnimationFrame=function(e){clearTimeout(e)})})(jQuery);

/**
 * iA.net
 */
var iA = (function ($) {
    'use strict';


    /**
     * Map of events, selectors to actions
     */
    var events = {
        'keyup label input': 'floatLabels',
        'click .addresses a[href^="mailto:"]': 'toggleContactForm',
        'click .addresses a[href*=".createsend.com"], a[href*="newsletter.ia.net"]': 'toggleNewsletterForm',
        'click .writer-bugreport .bug-report': 'toggleBugReportForm',
        'click .writer-bugreport .feature-request': 'toggleFeatureRequestForm',
        'submit #newsletterForm': 'signUpToNewsletter',
        'submit #contactForm': 'submitForm',
        'submit #bugReportForm': 'submitForm',
        'submit #featureRequestForm': 'submitForm',
        'click #toc .third a': 'scrollToAnchorAndHighlight',
        'click a[data-video]': 'playVideo'
    };

    /**
     * Toggles the visibility of a form
     * @param target
     * @param form
     */
    var toggleForm = function(target, form){
        var $target = $(target);
        var $form = $(document.getElementById(form));
        
        if($target.hasClass('active')){
            $target.removeClass('active');
            $form.slideUp().removeClass('expanded');
        } else {
            $target.addClass('active');
            $form.addClass('expanded').slideDown('fast', function(){
                scrollTo('form:visible:first');
                // Enable textarea autosizing
                $form.find('textarea').not('.autosized').autosize().addClass('.autosized');
                $form.find('input, textarea').eq(0).focus();
            });
            $target.siblings('.active').removeClass('active');
            $('form').not($form).slideUp().removeClass('expanded sent invalid');
        }
    };
    
    var scrollTo = function(target, hash){
        $('html,body').animate({
            scrollTop: $(target).offset().top
        }, 'fast', function(){
            if(target[0] == '#'){ window.location.hash = target; }
        });
    };
    
    var actions = {
        floatLabels: function(e){
            var empty = $.trim($(e.target).val()) == '';
            $(e.target).parent()
                .toggleClass('empty', empty)
                .toggleClass('float-label', !empty);
        },
        playVideo: function( ev ){
            ev.preventDefault();
            var iframe = $('<iframe>').attr({
                'webkitallowfullscreen': true,
                'mozallowfullscreen': true,
                'allowfullscreen': true,
                'frameborder': 0,
                'width': 640,
                'height': 360,
                'src': this.getAttribute('data-video')
            });
            $('iframe').replaceWith( iframe );
            $( this ).addClass('active').siblings().removeClass('active');
        },
        toggleContactForm: function(e){
            toggleForm(e.target, 'contactForm');
        },
        toggleNewsletterForm: function(e){
            toggleForm(e.target, 'newsletterForm');
        },
        toggleBugReportForm: function(e){
            toggleForm(e.target, 'bugReportForm');
        },
        toggleFeatureRequestForm: function(e){
            toggleForm(e.target, 'featureRequestForm');
        },
        submitForm: function(e){
            var $form = $(this);

            if(!$form.h5Validate('allValid')){
                $form.addClass('invalid');
                setTimeout(function(){
                    $form.removeClass('invalid');
                }, 1000);
                return false;
            }

            // Catch double click on submit button
            if($form.hasClass('sending')){ return false; }

            // Build a data object with all the fields that have a `name="..."` attribute
            var data = {};
            $form.find('[name]').each(function(){ data[$(this).attr('name')] = $(this).val(); });

            // Submit the form asynchronously
            $.ajax({
                data:       data,
                method:     'POST',
                url:        $form.attr('action')
            }).done(function(){
                // TODO: Update so that the CSS classes are set logically (`sending`, then `sent`)
                $form.addClass('sending').addClass('sent');
                $form.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
                    $form.slideUp('fast', function(){ $form.removeClass('sending'); });
                });
            }).fail(function(){
                // TODO: Display error message
                console.log(arguments);
            });
        },
        signUpToNewsletter: function(e){
            var $form = $(this);

            if(!$form.h5Validate('allValid')){
                $form.addClass('invalid');
                return false;
            }

            // Catch double click on submit button
            if($form.hasClass('sending')){ return false; }

            // TODO: DRY
            $form.addClass('sending').addClass('sent');

            $.ajax({
                url: 'https://informationarchitectsinc.createsend.com/t/r/s/oithik/?callback=?',
                dataType: 'jsonp',
                data: {
                    'cm-oithik-oithik': $form.find('[name="email"]').val()
                }
            }).done(function(){
                    $form.slideUp('fast', function(){ $form.removeClass('sending'); });
            });

            $(this).addClass('sent');
        },
        scrollToAnchorAndHighlight: function(e){
            var anchor = $(e.target).attr('href');
            scrollTo(anchor, anchor);
        }
    };
    
    
    /**
     * Initialisation function
     */
    var init = function(){
        // Bind all events
        $.each(events, function (eventSelector, action) {
            
            var event = eventSelector.split(/\s+/)[0];
            var selector = eventSelector.slice(event.length);
            
            $(selector).on(event, function(e){
                if($.isFunction(actions[action])){
                    actions[action].call(this, e);
                    e.preventDefault();
                }
            });
        })
        
        // Collapse all forms (TODO: remove)
        $('form').slideUp(0);
        
        // Enable article navigation
        $(window).on('keyup', function(e){
            var mappings = {
                37: '.articleNav__previous',
                39: '.articleNav__next'
            };
            if(typeof mappings[e.keyCode] != 'undefined' && $(mappings[e.keyCode]).size() > 0){
                document.location = $(mappings[e.keyCode]).attr('href');
            }
        });
        

        // Enable form validation fallback
        $('form').h5Validate();

    };

    return {
        'init': init,
    }
})(jQuery);

$(iA.init);
