function changeStatus() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('#toggle-two').bootstrapToggle({
            on: 'Enabled',
            off: 'Disabled'
        });
    });
    $('.toggle-class').on('change', function () {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var order_id = $(this).data('id');
        $.ajax({
            type: 'patch',
            dataType: 'json',
            url: "api/changeStatus",
            data: {'status': status, 'order_id': order_id},
            success: function (data) {
                alert('success');
                $('#message').html('<p class="alert alert-danger>' + data.success + '</p>');
            }
        });
    });
}

