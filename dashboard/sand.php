<html>
 
<head>   
 
<!-- 1 -->
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
 
<!-- 2 -->

 
</head>
 
<body>
 
<!-- 3 -->
<form action="upload.php" class="dropzone" id="drop">
    <div class="fallback">
        <input type="file" name="file" multiple />
    </div>
</form>
<button id="butt">Hit me</button>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/dropzone.js"></script>
<script type="text/javascript">
	$(document).on("ready",function() {
		Dropzone.autoDiscover=false;
		$("#drop").dropzone({
			paramName:"userfile",
			init:function(){
				this.on("fileadded",function(){
					console.log("File was added");
				});
				this.on("success",function(){
					console.log("Successful transaction");
				});
				this.on("complete",function(){
					console.log("transaction complete");
				});
			}
		});
		$("#butt").click(function(){Dropzone.forElement("#drop").removeAllFiles(true);});
		
	});

</script>
</body>
 
</html>