@extends('layouts.index')

@php
$benefits = 0;
@endphp

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>گزارشات آربیتراژ</h1>
            </div>
            <div class="col-sm-6">
              <!--
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
              -->
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
                    <a class="btn btn-success" href="{{ route('report_create') }}">گزارش جدید</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ردیف</th>
                    <th>کد</th>
                    <th>شارژ اولیه متاتریدر</th>
                    <th>شارژ متاتریدر</th>
                    <th>سود/زیان</th>
                    <th>قیمت دلار</th>
                    <th>آغاز هفته</th>
                    <th>سود و زیان اربیتراژ</th>
                    <!--<th>#</th>-->
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($reports as $index => $item)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ number_format($item->start_charge, 2) }}</td>
                        <td>{{ number_format($item->remain_charge, 2) }}</td>
                        <td>{{ number_format($item->cost_and_benefit_rial) }}</td>
                        <td>{{ number_format($item->dollar_to_rial) }}</td>
                        <td>{{ jdate($item->start_of_week)->format('Y/m/d') }}</td>
                        @if($item->dollar_to_rial > 0)
                        <td style="direction: ltr !important;">
                            @php
                                $benefit = ($item->cost_and_benefit_rial/$item->dollar_to_rial) - ($item->start_charge - $item->remain_charge);
                                $benefits += $benefit;
                                $benefit = number_format($benefit, 2);
                            @endphp
                            @if($benefit>0)
                            <span class="alert alert-success">
                            @else
                                @if($benefit<0)
                            <span class="alert alert-danger">
                                @else
                            <span class="alert alert-info">
                                @endif
                            @endif
                            {{ $benefit  }}
                            </span>
                        </td>
                        @else
                        <td>-</td>
                        @endif
                        <!--
                        <td>
                            <a class="btn btn-primary" href="">
                                ویرایش
                            </a>
                            <a class="btn btn-danger" href="">
                                حذف
                            </a>
                        </td>
                        -->
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <td colspan="7" style="text-align: left;">
                        برآیند شارژ
                    </td>
                    <td style="direction: ltr !important;">
                        @if($benefits>0)
                        <span class="alert alert-success">
                        @else
                            @if($benefits<0)
                        <span class="alert alert-danger">
                            @else
                        <span class="alert alert-info">
                            @endif
                        @endif
                        {{ number_format($benefits, 2)  }}
                        </span>
                    </td>
                  </tfoot>
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
    $(function () {
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
            "emptyTable":     "داده ای برای نمایش وجود ندارد",
            "info":           "نمایش _START_ تا _END_ از _TOTAL_ داده",
            "infoEmpty":      "نمایش 0 تا 0 از 0 داده",
        }
      });

      $(".btn-danger").click(function(e){
          if(!confirm('آیا مطمئنید؟')){
            e.preventDefault();
          }
      });
    });
  </script>
@endsection
