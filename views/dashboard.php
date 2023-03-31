<?php
session_start();
include "../classes/User.php";

$user_obj = new User;
$all_users = $user_obj->getAllUsers();

// print_r($all_users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>

<?php
    include "main-nav.php";
?>

<main class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center text-uppercase">user list</h2>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>
                        <!-- photo -->
                    </th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Userame</th>
                    <th>
                        <!-- action buttons -->
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- loop to display all roww -->
                <?php
                    // while($user = $all_users->fetch_assoc())
                    foreach($all_users as $user)
                    {
                ?>
                    <tr>
                        <td>
                            <?php if($user['photo']){ ?>
                                    <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="d-block mx-auto dashboard-photo">
                                <?php }else{ ?>
                                    <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                            <?php } ?>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <?php if($_SESSION['user_id'] == $user['id']){ ?>
                                <a href="edit-user.php" class="btn btn-outline-warning btn-sm" titel="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="delete-user.php" class="btn btn-outline-danger btn-sm" titel="Delite">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
</main>

</body>
</html>
