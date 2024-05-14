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
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Badge</th>
                <!-- Add other fields as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->badge }}</td>
                    <!-- Display other fields -->
                </tr>
            @endforeach
        </tbody>
    </table>
@include('modal.scan')
@include('modal.conf_pts')
</body>
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
                    var arr = JSON.parse(response);
                    var name = arr['name'];
                    swal({
                        title: "Good job!",
                        text: name + " Successfully added!",
                        icon: "success",
                        buttons: false,
                        });
                        setTimeout(function() {
                        window.location.reload();
                        }, 3000);
                },
                error: function(response) {
                    // Handle the error response
                    // console.error(response);
                    swal({
                        title: "Error!",
                        text: "Please fillup form",
                        icon: "error",
                        // buttons: false,
                        });
                        // setTimeout(function() {
                        // window.location.reload();
                        // }, 3000);
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
