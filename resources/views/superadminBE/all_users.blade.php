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
                          
                          
                          
                          
                          @forelse($users as $user)
                        <tr role="row" class="odd">
                            <td class="v-align-middle semi-bold sorting_1">{{$user['first_name']}}  {{$user['last_name']}}</td>
                            <td class="v-align-middle">{{$user['email']}}</td>
                            <td class="v-align-middle semi-bold">
                            	<button class="btn btn-primary">view</button>
                            	<form method="post" action="{{route('destroy_user',['id'=>$user['id']])}}">


                            	<button class="btn btn-danger delete_buttons" >delete</button>

                            	{{method_field('DELETE')}}
                            		{{csrf_field()}}
                            </form>
                            </td>
                          </tr>
                          @empty
                          No user currently registered!
                          @endforelse

                       
                        </tbody>
                      </table>
                      <div class="col-md-12">
                      	
                      	   {{$users->links()}}
                      </div>
                  </div>
                    </div>
                  </div>
                </div>
                <!-- END PANEL -->
              </div>



    <script src="{{asset('superadmin/assets/plugins/jquery/jquery-1.11.1.min.js')}}" type="text/javascript"></script>


    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.delete_buttons').each(function(){
    			$(this).click(function(){
    				if(confirm('do you really want to delete this user?'))
    				{
    					return true;
    				}
    				else{
    					return false;
    				}
    			})
    		})
    	})
    </script>
           



@endsection