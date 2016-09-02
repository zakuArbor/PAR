<html>
<head>
<title> </title>
</head>
<body>
		<p><h3>RULES:</h3></p>
		<p>1. There must be 3 files uploaded to avoid data confliction</p>
		<p>2. All files must be a csv files</p>
		<p>3. Each file must be 1mb or smaller to meet the file restriciton for various reasons</p>
		<p>4. Each csv file must have 2 or more set of data</p>
	
		<form enctype="multipart/form-data" action="uploader.php" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <!-- can store 1mb files -->
			Teacher Information: <input name="file_teacher" type="file" /><br />
			Class Information: &nbsp &nbsp <input name="file_class" type="file" /><br />
			Student Information: <input name="file_student" type="file" /><br />
			<input type="submit" value="Import" />
		</form>
</body>
</html>