<x-layout doctitle="Create New Post">
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST">
            @csrf
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
                <input value="{{ old('title') }}" required name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
                @error('title')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea name="body" id="post-body" class="body-content tall-textarea form-control">{{ old('body') }}</textarea>
                @error('body')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn btn-primary">Save New Post</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#post-body'))
            .catch(error => {
                console.error(error);
            });
    </script>

</x-layout>
