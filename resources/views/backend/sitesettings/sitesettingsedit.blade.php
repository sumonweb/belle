@include('backend.layouts.sidebar')
@include('backend.layouts.header')


<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Edit Site Settings</div>
                        <hr>
                        <div class="flash-message" style="margin: 0 15px;">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}" style="padding: 8px 10px">{{ Session::get('alert-' .
                                $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div> <!-- end .flash-message -->
                        {!! Form::model($settings, ['method'=>'PUT',
                        'action'=>['App\Http\Controllers\SiteSettingsController@update', $settings->id], 'files'=>true])
                         !!}
                        <input type="hidden", value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="input-4">Site Name</label>
                                <input type="text" class="form-control form-control-rounded" id="input-4"
                                       placeholder="Enter Site Name" name="sitename" value="{{$settings->sitename}}">
                            </div>
                            <div class="form-group">
                                <img src="{{asset('assets/uploads/logo') .'/'. $settings->logo }}" alt="Logo"
                                     height="100px" width="100px">
                            </div>
                            <div class="form-group">
                                <label for="input-5">Logo</label>
                                <input type="file" class="form-control form-control-rounded" id="input-5"
                                       name="logo">
                            </div>
                            <div class="form-group">
                                <img src="{{asset('assets/uploads/logo') .'/'. $settings->favicon }}" alt="Logo"
                                     height="30px" width="30px">
                            </div>
                            <div class="form-group">
                                <label for="input-6">Favicon</label>
                                <input type="file" class="form-control form-control-rounded" id="input-6"
                                       name="favicon">
                            </div>
                            <div class="form-group">
                                <label for="input-7">Email</label>
                                <input type="text" class="form-control form-control-rounded" id="input-7"
                                       placeholder="Enter Your Email Address" name="email" value="{{$settings->email}}">
                            </div>
                            <div class="form-group">
                                <label for="input-8">Mobile</label>
                                <input type="text" class="form-control form-control-rounded" id="input-8"
                                       placeholder="Enter Your Mobile Number" name="phone"
                                       value="{{$settings->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="input-9">Address</label>
                                <input type="text" class="form-control form-control-rounded" id="input-9"
                                       placeholder="Enter Your Address" name="address" value="{{$settings->address}}">
                            </div>
                            <div class="form-group">
                                <label for="input-10">Facebook Link</label>
                                <input type="text" class="form-control form-control-rounded" id="input-10"
                                       placeholder="Facebook Link" name="fb_link" value="{{$settings->fb_link}}">
                            </div>
                            <div class="form-group">
                                <label for="input-11">Twitter Link</label>
                                <input type="text" class="form-control form-control-rounded" id="input-11"
                                       placeholder="Twitter Link" name="tw_link" value="{{$settings->tw_link}}">
                            </div>
                            <div class="form-group">
                                <label for="input-12">Pinterest Link</label>
                                <input type="text" class="form-control form-control-rounded" id="input-12"
                                       placeholder="Pinterest Link" name="pin_link" value="{{$settings->pin_link}}">
                            </div>
                            <div class="form-group">
                                <label for="input-13">Instagram Link</label>
                                <input type="text" class="form-control form-control-rounded" id="input-13"
                                       placeholder="Instagram Link" name="ins_link" value="{{$settings->ins_link}}">
                            </div>
                            <div class="form-group">
                                <label for="input-14">Youtube Link</label>
                                <input type="text" class="form-control form-control-rounded" id="input-14"
                                       placeholder="Youtube Link" name="yt_link" value="{{$settings->yt_link}}">
                            </div>
                            <div class="form-group">
                                <label for="input-15">Google Map Link</label>
                                <input type="text" class="form-control form-control-rounded" id="input-15"
                                       placeholder="Google Map Link" name="gmap_link" value="{{$settings->gmap_link}}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i>
                                    Update</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div><!--End Row-->


@include('backend.layouts.footer')
