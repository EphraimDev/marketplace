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
             Edit {{$therapist->user->first_name}}  {{$therapist->user->last_name}}  details


            </h5>
            @foreach($errors->all() as $error)

            <p style="color:red">{{$error}}</p>

            @endforeach
                    <form class="" role="form" method="post" action="{{route('therapist.update',['id'=>$therapist->id])}}">

                      {{csrf_field()}}

                      {{method_field('PUT')}}
                    
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Title</label>
                            <input  class="form-control" required="" type="text" name="first_name" value="{{$therapist->title}}">
                          </div>
                        </div>



                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>First name</label>
                            <input value="{{$therapist->user->first_name}}" class="form-control" required="" type="text" name="first_name" >
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Last name</label>
                            <input value="{{$therapist->user->last_name}}" class="form-control" required="" type="text" name="last_name">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Email</label>
                            <input value="{{$therapist->user->email}}" class="form-control" required="" type="text" name="email">
                          </div>
                        </div>


                       


                    


                       <h4>Therapist Information</h4>

                        <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Type of licence</label>
                            <input value="{{$therapist->type_of_license}}" class="form-control" required="" type="text" name="type_of_license">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>Name of practise</label>
                            <input value="{{$therapist->name_of_practice}}" class="form-control" required="" type="text" name="name_of_practice">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>years of experience</label>
                            <input value="{{$therapist->years_of_experience}}" class="form-control" required="" type="text" name="years_of_experience">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>year licensed</label>
                            <input value="{{$therapist->year_licensed}}" class="form-control" required="" type="text" name="year_licensed">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>practice website</label>
                            <input value="{{$therapist->practice_website}}" class="form-control" required="" type="text" name="practice_website">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>office phone</label>
                            <input value="{{$therapist->office_phone}}" class="form-control" required="" type="text" name="office_phone">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Address 1</label>
                            <input value="{{$therapist->address_line_1}}" class="form-control" required="" type="text" name="address_line_1">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>Address 2</label>
                            <input value="{{$therapist->address_line_2}}" class="form-control" required="" type="text" name="address_line_2">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>city</label>
                            <input value="{{$therapist->city}}" class="form-control" required="" type="text" name="city">
                          </div>
                        </div>

                           <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>state</label>
                            <input value="{{$therapist->state}}" class="form-control" required="" type="text" name="state">
                          </div>
                        </div>


                           <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>country</label>
                            <input value="{{$therapist->country}}" class="form-control" required="" type="text" name="country">
                          </div>
                        </div>

                         <div class="col-sm-12">
                          <div class="form-group form-group-default required">
                            <label>personal statement</label>
                            <input value="{{$therapist->personal_statement}}" class="form-control" required="" type="text" name="personal_statement">
                          </div>
                        </div>

                         <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>fee per hour</label>
                            <input value="{{$therapist->fee_per_hour}}" class="form-control" required="" type="text" name="fee_per_hour">
                          </div>
                        </div>

                         <div class="col-sm-6">
                          <div class="form-group form-group-default required">
                            <label>personal pronoun</label>
                            <input value="{{$therapist->personal_pronouns}}" class="form-control" required="" type="text" name="personal_pronouns">
                          </div>
                        </div>




                            <div class="col-md-12">
                          <input  type="submit" name="" value="Update" class="btn btn-primary">

                        </div>

                       
                    </form>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>



@endsection

