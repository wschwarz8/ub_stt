<?php
//header function to set up at the beginning of the webpage
//call this function by declaring
//makeHeader(string: "tabbar title here",string: "page title here", Int: style#);             <--- needs updated
//style can be either 0,1,2, or 3 where 0 is default and the other three are more detailed premade styles
function makeHeader($tbtitle,$ptitle,$pstyle,$fileName, $hhtml=""){
	if(!$ptitle)$ptitle=$tbtitle;	
	echo("
	<html>
		<head>
			<title>". $tbtitle ."</title>
			". styleChoice($pstyle)
			);
	echo $hhtml;
	echo("
		</head>
		<body onload='calculateStuff();'>
			<div class='header'>
				<a href='../index.php'><h1 id='headerTitle'>". $ptitle . "</h1></a>
			
				");
		if (isset($_SESSION)){//check to see if someone was logged in so their is not errors
			DisplayName();
			echo " <a href='studentDetails.php?id=".$_SESSION['loginid']."'>(my points)</a>";
		}
			echo viewsofpage($fileName);
		echo("<BR><BR>
		
				<div class='buttonRow'>
					<a href='/index.php'><div class='buttons'>Home</div></a>
					<a href='/rewriteJobs.php'><div class='buttons'>Jobs</div></a>
					<a href='/scoreboard.php?type=all'><div class='buttons'>Scoreboard</div></a>
					<a href='/team.php'><div class='buttons'>Team Pages</div></a>
					<a href='/DisplayBroken.php'><div class='buttons'>Broken</div></a>
					<a href='/DisplayIncidents.php'><div class='buttons'>Incidents</div></a>
					<a href='/login/login.php?logout=1'><div class='buttons'>Log Out</div></a> 
				
				</div>
		
			<div class='meat'>
	");
}
//footer function to set up the end of a webpage easier
//call this function by declaring
//makeFooter(String: "message", Int style#);
//leave style as 0 if you want to keep the style from the makeHeader functions
function makeFooter($footermessage,$pstyle,$footerbox=""){
	echo("
	<!--max devos made this -->
	</div>
		<style>". styleChoice($pstyle) ."</style>
			");
			 if ($footerbox == "False"){
			 }else{
				echo ("
				<div id='footer'>
					<p id='footerMessage'>". $footermessage . "</p>
				</div>
				");
			 }
			 echo ("
		<body>
	<html>
	<script>
	
	function calculateStuff(){
	
		var body = document.body, html = document.documentElement;
		
		var footer = document.getElementById('footer');

		var height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight ) + 25;
		
		body.style.height = height;
		
		footer.style.width = '78%';
		footer.style.height= '25px';
		footer.style.top = height - 25;
	}
	
	</script>
	");
}


//stores desired theme into a variable
function styleChoice($styleNum){
	switch($styleNum){
		case 1://basic style with some bare structure
		return $styleText = '<link href="/css_files/headerStyle1.css" rel="stylesheet">';                     
		break;
		case 2://coding theme
		return $styleText = '<link href="/css_files/headerStyle2.css" rel="stylesheet">';
		break;
		case 3://braves theme
		return $styleText = '<link href="/css_files/headerStyle3.css" rel="stylesheet";>';
		break;
		default://select this style if you want to have your own style. Just have your <style> or <link> tags be your first line of code between the header and footer functions
		return $styleText = "";
	}
}

function promptLogin($isAdmin=0)
{	
	session_start();
	
	if($_SERVER['REQUEST_URI'] != "/login/login.php"){ // don't redirect to the login
	//save the current url address for redirect after login
		$_SESSION['redirectUrl'] = $_SERVER['REQUEST_URI'];
	}
	if ($isAdmin){
		if (!isset($_SESSION['admin']) || ($_SESSION['admin'] != 1)){
			header('location:/login/login.php?reason=2');die;
		}
	}
	if(!$_SESSION['loginid'])
	{
		// uncomment this to require logins
		header('location:/login/login.php?reason=1');die;
	}
}//end of prompt login

function DisplayName()
{
	if (isset($_SESSION)){
		global $g_link, $g_username, $g_password;
	
		$g_link = mysql_connect('localhost', $g_username, $g_password); 
		mysql_select_db('stt', $g_link);//TODO use a persistant database connections
		$query = "SELECT * FROM students WHERE id = '". $_SESSION['loginid']."' OR id='".$_SESSION['Masquerade']."'";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$lookup[$row['id']]=$row['name'];
		}
	if(isset($_SESSION['Masquerade'])) {
		echo $lookup[isset($_SESSION['Masquerade'])] . " pretending to be ";
	}
	echo $lookup[$_SESSION['loginid']];
	}
}


function viewsofpage($uncletony){
	
	//init pass
	global $g_username,$g_password;
	
	//create conection
	$g_link = mysql_connect('localhost', $g_username, $g_password);

	//select database
	mysql_select_db('stt', $g_link);
	
	//make query
	$query = "SELECT views FROM `pageviews` WHERE filename='$uncletony'";
	
	//start and store query
	$result = mysql_query($query);
	
	//store into an array
	($result = mysql_fetch_assoc($result));
	
	//get variable ready for manipulation
	$variable = ($result['views'] + 1);
		
	//check if their are views already or not
		if($variable>1){
				//add a view to the page table
						$query = "UPDATE `pageviews` SET `views`=" . ($variable) . " WHERE `filename`= '$uncletony'";
						$result = mysql_query($query);
		}
		else{
			//add a table for the file
				$query = "INSERT INTO `pageviews`(`filename`, `views`) VALUES ('$uncletony',1)";
				$result = mysql_query($query);
		}
	
	//print views to screen
		echo ("
		<div class='viewCount'>
			<div class='viewBox'>
				<h3 class='countLeft'>Views: </h3>
				<h3 class='countRight'> ". $variable ." </h3>
			</div>
		</div>
		");
}

	function CheckModel($serial)
	{

		
		//string value < 10 then it is a dell
		
		if(strlen($serial) < 8)
		{
			return "Dell";
		}
		
				//substring value = "Stuff" it is a samsung
		if(substr($serial, 0,4) == "HY3A")
		{
			return "Samsung";
		}	
		
		//subtring value = "Other Stuff" it is a lenovo
		
		if(substr($serial, 0,4) == "LR03")
		{
			return "Lenovo";
		}
		return "Unknown";
		
	}


	//query function
	function queryFunc($query){
		//commence query
		return $queryResult = mysql_query($query);

		//check if query was succsesful
		if (!$queryResult) {
   	 die('Invalid query: ' . mysql_error());
		}
	}
?>
