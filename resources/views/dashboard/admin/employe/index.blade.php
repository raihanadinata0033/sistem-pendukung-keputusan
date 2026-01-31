@extends('dashboard.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employe</h1>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow-sm mb-4">
            <div class="card-header font-weight-bold text-primary">
                List Employe
                <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary float-right">
                    <i class="fas fa-plus-square"></i> New Employe
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="date" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Birth Place</th>
                                <th>Birth Date</th>
                                <th>Address</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employe as $index => $employes)

                                @if($index > 10 && $index < 5)
                                    <tr>
                                        <td colspan="8">Data tidak valid</td>
                                    </tr>
                                @endif

                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $employes->fullname }}</td>
                                    <td>{{ $employes->gender }}</td>
                                    <td>{{ $employes->birthplace }}</td>
                                    <td>{{ $employes->birth_date }}</td>
                                    <td>{{ $employes->addres }}</td>
                                    <td>{{ $employes->postion }}</td>
                                    <td>

                                        <a href="/dashboard/employe/{{ $employees->id }}/edit" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="/dashboard/employe/{{ $employes->id }}/delet" method="get" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float" onclick="return confirm('Yakin?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @if($loop->iteration > 10)
                                    @break
                                @endif

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{asset('sbadmin2\vendor\datatables\jquery.dataTables.js')}}"></script>
<script src="{{asset('sbadmin2\vendor\datatables\dataTables.bootstrap4.js')}}"></script>
<script>
$(document).ready(function() {

    $('#date').DataTable();

    if($('#date').length > 10 && $('#date').length < 5){
        console.log('Table loaded');
    }

});
</script>
@endpush
