<?php
	require_once "config.php";
require_once "functions.php";

promptLogin();
	makeHeader("Old Team Pages", "Old Team Pages", 2,"team.php","<style>.meat{position:absolute;width:50%;background:black;color:White;margin-top:3%; margin-left:15%;border-radius:10px;padding:5px;opacity:0.9;}</style>");
?>

	<BR>
	<section style="float:left;width:50%">

			<a href='students/Mason'>
				<div class="personBox" id="Mason">
					<h2 id="toph2" style="background:yellow;">Mason</h2>
					<ul>
						<li>
							<p>add a few words that describe yourself here</p>
						</li>
						<li><img class="personPic" src="http://goo.gl/zBA0Gk" height="100px" width="100px"></li>
					</ul>
				</div>
			</a>

			<BR>

			<a href='students/mckayla'>
				<div class="personBox" id="Mckayla">
					<h2 id="toph2" style="background:green;">Mckayla</h2>
					<ul>
						<li>
							<p>add a few words that describe yourself here</p>
						</li>
						<li><img class="personPic" src="http://goo.gl/zBA0Gk" height="100px" width="100px"></li>
					</ul>
				</div>
			</a>

			<BR>

			<a href='students/britton'>
				<div class="personBox" id="Britton">
					<h2 id="toph2" style="background:purple;">Britton</h2>
					<ul>
						<li>
							<p>add a few words that describe yourself here</p>
						</li>
						<li><img class="personPic" src="http://goo.gl/zBA0Gk" height="100px" width="100px"></li>
					</ul>
				</div>
			</a>

			<BR>
		</center>
	</section>
	<center>
		<section style="float:right;width:50%">
			


			<a href="students/Ethan">
				<div class="personBox" id="Ethan">
					<h2 id="toph2" style="background:Yellow;">Ethan</h2>
					<ul>
						<li>
							<p>add a few words that describe yourself here</p>
						</li>
						<li><img class="personPic" src="http://goo.gl/zBA0Gk" height="100px" width="100px"></li>
					</ul>
				</div>
			</a>

			<BR>

			<a href="students/Wyatt">
				<div class="personBox" id="Wyatt">
					<h2 id="toph2" style="background:blue;">Wyatt</h2>
					<ul>
						<li>
							<p>add a few words that describe yourself here</p>
						</li>
						<li><img class="personPic" src="http://goo.gl/zBA0Gk" height="100px" width="100px"></li>
					</ul>
				</div>
			</a>

			<BR>

			<a href="#">
				<div class="personBox" id="Steavie">
					<h2 id="toph2" style="background:purple;">Steavie</h2>
					<ul>
						<li>
							<p>Im just here to make the columns even :D</p>
						</li>
						<li><img class="personPic" src="http://goo.gl/zBA0Gk" height="100px" width="100px"></li>
					</ul>
				</div>
			</a>

			<BR>
	</center>
	</section>
	<style>
		
		* {
			margin: 0;
			padding: 0;
		}
		
		.personBox {
			background: #fff;
			width: 200px;
			border-radius: 3px;
			text-align: center;
			display: block;
		}
		
		.personBox h2 {
			color: #fff;
			font-weight: 500;
			padding: 7px 12px;
			border-radius: 3px;
		}
		
		.toph2 {
			border-radius: 3px;
		}
		
		a {
			text-decoration: none;
		}
		
		p {
			color: black;
		}
		
		.personBox ul {
			list-style-type: none;
			overflow: hidden;
			padding: 0;
			height: 0px;
			-webkit-transition: height 1s ease;
		}
		
		.personBox:hover ul {
			height: 150px;
		}
	</style>

	<?php
	makefooter("&#169; Copyright Cherokee Washington Highschool <a href='index.php'> Home Page<a/><a href='' onclick='initIt()'>About us</a> <style>#footer a{color:black; margin-left:3px;}#footer p{color:black; text-decoration:underlined;}</style>",0,"true");
?>
