function searchDeliveryPerson() {
    let search = document.getElementById("search").value;
    let table = document.getElementById("delivery-person-table");

    for (let i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../Controller/get-delivery-person.php?name=' + search, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = JSON.parse(this.responseText);
            if (result.length > 0) {
                result.forEach(data => {
                    addRow(table, data);
                });
            }
            else{
                let newRow = table.insertRow(table.rows.length);
                newRow.innerHTML = '<tr><td colspan ="4" align="center">No Delivery Person Found</td></tr>';
            }
        }
    }
}


function addRow(table, rowdata) {
    let newRow = table.insertRow(table.rows.length);

    let cell1 = newRow.insertCell(0);
    let cell2 = newRow.insertCell(1);
    let cell3 = newRow.insertCell(2);
    let cell4 = newRow.insertCell(3);

    cell1.innerHTML = rowdata.Fullname;
    cell2.innerHTML = rowdata.Username;
    cell3.innerHTML = rowdata.Email;
    cell4.innerHTML = '<a href="view-information.php?id='+ rowdata.UserID +'">Show Details</a>';
}