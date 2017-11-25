$('#sandbox-container .input-group.date').datepicker({
    format: "dd/mm/yyyy",
    startDate: "new Date();",
    maxViewMode: 2,
    todayHighlight: true
});

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

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

//triggered when approve modal is about to be shown
$('#modal-approve').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookingId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="bookingID"]').val(bookingId);
});

//triggered when reject modal is about to be shown
$('#modal-reject').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookingId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="bookingID"]').val(bookingId);
});

//triggered when cancel modal is about to be shown
$('#modal-cancel').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookingId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="bookingID"]').val(bookingId);
});


//triggered when complete modal is about to be shown
$('#modal-complete').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookingId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="bookingID"]').val(bookingId);
});

//triggered when complete modal is about to be shown
$('#modal-delete').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var bookingId = $(e.relatedTarget).data('book-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="bookingID"]').val(bookingId);
});

//booking details modal
$('#modal-details').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var carId = $(e.relatedTarget).data('car-id');
    var carMake = $(e.relatedTarget).data('car-makes');
    var carModel =$(e.relatedTarget).data('car-models');
    var ownerName =$(e.relatedTarget).data('owner-name');
    var hourlyRate =parseFloat($(e.relatedTarget).data('hourly-rate'));
    var totalPrice =parseFloat($(e.relatedTarget).data('total-price'));
    var totalHours =parseInt($(e.relatedTarget).data('total-hours'));

    //populate the textbox
    $(e.currentTarget).find('input[name="carModel"]').val(carModel);
    $(e.currentTarget).find('input[name="carModel"]').val(carModel);
    $(e.currentTarget).find('input[name="companyName"]').val(ownerName);
    
    $(e.currentTarget).find('input[name="hourlyRate"]').val(hourlyRate);
    $(e.currentTarget).find('textarea[name="hoursRent"]').val(totalHours);
    $(e.currentTarget).find('input[name="totalRate"]').val(totalPrice);
});
