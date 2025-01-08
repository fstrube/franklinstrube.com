<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title') &laquo; #!/bin/strube
        </title>

        <link rel="icon" href="/favicon.ico">

        <!-- Fonts -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700|Yanone+Kaffeesatz:400,700,300" type="text/css" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div id="header">
            <header>
                <h1><a href="/">#!/bin/<span>strube</span></a></h1>
                <nav role="navigation">
                    <button class="toggle-navigation">Show Navigation</button>
                </nav>
            </header>
        </div>
        <div class="wrapper">
            <main>
                @yield('content')
            </main>
            <div class="push"></div>
        </div>
        <div id="footer" class="hcard">
            <footer>
                <div class="about">
                    <section>
                        <h4><a name="about">Who is <em>strube</em>?</a></h4>
                        <img class="photo grayscale" src="/images/me.jpg" alt="avatar" width="100" />
                        <!--p>I am a web developer living and working in Alexandria, VA. I have been working in the web industry for four years. In addition to programming the web, I enjoy playing endless hours of Civilization II (sad ... I know).</p-->
                        <p>Contrary to what the header of this page suggests, <strong>strube</strong> is not a computer program. Rather, it is the surname of Franklin P. Strube.</p>
                        <p>Frank spends his daylight hours leading the technology team at <a href="//morevang.com" target="_blank">More Vang</a> and spends his night staying up way too late coding. He is currently:</p>
                        <dl>
                            <dt>Living In</dt>
                            <dd>Washington, D.C.</dd>

                            <dt>Working At</dt>
                            <dd><a href="//morevang.com" target="_blank">More Vang</a> as the Chief Software Architect</dd>

                            <dt>Learning About</dt>
                            <!--dd>Python GUI programming, Mobile development, Raspberry Pi…</dd-->
                            <dd><a href="//laravel.com" target="_blank">Laravel</a>, containerization, deployment strategies</dd>

                            <dt>Studied At</dt>
                            <dd>Rochester Institute of Technology<br />
                                B.S. in Networking, Security, and System Administration<br />
                                Minors in Economics and Entrepreneurship
                            </dd>
                        </dl>
                    </section>
                </div>
                <a name="contact"></a>
                <div class="social-media">
                    <a class="github" title="GitHub: fstrube" href="http://github.com/fstrube" rel="me">fstrube</a>
                    {{-- <a class="forrst" title="Forrst: fstrube" href="http://forrst.com/people/fstrube" rel="me">fstrube</a> --}}
                    {{-- <a class="twitter" title="Twitter: @strube" href="http://twitter.com/strube" rel="me">@strube</a> --}}
                    <a class="linkedin" title="LinkedIn: fstrube" href="http://linkedin.com/in/fstrube" rel="me">fstrube</a>
                </div>
                <div class="copyright">
                    &copy; {{ date('Y') }}
                    <span class="n">
                        <span class="given-name">Franklin</span>
                        <span class="additional-name">P.</span>
                        <span class="family-name">Strube</span>
                    </span>
                    <a class="url" href="http://franklinstrube.com">//franklinstrube.com</a>
                </div>
            </footer>
        </div>

        <!--
        <div class="debug">
            <div class="media-query-portrait"></div>
            <div class="media-query-landscape"></div>
            <div class="media-query-1000"></div>
            <div class="media-query-500"></div>
            <div class="media-query-320"></div>
        </div>
        -->
    </body>
</html>
