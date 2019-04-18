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
							Add Therapist


						</h5>
						@foreach($errors->all() as $error)

						<p style="color:red">{{$error}}</p>

						@endforeach
                    <form class="" role="form" method="post" action="{{route('therapist.store')}}">

                    	{{csrf_field()}}
                    
                      <div class="row">
                      	<div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Title</label>
                            <input value="" class="form-control" required="" type="text" name="first_name">
                          </div>
                        </div>



                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>First name</label>
                            <input value="" class="form-control" required="" type="text" name="first_name">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Last name</label>
                            <input value="" class="form-control" required="" type="text" name="last_name">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Email</label>
                            <input value="" class="form-control" required="" type="text" name="email">
                          </div>
                        </div>


                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Password</label>
                            <input value="" class="form-control" required="" type="text" name="password">
                          </div>
                        </div>


                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Confirm password</label>
                            <input value="" class="form-control" required="" type="text" name="confirm_password">
                          </div>
                        </div>


                    


                       <h4>Therapist Information</h4>

                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Type of licence</label>
                            <input value="" class="form-control" required="" type="text" name="type_of_license">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Name of practise</label>
                            <input value="" class="form-control" required="" type="text" name="name_of_practice">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>years of experience</label>
                            <input value="" class="form-control" required="" type="text" name="years_of_experience">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>year licensed</label>
                            <input value="" class="form-control" required="" type="text" name="year_licensed">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>practice website</label>
                            <input value="" class="form-control" required="" type="text" name="practice_website">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>office phone</label>
                            <input value="" class="form-control" required="" type="text" name="office_phone">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Address 1</label>
                            <input value="" class="form-control" required="" type="text" name="address_line_1">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Address 2</label>
                            <input value="" class="form-control" required="" type="text" name="address_line_2">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>city</label>
                            <input value="" class="form-control" required="" type="text" name="city">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>state</label>
                            <input value="" class="form-control" required="" type="text" name="state">
                          </div>
                        </div>


                           <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>country</label>
                            <input value="" class="form-control" required="" type="text" name="country">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>personal statement</label>
                            <input value="" class="form-control" required="" type="text" name="personal_statement">
                          </div>
                        </div>

                         <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>fee per hour</label>
                            <input value="" class="form-control" required="" type="text" name="fee_per_hour">
                          </div>
                        </div>

                         <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>personal pronoun</label>
                            <input value="" class="form-control" required="" type="text" name="personal_pronouns">
                          </div>
                        </div>




                            <div class="col-md-12">
                        	<input  type="submit" name="" value="Add User" class="btn btn-primary">

                        </div>

                       
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>



@endsection

