@csrf

<div class="form-group">
    <label for="status" class="">{{ __('User') }}</label>
    <div>
        <select class="custom-select" id="status-role" name="user_id">
            <option selected>Choose...</option>
            @foreach($users as $user)
                <option value="{{$user->id}}" @if($user->id==$tracking->user_id) {{"selected "}} @endif>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="product-title">Product</label>
    <input type="text" value="{{ old('tracking',$tracking->product) }}" name="product" id="product-title" class="form-control {{ $errors->has('tracking') ? 'is-invalid' : '' }}">
    @if ($errors->has('product'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('product')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="detail-body">Detail</label>
    <textarea name="detail" id="detail-body" class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" rows="5"> {{ old('tracking',$tracking->detail) }} </textarea>
    @if ($errors->has('detail'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('detail')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="note-body">Note</label>
    <textarea name="note" id="note-body" class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" rows="5"> {{ old('tracking',$tracking->note) }} </textarea>
    @if ($errors->has('note'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('note')}}</strong>
        </div>
    @endif
</div>
@if (request()->route()->getName()=="tracking.edit")
<div class="form-group">
    <label for="status" class="">{{ __('Status') }}</label>
    <div>
        <select class="custom-select" id="status_id" name="status_id">
            <option selected>Choose...</option>
            @foreach($status as $sts)
                <option value="{{$sts->id}}" @if($sts->id==$tracking->status_id) {{"selected "}} @endif>{{$sts->name}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
<div class="form-group">
    <label for="price-title">Price</label>
    <input type="number" value="{{ old('tracking',$tracking->price) }}" name="price" id="promotion-title" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}">
    @if ($errors->has('price'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('price')}}</strong>
        </div>
    @endif
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>