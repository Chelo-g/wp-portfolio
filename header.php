<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- Adobe Font -->
    <script>
    (function(d) {
        var config = {
                kitId: 'qig5ebg',
                scriptTimeout: 3000,
                async: true
            },
            h = d.documentElement,
            t = setTimeout(function() {
                h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
            }, config.scriptTimeout),
            tk = d.createElement("script"),
            f = false,
            s = d.getElementsByTagName("script")[0],
            a;
        h.className += " wf-loading";
        tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
        tk.async = true;
        tk.onload = tk.onreadystatechange = function() {
            a = this.readyState;
            if (f || a && a != "complete" && a != "loaded") return;
            f = true;
            clearTimeout(t);
            try {
                Typekit.load(config)
            } catch (e) {}
        };
        s.parentNode.insertBefore(tk, s)
    })(document);
    </script>
</head>

<body>
    <header class="header">
        <h1 class="logo">
            Chelo's portfolio
        </h1>
        <nav class="nav">
            <ul class="nav__items">
                <li class="nav__item" data-text="About"><a class="nav__link" href="#about">About</a></li>
                <li class="nav__item" data-text="Service"><a class="nav__link" href="#service">Service</a></li>
                <li class="nav__item" data-text="Work"><a class="nav__link" href="#work">Work</a></li>
                <li class="nav__item" data-text="Contact"> <a Contact class="nav__link" href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="btn-burger">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <?php wp_head(); ?>
    </header>