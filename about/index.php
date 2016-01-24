<?php
    require_once '../honoka_format.php';
    honoka_head_top("Top");
    honoka_css();
    honoka_head_end();
    honoka_head_menu(1);
echo <<< _aaaa
    <div class="container lined pad-end">
      <div class="col-lg-12">
        <div class="page-header">
       <section>
          <h1 id="type">About</h1>
        </section>
        </div>
      </div>

      <div class="col-lg-12">
       <section>
        <div class="bs-component">
          <h2>システム概要</h2>
          <p>　本システムは<abbr title="Large-Scale Direct Monocular SLAM">LSD-SLAM</abbr>を利用した部屋紹介システムです。</p>
          <p>　iOS端末<sup>*1</sup>を用いて室内を撮影した動画を本サイトにアップロードすることにより、3Dモデルに変換し共有をすることができます。</p>
          <p>　本システムにおいては色情報を扱うよう拡張したLSD-SLAMで生成したマップをより見やすいように処理し、3Dモデルとして表示します。</p>
          <p>　単眼カメラを用いたSLAM技術はまだ研究中の分野であり、正しいモデルが生成されないことがあります。</p>
          <p>　詳細な使い方については <a href="../howto/">HowTo</a> を参照してください。</p>
          <p class="help-block"><small>*1. 現在対応している端末は iPhoneシリーズ: 5s/6/6s, iPadシリーズ: 2 Air の4種</small></p>
        </div>
       </section>
      </div>
      <div class="col-lg-12">
       <section>
        <div class="bs-component">
          <h2>LSD-SLAMについて</h2>
          <p>　LSD-SLAMは単眼カメラを用いたSLAM技術です。</p>
        <div class="bs-component">
          <blockquote>
            <p>LSD-SLAM is a novel, direct monocular SLAM technique: Instead of using keypoints, it directly operates on image intensities both for tracking and mapping. The camera is tracked using direct image alignment, while geometry is estimated in the form of semi-dense depth maps, obtained by filtering over many pixelwise stereo comparisons. We then build a Sim(3) pose-graph of keyframes, which allows to build scale-drift corrected, large-scale maps including loop-closures. LSD-SLAM runs in real-time on a CPU, and even on a modern smartphone. </p>
            <small>出典 <cite title="Computer Vision Group - Visual SLAM - LSD-SLAM: Large-Scale Direct Monocular SLAM"><a href="http://vision.in.tum.de/research/vslam/lsdslam">Computer Vision Group - Visual SLAM - LSD-SLAM: Large-Scale Direct Monocular SLAM</a></cite></small>
          </blockquote>
        </div>
        <p>　LSD-SLAMを用いたシステムは <a href="https://github.com/tum-vision/lsd_slam">GitHub</a> 上にて公開されており、GPLに従って利用することができます。</p>
        <p>　本システムに利用しているプログラムのソースコードも <a href="https://github.com/misasagi966/lsd_slam">GitHub</a> 上にて公開しています。</p>
                </div>
                <p> </p><p> </p>
      </section>
      </div>
    </div>
_aaaa;
echo_footer();
honoka_end();
_aaaa;
    ?>



