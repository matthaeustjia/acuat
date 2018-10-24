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