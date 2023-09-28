function required(event)
{
    event.preventDefault();
    let i = document.forms['studentForm']['ime'].value;
    let p = document.forms['studentForm']['prezime'].value;
    let o = document.forms['studentForm']['ocena'].value;
    if(i == '' || p == ''  || o == '')
    {
        alert("Unesite trazene podatke");
		return false;
    }
        else 
    {
	    return true;
    }
}