<?php
    require_once './honoka_format.php';
    honoka_head_top("Top");
    honoka_css();
    honoka_head_end();
    honoka_head_menu(0);
echo <<< _aaaa

  <div class="jumbotron special">
    <div class="sysdiv"></div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 outline">
          <h1>部屋紹介システム</h1>
          <p>本システムでは3Dモデルを使った、より豊かな自己表現を提供します。</p>
          <div class="download">
            <a href="./howto/" class="btn btn-warning btn-lg"><i class="fa fa-video-camera"></i></i> How to Use ?</a>
            <a href="./upload/" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload Video</a>
          </div>
          <div class="basedon small">
            *iPhone5s/iPhone6/iPhone6s/iPad2 Airのいずれかの端末が必要です。
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section section-default point">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 subtitle">
        <h2>本システムはiOS端末で撮影した動画から3Dモデルを生成します。</h2>
        <p>本システムの特徴を以下に示します。</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 point-box">
        <div class="point-circle phone">
          <i class="fa fa-mobile"></i>
        </div>
        <div class="point-description">
          <h4>特別な装置は不要</h4>
          <p>本システムにはLSD-SLAMを利用しています。そのため特別な装置を必要としません。あなたの持つiOS端末だけで利用することができます。</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 point-box">
        <div class="point-circle2 variety">
          <i class="fa fa-puzzle-piece"></i>
        </div>
        <div class="point-description">
          <h4>豊かな表現</h4>
          <p>3Dモデルを利用し、立体的な情報を伝えることができます。写真では伝えきれない形状や配置を容易に表現できます。</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 point-box">
        <div class="point-circle2 tweet">
          <i class="fa fa-twitter"></i>
        </div>
        <div class="point-description">
          <h4>簡単に共有</h4>
          <p>アップロードをした後表示されるURLを共有するだけで相手は簡単に見ることができます。TweetボタンからTwitterにもつぶやけます。</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section section-inverse japanese-font">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 subtitle">
        <h2>作成例</h2>
        <p>このように簡単にモデルが生成できます。</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="subtitle">
          <h3>生成元動画</h3>
        </div>
        <div>
          <div class="box">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ZosBSklZMWE" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
        <div class="subtitle">
          <h3>生成後モデル</h3>
        </div>
        <div id="CanvasCol">
          <div class = "box">
            <canvas id="canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section section-default getting-started">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 subtitle">
        <h2>あなたも使ってみませんか</h2>
        <p>まずは使い方を確認してみましょう。</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="form-group">
          <a href="./howto/" class="btn btn-warning btn-lg"><i class="fa fa-video-camera"></i> How To Use ?</a>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="./js/top_viewer.js" type="text/javascript"></script>
<script src="./js/three.min.js"></script>
<script src="./js/PLYLoader.js"></script>
<script src="./js/TrackballControls.js"></script>
_aaaa;
echo_footer();
echo <<< _aaaa
  </>
</html>
_aaaa;
    ?>

