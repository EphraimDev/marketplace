@extends('superadminBE_layout.template')

@section('content')


<div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                    
                    </div>
                  </div>
                  <div class="panel-body">
                    <h5>
							Add new user


						</h5>
						@foreach($errors->all() as $error)

						<p style="color:red">{{$error}}</p>

						@endforeach
                    <form class="" role="form" method="post" action="{{route('store_users')}}">

                    	{{csrf_field()}}
                    
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>First name</label>
                            <input class="form-control" required="" type="text" name="first_name">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Last name</label>
                            <input class="form-control" required="" type="text" name="last_name">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Email</label>
                            <input class="form-control" required="" type="text" name="email">
                          </div>
                        </div>


                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Password</label>
                            <input class="form-control" required="" type="text" name="password">
                          </div>
                        </div>


                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Confirm password</label>
                            <input class="form-control" required="" type="text" name="confirm_password">
                          </div>
                        </div>


                        <div class="col-md-12">
                        	<input type="submit" name="" value="Add User" class="btn btn-primary">

                        </div>


                       



                       
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

@endsection