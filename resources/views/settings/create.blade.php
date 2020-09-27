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
              <h1>تنظیمات برکت اتوماتیک</h1>
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
                            <label for="enabled">فعال</label>
                            <input type="checkbox" class="form-control" id="enabled" name="enabled" {{ $setting->enabled==1?'checked':'' }} />
                        </div>

                        <div class="form-group">
                            <label for="price">تلرانس</label>
                            <small>تلرانس اختلاف با قیمت بازار</small>
                            <input type="text" class="form-control" id="price" name="price" placeholder="تلرانس" value="{{ $setting->price }}" />
                        </div>

                        <div class="form-group">
                            <label for="type">خرید فروش هر دو</label>
                            <select class="form-control" id="type" name="type" >
                                <option {{ $setting->type=='both'?'selected':'' }} value="both">هردو</option>
                                <option {{ $setting->type=='buy'?'selected':'' }} value="sell">خرید</option>
                                <option {{ $setting->type=='sell'?'selected':'' }} value="buy">فروش</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="time">فاصله زمانی</label>
                            <small>فاصله زمانی نشستن لفظ تا برکت بر اساس ثانیه</small>
                            <input type="number" class="form-control" id="time" name="time" placeholder="ثانیه" value="{{ $setting->time }}" />
                        </div>

                        <div class="form-group">
                            <label for="number">تعداد حداکثر</label>
                            <input type="number" class="form-control" id="number" name="number" placeholder="حداکثر" value="{{ $setting->number }}" />
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
