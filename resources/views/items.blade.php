@extends('app')
@section('title', 'Items Management')
@section('content')
    <div class="row">
        <div class="col-md-1">
        </div>

        <div class="col-md-10">
            <div class="row">
            <div class="col-md-12">
                <h2>Items Management Page</h2>  
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="item" id="item" placeholder="Enter Item Name and Click Add" style="width: 108%;">
                    </div>
                    <div class="col-md-1">
                        <button id="add_item">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
          <div class="col-md-7">
            <select multiple="multiple" size="10" name="duallistbox_demo2" class="demo2" id="demo2">
                @foreach ($items as $item)
                    <option value="{{ $item->name }}" {{ ($item->is_selected ? 'selected' : '') }}> {{ $item->name }} </option>
                @endforeach
            </select>
          </div>
        </div>
        </div>

        <div class="col-md-1">
        </div>
        
    </div>

@endsection