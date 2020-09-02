<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="scannerStyle.css">
    
    <script type="text/javascript" src="llqrcode.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <script type="text/javascript" src="webqr.js"></script>
    
    <title>IGDE</title>

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-24451557-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

</head>

<body>

    <div id="outdiv"></div>

    <form action="scanner.php" method="post">
    
        <textarea name="identificador" id="result" cols="5" rows="1"></textarea>

        <br><input type="submit" name="entrada" value="Registrar Entrada"><br>
        <input type="submit" name="salida" value="Registrar Salida">
    </form>

    <div id="webcamimg"></div>
    <div id="qrimg"></div>
    

    <div id="mainbody">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8418802408648518" data-ad-slot="2527990541" data-ad-format="auto"></ins>

        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>


    <canvas id="qr-canvas" width="800" height="600"></canvas>
    <script type="text/javascript">load();</script>
</body>
</html>