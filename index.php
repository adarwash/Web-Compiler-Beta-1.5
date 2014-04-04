<html>
	<head>
		<meta charset="utf-8">

		<!-- CSS links -->
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="editor/lib/codemirror.css">

		<!-- Script links -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="editor/lib/codemirror.js"></script>
		<script src="editor/mode/clike/clike.js"></script>
		<script src="editor/addon/edit/matchbrackets.js"></script>

		<title>ICE-Compiler</title>

	</head>

	<body>
		<header>
			<h1>compiler</h1>
		</header>
		

	<div id="container">
		<form action="compile.php" method="post">
		<input type="submit" name="run" id="compileButton" value="Compile & Run" />


		<section id="leftcolumn">
		<input type="text" name="prog" id="name" size="30" value="<?php echo $prog ?>" placeholder="Project name">
<textarea id="sourceInput" name="code">
<?php echo stripslashes($code) ?>
</textarea>
		</section>



	<section id="rightcolumn">
		<input type="text" name="inputs" id="stdin" value="<?php echo $inp ?>" placeholder="stdin">
		<textarea>
<?php echo $outputtext ?>
		</textarea>
	</section>

			<select name="lang"  id="languageSelector">
				<option value="C">C Beta</option>
				<option value="C++">C++ Beta</option>
				<option value="java">Java Beta</option>
				<option value="php">PHP Beta</option>
				<option value="python">Python Beta</option>
			</select>

</form>
	<script>
			CodeMirror.commands.autocomplete = function(cm) {
  			CodeMirror.showHint(cm, CodeMirror.htmlHint);
			}

      		window.editor = CodeMirror.fromTextArea(document.getElementById("sourceInput"), {
        	lineNumbers: true,
       	 	matchBrackets: true,
        	mode: "text/x-csrc"
     		});
	</script>


