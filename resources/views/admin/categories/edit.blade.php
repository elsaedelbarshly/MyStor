@extends('layouts.adminDashBoard')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Categroy Update</h5>
          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">CATEGORY Update
            </h6>
           
  
            <div class="table-wrapper">
                <form method="POST" action="{{ route('update.category',$category->id) }}">
                    @csrf

                  <div class="modal-body pd-20">        
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>

                        <input 
                        type="text" 
                        class="form-control"
                         id="exampleInputEmail1" 
                         aria-describedby="emailHelp"
                          value="{{ $category->category_name }}" 
                          name="category_name"
                        >
                        @error('category_name')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror

                      </div> 
                  </div><!-- modal-body -->

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Save</button>
                   
                  </div>

                </form>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div><!-- sl-pagebody -->



        
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->

@endsection