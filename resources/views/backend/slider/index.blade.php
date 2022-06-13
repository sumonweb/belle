@include('backend.layouts.sidebar')
@include('backend.layouts.header')

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">Home Page Product Sliders
                        <div class="card-action">
                            <div class="form-group">
                                <a href="{{ route('slider.create') }}">
                                    <button type="submit" class="btn btn-light
                      px-5">Create
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--Flash message--}}
                    <div class="flash-message" style="margin: 0 15px;">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}" style="padding: 8px 10px">{{ Session::get('alert-' .
                                $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div> <!-- end .flash-message -->

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-borderless">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Slider Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($sliders))
                                    @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->serial }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>
                                            <img src="assets/uploads/slider/{{ $slider->sliderImage }}"
                                                 class="product-img"
                                                 alt="product img" height="50px" width="100px">
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($slider->content, 30) }}</td>
                                        <td>
                                            <a href="{{ route('slider.edit', $slider->id) }}">
                                                <i class="zmdi zmdi-eject"></i>
                                            </a>
{{--                                            <a href="" style="margin-left: 10px;">--}}
                                                <i class="zmdi zmdi-delete" data-toggle="modal"
                                                   data-target="#myModal{{$slider->id}}" style="margin-left: 10px;"></i>
{{--                                            </a>--}}
                                            <div class="modal" tabindex="-1" role="dialog" id="myModal{{$slider->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: #0a1219;">Delete
                                                                slider</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="color: #0a1219">Are you sure to delete this
                                                                slider?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['method'=>'DELETE',
                                                            'action'=>['App\Http\Controllers\SliderController@destroy', $slider->id]]) !!}
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                            {!! Form::close() !!}
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <!--End Dashboard Content-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div><!--End content-wrapper-->
@include('backend.layouts.footer')
