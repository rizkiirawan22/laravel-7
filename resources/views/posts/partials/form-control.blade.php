<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{old('title') ?? $post->title}}" id="title" class="form-control">
    @error('title')
        <div class="mt-2 text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="category">Category</label>
    <select type="text" name="category" id="category" class="form-select">
        <option disabled selected value="">Choose one!</option>
        @foreach($categories as $category)
            <option {{$category->id == $post->category_id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    @error('category')
        <div class="mt-2 text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="tags">Tag</label>
    <select type="text" name="tags[]" id="tags" multiple class="form-select select2">
        @foreach($post->tags as $tag)
            <option selected value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>
    @error('tags')
        <div class="mt-2 text-danger">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" id="body" class="form-control">{{old('body') ?? $post->body}}</textarea>
    @error('body')
    <div class="mt-2 text-danger">{{$message}}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary">{{$submit ?? 'Update'}}</button>