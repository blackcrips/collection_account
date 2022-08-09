<?php


class Dbhmodel extends Dbh
{

    // getting user data when input username and password valid
    protected function selectUserLogin($username, $password)
    {

        // $sql = "SELECT * FROM login_data WHERE username = ? AND password = ?";
        // $stmt = $this->connect()->prepare($sql);
        // $stmt->execute([$username, $password]);
        // $result = $stmt->fetch();

        // return $result;


        $sql = "SELECT * FROM login_data WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);



        $hashedPassword = $stmt->fetchAll();
        $checkPassword = password_verify($password, $hashedPassword[0]['password']);

        if (!$checkPassword) {
            return 0;
            $stmt = null;
            exit();
        } else {

            // $result = $stmt->fetchAll();
            return $hashedPassword;
            exit();
        }
    }

    // checking if input user data is valid and return a number of row available
    protected function selectUserLoginRow($username, $password)
    {
        $sql = "SELECT * FROM login_data WHERE username = ? AND password = ?";
        $stmt = $this->connect()->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $hashedPassword]);
        $result = $stmt->rowCount();

        return $result;
    }

    // adding active status to logged in user
    protected function addingActiveStatus($status, $id)
    {
        $sql = "UPDATE login_data SET status = :status WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':status' => $status, ':id' => $id]);

        return $stmt;
    }

    // getting single user when button view is click
    protected function getSingleuser($id)
    {
        $sql = "SELECT * FROM login_data WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();

        return $result;
    }

    //updating agents password
    protected function updatePassword($password, $id)
    {
        $sql = "UPDATE login_data SET password = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$hashedPassword, $id]);

        return $stmt;
    }

    protected function getAllUsers()
    {
        $sql = "SELECT * FROM login_data";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    protected function getAllPastDue($status)
    {
        $sql = "SELECT * FROM clients_information WHERE past_due_or_closed = ? ORDER BY date_released desc LIMIT 50";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function rows100($status)
    {
        $sql = "SELECT * FROM clients_information WHERE past_due_or_closed = ? ORDER BY date_released desc LIMIT 100";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function rows200($status)
    {
        $sql = "SELECT * FROM clients_information WHERE past_due_or_closed = ? ORDER BY date_released desc LIMIT 200";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);

        $result = $stmt->fetchAll();
        return $result;
    }

    // getting single user when button view is click based on unique ID
    protected function getSingleClient($id)
    {
        $sql = "SELECT * FROM clients_information WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();

        return $result;
    }

    // getting single user when button view is click based on unique reference no
    protected function getRowCount($applicationNo)
    {
        $sql = "SELECT * FROM clients_information WHERE application_no = :applicationNo";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':applicationNo' => $applicationNo]);
        $row = $stmt->rowCount();

        return $row;
    }

    // search
    protected function searchClient($stringSearch)
    {
        $sql = "SELECT * FROM clients_information WHERE application_no LIKE :stringSearch OR contract_no LIKE :stringSearch OR reference_no LIKE :stringSearch OR name LIKE '%$stringSearch%' OR contact_no1 LIKE :stringSearch OR contact_no2 LIKE :stringSearch OR contact_no3 LIKE :stringSearch ORDER BY date_released desc limit 1000";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':stringSearch' => $stringSearch]);
        $result = $stmt->fetchAll();

        return $result;
    }

    // update information in viewdetails page
    protected function userUpdateAllValid($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $notesValue, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $remarksValue, $hiddenID)
    {
        $sql = "UPDATE clients_information SET contact_no1 = ?, contact_no2 = ?, contact_no3 = ?, phone_status = ?, no_of_times_dialed = ?, notes = ?, reference_contact_no1 = ?, reference_contact_no2 = ?, reference_contact_no3 = ?, date_applied = ?, personal_email =?, office_no = ?, reason_of_non_payment = ?, remarks = ?  WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $notesValue, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $remarksValue, $hiddenID]);
    }

    // update information in viewdetails page with exception 
    // fetch this sql when remarks and notes field are empty
    protected function userUpdateWithoutTextarea($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $hiddenID)
    {
        $sql = "UPDATE clients_information SET contact_no1 = ?, contact_no2 = ?, contact_no3 = ?, phone_status = ?, no_of_times_dialed = ?, reference_contact_no1 = ?, reference_contact_no2 = ?, reference_contact_no3 = ?, date_applied = ?, personal_email =?, office_no = ?, reason_of_non_payment = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $hiddenID]);
    }

    //fetch this sql when remarks field is empty
    protected function userUpdateWihoutRemarks($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $notesValue, $hiddenID)
    {
        $sql = "UPDATE clients_information SET contact_no1 = ?, contact_no2 = ?, contact_no3 = ?, phone_status = ?, no_of_times_dialed = ?, reference_contact_no1 = ?, reference_contact_no2 = ?, reference_contact_no3 = ?, date_applied = ?, personal_email =?, office_no = ?, reason_of_non_payment = ?, notes = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $notesValue, $hiddenID]);
    }

    // fetch this sql when notes filed is empty
    protected function userUpdateWihoutNotes($contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $remarksValue, $hiddenID)
    {
        $sql = "UPDATE clients_information SET contact_no1 = ?, contact_no2 = ?, contact_no3 = ?, phone_status = ?, no_of_times_dialed = ?, reference_contact_no1 = ?, reference_contact_no2 = ?, reference_contact_no3 = ?, date_applied = ?, personal_email =?, office_no = ?, reason_of_non_payment = ?, remarks = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$contactNo1, $contactNo2, $contactNo3, $phoneStatus, $timesDialed, $ref1, $ref2, $ref3, $dateApplied, $email, $officeNo, $nonPayment, $remarksValue, $hiddenID]);
    }

    protected function updateAll($applicationno, $contractno, $referenceno, $clientname, $datereleased, $duedateOne, $duedate2, $duedate3, $duedate4, $duedate5, $principalnetofprocessingfee, $principalloan, $term, $interestrate, $outstandingbalance, $installmentpayment, $payment1, $payment2, $payment3, $payment4, $payment5, $amount1, $amount2, $amount3, $amount4, $amount5, $latepayment1, $latepayment2, $latepayment3, $latepayment4, $latepayment5, $penalty1, $penalty2, $penalty3, $penalty4, $penalty5, $endbalance, $amortizationno, $totamountpaid, $verifiername, $besttimetocall, $confirmpay, $confirmamounttopay, $promisetopaydate, $promisetopayamount, $statusmia, $ptpidentifier, $activeordefault, $nonpayment, $remarksvalue, $notesvalue, $phonestatus, $timesdialed, $contactno1, $contactno2, $contactno3, $officeno, $reference1, $reference2, $reference3, $dateapplied, $personalemail, $address, $homenumber, $typeofloan, $timesloaned, $identifierid, $loanidentifier, $fullypaididentifier, $fullypaiddateidentifier, $noamortizationpastdueidentifier, $noamortizationpastdue, $noofterms, $typeofpastdue, $typeofaccount, $pastdueorclose, $datepastdue, $noofdatepastdue, $newHistory, $id)
    {
        $sql = "UPDATE clients_information SET application_no =  ?,	contract_no = ?, reference_no = ?,	name = ?, date_released = ?,	due_date1 = ?,	due_date2 = ?,	due_date3 = ?,	due_date4 = ?,	due_date5 = ?,	principal_net_processing_fee = ?,	principal_loan = ?,	term = ?,	interest_rate = ?,	outstanding_balance = ?,	installment_payment = ?,	payment_date1 = ?,	payment_date2 = ?,	payment_date3 = ?,	payment_date4 = ?,	payment_date5 = ?,	amount1 = ?,	amount2 = ?,	amount3 = ?,	amount4 = ?,	amount5 = ?,	late_payment1 = ?,	late_payment2 = ?,	late_payment3 = ?,	late_payment4 = ?,	late_payment5 = ?,	penalty1 = ?,	penalty2 = ?,	penalty3 = ?,	penalty4 = ?,	penalty5 = ?,	end_balance = ?,	total_no_of_amortization_paid = ?,	total_amount_paid = ?,	verifier_name = ?,	best_time_to_call = ?,	confirm_to_pay_time = ?,	confirm_amount_to_pay = ?,	ptp_date = ?,	ptp_amount = ?,	status_mia_of_uncontacted = ?,	ptp_identifier = ?,	status_identifier_active_or_default = ?,	reason_of_non_payment = ?,	remarks = ?,	notes = ?,	phone_status = ?,	no_of_times_dialed = ?,	contact_no1 = ?,	contact_no2 = ?,	contact_no3 = ?,	office_no = ?,	reference_contact_no1 = ?,	reference_contact_no2 = ?,	reference_contact_no3 = ?,	date_applied = ?,	personal_email = ?,	address = ?,	home_phone_no = ?,	type_of_loan = ?,	no_of_time_loaned = ?,	loan_identifier_id = ?,	type_of_loan_identifier = ?,	fully_paid_identifier = ?,	fully_paid_date_identifier = ?,	no_of_amortization_past_due_identifier = ?,	no_of_amortization_past_due = ?,	no_of_terms = ?,	type_of_past_due = ?,	type_of_account_active_close = ?,	past_due_or_closed = ?,	date_past_due = ?,	number_of_days_past_due = ?,edit_history = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$applicationno, $contractno, $referenceno, $clientname, $datereleased, $duedateOne, $duedate2, $duedate3, $duedate4, $duedate5, $principalnetofprocessingfee, $principalloan, $term, $interestrate, $outstandingbalance, $installmentpayment, $payment1, $payment2, $payment3, $payment4, $payment5, $amount1, $amount2, $amount3, $amount4, $amount5, $latepayment1, $latepayment2, $latepayment3, $latepayment4, $latepayment5, $penalty1, $penalty2, $penalty3, $penalty4, $penalty5, $endbalance, $amortizationno, $totamountpaid, $verifiername, $besttimetocall, $confirmpay, $confirmamounttopay, $promisetopaydate, $promisetopayamount, $statusmia, $ptpidentifier, $activeordefault, $nonpayment, $remarksvalue, $notesvalue, $phonestatus, $timesdialed, $contactno1, $contactno2, $contactno3, $officeno, $reference1, $reference2, $reference3, $dateapplied, $personalemail, $address, $homenumber, $typeofloan, $timesloaned, $identifierid, $loanidentifier, $fullypaididentifier, $fullypaiddateidentifier, $noamortizationpastdueidentifier, $noamortizationpastdue, $noofterms, $typeofpastdue, $typeofaccount, $pastdueorclose, $datepastdue, $noofdatepastdue, $newHistory, $id]);
    }

    protected function checkNewUser($username, $email)
    {
        $sql = "SELECT * FROM login_data WHERE username = ? OR email= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email]);
        $row = $stmt->rowCount();
        return $row;
    }




    protected function creteNewUser($firstname, $middlename, $lastname, $username, $password, $email, $userAccess)
    {
        $sql = "INSERT INTO login_data (`first_name`, `middle_name`, `last_name`, `username`, `password`, `email`, `access`) VALUES (?,?,?,?,?,?,?)";

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (!$stmt = $this->connect()->prepare($sql)) {
            exit();
        }

        return $stmt->execute([$firstname, $middlename, $lastname, $username, $hashedPassword, $email, $userAccess]);
    }

    // for Dashboard
    // getting accounts "N" based on year forwarded
    protected function dashboardNewData($startDate, $endDate, $loanType)
    {
        $sql = "SELECT date_released, COUNT(*) AS 'rowCount',
                    COALESCE(SUM(total_amount_paid), 0) AS 'totalAmountPaid',
                    COALESCE(SUM(outstanding_balance),0) AS 'outstandingBalance'
                    FROM clients_information WHERE
                    (date_released >= :startDate AND date_released <= :endDate) AND type_of_loan_identifier = :loanType";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':startDate' => $startDate, ':endDate' => $endDate, ':loanType' => $loanType]);
        $result = $stmt->fetchAll();


        return array($result);
    }

    protected function dashboardNewFullyPaid($startDate, $endDate, $loanType)
    {
        $sql = "SELECT COUNT(date_released) AS 'rowCount',
                    COALESCE(SUM(outstanding_balance),0) AS 'outstandingBalance'
                    FROM clients_information WHERE
                    date_released >= :startDate AND date_released <= :endDate AND type_of_loan_identifier = :loanType AND fully_paid_identifier = 'C'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':startDate' => $startDate, ':endDate' => $endDate, ':loanType' => $loanType]);
        $result = $stmt->fetchAll();


        return array($result);
    }

    protected function dashboardReloanData($startDate, $endDate, $loanType)
    {
        $sql = "SELECT date_released, COUNT(*) AS 'rowCountReloan',
                    SUM(total_amount_paid) AS 'totalAmountPaid',
                    SUM(outstanding_balance) AS 'outstandingBalance'
                    FROM clients_information WHERE
                    date_released >= :startDate AND date_released <= :endDate AND type_of_loan_identifier = :loanType";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':startDate' => $startDate, ':endDate' => $endDate, ':loanType' => $loanType]);
        $result = $stmt->fetchAll();


        return array($result);
    }

    protected function dashboardReloanFullyPaid($startDate, $endDate, $loanType, $fullyType)
    {
        $sql = "SELECT COUNT(date_released) AS 'rowCount',
                    COALESCE(SUM(outstanding_balance), 0) AS 'outstandingBalance',
                    COALESCE(SUM(total_amount_paid), 0) AS 'totalAmountPaid'
                    FROM clients_information WHERE
                    date_released >= :startDate AND date_released <= :endDate AND type_of_loan_identifier = :loanType AND fully_paid_identifier = :fullyType";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([':startDate' => $startDate, ':endDate' => $endDate, ':loanType' => $loanType, ':fullyType' => $fullyType]);
        $result = $stmt->fetchAll();


        return array($result);
    }

    protected function getAllTotal()
    {
        $sql = "SELECT SUM(outstanding_balance) AS 'outstandingBalance',
                    SUM(total_amount_paid) AS 'totalAmountPaid',
                    SUM(end_balance) AS 'endBalance',
                    COUNT(outstanding_balance) AS 'totalClient' FROM clients_information ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    protected function updateUser($fname, $mname, $lname, $uname, $pwd, $email, $access, $id)
    {
        $sql = "UPDATE login_data SET first_name = ?, middle_name = ?, last_name = ?, username = ?, password = ?, email = ?, access = ? WHERE id = ?";

        if (!$stmt = $this->connect()->prepare($sql)) {
            exit();
        }
        $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt->execute([$fname, $mname, $lname, $uname, $hashedPassword, $email, $access, $id]);
    }

    protected function deleteSingleUser($id)
    {
        $sql = "DELETE FROM login_data WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function forceLogout($status, $id)
    {
        $sql = "UPDATE login_data SET status = :status WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([':status' => $status, ':id' => $id])) {
            echo 'Server error!';
            exit();
        }

        $stmt->execute([':status' => $status, ':id' => $id]);
    }

    protected function getStatus($id)
    {
        $sql = "SELECT * FROM login_data WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute([':id' => $id])) {
            echo 'You were logged out by the Administrator!';
            exit();
        }

        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();

        return $result;
    }
}
