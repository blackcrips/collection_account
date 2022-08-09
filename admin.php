<?php
require_once('adminheader.php');
?>
<div class="container-all">
    <div class="container-parent">
        <div class="container-child1">
            <div class='title-tag'>
                <label> New Ageing</label>
            </div>

            <div class="second-layer">
                <div class="view-rows">
                    <u> View rows</u>
                    <form action="#" method="post">
                        <div><input type="submit" name='view-50' value="50"></div>
                        <div><input type="submit" name='view-100' value="100"></div>
                        <div><input type="submit" name='view-200' value="200"></div>
                    </form>
                </div>
                <div class="container-search-client">
                    <form action="#" method="post">
                        <input type="text" name="search" placeholder="input 5 characters" class="search-bar">
                        <button type="submit" class="btn btn-secondary" name="search-button">Search</button>
                    </form>
                </div>
            </div>


            <div class="table-head">
                <div class='admin-action'>Action</div>
                <div class="admin-app-no">App no.</div>
                <div class="admin-name">Name</div>
                <div class="admin-contact-no">Contact Number</div>
                <div class="admin-email">Email address</div>
                <div class="admin-status">Status</div>
            </div>
        </div>

        <div class="container-child2">
            <?php if (isset($_POST['view-100'])) : ?>
                <?php foreach ($clientsDetails->show100() as $clientDetail) : ?>
                    <?php $detailsInformation = $clientDetail; ?>

                    <form action='adminadminviewdetails.php' method='post'>
                        <div class='admin-container-information'>
                            <div class='admin-action'>
                                <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                <input hidden name='id' value="<?php echo $detailsInformation['id'] ?>">
                                <input hidden name='application-no' value="<?php echo $detailsInformation['application_no'] ?>">
                            </div>

                            <div class='admin-app-no'>
                                <label><?php echo $detailsInformation['application_no'] ?></label>
                            </div>

                            <div class='admin-name'>
                                <label><?php echo $detailsInformation['name'] ?></label>
                            </div>

                            <div class='admin-contact-no'>
                                <label><?php echo $detailsInformation['contact_no1'] ?></label>
                            </div>

                            <div class='admin-email'>
                                <label><?php echo $detailsInformation['personal_email'] ?></label>
                            </div>

                            <div class='admin-status'>
                                <label><?php echo $detailsInformation['past_due_or_closed'] ?></label>
                            </div>

                            <input hidden name='history' value="<?php echo $detailsInformation['edit_history'] ?>">
                        </div>
                    </form>
                <?php endforeach; ?>
            <?php elseif (isset($_POST['view-200'])) : ?>
                <?php foreach ($clientsDetails->show200() as $clientDetail) : ?>
                    <?php $detailsInformation = $clientDetail; ?>

                    <form action='adminviewdetails.php' method='post'>
                        <div class='admin-container-information'>

                            <div class='admin-action'>
                                <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                <input hidden name='id' value="<?php echo $detailsInformation['id'] ?>">
                                <input hidden name='application-no' value="<?php echo $detailsInformation['application_no'] ?>">
                            </div>

                            <div class='admin-app-no'>
                                <label><?php echo $detailsInformation['application_no'] ?></label>
                            </div>

                            <div class='admin-name'>
                                <label><?php echo $detailsInformation['name'] ?></label>
                            </div>

                            <div class='admin-contact-no'>
                                <label><?php echo $detailsInformation['contact_no1'] ?></label>
                            </div>

                            <div class='admin-email'>
                                <label><?php echo $detailsInformation['personal_email'] ?></label>
                            </div>

                            <div class='admin-status'>
                                <label><?php echo $detailsInformation['past_due_or_closed'] ?></label>
                            </div>

                            <input hidden name='history' value="<?php echo $detailsInformation['edit_history'] ?>">
                        </div>
                    </form>
                <?php endforeach; ?>
            <?php elseif (isset($_POST['view-50'])) : ?>
                <?php echo "<script> window.location.href = './admin.php' </script>"; ?>
            <?php elseif (isset($_POST['search-button'])) : ?>
                <?php foreach ($clientsDetails->searchClientData() as $clientDetail) : ?>
                    <?php $detailsInformation = $clientDetail; ?>

                    <form action='adminviewdetails.php' method='post'>
                        <div class='admin-container-information'>
                            <div class='action'>
                                <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                <input hidden name='id' value="<?php echo $detailsInformation['id'] ?>">
                                <input hidden name='application-no' value="<?php echo $detailsInformation['application_no'] ?>">
                            </div>

                            <div class='admin-app-no'>
                                <label><?php echo $detailsInformation['application_no'] ?></label>
                            </div>

                            <div class='admin-name'>
                                <label><?php echo $detailsInformation['name'] ?></label>
                            </div>

                            <div class='admin-contact-no'>
                                <label><?php echo $detailsInformation['contact_no1'] ?></label>
                            </div>

                            <div class='admin-email'>
                                <label><?php echo $detailsInformation['personal_email'] ?></label>
                            </div>

                            <div class='admin-status'>
                                <label><?php echo $detailsInformation['past_due_or_closed'] ?></label>
                            </div>
                            <input hidden name='history' value="<?php echo $detailsInformation['edit_history'] ?>">
                        </div>
                    </form>
                <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ($clientsDetails->showAllDetails() as $clientDetail) : ?>
                    <?php $detailsInformation = $clientDetail; ?>
                    <form action='adminviewdetails.php' method='post'>
                        <div class='admin-container-information'>
                            <div class='admin-action'>
                                <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                <input hidden name='id' value="<?php echo $detailsInformation['id']; ?>">
                                <input hidden name='application-no' value="<?php echo $detailsInformation['application_no']; ?>">
                            </div>

                            <div class='admin-app-no'>
                                <label><?php echo $detailsInformation['application_no']; ?></label>
                            </div>

                            <div class='admin-name'>
                                <label><?php echo $detailsInformation['name']; ?></label>
                            </div>

                            <div class='admin-contact-no'>
                                <label><?php echo $detailsInformation['contact_no1']; ?></label>
                            </div>

                            <div class='admin-email'>
                                <label><?php echo $detailsInformation['personal_email']; ?></label>
                            </div>

                            <div class='admin-status'>
                                <label><?php echo $detailsInformation['past_due_or_closed']; ?></label>
                            </div>
                            <input hidden name='history' value="<?php echo $detailsInformation['edit_history']; ?>">

                        </div>
                    </form>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once('./adminfooter.php'); ?>