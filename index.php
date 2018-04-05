<?php

class Interview
{
	//Change : add static keyword , Declaring class properties as static makes them accessible without needing an instantiation of the class
	public static $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

//$person = $_POST['person'];
//Change: form submits data with get method and so it should be a $_GET method
$person = ''; 
if (isset($_GET)){ 
 $person = $_GET; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// Print 10 times
	// Change: $i-- instead of $i++ and $i>0 instead of $i<0 
	// Change:'.' is used for string concatenation instead of '+'
	for ($i=10; $i>0; $i--) {
		echo '<p>'.$lipsum.'</p>';
	}
	?>


	<hr>

<!--Change: use simple names -->
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<p><label for="firstName">First name</label> <input type="text" name="first_name" id="firstName"></p> 
<p><label for="lastName">Last name</label> <input type="text" name="last_name" id="lastName"></p> 
<p><label for="email">Email</label> <input type="text" name="email" id="email"></p> 
<p><input  type="submit" value="Submit" /></p> 
</form> 

<!--Change: use $_GET it contains form data -->
<?php if ($person): ?> 
<p><strong>Person</strong> <?= $_GET['first_name'];?>, <?=  $_GET['last_name'];?>, <?= $_GET['email'];?></p> 
<?php endif; ?> 


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		<!--$person array value can be accessed with array['index'] syntax -->
			<?php foreach ($people as $person): ?>
				<tr>
					<td><?= $person['first_name'];?></td> 
					<td><?= $person['last_name'];?></td>  
					<td><?= $person['email'];?></td> 
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>