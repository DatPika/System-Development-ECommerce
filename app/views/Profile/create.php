<?php $this->view('shared/header','Create Your Profile'); ?>

<form action='' method="post" enctype="multipart/form-data">
    <label>First Name:<input type="text" name="first_name"></label><br/>
    <label>Last Name:<input type="text" name="last_name"></label><br/>
    <label>Middle Name:<input type="text" name="middle_name"></label><br/>
    <label>Profile Picture:</label><br>
    <input type="file" name="profilePicture"><br>
    <input type="submit" name="action" value="Create">
</form>

<a href="/User/profile">Back</a>

<?php $this->view('shared/footer'); ?>