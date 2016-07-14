<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="./article.css" />

	</head>

	<?php
		session_start();
	?>

	<body id="article">
		<div class="article-container">

			<h1 class="first-header">OpenRedirect研修課題</h1>
			<div>
				<ul>
					<li><a href="#section_1">1, サーバサイドでリダイレクトさせる際のステータスコードの違いは？</a></li>
					<ul>
						<li><a href="#section_1_1">1-1, ステータスコードごとの用途・動作</a></li>
						<li><a href="#section_1_2">1-2, 各ブラウザの動作確認</a></li>
					</ul>
					<li><a href="#post-request-test">2, どのようにリダイレクタを実装した場合、XSSの被害を受けるか？</a></li>
					<ul>
						<li><a href="#section_2_1">2-1, Open Redirect の対策</a></li>
						<li><a href="#section_2_2">2-2, Open Redirect　を突いたXSSの実装</a></li>
					</ul>
					<li><a href="#post-request-test">3, history.replaceStateでリダイレクトさせる場合、どのような挙動か？</a></li>
				</ul>
			</div>

			<h3 id="section_1" class="section_header">1, サーバサイドでリダイレクトさせる際のステータスコードの違いは？</h3>


			<h5 id="section_1_1">1-1, ステータスコードごとの用途・動作</h5>

			<div id="redirect-code-description" class="section-description">

				<table border="1"  cellspacing="0" cellpadding="5" bordercolor="lightgray">
					<tr>
						<th>ステータスコード</th>
						<th>用途</th>
						<th>GETへの変更</th>
					</tr>
					<tr>
						<td>301 Moved Permanently</td>
						<td>
							<b>URLが新しいURLへ永久的に変更されたことを表す。</b> <br>
							古いURLを保持しているクライアントは、以後新しいURLのみを使用する。<br>
							サイトリニューアルでURLが変更になった場合や、本来アクセスされるURLとは異なるURLへのアクセスを制御させたい時とかに使う。<br>
						</td>
						<td>
							許可
						</td>
					</tr>
					<tr>
						<td>302 Found</td>
						<td>
							<b>一時的に別のURLへ遷移させたい時に使用する。</b> <br>
							リダイレクト先は一時的なURLのため、古いURLを保持しているクライアントはこの後も古いURLを保持し続ける。 <br>
							しかし、本来の用法ではなく掲示板などで他のURLに転送したいときにもこのコードを使用するという行為が横行→<br>
							→新たに303、307などの新たなコードが制定されることになる。<br>
						</td>
						<td>
							許可
						</td>
					</tr>
					<tr>
						<td>303 See Other</td>
						<td>
							新しいURLにGETメソッドでアクセスすることが決められたリダイレクト。<br>
							フォームからPOSTした後にリダイレクトしてTOPページへ戻す、というような遷移で使う。 <br>
							HTTP/1.1から導入された。<br>
						</td>
						<td>
							強制
						</td>
					</tr>
					<tr>
						<td>304 Not Modified</td>
						<td>
							未更新。リクエストしたリソースは更新されていないことを示す。<br>
						</td>
						<td>
							−
						</td>
					</tr>
					<tr>
						<td>305 Use Proxy</td>
						<td>
							プロキシを使用せよ。<br>
							レスポンスのLocation:ヘッダに示されるプロキシを使用してリクエストを行わなければならないことを示す。<br>
						</td>
						<td>
							−
						</td>
					</tr>
					<tr>
						<td>306 (Unused)</td>
						<td>
							将来のために予約されている。<br>
						</td>
						<td>
							−
						</td>
					</tr>
					<tr>
						<td>307 Temporary Redirect</td>
						<td>
							<b>一時的に別のURLへ遷移させたい時に使用する。 </b><br>
							302とよく似ているが、リダイレクト前と同一メソッドでリダイレクト先へもアクセスを行うところが異なる。 <br>
							HTTP/1.1から導入された。<br>
						</td>
						<td>
							禁止
						</td>
					</tr>
					<tr>
						<td>308 Permanent Redirect</td>
						<td>
							<b>URLが新しいURLへ永久的に変更されたことを表す。</b><br>
							302とよく似ているけど、リダイレクト前と同一メソッドでリダイレクト先へもアクセスを行うところが異なる。
							2014年6月のRFCに加えられたが、まだ対応していないブラウザがある。
						</td>
						<td>
							禁止
						</td>
					</tr>
				</table>

			</div>

			<h5 id="section_1_2">1-2, 各ブラウザの動作確認</h5>

			<div id="post-request-test">
				<form action="./redirect-post.php" method="POST">
					<input type="text" name="txt-post-request" value="POST-MESSAGE">
					<select name="sel-post-request">
						<option value="−">−</option>
						<option value="301">301 Moved Permanently</option>
						<option value="302">302 Found</option>
						<option value="303">303 See Other</option>
						<option value="304">304 Not Modified</option>
						<option value="305">305 Use Proxy</option>
						<option value="306">306 (Unused)</option>
						<option value="307">307 Temporary Redirect</option>
						<option value="308">308 Permanent Redirect</option>
					</select>
					<input type="submit" value="POST">
				</form>
			</div>

			<div id="get-request-test">
				<form action="./redirect-get.php" method="GET">
					<input type="text" name="txt-get-request" value="GET-MESSAGE">
					<select name="sel-get-request">
						<option value="−">−</option>
						<option value="301">301 Moved Permanently</option>
						<option value="302">302 Found</option>
						<option value="303">303 See Other</option>
						<option value="304">304 Not Modified</option>
						<option value="305">305 Use Proxy</option>
						<option value="306">306 (Unused)</option>
						<option value="307">307 Temporary Redirect</option>
						<option value="308">308 Permanent Redirect</option>
					</select>
					<input type="submit" value="GET">
				</form>
			</div>

			<div id="redirect-browser-description" class="section-description">

				<table border="1"  cellspacing="0" cellpadding="5" bordercolor="lightgray">
					<tr>
						<th>ブラウザ種別</th>
						<th>バージョン</th>
						<th>動作</th>
					</tr>
					<tr>
						<td>Chrome</td>
						<td>51.0(最新)</td>
						<td>
							301, 302 ： POSTリクエスト → GETリダイレクト<br>
							307, 308 ： POSTリクエスト → POSTリダイレクト (GETリクエスト → GETリダイレクト)<br>
						</td>
					</tr>
					<tr>
						<td>Firefox</td>
						<td>47.0(最新)</td>
						<td>
							301, 302 ： POSTリクエスト → GETリダイレクト<br>
							307, 308 ： POSTリクエスト → POSTリダイレクト (GETリクエスト → GETリダイレクト)<br>
						</td>
					</tr>
					<tr>
						<td>IE</td>
						<td>11.0(最新)</td>
						<td>
							301, 302 ： POSTリクエスト → GETリダイレクト<br>
							307 ： POSTリクエスト → POSTリダイレクト (GETリクエスト → GETリダイレクト)<br>
							<b style="color:red">308 ： POSTリクエスト → リダイレクトされず (GETリクエスト → リダイレクトされず)</b><br>
						</td>
					</tr>
					<tr>
						<td>Opera</td>
						<td>38.0(最新)</td>
						<td>
							301, 302 ： POSTリクエスト → GETリダイレクト<br>
							307, 308 ： POSTリクエスト → POSTリダイレクト (GETリクエスト → GETリダイレクト)<br>
						</td>
					</tr>
					<tr>
						<td>Safari</td>
						<td>5.1.7(Windows版Safariは開発終了）</td>
						<td>
							301, 302 ： POSTリクエスト → GETリダイレクト<br>
							307 ： POSTリクエスト → POSTリダイレクト (GETリクエスト → GETリダイレクト)<br>
							<b style="color:red">308 ： POSTリクエスト → GETリダイレクト (GETリクエスト → GETリダイレクト)</b><br>
						</td>
					</tr>
				</table>

			</div>

			<h3 id="section_2"  class="section_header">2, どのようにリダイレクタを実装した場合、XSSの被害を受けるか？</h3>

			<h5 id="section_2_1">2-1, Open Redirect の対策</h5>

			<div class="countermeasures-section">

				<h5 id="section_2_1">遷移先を自由に指定できないようにする</h5>

				<h5 id="section_2_2">遷移先を厳密に検証する</h5>

				<h5 id="section_2_3">MAC(Message Authentication Code)を用いて、容易に改ざんできないようにする</h5>

				<h5 id="section_2_4">そもそも遷移先をパラメータとして受け取るのを辞める</h5>

			</div>

			<h5 id="section_2_2">2-2, Open Redirect　を突いたXSSの実装</h5>

			<div>◇ ログイン後の遷移先画面を直接URL指定するパラメータが実装されている場合◇</div>
			<br>
			<div>--- 開発側の意図する動作 ---</div>
			<div class="xss-test-description">
				<div>　ログインに成功したら、直接作業ページが開かれる</div>
				<div>例）http://172.16.193.223/SecurityStudyNexus/Nexus/login.php?redirectURL=http://172.16.193.166/SecurityStudyNexus/Nexus/main.php?contentId=article</div>
			</div>

			<div>--- 脆弱性を悪用したXSS ---</div>
			<div class="xss-test-description">
				<div>　パラメータ：redirectURLを書き換えて、不正なスクリプトを実行する</div>
				<div>例）http://172.16.193.223/SecurityStudyNexus/Nexus/login.php?redirectURL=javascript:alert('XSS')</div>
			</div>

			<h3 id="section_3"  class="section_header">3, history.replaceStateでリダイレクトさせる場合、どのような挙動か？</h3>



			<h5 id="section_3_1">history API とは</h5>

			<span>
				Javascriptから、履歴の追加・変更を行うことができる機能。HTML5から利用できるようになった。<br>
				非同期通信でページ内を更新したときに、新たにURLを発行し、その状態にブラウザの戻る・次へボタンを利用して遷移したい場合に利用する。<br>
				（通常は非同期でページ内を更新した場合、URLは変わらないので、戻るボタンをクリックしたら最初の状態に戻ってしまう）
			</span>
			<div id="js-replacestate-test">
				<!--<form action="./redirect-js-replacestate.php" method="GET">-->
					<input type="button" value="デモ1" onclick="window.open('./replacestate-demo.php')">
					<input type="button" value="デモ2" onclick="window.open('http://im0-3.github.io/history-api/page1.html')">
				<!--</form>-->
			</div>
			
			<br>
			
			<span>リダイレクトさせる場合？</span>
			<input type="button" value="履歴操作テスト" onclick="window.open('./handle-history.php')">
				
		</div>
	</body>
</html>
