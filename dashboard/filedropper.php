<?php
//Sessions thing here

?>
<!DOCTYPE html>
<html>
<head>
	<title>BenkyouBud - Drop Files Here</title>
	<style>
		body {
			margin:0;
			font-family: arial;
		}
		#links, #files {
			width:50%;float:left;
		}
		#link-dropper {
			width: 80%;
			margin: 5%;
			padding: 5%;
			min-height: 200px;
			border: solid 2px blue; 
			text-align: center; 
		}
		#link-dropper img {
			height:100px;
			width:151px;
		}

		#links-list ol {
		    counter-reset: li; /* Initiate a counter */
		    list-style: none; /* Remove default numbering */
		    *list-style: decimal; /* Keep using default numbering for IE6/7 */
		    font: 15px 'trebuchet MS', 'lucida sans';
		    padding: 0;
		    margin-bottom: 4em;
		    //text-shadow: 0 1px 0 rgba(255,255,255,.5);
		    margin-left: 2em;
		}
		#links-list ol li div{
		    position: relative;
		    display: block;
		    padding: .4em .4em .4em 2em;
		    *padding: .4em;
		    margin: .5em 0;
		    background: #ddd;
		    color: #444;
		    text-decoration: none;
		    border-radius: .3em;
		    transition: all .3s ease-out;   
		}

		#links-list ol li div:hover{
		    background: #eee;
		}

		#links-list ol li div:hover:before{
		    //transform: rotate(360deg);  
		    font-size: 1.2em;
		}

		#links-list ol li div:before{
		    content: counter(li);
		    counter-increment: li;
		    position: absolute; 
		    left: -1.3em;
		    top: 50%;
		    margin-top: -1.3em;
		    background: #87ceeb;
		    height: 2em;
		    width: 2em;
		    line-height: 2em;
		    border: .3em solid #fff;
		    text-align: center;
		    font-weight: bold;
		    border-radius: 2em;
		    transition: all .3s ease-out;
		}
		#links-list ol li {
			margin:1px;
		}
		#links-list ol li:after {
			content: "";
			clear: both;
			display: block;
		}
		input[type=submit]:hover {
			transition: 1s;
			background-color: lime;
			color:white;
		}
		input[type=submit] {
			display: block;
			transition: 1s;
			height: 2em;
			font-size: 1.2em;
			border-radius: 1em;
			padding-top: 0.5em;
			padding-bottom:0.5em;
			padding-left:2em;
			padding-right:2em;
			background-color: white;
			border: solid 2px lime;
		}
	</style>
</head>
<body>
	<h2>BenkyouBud - File Dropper</h2>
	<section id="links">
		<section id="link-dropper"><img src="img/upload.png"><p>Drop your links here. They will be saved on your personal space</p></section>
		<section id="links-list">
			<ol>
				<li>
					<div class="body">This is the first item</div>
				</li>
				<li>
					<div class="body">This is the first item</div>
				</li>
				<li>
					<div>
						This is where the editing needs to be done
						<p>Inserting mulitple paragraphs to check what happerns</p>
						<p>Inserting mulitple paragraphs to check what happerns</p>
						<p>Inserting mulitple paragraphs to check what happerns</p>
						<input type="submit" name="Submit">
					</div>
				</li>
			</ol>
		</section>
	</section>
	<section id="files">
		<section id="file-dropper">File droppper here</section>
		<section id="files=list">Files list here</section>
	</section>
	<script src="js/dropzone.js"></script>
	<script src="js/jquery.js"></script>
</body>
</html>