@extends('layouts.app')



@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">



                    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="send_all" data-bs-target="#exampleModal">
        إرسال رسالة للموظفين
    </button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input name="select_all" id="example-select-all" type="checkbox"
                                    onclick="CheckAll('box1', this)" /></th>
                            <th scope="col">#</th>

                            <th scope="col">name</th>
                            <th scope="col">email</th>



                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>

                                <td><input type="checkbox" value="{{ $user->id }}" class="box1"></td>
                                <th scope="row"> {{ $user->id }} </th>

                                <td> <a href="{{ url('user', $user->id) }}"> {{ $user->name }} </a> </td>
                                <td> {{ $user->email }} </td>


                            </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('AddUserMessage') }}">

                        @csrf

                        <input type="hidden" id="users_id" name="users_id">
                        <select class="form-select form-control" name="messages_id" aria-label="Default select example">
                            <option selected> نوع الرسالة</option>

                            @foreach ($messages as $message)
                                <option value="{{ $message->id }}">{{ $message->title }}</option>
                            @endforeach

                        </select>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="اارسالة رسالة">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>

<script type="text/javascript">
    $(function() {
        $("#send_all").click(function() {

            console.log(123)
            var selected = new Array();
            $(".table input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });


            if (selected.length > 0) {
                //$('#delete_all').modal('show')
                $('input[id="users_id"]').val(selected);
            }
        });
    });
</script>
