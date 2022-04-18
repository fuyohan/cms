@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
            <!-- item_name -->
            <div class="product_box">
                <h1>ご購入、ありがとうございました</h1>
                <h2>ご登録のメールアドレスに確認メールを送付しておりますので、ご確認ください</h>
            </div>
    </div>
</div>
@endsection