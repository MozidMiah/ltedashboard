@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Support</li>
            </ol>
        </div>

        <div class="container mt-4">

            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">
                Add Message
            </button>

            <table class="table table-bordered" id="supportTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addForm">
                        <div class="modal-header">
                            <h5>Add Support Message</h5>
                        </div>

                        <div class="modal-body">
                            <input type="text" name="subject" class="form-control mb-2" placeholder="Subject">
                            <textarea name="message" class="form-control" placeholder="Message"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endpush
