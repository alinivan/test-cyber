$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body')
    .on('click', '#next-month', function () {
        let calendarDatetime = $('#current-datetime').attr('datetime');
        let newDate = addMonth(calendarDatetime);
        renderNewDate(newDate.year, newDate.month);
    })
    .on('click', '#current-month', function () {
        let currentDate = new Date();
        renderNewDate(currentDate.getFullYear(), currentDate.getMonth() + 1);
    })
    .on('click', '#previous-month', function () {
        let calendarDatetime = $('#current-datetime').attr('datetime');
        let newDate = subtractMonth(calendarDatetime);
        renderNewDate(newDate.year, newDate.month);
    })
    .on('click', '.delete-event', function () {
        let eventId = $(this).attr('data-id');

        $.ajax({
            url: '/event/' + eventId,
            method: 'DELETE',
            context: document.body
        }).done(function (response) {
            if (response.success) {
                location.reload();
            }
        });
    });

function addMonth(calendarDate) {
    let dt = new Date(calendarDate);
    dt.setMonth(dt.getMonth() + 1);

    return {
        year: dt.getFullYear(),
        month: (dt.getMonth() + 1)
    };
}

function subtractMonth(calendarDate) {
    let dt = new Date(calendarDate);
    dt.setMonth(dt.getMonth() - 1);

    return {
        year: dt.getFullYear(),
        month: (dt.getMonth() + 1)
    };
}

function renderNewDate(year, month) {
    $.ajax({
        url: '/',
        method: 'GET',
        data: {
            year: year,
            month: month
        },
        context: document.body
    }).done(function (response) {
        $('#content').html(response);
    });
}
