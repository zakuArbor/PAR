<style>
.permission_type {
	position: relative;
    color: #39393a;
    background-color: #4CAF50;
    border-radius: 5px;
    font-size: 20px;
    padding: 20px;
    border-style: none;
    width: 60%;
    height: 20%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 10px;
    vertical-align: center;
}

.permission_type:hover {
	display: block;
	border-style: solid;
	border-color: #4CAF50; /* Green */
	color: #4CAF50;
	background: white;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

#container {
	position: relative;
    width: 95%;
    height: 95%;
    top: 25%;
}
#wrapper {
    width: 100%;
    height: 100%;
    margin: 0px;
}

</style>

<div id = 'wrapper'>
	<div id = 'container'>
		<form action = 'login_process.php' method = 'POST'>
		<button type="submit" class = 'permission_type' name = 'type' value = 1>ADMIN + TEACHER</button>
		<button type="submit" class = 'permission_type' name = 'type' value = 2>TEACHER</button>
	</div>
</div>

