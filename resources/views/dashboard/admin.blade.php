@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">داشبورد</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <!--
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
              -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>

                      <h3 class="box-title">تعداد معاملات باز سیستمی</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(isset($metas['SystemOpens']) && $metas['SystemOpens']>0)
                        <div class="callout callout-danger">
                            <h4>{{ $metas['SystemOpens'] }}</h4>
                        </div>
                        @else
                        <div class="callout callout-success">
                            <h4>0</h4>
                        </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <i class="fa fa-bullhorn"></i>

                      <h3 class="box-title">تعداد معاملات باز متاتریدر</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(isset($metas['MetaTraderOpens']) && $metas['MetaTraderOpens']>0)
                        <div class="callout callout-danger">
                            <h4>{{ $metas['MetaTraderOpens'] }}</h4>
                        </div>
                        @else
                        <div class="callout callout-success">
                            <h4>0</h4>
                        </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                  </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection

@section('js')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<script>
    $(function () {
    })
  </script>
@endsection
