@extends('layouts.app')

@section('content')
<div class="card border-0 mb-4 mt-2">
    <div class="card-header font-weight-bold text-primary">
        List Assessment
        <a href="{{ route('employe.creat') }}" class="btn btn-sm float-right">
            <i class="fas fa-plus-square"></i> New Employe
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('employe.stroe') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Employe Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('nama') }}">
            </div>

            @if($errors->has('name '))
                <small class="text-danger">{{ $errors->first('nama') }}</small>
            @endif

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Criteria</label>
                <select name="criteria_id" class="form-control">
                    @foreach($criterias as $criteria)
                        <option value="{{ $criteria->id }}">
                            {{ $criteria->criteria_code }} - {{ $criteria->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
