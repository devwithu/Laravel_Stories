

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $story->title ) }} "/>
    <x-form-error field="title"></x-form-error>
</div>

<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control @error('body') is-invalid @enderror">{{ old('body', $story->body ) }}</textarea>
    <x-form-error field="body"></x-form-error>
</div>

<div class="form-group">
    <label for="type">Type</label>
    <select name="type" class="form-control @error('type') is-invalid @enderror">
        <option value="">--Select--</option>
        <option value="short" {{ 'short' == old('type', $story->type) ? 'selected' : '' }} >Short</option>
        <option value="long" {{ 'long' == old('type', $story->type) ? 'selected' : '' }}>Long</option>
    </select>
    <x-form-error field="type"></x-form-error>
</div>

<div class="form-group">
    <legend><h6>Status</h6></legend>

    <div class="form-check @error('status') is-invalid @enderror">
        <input type="radio" class="form-check-input" name="status" value="1"  {{ '1' == old('status', $story->status) ? 'checked' : '' }}>
        <label for="active" class="form-check-label">Yes</label>
    </div>

    <div class="form-check">
        <input type="radio" class="form-check-input" name="status" value="0"  {{ '0' == old('status', $story->status) ? 'checked' : '' }}>
        <label for="active" class="form-check-label">No</label>
    </div>
    <x-form-error field="status"></x-form-error>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
    <x-form-error field="image"></x-form-error>
</div>
<td><img src="{{ $story->thumbnail }}" alt="Image"></td>

<div class="form-group">
    @foreach( $tags as $tag)
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}"
                {{ in_array( $tag->id, old('tags', $story->tags->pluck('id')->toArray()) ) ? 'checked' : "" }}
            >
            <lable class="form-check-label">{{ $tag->name }}</lable>
        </div>
    @endforeach
</div>
