<?php
//Sessions thing here

?>
<!DOCTYPE html>
<html>
<head>
	<title>BenkyouBud - Drop Files Here</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		body {
			margin:0;
			font-family: arial;
		}
		#links, #files {
			width:50%;float:left;
		}
		#link-dropper, #file-dropper{
			width: 80%;
			margin: 5%;
			padding: 5%;
			min-height: 200px;
			border: solid 2px blue; 
			text-align: center; 
		}
		#link-dropper i, #file-dropper i {
			font-size:10em;
			color: mediumpurple;
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
		#links-list ol li div:first-child{
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

		#links-list ol li div:first-child:hover{
		    background: #eee;
		}

		#links-list ol li div:first-child:hover:before{
		    //transform: rotate(360deg);  
		    font-size: 1.2em;
		}

		#links-list ol li div:first-child:before{
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
		.submit span:hover{
			transition: 0.4s;
			background-color: lime;
			color:white;
		}
		.submit span{
			cursor: pointer;
			display: inline;
			width:100px;
			transition: 0.4s;
			height: 2em;
			font-size: 1.2em;
			border-radius: 1em;
			padding:0.3em 2em;
			background-color: white;
			border: solid 2px lime;
		}
		.submit {
			text-align: right;
			margin:2px;
		}
		.warn {
			animation-name: heartbeat;
			animation-iteration-count: infinite;
			animation-duration: 1.5s;
		}
		.warn:hover {
			animation-name: none;
		}
		@keyframes heartbeat {
			0%{background-color: #bbb;}
			50%{background-color: #eeeeee;}
			100%{background-color: #bbb;}
		}
	</style>
</head>
<body>
	<h2>BenkyouBud - File Dropper</h2>
	<section id="links">
		<section id="link-dropper"><i class="fa fa-cloud-upload"></i><p>Drop your links here. They will be saved on your personal space</p></section>
		<section id="links-list">
			<ol>
				<li>
					<div class="warn">This is the first item</div>
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
						<div class="submit"><span>Done...!</span></div>
					</div>
				</li>
			</ol>
		</section>
	</section>
	<section id="files">
		<section id="file-dropper"><i class="fa fa-cloud-upload"></i><p>Drop your links here. They will be saved on your personal space</p></section>
		<section id="files=list">Files list here</section>
	</section>
	<script src="js/dropzone.js"></script>
	<script src="js/jquery.js"></script>
</body>
</html>