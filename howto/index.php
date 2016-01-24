<?php
    require_once '../honoka_format.php';
    honoka_head_top("Howto");
    honoka_css();
    honoka_head_end();
    honoka_head_menu(2);
echo <<< _aaaa
    <div class="container lined pad-end">

      <div class="col-lg-12">
        <div class="page-header">
       <section>
          <h1 id="type">How To Use</h1>
        </section>
        </div>
      </div>

      <div class="col-lg-12">
       <section>
        <div class="bs-component">
          <h2>利用に必要な環境</h2>
          <p>　本システムを正常に利用するためには以下に示す要件が必要となります。</p>
          <p>　それ以外の環境では正常に動作しない場合があります。</p>
          <h4>　ファイルのアップロード利用</h4>
          <p>　　iPhone 5s以降のiPhoneシリーズ・iPad Air2</p>
          <h4>　ビュワーの利用</h4>
          <p>　　Firefox / Chrome / Safari / iOS Safari</p>
        </div>
       </section>
      </div>
      <div class="col-lg-12">
       <section>
        <div class="bs-component">
          <h2>全体の流れ</h2>
          <p>　本システムは「撮影」・「アップロード」・「共有・閲覧」の３つの手順を通して利用できます。</p>
          <p>　「撮影」ではあなたの持つiOS端末を利用して動画を撮影してください。このときに良いデータを撮影することで生成される3Dモデルの精度を高めることができます。良いデータを撮影するためのTipsについては後述します。</p>
          <p>　「アップロード」ではあなたの撮影した動画を本システムにアップロードしてください。このときには「タイトル」や「あなたの名前」などを必要に応じて設定することができます。より良い結果を得るためにアップロード時には撮影に利用した端末のモデルを必ず選択してください。</p>
          <p>　「共有・閲覧」ではアップロード後に表示されたURLをあなたの友人に知らせましょう。クリックするだけで閲覧することができます。</p>
          <p class="help-block"><small>*1. 現在対応している端末は iPhoneシリーズ: 5s/6/6s, iPadシリーズ: 2 Air の4種</small></p>
        </div>
      </section>
      </div>
       <div class="col-lg-12">
       <section>
        <div class="bs-component">
          <h2>Tips</h2>
          <p>　より良い3Dモデルを生成するためには撮影時に気を付けるポイントを紹介します．</p>
          <div>
          <h4>手ぶれを減らす</h4>
          <p>　より良いデータをとるためにはカメラのブレが少ないほうが望ましいです．慎重に動かしましょう</p>
        </div>
          <div>
          <h4>カメラを回転させない</h4>
          <p>　LSD-SLAMはカメラの回転移動を苦手とします．特にカメラを軸にその場で回転させた場合には非常に精度が悪くなります．まっすぐに移動させることを心掛け，カメラを回転させる必要があるときには被写物を中心に回るようにするとうまくいくことがあります．</p>
        </div>
          <div>
          <h4>光源を減らす</h4>
          <p>　光源からの反射光を特徴として検出してしまうことがあります．できる限り影響しそうな光源を少なくし，また光源は真上からのものとなるように気を付けてください．</p>
        </div>
          <div>
          <h4>動く物体を写さない</h4>
          <p>　LSD=SLAMは現在までのいマップを利用して自己位置推定をおこないます．動く物体を写してしまうとそれを妨げることにつながります．特に自分自身やその影を写してしまわないように気を付けてください．</p>
        </div>
        </div>
      </section>
      </div>
    </div>
_aaaa;
echo_footer();
honoka_end();
    ?>
