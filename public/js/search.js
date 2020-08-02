function incrementalsearch(inputname,tablename) {
    
    let input,
	filter,
	table,
	tr,
	td,
	i,
	txtValue,
	key; // cle de recherche
	
    key = document.getElementById('search').value;
    
    input = document.getElementById(inputname,tablename);
    filter = input.value.toUpperCase();
    table = document.getElementById(tablename);
    tr = table.getElementsByTagName("tr");
    
    for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[key];
	if (td) {
	    txtValue = td.textContent || td.innerText;
	    if (txtValue.toUpperCase().indexOf(filter) > -1) {
		tr[i].style.display = "";
	    } else {
		tr[i].style.display = "none";
	    }
	}
    }
}

