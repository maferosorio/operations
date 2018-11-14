<?php 
	$values= isset($_POST['values']) && is_array($_POST['values']) ? $_POST['values']: array();
	$operation= $_POST['operation'] ? $_POST['operation']: '';
	$error= false;

	if(empty($values) || $operation == ''){
		$error= true;
	} else {
		if(count($values) < 2 || count($values) > 2) $error= true;
		else {
			$element1= is_numeric($values[0]) ? $values[0] : null;
			$element2= is_numeric($values[1]) ? $values[1] : null;
			$result= 0;

			if($element1 == null || $element2 == null) $error= true;
			else {
				if($operation == 'sum') $result= ($element1 + $element2);
				else if($operation == 'substraction') $result= ($element1 - $element2);
				else if($operation == 'multiplication') $result= ($element1 * $element2);
				else if($operation == 'division'){
					if($element2 != 0) $result= ($element1 / $element2);
					else $error= true;
				} else $error= true;
			}
		}
	}
	if($error){
		echo json_encode(array("Status" => "Error"));
	} else {
		echo json_encode(array("Status" => "OK", "Result" => $result));
	}
?>