@extends('layouts.adminDashBoard')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Brand Update</h5>
          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">BRAND Update
            </h6>
           
  
            <div class="table-wrapper">
                <form method="POST" action="{{ route('update.brand',$brand->id) }}">
                    @csrf

                  <div class="modal-body pd-20"> 

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Brand Name</label>

                        <input 
                        type="text" 
                        class="form-control"
                         id="exampleInputEmail1" 
                         aria-describedby="emailHelp"
                          value="{{ $brand->brand_name }}" 
                          name="brand_name"
                        >
                        </div>
                        
                        <div class="form-group">
                          <div class="text-center">
                              <img
                              src="{{asset('images/'.$brand->brand_logo)}}"
                                  class="rounded-circle height-150" >
                          </div>
                      </div>

                      <div class="form-group">
                        <label> Brand Logo</label>
                        <label id="projectinput7" class="file center-block">
                            <input type="file" id="file" name="brand_logo">
                            <span class="file-custom"></span>
                        </label>
                     </div>

                        {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">OLD Brand Logo</label>
                            <img style="width:80px; height:70px;" src="{{asset('images/'.$brand->brand_logo)}}">
                          </div>  --}}

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