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
				<a href="/index.shtml"><h1>onsider.net</h1><p>- fotball p&aring; norsk</p></a>
		
				<div id="menu"> <!-- Meny -->
					<a href="/index.shtml">onsider.net</a>
					<a href="/nyheter.shtml"><img src="/fotball_liten.png" /> Nyhetsarkiv</a>
					<a href="/artikler.shtml"><img src="/fotball_liten.png" /> Artikler</a>
					<a href="/diskusjon.php"><img src="/fotball_liten.png" /> Diskusjon</a>
					<a href="/omoss.shtml"><img src="/fotball_liten.png" /> Om oss</a>
					
				</div>
				
			</div>
			
				
			<div id="content"> <!-- innholdsdelen av siden. alle artikler osv skal ligge her -->
			
				<?php
				$name = $_POST[author];
				$mail = $_POST[email];
				$question = $_POST[question];
				$to = 'snedremo@hotmail.com';
				$contact = $name." - ".$mail;
				
				if(($question != "") and ($mail != ""))  {	
					mail($to,$contact,$question);
					echo "<p>Takk for sp&oslash;rsm&aring;let.</p><hr>";
					echo "<p>Du skrev:</p> <p>Navn: $name</p><p>E-post: $mail</p><p>Sp&oslash;rsm&aring;l: $question</p>";
					echo "<p><a href='kontakt.php'>Tilbake</a></p>";
					}
				else {
					echo "<p>Vennligst fyll inn alle feltene.</p><hr>";
					echo "<p>Du skrev:</p> <p>Navn: $name</p><p>E-post: $mail</p><p>Sp&oslash;rsm&aring;l: $question</p><p><a href='kontakt.php'>Tilbake</a></p>";
					}
				?>
			
						
			</div>
			
			<div id="footer">		<!-- "menylinje" på bunnen av siden -->
				<p>onsider.net &copy; 2010 - Gruppe 40 
				<a href="http://validator.w3.org/check?uri=referer">HTML 5</a>
				<a href="/kontakt.php">Kontakt</a>
				</p>
			</div>
			
			<div id="update">
			
				<p>Sist oppdatert: <!--#echo var="LAST_MODIFIED" --> </p>
				
			</div>
			
	</div>
		
		<div id="sidebar"> <!-- Sidemeny f.eks. med siste resultater fra kamper eller nyhetsoppdateringer -->	
			
			<h4>&nbsp;Siste resultater:</h4><table>
		<tr><td class="col2"><p><?php include 'http://www.onsider.net/sidebar.html'; ?>				
		
		</div>
				
	</div>
		
	</body>
</html>
