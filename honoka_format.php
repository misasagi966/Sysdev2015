<?php
//  honoka_head_top($title)
//  honoka_css()
//  honoka_head_end()
//  honoka_head_menu()
//  honoka_end()
//  echo_error_box($head, $mes)

function honoka_head_top($title){
echo <<< _HEAD_TOP
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>$title</title>
_HEAD_TOP;
}

function honoka_css(){
echo <<< _CSS_SHARED
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <style type="text/css">
    .box{
    position: relative;
    }
.box:after{
    padding-top: 75%;
display: block;
content: "";
}
    .box > *{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    }
    <!--#canvas {
		  max-width:100%;
		  max-height:100%;
width:auto;
height:auto;
}-->
    html {
    height:100%;
    width:100%;
    }
    body {
    padding-top: 80px;
    height:100%;
    width:100%;
    }
    .jumbotron.special {
    position: relative;
        min-height: 530px;
        margin-bottom: 0;
    overflow: hidden;
        text-align: center;
        background-color: #D3FC9D;
        background-image: url("/");
        background-repeat: no-repeat;
        background-position: -35% center;
        -webkit-background-size: 70% 70%;
        background-size: 70%;
    }
    .jumbotron.special .sysdev {
    position: absolute;
    bottom: -20px;
    left: 0;
    width: 400px;
    height: 530px;
        background-image: url("/");
        background-repeat: no-repeat;
    }
    
    .jumbotron.special .outline {
        margin-top: 100px;
    }
    section.section {
    padding: 100px 0;
    }
    .section-title {
        background-color: #d3fc9d;
    }
    .section-default {
        background-color: #f5fff5;
    }
    .section-inverse {
        background-color: #F6FFEB;
    }
    .page-header{
    padding-bottom: 10px;
    margin: 44px 0 22px;
    border-bottom: 2px solid #999;
    }
    .subtitle {
        margin-bottom: 22px;
        text-align: center;
    }
    .point .point-box .point-circle {
    width: 100px;
    height: 100px;
    margin: 0 auto;
        font-size: 100px;
        line-height: 97px;
        text-indent: 14px;
    color: #fff;
        border-radius: 100%;
    }
    .point .point-box .point-circle2 {
    width: 100px;
    height: 100px;
    margin: 0 auto;
        font-size: 70px;
        line-height: 100px;
        text-indent: 10px;
    color: #fff;
        border-radius: 100%;
    }
    .point .point-box .point-circle.phone {
        background-color: #4caf50;
    }
    .point .point-box .point-circle2.variety {
        background-color: #4caf50;
    }
    .point .point-box .point-circle2.tweet {
        background-color: #4caf50;
    }
    div.lined {
    border: 3px solid #d3d3d3;
    outline: solid 2px #333;
    }
    footer {
    position:absolute;
    bottom:0;
    width: 100%;
    color: #eee;
        background-color: #333;
    }
    .bodywrap {
        position: relative;
        height: auto;
        min-height: 100%;
    }
    footer .copyright {
        padding-top: 10px;
        padding-bottom: 10px;
    }
  .alert-pos{
    position: absolute;
    z-index: 99;
    right:0;
    top:0;
  }
  .pad-end{
        padding-bottom: 80px;
  }
    @media ( min-width: 768px ) {
        #banner {
        min-height: 300px;
        border-bottom: none;
    }
    .bs-docs-section {
        margin-top: 8em;
    }
    .bs-component {
    position: relative;
    }
    .bs-component .modal {
    position: relative;
    top: auto;
    right: auto;
    left: auto;
    bottom: auto;
        z-index: 1;
    display: block;
    }
    .bs-component .modal-dialog {
    width: 90%;
    }
    .bs-component .popover {
    position: relative;
    display: inline-block;
    width: 220px;
    margin: 20px;
    }
    .nav-tabs {
        margin-bottom: 15px;
    }
    .progress {
        margin-bottom: 10px;
    }
    }
    </style>
_CSS_SHARED;
}

function honoka_head_end(){
echo <<< _HEAD_END
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
_HEAD_END;
}

    function honoka_head_menu($page){
        $but0 = "";
        $but1 = "";
        $but2 = "";
        $but3 = "";
    switch ($page){
        case 0: $but0 = "btn btn-success";break;
        case 1: $but1 = "btn btn-success";break;
        case 2: $but2 = "btn btn-success";break;
        case 3: $but3 = "btn btn-success";break;
        case 4: $but4 = "btn btn-success";break;
        default: break;
    }
echo <<< _HEAD_MENU
    <body class="no-thank-yu">
    <div class="bodywrap">
    
    <header>
    <header>
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
    <a href="/" class="navbar-brand">SysDev2015</a>
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
    <ul class="nav navbar-nav">
    <li><a href="/" class="$but0">Top</a></li>
    <li><a href="/about/" class="$but1">About</a></li>
    <li><a href="/howto/" class="$but2">How to Use</a></li>
    <li><a href="/upload/" class="$but3">Upload</a></li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
    <li><a href="/list/" class = "$but4">Data List</a></li>
    </ul>
    </div>
    </div>
    </div>
    </header>
    </header>
_HEAD_MENU;
}

function honoka_end(){
echo "</div>\n</>\n</html>";
}

function echo_error_box($head, $mes){
echo <<< _ERROR
          <div class="alert alert-dismissible alert-danger alert-pos col-lg-4 col-md-6 col-xs-12">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>$head:</strong><br/><p>$mes</p>
          </div>
<div class="col-lg-12"><h3>　ERROR</h3><p>　　エラーメッセージを参照してください
。</p></div>

_ERROR;
}

function echo_footer(){
echo <<< _FOOTER
    <footer class="small footer">
    <div class="container">
    <div class="row">
    <div class="col-xs-12 text-center copyright">
    © 2015 TUAT システム製作実験 矢野1班
    </div>
    </div>
    </div>
    </footer>

_FOOTER;
}

?>
