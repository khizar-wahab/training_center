@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                <form action="{{ route('company.job.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label title="Job title">مسمى وظيفي</label>
                        <input type="text" class="form-control" name="title" required>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label>هاتف</label>
                        <select class="form-control" name="type" id="jobtype">
                            <option value="وقت كامل">وقت كامل</option>
                            <option value="دوام جزئى">دوام جزئى</option>
                            <option value="عقد">عقد</option>
                            <option value="التدريب الداخلي">التدريب الداخلي</option>
                        </select>
                        @error('type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label title="Description">وصف</label>
                        <textarea class="form-control" name="description"></textarea>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                        <label>اخر موعد</label>
                        <input type="date" class="form-control" name="last_date">
                        @error('last_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-success" title="Submit">إرسال</button>
                </form>
              
            </div>
        </div>
    </div>
</div>
@endsection