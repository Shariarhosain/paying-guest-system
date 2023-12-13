//document.getElementById("submit").disabled = true;
function checktrxid(trxidElementId, errorElementId, submitButtonId){
    var trxid = document.getElementById(trxidElementId).value;
    var messageElement = document.getElementById(errorElementId);
    var submitButton = document.getElementById(submitButtonId);


    if(trxid.length == 0){
        messageElement.innerHTML = "";
        submitButton.disabled = true;
    }
    else{
        if(trxid.length !== 10){
            messageElement.innerHTML = "Trxid must be at most 10 characters long";
            submitButton.disabled = true;
        }
        else{
            
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../controller/billingcheck/billingcheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    messageElement.innerHTML = this.responseText;
                    if (this.responseText.trim() == 'trxid already used') {
                        submitButton.disabled = true;
                    }
                    else{
                        submitButton.disabled = false;
                    }
                }
            }
            xhttp.send('trxid='+trxid);
        }
    }
}

function validateBkashNumber(bkashNumberElementId, errorElementId, submitButtonId) {
    var bkashNumber = document.getElementById(bkashNumberElementId).value;
    var messageElement = document.getElementById(errorElementId);
    var submitButton = document.getElementById(submitButtonId);

    
    if(bkashNumber.length == 0){
        messageElement.innerHTML = "";
        submitButton.disabled = true;
    }else if(bkashNumber.length !== 11) {
        messageElement.innerHTML = "bKash number must be exactly 11 digits long.";
        submitButton.disabled = true; 
    } else {
        messageElement.innerHTML = ""; 
        //submitButton.disabled = false; 
    }
}

function payNow(historyId, rent, bkashNumber, trxid,paymentfrom) {
    var bkashNumber = document.getElementById(bkashNumber).value;
    var trxid = document.getElementById(trxid).value;
    var  from = document.getElementById(paymentfrom);



    var paymentData = {
        history_id: historyId,
        rent: rent,
        bkash_number: bkashNumber,
        trxid: trxid
    };
    var data = JSON.stringify(paymentData);

  
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/billingcheck/billingcheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            if(response.status === 'success') {
                alert('Payment requested submitted successfully.');
                var container = document.getElementById('container' + historyId);
                if (container) {
                    container.style.display = 'none'; 
                    from.style.display = 'none';
                }
            } else {
                alert(response.bkash_number);
                alert(response.trxid);
            }
                
            
        }
    };
    xhttp.send('paymentData=' + data);
}

function updateStatus(historyId, status) {
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/billingcheck/billingcheckadmin.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
      
           alert(this.responseText);
            document.getElementById('container' + historyId).style.display = 'none';
        }
    };
   
    xhttp.send('history_id=' + historyId + '&status=' + status);
}










