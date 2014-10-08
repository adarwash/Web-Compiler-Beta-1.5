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
		<form action="compile.php" method="post">
		<input type="submit" name="run" id="compileButton" value="Compile & Run" />


		<section id="leftcolumn">
		<input type="text" name="prog" id="name" size="30" value="<?php echo $prog ?>" placeholder="Project name">
<textarea id="sourceInput" name="code">
<?php echo stripslashes($code) ?>
</textarea>
		</section>



	<section id="rightcolumn" >
		<input type="text" name="inputs" id="stdin" value="<?php echo $inp ?>" placeholder="stdin">
		<input type="text" name="cargs" id="cargs" size="30" value="<?php echo $cargs ?>" placeholder="Command Line Arguments:">
		<?php 
		if ($lang =="C"){
		echo "<textarea>".$outputtext."</textarea>";
		} else if ($lang =="C++"){ 
			echo "<textarea>".$outputtext."</textarea>";
		} else if ($lang =="java"){
			echo"<textarea>".$outputtext."</textarea>";
		} else if ($lang =="php"){
			echo "<textarea>".$outputtext."</textarea>";
		} else if ($lang =="python"){ 
			echo "<textarea>".$outputtext."</textarea>";
		} 	else if ($lang =="html"){
			echo "<iframe src=".$prog_name." frameborder='0'  style='width: 100%; height: 100%;'></iframe>";
		} else if ($lang =="javascript"){
			echo "<iframe src=".$prog_name." frameborder='0'  style='width: 100%; height: 100%;'></iframe>";
		} else if ($lang =="ruby"){
			echo "<textarea>".$outputtext."</textarea>";
		} else if ($lang =="less"){
			echo "<textarea>".$outputtext."</textarea>";
		} else echo "Welcome to ICE Compiler";?>
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
	<script>
CodeMirror.commands.autocomplete = function(cm) {
CodeMirror.showHint(cm, CodeMirror.htmlHint);
}

window.editor = CodeMirror.fromTextArea(document.getElementById("sourceInput"), {
lineNumbers: true,
matchBrackets: true,
mode: "application/x-httpd-php",
indentUnit: 4,
indentWithTabs: true
});
	</script>


