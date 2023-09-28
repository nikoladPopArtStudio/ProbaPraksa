<?php 
    require_once 'connection.php';

    $q = "SELECT * FROM `studenti`";
    $res = $conn->query($q);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="loader"></div>

    <ul class='parent'>
        <?php
        $students = $res->fetchAll();
        foreach($students as $student)
        {
        ?>
        <li>
            <ul>
                <li >Index: <span class='studentId'><?php echo $student['student_id']; ?></span></li>
                <li>Ime i Prezime: <?php echo $student['Ime'] . ' ' . $student['Prezime']; ?></li>
                <li>Prosecna Ocena: <?php echo $student['Ocena']; ?></li>
                <!-- <a id='deleteForm' href="delete.php?id=<?php echo $student['student_id']?>">Delete</a> -->
                <button class='deleteButton' type="submit">Delete</button>
            </ul>
        </li>
        <?php } ?>
    </ul>

    <!--   -->
    <form id='studentForm' name='studentForm' action="create.php"  onsubmit="return required(event);" method='POST'>
        <label for="ime">Ime: </label>
        <input class='field' type="text" name='ime' value=''>
        <br>
        <label for="ime">Prezime: </label>
        <input class='field' type="text" name='prezime' value=''>
        <br>
        <label for="ime">Ocena: </label>
        <input class='field' type="number" name="ocena" value='' step=".01">
        <br>

        <input type="submit" value='unesi studenta' ></input>
    </form>



    <?php $conn = null; ?>
    <script src="delete.js"></script>
    <script src="prevent.js"></script>
    <script src="validation.js"></script>
</body>

</html>