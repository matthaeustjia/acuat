//Axios to fetch data from the database

function getItemData() {
    axios.get('/item/')
}


//Item Modal
//Delete Modal
$('#itemDeleteModal').on('show.bs.modal', function (e) {
    var itemId = $(e.relatedTarget).data('item-id');
    $(e.currentTarget).find('input[name="itemId"]').val(itemId);
    $(deleteForm).get(0).setAttribute('action', '/item/' + $(deleteForm.itemId).val());
});

//Edit Modal
$('#itemEditModal').on('show.bs.modal', function (e) {
    var itemId = $(e.relatedTarget).data('item-id');
    var itemName = $(e.relatedTarget).data('item-name');
    var itemDescription = $(e.relatedTarget).data('item-description');
    $(e.currentTarget).find('input[name="id"]').val(itemId);
    $(e.currentTarget).find('input[name="name"]').val(itemName);
    $(e.currentTarget).find('textarea[name="description"]').val(itemDescription);
    $(editForm).get(0).setAttribute('action', '/item/' + $(editForm.id).val());
});

//Manufacturer Modal
//Delete Modal
$('#manufacturerDeleteModal').on('show.bs.modal', function (e) {
    var manufacturerId = $(e.relatedTarget).data('manufacturer-id');
    var manufacturerName = $(e.relatedTarget).data('manufacturer-name');
    $(e.currentTarget).find('input[name="manufacturerId"]').val(manufacturerId);
    $(e.currentTarget).find('input[name="manufacturerName"]').val(manufacturerName);
    $(deleteForm).get(0).setAttribute('action', '/manufacturer/' + $(deleteForm.manufacturerId).val());

});

//Edit Modal
$('#manufacturerEditModal').on('show.bs.modal', function (e) {
    var manufacturerId = $(e.relatedTarget).data('manufacturer-id');
    var manufacturerName = $(e.relatedTarget).data('manufacturer-name');
    var manufacturerPhone = $(e.relatedTarget).data('manufacturer-phone');
    var manufacturerEmail = $(e.relatedTarget).data('manufacturer-email');
    $(e.currentTarget).find('input[name="id"]').val(manufacturerId);
    $(e.currentTarget).find('input[name="name"]').val(manufacturerName);
    $(e.currentTarget).find('input[name="phone"]').val(manufacturerPhone);
    $(e.currentTarget).find('input[name="email"]').val(manufacturerEmail);
    $(editForm).get(0).setAttribute('action', '/manufacturer/' + $(editForm.id).val());
});

//Customer Modal
//Delete Modal
$('#customerDeleteModal').on('show.bs.modal', function (e) {
    var customerId = $(e.relatedTarget).data('customer-id');
    var customerName = $(e.relatedTarget).data('customer-name');
    $(e.currentTarget).find('input[name="customerId"]').val(customerId);
    $(e.currentTarget).find('input[name="customerName"]').val(customerName);
    $(deleteForm).get(0).setAttribute('action', '/customer/' + $(deleteForm.customerId).val());

});

$('#customerEditModal').on('show.bs.modal', function (e) {
    var customerId = $(e.relatedTarget).data('customer-id');
    var customerName = $(e.relatedTarget).data('customer-name');
    var customerPhone = $(e.relatedTarget).data('customer-phone');
    var customerEmail = $(e.relatedTarget).data('customer-email');
    $(e.currentTarget).find('input[name="id"]').val(customerId);
    $(e.currentTarget).find('input[name="name"]').val(customerName);
    $(e.currentTarget).find('input[name="phone"]').val(customerPhone);
    $(e.currentTarget).find('input[name="email"]').val(customerEmail);
    $(editForm).get(0).setAttribute('action', '/customer/' + $(editForm.id).val());
});

//InvoiceMasukModal
//Delete Modal
$('#invoicemasukDeleteModal').on('show.bs.modal', function (e) {
    var invoicemasukId = $(e.relatedTarget).data('invoicemasuk-id');
    $(e.currentTarget).find('input[name="invoicemasukId"]').val(invoicemasukId);
    $(deleteForm).get(0).setAttribute('action', '/invoicemasuk/' + $(deleteForm.invoicemasukId).val());

});

//EditModal
$('#invoicemasukEditModal').on('show.bs.modal', function (e) {
    var invoicemasukId = $(e.relatedTarget).data('invoicemasuk-id');
    $(editForm).get(0).setAttribute('action', '/invoicemasuk/' + invoicemasukId);
});

//InvoiceKeluar Modal
//Delete Modal
$('#invoicekeluarDeleteModal').on('show.bs.modal', function (e) {
    var invoiceKeluarId = $(e.relatedTarget).data('invoicekeluar-id');
    $(e.currentTarget).find('input[name="invoicekeluarId"]').val(invoiceKeluarId);
    $(deleteForm).get(0).setAttribute('action', '/invoicekeluar/' + invoiceKeluarId);
});

//EditModal
$('#invoicekeluarEditModal').on('show.bs.modal', function (e) {
    var invoicekeluarId = $(e.relatedTarget).data('invoicekeluar-id');
    $(editForm).get(0).setAttribute('action', '/invoicekeluar/' + invoicekeluarId);
});

//ItemMasukModal
//Delete Modal
$('#itemmasukDeleteModal').on('show.bs.modal', function (e) {
    var itemmasukId = $(e.relatedTarget).data('itemmasuk-id');
    $(e.currentTarget).find('input[name="itemmasukId"]').val(itemmasukId);
    $(deleteForm).get(0).setAttribute('action', '/itemmasuk/' + $(deleteForm.itemmasukId).val());
});

//ItemKeluar
//Delete Modal
$('#itemkeluarDeleteModal').on('show.bs.modal', function (e) {
    var itemkeluarId = $(e.relatedTarget).data('itemkeluar-id');
    $(e.currentTarget).find('input[name="itemkeluarId"]').val(itemkeluarId);
    $(deleteForm).get(0).setAttribute('action', '/itemkeluar/' + $(deleteForm.itemkeluarId).val());
});


//Autocomplete dropdown, send ajax get when user type.
//Ajax request when user input some value on itemid
$(document).ready(function () {
    $("#item-id").keyup(function () {
        $.ajax({
            type: 'GET',
            url: '/api/item',
            data: {
                search: $("#item-id").val() //send GET search parameter according to the user input
            },
            dataType: 'json',
            success: function (data) { // if request is success, reset all dropdown to empty
                $('#item-id-data').empty();
                $('#item-id-data').show(); //show dropdown
                $(data).each(function () { //loop all the json object
                    itemList = "<option value=\" " + this.id + "\">" + this.id + " - " + this.name + "</option>";
                    $('#item-id-data').append(itemList); //append the list, adding it to <option>
                    $('#item-id-data').attr('size', data.length); //change the size of the dropdown value accordingly
                });
            }
        });
    });
});

//when user click on the item data, minimize the dropdown
$(document).ready(function () {
    $("#item-id-data").click(function () {
        $('#item-id-data').attr('size', 1);
    });
});

//when user change the value of the data, also change item-id input value.
$(document).ready(function () {
    $("#item-id-data").change(function () {
        $('#item-id').val($('#item-id-data').val());
    });
    $("#item-id-data").blur(function () {
        $('#item-id').val($('#item-id-data').val());
    });
});