$.ajaxSetup({
    
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	
    } 
});

let a = document.getElementById('files');
let cons_id = document.getElementById('cons_id');
function basename(path) {
   return path.split('/').reverse()[0];
}

function create_checkbox(balise,file){
    let checkbox = document.createElement('input');
    checkbox.type = "checkbox";
    checkbox.name = "filepath2[]";
    checkbox.value = file;
    checkbox.id = "checkid";

    let label = document.createElement('label')
    label.htmlFor = "checkid";
    label.id = "labelcheckid";
    label.appendChild(document.createTextNode(basename(file)));
    
    balise.appendChild(checkbox);
    balise.appendChild(label);

}
function delete_old_checkbox()
{
    const cbs = document.querySelectorAll('#checkid');
    const lbcbs = document.querySelectorAll('#labelcheckid');
    cbs.forEach((cb) => {
	cb.remove();
    });
    lbcbs.forEach((lbcb) => {
	lbcb.remove();
    });
}

$("#cons_id").on('change', function(e){

    if(cons_id.value === '')
    {
	$('form').attr('action', '/emails');
	delete_old_checkbox();
    }
    else
    {
	$('form').attr('action', '/sendp');
	$.ajax({
	    data: {cons_id: cons_id.value},
	    dataType: 'json',
            type:'GET',
            url:"/ajaxfiles",
	    success : function(data, statut){
		delete_old_checkbox();
		data.forEach(item => create_checkbox(a,item));
	    },
	    
	    error : function(resultat, statut, erreur){
		$('form').attr('action', '/emails');
	    },
	    complete : function(resultat, statut){
	    }
	})
    }	      
});

