// start of formula for dynamic record


// setting due dates and interest rate based on terms payment
let dateReleased = document.getElementById('date-released');
let termsOfpayment = document.getElementById('terms');
let dueDate1 = document.getElementById('due-date1');
let dueDate2 = document.getElementById('due-date2');
let dueDate3 = document.getElementById('due-date3');
let dueDate4 = document.getElementById('due-date4');
let dueDate5 = document.getElementById('due-date5');
let interest = document.getElementById('interest');
let duedateOne = document.getElementById('due-dateOne');


dateReleased = new moment(dateReleased.innerHTML);

if (termsOfpayment.innerHTML == '3 Weeks') {
    dueDate1.innerHTML = dateReleased.add(7, 'days').format('YYYY-MM-DD');
    
    dateReleased.subtract(7, 'days');
    dueDate2.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate3.innerHTML = dateReleased.add(21, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.035';
} else if(termsOfpayment.innerHTML == '4 Weeks') {
    dueDate1.innerHTML = dateReleased.add(7, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(7, 'days');
    dueDate2.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate3.innerHTML = dateReleased.add(21, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(21, 'days');
    dueDate4.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.080';
} else if(termsOfpayment.innerHTML == '5 Weeks') {
    dueDate1.innerHTML = dateReleased.add(7, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(7, 'days');
    dueDate2.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate3.innerHTML = dateReleased.add(21, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(21, 'days');
    dueDate4.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(28, 'days');
    dueDate5.innerHTML = dateReleased.add(35, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.125';
} else if(termsOfpayment.innerHTML == '1 Bi-Weekly') {
    dueDate1.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.0080';
}else if(termsOfpayment.innerHTML == '2 Bi-Weekly') {
    dueDate1.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate2.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.1160';
}else if(termsOfpayment.innerHTML == '3 Bi-Weekly') {
    dueDate1.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate2.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(28, 'days');
    dueDate3.innerHTML = dateReleased.add(42, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.2240';
}else if(termsOfpayment.innerHTML == '4 Bi-Weekly') {
    dueDate1.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate2.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(28, 'days');
    dueDate3.innerHTML = dateReleased.add(42, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(42, 'days');
    dueDate4.innerHTML = dateReleased.add(56, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.4480';
}else if(termsOfpayment.innerHTML == '5 Bi-Weekly') {
    dueDate1.innerHTML = dateReleased.add(14, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(14, 'days');
    dueDate2.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(28, 'days');
    dueDate3.innerHTML = dateReleased.add(42, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(42, 'days');
    dueDate4.innerHTML = dateReleased.add(56, 'days').format('YYYY-MM-DD');
    dateReleased.subtract(56, 'days');
    dueDate5.innerHTML = dateReleased.add(70, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.56';
}else {
    dueDate1.innerHTML = dateReleased.add(28, 'days').format('YYYY-MM-DD');

    interest.innerHTML = '.1520';
}


let outstandingBalance = document.getElementById('outstanding-balance');
let principalLoan = document.getElementById('principal-loan').innerHTML;

// converting principal loan value and interest rate value to string
let convertPrincipal = parseFloat(principalLoan);
let convertInterest = parseFloat(interest.innerHTML);


// computing total payment per due date based on terms of payment


// computing total loan with interest rate

outstandingBalance.innerHTML = (convertPrincipal*convertInterest) + convertPrincipal;

// computing end balance when client made an installment
let amount1 = document.getElementById('amount1').innerHTML;
let amount2 = document.getElementById('amount2').innerHTML;
let amount3 = document.getElementById('amount3').innerHTML;
let amount4 = document.getElementById('amount4').innerHTML;
let amount5 = document.getElementById('amount5').innerHTML;
let endBalance = document.getElementById('end-balance');


endBalance.innerHTML = outstandingBalance.innerHTML - (parseInt(amount1)+parseInt(amount2)+parseInt(amount3)+parseInt(amount4)+parseInt(amount5));



let installmentPayment = document.getElementById('installment-payment');
let noOfTerms = document.getElementById('no-of-terms');
if (termsOfpayment.innerHTML == '3 Weeks') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/3;
    noOfTerms.innerHTML = 3;
} else if(termsOfpayment.innerHTML == '4 Weeks') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/4;
    noOfTerms.innerHTML = 4;
} else if(termsOfpayment.innerHTML == '5 Weeks') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/5;
    noOfTerms.innerHTML = 5;
} else if(termsOfpayment.innerHTML == '1 Bi-Weekly') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/1;
    noOfTerms.innerHTML = 1;
}else if(termsOfpayment.innerHTML == '2 Bi-Weekly') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/2;
    noOfTerms.innerHTML = 2;
}else if(termsOfpayment.innerHTML == '3 Bi-Weekly') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/3;
    noOfTerms.innerHTML = 3;
}else if(termsOfpayment.innerHTML == '4 Bi-Weekly') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/4;
    noOfTerms.innerHTML = 4;
}else if(termsOfpayment.innerHTML == '5 Bi-Weekly') {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/5;
    noOfTerms.innerHTML = 5;
}else {
    installmentPayment.innerHTML = outstandingBalance.innerHTML/1;
    noOfTerms.innerHTML = 1;
}

let amortizationPaid = document.getElementById('amortization-paid');
let amortizationPaidPastDueIdentifier = document.getElementById('amortization-past-due-identifier');

amortizationPaid.innerHTML = Math.floor((parseInt(outstandingBalance.innerHTML) - parseInt(endBalance.innerHTML)) / installmentPayment.innerHTML);
amortizationPaidPastDueIdentifier.innerHTML = Math.floor((parseInt(outstandingBalance.innerHTML) - parseInt(endBalance.innerHTML)) / installmentPayment.innerHTML);


let typeOfPastDue = document.getElementById('type-of-pastdue');
typeOfPastDue.innerHTML = pastDueType();

function pastDueType(){
    let endType = ''
    if(amortizationPaidPastDueIdentifier.innerHTML == 0){
        endType = 'Close Account';
    } else if(amortizationPaidPastDueIdentifier.innerHTML == noOfTerms.innerHTML){
        endType = 'Non-starter';
    } else if(amortizationPaidPastDueIdentifier.innerHTML == ''){
        endType = 'Not Yet Due';
    } else {
        endType = 'Partial Payment';
    }

    return endType;
} 



let totalAmountPaid = document.getElementById('total-amount-paid');
totalAmountPaid.innerHTML = parseInt(amount1)+parseInt(amount2)+parseInt(amount3)+parseInt(amount4)+parseInt(amount5);


let typeOfLoan = document.getElementById('type-of-loan');
let loanCount = document.getElementById('loan-count').innerHTML;
let typeOfLoanIdentifier = document.getElementById('type-of-loan-identifier');

if(parseInt(loanCount) == 0) {
    typeOfLoan.innerHTML = 'N';
    typeOfLoanIdentifier.innerHTML = 'N';
} else {
    typeOfLoan.innerHTML = 'R-' + loanCount
    typeOfLoanIdentifier.innerHTML = 'R';
}


let fullyPaidIdentifier = document.getElementById('fullypaid-identifier');

function fpIdentifier(){
    if(outstandingBalance.innerHTML == totalAmountPaid){
        return 'C';
    } else {
        return '';
    }
}

fullyPaidIdentifier.innerHTML = fpIdentifier();


let paymentDate1 = document.getElementById('payment-date1').innerHTML;
let paymentDate2 = document.getElementById('payment-date2').innerHTML;
let paymentDate3 = document.getElementById('payment-date3').innerHTML;
let paymentDate4 = document.getElementById('payment-date4').innerHTML;
let paymentDate5 = document.getElementById('payment-date5').innerHTML;
let paymentDates = document.querySelectorAll('[data-payment-terms]');
let fullyPaidDateIdentifier = document.getElementById('fullypaid-date-identifier');
let emptyDates = [];
let testDates =[
        new Date(paymentDate1),
        new Date(paymentDate2),
        new Date(paymentDate3),
        new Date(paymentDate4),
        new Date(paymentDate5)

    ]

paymentDates.forEach(paymentDate => emptyDates.push(`${new moment(paymentDate.innerHTML).format('YYYY-MM-DD')}`));

let newDates = testDates.filter(emptyDate => emptyDate != 'Invalid Date')

fullyPaidDateIdentifier.innerHTML = moment(new Date(Math.max.apply(null, newDates))).format('YYYY-MM-DD');



let datePastDue = document.getElementById('date-past-due');

if(amount1 < installmentPayment.innerHTML){
    datePastDue.innerHTML = dueDate1.innerHTML;

} else if(amount2 < installmentPayment.innerHTML){
        datePastDue.innerHTML = dueDate2.innerHTML;

}else if(amount3 < installmentPayment.innerHTML){
    datePastDue.innerHTML = dueDate3.innerHTML;
    
}else if(amount4 < installmentPayment.innerHTML){
    datePastDue.innerHTML = dueDate4.innerHTML;

}else if(amount5 < installmentPayment.innerHTML){
    datePastDue.innerHTML = dueDate5.innerHTML;
} else {
    datePastDue.innerHTML = '';
}



let amortizationPaidPastDue = document.getElementById('amortization-past-due');

if(datePastDue.innerHTML == ''){
    amortizationPaidPastDue.innerHTML = 0;
} else {
    if(new Date(datePastDue.innerHTML) >= new Date()) {
        amortizationPaidPastDue.innerHTML = '';
    }else {
        amortizationPaidPastDue.innerHTML = Math.round(endBalance.innerHTML / installmentPayment.innerHTML)
    }
}
    
let daysPastDue = document.getElementById('days-past-due');

daysPastDue.innerHTML = getDayspastDue();

function getDayspastDue(){
    let dateToday  = new Date();
    let datePastDueClient = new Date(datePastDue.innerHTML);

    let diffInDays = dateToday.getTime() - datePastDueClient.getTime();

    let msInDay = 1000 * 3600 * 24;

    let totalDiff = diffInDays/msInDay;
    
    return Math.floor(parseInt(totalDiff));

}



let statusOfAccount = document.getElementById('status');

if(amortizationPaidPastDue.innerHTML == ''){
    statusOfAccount.innerHTML = 'Active';
} else {
    if(amortizationPaidPastDue.innerHTML > 0){
        statusOfAccount.innerHTML = 'Past Due';
    } else {
        statusOfAccount.innerHTML = 'Close'
    }
}




function setColor() {
    
    let colorData = document.querySelectorAll('[data-assignTagColor]');
    if (statusOfAccount.innerHTML == 'Past Due') {
        colorData.forEach(color => {
            color.classList.add('red');
        })
    } else if (statusOfAccount.innerHTML == 'Not Yet Due') {
        colorData.forEach(color => {
            color.classList.add('active');
        })
    }
}

setColor();


let adminViewData = document.querySelectorAll('[data-adminview]');
let adminViewEdit = document.querySelectorAll('[data-adminviewedit]');

for(let h = 0; h < adminViewData.length;h++) {
    adminViewEdit[h].value = adminViewData[h].innerHTML
    console.error();
}


console.log(adminViewEdit)
