<?php 

$errors=array();


function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


function handle_errors()
	{   global $errors;
		if(count($errors)>0)
		{
			echo"<p style ='color:red; margin-top:320px'>Correct the following errors</p>";
			echo"<ul>";
			/*echo"</ul>";*/
			foreach ($errors as $error) 
			{
				echo"<li style='color:red'>$error</li>";
					
			}
			echo"</ul>";
		}

	}


?>