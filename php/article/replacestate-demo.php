<html><head>
<meta charset="UTF-8">
<title>タブのテスト</title>
<style>
section[role="tabpanel"]{
	border:3px solid black;
	padding:5px;
	margin:5px;
}
[aria-expanded="false"]{
	display:none;
}
</style>
</head>
<body>
<h1>タブ</h1>
<p>1つのページ内でコンテンツが切り替わるという<b>タブ</b>のサンプルです。</p>
<ul id="tablist" role="tablist">
<li role="tab" aria-controls="tab_A" tabindex="1">タブAを開く</li>
<li role="tab" aria-controls="tab_B" tabindex="2">タブBを開く</li>
<li role="tab" aria-controls="tab_C" tabindex="3">タブCを開く</li>
</ul>
<div id="tabpanels">
  <section role="tabpanel" id="tab_A" aria-expanded="true">
    <h1>タブA</h1>
    <p>これはタブAです。</p>
  </section>
  <section role="tabpanel" id="tab_B" aria-expanded="false">
    <h1>タブB</h1>
    <p>これはタブBです。</p>
  </section>
  <section role="tabpanel" id="tab_C" aria-expanded="false">
    <h1>タブC</h1>
    <p>これはタブCです。</p>
  </section>
</div>

<script>
//ドキュメント上でクリックされたものを検知する
document.addEventListener('click',function(ev){
	var target=ev.target;	//クリックされた要素を調べる
	if(target.getAttribute('role')=="tab"){
		//クリックされた要素がrole="tab"ならば、関連するタブを開く
		var opening_id=target.getAttribute('aria-controls');	//2回使うので、開こうとしているタブのIDを変数に代入する
		openTab(opening_id);	//開くタブのidはaria-controlsん属性に入っている（今回の場合）
		
		//履歴に追加する
		history.pushState(opening_id,null);	//stateのところにIDを入れる
	}

},false);

window.addEventListener('popstate',function(ev){
	//履歴を移動した
	if(ev.state){
		//stateがあったら、そのIDを開く
		openTab(ev.state);
	}else{
		//stateがなかったら、最初はAだったのでAを開いておく
		openTab("tab_A");
	}
},false);

//idを指定されたら、そのタブを開いて他は閉じる
function openTab(id){
	//まずは一旦全部閉じる
	var panels=document.getElementById("tabpanels").childNodes;	//tabpanelたち
	for(var i=0,l=panels.length;i<l;i++){
		//ひとつひとつ調べる
		if(panels[i].nodeType==Node.ELEMENT_NODE && panels[i].getAttribute('role')=="tabpanel"){
			// タブの本体だとしたら
			panels[i].setAttribute('aria-expanded','false');	//aria-expandedがtrueなら開いていて、falseなら閉じているので一旦閉じる
		}
	}
	//目的のものだけを開く
	var panel=document.getElementById(id);
	panel.setAttribute('aria-expanded','true');
}
</script>


</body></html>

