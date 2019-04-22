@extends('superadminBE_layout.template')

@section('content')


 <div class="col-md-12">
  <!-- START PANEL -->
  <div class="panel panel-transparent">
    <div class="panel-heading">
      <div class="panel-title">  Payments 
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
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Title: activate to sort column descending">
                SN
              </th>
              <th class="sorting" tabindex="0" aria-controls="condensedTable" rowspan="1" colspan="1" aria-label="Condensed: activate to sort column ascending">
                Reference code
              </th>
              <th>Status</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $key => $result)
              @if($result['status'] == "success")
              <tr role="row" class="odd">
                <td >
                  {{$key + 1}}
                </td>
                <td >
                  {{$result['reference']}}
                </td>
                <td >
                  {{$result['status']}}
                </td>
                <td >
                    {{number_format(json_decode($result['amount'],true)/100)}}
                </td>
              </tr>
              @endif
            @endforeach
          </tbody>
        </table></div>
      </div>
    </div>
  </div>
  <!-- END PANEL -->
</div>
@endsection