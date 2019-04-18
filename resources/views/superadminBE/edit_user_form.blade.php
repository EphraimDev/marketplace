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


                    	@foreach($errors->all() as $error)

						<p style="color:red">{{$error}}</p>

						@endforeach



							Edit {{$user->first_name}} {{$user->last_name}} details


						</h5>
						@foreach($errors->all() as $error)

						<p style="color:red">{{$error}}</p>

						@endforeach
                    <form class="" role="form" method="post" action="{{route('update_user',['id'=>$user->id])}}">

                    	{{csrf_field()}}

                    	{{method_field('PUT')}}

                    
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>First name</label>
                            <input class="form-control" required="" type="text" name="first_name" value="{{$user->first_name}}">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Last name</label>
                            <input class="form-control" required="" type="text" name="last_name" value="{{$user->last_name}}">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Email</label>
                            <input class="form-control" required="" type="text" name="email" value="{{$user->email}}">
                          </div>
                        </div>


                      {{--   <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Password (the previous password would not be displayed)</label>
                            <input class="form-control" required="" type="text" name="password" {{$user->password}}>
                          </div>
                        </div>
                        --}}


                        


                        <div class="col-md-12">
                        	<input type="submit" name="" value="Update" class="btn btn-primary">

                        </div>


                       



                       
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>

@endsection