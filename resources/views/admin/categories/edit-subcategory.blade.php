@extends('layouts.adminDashBoard')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Sub Categroy Update</h5>
          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Sub CATEGORY Update
            </h6>
           
  
            <div class="table-wrapper">
                <form method="POST" action="{{ route('update.sub-category',$subcategory->id) }}">
                    @csrf

                  <div class="modal-body pd-20">        
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sub Category Name</label>

                        <input 
                        type="text" 
                        class="form-control"
                         id="exampleInputEmail1" 
                         aria-describedby="emailHelp"
                          value="{{ $subcategory->subcategory_name }}" 
                          name="subcategory_name"
                        >
                        @error('subcategory_name')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror

                        <div class="form-group">
                          <label for="exampleInputEmail1" class="form-label">Category Name</label>
                          <select class="form-control" name="category_id">

                          @foreach ($category as $item)
                          <option value="{{ $item->id }}"  @if ($item->id==$subcategory->category_id) {{ 'selected' }} @endif>
                            {{ $item->category_name }}
                          </option>
 
                          @endforeach
                        </select>
                        </div>

                      </div> 
                  </div><!-- modal-body -->

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Update</button>
                   
                  </div>

                </form>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div><!-- sl-pagebody -->



        
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->

@endsection