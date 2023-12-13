function openReviewPopup(historyId) {
    var reviewText = '';
   
    while (true) {
        reviewText = prompt('Please enter your review:');
        if (reviewText != null && reviewText.trim() != '') {
           
            submitReview(historyId, reviewText);
            break; 
        } else if (reviewText === null) {
            
            break;
        } else {
            
            alert('You must enter a review to submit it.');
        }
    }
}

function submitReview(historyId, reviewText) {
    
    var reviewData = {
        'history_id': historyId,
        'guest_review': reviewText
    };
    var data = JSON.stringify(reviewData);
  
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/historycheck/guestreviewcheck.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('reviewData=' + data);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          
            var response = JSON.parse(this.responseText);
         
            if(response.guest_review) {
           
                document.getElementById('guest_review_' + historyId).innerHTML = 'Review by You: ' + response.guest_review;
             
                var reviewButton = document.getElementById('review_button_' + historyId);
                if(reviewButton) {
                    reviewButton.style.display = 'none';
                }
               
                alert('Review submitted successfully!');
            } else if(response.error) {
             
                alert('Error submitting review: ' + response.error);
            }
        }
    };
}


function openHostReviewPopup(historyId) {
    var reviewText = '';
    var promptMessage = 'Please enter your review as a host:';
   
    while (true) {
        reviewText = prompt(promptMessage);
        if (reviewText != null && reviewText.trim() != '') {
            submitHostReview(historyId, reviewText);
            break; 
        } else if (reviewText === null) {
            break;
        } else {
            alert('You must enter a review to submit it.');
        }
    }
}

function submitHostReview(historyId, reviewText) {
    var reviewData = {
        'history_id': historyId,
        'host_review': reviewText
    };
    var data = JSON.stringify(reviewData);
  
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/historycheck/hostreviewcheck.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('reviewData=' + encodeURIComponent(data));
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if(response.host_review) {
                document.getElementById('host_review_' + historyId).innerHTML = 'Review by You: ' + response.host_review;
                var reviewButton = document.getElementById('review_button_' + historyId);
                if(reviewButton) {
                    reviewButton.style.display = 'none';
                }
                alert('Review submitted successfully!');
            } else if(response.error) {
                alert('Error submitting review: ' + response.error);
            }
        }
    };
}
