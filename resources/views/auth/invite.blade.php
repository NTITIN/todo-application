@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('sendinvitations') }}">
                            
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id; }}">
                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right"><span style="color:red;">*</span> {{ __('Select Employee Name') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="username" id="username" required>
                                        <option value="">--Select Empoyee Name--</option>
                                        @foreach($user as $user_name)
                                        <option value="{{ $user_name->id }}">{{ $user_name->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="task_description" class="col-md-4 col-form-label text-md-right"><span style="color:red;">*</span> {{ __('Task Description') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="task_description" id="task_description" rows="4" required></textarea>
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="task_description" class="col-md-4 col-form-label text-md-right" required><span style="color:red;">*</span>  {{ __('Empoloyee Email ID') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="emplpoyee_emailid" id="user-email" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Invitation') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     $(document).ready(function() {
            $('#username').change(function() {
                var userId = $(this).val();
                if (userId) {
                    $.ajax({
                        url: 'useremail/' + userId,
                        method: 'GET',
                        success: function(response) {
                            if (response.email) {
                                $('#user-email').val(response.email);
                                
                            } else {
                                $('#user-email').text('Email not found');
                            }
                        },
                        error: function() {
                            $('#user-email').text('Error fetching email');
                        }
                    });
                } else {
                    $('#user-email').val('');
                }
            });
        });
</script>
@endsection
