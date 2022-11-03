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
			
			
			@foreach($post as $detail)
			  <tr>
				
				<td>{{ $detail['name'] }} -- {{ $detail['user']['email'] }}</td> <br>
				
				-- {{ $detail['meta']['meta_description'] }} --  <br>
				-- {{ $detail['meta']['meta_keywords'] }} --  <br>
				
				<td>{{ $detail['description'] }}</td><br>
				
					
			

				<?php $status = (isset($detail['status']) && $detail['status'] == 1 ) ? "Active" : "Inactive" ; ?>
				<td>{{ $status }}</td>
				<td><a href="{{ url('admin/post/edit') }}/{{ $detail['id'] }}" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></a> |
					<a href="{{ url('admin/post/delete') }}/{{ $detail['id'] }}" title="Remove" onclick="return confirm('you want to delete?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</td>
			  </tr>
			  <br><br>
			@endforeach


          </div>
        </main>

@endsection
