@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カード更新フォーム -->
  <form action="{{ url('/listings/$listing_id/card/edit')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      <label for="card" class="col-sm-3 control-label">タイトル</label> 
      <div class="col-sm-6"> 
        <input type="text" name="card_name" class="form-control" value="{{ old('card_name',$card->title) }}">
      </div>
    </div>
    <div class="form-group">
      <label for="card" class="col-sm-3 control-label">メモ</label> 
      <div class="col-sm-6"> 
        <textarea name="card_memo" class="form-control" >{{ old('card_memo',$card->memo) }}</textarea>
        <input type="hidden" name="card_id" class="form-control" value="{{ old('card_id',$card->id) }}">
      </div>
    </div>
    <div class="form-group">
      <label for="card" class="col-sm-3 control-label">リスト名</label>
      <div class="col-sm-6">
        <select name="list_id" class="form-control select select-default"> 
          @foreach ($listings as $list)
            <option value="{{old('listting_id',$list->id)}}"@if("{{$list->id}}" == "{{$card->listing_id}}")selected @endif>{{ $list->title }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6 text-center"> 
        <button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i>&nbsp;&nbsp;更新する</button>
      </div>
    </div>
  </form>
</div> 
@endsection