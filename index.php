<html>
<head>
	<meta charset="utf-8">

	<!-- CSS links -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="editor/lib/codemirror.css">

	<!-- Script links -->
	<script src="https:////ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script src="editor/lib/codemirror.js"></script>
	<script src="editor/mode/clike/clike.js"></script>
	<script src="editor/addon/edit/matchbrackets.js"></script>
	<script src="editor/lib/codemirror.js"></script>
	<script src="editor/addon/edit/matchbrackets.js"></script>
	<script src="editor/mode/htmlmixed/htmlmixed.js"></script>
	<script src="editor/mode/xml/xml.js"></script>
	<script src="editor/mode/javascript/javascript.js"></script>
	<script src="editor/mode/css/css.js"></script>
	<script src="editor/mode/clike/clike.js"></script>
	<script src="editor/mode/php/php.js"></script>

	<title>ICE-Compiler</title>

</head>

<body>
	<header>
		<h1>compiler</h1>
	</header>

	<div id="container">
		<form id="coding_area">
			<input type="submit" name="run" id="compileButton" value="Compile & Run" />
			<div class="input_boxes">
				<input type="text" id="project_name" name="prog" id="name"  value="<?php echo $prog ?>" placeholder="Project name">
				<input type="text" id="stdin" name="inputs" id="stdin" value="<?php echo $inp ?>" placeholder="stdin">
				<input type="text" id="cargs" name="cargs" id="cargs" value="<?php echo $cargs ?>" placeholder="Command Line Arguments:">
			</div>


			<section id="leftcolumn">
				<textarea id="sourceInput" name="code">
					<?php echo stripslashes($code) ?>
				</textarea>
			</section>

			<section id="rightcolumn" >

				<h2>Welcome</h2>
			</section>

			<?php $arrayList = array('C','C++','java','php','python','html','javascript','ruby','less');?>
			<select name="lang" id="languageSelector"> 
				<?php for($i=0;$i<count($arrayList);$i++)
				{
					if($arrayList[$i]==$_POST['lang'])
					{
						echo '<option selected ="selected" value="'.$arrayList[$i].'">'.$arrayList[$i].'</option>';
					}
					else
					{
						echo '<option value="'.$arrayList[$i].'">'.$arrayList[$i].'</option>';
					}
				}
				?>
			</select>
		</form>
	</div>
</body>
</html>

	
<script>
	$(document).ready(function(){
		$('#coding_area').submit(function(){

// show that something is loading
$('#rightcolumn').html("<b>Processing</b>");
	$.ajax({
		type: 'POST',
		url: 'compile.php', 
		data: $(this).serialize()
	})
	.done(function(data){
	// show the response
		$('#rightcolumn').html(data);

		
	})
	// just in case posting your form failed
	.fail(function() {
		alert( "Posting failed." );
	});
	// to prevent refreshing the whole page page
		return false;
	});
	
	CodeMirror.commands.autocomplete = function(cm) {
		CodeMirror.showHint(cm, CodeMirror.htmlHint);
		}

		window.editor = CodeMirror.fromTextArea(document.getElementById("sourceInput"), {
			lineNumbers: true,
			matchBrackets: true,
			mode: "application/x-httpd-php",
			indentUnit: 6,
			indentWithTabs: false
		});
	});
</script>


