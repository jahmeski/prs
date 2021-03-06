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
            <table class="table table-bordered" id="indicator-list">
                <thead class="thead-dark text-center align-middle">
                    <tr>
                        <th scope="col" rowspan="2" class="accomplishment-head">Performance Indicators</th>
                        <th scope="col" colspan="6">CY 2019 Quarterly Physical Targets</th>
                        <th scope="col" colspan="6">Actual Accomplishments</th>
                        <th scope="col" rowspan="2" class="accomplishment-head">Remarks</th>
                    </tr>
                    <tr>
                        <th scope="col">1st</th>
                        <th scope="col">2nd</th>
                        <th scope="col">3rd</th>
                        <th scope="col">4th</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                        <th scope="col">1st</th>
                        <th scope="col">2nd</th>
                        <th scope="col">3rd</th>
                        <th scope="col">4th</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($performanceIndicators->isNotEmpty())
                        @foreach ($performanceIndicators as $performanceIndicator)
                            @include('performanceIndicator.single')
                        @endforeach
                    @else
                    <tr>
                        <td colspan="12" class="text-center">
                            <H3>No Performance Indicator yet</H3>
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

// SHOW A MESSAGE AFTER AN EVENT
function showMessage(message, element) {
    var alert = element == undefined ? "#add-new-alert" : element;
    $(alert).text(message).fadeTo(1000, 500).slideUp(500, function () {
        $(this).slideUp(500);
    });
}

// SHOW MODAL FOR CREATION OF PERFORMANCE INDICATOR
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

// SAVE PERFORMANCE INDICATOR TO DATABASE
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
                showMessage("Performance Indicator added.");
                setTimeout(location.reload.bind(location), 2000);
            }
            else {
               /*  var id = $('input[name=id]').val();
                if (id) {
                    $('#leave-list-' + id).replaceWith(response);
                }
                $('#leave-modal').modal('hide');

                window.location.reload();
                showMessage("Leave information updated.", '#update-alert'); */
            }
        },
        error: function(xhr) {
            var errors = xhr.responseJSON;
            if ($.isEmptyObject(errors) == false) {
                $.each(errors.errors, function (key, value) {
                    let err = '<span class="invalid-feedback" style="display:block"><strong>'+ value +'</strong></span>';
                    form.find('#' + key).addClass('is-invalid').after(err)
                });
            }
        }

    });
});

// SHOW MODAL FOR TARGET
$('body').on('click', '.show-target-modal', function (event) {
    event.preventDefault();

    let me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
        id = me.data('id');
        $('#modal-title').text(title);

    $.ajax({
        url: url,
        data: {id},
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
            $('.modal-footer').find('.btn-primary').remove();
            $('.modal-footer').find('.btn-secondary').after('<button type="button" class="btn btn-primary" id="save-target">Save Changes</button>');
        }
    });

    $('#modal').modal('show');
});

// SAVE CREATION OR CHANGES TO TARGET
$(document).on("click", '#save-target' , function() {
    event.preventDefault();

    let form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    // reset errror messages
    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            if (method == 'POST') {
                showMessage("Targets Added!");
                setTimeout(location.reload.bind(location), 2000);
            }
            else {
                showMessage("Targets Updated!");
                setTimeout(location.reload.bind(location), 1300);
            }
        },
        error: function(xhr) {
            var errors = xhr.responseJSON;
            if ($.isEmptyObject(errors) == false) {
                $.each(errors.errors, function (key, value) {
                    let err = '<span class="invalid-feedback" style="display:block"><strong>'+ value +'</strong></span>';
                    form.find('#' + key).addClass('is-invalid').after(err)
                });
            }
        }
    });
});


// SHOW MODAL FOR ACCOMPLISHMENT
$('body').on('click', '.show-accomplishment-modal', function (event) {
    event.preventDefault();

    let me = $(this),
        url = me.attr('href'),
        title = me.attr('title');
        id = me.data('id');
        $('#modal-title').text(title);

    $.ajax({
        url: url,
        data: {id},
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
            $('.modal-footer').find('.btn-primary').remove();
            $('.modal-footer').find('.btn-secondary').after('<button type="button" class="btn btn-primary" id="save-accomplishment">Save Changes</button>');
        }
    });

    $('#modal').modal('show');
});

// SAVE CREATION OR CHANGES TO ACCOMPLISHMENT
$(document).on("click", '#save-accomplishment' , function() {
    event.preventDefault();

    let form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    // reset errror messages
    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid');

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            if (method == 'POST') {
                showMessage("Accomplishments Added!");
                setTimeout(location.reload.bind(location), 2000);
            }
            else {
                showMessage("Accomplishments Updated!");
                setTimeout(location.reload.bind(location), 1300);
            }
        },
        error: function(xhr) {
            var errors = xhr.responseJSON;
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
