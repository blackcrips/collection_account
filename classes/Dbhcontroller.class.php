<?php

class Dbhcontroller extends Dbhmodel
{

    // start of login validation when button submit in login form clicked
    public function agentsLogin()
    {
        if (isset($_POST['submit-login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $status = 'active';

            if (!isset($_SESSION)) {
                session_start();
            }

            // $sessionStored = $_SESSION['userLogin']; 

            if ($username == '' || $password == '') {
                echo "<script>alert('Invalid username or password!');</script>";
                header("refresh: 0");
                exit();
            }
            // checking for a valid input user
            $userLogin = $this->selectUserLogin($username, $password);


            if (!isset($_SESSION['userLogin']) && $userLogin == 0) {
                echo "<script>alert('Invalid username or password!');</script>";
                header("refresh: 0");
            } elseif (!isset($_SESSION['userLogin']) && $userLogin > 0) {
                if ($userLogin[0]['status'] == 'active') {
                    echo "<script>alert('User already exist! Avoid multiple login!');</script>";
                } else {
                    if ($userLogin[0]['access'] == 'Administrator') {
                        $this->addingActiveStatus($status, $userLogin[0]['id']);
                        $this->createSessionLogin($userLogin[0]);
                        header("location: ./admin.php");
                    } elseif ($userLogin[0]['access'] == 'user') {
                        $this->addingActiveStatus($status, $userLogin[0]['id']);
                        $this->createSessionLogin($userLogin[0]);
                        header("location: ./index.php");
                    }
                }
            } else {
                echo "<script>alert('Invalid username or passwords!');</script>";
                header("refresh: 0");
            }
        }
    }

    // creating session
    public function createSessionLogin($array)
    {
        // starting session
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['userLogin'] = array(
            "fullname" => $array['first_name'] . " " . $array['last_name'],
            "access" => $array['access'],
            "id" => $array['id'],
            "status" => $array['status']
        );

        return $_SESSION['userLogin'];
    }

    // Creating user data for display user name in homepage
    public function set_userdata()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        return $_SESSION['userLogin'];
    }

    public function dummySession($array)
    {
        // starting session
        if (!isset($_SESSION)) {
            session_start();
        }

        // Dummy session name
        $_SESSION['dummyUser'] = array(
            "fullname" => $array['first_name'] . " " . $array['last_name'],
            "access" => $array['access'],
            "id" => $array['id']
        );

        return $_SESSION['dummyUser'];
    }

    public function redirectToHomepage()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if ($_SESSION == null) {
            return;
        } else {
            $sessionStored = $_SESSION['userLogin'];
            if ($sessionStored['access'] == 'user') {
                header("location: ./index.php");
            } else {
                header("location: ./admin.php");
            }
        }
    }

    public function noSessionLoginUser()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $sessionStored = $_SESSION['userLogin'];

        if (!$_SESSION['userLogin']) {
            header('location: login.php');
        } elseif ($sessionStored['access'] == 'Administrator') {
            header('location: admin.php');
        } else {
            return;
        }
    }

    public function noSessionLoginAdmin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if ($_SESSION['userLogin'] == null) {
            header('location: login.php');
        } elseif (!$_SESSION['userLogin']) {
            header('location: login.php');
        } else {
            $sessionStored = $_SESSION['userLogin'];

            if ($sessionStored['access'] == 'Administrator') {
                return;
            } else {
                header('location: login.php');
            }
        }
    }

    public function logout()
    {
        $status = '';
        if (isset($_POST['log-out'])) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $sessionStored = $_SESSION['userLogin'];

            $this->addingActiveStatus($status, $sessionStored['id']);

            $_SESSION['userLogin'] = null;
            unset($_SESSION['userLogin']);

            header("location: login.php");
        }
    }

    // checking if button view was clicked in index.php page or the user manually change the ID 
    // that is visible in the url
    public function checkingValidId()
    {
        if (isset($_POST)) {
        }
    }


    //saving edit information
    public function saveEditDetails()
    {
        if (isset($_POST['recheck-save-button'])) {
            $contactNo1 = $_POST['contact-no1'];
            $contactNo2 = $_POST['contact-no2'];
            $contactNo3 = $_POST['contact-no3'];
            $phoneStatus = $_POST['phone-status'];
            $timesDialedOld = $_POST['times-dialed-old'];
            $timesDialedNew = $_POST['times-dialed-new'];
            $ref1 = $_POST['ref-1'];
            $ref2 = $_POST['ref-2'];
            $ref3 = $_POST['ref-3'];
            $dateApplied = $_POST['date-applied'];
            $email = $_POST['personal-email'];
            $officeNo = $_POST['office-no'];
            $nonPayment = $_POST['non-payment'];
            $hiddenID = $_POST['hidden-clients-id'];
            $oldNote = $_POST['hidden-note'];
            $oldRemarks = $_POST['hidden-remarks'];
            $newNote = $_POST['notes-field'];
            $newRemarks = $_POST['remarks'];
            $timesDialed = intval($timesDialedOld) + intval($timesDialedNew);
            if (!isset($_SESSION)) {
                session_start();
            }

            $sessionStored = $_SESSION['userLogin'];

            date_default_timezone_set('Asia/Manila');

            if ($newNote == '' && $newRemarks == '') {

                $this->userUpdateWithoutTextarea($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $hiddenID);
            } elseif ($newNote != '' && $newRemarks == '') {
                $notesValue = $oldNote . '/' . $newNote . ' ' . '-' . ' ' . 'added by' . ' ' . $sessionStored['fullname'] . ' ' . date("Y-m-d h:i:sa", strtotime('now'));

                $this->userUpdateWihoutRemarks($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $notesValue, $hiddenID);
            } elseif ($newNote == '' && $newRemarks != '') {
                $remarksValue = $oldRemarks . '/' . $newRemarks . ' ' . '-' . ' ' . 'added by' . ' ' . $sessionStored['fullname'] . ' ' . date("Y-m-d h:i:sa", strtotime('now'));

                $this->userUpdateWihoutNotes($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $remarksValue, $hiddenID);
            } else {
                $notesValue = $oldNote . '/' . $newNote . ' ' . '-' . ' ' . 'added by' . ' ' . $sessionStored['fullname'] . ' ' . date("Y-m-d h:i:sa", strtotime('now'));
                $remarksValue = $oldRemarks . '/' . $newRemarks . ' ' . '-' . ' ' . 'added by' . ' ' . $sessionStored['fullname'] . ' ' . date("Y-m-d h:i:sa", strtotime('now'));

                $this->userUpdateAllValid($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $notesValue, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $remarksValue, $hiddenID);
            }
        }
    }

    public function saveEditDetailsAdmin()
    {
        if (isset($_POST['recheck-save-button'])) {
            $id = $_POST['hidden-clients-id'];
            $applicationno = $_POST['application-no'];
            $contractno = $_POST['contract-no'];
            $referenceno    = $_POST['reference-no'];
            $clientname    = $_POST['client-name'];
            $datereleased = $_POST['date-released'];
            $duedateOne    = $_POST['due-dateOne'];
            $duedate2 = $_POST['due-date2'];
            $duedate3 = $_POST['due-date3'];
            $duedate4 = $_POST['due-date4'];
            $duedate5 = $_POST['due-date5'];
            $principalnetofprocessingfee = $_POST['principal-net-of-processing-fee'];
            $principalloan = $_POST['principal-loan'];
            $term = $_POST['term'];
            $interestrate = $_POST['interest-rate'];
            $outstandingbalance    = $_POST['outstanding-balance'];
            $installmentpayment    = $_POST['installment-payment'];
            $payment1 = $_POST['payment-1'];
            $payment2 = $_POST['payment-2'];
            $payment3     = $_POST['payment-3'];
            $payment4 = $_POST['payment-4'];
            $payment5 = $_POST['payment-5'];
            $amount1 = $_POST['amount-1'];
            $amount2 = $_POST['amount-2'];
            $amount3 = $_POST['amount-3'];
            $amount4 = $_POST['amount-4'];
            $amount5 = $_POST['amount-5'];
            $latepayment1 = $_POST['late-payment1'];
            $latepayment2 = $_POST['late-payment2'];
            $latepayment3 = $_POST['late-payment3'];
            $latepayment4 = $_POST['late-payment4'];
            $latepayment5 = $_POST['late-payment5'];
            $penalty1 = $_POST['penalty1'];
            $penalty2 = $_POST['penalty2'];
            $penalty3 = $_POST['penalty3'];
            $penalty4 = $_POST['penalty4'];
            $penalty5 = $_POST['penalty5'];
            $endbalance    = $_POST['end-balance'];
            $amortizationno = $_POST['amortization-no'];
            $totamountpaid = $_POST['tot-amount-paid'];
            $verifiername = $_POST['verifier-name'];
            $besttimetocall    = $_POST['best-time-to-call'];
            $confirmpay     = $_POST['confirm-pay'];
            $confirmamounttopay     = $_POST['confirm-amount-to-pay'];
            $promisetopaydate     = $_POST['promise-to-pay-date'];
            $promisetopayamount     = $_POST['promise-to-pay-amount'];
            $statusmia     = $_POST['status-mia'];
            $ptpidentifier     = $_POST['ptp-identifier'];
            $activeordefault     = $_POST['active-or-default'];
            $nonpayment     = $_POST['non-payment'];
            $remarksvalue     = $_POST['remarks'];
            $notesvalue     = $_POST['notes'];
            $phonestatus = $_POST['phone-status'];
            $timesdialed = $_POST['times-dialed'];
            $contactno1    = $_POST['contact-no1'];
            $contactno2    = $_POST['contact-no2'];
            $contactno3    = $_POST['contact-no3'];
            $officeno    = $_POST['office-no'];
            $reference1    = $_POST['reference-1'];
            $reference2    = $_POST['reference-2'];
            $reference3    = $_POST['reference-3'];
            $dateapplied     = $_POST['date-applied'];
            $personalemail = $_POST['personal-email'];
            $address = $_POST['address'];
            $homenumber = $_POST['home-number'];
            $typeofloan = $_POST['type-of-loan'];
            $timesloaned = $_POST['times-loaned'];
            $identifierid = $_POST['identifier-id'];
            $loanidentifier    = $_POST['loan-identifier'];
            $fullypaididentifier = $_POST['fully-paid-identifier'];
            $fullypaiddateidentifier = $_POST['fully-paid-date-identifier'];
            $noamortizationpastdueidentifier = $_POST['no-amortization-past-due-identifier'];
            $noamortizationpastdue    = $_POST['no-amortization-past-due'];
            $noofterms = $_POST['no-of-terms'];
            $typeofpastdue = $_POST['type-of-past-due'];
            $typeofaccount = $_POST['type-of-account'];
            $pastdueorclose = $_POST['past-due-or-close'];
            $datepastdue = $_POST['date-past-due'];
            $noofdatepastdue = $_POST['no-of-date-past-due'];
            $historyStored = $_POST['history'];

            if (!isset($_SESSION)) {
                session_start();
            }

            $sessionStored = $_SESSION['userLogin'];

            date_default_timezone_set('Asia/Manila');

            $newHistory = $historyStored . '/' . 'edit by' . ' ' . $sessionStored['fullname'] . ' ' . date("Y-m-d h:i:sa", strtotime('now'));


            $this->updateAll($applicationno, $contractno, $referenceno, $clientname, $datereleased, $duedateOne, $duedate2, $duedate3, $duedate4, $duedate5, $principalnetofprocessingfee, $principalloan, $term, $interestrate, $outstandingbalance, $installmentpayment, $payment1, $payment2, $payment3, $payment4, $payment5, $amount1, $amount2, $amount3, $amount4, $amount5, $latepayment1, $latepayment2, $latepayment3, $latepayment4, $latepayment5, $penalty1, $penalty2, $penalty3, $penalty4, $penalty5, $endbalance, $amortizationno, $totamountpaid, $verifiername, $besttimetocall, $confirmpay, $confirmamounttopay, $promisetopaydate, $promisetopayamount, $statusmia, $ptpidentifier, $activeordefault, $nonpayment, $remarksvalue, $notesvalue, $phonestatus, $timesdialed, $contactno1, $contactno2, $contactno3, $officeno, $reference1, $reference2, $reference3, $dateapplied, $personalemail, $address, $homenumber, $typeofloan, $timesloaned, $identifierid, $loanidentifier, $fullypaididentifier, $fullypaiddateidentifier, $noamortizationpastdueidentifier, $noamortizationpastdue, $noofterms, $typeofpastdue, $typeofaccount, $pastdueorclose, $datepastdue, $noofdatepastdue, $newHistory, $id);


            header("Location: ./admin.php");
        }
    }

    public function changePassword()
    {
        if (isset($_POST['change-password'])) {
            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];
            $confirmPassword = $_POST['confirm-password'];

            $sessionStored = $_SESSION['userLogin'];

            $id = $sessionStored['id'];
            $currentPassword = $this->getSingleuser($id);

            foreach (array($currentPassword) as $pwd) {
                if (!password_verify($oldPassword, $pwd['password'])) {
                    echo "<script>
                                alert('Old password did not match the current password!');
                                </script>";
                } else {
                    if ($newPassword != $confirmPassword) {
                        echo    "<script>
                                        alert('New password did not match!');
                                    </script>";
                    } else {
                        $this->updatePassword($newPassword, $id);

                        echo    "<script>
                                         alert('Password successfully updated!');
                                    </script>";
                    }
                }
                header("refresh: 0");
            }
        }
    }

    public function createUserRequest()
    {
        if (isset($_POST['submit-create'])) {
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['confirm-password'];
            $email = $_POST['email'];
            $access = $_POST['access'];


            $signUpvalidation = new Dbhcreateuservalidation($firstname, $middlename, $lastname, $username, $password, $passwordRepeat, $email, $access);

            return $signUpvalidation->signUpUser();
        }
    }

    protected function checkUser($username, $email)
    {
        $rowCount = $this->checkNewUser($username, $email);

        if ($rowCount > 0) {
            echo    "<script>
                        alert('User already exist!');
                    </script>";
            header('refresh: 0');
        }

        return $rowCount;
    }

    protected function createUser($firstname, $middlename, $lastname, $username, $password, $email, $access)
    {
        $this->creteNewUser($firstname, $middlename, $lastname, $username, $password, $email, $access);

        echo "<script>
                    alert('User successfully created!');
                </script>";
        header("Refresh: 0");
    }

    public function redirectToAdmin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $sessionStored = $_SESSION['userLogin'];

        if ($sessionStored['access'] != 'Administrator') {
            header('location: index.php');
        }
    }

    // start of Dashboard methods on displaying information

    public function getYearsToDateNew()
    {
        $startDate = 2016;
        $currentDate = date('Y');
        $newArray = [];
        $newFullyPaidArray = [];

        for ($i = $currentDate; $i >= $startDate; $i--) {
            $startYear = $i . '-01-01';
            $endYear = $i . '-12-31';
            $typeNew = 'N';

            $newArray[] = $this->dashboardNewData($startYear, $endYear, $typeNew);
            $newFullyPaidArray[] = $this->dashboardNewFullyPaid($startYear, $endYear, $typeNew);
        }

        return array($newArray, $newFullyPaidArray);
    }

    public function getYearsToDateReloan()
    {
        $startDate = 2016;
        $currentDate = date('Y');
        $reloanArray = [];
        $reloanFullyPaidArray = [];

        for ($i = $currentDate; $i >= $startDate; $i--) {
            $startYear = $i . '-01-01';
            $endYear = $i . '-12-31';
            $typeReloan = 'R';
            $fullyType = 'C';

            $reloanArray[] = $this->dashboardReloanData($startYear, $endYear, $typeReloan);
            $reloanFullyPaidArray[] = $this->dashboardReloanFullyPaid($startYear, $endYear, $typeReloan, $fullyType);
        }

        return array($reloanArray, $reloanFullyPaidArray);
    }

    public function updateUserDetails()
    {
        if (isset($_POST['submit-update'])) {
            $fname = $_POST['firstname'];
            $mname = $_POST['middlename'];
            $lname = $_POST['lastname'];
            $uname = $_POST['username'];
            $unameOriginal = $_POST['username-original'];
            $pwd = $_POST['password'];
            $pwdRepeat = $_POST['password-repeat'];
            $email = $_POST['email'];
            $access = $_POST['access'];
            $id = $_POST['firstnameID'];

            $updateUser = new Dbhupdateuservalidation($fname, $mname, $lname, $unameOriginal, $uname, $pwd, $pwdRepeat, $email, $access, $id);
            $updateUser->updateUserValidation();

            echo "<script>alert('User successfully updated!')</script>";
            header('refresh: 0');
        }
    }

    public function updateUserData($firstname, $middlename, $lastname, $username, $password, $email, $access, $id)
    {
        return $this->updateUser($firstname, $middlename, $lastname, $username, $password, $email, $access, $id);
    }

    public function deleteUser()
    {
        if (isset($_POST['delete-user'])) {
            $id = $_POST['firstnameID'];

            $this->deleteSingleUser($id);
        }
    }

    public function logOutAgent()
    {
        if (isset($_POST['dashboard-logout'])) {
            $id = $_POST['agent-id'];
            $status = ' ';

            $this->forceLogout($status, $id);
        }
    }

    public function getActiveSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $sessionStored = $_SESSION['userLogin'];

        $originalStatus = $this->getStatus($sessionStored['id']);
        if ($originalStatus['status'] != 'active') {
            $_SESSION['userLogin'] = null;
            unset($_SESSION['userLogin']);
            echo 'Your were logged out by Administrator!';
            header("Location: login.php");
        }
    }
}
