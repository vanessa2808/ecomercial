$('#btn_logout').click(function(e){
    event.preventDefault();
    document.getElementById('logout-form').submit();
    $.ajax({
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        timeout: 10,
        success: (data) => {
            window.location.href = "/";
        },
        error: () => {
        }
    });
});
