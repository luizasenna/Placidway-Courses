@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi, Teacher <b>{{ $id->name }}!</b>

                    <hr/>

                    Below the registered Student(s) at the system:

                    <div class="row col-md-6 m-3">

                          <table class="table table-stiped">
                            <tr>
                              <td>Name</td>
                              <td>Action</td>
                            </tr>

                            @foreach($students as $s)
                                <tr>
                                  <td>{{ $s->name }}</td>
                                  <td><a class="btn btn-info" href="{{ route('enroll', $s->id) }}" role="button">Show</a></td>
                                </tr>

                            @endforeach
                            </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="js/tree-multiselect/dist/jquery.tree-multiselect.min.js"></script>

@endsection
