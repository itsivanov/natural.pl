!function(e){function t(){643>o.width()?(i.attr("aria-expanded","false"),a.attr("aria-expanded","false"),i.attr("aria-controls","primary-menu")):(i.removeAttr("aria-expanded"),a.removeAttr("aria-expanded"),i.removeAttr("aria-controls"))}var n,i,a,r=e("body"),o=e(window);if(n=e("#site-navigation"),i=n.find(".menu-toggle"),a=n.find(".nav-menu"),e(function(){if(r.is(".sidebar")){var t=e("#secondary .widget-area"),n=0===t.length?-40:t.height(),i=e("#tertiary .widget-area").height()-e("#content").height()-n;i>0&&o.innerWidth()>999&&e("#colophon").css("margin-top",i+"px")}}),function(){if(n.length&&i.length){if(!a.length||!a.children().length)return void i.hide();i.on("click.twentythirteen",function(){n.toggleClass("toggled-on"),n.hasClass("toggled-on")?(e(this).attr("aria-expanded","true"),a.attr("aria-expanded","true")):(e(this).attr("aria-expanded","false"),a.attr("aria-expanded","false"))}),"ontouchstart"in window&&a.find(".menu-item-has-children > a, .page_item_has_children > a").on("touchstart.twentythirteen",function(t){var n=e(this).parent("li");n.hasClass("focus")||(t.preventDefault(),n.toggleClass("focus"),n.siblings(".focus").removeClass("focus"))}),a.find("a").on("focus.twentythirteen blur.twentythirteen",function(){e(this).parents(".menu-item, .page_item").toggleClass("focus")})}}(),o.on("load.twentythirteen",t).on("resize.twentythirteen",function(){t()}),o.on("hashchange.twentythirteen",function(){var e=document.getElementById(location.hash.substring(1));e&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())}),e.isFunction(e.fn.masonry)){var s=r.is(".sidebar")?228:245,d=e("#secondary .widget-area");d.masonry({itemSelector:".widget",columnWidth:s,gutterWidth:20,isRTL:r.is(".rtl")}),"undefined"!=typeof wp&&wp.customize&&wp.customize.selectiveRefresh&&(wp.customize.selectiveRefresh.bind("partial-content-rendered",function(e){var t=e.partial.extended(wp.customize.widgetsPreview.WidgetPartial)&&e.removedNodes instanceof jQuery&&e.removedNodes.is(".masonry-brick")&&e.container instanceof jQuery;t&&e.container.css({position:e.removedNodes.css("position"),top:e.removedNodes.css("top"),left:e.removedNodes.css("left")})}),wp.customize.selectiveRefresh.bind("sidebar-updated",function(e){"sidebar-1"===e.sidebarId&&(d.masonry("reloadItems"),d.masonry("layout"))}))}}(jQuery);