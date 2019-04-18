@extends('superadminBE_layout.template')

@section('content')


<div class="col-md-12">
                    <div id="portlet-linear" class="panel panel-default">
                      <div class="panel-heading ">
                        <div class="panel-title">
                        </div>
                        <div class="panel-controls">
                          <ul>
                            <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                            </li>
                            <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                            <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body">
                        <h3>
									<span class="semi-bold">{{$therapist->title}}  {{$therapist->user->first_name}}   {{$therapist->user->last_name}}   <span class="badge"><a href="{{route('therapist.edit',['id'=>$therapist->id])}}">edit</a></span></h3>
                        <p>
                        	<h5>Status: 
                        		@if($therapist->verified == true)
                        		<span class="badge"><a href="">verified</a></span>
                        		@else
                        		<span class="badge"><a href="">unverified</a></span>
                        		@endif
                        	</h5>
                        	<h5>Email: {{$therapist->user->email}}</h5>
                        	<h5>Type of therapist : {{$therapist->type_of_therapist}}</h5>
                        	<h5>Type of licence : {{$therapist->type_of_license}}</h5>
                        	<h5>Post graduate institute : {{$therapist->postgraduate_institute}}</h5>
                        	<h5>Name of Practice : {{$therapist->name_of_practice}}</h5>
                        	<h5>Practice Website : {{$therapist->practice_website}}</h5>
                        	<h5>Office Phone : {{$therapist->office_phone}}</h5>
                        	<h5>Address 1 : {{$therapist->address_line_1}}</h5>
                        	<h5>Address 2 : {{$therapist->address_line_2}}</h5>
                        	<h5>City : {{$therapist->city}}</h5>
                        	<h5>State : {{$therapist->state}}</h5>
                        	<h5>Fee per hour : {{$therapist->fee_per_hour}}</h5>
                        	<h5>Rating : {{$therapist->rating}}</h5>
                        	<h5>Address 1 : {{$therapist->availability}}</h5>

                        	
                        </p>
                      </div>
                    </div>
                  </div>

@endsection

