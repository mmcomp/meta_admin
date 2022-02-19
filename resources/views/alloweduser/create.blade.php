@extends('layouts.index')

@section('css')
<link href="/plugins/select2/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>ثبت کاربر برای آربیتراژ </h1>
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
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" autocomplete="off">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
            @csrf
            <div class="row">
              <div class="col">
                <!--
                        <div class="form-group">
                            <label for="meta_trader_account">حساب تریدر</label>
                            @if (isset($charge))
                            <input type="text" class="form-control" id="meta_trader_account" name="meta_trader_account" placeholder="حساب تریدر" value="{{ $charge->meta_trader_account }}" />
                            @else
                            <input type="text" class="form-control" id="meta_trader_account" name="meta_trader_account" placeholder="حساب تریدر" value="{{ old('meta_trader_account') }}" />
                            @endif
                        </div>
                        -->

                <div class="form-group">
                  <label for="description">نام</label>
                  <small>دقیق وارد شود</small>
                  <input type="text" class="form-control" id="name" name="name" placeholder="نام" value="" required />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="last_name">تلفن</label>
                  <small>دقیق وارد شود</small>
                  <input type="text" class="form-control" id="tell" name="tell" placeholder="تلفن همراه" value="" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button class="btn btn-primary">
                  ذخیره
                </button>
              </div>
            </div>
          </form>
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
<!-- Select2 -->
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(document).ready(function() {
    $('select.select2').select2();
  });
</script>
@endsection