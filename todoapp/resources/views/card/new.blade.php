@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カード作成フォーム -->
  <form action="{{ url('/listings/$listing->id/card')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      <label for="card" class="col-sm-3 control-label">タイトル</label> 
      <div class="col-sm-6 "> 
        <input type="text" name="card_name" placeholder="カード名" class="form-control" value="{{ old('card_name') }}">
      </div>
    </div>
    <div class="form-group"> 
      <label for="card" class="col-sm-3 control-label">メモ</label> 
      <div class="col-sm-6 "> 
        <textarea name="card_memo" class="form-control" placeholder="メモ">{{ old('card_memo') }}</textarea>
        <input type="hidden" name="listing_id" value="{{ old('listing_id', $listing->id) }}">
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6  text-center"> 
        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;作成する</button>
      </div>
    </div>
  </form>
</div> 
@endsection