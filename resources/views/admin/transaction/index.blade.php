@extends('layouts.admin')

@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
#errmsg
{
color: red;
}
</style>
@endsection

@section('content')
		<!-- ### App Screen Content ### -->
		<main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <div class="full-container">
              <div class="email-app">
              <div class="email-side-nav remain-height ov-h">
                <div class="h-100 layers">
                  <div class="p-20 bgc-grey-100 layer w-100">
                    <a href="{{ route('admin.transaction.listing') }}" class="btn btn-danger btn-block">View Transaction Listing</a>
                  </div>
                  <div class="scrollable pos-r bdT layer w-100 fxg-1">
                    <ul class="p-20 nav flex-column">
                      <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link c-grey-800 cH-blue-500 actived">
                          <div class="peers ai-c jc-sb">
                            <div class="peer peer-greed">
                              <i class="mR-10 ti-email"></i>
                              <span>Go Back</span>
                            </div>
                            <div class="peer">
                              <span class="badge badge-pill bgc-deep-purple-50 c-deep-purple-700">+99</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Add Msg Here -->
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

              @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissable custom-success-box">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <!-- Close Msg Here -->
              <div class="email-wrapper row remain-height pos-r scrollable bgc-white">
                <div class="email-content open no-inbox-view">
                  <div class="email-compose">
                    <div class="d-n@md+ p-20">
                      <a class="email-side-toggle c-grey-900 cH-blue-500 td-n" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                      </a>
                    </div>
                    <form method="post" action="{{ route('admin.transaction.store') }}" enctype="multipart/form-data" class="email-compose-body">
                      @csrf
                      <h4 class="c-grey-900 mB-20">Add Transaction  &nbsp;<span id="errmsg"></span> </h4>
                      <div class="send-header">
					  
					  <!-- Sender Information -->
					  <div class="form-row">
						  <div class="form-group col-md-6">
							<label for="inputState">Select Sender</label>
							<select id="sender_id" name="sender_id" class="form-control">
								<option selected="selected">Choose...</option>
								<option value="1">Muhammad Hassan</option>
								<option value="2">Ali Nawaz</option>
								<option value="3">Qaisar Khan</option>
								<option value="4">Nawaz Khan</option>
							</select>
						  </div>
						  
						  <div class="form-group col-md-6">
							<label for="inputPassword4">Sender Mobile</label>
							<input type="text" readonly class='form-control' id="bank_name" name="bank_name" placeholder="Enter Bank Name">
						  </div>

						  
						  
						  
					  </div>
					  <hr>
					  <!-- Close Sender Information -->
					  
					  <div class="form-row">
						  <div class="form-group col-md-4">
							<label for="inputState">Receiver Name</label>
							<select name="receiver_id" class="form-control">
								<option selected="selected">Choose...</option>
								<option value="1">Receiver 1</option>
								<option value="1">Receiver 2</option>
								<option value="1">Receiver 4</option>
								<option value="1">Receiver 8</option>
							</select>
						  </div>
						  <div class="form-group col-md-4">
							<label for="inputPassword4">Bank Name</label>
							<input type="text" readonly class='form-control' id="bank_name" name="bank_name" placeholder="Enter Bank Name">
						  </div>
						  <div class="form-group col-md-4">
							<label for="inputPassword4">Account Number</label>
							<input type="text" readonly class='form-control' name="account_number" placeholder="Enter Account Number">
						  </div>						  						  
						  
					  </div>
					  <hr>
					  
					  <!-- Transaction information detail here -->
					  
					  <div class="form-row">
						  <div class="form-group col-md-6">
							<label for="inputEmail4">Transaction Date</label>
							<input type="date" required="required" class='form-control' name="transaction_date">
						  </div>
						  <div class="form-group col-md-6">
							<label for="inputState">Transaction Type</label>
							<select id="inputState" name="transaction_type" class="form-control">
								<option selected="selected">Choose Transaction Type...</option>
								<option value="online">Online</option>
								<option value="atm">Atm</option>
								<option value="cash">Cash</option>
							</select>
						  </div>						  
					  </div>
					  <div class="form-row">
						  <div class="form-group col-md-4">
							<label for="inputEmail4">Pak Rupee</label>
							<input type="text" required="required" class='form-control number' id="pak_rupees" name="pak_rupees" placeholder="18000.00">
						  </div>
						  <div class="form-group col-md-4">
							<label for="inputEmail4">Omani Riyal</label>
							<input type="text" required="required" class='form-control number' name="omani_riyal" placeholder="120.00">
						  </div>
						  <div class="form-group col-md-4">
							<label for="inputEmail4">Customer Statement</label>
							<input type="text" required="required" class='form-control' name="customer_statement" placeholder="Enter Customer Statement">
						  </div>
						  						  
					  </div>
					  
					  
                     

                      </div>

                      <div class="text-right mrg-top-30">
                        <button type="submit" class="btn btn-danger">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </main>

@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function () {
  
  $(".number").keypress(function (e) {
     
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
	
   }); 
   
}); 

 $('#sender_id').on('change',function(e)
 {
    
    var id = $(this).val();
	
	alert( id );

    //ajax
    $.get('/dashboard/ajax-subcat?cat_id=' + cat_id, function (data)
    {
        $('#item').empty();
        $('#price').empty();

        $.each(data, function(index, subcatObj)
        {
            var prices = subcatObj.price;

            $('#item').append('<option data-price='+prices+' value="'+subcatObj.id+'">'+subcatObj.name+' '+ prices +'</option>');
        });
        console.log(data);
    });
    $('#item').change(function() {
         selectedPrice = $(this).find("option:selected").data("price")
         $('#price').val(selectedPrice);
    })

 });
 

</script>
@endsection
