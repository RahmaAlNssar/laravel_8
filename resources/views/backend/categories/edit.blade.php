<form action="{{route('admin.categories.update',$row->id)}}" method="post" class="submit-form" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">{{__('dashboard.name')}}:</label>
        <input type="text" class="form-control" name="name" value="{{$row->name}}" id="recipient-name">
        <span class="error red" id="name-error" style="color:red;"></span>
    </div>

   
    <div class="form-group col-md-4">
        @include('backend.includes.forms.input-file',['image'=>$row->image_url ])
    </div>

    <div class="form-group">
        <label for="parent_id" class="col-form-label">{{__('dashboard.category')}}:</label>
        <select name="parent_id" class="form-control" id="single-select-box" data-placeholder="{{__('dashboard.select')}}">
            <option></option>
            @foreach($categorises as $cat)
            <option value="{{$cat->id}}" {{$row->parent_id == $cat->id ? 'selected' : $row->parent->name}}>{{$cat->name}}</option>
            @endforeach

        </select>
     
        <span class="error red" id="parent_id-error" style="color:red;"></span>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
        <button type="submit" class="btn btn-primary submit">{{__('dashboard.save')}}</button>
    </div>
</form>