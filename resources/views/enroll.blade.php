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

                    <div class="row col-md-8">
                      Student Name:   {{ $student->name }}
                    </div>

                    <select id="courses" multiple="multiple">
                      

                      <option value="one" data-section="top" selected="selected" data-index="3">C++</option>

                      <option value="two" data-section="top" selected="selected" data-index="1">Python</option>

                      <option value="three" data-section="top" selected="selected" data-index="2">Ruby</option>

                      <option value="four" data-section="top">Swift</option>

                      <option value="wow" data-section="JavaScript/Library/Popular">jQuery</option>

                    </select>



                    <select id="demo" multiple="multiple">

                      <option value="one" data-section="top" selected="selected" data-index="3">C++</option>

                      <option value="two" data-section="top" selected="selected" data-index="1">Python</option>

                      <option value="three" data-section="top" selected="selected" data-index="2">Ruby</option>

                      <option value="four" data-section="top">Swift</option>

                      <option value="wow" data-section="JavaScript/Library/Popular">jQuery</option>

                    </select>





                </div>
            </div>
        </div>
    </div>
</div>
<script>$("#demo").treeMultiselect(options);

$("#demo").treeMultiselect({

      allowBatchSelection:true,

      sortable:false,

      collapsible:true,

      enableSelectAll:false,

      selectAllText:'Select All',

      unselectAllText:'Unselect All',

      freeze:false,

      hideSidePanel:false,

      maxSelections: 0,

      onlyBatchSelection:false,

      sectionDelimiter:'/',

      showSectionOnSelected:true,

      startCollapsed:false,

      searchable:false,

      searchParams: ['value','text','description','section'],

      onChange:null

    });
    </script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="js/tree-multiselect/dist/jquery.tree-multiselect.min.js"></script>
@endsection
