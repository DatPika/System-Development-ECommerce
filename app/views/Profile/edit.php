<?php $this->view('shared/header','Edit Your Profile'); ?>

<form action='' method="post">
    <label>First Name:<input type="text" name="first_name" value="<?=$data->first_name?>"></label><br/>
    <label>Last Name:<input type="text" name="last_name" value="<?=$data->last_name?>"></label><br/>
    <label>Middle Name:<input type="text" name="middle_name" value="<?=$data->middle_name?>"></label><br/>
    <label>Profile Picture:</label><br>
    <input type="file" name="profilePicture"><br>
    <input type="submit" name="action" value="Save changes">
    
</form>

<a href="/Profile/index">Back</a>

<?php $this->view('shared/footer'); ?>