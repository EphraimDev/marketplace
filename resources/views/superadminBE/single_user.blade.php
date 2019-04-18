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
									<span class="semi-bold">{{$user->first_name}}   {{$user->last_name}}   <span class="badge"><a href="{{route('edit_user',['id'=>$user->id])}}">edit</a></span></h3>
                        <p>
                        	Email: {{$user->email}}
                        </p>
                      </div>
                    </div>
                  </div>

@endsection