<?php
require_once('adminheader.php');
?>
<div class="create-user-body">
    <div class="create-user-container">
        <div class="create-user-content">
            <?php if ($getTotal->editUser()) : ?>
                <?php $userData = $getTotal->editUser() ?>
                <div class="create-user">
                    <form method="post">

                        <div class="create-title">
                            <p class='title'>UPDATE USER</p>
                        </div>

                        <div class="create-firstname">
                            <label for="firstname">First name:</label>
                            <input type="text" name='firstname' id="firstname" value="<?php echo $userData['first_name']; ?>">
                            <input type="text" name='firstnameID' id="firstname" hidden value="<?php echo $userData['id']; ?>">
                        </div>

                        <div class="create-middlename">
                            <label for="middlename">Middle name:</label>
                            <input type="text" name='middlename' id="middlename" value="<?php echo $userData['middle_name']; ?>">
                        </div>

                        <div class="create-lastname">
                            <label for="lastname">Last name:</label>
                            <input type="text" name='lastname' id="lastname" value="<?php echo $userData['last_name']; ?>">
                        </div>

                        <div class="create-username">
                            <label for="username">username:</label>
                            <input type="text" name='username' id="username" value="<?php echo $userData['username']; ?>">
                            <input type="text" hidden name='username-original' id="username-original" value="<?php echo $userData['username']; ?>">
                        </div>

                        <div class="create-password">
                            <label for="password">Password:</label>
                            <input type="password" name='password' id="password" value="<?php echo $userData['password']; ?>">
                        </div>

                        <div class="create-password-repeat">
                            <label for="password-repeat">Repeat password:</label>
                            <input type="password" name='password-repeat' id="password-repeat" value="">
                        </div>

                        <div class="create-email">
                            <label for="email">Email:</label>
                            <input type="email" name='email' id="email" value="<?php echo $userData['email']; ?>">
                        </div>

                        <div class="create-access">
                            <label for="access">Access</label>
                            <select name="access" class="access" id="access">
                                <option hidden selected value="<?php echo $userData['access']; ?>"><?php echo $userData['access']; ?></option>
                                <option value="Administrator">Administrator</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="create-button">
                            <button type="submit" name="submit-update" class="btn btn-primary">Update</button>
                            <button type="submit" name='delete-user' class="btn btn-warning" id="delete-user">Delete</button>
                        </div>

                        <div class="create-button-delete">
                            <button type="button" class="btn btn-danger" id="cancel-create">Cancel</button>
                        </div>

                    </form>
                </div>
            <?php else : ?>
                <div class="create-user">
                    <form method="post">

                        <div class="create-title">
                            <p class='title'>CREATE USER</p>
                        </div>

                        <div class="create-firstname">
                            <label for="firstname">First name:</label>
                            <input type="text" name='firstname' id="firstname" />
                        </div>

                        <div class="create-middlename">
                            <label for="middlename">Middle name:</label>
                            <input type="text" name='middlename' id="middlename" />
                        </div>

                        <div class="create-lastname">
                            <label for="lastname">Last name:</label>
                            <input type="text" name='lastname' id="lastname" />
                        </div>

                        <div class="create-username">
                            <label for="username">Username:</label>
                            <input type="text" name='username' id="username" />
                        </div>

                        <div class="create-password">
                            <label for="password">Password:</label>
                            <input type="password" name='password' id="password" />
                        </div>

                        <div class="create-confirm-password">
                            <label for="confirm-password">Confirm password:</label>
                            <input type="password" name='confirm-password' id="confirm-password" />
                        </div>

                        <div class="create-email">
                            <label for="email">Email:</label>
                            <input type="email" name='email' id="email" />
                        </div>

                        <div class="create-access">
                            <label for="access">Access</label>
                            <select name="access" class="access" id="access" />
                            <option disabled hidden selected>--Select--</option>
                            <option value="admin">Administrator</option>
                            <option value="user">User</option>
                            </select>
                        </div>

                        <div class="create-button">
                            <button type="submit" name="submit-create" class="btn btn-primary">Create</button>
                            <button type="button" class="btn btn-danger" id="cancel-create2">Cancel</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>

        <div class="create-active-user-container">
            <div class="create-active-user">
                <?php foreach ($getTotal->getUsers() as $value) : ?>
                    <form method='post'>
                        <div class="create-user-list">
                            <button type='submit' name="edit-user"><?php echo $value['first_name'] . " " . $value['last_name'] ?></button>
                            <input type='text' name="edit-user-id" hidden value="<?php echo $value['id'] ?>">
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('./adminfooter.php'); ?>
<script src="./js/createuser.js"></script>