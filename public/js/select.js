function removeAll(selectBox) {
    while (selectBox.options.length > 1) {
        selectBox.remove(1);
    }
}

function reffresh(){
    let select_operation = document.getElementById('operation');
    let select_acteur = document.getElementById('acteur');

    if(select_acteur.options[select_acteur.selectedIndex].value === 'medecin'){
	removeAll(select_operation);
	let newOption = new Option('Consultation','consultation');
	select_operation.add(newOption,undefined);
	document.getElementById('grp').disabled = false;
    }
    
    if(select_acteur.options[select_acteur.selectedIndex].value === 'patient')
    {
	removeAll(select_operation);
	let newOption = new Option('Inscrit','inscrit');
	select_operation.add(newOption,undefined)
	document.getElementById('grp').disabled = true;

    }
    if(select_acteur.options[select_acteur.selectedIndex].value === 'caissier')
    {
	removeAll(select_operation);
	let newOption = new Option('facture','facture');
	select_operation.add(newOption,undefined);
	document.getElementById('grp').disabled = false;
    }
}
