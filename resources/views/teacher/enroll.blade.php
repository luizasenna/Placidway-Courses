@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enroll Student') }}</div>

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
                    <select id="courses" multiple="multiple" class="m-3">
                      @foreach($courses as $c)

                      <option value="{{ $c->id }}" data-section="{{ $c->idsubject }}" selected="selected" data-index="3">{{ $c->name }}</option>


                      @endforeach

                    </select>


<hr/>





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
