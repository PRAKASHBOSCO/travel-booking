    @extends('Backend::layouts.master')

@section('title', __('All Hotels'))

@php
    admin_enqueue_styles([
        'gmz-datatables',
        'gmz-dt-global',
        'gmz-dt-multiple-tables',
        'footable'
    ]);     
    admin_enqueue_scripts([
        'gmz-datatables',
        'footable'
    ]);
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Categories
                    <a href="{{url('dashboard/categories_list')}}" class="btn btn-primary float-right">Create category</a>
                </div>

                <div class="card-body"> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td>ok</td>
                                <td> 
                                </td>
                                <td> 
                                </td>
                                <td>
                                    <a href="{{url('dashboard/edit_category')}}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="" method="POST" style="display: inline-block;">
                                        <button class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
     
@stop

