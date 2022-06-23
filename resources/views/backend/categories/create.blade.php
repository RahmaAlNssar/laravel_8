<form action="{{route('admin.categories.store')}}" method="post" class="submit-form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">{{__('dashboard.name')}}:</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="recipient-name">
        <span class="error red" id="name-error" style="color:red;"></span>
    </div>

    <div class="form-group col-md-6">
        <div class="form-group">
            <label> {{__('dashboard.upload_image')}} :</label>
            <div id="file-preview">
                <input type="file" name="image" class="form-control input-image" accept="image/*" onchange="previewFile(this)">
                <div>
                    <img src="{{ $image ?? 'https://www.lifewire.com/thmb/2KYEaloqH6P4xz3c9Ot2GlPLuds=/1920x1080/smart/filters:no_upscale()/cloud-upload-a30f385a928e44e199a62210d578375a.jpg' }}" class="img-border img-thumbnail" id="show-file">
                </div>
            </div>
            <span class="error red" id="image-error" style="color:red;"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="parent_id" class="col-form-label">{{__('dashboard.category')}}:</label>
        <select name="parent_id" class="form-control" id="single-select-box" data-placeholder="{{__('dashboard.select')}}">
            <option></option>
            @foreach($categorises as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach

        </select>
     
        <span class="error red" id="parent_id-error" style="color:red;"></span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
        <button type="submit" class="btn btn-primary submit">{{__('dashboard.save')}}</button>
    </div>
</form>