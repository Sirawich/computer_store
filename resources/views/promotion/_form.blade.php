@csrf
<div class="form-group">
    <label for="promotion-title">Title</label>
    <input type="text" value="{{ old('title',$promotion->title) }}" name="title" id="promotion-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('title')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="promotion-body">Detail</label>
    <textarea name="body" id="promotion-body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="5"> {{ old('body',$promotion->body) }} </textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('body')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>