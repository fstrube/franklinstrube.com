import './bootstrap';
import hljs from 'highlight.js';
import 'highlight.js/styles/a11y-dark.css';

$(function() {
    $("#header .toggle-navigation").click(function(el) {
        if ( $("#header .navigation:visible").length ) {
            //var paddingTop = parseInt($(".main").css("paddingTop")) - $("#header .navigation").height();
            //console.log('closing', paddingTop);
            //$(".main").animate({"padding-top": paddingTop}, "fast");
            $("#header .navigation").slideUp("fast", function() {$("#header .navigation").removeAttr("style");});
        } else {
            //var paddingTop = parseInt($(".main").css("paddingTop")) + $("#header .navigation").height();
            //console.log('opening', paddingTop);
            $("#header .navigation").slideDown("fast");
            //$(".main").animate({"padding-top": paddingTop}, "fast");
        }

        return false;
    });

    hljs.highlightAll();
});
