<!DOCTYPE html>
<html lang="en">
@include('navbar')
<body style="background-color: grey">
    Hello {{ $data->name }}
    {{Session::get('loginId')}}
    
    {{-- <a href="logout">Logout</a>
    @php
    // echo request()->input('page');
    @endphp --}}
</body>
@include('modal.scan')
@include('modal.conf_pts')
</html>
<script>
    $(document).ready(function(){
        $('#scanModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var action = button.data('action');
        var modal = $(this);
        var $form = $('#insertForm');
        var $submitButton = $('#submitButton');
        
        modal.find('.modal-title').text(action === 'add' ? 'Add' : 'Deduct');

        $submitButton.off('click').click(function(e) {
            e.preventDefault();

            if (action === 'deduct') {
                var ptsInput = $form.find('input[name="pts"]');
                var currentValue = parseFloat(ptsInput.val());
                ptsInput.val(-1 * currentValue);
            }

            $.ajax({
                type: 'POST',
                url: '/insert', // Replace with your server endpoint
                data: $form.serialize(),
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                },
                error: function(response) {
                    // Handle the error response
                    console.error(response);
                }
            });
        });
    });
        $('#scanModal, #confModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
</script>
