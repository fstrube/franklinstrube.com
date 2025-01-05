/**
 * Copyright 2013 Franklin P. Strube
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
$(document).ready(function() {
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
});
