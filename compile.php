<?php

$code=$_POST["code"];
$cargs=$_POST["cargs"];
$inp=$_POST["inputs"];
$lang=$_POST["lang"];
if($lang=="java") $prog_name=$_POST["prog"].'.java'; else if($lang=="C") $prog_name=$_POST["prog"].'_code.c'; else if ($lang=="html") $prog_name=$_POST["prog"].'compile.html'; else if ($lang=="javascript") $prog_name=$_POST["prog"].'compile.html'; else if ($lang=="ruby") $prog_name=$_POST["prog"].'compile.rb'; else if ($lang=="less") $prog_name=$_POST["prog"].'compile.less';

else $prog_name=$_POST["prog"].'.cpp';
$prog=$_POST["prog"];

$finput=fopen("inputs.tmp","w+");
fputs($finput,$_POST["inputs"]);
fclose($finput);

$file=fopen($prog_name,"w+");
fputs($file,stripslashes($code));
fclose($file);
if($lang=="C")
{
	$output=shell_exec('gcc '.$prog_name.' -o '.$prog.'.out 2>&1');
	if(is_null($output))
	{
	$final_out=shell_exec('./'.$prog.'.out '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'.out inputs.tmp');
}
if($lang=="C++")
{
	$output=shell_exec('g++ '.$prog_name.' -o '.$prog.'.out 2>&1');
	if(is_null($output))
	{
	$final_out=shell_exec('./'.$prog.'.out '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'out input.tmp');
}
if($lang=="java")
{
	$output=shell_exec('javac '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('java '.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
if($lang=="php")
{
	$output=shell_exec('php-cgi '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('php'.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
if($lang=="python")
{
	$output=shell_exec('python3 '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('py'.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
if($lang=="ruby")
{
	$output=shell_exec('ruby '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('rb'.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
if($lang=="less")
{
	$output=shell_exec('lessc '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('less'.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
if($lang=="html")
{
	$output=shell_exec('html '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('html'.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	//shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
if($lang=="javascript")
{
	$output=shell_exec('javascript '.$prog_name);
	if(is_null($output))
	{
	$final_out=shell_exec('javascript'.$prog.' '.$cargs.' < inputs.tmp');
	$outputtext.= $final_out;
	}
	else
	$outputtext .= "$output";
	//shell_exec('rm '.$prog_name.' '.$prog.'.class');
}
include "index.php";
?>
