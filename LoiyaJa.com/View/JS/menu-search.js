function populateTable() {
    let search = document.getElementById("search").value;
    let table = document.getElementById("item-table");

    for (let i = table.rows.length - 1; i > 0; i--) {
        table.deleteRow(i);
    }

    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/get-info-controller.php?item=' + search, true);
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
                newRow.innerHTML = '<tr><td colspan ="5" align="center">No Item Found</td></tr>';
            }
        }
    }
}


function addRow(table, rowdata) {
    let newRow = table.insertRow(table.rows.length);
    newRow.style.textAlign = "center";

    let cell1 = newRow.insertCell(0);
    let cell2 = newRow.insertCell(1);
    let cell3 = newRow.insertCell(2);
    let cell4 = newRow.insertCell(3);
    let cell5 = newRow.insertCell(4);

    cell1.innerHTML = '<img src="../'+ rowdata.ItemPicture +'" width="100px">'
    cell2.innerHTML = rowdata.ItemName;
    cell3.innerHTML = rowdata.Category;
    cell4.innerHTML = rowdata.Price;
    cell5.innerHTML = '<a href="item-page.php?id='+ rowdata.ItemID +'">Show Details and Give Review</a>';
}
