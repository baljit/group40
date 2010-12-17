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
					
					echo "<p><a href='diskusjon.php'>Tilbake</a></p>";
					
					$sql = mysql_query("SELECT * FROM threads WHERE id = '$_GET[id]'");
					
					while($r = mysql_fetch_array($sql)) {
						echo "<h2>$r[title]</h2>";
						$posted = date("jS M Y h:i",$r[posted]);
						echo "<p>$r[message]</p><h4>Startet av $r[author] - $posted</h4><hr>";
					}
					
					echo "<h3>Svar:</h3>";
					
					$sql = mysql_query("SELECT * FROM replies WHERE thread = '$_GET[id]'");
					
					while($r = mysql_fetch_array($sql)) {
						$posted = date("jS M Y h:i",$r[posted]);
						echo "<p>$r[message]</p><h4>Postet av $r[author] - $posted</h4><hr>";
					}
				?>

				
				
				<form action="newreply.php" method="POST">
					<p>Navn: <input type="text" name="author"></p>
					<input type="hidden" value="<?php echo $_GET[id]; ?>" name="thread">
					<p><textarea cols="60" rows="5" name="message"></textarea></p>
					<p><input type="submit" value="Svar"></p>
				</form>
				
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