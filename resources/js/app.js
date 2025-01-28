import './bootstrap';
import hljs from 'highlight.js';
import CopyButtonPlugin from 'highlightjs-copy';
import 'highlight.js/styles/a11y-dark.css';
import 'highlightjs-copy/styles/highlightjs-copy.css';

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

    hljs.addPlugin(new CopyButtonPlugin());
    hljs.highlightAll();
});
