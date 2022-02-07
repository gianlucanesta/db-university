<?php 

require_once __DIR__ .'/Department.php';
require_once __DIR__ .'/database.php';

// echo var_dump($connection);


// Richiesta query al db
$sql = 'SELECT * FROM departments';
$result = $connection->query($sql);

if($result && $result->num_rows > 0){
    $departments = [];
    
    while($row = $result->fetch_assoc()){
        $department = new Department();
        $department->id = $row['id'];
        $department->name = $row['name'];
        $department->email = $row['email'];
        $department->address = $row['address'];
        $departments[] = $department;
    }
    // echo var_dump($departments);

} elseif($result && $result->num_rows == 0) {
    echo 'Risultati non presenti per questa pagina';
} else {
    echo 'Errore di query';
    die();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            <?php foreach($departments as $department) { ?>
                <li> <a href="department-details.php?id=<?php echo $department->id ?>"><?php echo $department->name ?></a> </li>
            <?php } ?>
        </ul>
    </div>

</body>
</html>