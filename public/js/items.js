(function() {
    var demo2 = $('.demo2').bootstrapDualListbox({
    nonSelectedListLabel: false,
    selectedListLabel: false,
    preserveSelectionOnMove: false,
    moveOnSelect: false,
    showFilterInputs: false,
    infoText: false,
});

$('.demo2').on('change', saveItemState);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function saveItemState() {

    var options = $('#bootstrap-duallistbox-selected-list_duallistbox_demo2 option');
    var selected = $.map(options ,function(option) {
        return option.value;
    });

    var options = $('#bootstrap-duallistbox-nonselected-list_duallistbox_demo2 option');
    var notSelected = $.map(options ,function(option) {
        return option.value;
    });

    $.ajax({
        url: 'item/item',
        type: 'PUT',
        data: {'selected': selected, 'not_selected': notSelected},
        success: function (data) {
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
}

$('#add_item').on('click', function () {
    var value = $("#item").val().trim();
    $("#item").val('');
    if (value.length === 0) {
        return;
    }

    if ($('#demo2 option[value="'+value+'"]').length > 0) {
        return;
    }

    $.ajax({
        url: 'item',
        type: 'POST',
        data: {'name': value},
        success: function (data) {
            if(data) {
                demo2.append('<option value="'+ data +'">'+ data +'</option>');
                demo2.bootstrapDualListbox('refresh', true);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
});

})();