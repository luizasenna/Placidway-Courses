@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-right">Back to <a href="/home">List of Students</a></div>
          <hr/>
            <div class="card">
                <div class="card-header">
                    <div class="text-left"> Enroll Student  </div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row col-md-12 ">
                      <span class="col-md-6"> <b>Student Name: </b>  {{ $student->name }}</span>
                      <span class="col-md-6"><b>You are: </b>  {{ $id->name }}</span>
                    </div>
                    <hr />
                    <div class=" col-md-12 m-3">

                      @if (!$enrolled->isEmpty())
                        This Student is enrolled at this moment in:
                        @foreach ($enrolled as $e)
                            {{ $e->course->name }} |
                        @endforeach
                        @else This Student is not enrolled yet.
                      @endif
                    </div>


                    <form action="{{ route('goEnroll') }}" method="get">
                          <select id="courses" multiple="multiple" class="m-3" name="idcourse[]">
                            @foreach($courses as $c)
                                <option value="{{ $c->id }}" data-section="{{ $c->subname }}" {{ $c->done != 0 ? "selected=selected" : '' }} data-index="3" >{{ $c->name }}{{ $c->done }}</option>
                            @endforeach
                          </select>
                          <div class="col-md-12 text-center m-3">
                            <input class="btn btn-info btn-lg" type="submit" value="Enroll / Update"/>
                            <input  type="hidden" value="{{ $student->id }}" name="iduser"/>
                            <input type="hidden" value="{{ $id->id }}" name="idteacher"/>

                        </div>

                    <form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var tree1 = $("#courses").treeMultiselect({ enableSelectAll: true, sortable: true });
    var tree2 = $("#test-select").treeMultiselect({ enableSelectAll: true, sortable: true });

    </script>

@endsection
