<?php
require_once '../login.php';
require_once '../honoka_format.php';

function error_500($log_mes){
	$error_title = "500 ERROR";
	$error_mes = "しばらくしてから再度試してください.<br/>それでもできない場合は管理者に問い合わせてください.";
	echo_error_box($error_title, $error_mes);
	error_log($log_mes);
echo <<< _TABLE
</div>
_TABLE;
echo_footer();
honoka_end();
	exit(1);
}

honoka_head_top("ROOM LIST");
honoka_css();
echo <<< _TABLE_CSS
  <style type="text/css">
  .table th{
    background-color: #cccccc;
  }
  </style>
_TABLE_CSS;
honoka_head_end();
honoka_head_menu(4);

echo <<< _FIRST
<div class="container lined pad-end">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="tables">Room List</h1>
        </div>
      </div>
_FIRST;
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) error_500("Unable to connect to MySQL: ". mysql_error());
if(!mysql_select_db($db_database)) error_500("Unable to select database: ".mysql_error());
$query = "SELECT * FROM $db_table WHERE Flag=3";
$result = mysql_query($query);
if(!$result) error_500("Could not get data".mysql_error());
$row = mysql_fetch_array($result);

if(!$row){
	echo <<< _TABLE
      <div class="col-lg-12">
        <div class="bs-component">
          <h3>現在アップロードされているデータはありません<h3>
        </div>
      </div>
    </div>
_TABLE;
}
else{
	echo <<< _TABLE
      <div class="col-lg-12 col-xs-12">
        <div class="bs-component">
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User</th>
                <th>URL</th>
              </tr>
            </thead>
            <tbody>
_TABLE;
	do{
		$id = $row['No'];
		$title = $row['Title'];
		$user = $row['UserName'];
		$url = dirname($_SERVER["SCRIPT_NAME"], 1)."/viewer/?id=$id";
		echo <<< _TABLE_VAL
              <tr>
                <td>$id</td>
                <td>$title</td>
                <td>$user</td>
                <td><a href="$url">$url</a></td>
              </tr>
_TABLE_VAL;
	}while($row = mysql_fetch_array($result));
	echo <<< _TABLE
            </tbody>
          </table>
        </div><!-- /example -->
      </div>
    </div>
_TABLE;
}

echo_footer();
honoka_end();
_aaaa;
    ?>

