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


//ItemMasukModal
//Delete Modal
$('#itemmasukDeleteModal').on('show.bs.modal', function (e) {
    var itemmasukId = $(e.relatedTarget).data('itemmasuk-id');
    $(e.currentTarget).find('input[name="itemmasukId"]').val(itemmasukId);
    $(deleteForm).get(0).setAttribute('action', '/itemmasuk/' + $(deleteForm.itemmasukId).val());
});