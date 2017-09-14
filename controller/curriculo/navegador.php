<?php
    $useragent = $_SERVER['HTTP_USER_AGENT'];
							
    if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'IE';
    } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'Opera';
    } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'Firefox';
    } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'Chrome';
    } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
        $browser_version=$matched[1];
        $browser = 'Safari';
    } else {
        // navegador não reconhecido
        $browser_version = 0;
        $browser= 'IE';
    }
    // print "browser: $browser $browser_version";

    if($browser != "IE") {
        print "<!-- Mouse animado -->
                <div class='mouse-corpo w3-animate-zoom hidden-xs'>
                    <div class='mouse'>
                        <div class='bolinha'>
                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 54.9 91' style='enable-background:new 0 0 54.9 91' xml:space='preserve'>
                                <path linejoin='round' stroke-linecap='round' stroke-miterlimit='10' d='M27.4,3.6L27.4,3.6C14.2,3.6,3.5,14.3,3.5,27.5v36c0,13.2,10.7,23.9,23.9,23.9h0c13.2,0,23.9-10.7,23.9-23.9v-36C51.4,14.3,40.7,3.6,27.4,3.6z'/>
                            </svg>
                        </div>
                        <div class='mouse-esquerdo'>
                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 27.4 91' style='enable-background:new 0 0 27.4 91;' xml:space='preserve'>
                                <path linejoin='round' stroke-linecap='round' stroke-miterlimit='10' class='animacao' d='M27.4,87.5L27.4,87.5c-13.2,0-23.9-10.7-23.9-23.9v-36c0-13.2,10.7-23.9,23.9-23.9h0'/>
                            </svg>
                        </div>
                        <div class='mouse-direito'>
                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 27.4 91' style='enable-background:new 0 0 27.4 91;' xml:space='preserve'>
                                <path linejoin='round' stroke-linecap='round' stroke-miterlimit='10' class='animacao' d='M0,3.6L0,3.6c13.2,0,23.9,10.7,23.9,23.9v36c0,13.2-10.7,23.9-23.9,23.9h0'/>
                            </svg>
                        </div>
                    </div>
                    <p id='texto-scroll'>Scroll</p>
                </div>
            <!-- /Mouse animado -->
            <style>
                .animated {
                    -webkit-animation-duration: 1s !important;
                    animation-duration: 1s !important;
                    -webkit-animation-fill-mode: both !important;
                    animation-fill-mode: both !important;
                }
            </style>";
    } else {
        print "<style>
                    #carta_fechar_baixo {
                        position: absolute;
                        margin-top: -42px;
                        margin-left: 47%;
                    }
                    
                    #carta_fechar_baixo:hover {
                        background-color: #AC1313;
                        position: absolute;
                        margin-top: -42px;
                        margin-left: 47%;
                    }
                </style>";
    }
?>