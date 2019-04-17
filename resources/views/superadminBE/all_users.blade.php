@extends('superadminBE_layout.template')


@section('content')

  <div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                  <div class="panel-heading">
                    <div class="panel-title">All users
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
                          <tr role="row"><th style="width:30%" class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">Name</th><th style="width: 118px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending">Email</th><th style="width: 158px;" class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">Action</th></tr>
                        </thead>
                        <tbody>
                          
                          
                          
                          
                          
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">Fifth tour</td>
                            <td class="v-align-middle">Simple but not simpler</td>
                            <td class="v-align-middle semi-bold">
                            	<button class="btn btn-primary">view</button>
                            	<button class="btn btn-danger">delete</button>
                            </td>
                          </tr>
                        </tbody>
                      </table></div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>




           



@endsection