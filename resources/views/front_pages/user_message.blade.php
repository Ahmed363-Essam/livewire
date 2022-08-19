@extends('layouts.app')



@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">


                <h2 class="h1"> {{ $userMessages->name }} </h2>

                    <!-- Button trigger modal -->

                <table class="table table-striped">
                    <thead>
                        <tr>
       
                            <th scope="col">#</th>

                            <th scope="col">title</th>
                            <th scope="col">content</th>



                        </tr>
                    </thead>
                    <tbody>

                        <?php $i=0; ?>
                        @foreach ($userMessages->messages as $userMessage)
                        <?php $i++; ?>
                        <tr>

        
                            <th scope="row"> {{ $i }} </th>

                            <td> <a href=""> {{ $userMessage->title }}</a> </td>
                            <td> {{ $userMessage->message }} </td>


                        </tr>
                        @endforeach

     






                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection

