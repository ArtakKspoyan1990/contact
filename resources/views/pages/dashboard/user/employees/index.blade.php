@extends('layouts.dashboard.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.dashboard.navbars.auth.topnav', ['title' => 'Employees'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h6>Employees</h6>
                    <a href="{{ route('company.employees.add')}}" class="btn btn-primary btn-sm">Create</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Role
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Qr
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                @if($item->role == 1)
                                                    {{ __('Big Company') }}
                                                @elseif ($item->role == 2)
                                                    {{ __('Company') }}
                                                @else
                                                    {{  __('Individual') }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                                <img height="70" src="{{ $item->qr() }}" />
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">
                                               {{ date("Y-m-d H:i", strtotime($item->created_at)) }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-around">
                                                <form action="{{ route('company.employees.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>
                                                </form>

                                                <a href="{{ route('company.employees.edit', ['id' => $item->id]) }}" class="btn btn-info btn-sm">Edit</a>

                                                @if($item->status == 1)
                                                    <a href="{{ route('company.employees.toggle', [$item->id, 0]) }}" class="btn btn-success btn-sm">Published</a>
                                                @else
                                                    <a href="{{ route('company.employees.toggle', [$item->id, 1]) }}" class="btn btn-dark btn-sm">Unpublished</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $items->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
