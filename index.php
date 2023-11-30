<?php include_once "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">Insert Record</div>
                    <div class="card-body">
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Roll</label>
                                <input type="text" name="roll" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Age</label>
                                <input type="text" name="age" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="create" class="btn btn-danger w-100">
                            </div>
                        </form>

                        <?php
                        if(isset($_POST['create'])){
                            $data = [
                            "name" => $_POST['name'],
                            "roll" => $_POST['roll'],
                            "age" => $_POST['age'],
                            ];
                            if(insertData("students",$data)){
                                setAlert("data inserted successfully","success")
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-7">
            <?php
                getAlert("success");
                ?>
                <?php
                    if(isset($_GET['std_id'])){
                        $id = $_GET['std_id'];
                        $result = deleteRecord("students","id= '$id'");

                        if($result){
                            setAlert("Record Deleted Successfully","danger");
                            redirect('index.php');
                        }
                        else{
                            setAlert("Something went wrong", "warning");
                        }
                    }
                ?>
                <div class="table table table-bordered table-hovered">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>age</th>
                        <th>roll</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $data = callingData("students");
                    foreach($data as $value):
                    ?>
                    <tr>
                        <td><?= $value['id'];?></td>
                        <td><?= $value['name'];?></td>
                        <td><?= $value['age'];?></td>
                        <td><?= $value['roll'];?></td>
                        <td><a href="index.php?std_id=<?= $value['id'];?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php endforeach;?>

                </div>

            </div>
        </div>
    </div>
  
</body>
</html>

  