@include('backend.layouts.sidebar')
@include('backend.layouts.header')


<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Edit slider</div>
                        <hr>
                        {!! Form::model($slider, ['method'=>'patch', 'files'=>true,
                        'action'=>['App\Http\Controllers\SliderController@update', $slider->id]])
                         !!}
                            <div class="form-group">
                                <label for="input-1">Title</label>
                                <input type="text" class="form-control" id="input-1" placeholder="Slider Title"
                                       name="title" value="{{ $slider->title }}">
                            </div>
                            <div class="form-group">
                                <label for="input-2">Content</label>
                                <input type="text" class="form-control" id="input-2"
                                       placeholder="Slider text (Not more than 20 words)" name="content" value="{{
                                       $slider->content }}">
                            </div>
                            <div class="form-group">
                                <label for="input-5">Image</label>
                                <input type="file" class="form-control form-control-rounded" id="input-5"
                                       name="sliderImage">
                            </div>
                            <div class="form-group">
                                <label for="input-2">Serial No.</label>
                                <input type="text" class="form-control" id="input-2"
                                       placeholder="Enter the serial number to show on home page" name="serial"
                                       value="{{ $slider->serial }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Update
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div><!--End content-wrapper-->


@include('backend.layouts.footer')
