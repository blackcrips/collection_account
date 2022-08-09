<?php

    class Dbhview extends Dbhmodel {

        public function showAllDetails() {
            $status = "Past Due";
            return $this->getAllPastDue($status);
        }

        public function show100() {
            $status = "Past Due";
            return $this->rows100($status);
        }

        public function show200() {
            $status = "Past Due";
            return $this->rows200($status);
        }

        public function displaySingleUser() {
            if(!isset($_POST['button-view'])) {
                                
                header('location: index.php');
                                
            } else {
                $id = $_POST['id'];       
                $thisID = $this->getSingleClient($id);

            }

           
            return array($thisID);
        }

        public function getClientLoanCount(){
            
            $applicationNo = $_POST['application-no'];
            $loanCount = $this->getRowCount($applicationNo);

            return $loanCount;
        }


        public function searchClientData(){
            if(isset($_POST['search-button'])){
                $stringSearch = $_POST['search'];
                $result = $this->searchClient($stringSearch);
                return $result;
            }
        }
        

        public function getTotal(){
            $totalResult = $this->getAllTotal();
            return $totalResult;
        }

        public function searchSalesRange(){
            if(isset($_POST['submit-search-first'])){
                $typeOfLoan = filter_input(INPUT_POST,'loan-type', FILTER_SANITIZE_STRING);
                $startDate = $_POST['start-date'];
                $endDate = $_POST['end-date'];
                $fullyType = 'C';
                $getSearchRange = [];
                $totalAmount = [];

                if ($startDate == '' || $endDate ==''){
                    return 'Please input a valid parameter!';
                } else {
                    $getSearchRange[] = $this->dashboardNewData($startDate,$endDate,$typeOfLoan);
                    $totalAmount[] = $this->dashboardReloanFullyPaid($startDate,$endDate,$typeOfLoan,$fullyType);

                    return array($getSearchRange,$totalAmount);
                }
                

            }
        }

        public function getUsers(){
            $allUser = $this->getAllUsers();

            return $allUser;
        }

        public function editUser(){
            if(isset($_POST['edit-user'])){
                $id = $_POST['edit-user-id'];

                $getUser = $this->getSingleuser($id);

                return $getUser;

            }
        }

       

        

        
    }