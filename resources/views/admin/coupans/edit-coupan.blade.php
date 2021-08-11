@extends('layouts.adminDashBoard')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Coupans Update</h5>
          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">COUPAN Update
            </h6>
           
  
            <div class="table-wrapper">
                <form method="POST" action="{{ route('update.admin.coupan',$coupan->id) }}">
                    @csrf

                  <div class="modal-body pd-20">        
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Coupan Code</label>

                        <input 
                        type="text" 
                        class="form-control"
                         id="exampleInputEmail1" 
                         aria-describedby="emailHelp"
                          value="{{ $coupan->coupan }}" 
                          name="coupan"
                        >
                      </div> 

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Coupan Discount (%)</label>

                        <input 
                        type="text" 
                        class="form-control"
                         id="exampleInputEmail1" 
                         aria-describedby="emailHelp"
                          placeholder="{{ $coupan->discount }}" 
                          name="discount"
                        >                      
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