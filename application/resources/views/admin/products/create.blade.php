@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-3">
        <div class="row pt-3">
            <div class="col-sm">
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="product_category_id">商品カテゴリ</label>
                        <select class="custom-select " id="product_category_id" name="product_category_id">
                            @foreach($productCategories as $productCategory)
                                <option value="{{ $productCategory->id }}" @if( old('product_category_id') == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}" placeholder="名称" autofocus="">
                        @error('name')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" class="form-control " id="price" name="price" value="{{ old('price') }}" placeholder="価格">
                        @error('price')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                    </div>

                    <div class="form-group">
                        <label for="description">説明</label>
                        <textarea class="form-control " id="description" name="description" placeholder="説明">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_path">イメージ</label>
                        <input type="file" class="form-control-file" id="image_path" name="image_path">
                        @error('image_path')<strong style="color:#FF0000; font-size:80%;">{{ $message }}</strong>@enderror
                    </div>

                    <hr class="mb-3">

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('/admin/products') }}" class="btn btn-secondary">キャンセル</a>
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
