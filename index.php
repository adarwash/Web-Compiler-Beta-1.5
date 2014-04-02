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

		<title>ICE-Compiler</title>
	</head>

	<body>
		<header>
			<h1>Compiler</h1>
			<button id="compileButton">Compile &amp; run</button>
		</header>
		

	<div id="container">
		<section id="leftcolumn">
		<textarea id="sourceInput">
		</textarea>
		</section>
		

	<section id="rightcolumn">
		<input type="text" id="name" placeholder="Name of project">
		<input type="text" id="stdin" placeholder="stdin">
		<textarea id="output" disabled>
		</textarea>
	</section>

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
		

<!-- Start of the PHP script -->

<?

?>
