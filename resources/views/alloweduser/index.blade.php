@extends('layouts.index')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>فهرست کاربرانی که آربیتراژ میشوند</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <a class="btn btn-success" href="{{ route('allowusers_create') }}"> جدید</a>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ردیف</th>
                <th>کد</th>
                <!--<th>حساب تریدر</th>-->
                <th>مبلغ</th>
                <th>توضیحات</th>
                <th>حذف</th>
                <!--<th>#</th>-->
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->id }}</td>
                <!--<td>{{ $item->meta_trader_account }}</td>-->
                <td>{{ $item->name }}</td>
                <td>{{ $item->tell }}</td>
                <td>
                  <a class="btn btn-danger" href="{{ route('allowusers_delete', $item->id) }}" >
                    حذف
                  </a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('js')
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function() {
    //   $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language": {
        "paginate": {
          "previous": "قبل",
          "next": "بعد"
        },
        "emptyTable": "داده ای برای نمایش وجود ندارد",
        "info": "نمایش _START_ تا _END_ از _TOTAL_ داده",
        "infoEmpty": "نمایش 0 تا 0 از 0 داده",
      }
    });

    $(".btn-danger").click(function(e) {
      if (!confirm('آیا مطمئنید؟')) {
        e.preventDefault();
      }

    });
  });
</script>
@endsection