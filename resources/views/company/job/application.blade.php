@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                <div class="form-group">
                    <label title="Job title">مسمى وظيفي</label>
                    <span>{{ $job->title ?? '' }}>
                </div>

                <div class="form-group">
                    <label>هاتف</label>
                    {{ $job->type }}
                </div>
                

                <div class="form-group">
                    <label title="Description">وصف</label>
                    <span>{{ $job->description ?? '' }}</textarea>
                    
                </div>
                
                <div class="form-group">
                    <label>اخر موعد</label>
                    <span>{{ $job->last_date }}</span>
                </div>
            </div>
        </div>
    </div>

<!-- application form -->
    <div class="row">
        <div class="col-12">
            <div class="register-form text-right">
                <form action="{{ route('company.job.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label title="Name">اسم</label>
                        <input type="text" class="form-control" name="name" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label title="Gender">جنس</label>
                        <select class="form-control" name="gender" id="gender">
                            <option >-- جنس --</option>
                            <option value="الذكر">الذكر</option>
                            <option value="أنثى">أنثى</option>=
                        </select>
                        @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                        <label title="Education">تعليم</label>
                        <input type="text" class="form-control" name="education">
                        @error('education')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                                      
                    <div class="form-group">
                        <label title="Languages">اللغات</label>
                        <input type="text" class="form-control" name="languages">
                        @error('languages')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                        <label title="Interesting job">وظيفة مثيرة للاهتمام</label>
                        <input type="text" class="form-control" name="interesting">
                        @error('interesting')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-flex">
                        <label title="working">هل تعمل الان ? </label>
                        <input type="checkbox" class="custom-control" name="work_status">
                        @error('interesting')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-flex">
                        <label title="cv">تحميل السيرة الذاتية</label>
                        <input type="file" class="custom-control" name="cv">
                        @error('cv')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-success" title="Submit">إرسال</button>
                </form>
              
            </div>
        </div>
    </div>
    
<!-- END application form -->
</div>
@endsection