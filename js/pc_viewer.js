window.addEventListener('load',
            function () {
var canvasFrame, scene, renderer;
var camera, controls;
var object;
var width  = 1280;
var height = 1024;
var test_arg;
var id = "";


init();         // 基本的な設定を初期化
init_camera();  // カメラを初期化
init_object();  // オブジェクトを初期化
animate();      // アニメーションを描画

function init() {
    canvasFrame = document.getElementById('CanvasCol');
    canvas = document.getElementById('canvas');
    document.getElementById('canvas').width = width;
    document.getElementById('canvas').height = height;
    // レンダラーを作成
    renderer = new THREE.WebGLRenderer({canvas:canvas});
    // canvas要素のサイズを設定
    renderer.setSize( width, height);
    // 背景色を設定
    renderer.setClearColor(0x000000, 1.0);
    // body要素にcanvas要素を追加
    //canvasFrame.appendChild( renderer.domElement );
    // シーンの作成
    scene = new THREE.Scene();
	
	if (1 < document.location.search.length) {
		var parameter=location.search.substring(1);
		if(parameter.match(/^(id=)[0-9]*([0-9])$/)){
			id = parameter.match(/[0-9]+/)[0];
		}
	}
}

function init_camera(){
    // カメラを作成
    camera = new THREE.PerspectiveCamera( 60, width/height, 1, 10000 );
    // カメラの位置を設定
    camera.position.set(0, 0, -3);
    // カメラの向きを設定
    camera.lookAt( {x: 0, y: 0, z: 100} );
	camera.up.set(0, -1, 0);
	scene.add(camera);
	
	
    // トラックボールの作成
    controls = new THREE.TrackballControls( camera, renderer.domElement );
    // 回転無効化と回転速度の設定
    controls.noRotate = false; // false:有効 true:無効
    controls.rotateSpeed = 3.0;
    // ズーム無効化とズーム速度の設定
    controls.noZoom = false; // false:有効 true:無効
    controls.zoomSpeed = 1.0;
    // パン無効化とパン速度の設定
    controls.noPan = false; // false:有効 true:無効
    controls.panSpeed = 3.0;
    // スタティックムーブの有効化
    controls.staticMoving = true; // true:スタティックムーブ false:ダイナミックムーブ
}

function set_pc(geometry){
	var material = new THREE.PointsMaterial({
		size:0.01, blending:THREE.NoBlending,
		transparent:false, depthTest:true, vertexColors:true
	});
	var point = new THREE.Points(geometry, material);
	scene.add(point);
}

function init_object(){
	if(id){
		var loader = new THREE.PLYLoader();
		var path = "../data/"+id+"/"+id+".ply";
		loader.load(path, set_pc);
	}
	else{
		document.write("<br/>404 (File not found)");
	}
}
function animate() {
    // アニメーション
    requestAnimationFrame( animate );
    // トラックボールによるカメラのプロパティの更新
    controls.update();
	// レンダリング
    renderer.render( scene, camera );
}

});
