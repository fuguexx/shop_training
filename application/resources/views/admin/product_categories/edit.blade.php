@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <div class="row pt-3">
            <div class="col-sm">
                <form action="{{ url('admin/product_categories/'.$ProductCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{ old('name',$ProductCategory->name) }}" placeholder="名称" autocomplete="name" autofocus="">
                        @error('name')<strong style="color:#FF0000;">{{ $message }}</strong>@enderror
                    </div>

                    <div class="form-group">
                        <label for="order-no">並び順番号</label>
                        <input type="number" class="form-control " id="order-no" name="order_no" value="{{ old('order_no',$ProductCategory->order_no) }}" placeholder="並び順番号">
                        @error('order_no')<strong style="color:#FF0000;">{{ $message }}</strong>@enderror
                    </div>

                    <hr class="mb-3">

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('/admin/product_categories/'.$ProductCategory->id) }}" class="btn btn-secondary">キャンセル</a>
                        </li>
                        <li class="list-inline-item">
                            <button type="submit" class="btn btn-primary">作成</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </main>
@endsection
