@extends('layouts.newdashbord')

@section('content')
    <form autocomplete="off" class="mt-3 card" method="POST" action="revision-list-view">
        <div class="card-header">
            <h4 class="card-title">Revision List</h4>
            <p class="card-category">Download Excel sheet</p>
        </div>
        <div class="card-body">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @if ($errors->first('start_date')) has-error @endif">
                        <label for="start-date">Start date <star class="star">*</star></label>
                        <input id="start-date" type="text" name="start_date" placeholder="Select start date"
                            class="form-control @if ($errors->first('end_date')) border-danger @endif" />
                        <label id="email-error" class="error" for="email">
                            {{ $errors->first('start_date') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-label @if ($errors->first('end_date')) has-error @endif">
                        <label for="end-date">End date <star class="star">*</star></label>
                        <input id="end-date" type="text" name="end_date" placeholder="Select end date"
                            class="form-control @if ($errors->first('end_date')) border-danger @endif" />
                        <label id="email-error" class="error" for="email">
                            {{ $errors->first('end_date') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" value="1" name='view' class="btn btn-primary">View</button>
            <button type="submit" value="0" name="view" class="btn btn-success">Download excel</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $("#start-date").datepicker({
            dateFormat: 'yy-mm-dd',
        });
        $("#end-date").datepicker({
            dateFormat: 'yy-mm-dd',
        });
    </script>
@endsection
