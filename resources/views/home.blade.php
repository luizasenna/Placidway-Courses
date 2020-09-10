@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello there,  <b> {{ $id->name }}</b>
                    <div>
                      @if (!$enrolls->isEmpty())
                        This Student is enrolled at this moment in:
                        @foreach ($enrolls as $e)
                            {{ $e->course->name }} |
                        @endforeach
                        @else You are not enrolled yet.
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
