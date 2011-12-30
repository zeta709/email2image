<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Email address to png</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<style type="text/css">
		#main {
			text-align: center;
		}
		form {
			width: 27em;
			margin-left: auto;
			margin-right: auto;
			text-align: left;
		}
		label {
			display: inline-block;
			text-align: right;
			font-weight: bold;
			width: 9em;
			margin-left: 0px;
			margin-right: 1em;
		}
		input {
			display: inline-block;
			width: 15em;
			margin-right: 1em;
		}
		input.num {
			width: 3em;
			margin-right: 1em;
			text-align: right;
		}
		input#bt {
			width: 3em;
			margin-right: 1em;
		}
		.buttons {
			text-align: center;
		}
		#submitbutton{
			text-align: center;
			width: 5em;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>
<body>
	<div id="main">
		<h1>Email address to png</h1>
		<form action="email2.php" method="get" accept-charset="utf-8">
			<fieldset>
				<label for="addr">Email address</label><input type="text" id="addr" name="addr" /><br />
			</fieldset>
			<fieldset>
				<legend>Text configuration</legend>
				<label for="r">Color (R)</label><input type="text" class="num" id="r" name="r" value="0" />(0-255)<br />
				<label for="g">Color (G)</label><input type="text" class="num" id="g" name="g" value="0" />(0-255)<br />
				<label for="b">Color (B)</label><input type="text" class="num" id="b" name="b" value="0" />(0-255)<br />
				<!--<label for="a">Color (alpha)</label><input type="text" class="num" id="a" name="a" value="0" />(0-127)<br />-->
			</fieldset>
			<fieldset>
				<legend>Background configuration</legend>
				<label for="br">Color (R)</label><input type="text" class="num" id="br" name="br" value="255" />(0-255)<br />
				<label for="bg">Color (G)</label><input type="text" class="num" id="bg" name="bg" value="255" />(0-255)<br />
				<label for="bb">Color (B)</label><input type="text" class="num" id="bb" name="bb" value="255" />(0-255)<br />
				<label for="ba">Color (alpha)</label><input type="text" class="num" id="ba" name="ba" value="0" />(0-127)<br />
			</fieldset>
			<div class="buttons">
				<input type="submit" id="submitbutton" name="submitbutton" value="Submit" />
			</div>
		</form>
		<hr/>
		<p>
		참고: 변환되는 이미지에는 네이버 나눔고딕 폰트가 사용됩니다.
		</p>
	</div>
</body>
</html>
