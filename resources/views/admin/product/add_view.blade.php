@extends('admin.base')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="text-center"> Add product !</h3>
	</div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="alert alert-danger">
	<h3>{{ $mess }}</h3>
</div>

<form action="{{ route('admin.handleAddProduct') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="nameProduct"> Name : </label>
				<input type="text" class="form-control" name="nameProduct" id="nameProduct">
			</div>
			<div class="form-group border-top">
				<p> Categories : </p>
				@foreach($cat as $key => $item)
					<label for="cat_{{ $item['id'] }}"> {{ $item['name'] }} </label>
					<input type="checkbox" name="cat[]" id="cat_{{ $item['id'] }}" value="{{ $item['id'] }}" multiple>
				@endforeach
			</div>
			<div class="form-group border-top">
				<p> Colors : </p>
				@foreach($colors as $key => $item)
					<label for="color_{{ $item['id'] }}"> {{ $item['name_color'] }} </label>
					<input type="checkbox" name="color[]" id="color_{{ $item['id'] }}" value="{{ $item['id'] }}" multiple>
				@endforeach
			</div>
			<div class="form-group border-top">
				<p> Sizes : </p>
				@foreach($sizes as $key => $item)
					<label for="size_{{ $item['id'] }}"> {{ $item['letter_size'] }} </label>
					<input type="checkbox" name="size[]" id="size_{{ $item['id'] }}" value="{{ $item['id'] }}" multiple>
				@endforeach
			</div>
			<div class="form-group border-top">
				<label for="brands"> Brands </label>	
				<select name="brands" class="form-control">
					@foreach($brands as $key => $item)
						<option value="{{ $item['id'] }}">
							{{ $item['brand_name'] }}
						</option>
					@endforeach
				</select>
			</div>
		</div>	
		<div class="col-md-6">
			<div class="form-group">
				<label for="price">Price</label>
				<input type="number" name="price" id="price" class="form-control">
			</div>
			<div class="form-group border-top">
				<label for="qty">QTY</label>
				<input type="number" name="qty" id="qty" class="form-control">
			</div>
			<div class="form-group border-top">
				<label for="images">Images</label>
				<input type="file" name="images[]" id="images" class="form-control" multiple="multiple">
			</div>
			<div class="form-group border-top mt-3">
				<label for="sale">Sale off</label>
				<input type="text" name="sale" id="sale" class="form-control">
			</div>
			<div class="form-group border-top mt-3">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" rows="5"></textarea>
			</div>
		</div>
		<div class="col-md-6 offset-md-3 mt-3 mb-3">
			<button type="submit" class="btn btn-primary btn-block"> ADD + </button>
		</div>
	</div>
</form>
@endsection