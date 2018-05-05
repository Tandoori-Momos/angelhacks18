<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JavaScript OCR demo</title>

    <meta name="Description" content="Optical Character Recognition demo in JavaScript"/>
    <meta property="og:image" content="http://kdzwinel.github.io/JS-OCR-demo/img/process.png"/>
    <link rel="image_src" href="http://kdzwinel.github.io/JS-OCR-demo/img/process.png"/>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/jquery.Jcrop.min.css"/>
    <link rel="stylesheet" href="css/scan.css"/>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body class="step1">

<div class="container">
    <div class="alert alert-danger"><strong>Oops!</strong> <span></span></div>
    <div class="jumbotron">
        <div id="step1">
            <h1><i class="glyphicon glyphicon-camera"></i></h1>

            <p class="lead">
                Take a good picture of a huge, printed text.
                <i class="glyphicon glyphicon-question-sign help" data-placement="bottom"
                   data-content="<img src='img/step1.png' />" data-html="true"></i>
            </p>

            <figure class="not-ready">
                <video autoplay></video>
            </figure>

            <button class="btn btn-lg btn-success" disabled id="takePicture">Take a picture</button>
        </div>
        <div id="step2">
            <h1><i class="glyphicon glyphicon-pencil"></i></h1>

            <p class="lead">
                Crop the picture and adjust it so that text is clearly visible.
                <i class="glyphicon glyphicon-question-sign help" data-placement="bottom"
                   data-content="<img src='img/step2.png' />" data-html="true"></i>
            </p>

            <figure>
                <canvas style="display:none"></canvas>
                <img src=""/>
            </figure>

            <p>Brightness: <input type="range" min="0" max="100" id="brightness" value="20"></p>

            <p>Contrast: <input type="range" min="0" max="100" id="contrast" value="90"></p>

            <button class="btn btn-lg btn-success" id="adjust" disabled>Done</button>
        </div>
        <div id="step3">
            <h1><i class="glyphicon glyphicon-text-height"></i></h1>

            <p class="lead">You'll find the recognized text below.</p>

            <figure>
                <canvas></canvas>
            </figure>

            <blockquote>
                <p id="result"></p>
                <footer></footer>
            </blockquote>

            <button class="btn btn-lg btn-default" id="go-back">Go back</button>
            <button class="btn btn-lg btn-default" id="start-over">Start over</button>
        </div>
    </div>

    <div class="header">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="#" data-step="1">#1 <i class="glyphicon glyphicon-camera"></i></a></li>
            <li class="disabled"><a href="#" data-step="2">#2 <i class="glyphicon glyphicon-pencil"></i></a></li>
            <li class="disabled"><a href="#" data-step="3">#3 <i class="glyphicon glyphicon-text-height"></i></a></li>
        </ul>
        <h3 class="text-muted">JavaScript OCR demo</h3>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            <h4>Step #1 - getUserMedia</h4>

            <p>getUserMedia is a HTML5 API that allows web apps to access user's camera and microphone. Read more on <a
                    href="http://www.html5rocks.com/en/tutorials/getusermedia/intro/">HTML5 Rocks</a>.</p>

            <h4>Step #2 - glfx.js, JCrop</h4>

            <p><a href="https://github.com/evanw/glfx.js/">glfx.js</a> was used for image effects (sharpening, contrast,
                etc.). Cropping functionality (with touch support) is provided by jQuery plugin <a
                        href="https://github.com/tapmodo/Jcrop">Jcrop</a>.</p>

            <h4>Step #3 - ocrad.js</h4>

            <p><a href="https://github.com/antimatter15/ocrad.js/">ocrad.js</a> was used for OCR (Optical Character
                Recognition). It is a pure-javascript version of the <a
                        href="http://www.gnu.org/software/ocrad/">Ocrad</a> project.</p>

            <h4>More&hellip;</h4>

            <p>I've made two short videos about this project: <a href="https://www.youtube.com/watch?v=9TzXcBBC1J8">one that describes how this was built</a> and <a href="https://www.youtube.com/watch?v=ttn437BlEbo">the other one that demonstrates how it works</a>. Hopefully, the source code is also quite readable.</p>
        </div>

        <div class="col-lg-6">
            <h4>Support</h4>

            <p>This demo requires <a href="http://caniuse.com/stream">getUserMedia</a> and <a
                    href="http://caniuse.com/webgl">WebGL</a>. It should work (as for 03.2014) on Chrome, Firefox and
                Opera. Both desktop and mobile.</p>

            <h4>Source code</h4>

            <p>This demo is open source, and is hosted on <a href="https://github.com/kdzwinel/JS-OCR-demo">GitHub</a>.
                Feel free to fork it, report issues and share your ideas for improvements.</p>

            <h4>Social media</h4>
            <!-- Github button -->
            <iframe src="https://ghbtns.com/github-btn.html?user=kdzwinel&repo=JS-OCR-demo&type=watch&count=true"
                    allowtransparency="true" frameborder="0" scrolling="0" width="100" height="20"></iframe>

            <!-- Twitter button -->
            <a href="https://twitter.com/share" class="twitter-share-button"
               data-url="http://kdzwinel.github.io/JS-OCR-demo/" data-via="kdzwinel">Tweet</a>

            <!-- G+ button -->
            <div class="g-plusone" data-size="medium" data-href="http://kdzwinel.github.io/JS-OCR-demo/"></div>

            <!-- FB button -->
            <div class="fb-like" data-href="http://kdzwinel.github.io/JS-OCR-demo/" data-layout="button_count"
                 data-action="like"
                 data-show-faces="false" data-share="true"></div>
            <div id="fb-root"></div>
        </div>
    </div>

    <div class="footer">
        <p>
            Konrad Dzwinel &middot;
            <a href="https://github.com/kdzwinel"><i class="fa fa-github"></i></a> &middot;
            <a href="http://stackoverflow.com/users/1143495/konrad-dzwinel"><i class="fa fa-stack-overflow"></i></a> &middot;
            <a href="http://www.linkedin.com/pub/konrad-dzwinel/53/599/366/en"><i class="fa fa-linkedin"></i></a> &middot;
            <a href="https://twitter.com/kdzwinel"><i class="fa fa-twitter"></i></a>
        </p>
    </div>

</div>
<!-- /container -->

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/vendor/modernizr.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/jquery.Jcrop.js"></script>
<script src="js/vendor/ocrad.min.js"></script>
<script src="js/vendor/glfx.min.js"></script>

<script src="js/main.js"></script>

<!-- Social -->
<script>!function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + '://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
    (function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();
</script>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
