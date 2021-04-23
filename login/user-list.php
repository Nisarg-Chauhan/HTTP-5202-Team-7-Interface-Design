<?php 
    include '../template/header.php'; 
    require_once '../Models/Database.php';
    require_once '../Models/users.php';
    
    $dbcon = Database::getDb();
    $user = new User();
    $users =  $user->getAllUsers($dbcon);
    
?>


<main style=" margin-bottom:150px;" class="container user">
	
	<h3>Users list</h3>
	
	
	<table class="table table-bordered tbl">
        <thead>
        <tr>
            <th style="width:30px; text-align:center;">Registration number</th>
            <th>First name</th>
            <th>Last name</th>            
            <th>Email</th>
            <th>Age</th>
            <th>Role</th>
            <th>Update</th>
            <th>Delete</th>
            
        </tr>
        </thead>
        <tbody>
         <?php foreach ($users as $allusers) { ?>
            <tr>
                <th style= "text-align:center;"><?= $allusers->id; ?></th>
                <td><?= $allusers->first_name; ?></td>
                <td><?= $allusers->last_name; ?></td>                
                <td><?= $allusers->email; ?></td>
                <td><?= $allusers->age; ?></td>
                <td><?= $allusers->role; ?></td>
                <td>
                    <form action="./edit-user.php" method="post">
                        <input type="hidden" name="id" value="<?= $allusers->id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateUser" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="./delete-user.php" method="post">
                        <input type="hidden" name="id" value="<?=  $allusers->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteUser" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="./add-user.php" id="btn_addUser" class="btn btn-success btn-lg float-right">Add User</a>
	
	
</main>		

<?php include '../template/footer.php'; ?>