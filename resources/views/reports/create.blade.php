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
              <h1>آربیتراژ</h1>
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
                        <div class="form-group">
                            <label for="start_charge">شارژ اولیه متاتریدر</label>
                            @if (isset($report))
                            <input type="number" class="form-control" id="start_charge" name="start_charge" placeholder="شارژ اولیه" value="{{ $report->start_charge }}" disabled />
                            @else
                            <input type="number" class="form-control" id="start_charge" name="start_charge" placeholder="شارژ اولیه" value="{{ old('start_charge') }}" disabled />
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="cost_and_benefit_rial">سود/زیان</label>
                            @if (isset($report))
                            <input type="number" class="form-control" id="cost_and_benefit_rial" name="cost_and_benefit_rial" placeholder="سود/زیان" value="{{ $report->cost_and_benefit_rial }}" />
                            @else
                            <input type="number" class="form-control" id="cost_and_benefit_rial" name="cost_and_benefit_rial" placeholder="سود/زیان" value="{{ old('cost_and_benefit_rial') }}" />
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="remain_charge">شارژ متاتریدر</label>
                            @if (isset($report))
                            <input type="number" class="form-control" id="remain_charge" name="remain_charge" placeholder="شارژ" value="{{ $report->remain_charge }}" />
                            @else
                            <input type="number" class="form-control" id="remain_charge" name="remain_charge" placeholder="شارژ" value="{{ old('remain_charge') }}" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="dollar_to_rial">دلار</label>
                            @if (isset($report))
                            <input type="number" class="form-control" id="dollar_to_rial" name="dollar_to_rial" placeholder="دلار" value="{{ $report->dollar_to_rial }}" />
                            @else
                            <input type="number" class="form-control" id="dollar_to_rial" name="dollar_to_rial" placeholder="دلار" value="{{ old('dollar_to_rial') }}" />
                            @endif
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
    $(document).ready(function(){
        $('select.select2').select2();
    });
</script>
@endsection
