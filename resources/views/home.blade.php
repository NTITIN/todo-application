@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">Dashboard</div>
            <div class="card">
                
                    <div class="card-body">
                        <h5 style="mb-2">Employee Task Assign</h5>
                        <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Task Description</th>
                                    <th>Employee Email</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.data') !!}',
                columns: [
                    { data: 'user_name', name: 'user_name' },
                    { data: 'task_description', name: 'task_description' },
                    { data: 'user_email_id', name: 'user_email_id' }
                ]
            });
        });
</script>
@endsection