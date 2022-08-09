<?php
require_once('./includes/autoloadclasses.inc.php');
$viewInformation = new Dbhview();
$viewInformation->displaySingleUser();
$exitButton = new Dbhcontroller();
$updateInformation = new Dbhcontroller();
$updateInformation->saveEditDetails();
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
    <link rel="stylesheet" href="./css/viewDetails.css" class="rel">
    <script src="./js/viewdetails.js" defer></script>
    <script src="./js/viewdetailsautoload.js" defer></script>
    <script src="./lib/moment/moment.min.js"></script>
    <title>View Details</title>
</head>

<body class="body">
    <div class="container-header">
        <label><span>You are logged in as </span> <?php echo $sessionStored['fullname'] ?></label>
    </div>
    <div class="viewdetails-container-body">
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
                            <td data-freeze><label data-assignTagColor><?php echo $clientDetails['application_no']; ?></label></td>
                            <td data-freeze1><label data-assignTagColor><?php echo $clientDetails['contract_no']; ?></label></td>
                            <td data-freeze2><label data-assignTagColor><?php echo $clientDetails['reference_no']; ?></label></td>
                            <td data-freeze3><label data-assignTagColor><?php echo $clientDetails['name']; ?></label> </td>
                            <td data-freeze4 id="date-released"><?php echo $clientDetails['date_released']; ?></td>
                            <td id="due-date1"></td>
                            <td id="due-date2"></td>
                            <td id="due-date3"></td>
                            <td id="due-date4"></td>
                            <td id="due-date5"></td>
                            <td><?php echo $clientDetails['principal_net_processing_fee']; ?></td>
                            <td id="principal-loan"><?php echo $clientDetails['principal_loan']; ?></td>
                            <td id="terms"><?php echo $clientDetails['term']; ?></td>
                            <td id="interest"></td>
                            <td id="outstanding-balance"></td>
                            <td id="installment-payment"></td>
                            <td id="payment-date1" data-payment-terms><?php echo $clientDetails['payment_date1']; ?></td>
                            <td id="payment-date2" data-payment-terms><?php echo $clientDetails['payment_date2']; ?></td>
                            <td id="payment-date3" data-payment-terms><?php echo $clientDetails['payment_date3']; ?></td>
                            <td id="payment-date4" data-payment-terms><?php echo $clientDetails['payment_date4']; ?></td>
                            <td id="payment-date5" data-payment-terms><?php echo $clientDetails['payment_date5']; ?></td>
                            <td id="amount1"><?php echo $clientDetails['amount1']; ?></td>
                            <td id="amount2"><?php echo $clientDetails['amount2']; ?></td>
                            <td id="amount3"><?php echo $clientDetails['amount3']; ?></td>
                            <td id="amount4"><?php echo $clientDetails['amount4']; ?></td>
                            <td id="amount5"><?php echo $clientDetails['amount5']; ?></td>
                            <td><?php echo $clientDetails['late_payment1']; ?></td>
                            <td><?php echo $clientDetails['late_payment2']; ?></td>
                            <td><?php echo $clientDetails['late_payment3']; ?></td>
                            <td><?php echo $clientDetails['late_payment4']; ?></td>
                            <td><?php echo $clientDetails['late_payment5']; ?></td>
                            <td><?php echo $clientDetails['penalty1']; ?></td>
                            <td><?php echo $clientDetails['penalty2']; ?></td>
                            <td><?php echo $clientDetails['penalty3']; ?></td>
                            <td><?php echo $clientDetails['penalty4']; ?></td>
                            <td><?php echo $clientDetails['penalty5']; ?></td>
                            <td id="end-balance"><?php echo $clientDetails['end_balance']; ?></td>
                            <td id="amortization-paid"></td>
                            <td id="total-amount-paid"></td>
                            <td><?php echo $clientDetails['verifier_name']; ?></td>
                            <td><?php echo $clientDetails['best_time_to_call']; ?></td>
                            <td><?php echo $clientDetails['confirm_to_pay_time']; ?></td>
                            <td><?php echo $clientDetails['confirm_amount_to_pay']; ?></td>
                            <td><?php echo $clientDetails['ptp_date']; ?></td>
                            <td><?php echo $clientDetails['ptp_amount']; ?></td>
                            <td><?php echo $clientDetails['status_mia_of_uncontacted']; ?></td>
                            <td><?php echo $clientDetails['ptp_identifier']; ?></td>
                            <td><?php echo $clientDetails['status_identifier_active_or_default']; ?></td>
                            <td><label id="non_payment"><?php echo $clientDetails['reason_of_non_payment']; ?></label></td>
                            <td><textarea disabled id="remarks"><?php echo $clientDetails['remarks']; ?></textarea></td>
                            <td><textarea disabled id="phone_notes"><?php echo $clientDetails['notes']; ?></textarea></td>
                            <td><textarea disabled id="phone_status"><?php echo $clientDetails['phone_status']; ?></textarea></td>
                            <td><label id="times_dialed"><?php echo $clientDetails['no_of_times_dialed']; ?></label></td>
                            <td><label id="contact_no1"><?php echo $clientDetails['contact_no1']; ?></label></td>
                            <td><label id="contact_no2"><?php echo $clientDetails['contact_no2']; ?></label></td>
                            <td><label id="contact_no3"><?php echo $clientDetails['contact_no3']; ?></label></td>
                            <td><label id="office_no"><?php echo $clientDetails['office_no']; ?></label></td>
                            <td><label id="char_ref1"><?php echo $clientDetails['reference_contact_no1']; ?></label></td>
                            <td><label id="char_ref2"><?php echo $clientDetails['reference_contact_no2']; ?></label></td>
                            <td><label id="char_ref3"><?php echo $clientDetails['reference_contact_no3']; ?></label></td>
                            <td><label id="date_applied"><?php echo $clientDetails['date_applied']; ?></label></td>
                            <td><label id="personal_email"><?php echo $clientDetails['personal_email']; ?></label></td>
                            <td><textarea disabled><?php echo $clientDetails['address']; ?></textarea></td>
                            <td><?php echo $clientDetails['home_phone_no']; ?></td>
                            <td id="type-of-loan"></td>
                            <td id='loan-count'><?php echo $getClientLoanCounts->getClientLoanCount(); ?></td>
                            <td id="loan-identifier"></td>
                            <td id="type-of-loan-identifier"></td>
                            <td id="fullypaid-identifier"></td>
                            <td id="fullypaid-date-identifier"></td>
                            <td id="amortization-past-due-identifier"></td>
                            <td id="amortization-past-due"></td>
                            <td id="no-of-terms"></td>
                            <td id='type-of-pastdue'></td>
                            <td><?php echo $clientDetails['type_of_account_active_close']; ?></td>
                            <td><label id="status" data-assignTagColor><?php echo $clientDetails['past_due_or_closed']; ?></label></td>
                            <td id="date-past-due"></td>
                            <td id="days-past-due"></td>
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
                        
                        <td><label for="contact-no1">Contact no.1: </label></td>
                        <td><input type="number" name="contact-no1" id="contact-no1" maxlength="10" value="<?php echo $clientDetails['contact_no1']; ?>"></td>                        
                        

                        <td><label for="contact-no2">Contact no.2: </label></td>
                        <td><input type="number" name="contact-no2" id="contact-no2" maxlength="10" value="<?php echo $clientDetails['contact_no2']; ?>"></td>                  
                        
                        <td><label for="contact-no3">Contact no.3: </label></td>
                        <td><input type="number" name="contact-no3" id="contact-no3" maxlength="10" value="<?php echo $clientDetails['contact_no3']; ?>"></td>                         
                        
                                                                       
                    </tr>

                    <tr class="row2">
                        <td><label for="phone-status">Phone status: </label></td>
                        
                        <td><select name="phone-status" id="phone-status">
                            <option disabled selected hidden value="<?php echo $clientDetails['phone_status']; ?>"><?php echo $clientDetails['phone_status']; ?></option>
                            <option value="keeps on ringing">keeps on ringing</option>
                            <option value="cannot be reached">Cannot be reached</option>
                            <option value="out of coverage area">Out of coverage area</option>
                            <option value="auto hang-up">Auto hang-up</option>
                        </select></td>
                        
                        <td><label for="times-dialed">No. of times dialed:  </label</td>
                        <td>
                            <input type="text" name="times-dialed-new" value="">
                            <input type="hidden" name="times-dialed-old" value="<?php echo $clientDetails['no_of_times_dialed']; ?>">
                        </td>
                            
                            
                        <td><label for="notes">Notes: </label></td>
                        <td><textarea type="text" name="notes-field" id="notes"></textarea></td>   
                        <textarea name="hidden-note" class="hidden-note" hidden><?php echo $clientDetails['notes']; ?></textarea>
                    </tr>

                    <tr class="row3">
                        <td><label for="ref-1">Reference 1:  </label></td>
                        <td><input type="text" name="ref-1" id="ref-1" value="<?php echo $clientDetails['reference_contact_no1']; ?>"></td>

                        <td><label for="ref-2">Reference 2:  </label></td>
                        <td><input type="text" name="ref-2" id="ref-2" value="<?php echo $clientDetails['reference_contact_no2']; ?>"></td>

                        <td><label for="ref-3">Reference 3:  </label></td>
                        <td><input type="text" name="ref-3" id="ref-3" value="<?php echo $clientDetails['reference_contact_no3']; ?>"></td>                        
                    </tr>

                    <tr class="row4">
                        <td><label for="date-applied">Date applied: </label>
                        <td><input type="date" name="date-applied" id="date-applied" value="<?php echo $clientDetails['date_applied']; ?>"></td>  
                        
                        <td><label for="personal-email">Email: </label>
                        <td><input type="text" name="personal-email" id="personal-email" value="<?php echo $clientDetails['personal_email']; ?>"></td>                        

                        <td><label for="office-no">Office no.: </label>
                        <td><input type="text" name="office-no" id="office-no" value="<?php echo $clientDetails['office_no']; ?>"></td>                          
                    </tr>

                    <tr class="row5">
                        <td><label for="non-payment">Reason of non-payment: </label></td>
                        <td><select name="non-payment" id="non-payment">
                            <option selected disabled value="<?php echo $clientDetails['reason_of_non_payment']; ?>"><?php echo $clientDetails['reason_of_non_payment']; ?></option>
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
                        <td colspan="2"><textarea type="text" name="remarks" id="remarks-value"></textarea></td>                      
                        <textarea name="hidden-remarks" class="hidden-note" hidden><?php echo $clientDetails['remarks']; ?></textarea>               
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