@extends('layouts.app') 
@section('styles')
<style>
    table>thead>tr>th.accomplishment-head {
        vertical-align: middle;
        display: table-cell;
    }
</style>
@endsection
 
@section('content')
<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Trade Remedy Unit</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="alert alert-success" id="add-new-alert" style="display: none"></div>
            <table class="table table-bordered" id="indicator-list">
                <thead class="thead-dark text-center align-middle">
                    <tr>
                        <th scope="col" rowspan="2" class="accomplishment-head">Performance Indicators</th>
                        <th scope="col" colspan="5">CY 2019 Quarterly Physical Targets</th>
                        <th scope="col" colspan="5">Actual Accomplishments</th>
                        <th scope="col" rowspan="2" class="accomplishment-head">Remarks</th>
                    </tr>
                    <tr>
                        <th scope="col">1st</th>
                        <th scope="col">2nd</th>
                        <th scope="col">3rd</th>
                        <th scope="col">4th</th>
                        <th scope="col">Total</th>
                        <th scope="col">1st</th>
                        <th scope="col">2nd</th>
                        <th scope="col">3rd</th>
                        <th scope="col">4th</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($performanceIndicators->isNotEmpty())
                        @foreach ($performanceIndicators as $performanceIndicator)
                            @include('accomplishment.single')
                        @endforeach
                    @else
                    <tr>
                        <td colspan="12" class="text-center">
                            No records
                        </td>
                    </tr>

                    @endif

                </tbody>
            </table>
            <a href="{{ route('performance-indicators.create') }}" class="btn btn-success show-modal" title="Add Performance Indicator">Add Performance Indicator</a>
            @include('modal.modal')
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

function showMessage(message, element) {
        var alert = element == undefined ? "#add-new-alert" : element;
        $(alert).text(message).fadeTo(1000, 500).slideUp(500, function () {
            $(this).slideUp(500);
        });
    }
 // EDIT SCHEDULE MODAL
 $('body').on('click', '.show-modal', function (event) {
        event.preventDefault();

        let me = $(this),
            url = me.attr('href'),
            title = me.attr('title');

        $('#modal-title').text(title);

        $.ajax({
            url: url,
            dataType: 'html',
            success: function (response) {
                $('#modal-body').html(response);
            }
        });

        $('#modal').modal('show');
    });


    // SAVING CHANGES TO THE EVENT
    $('#save-btn').click(function (event) {
        event.preventDefault();

        let form = $('#modal-body form'),
            url = form.attr('action'),
            method = 'POST';

        // reset errror messages
        form.find('.invalid-feedback').remove();
        form.find('.form-control').removeClass('is-invalid');

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            success: function (response) {
                if (method == 'POST') {
                    $('#indicator-list').prepend(response);
                    $('#modal').modal('hide');
                    showMessage("Performance Indicator added.");
                }
                else {
                    var id = $('input[name=id]').val();
                    if (id) {
                        $('#leave-list-' + id).replaceWith(response);
                    }

                    $('#leave-modal').modal('hide');

                    window.location.reload();
                    showMessage("Leave information updated.", '#update-alert');
                }

            },
            error: function(xhr) {
                var errors = xhr.responseJSON;
                    //console.log(errors.errors);
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function (key, value) {
                        let err = '<span class="invalid-feedback" style="display:block"><strong>'+ value +'</strong></span>';
                        form.find('#' + key).addClass('is-invalid').after(err)
                    });
                }
            }

        });
    });

    
    
</script>
    
@endsection