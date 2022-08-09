
// initializing hidden variables to fetch values 
// this optimization will prevent long fetch waiting from database 
let hiddenDashboardYear = document.querySelectorAll('#dashboard-year');
let hiddenDashboardPesoNL = document.querySelectorAll('#dashboard-peso-NL');
let hiddenDashboardPesoNC = document.querySelectorAll('#dashboard-peso-NC');
let hiddenDashboardPesoRL = document.querySelectorAll('#dashboard-peso-RL');
let hiddenDashboardPesoRC = document.querySelectorAll('#dashboard-peso-RC');
let hiddenDashboardFNL = document.querySelectorAll('#dashboard-peso-FNL');
let hiddenDashboardFNC = document.querySelectorAll('#dashboard-peso-FNC');
let hiddenDashboardFRC = document.querySelectorAll('#dashboard-peso-FRC');
let hiddenDashboardFRL = document.querySelectorAll('#dashboard-peso-FRL');
let totalPaidNew = document.querySelectorAll('#total-paid-new');
let totalPaidReloan = document.querySelectorAll('#total-paid-reloan');


// This field will get the values of variables with hidden in name and 
// send to table for clear view

let tableBody = document.getElementById('child-information-body');


for(let a = 0; a < hiddenDashboardYear.length; a++){
    tableBody.innerHTML += `<tr id='container-${hiddenDashboardYear[a].innerHTML}'> 
                                <td id='button-year' data-button-year ='#container-${hiddenDashboardYear[a].innerHTML}'>${getNotNumber(hiddenDashboardYear[a].innerHTML)}</td>
                                <td id='new-peso'>${(getNotNumber(hiddenDashboardPesoNL[a].innerHTML)).toLocaleString()}</td>
                                <td id='reloan-peso'>${parseInt(getNotNumber(hiddenDashboardPesoRL[a].innerHTML)).toLocaleString()}</td>
                                <td id='total-peso'></td>
                                <td id='new-number'>${parseInt(getNotNumber(hiddenDashboardPesoNC[a].innerHTML)).toLocaleString()}</td>
                                <td id='reloan-number'>${parseInt(getNotNumber(hiddenDashboardPesoRC[a].innerHTML)).toLocaleString()}</td>
                                <td id='total-number'>Total Number</td>
                                <td id='collected-amount'></td>
                                <td id='fully-paid-new'>${parseInt(getNotNumber(hiddenDashboardFNL[a].innerHTML)).toLocaleString()}</td>
                                <td id='fully-paid-reloan'>${parseInt(getNotNumber(hiddenDashboardFRL[a].innerHTML)).toLocaleString()}</td>
                                <td id='total-fully-paid'>Total Peso Year</td>
                            </tr>`;
}

function getNotNumber(checkThis){
    if(checkThis == '') {
        return 0;
    } else {
        
        return checkThis;
    }
}

let totalPeso = document.querySelectorAll('#total-peso'); 
let newPeso = document.querySelectorAll('#new-peso');  
let reloanPeso = document.querySelectorAll('#reloan-peso');  

for(let b = 0; b < totalPeso.length; b++){
    let pesoNL = hiddenDashboardPesoNL[b].innerHTML;
    let pesoRL = hiddenDashboardPesoRL[b].innerHTML;

    if(pesoNL == 0 || pesoNL == '0'){
        pesoNL = 0;
        if(pesoRL == 0 || pesoRL =='0'){
            pesoRL = 0;
        } else {
            pesoRL = parseInt(pesoRL.replace(",",''));
        }
    } else {
        pesoNL = parseInt(pesoNL.replace(",",''));
    }


    let totalPesoComputed = pesoNL + pesoRL;
    totalPeso[b].innerHTML = totalPesoComputed.toLocaleString();

}

let totalCollectedAmount = document.querySelectorAll('#collected-amount');

for(let y = 0; y < totalPaidNew.length; y++){
    let paidNew = totalPaidNew[y].innerHTML;
    let paidReloan = totalPaidReloan[y].innerHTML;

    if(paidNew == 0 || paidNew == '0'){
        paidNew = 0;
        if(paidReloan == 0 || paidReloan =='0'){
            paidReloan = 0;
        } else {
            paidReloan = parseInt(paidReloan.replace(",",''));
        }
    } else {
        paidNew = parseInt(paidNew.replace(",",''));
    }


    let collectedMonth = paidNew + paidReloan;
    totalCollectedAmount[y].innerHTML = numberWithCommas(collectedMonth);
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}


let totalNumber = document.querySelectorAll('#total-number'); 
let newNumber = document.querySelectorAll('#new-number');  
let reloanNumber = document.querySelectorAll('#reloan-number');  

for(let c = 0; c < totalNumber.length; c++){
    let totalNumberComputed = parseInt(hiddenDashboardPesoNC[c].innerHTML) + parseInt(hiddenDashboardPesoRC[c].innerHTML)
    totalNumber[c].innerHTML = totalNumberComputed.toLocaleString();
}


let totalFullyPaid = document.querySelectorAll('#total-fully-paid'); 
let fullyPaidNew = document.querySelectorAll('#fully-paid-new');  
let fullyPaidReloan = document.querySelectorAll('#fully-paid-new');  

for(let d = 0; d < totalFullyPaid.length; d++){
    let totalFullyPaidComputed = parseInt(getNotNumber(hiddenDashboardFNL[d].innerHTML)) + parseInt(getNotNumber(hiddenDashboardFRL[d].innerHTML))
    totalFullyPaid[d].innerHTML = parseInt(totalFullyPaidComputed).toLocaleString();


    
}


let greenDot = document.querySelectorAll('#green-dot');
let loginName = document.querySelectorAll('#login-name');
let loginAccess = document.querySelectorAll('#agent-access');
let loginStatus = document.querySelectorAll('#agent-status');
let agentAction = document.querySelectorAll('#agent-action');

for(let f = 0; f < greenDot.length; f++){
    if(loginStatus[f].innerHTML == 'active' && loginAccess[f].innerHTML == 'Administrator'){
        loginAccess[f].style.color = 'Red';
    } else if(loginStatus[f].innerHTML == 'active' && loginAccess[f].innerHTML == 'user') {
        
    }
     else {
        loginAccess[f].style.color = '#ccc';
        agentAction[f].style.color = '#ccc';
        loginName[f].style.color = '#ccc';
        greenDot[f].style.backgroundColor = '#ccc';
        agentAction[f].addEventListener('click', (e) => {
            e.preventDefault();
        });
    }
}


let dashboardViewDetails = document.getElementById('dashboard-view-users-text');
let dashboardParentLogin = document.getElementById('dashboard-parent-login');
let dashboardInformation = document.getElementById('dashboard-information');
let usersPanel = document.getElementById('users-panel');

dashboardViewDetails.addEventListener('click', () => {
    
        dashboardParentLogin.classList.add('active');
        dashboardInformation.classList.add('active');
        dashboardViewDetails.style.height = "0";
        dashboardViewDetails.style.opacity = "0";
    
});

usersPanel.addEventListener('click', () => {
    
    dashboardParentLogin.classList.remove('active');
    dashboardInformation.classList.remove('active');
    
    dashboardViewDetails.style.height = "100%";
    dashboardViewDetails.style.opacity = "1";

});