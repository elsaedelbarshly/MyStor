@extends('layouts.adminDashBoard')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Coupans Table</h5>
          </div><!-- sl-page-title -->
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">COUPAN LIST
                <a href="#" class="btn btn-sm btn-warning" style="float:right" data-toggle="modal" data-target="#modaldemo3" >Add New</a>
            </h6>
           
  
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">ID</th>
                    <th class="wd-15p">Coupan Code</th>
                    <th class="wd-15p">Coupan Perecntage</th>
                    <th class="wd-20p">Active</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($coupan as $item)
                      
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->coupan }}</td>
                    <td>{{ $item->discount .'%' }}</td>
                    <td>
                        <a href="{{ route('edit.admin.coupan',$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ route('delete.admin.coupan',$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                    </td>
                  </tr>

                  @endforeach

                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div><!-- sl-pagebody -->


                <!-- LARGE MODAL -->
                <div id="modaldemo3" class="modal fade">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                      <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupan Add</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form method="POST" action="{{ route('store.admin.coupan') }}">
                        @csrf

                      <div class="modal-body pd-20">        
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Coupan Code</label>

                            <input 
                            type="text" 
                            class="form-control"
                             id="exampleInputEmail1" 
                             aria-describedby="emailHelp"
                              placeholder="Coupan Code" 
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
                              placeholder="Coupan Discount" 
                              name="discount"
                            >                      
                          </div> 


                      </div><!-- modal-body -->

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Save</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                      </div>

                    </form>

                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- modal -->

        <footer class="sl-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
            <div>Made by ThemePixels.</div>
          </div>
          <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Share:</span>
            <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
            <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
          </div>
        </footer>
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->

@endsection