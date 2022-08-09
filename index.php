<?php
require_once('indexheader.php');
?>
    
    <div class="container-parent">
        <div class="container-child1">
            <div class='title-tag'>
                <h1>New Ageing</h1>
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
                <div class="container-search">
                    <form action="#" method="post">
                        <input type="text" name="search" placeholder="input 5 characters" class="search-bar">
                        <button type="submit" class="btn btn-secondary" name="search-button">Search</button>
                    </form>
                </div>
            </div>
            
            
            <div class="table-head">
                <div>Action</div>
                <div class="index-app-no">App no.</div>
                <div class="index-name">Name</div>
                <div class="index-contact-no">Contact Number</div>
                <div class="index-email">Email address</div>
                <div class="index-status">Status</div>
            </div>
        </div>

        <div class="container-child2">
            <?php 
                if(isset($_POST['view-100'])){
                    foreach($clientsDetails->show100() as $clientDetail){
                        $detailsInformation = $clientDetail;
                        echo    "<form action='viewdetails.php' method='post'>
                                    <div class='container-information'>
                                    <div class='information-action'>
                                        <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                        <input hidden name='id' value=". $detailsInformation['id'] .">
                                        <input hidden name='application-no' value=". $detailsInformation['application_no'] .">
                                    </div> 
    
                                    <div class='index-app-no'>
                                        <label>" . $detailsInformation['application_no'] . "</label>
                                    </div>
    
                                    <div class='index-name'>
                                        <label>" . $detailsInformation['name'] . "</label>
                                    </div>
    
                                    <div class='index-contact-no'>
                                        <label>" . $detailsInformation['contact_no1'] . "</label>
                                    </div>  
    
                                    <div class='index-email'>
                                        <label>" . $detailsInformation['personal_email'] . "</label>
                                    </div>   
    
                                    <div class='index-status'>
                                        <label>" . $detailsInformation['past_due_or_closed'] . "</label>
                                    </div>  
                                </div>
                                </form>";
                    }
                } elseif(isset($_POST['view-200'])){
                    foreach($clientsDetails->show200() as $clientDetail){
                        $detailsInformation = $clientDetail;
                        echo    "<form action='viewdetails.php' method='post'>
                                    <div class='container-information'>
                                        <div class='information-action'>
                                            <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                            <input hidden name='id' value=". $detailsInformation['id'] .">
                                            <input hidden name='application-no' value=". $detailsInformation['application_no'] .">
                                        </div> 
        
                                        <div class='index-app-no'>
                                            <label>" . $detailsInformation['application_no'] . "</label>
                                        </div>
        
                                        <div class='index-name'>
                                            <label>" . $detailsInformation['name'] . "</label>
                                        </div>
        
                                        <div class='index-contact-no'>
                                            <label>" . $detailsInformation['contact_no1'] . "</label>
                                        </div>  
        
                                        <div class='index-email'>
                                            <label>" . $detailsInformation['personal_email'] . "</label>
                                        </div>   
        
                                        <div class='index-status'>
                                            <label>" . $detailsInformation['past_due_or_closed'] . "</label>
                                        </div>  
                                    </div>
                                </form>";
                    }
                } elseif(isset($_POST['view-50'])) {
                    header('refresh: 0');
                } elseif(isset($_POST['search-button'])) {
                    foreach($clientsDetails->searchClientData() as $clientDetail){
                        $detailsInformation = $clientDetail;
                        echo    "<form action='viewdetails.php' method='post'>
                                    <div class='container-information'>
                                    <div class='information-action'>
                                        <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                        <input hidden name='id' value=". $detailsInformation['id'] .">
                                        <input hidden name='application-no' value=". $detailsInformation['application_no'] .">
                                    </div> 
    
                                    <div class='index-app-no'>
                                        <label>" . $detailsInformation['application_no'] . "</label>
                                    </div>
    
                                    <div class='index-name'>
                                        <label>" . $detailsInformation['name'] . "</label>
                                    </div>
    
                                    <div class='index-contact-no'>
                                        <label>" . $detailsInformation['contact_no1'] . "</label>
                                    </div>  
    
                                    <div class='index-email'>
                                        <label>" . $detailsInformation['personal_email'] . "</label>
                                    </div>   
    
                                    <div class='index-status'>
                                        <label>" . $detailsInformation['past_due_or_closed'] . "</label>
                                    </div>  
                                </div>
                                </form>";
                    }
                } else {
                    foreach($clientsDetails->showAllDetails() as $clientDetail){
                        $detailsInformation = $clientDetail;
                        echo    "<form action='viewdetails.php' method='post'>
                                    <div class='container-information'>
                                    <div class='information-action'>
                                        <input type='submit' name='button-view' class='btn btn-primary' value='View'>
                                        <input hidden name='id' value=". $detailsInformation['id'] .">
                                        <input hidden name='application-no' value=". $detailsInformation['application_no'] .">
                                    </div> 
    
                                    <div class='index-app-no'>
                                        <label>" . $detailsInformation['application_no'] . "</label>
                                    </div>
    
                                    <div class='index-name'>
                                        <label>" . $detailsInformation['name'] . "</label>
                                    </div>
    
                                    <div class='index-contact-no'>
                                        <label>" . $detailsInformation['contact_no1'] . "</label>
                                    </div>  
    
                                    <div class='index-email'>
                                        <label>" . $detailsInformation['personal_email'] . "</label>
                                    </div>   
    
                                    <div class='index-status'>
                                        <label>" . $detailsInformation['past_due_or_closed'] . "</label>
                                    </div>  
                                </div>
                                </form>";
                    }
                }
            ?>
            
        </div>
    </div>

    <div class="container-overlay" id="container-overlay">
        <div class="modal-logout">
            <div class="modal-logout-header">
                <p>Confirm Logout</p>
            </div>
            <div class="modal-logout-message">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-buttons">
                <form method="POST">
                    <button type="submit" class="btn btn-danger" name="log-out">YES</button>
                </form>
                <button class="btn btn-primary" id="modal-cancel">CANCEL</button>
            </div>
        </div>     
    </div>
<?php include_once('./indexfooter.php') ?>