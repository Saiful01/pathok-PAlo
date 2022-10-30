<div class="container">
    <form action="/import/save" enctype="multipart/form-data" method="post">
        <div class="input-group row">

            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
            <div class="col-sm-1-12">
                @csrf
                <input
                    type="file"
                    class="form-control" name="file" id="inputName" placeholder="">
            </div>
        </div>

        <div class="input-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
