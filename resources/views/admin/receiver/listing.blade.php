@extends('layouts.admin')

@section('content')
          <!-- start datatable here -->
          <main class='main-content bgc-grey-100'>
          <div id='mainContent'>

        @if(session('success'))
		      <div class="alert alert-success alert-dismissable custom-success-box">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        {{ session('success') }}
		      </div> 
		    @endif

        @if(session('failed'))
          <div class="alert alert-danger alert-dismissable custom-success-box">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('failed') }}
          </div> 
        @endif

            <div class="container-fluid">
              <!-- <h4 class="c-grey-900 mT-10 mB-30">Data Tables</h4> -->
              <div class="row">
                <div class="col-md-12">
                  <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Receiver Listing</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Receiver Name</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Receiver Name</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        @foreach($receivers as $receiver)
                          <tr>
                            <td>{{ $receiver->id }}</td>
                            <td>{{ $receiver->receiver_name }}</td>
                            <td>{{ $receiver->bank_name }}</td>
                            <td>{{ $receiver->account_number }}</td>
                            
                            <td><a href="{{ url('admin/receiver/edit') }}/{{ $receiver->id }}" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></a> |
                            	<a href="{{ url('admin/receiver/delete') }}/{{ $receiver->id }}" title="Remove" onclick="return confirm('you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

@endsection
