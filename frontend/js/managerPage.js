$('#up_id').hide();
$('.del_id').hide();
//$('#alert-form').removeClass('hide').slideDown().show();
function pass_values(id,nm,co,ci,st,bu,ac,em) {
    document.getElementById("up_sub").name = "submit_update_prov";
    document.getElementById("up_sub").value = "Оновити";
    document.getElementById("up_id").value = id;
    document.getElementById("up_name").value = nm;
    document.getElementById("up_co").value = co;
    document.getElementById("up_ci").value = ci;
    document.getElementById("up_st").value = st;
    document.getElementById("up_bu").value = bu;
    document.getElementById("up_ac").value = ac;
    document.getElementById("up_em").value = em;
}

function clear_btn() {
    document.getElementById("up_sub").name = "submit_add";
    document.getElementById("up_sub").value = "Додати";
}

function sub_delete() {
    if (confirm("Підтвердіть видалення!") === true)
        return true;
    return false;
}

function showGroups(array) {
    document.getElementById("groups-holder").innerText = array;
}