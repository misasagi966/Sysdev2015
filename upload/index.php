<?php
require_once '../login.php';
require_once '../honoka_format.php';

function error_500($log_mes){
	$error_title = "500 ERROR";
	$error_mes = "しばらくしてから再度試してください.<br/>それでもできない場合は管理者に問い合わせてください.";
	echo_error_box($error_title, $error_mes);
	error_log($log_mes);
	exit(1);
}

honoka_head_top("ROOM UPLOAD");
honoka_css();
echo <<< _END1
  <style type="text/css">
  .fileUploder{
    position:relative;
    height:31px;
    overflow:hidden;
    margin-bottom:20px;
  }
  .fileUploder .txt{
    padding:6px 10px;
    width:100%;
    vertical-align:top;
    border:1px solid #cbcbcb;
    border-radius:3px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    box-shadow:inset 2px 2px 2px 0 #eeeeee;
    -moz-box-shadow:inset 2px 2px 2px 0 #eeeeee;
    -webkit-box-shadow:inset 2px 2px 2px 0 #eeeeee;
  }
  .fileUploder .btn{
    position:absolute;
    top:0;
    left:177px;
    z-index:1;
    display:block;
    width:138px;
    height:31px;
    text-indent:-99999px;
    overflow:hidden;
    border:none;
    background:url(img/btn.gif) no-repeat 0 0;
  }
  .fileUploder .btn:hover{
    background-position:0 100%;
  }
  .fileUploder .uploader{
    position:absolute;
    top:0;
    right:0;
    z-index:99;
    width:100%;
    height:100%;
    font-size:315px;
    opacity:0;
    filter:alpha(opacity=0);
    -ms-filter:"alpha(opacity=0)";
  }
  </style>
_END1;
honoka_head_end();
honoka_head_menu(3);



echo <<< _END2
<div class="container lined pad-end">
  <div class="col-lg-12">
  <div class="page-header">
  <h1 id="type"> Upload </h1>
  </div>
  </div>
  <div>
      <div class="col-lg-12">
        <h3>下記フォームよりアップロードできます</h3>
        <p>　必須なのは撮影したiPhoneのモデルと動画ファイルだけです。</p>
        <p>　オプションでタイトルやユーザ名、コメントを利用できます。</p>
      </div>
      <div class="col-lg-12">
        <div class="well bs-component">
          <form method="post" class="form-horizontal" action="./index.php" enctype='multipart/form-data'>
            <fieldset>
              <legend>Legend</legend>
              <div class="form-group">
                <label for="RoomTitle" class="col-lg-2 control-label">RoomTitle</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="RoomTitle" placeholder="Untitled Room" name='roomtitle'>
                </div>
              </div>
              <div class="form-group">
                <label for="Username" class="col-lg-2 control-label">UserName</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="Username" placeholder="Anonymous" name='username'>
                </div>
              </div>
              <div class="form-group">
                <label for="Comment" class="col-lg-2 control-label">Comment</label>
                <div class="col-lg-10">
                  <textarea class="form-control" rows="3" id="Comment" placeholder="No Comment" name='comment'></textarea>
                  <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
              </div>
              <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Your Model*</label>
                <div class="col-lg-10">
                  <select class="form-control" id='camera' name='camera'>
                    <option value=1 selected="selected">iPhone 6s</option>
                    <option value=2>iPhone 6</option>
                    <option value=3>iPhone 5s</option>
		    <option value=4>iPad Air 2</option>
		    <option value=0>other</option>
                  </select>
                  <br>
                </div>
              </div>
	      <div class="form-group">
		<script src="../js/file_upload.js"></script>
	        <label for="file" class="col-lg-2 control-label">Select your video file*</label>
                <div class="fileUploder">
	          <div class="col-lg-10">
                    <input type="text" class="txt" contenteditable="false" readonly>
	            <button class="btn">ファイル選択</button>
	            <input type='file' class="uploader" name='filename'>
	          </div>
                </div>
              </div>	  
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>

  </div>
 </div>
_END2;
if($_FILES){
	$name = $_FILES['filename']['name'];
	if($name){
		switch($_FILES['filename']['type']){
		case 'video/mp4':
			$ext = 'mp4';
			break;
		case 'video/quicktime':
			$ext = 'mov';
			break;
		default:
			$ext = '';
			break;
		}
		if($ext){
			$model = $_POST['camera'];
			$db_server = mysql_connect($db_hostname, $db_username, $db_password);
			if(!$db_server) error_500("Unable to connect to MySQL: ". mysql_error());
			if(!mysql_select_db($db_database)) error_500("Unable to select database: ".mysql_error());
			$query = "INSERT INTO UploadedData(OriginalName, Model) VALUES('$name', $model)";
			$result = mysql_query($query);
			if(!$result) error_500("Dabase access failed: ".mysql_error());
			
			$id = mysql_insert_id();
			if(!mkdir("../data/$id")) error_500("Could not make directoriy");
			chmod("../data/$id", 0777);
			$path = "../data/$id/$name";
			if(!move_uploaded_file($_FILES['filename']['tmp_name'], $path)) error_500("Could not move file");
			
			$title = $_POST['roomtitle'];
			if($title){
				$query = "UPDATE UploadedData SET Title='$title' WHERE No=$id";
				$result = mysql_query($query);
				if(!$result) error_500("roomtitle update failed: ".mysql_error());
			}
			$user = $_POST['username'];
			if($user){
				$query = "UPDATE UploadedData SET UserName='$user' WHERE No=$id";
				$result = mysql_query($query);
				if(!$result) error_500("username update failed: ".mysql_error());
			}
			$comment = $_POST['comment'];
			if($comment){
				$query = "UPDATE UploadedData SET Comment='$comment' WHERE No=$id";
				$result = mysql_query($query);
				if(!$result) error_500("comment update failed: ".mysql_error());
			}

			$query = "UPDATE $db_table SET Flag=1 WHERE No=$id";
			$result = mysql_query($query);
			if(!$result) error_500("Could not change flag ID=$id: ".mysql_error());

			echo <<< _SUCCESS1
          <div class="alert alert-dismissible alert-success alert-pos col-lg-4 col-md-6 col-xs-12">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>SUCCESSFULL!</h4>
            <p>依頼を受け付けました.<br/>
_SUCCESS1;
			
			$query = "SELECT * FROM UploadedData WHERE No=$id";
			$result = mysql_query($query);
			if(!$result) error_500("Could not get date id=$id: ".mysql_error());
			$row = mysql_fetch_assoc($result);
			$id = $row['No'];
			$title = $row['Title'];
			$user = $row['UserName'];
			$comment = str_replace(array("\r\n", "\r", "\n"), " ", $row['Comment']);
			switch($row['Model']){
                        case 1: $model="iPhon6s";    break;
                        case 2: $model="iPhon6";     break;
                        case 3: $model="iPhon5s";    break;
                        case 4: $model="iPad Air 2"; break;
                        case 0: $model="other";      break;       
                        }
			$filename = $row['OriginalName'];
			$timestamp = $row['Timestamp'];
			$url = dirname($_SERVER["SCRIPT_NAME"], 1)."/viewer/?id=$id";
			
			echo <<< _UPLOAD_DATA
              <pre>
ID           : $id
RoomTitle    : $title
UserName     : $user
Comment      : $comment
Camera Model : $model
Uploaed file : $filename
Timestamp    : $timestamp
URL          : <a href="$url" class"alert-link">$url</a></pre>
              <br/>点群生成が終了すると上記URLより部屋を見ることができます.
            </p>
          </div>
_UPLOAD_DATA;
		}
		else{
			echo <<< _ERROR1
          <div class="alert alert-dismissible alert-danger alert-pos col-lg-4 col-md-6 col-xs-12">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    	      <strong>ERROR:</strong><br/>"$name"はmp4,movファイルではありません.<br/>mp4,movファイルを指定してください.
          </div>
_ERROR1;
		}
	}
	else{
		echo <<< _ERROR1

          <div class="alert alert-dismissible alert-danger alert-pos col-lg-4 col-md-6 col-xs-12">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>ERROR:</strong><br/>ファイルが指定されていません.<br/>ファイルを指定してください.
	  </div>
_ERROR1;
	}
}
echo_footer();
honoka_end();
?>
