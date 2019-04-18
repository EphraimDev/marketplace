@extends('superadminBE_layout.template')

@section('content')



<div class="col-md-4 m-b-10">
                    <!-- START WIDGET D3 widget_graphTileFlat-->
                    <div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
                      <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                          <div class="col-xs-height col-top">
                            <div class="panel-heading top-left top-right">
                              <div class="panel-title text-black hint-text">
                                <span class="font-montserrat fs-11 all-caps">Number of Users <i class="fa fa-chevron-right"></i>
                                                    </span>
                              </div>
                              <div class="panel-controls">
                                <ul>
                                  <li>
                                    <a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row-xs-height ">
                          <div class="col-xs-height col-top relative">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="p-l-20">
                                  <h3 class="no-margin p-b-5 text-white">{{count($allUsers)}}</h3>
                                 
                                </div>
                              </div>
                              <div class="col-sm-6">
                              </div>
                            </div>
                            <div class="widget-8-chart line-chart" data-line-color="black" data-points="true" data-point-color="success" data-stroke-width="2">
                              <svg></svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END WIDGET -->
                  </div>



                  <div class="col-md-4 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
                      <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                          <div class="col-xs-height col-top">
                            <div class="panel-heading  top-left top-right">
                              <div class="panel-title text-black">
                                <span class="font-montserrat fs-11 all-caps">Number of therapists <i class="fa fa-chevron-right"></i>
                                                    </span>
                              </div>
                              <div class="panel-controls">
                                <ul>
                                  <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row-xs-height">
                          <div class="col-xs-height col-top">
                            <div class="p-l-20 p-t-15">
                              <h3 class="no-margin p-b-5 text-white">{{count($allTherapists)}}</h3>
                              <a href="#" class="btn-circle-arrow text-white"><i class="pg-arrow_minimize"></i>
            </a>
                              
                            </div>
                          </div>
                        </div>
                        <div class="row-xs-height">
                          <div class="col-xs-height col-bottom">
                            <div class="progress progress-small m-b-20">
                              <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                              <div class="progress-bar progress-bar-white" style="width:45%"></div>
                              <!-- END BOOTSTRAP PROGRESS -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- END WIDGET -->
                  </div>




                  <div class="col-md-4">
                    <!-- START WIDGET widget_statTile-->
                    <div class="widget-10 panel no-border bg-white no-margin widget-loader-bar">
                      <div class="panel-heading top-left top-right ">
                        <div class="panel-title text-black hint-text">
                          <span class="font-montserrat fs-11 all-caps">Number of appointments<i class="fa fa-chevron-right"></i>
                                        </span>
                        </div>
                        <div class="panel-controls">
                          <ul>
                            <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="panel-body p-t-40">
                        <div class="row">
                          <div class="col-sm-12">
                            <h3 class="no-margin p-b-5 text-danger semi-bold">{{count($allAppointment)}}</h3>
                           
                           
                          </div>
                        </div>
                        <div class="p-t-10 full-width">
                          <a href="#" class="btn-circle-arrow b-grey"><i class="pg-arrow_minimize text-danger"></i></a>
                          <span class="hint-text small">Show more</span>
                        </div>
                      </div>
                    </div>
                    <!-- END WIDGET -->
                  </div>



                  <div class="col-md-6">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">These are the users that just registered
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Name</th><th style="width: 118px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Email</th><th style="width: 158px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Date Added</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          @forelse($recentlyAddedUsers as $user)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$user['first_name']}}   {{$user['last_name']}}</td>
                            <td class="v-align-middle">{{$user['email']}}</td>
                            <td class="v-align-middle semi-bold">
                              {{$user['created_at']}}
                            </td>
                          </tr>
                          @empty
                          No user was added recently
                          @endforelse
                        </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>



                <div class="col-md-6">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">Recently concluded appointments
                    </div>
                    <div class="tools">
                      <a class="collapse" href="javascript:;"></a>
                      <a class="config" data-toggle="modal" href="#grid-config"></a>
                      <a class="reload" href="javascript:;"></a>
                      <a class="remove" href="javascript:;"></a>
                    </div>
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer"><table class="table table-hover table-condensed dataTable no-footer" id="condensedTable" role="grid">
                        <thead>
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">user</th><th style="width: 118px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">therapist</th><th style="width: 158px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">status</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          @forelse($recentlyConcludedAppointments as $appointment)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{App\User::where('id',$appointment->user_id)->first()->first_name}}  {{App\User::where('id',$appointment->user_id)->first()->first_name}}</td>
                            <td class="v-align-middle">
                              
                              {{App\User::where('id',$appointment->therapist_id)->first()->first_name}}  {{App\User::where('id',$appointment->therapist_id)->first()->last_name}}
                            </td>
                            <td class="v-align-middle semi-bold">
                              {{$appointment->status}}
                            </td>
                          </tr>
                          @empty
                          no appointment currently
                          @endforelse


                        </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>


@endsection