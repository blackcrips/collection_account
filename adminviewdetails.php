<?php
require_once('./includes/autoloadclasses.inc.php');
$viewInformation = new Dbhview();
$updateInformation = new Dbhcontroller();
$updateInformation->saveEditDetailsAdmin();
$getClientLoanCounts = new Dbhview();
$getClientLoanCounts->getClientLoanCount();
$updateInformation->getActiveSession();

if(!isset($_SESSION)){
    session_start();
}

$sessionStored = $_SESSION['userLogin']; 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/adminviewdetails.css" class="rel">
    <script src="./js/viewdetails.js" defer></script>
    <script src="./js/viewdetailsautoload.js" defer></script>
    <script src="./lib/moment/moment.min.js"></script>
    <title>View Details</title>
</head>

<body class="body">
    <div class="container-header">
        <label><span>You are logged in as </span> <?php echo $sessionStored['fullname'] ?></label>
    </div>
    <div class="container-body">
        <div class="container-details-table">
            <table class="table-view-deitals">
                <thead>
                    <tr>
                        <td data-freeze>Application No.</td>
                        <td data-freeze1>Contract No.</td>
                        <td data-freeze2>Reference No.</td>
                        <td data-freeze3>Client Name</td>
                        <td data-freeze4>Date Released</td>
                        <td>Due date 1</td>
                        <td>Due date 2</td>
                        <td>Due date 3</td>
                        <td>Due date 4</td>
                        <td>Due date 5</td>
                        <td>Principal Net of Processing Fee</td>
                        <td>Principal Loan</td>
                        <td>Term</td>
                        <td>Interest rate</td>
                        <td>Outstanding Balance</td>
                        <td>Installment Payment</td>
                        <td>Payment Date 1</td>
                        <td>Payment Date 2</td>
                        <td>Payment Date 3</td>
                        <td>Payment Date 4</td>
                        <td>Payment Date 5</td>
                        <td>Amount1</td>
                        <td>Amount2</td>
                        <td>Amount3</td>
                        <td>Amount4</td>
                        <td>Amount5</td>
                        <td>Late Payment 1</td>
                        <td>Late Payment 2</td>
                        <td>Late Payment 3</td>
                        <td>Late Payment 4</td>
                        <td>Late Payment 5</td>
                        <td>Penalty 1</td>
                        <td>Penalty 2</td>
                        <td>Penalty 3</td>
                        <td>Penalty 4</td>
                        <td>Penalty 5</td>
                        <td>End Balance</td>
                        <td>Total Number of Amortization Paid</td>
                        <td>Total Amount Paid</td>
                        <td>Verifier Name</td>
                        <td>Best Time To Call</td>
                        <td>Confirm to pay time</td>
                        <td>Confirm Amount to pay</td>
                        <td>PTP Date</td>
                        <td>PTP Amount</td>
                        <td>Status (MIA of Uncontacted)</td>
                        <td>PTP Identifier</td>
                        <td>Status Identifier (Active or Default)</td>
                        <td>Reason of non-payment</td>
                        <td>Remarks</td>
                        <td>Notes</td>
                        <td>Phone Status</td>
                        <td>No. of times dialed</td>
                        <td>Contact No. 1</td>
                        <td>Contact No. 2</td>
                        <td>Contact No. 3</td>
                        <td>Office No.</td>
                        <td>Reference Contact No. 1</td>
                        <td>Reference Contact No. 2</td>
                        <td>Reference Contact No. 3</td>
                        <td>Date Applied</td>
                        <td>Personal Email</td>
                        <td>Address</td>
                        <td>Home Phone No.</td>
                        <td>Type of Loan (N-New, R1-Reloan1, R2-Reloan2, etc...)</td>
                        <td>No of time loaned</td>
                        <td>Loan Identifier ID</td>
                        <td>Type of Loan Identifier</td>
                        <td>Fully Paid Identifier</td>
                        <td>Fully Paid Date Identifier</td>
                        <td>No. of Amortization Past Due Identifier</td>
                        <td>No. of Amortization Past Due</td>
                        <td>No of Terms</td>
                        <td>Type of Past Due</td>
                        <td>Type of account (Active, Close)</td>
                        <td>Past Due or Closed</td>
                        <td>Date Past Due</td>
                        <td>Number of days Past Due</td>
                    </tr>
                </thead>

                <tbody>
                    <tr class="tbodyTr">
                    <?php foreach ($viewInformation->displaySingleUser() as $clientDetails) : ?>
                            <td data-freeze><label data-assignTagColor data-adminview><?php echo $clientDetails['application_no']; ?></label></td>
                            <td data-freeze1><label data-assignTagColor data-adminview><?php echo $clientDetails['contract_no']; ?></label></td>
                            <td data-freeze2><label data-assignTagColor data-adminview><?php echo $clientDetails['reference_no']; ?></label></td>
                            <td data-freeze3><label data-assignTagColor data-adminview><?php echo $clientDetails['name']; ?></label> </td>
                            <td data-freeze4 id="date-released" data-adminview><?php echo $clientDetails['date_released']; ?></td>
                            <td id="due-date1" data-adminview></td>
                            <td id="due-date2" data-adminview></td>
                            <td id="due-date3" data-adminview></td>
                            <td id="due-date4" data-adminview></td>
                            <td id="due-date5" data-adminview></td>
                            <td data-adminview><?php echo $clientDetails['principal_net_processing_fee']; ?></td>
                            <td id="principal-loan" data-adminview><?php echo $clientDetails['principal_loan']; ?></td>
                            <td id="terms" data-adminview><?php echo $clientDetails['term']; ?></td>
                            <td id="interest" data-adminview></td>
                            <td id="outstanding-balance" data-adminview></td>
                            <td id="installment-payment" data-adminview></td>
                            <td id="payment-date1" data-payment-terms data-adminview><?php echo $clientDetails['payment_date1']; ?></td>
                            <td id="payment-date2" data-payment-terms data-adminview><?php echo $clientDetails['payment_date2']; ?></td>
                            <td id="payment-date3" data-payment-terms data-adminview><?php echo $clientDetails['payment_date3']; ?></td>
                            <td id="payment-date4" data-payment-terms data-adminview><?php echo $clientDetails['payment_date4']; ?></td>
                            <td id="payment-date5" data-payment-terms data-adminview><?php echo $clientDetails['payment_date5']; ?></td>
                            <td id="amount1" data-adminview><?php echo $clientDetails['amount1']; ?></td>
                            <td id="amount2" data-adminview><?php echo $clientDetails['amount2']; ?></td>
                            <td id="amount3" data-adminview><?php echo $clientDetails['amount3']; ?></td>
                            <td id="amount4" data-adminview><?php echo $clientDetails['amount4']; ?></td>
                            <td id="amount5" data-adminview><?php echo $clientDetails['amount5']; ?></td>
                            <td data-adminview><?php echo $clientDetails['late_payment1']; ?></td>
                            <td data-adminview><?php echo $clientDetails['late_payment2']; ?></td>
                            <td data-adminview><?php echo $clientDetails['late_payment3']; ?></td>
                            <td data-adminview><?php echo $clientDetails['late_payment4']; ?></td>
                            <td data-adminview><?php echo $clientDetails['late_payment5']; ?></td>
                            <td data-adminview><?php echo $clientDetails['penalty1']; ?></td>
                            <td data-adminview><?php echo $clientDetails['penalty2']; ?></td>
                            <td data-adminview><?php echo $clientDetails['penalty3']; ?></td>
                            <td data-adminview><?php echo $clientDetails['penalty4']; ?></td>
                            <td data-adminview><?php echo $clientDetails['penalty5']; ?></td>
                            <td id="end-balance" data-adminview><?php echo $clientDetails['end_balance']; ?></td>
                            <td id="amortization-paid" data-adminview></td>
                            <td id="total-amount-paid" data-adminview></td>
                            <td data-adminview><?php echo $clientDetails['verifier_name']; ?></td>
                            <td data-adminview><?php echo $clientDetails['best_time_to_call']; ?></td>
                            <td data-adminview><?php echo $clientDetails['confirm_to_pay_time']; ?></td>
                            <td data-adminview><?php echo $clientDetails['confirm_amount_to_pay']; ?></td>
                            <td data-adminview><?php echo $clientDetails['ptp_date']; ?></td>
                            <td data-adminview><?php echo $clientDetails['ptp_amount']; ?></td>
                            <td data-adminview><?php echo $clientDetails['status_mia_of_uncontacted']; ?></td>
                            <td data-adminview><?php echo $clientDetails['ptp_identifier']; ?></td>
                            <td data-adminview><?php echo $clientDetails['status_identifier_active_or_default']; ?></td>
                            <td><label id="non_payment" data-adminview><?php echo $clientDetails['reason_of_non_payment']; ?></label></td>
                            <td><textarea disabled id="remarks" data-adminview><?php echo $clientDetails['remarks']; ?></textarea></td>
                            <td><textarea disabled id="phone_notes" data-adminview><?php echo $clientDetails['notes']; ?></textarea></td>
                            <td><textarea disabled id="phone_status" data-adminview><?php echo $clientDetails['phone_status']; ?></textarea></td>
                            <td><label id="times_dialed" data-adminview><?php echo $clientDetails['no_of_times_dialed']; ?></label></td>
                            <td><label id="contact_no1" data-adminview><?php echo $clientDetails['contact_no1']; ?></label></td>
                            <td><label id="contact_no2" data-adminview><?php echo $clientDetails['contact_no2']; ?></label></td>
                            <td><label id="contact_no3" data-adminview><?php echo $clientDetails['contact_no3']; ?></label></td>
                            <td><label id="office_no" data-adminview><?php echo $clientDetails['office_no']; ?></label></td>
                            <td><label id="char_ref1" data-adminview><?php echo $clientDetails['reference_contact_no1']; ?></label></td>
                            <td><label id="char_ref2" data-adminview><?php echo $clientDetails['reference_contact_no2']; ?></label></td>
                            <td><label id="char_ref3" data-adminview><?php echo $clientDetails['reference_contact_no3']; ?></label></td>
                            <td><label id="date_applied" data-adminview><?php echo $clientDetails['date_applied']; ?></label></td>
                            <td><label id="personal_email" data-adminview><?php echo $clientDetails['personal_email']; ?></label></td>
                            <td><textarea disabled data-adminview><?php echo $clientDetails['address']; ?></textarea></td>
                            <td data-adminview><?php echo $clientDetails['home_phone_no']; ?></td>
                            <td id="type-of-loan" data-adminview></td>
                            <td id='loan-count' data-adminview><?php echo $getClientLoanCounts->getClientLoanCount(); ?></td>
                            <td id="loan-identifier" data-adminview></td>
                            <td id="type-of-loan-identifier" data-adminview></td>
                            <td id="fullypaid-identifier" data-adminview></td>
                            <td id="fullypaid-date-identifier" data-adminview></td>
                            <td id="amortization-past-due-identifier" data-adminview></td>
                            <td id="amortization-past-due" data-adminview></td>
                            <td id="no-of-terms" data-adminview></td>
                            <td id='type-of-pastdue' data-adminview></td>
                            <td data-adminview><?php echo $clientDetails['type_of_account_active_close']; ?></td>
                            <td><label id="status" data-assignTagColor data-adminview><?php echo $clientDetails['past_due_or_closed']; ?></label></td>
                            <td id="date-past-due" data-adminview></td>
                            <td id="days-past-due" data-adminview></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container-edit-details">

            <table class="edit-table">
                <form method="POST">

                <tbody>
                    <tr class="row1">
                        <?php foreach ($viewInformation->displaySingleUser() as $clientDetails) : ?>
                        <input type="text" hidden name='hidden-clients-id' value="<?php echo $clientDetails['id']; ?>">
                        
                        <td><label for="application-no">Application no. </label></td>
                        <td><input type="number" data-adminviewedit name="application-no" id="application-no" maxlength="10"></td>                        
                        

                        <td><label for="contract-no">Contract no.: </label></td>
                        <td><input type="text" data-adminviewedit  name="contract-no" id="contract-no" maxlength="10"></td>                  
                        
                        <td><label for="reference-no">Reference no.: </label></td>
                        <td><input type="number" data-adminviewedit name="reference-no" id="reference-no" maxlength="10"></td>                         
                        
                                                                       
                    </tr>

                    <tr class="row2">
                        <td><label for="client-name">Client name: </label></td>
                        <td><input type="text" data-adminviewedit name="client-name" id="client-name"></td>
                        
                        <td><label for="date-released">Date released:  </label</td>
                        <td><input type="date" data-adminviewedit name="date-released" id="date-released"></td>
                            
                            
                        <td><label for="due-date1">Due date 1: </label></td>
                        <td><input type="date" data-adminviewedit name="due-date1" data-adminviewedit id="due-dateOne"></td>   
                    </tr>

                    <tr class="row3">
                        <td><label for="due-date2">Due date 2: </label></td>
                        <td><input type="date" data-adminviewedit name="due-date2" id="due-date2"></td>  
                        
                        <td><label for="due-date3">Due date 3: </label></td>
                        <td><input type="date" data-adminviewedit name="due-date3" id="due-date3"></td>  

                        <td><label for="due-date4">Due date 4: </label></td>
                        <td><input type="date" data-adminviewedit name="due-date4" id="due-date4"></td> 
                    </tr>

                    <tr class="row4"> 
                        
                        <td><label for="due-date5">Due date 5: </label></td>
                        <td><input type="date" data-adminviewedit name="due-date5" id="due-date5"></td>  

                        <td><label for="principal-net-of-processing-fee">Principal Net of Processing Fee: </label></td>
                        <td><input type="text" data-adminviewedit name="principal-net-of-processing-fee" id="principal-net-of-processing-fee"></td>  

                        <td><label for="principal-loan">Principal loan: </label>
                        <td><input type="text" data-adminviewedit name="principal-loan" id="principal-loan"></td>                          
                    </tr>

                    <tr class="row5"> 
                        
                        <td><label for="term">Term: </label></td>
                        <td><select data-adminviewedit name="term" id="term">
                            <option hidden disabled selected value="monthly">Monthly</option>
                            <option value="3 Weeks">3 Weeks</option>
                            <option value="4 Weeks">4 Weeks</option>
                            <option value="5 Weeks">5 Weeks</option>
                            <option value="1 Bi-Weekly">1 Bi-Weekly</option>
                            <option value="2 Bi-Weekly">2 Bi-Weekly</option>
                            <option value="3 Bi-Weekly">3 Bi-Weekly</option>
                            <option value="4 Bi-Weekly">4 Bi-Weekly</option>
                            <option value="5 Bi-Weekly">5 Bi-Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select></td>  

                        <td><label for="interest-rate">Interest rate: </label></td>
                        <td><input type="text" data-adminviewedit name="interest-rate" id="interest-rate"></td>  

                        <td><label for="outstanding-balance">Outstanding balance: </label>
                        <td><input type="text" data-adminviewedit name="outstanding-balance" id="outstanding-balance"></td>                          
                    </tr>

                    <tr class="row6"> 
                        
                        <td><label for="installment-payment">Installment payment: </label></td>
                        <td><input type="text" data-adminviewedit name="installment-payment" id="installment-payment"></td>  

                        <td><label for="payment-1">Payment date 1: </label></td>
                        <td><input type="date" data-adminviewedit name="payment-1" id="payment-1"></td>  

                        <td><label for="payment-2">Payment date 2: </label></td>
                        <td><input type="date" data-adminviewedit name="payment-2" id="payment-2"></td>                         
                    </tr>

                    <tr class="row7"> 
                        
                        <td><label for="payment-3">Payment date 3: </label></td>
                        <td><input type="date" data-adminviewedit name="payment-3" id="payment-3"></td>   

                        <td><label for="payment-4">Payment date 4: </label></td>
                        <td><input type="date" data-adminviewedit name="payment-4" id="payment-4"></td>  

                        <td><label for="payment-5">Payment date 5: </label></td>
                        <td><input type="date" data-adminviewedit name="payment-5" id="payment-5"></td>                            
                    </tr>

                    <tr class="row8"> 
                        
                        <td><label for="amount-1">Payment amount 1: </label></td>
                        <td><input type="text" data-adminviewedit name="amount-1" id="amount-1"></td>   

                        <td><label for="amount-2">Payment amount 2: </label></td>
                        <td><input type="text" data-adminviewedit name="amount-2" id="amount-2"></td> 
                        
                        <td><label for="amount-3">Payment amount 3: </label></td>
                        <td><input type="text" data-adminviewedit name="amount-3" id="amount-3"></td> 
                    </tr>

                    <tr class="row9"> 
                        
                        <td><label for="amount-4">Payment amount 4: </label></td>
                        <td><input type="text" data-adminviewedit name="amount-1" id="amount-4"></td>   

                        <td><label for="amount-5">Payment amount 5: </label></td>
                        <td><input type="text" data-adminviewedit name="amount-5" id="amount-5"></td> 
                        
                        <td><label for="late-payment1">Late payment 1: </label></td>
                        <td><input type="text" data-adminviewedit name="late-payment1" id="late-payment1"></td> 
                    </tr>

                    <tr class="row10"> 
                        
                        <td><label for="late-payment2">Late payment 2: </label></td>
                        <td><input type="text" data-adminviewedit name="late-payment2" id="late-payment2"></td> 
                        
                        <td><label for="late-payment3">Late payment 3: </label></td>
                        <td><input type="text" data-adminviewedit name="late-payment3" id="late-payment3"></td> 
                        
                        <td><label for="late-payment4">Late payment 4: </label></td>
                        <td><input type="text" data-adminviewedit name="late-payment4" id="late-payment4"></td> 
                    </tr>

                    <tr class="row11"> 
                        
                        <td><label for="late-payment5">Late payment 5: </label></td>
                        <td><input type="text" data-adminviewedit name="late-payment5" id="late-payment5"></td> 
                        
                        <td><label for="penalty1">Penalty 1: </label></td>
                        <td><input type="text" data-adminviewedit name="penalty1" id="penalty1"></td> 
                        
                        <td><label for="penalty2">Penalty 2: </label></td>
                        <td><input type="text" data-adminviewedit name="penalty2" id="penalty2"></td> 
                    </tr>

                    <tr class="row12"> 
                        
                        <td><label for="penalty3">Penalty 3: </label></td>
                        <td><input type="text" data-adminviewedit name="penalty3" id="penalty3"></td> 

                        <td><label for="penalty4">Penalty 4: </label></td>
                        <td><input type="text" data-adminviewedit  name="penalty4" id="penalty4"></td> 

                        <td><label for="penalty5">Penalty 5: </label></td>
                        <td><input type="text" data-adminviewedit name="penalty5" id="penalty5"></td> 
                    </tr>

                    <tr class="row13"> 
                        
                        <td><label for="end-balance">End balance: </label></td>
                        <td><input type="text" data-adminviewedit  name="end-balance" id="end-balance"></td> 

                        <td><label for="amortization-no">Total number of amortization paid: </label></td>
                        <td><input type="text" data-adminviewedit  name="amortization-no" id="amortization-no"></td> 

                        <td><label for="tot-amount-paid">Total amount paid: </label></td>
                        <td><input type="text" data-adminviewedit  name="tot-amount-paid" id="tot-amount-paid"></td> 
                    </tr>

                    <tr class="row14"> 
                        
                        <td><label for="verifier-name">Verifier name: </label></td>
                        <td><input type="text" data-adminviewedit  name="verifier-name" id="verifier-name"></td> 

                        <td><label for="    -time-to-call">Best time to call: </label></td>
                        <td><input type="text" data-adminviewedit  name="best-time-to-call" id="best-time-to-call"></td> 

                        <td><label for="confirm-pay">Confirm to pay: </label></td>
                        <td><input type="date" data-adminviewedit  name="confirm-pay" id="confirm-pay"></td> 
                    </tr>

                    <tr class="row15"> 
                        
                        <td><label for="confirm-amount-to-pay">Confirm amount to pay: </label></td>
                        <td><input type="text" data-adminviewedit  name="confirm-amount-to-pay" id="confirm-amount-to-pay"></td> 

                        <td><label for="promise-to-pay-date">Promise to pay date: </label></td>
                        <td><input type="date" data-adminviewedit  name="promise-to-pay-date" id="promise-to-pay-date"></td> 

                        <td><label for="promise-to-pay-amount">Promise to pay amount: </label></td>
                        <td><input type="text" data-adminviewedit  name="promise-to-pay-amount" id="promise-to-pay-amount"></td> 
                    </tr>

                    <tr class="row16"> 
                        
                        <td><label for="status-mia">Status (MIA of uncontacted): </label></td>
                        <td><input type="text" data-adminviewedit  name="status-mia" id="status-mia"></td> 

                        <td><label for="ptp-identifier">PTP identifier: </label></td>
                        <td><input type="text" data-adminviewedit  name="ptp-identifier" id="ptp-identifier"></td> 

                        <td><label for="active-or-default">Status Identifier (Active or Default): </label></td>
                        <td><select data-adminviewedit  name="active-or-default" id="active-or-default">
                            <option value="Active">Active</option>
                            <option value="Close">Close</option>
                        </select></td> 
                    </tr>

                    <tr class="row17"> 
                        
                        <td><label for="non-payment">Reason of non-payment: </label></td>
                        <td><select name="non-payment" data-adminviewedit id="non-payment">
                            <option value="	ATM DEBITED">	ATM DEBITED	</option>
                            <option value="AVAILED PRETERM RELOAN">	AVAILED PRETERM RELOAN	</option>
                            <option value="BREAD WINNER, SOLO PARENT">	BREAD WINNER, SOLO PARENT	</option>
                            <option value="CHANGED SCHEDULE OF SALARY DATE">	CHANGED SCHEDULE OF SALARY DATE	</option>
                            <option value="CHARACTER PROBLEM">	CHARACTER PROBLEM	</option>
                            <option value="COMPLAINT / DISSAPOINTED ON HOW PREVIOUS OFFICER HANDLE THEIR ACCOUNT">	COMPLAINT / DISSAPOINTED ON HOW PREVIOUS OFFICER HANDLE THEIR ACCOUNT	</option>
                            <option value="DECEASED">	DECEASED	</option>
                            <option value="DEATH (IMMEDIATE FAMILY MEMBER, RELATIVES, OTHERS)">	DEATH (IMMEDIATE FAMILY MEMBER, RELATIVES, OTHERS)	</option>
                            <option value="DELAYED / WAITING FOR REMITTANCE">	DELAYED / WAITING FOR REMITTANCE	</option>
                            <option value="DELAYED SALARY">	DELAYED SALARY	</option>
                            <option value="FRAUD">	FRAUD	</option>
                            <option value="FUNDS FOR PAYMENT BORROWED BY OTHERS (IMMEDIATE FAMILY MEMBER, RELATIVES, FRIENDS)">	FUNDS FOR PAYMENT BORROWED BY OTHERS (IMMEDIATE FAMILY MEMBER, RELATIVES, FRIENDS)	</option>
                            <option value="FUNDS FOR PAYMENT USED FOR FAMILY GATHERING">	FUNDS FOR PAYMENT USED FOR FAMILY GATHERING	</option>
                            <option value="FUNDS FOR PAYMENT USED FOR TRAVEL EXPENSES">	FUNDS FOR PAYMENT USED FOR TRAVEL EXPENSES	</option>
                            <option value="FUNDS FOR PAYMENT USED TO PAY TUITION FEE OF CHILD, SIBLING, RELATIVE">	FUNDS FOR PAYMENT USED TO PAY TUITION FEE OF CHILD, SIBLING, RELATIVE	</option>
                            <option value="HIDING (CALLED THIRD PARTY)">	HIDING (CALLED THIRD PARTY)	</option>
                            <option value="HOSPITALIZED / SICK (SELF, IMMEDIATE FAMILY MEMBER, RELATIVES, OTHERS)">	HOSPITALIZED / SICK (SELF, IMMEDIATE FAMILY MEMBER, RELATIVES, OTHERS)	</option>
                            <option value="INSUFFICIENT FUND (CAN'T PAY FULL AMOUNT)">	INSUFFICIENT FUND (CAN'T PAY FULL AMOUNT)	</option>
                            <option value="JOBLESS (RESIGNED, TERMINATED)">	JOBLESS (RESIGNED, TERMINATED)	</option>
                            <option value="LAW OFFICE ARRANGEMENT">	LAW OFFICE ARRANGEMENT	</option>
                            <option value="LOA (LEAVE OF ABSENCE) DUE TO SICKNESS">	LOA (LEAVE OF ABSENCE) DUE TO SICKNESS	</option>
                            <option value="LOAN USED BY OTHERS (IMMEDIATE FAMILY MEMBER, RELATIVES, FRIENDS)">	LOAN USED BY OTHERS (IMMEDIATE FAMILY MEMBER, RELATIVES, FRIENDS)	</option>
                            <option value="MATERNITY LEAVE">	MATERNITY LEAVE	</option>
                            <option value="MISMATCH SALARY TO DUE DATE">	MISMATCH SALARY TO DUE DATE	</option>
                            <option value="MONEY USED FOR EMERGENCY">	MONEY USED FOR EMERGENCY	</option>
                            <option value="NEGLECT OBLIGATION (OVERLOOKED, FORGOT)">	NEGLECT OBLIGATION (OVERLOOKED, FORGOT)	</option>
                            <option value="NIOP (NO INTENTION OF PAYING)">	NIOP (NO INTENTION OF PAYING)	</option>
                            <option value="OUT OF THE COUNTRY">	OUT OF THE COUNTRY	</option>
                            <option value="OUT OF TOWN">	OUT OF TOWN	</option>
                            <option value="OVEREXPOSED (BILLS PAYMENT, DEBT)">	OVEREXPOSED (BILLS PAYMENT, DEBT)	</option>
                            <option value="PAYMENT CHANNELS OFFLINE ">	PAYMENT CHANNELS OFFLINE 	</option>
                            <option value="ROBBED">	ROBBED	</option>
                            <option value="SEC COMPLAINT">	SEC COMPLAINT	</option>
                            <option value="THIRD PARTY CONTACT">	THIRD PARTY CONTACT	</option>
                            <option value="UNCONTACTED">	UNCONTACTED	</option>
                            <option value="UNDEDUCTED PRETERM / DOUBLE DISBURSED">	UNDEDUCTED PRETERM / DOUBLE DISBURSED	</option>
                            <option value="UNDER MEDICATION">	UNDER MEDICATION	</option>
                            <option value="UNLOCATED">	UNLOCATED	</option>
                            <option value="WAITING FOR SSS / GSIS / PAG IBIG LOAN">	WAITING FOR SSS / GSIS / PAG IBIG LOAN	</option>
                        </select></td>   

                        <td><label for="remarks">Remarks: </label></td>
                        <td ><textarea type="text" data-adminviewedit name="remarks" id="remarks-value"></textarea></td>                  

                        <td><label for="notes">Notes: </label></td>
                        <td ><textarea type="text" data-adminviewedit name="notes" id="notes-value"></textarea></td>                   
                    </tr>

                    <tr class="row18"> 
                        
                        <td><label for="phone-status">Phone status: </label></td>
                        <td><select name="phone-status" data-adminviewedit id="phone-status">
                            <option disabled selected hidden value="keeps on ringing">keeps on ringing</option>
                            <option value="keeps on ringing">keeps on ringing</option>
                            <option value="cannot be reached">Cannot be reached</option>
                            <option value="out of coverage area">Out of coverage area</option>
                            <option value="auto hang-up">Auto hang-up</option>
                        </select></td> 

                        <td><label for="times-dialed">Number of times dialed: </label></td>
                        <td><input type="number" data-adminviewedit name="times-dialed" id="times-dialed"></td> 

                        <td><label for="contact-no1">Contact number 1: </label></td>
                        <td><input type="number" data-adminviewedit name="contact-no1" id="contact-no1"></td> 
                    </tr>

                    <tr class="row19"> 
                        
                        <td><label for="contact-no2">Contact number 2: </label></td>
                        <td><input type="number" data-adminviewedit name="contact-no2" id="contact-no2"></td>

                        <td><label for="contact-no3">Contact number 3: </label></td>
                        <td><input type="number" data-adminviewedit name="contact-no3" id="contact-no3"></td>

                        <td><label for="office-no">Office no.: </label></td>
                        <td><input type="number" data-adminviewedit name="office-no" id="office-no"></td>                        
                    </tr>

                    <tr class="row19">                         
                        <td><label for="reference-1">Reference contact no. 1: </label></td>
                        <td><input type="text" data-adminviewedit name="reference-1" id="reference-1"></td>

                        <td><label for="reference-2">Reference contact no. 2: </label></td>
                        <td><input type="text" data-adminviewedit name="reference-2" id="reference-2"></td>
                        
                        <td><label for="reference-3">Reference contact no. 3: </label></td>
                        <td><input type="text" data-adminviewedit name="reference-3" id="reference-3"></td>
                    </tr>

                    <tr class="row21"> 
                        <td><label for="date-applied">Date applied: </label></td>
                        <td><input type="date" data-adminviewedit name="date-applied" id="date-applied"></td> 
                        
                        <td><label for="personal-email">Personal email: </label></td>
                        <td><input type="text" data-adminviewedit name="personal-email" id="personal-email"></td>

                        <td><label for="address">Address: </label></td>
                        <td><input type="text" data-adminviewedit name="address" id="address"></td>                        
                    </tr>

                    <tr class="row22"> 
                    <td><label for="home-number">Home phone no.: </label></td>
                        <td><input type="number" data-adminviewedit name="home-number" id="home-number"></td> 
                        
                        <td><label for="type-of-loan">Type of Loan (N-New, R1-Reloan1, R2-Reloan2, etc...)</label></td>
                        <td><input type="text" data-adminviewedit name="type-of-loan" id="type-of-loan"></td>

                        <td><label for="times-loaned">Number of times loaned: </label></td>
                        <td><input type="number" data-adminviewedit name="times-loaned" id="times-loaned"></td>

                        
                    </tr>

                    <tr class="row23"> 
                        <td><label for="identifier-id">Loan identifier ID: </label></td>
                        <td><input type="text" data-adminviewedit name="identifier-id" id="identifier-id"></td> 
                        
                        <td><label for="loan-identifier">Type of loan identifier</label></td>
                        <td><input type="text" data-adminviewedit name="loan-identifier" id="loan-identifier"></td>

                        <td><label for="fully-paid-identifier">Fully paid identifier: </label></td>
                        <td><input type="text" data-adminviewedit name="fully-paid-identifier" id="fully-paid-identifier"></td>

                        
                    </tr>

                    <tr class="row24"> 
                        <td><label for="fully-paid-date-identifier">Fully paid date identifier: </label></td>
                        <td><input type="date" data-adminviewedit name="fully-paid-date-identifier" id="fully-paid-date-identifier"></td> 
                        
                        <td><label for="no-amortization-past-due-identifier">No. of Amortization Past Due Identifier:</label></td>
                        <td><input type="number" data-adminviewedit name="no-amortization-past-due-identifier" id="no-amortization-past-due-identifier"></td>

                        <td><label for="no-amortization-past-due">No. of Amortization Past Due: </label></td>
                        <td><input type="number" data-adminviewedit name="no-amortization-past-due" id="no-amortization-past-due"></td>                        
                    </tr>

                    <tr class="row25"> 
                        <td><label for="no-of-terms">Number of terms: </label></td>
                        <td><input type="number" data-adminviewedit name="no-of-terms" id="no-of-terms"></td> 
                        
                        <td><label for="type-of-past-due">Type of past due</label></td>
                        <td><select data-adminviewedit name="type-of-past-due" id="type-of-past-due">
                            <option value="Close Account">Close Account</option>
                            <option value="Non-starter">Non-starter</option>
                            <option value="Partial payment">Partial payment</option>
                        </select></td>

                        <td><label for="type-of-account">Type of account (Active or Close): </label></td>
                        <td><select data-adminviewedit name="type-of-account" id="type-of-account">
                            <option value="Close">Close</option>
                            <option value="Active">Active</option>
                        </select></td>

                        
                    </tr>

                    <tr class="row26"> 
                        <td><label for="past-due-or-close">Past due or Closed: </label></td>
                        <td><select data-adminviewedit name="past-due-or-close" id="past-due-or-close">
                            <option value="Past Due">Past Due</option>
                            <option value="Close">Close</option>
                        </select></td> 
                        
                        <td><label for="date-past-due">Date past due:</label></td>
                        <td><input type="date" data-adminviewedit name="date-past-due" id="date-past-due"></td>

                        <td><label for="no-of-date-past-due">Number of date past due: </label></td>
                        <td><input type="number" data-adminviewedit name="no-of-date-past-due" id="no-of-date-past-due"></td>
                        <td><input type="text" hidden name='history' value ="<?php echo $clientDetails['edit_history']; ?>"></td>

                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="button-box">
                            <button class="btn btn-primary" id="save-button">Save</button>
                            <button class="btn btn-danger" id="exit-button">Exit</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="container-recheck" id="container-recheck">
                <div class="container-recheck-inside">
                    <label id="recheck-txt">Continue to save information?</label>
                        <div class="container-recheck-button">
                            <button type="submit" class="btn btn-primary" name="recheck-save-button" id="recheck-save">Continue</button>
                            <button class="btn btn-primary"  name="recheck-exit" id="recheck-exit">Yes</button>
                            <button class="btn btn-danger" id="recheck-cancel">Cancel</button>
                        </div>                    
                </div>                
            </div>

            </form>
        </div>
    </div>

</body>

</html>