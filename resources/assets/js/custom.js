$('#itemDeleteModal').on('show.bs.modal', function (e) {

    var itemId = $(e.relatedTarget).data('item-id');
    $(e.currentTarget).find('input[name="itemId"]').val(itemId);
    $(deleteForm).get(0).setAttribute('action', '/item/' + $(deleteForm.itemId).val());
    //populate the textbox
});

$('#itemEditModal').on('show.bs.modal', function (e) {

    var itemId = $(e.relatedTarget).data('item-id');
    var itemName = $(e.relatedTarget).data('item-name');
    $(e.currentTarget).find('input[name="id"]').val(itemId);
    $(e.currentTarget).find('input[name="name"]').val(itemName);
    $(editForm).get(0).setAttribute('action', '/item/' + $(editForm.id).val());
    //populate the textbox
});