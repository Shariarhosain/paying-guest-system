function showEditForm() {
    document.getElementById('editForm').style.display = 'block';
}

function editpro_gu(username) {
    let name = document.getElementById('editName').value;
    let email = document.getElementById('editEmail').value;
    let address = document.getElementById('editAddress').value;

    let userData = {
        'username': username,
        'name': name,
        'email': email,
        'address': address,
        'table': 'guestregistation'
    };

    let data = JSON.stringify(userData);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/editprofile/editprofilecheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('userData=' + data);

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            let response = JSON.parse(this.responseText);
            if(response.success){
                document.getElementById('name').innerText = response.name;
                document.getElementById('email').innerText = response.email;
                document.getElementById('address').innerText = response.address;
                document.getElementById('editForm').style.display = 'none';
                alert('Successfully updated information');
            } else {
                alert('Failed to update information');
            }
        }
    };
}




function editProfile(username) {

    let name = document.getElementById('editName').value;
    let email = document.getElementById('editEmail').value;
    let address = document.getElementById('editAddress').value;
    
    let userData = {
        'username': username,
        'name': name,
        'email': email,
        'address': address,
        'table': 'hostregistation'
    };
    
    let data = JSON.stringify(userData);
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/editprofile/editprofilecheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('userData=' + data);
    
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            let response = JSON.parse(this.responseText);
            if(response.success){
                document.getElementById('name').innerText = response.name;
                document.getElementById('email').innerText = response.email;
                document.getElementById('address').innerText = response.address;
                document.getElementById('editForm').style.display = 'none';
                alert('Successfully updated information');
            } else {
                alert('Failed to update information');
            }
        }
    };
    }