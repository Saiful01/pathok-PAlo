@extends("layouts.admin")
@section('title', 'Admin Panel')
@section("content")

    @push('header-scripts')
        @once
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        @endonce
    @endpush


    <h2 class="content-heading">New Post</h2>


    <div class="block block-rounded">


        <div class="block-content block-content-full">

            <div class="row">

                <form class="row"
                      action="{{ route('posts.store' ) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method("POST")

                    <div class="col-md-8">
                        <div class=" mb-2">
                            <label class="form-label" for="example-select-floating">Post Title</label>
                            <input type="text" class="form-control" id="post_title" name="post_title"
                                   placeholder="Title" required>
                        </div>
                        <div class=" mb-2">
                            <label class="form-label" for="example-select-floating">Link</label>
                            <input type="text" class="form-control" id="post_title" name="link"
                                   placeholder="News Link" required>
                        </div>

                    </div>

                    <div class="col-md-4">


                        <div class="mb-2">
                            <label class="" for="uploadedImage">Image</label>
                            <input type="file" class="form-control" id="uploadedImage" name="image">
                        </div>

                        <div class="mb-2">
                            <img src="/images/preview.jpg" id="imagePreview" class="w-100 img-thumbnail" style="max-height: 275px;"/>
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="form-control btn btn-primary" id="image" name="image">Publish
                            </button>
                        </div>


                    </div>


                </form>

            </div>
        </div>


    </div>





    @push('footer-scripts')
        @once
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                    crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

            <script>
                $('#summernote').summernote({
                    placeholder: 'Post Details',
                    height: 250,
                    /*tabsize: 2,
                    height: 120,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]*/
                });


                uploadedImage.onchange = evt => {
                    const [file] = uploadedImage.files
                    if (file) {
                        imagePreview.src = URL.createObjectURL(file)
                    }
                }


            </script>
        @endonce
    @endpush

@endsection
