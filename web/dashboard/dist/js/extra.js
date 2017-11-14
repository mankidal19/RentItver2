function hideDiv(select){
    if(select==1){
         document.getElementById("form1").style.display="block";
         document.getElementById("form2").style.display="none";
          document.getElementById('choose').disabled=true;
    }
    
    else if(select==2){
         document.getElementById("form2").style.display="block";
         document.getElementById("icon2").style.display="block";
         document.getElementById("form1").style.display="none";
         document.getElementById('choose').disabled=true;
    }
}

function addClass(div,i,classname){
    var node = document.getElementById(div).getElementsByTagName("li")[i];
    node.setAttribute("class", classname);
}

function addClass(div,i,classname,j,k){
    var node = document.getElementById(div).getElementsByTagName("li")[i];
    node.setAttribute("class", classname);
    
    var node2 = document.getElementById(div).getElementsByTagName("li")[j];
    node2.setAttribute("class", "");
    
    var node3 = document.getElementById(div).getElementsByTagName("li")[k];
    node3.setAttribute("class", "");
}

//triggered when modal is about to be shown
$('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var carId = $(e.relatedTarget).data('car-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="carID"]').val(carId);
});