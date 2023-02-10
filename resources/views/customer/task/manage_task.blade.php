@extends('layout.panel')
@section('title', 'Manage Task')
@section('breadcrumb-title', 'Manage Task')
@section('breadcrumb-backpage', 'Manage Task')
@section('breadcrumb-currentpage', 'Manage Task')
@section('link-area')

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard.css">
@endsection
@section('content-area')

<div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('task.manage')}}</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('task.sr_no')}}</th>
                    <th scope="col">{{__('task.name')}}</th>
                    <th scope="col">{{__('task.file')}}</th>
                    <th scope="col">{{__('task.desc')}}</th>
                    <th scope="col">{{__('task.is_active')}}</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $data->name??'' }}</td>
                    <td> <img src="{{ asset($data->file) }}" height="50px"alt="" class="square" /></td>
                    <td>{{ $data->desc??'' }}</td>
                    <td>
                    <div class="switch">
                            <label>
                                <input type="checkbox" value="{{$data->id}}" data-url="{{route('customer.task.active-task',$data->id) }}" class="is_active" id="is_active"  {{ $data->is_active==0?'':'checked'   }} >
                                <span class="lever"></span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown" >
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($data->id); @endphp
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item"
                                        href="{{route(Helper::getGuard().'.task.edit',$bid)}}">
                                        <i class="material-icons light-blue-text text-darken-4">edit</i>
                                    </a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                        <i class="material-icons danger red-text text-accent-4">delete</i>
                                    </a>
                                </li>
                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route(Helper::getGuard().'.task.destroy', $bid) }}" method="post"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
@section('script-area')
<script>
    $('.is_active').on('click', function() {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {

                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script>
@endsection
