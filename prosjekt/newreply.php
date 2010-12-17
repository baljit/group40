<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Velkommen til onsider.net - fotball på norsk</title>
		<link rel="stylesheet" type="text/css" href="/style.css" />

		<script type="text/javascript">
			function pageLoad() {
				hideOnLoad("england")
				hideOnLoad("italia")
				hideOnLoad("spania")
			}
			
			window.onload=pageLoad;
			
			function hideOnLoad(liga) {
				document.getElementById(liga).style.display = "none";
			}

			function toggle(liga) {
				document.getElementById(liga).style.display = (document.getElementById(liga).style.display == "none") ? "" : "none";
			}
		</script>
	</head>
	<body>
	
	<div id="helesiden">
		
	<div id="container"> 	
	
			<div id="header">  <!-- Området på toppen av siden med logo/overskrift og meny -->
				<a href="/index.shtml"><h1>onsider.net</h1><p>- fotball på norsk</p></a>
		
				<div id="menu"> <!-- Meny -->
					<a href="/index.shtml">onsider.net</a>
					<a href="/nyheter.shtml"><img src="/fotball_liten.png" /> Nyhetsarkiv</a>
					<a href="/artikler.shtml"><img src="/fotball_liten.png" /> Artikler</a>
					<a href="/diskusjon.php" class="active"><img src="/fotball_liten.png" /> Diskusjon</a>
					<a href="/omoss.shtml"><img src="/fotball_liten.png" /> Om oss</a>
					
				</div>
				
			</div>
			
				
			<div id="content"> <!-- innholdsdelen av siden. alle artikler osv skal ligge her -->
				
				<?php
					mysql_connect("localhost", "onsidern_admin", "Bl3ss3d!");
					mysql_select_db("onsidern_diskusjon");
					
					$time = time();
				
					mysql_query("INSERT INTO replies VALUES(NULL,'$_POST[thread]','$_POST[message]','$_POST[author]','$time')");
					mysql_query("UPDATE threads SET replies = replies + 1 WHERE id = '$_POST[thread]'");
					
					echo "<p>Svar postet.</p><p><a href='msg.php?id=$_POST[thread]'>Tilbake</a></p>";
				?>
				
			
				
			</div>
			
			<div id="footer">		<!-- "menylinje" på bunnen av siden -->
				<p>onsider.net &copy; 2010 - Gruppe 40 
				<a href="http://validator.w3.org/check?uri=referer">HTML 5</a>
				<a href="/kontakt.php">Kontakt</a>
				</p>
			</div>
			
			<div id="update">
			
				<p>Sist oppdatert: </p>
				
			</div>
			
	</div>
		
		<div id="sidebar"> <!-- Sidemeny f.eks. med siste resultater fra kamper eller nyhetsoppdateringer -->	
			
			<h4>&nbsp;Siste resultater:</h4><table>
		<tr><td class="col2"><p><?php include 'http://www.onsider.net/sidebar.html'; ?>		
		
		</div>
				
	</div>
		
	</body>
</html>