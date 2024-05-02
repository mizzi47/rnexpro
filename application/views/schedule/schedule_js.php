<script>
    var selected_job_id;
    //selection schedule by job ajax
    function get_schedule_by_job(job_id) {
        cal.clear();
        $.ajax({
            url: '<?php echo base_url() ?>schedule/getSchedule',
            method: 'post',
            data: {},
            dataType: 'text',
            success: function(data) {
                var all_schedule = JSON.parse(data);
                CountSchedule = all_schedule.length;
                if (selected_job_id == "all") {
                    for (var i = 0; i < all_schedule.length; i++) {
                        var savedSchedules = {
                            id: all_schedule[i]['schedule_id'],
                            title: all_schedule[i]['title'],
                            start: new Date(all_schedule[i]['start']),
                            end: new Date(all_schedule[i]['end']),
                            color: '#ffffff',
                            bgColor: all_schedule[i]['bgColor'],
                            dragBgColor: all_schedule[i]['bgColor'],
                            borderColor: all_schedule[i]['bgColor'],
                            calendarId: ++CountSchedule,
                            category: 'allday',
                            isReadOnly: true,
                            body: all_schedule[i]['body'],
                            raw: all_schedule[i]['job_name']
                        };
                        cal.createSchedules([savedSchedules]);
                    }
                } else {
                    for (var i = 0; i < all_schedule.length; i++) {
                        if (all_schedule[i]['job_id'] == parseInt(job_id)) {
                            var savedSchedules = {
                                id: all_schedule[i]['schedule_id'],
                                title: all_schedule[i]['title'],
                                start: new Date(all_schedule[i]['start']),
                                end: new Date(all_schedule[i]['end']),
                                color: '#ffffff',
                                bgColor: all_schedule[i]['bgColor'],
                                dragBgColor: all_schedule[i]['bgColor'],
                                borderColor: all_schedule[i]['bgColor'],
                                calendarId: ++CountSchedule,
                                category: 'allday',
                                isReadOnly: true,
                                body: all_schedule[i]['body'],
                                raw: all_schedule[i]['job_name']
                            };
                            cal.createSchedules([savedSchedules]);
                        }
                    }
                }

            }
        });
    }

    $(document).ready(function() {
        $("#display_date_start").on("change", function() {
            $("#display_date_end").attr("min", $(this).val());
        });

        $('#schedule_job_selection').on('select2:select', function(e) {
            var data = e.params.data;
            selected_job_id = data['id'];
            get_schedule_by_job(selected_job_id);
        });

        CountSchedule = 0;
        //preload ajax
        $.ajax({
            url: '<?php echo base_url() ?>schedule/getSchedule',
            method: 'post',
            data: {},
            dataType: 'text',
            success: function(data) {
                var all_schedule = JSON.parse(data);
                CountSchedule = all_schedule.length;
                for (var i = 0; i < all_schedule.length; i++) {
                    var savedSchedules = {
                        id: all_schedule[i]['schedule_id'],
                        title: all_schedule[i]['title'],
                        start: new Date(all_schedule[i]['start']),
                        end: new Date(all_schedule[i]['end']),
                        color: '#ffffff',
                        bgColor: all_schedule[i]['bgColor'],
                        dragBgColor: all_schedule[i]['bgColor'],
                        borderColor: all_schedule[i]['bgColor'],
                        calendarId: ++CountSchedule,
                        category: 'allday',
                        isReadOnly: true,
                        body: all_schedule[i]['body'],
                        raw: all_schedule[i]['job_name']
                    };
                    cal.createSchedules([savedSchedules]);
                }
                $('#schedule_job_selection').val('all'); // Select the option with a value of '1'
                $('#schedule_job_selection').trigger('change');
            }
        });

        //button onclick
        $("#add_schedule").click(function() {
            var createdObjectSchedule = {
                title: $("#sch_title").val(),
                body: $("#sch_body").val(),
                start: new Date($("#display_date_start").val()),
                end: new Date($("#display_date_end").val()),
                color: '#ffffff',
                bgColor: $("#sch_color").val(),
                dragBgColor: $("#sch_color").val(),
                borderColor: $("#sch_color").val(),
                calendarId: ++CountSchedule,
                category: 'allday',
            };
            ajaxAddSchedule(createdObjectSchedule);
        });

        //button onclick
        $("#remove_schedule").click(function(e) {
            e.preventDefault();
            clicked_schedule_id = $('#clickScheduleModal').data('id');
            ajaxRemoveSchedule(clicked_schedule_id);
        });

        //add function
        async function ajaxAddSchedule(createdObjectSchedule) {
            var jsonSchedule = JSON.stringify(createdObjectSchedule);
            $.ajax({
                url: '<?php echo base_url() ?>/schedule/addSchedule',
                method: 'post',
                data: {
                    jsonSchedule: jsonSchedule,
                    selected_job_id: selected_job_id
                },
                dataType: 'text',
                success: function(response) {
                    if (response == 'Success') {
                        window.location.href = "<?php echo base_url() ?>schedule/index";
                    } else {
                        alert('Fail');
                    }
                }
            });
            $('#addModal').modal('hide');
        }
        //add function
        async function ajaxRemoveSchedule(clicked_schedule_id) {
            $.ajax({
                url: '<?php echo base_url() ?>/schedule/removeSchedule',
                method: 'post',
                data: {
                    schedule_id: clicked_schedule_id
                },
                dataType: 'text',
                success: function(response) {
                    if (response == 'Success') {
                        window.location.href = "<?php echo base_url() ?>schedule/index";
                    } else {
                        alert('Fail');
                    }
                }
            });
            $('#clickScheduleModal').modal('hide');
        }

        function formatDate(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            // return date.getDate() + "/" + (date.getMonth() + 1) + "/" + date
            //     .getFullYear();
            return date.getFullYear() + "-" + (date.getMonth() + 1).toString().padStart(2, '0') + "-" + date.getDate().toString().padStart(2, '0');
        }

        var CalendarList = [];

        function addCalendar(calendar) {
            CalendarList.push(calendar);
        }

        function findCalendar(id) {
            var found;

            CalendarList.forEach(function(calendar) {
                if (calendar.id === id) {
                    found = calendar;
                }
            });

            return found || CalendarList[0];
        }

        function hexToRGBA(hex) {
            var radix = 16;
            var r = parseInt(hex.slice(1, 3), radix),
                g = parseInt(hex.slice(3, 5), radix),
                b = parseInt(hex.slice(5, 7), radix),
                a = parseInt(hex.slice(7, 9), radix) / 255 || 1;
            var rgba = 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a + ')';

            return rgba;
        }

        (function(window, Calendar) {

            var cal, resizeThrottled;
            var useCreationPopup = false;
            var useDetailPopup = false;
            var datePicker, selectedCalendar;

            cal = new Calendar('#container_calendar', {
                defaultView: 'month',
                taskView: false,
                disableDragging: true,
                useCreationPopup: useCreationPopup,
                useDetailPopup: useDetailPopup,
                hourStart: 0,
                hourEnd: 0,
                calendars: CalendarList,
                template: {
                    milestone: function(model) {
                        return '<span class="calendar-font-icon ic-milestone-b"></span> <span style="background-color: ' +
                            model.bgColor + '">' + model.title + '</span>';
                    },
                }
            });

            // event handlers
            cal.on({
                'clickMore': function(e) {},
                'clickSchedule': function(e) {
                    var e = e.schedule;
                    var selected_dateStart = new Date(e.start['_date']);
                    var selected_dateEnd = new Date(e.end['_date']);
                    var formatted_dateStart = formatDate(selected_dateStart);
                    var formatted_dateEnd = formatDate(selected_dateEnd);
                    $("#details_view_job").val(e.raw);
                    $("#details_view_date_start").val(formatted_dateStart);
                    $("#details_view_date_end").val(formatted_dateEnd);
                    $("#details_view_title").val(e.title);
                    $("#details_view_body").val(e.body);
                    $("#details_schedule_id").val(e.id);
                    $('#clickScheduleModal').data("id", e.id);;
                    $('#clickScheduleModal').modal('show');
                },
                'clickDayname': function(date) {},
                'beforeCreateSchedule': function(e) {
                    if (selected_job_id == 'all' || selected_job_id == 'null' || selected_job_id == null) {
                        toastr.error("Please select a job from job list", "NOTICE");
                        document.getElementById('notice').play();
                    } else {
                        var selected_dateStart = new Date(e.start['_date']);
                        var selected_dateEnd = new Date(e.end['_date']);
                        var formatted_dateStart = formatDate(selected_dateStart);
                        var formatted_dateEnd = formatDate(selected_dateEnd);
                        $("#display_date_start").val(formatted_dateStart);
                        $("#display_date_end").val(formatted_dateEnd);
                        // $("#data_date_start").val(selected_dateStart);
                        // $("#data_date_end").val(selected_dateEnd);
                        $('#addModal').modal('show');
                    }
                    refreshScheduleVisibility();
                },
                'beforeUpdateSchedule': function(e) {
                    var schedule = e.schedule;
                    var changes = e.changes;
                    cal.updateSchedule(schedule.id, schedule.calendarId, changes);
                    refreshScheduleVisibility();
                },
                'beforeDeleteSchedule': function(e) {
                    cal.deleteSchedule(e.schedule.id, e.schedule.calendarId);
                },
                'afterRenderSchedule': function(e) {
                    var schedule = e.schedule;
                },
                'clickTimezonesCollapseBtn': function(timezonesCollapsed) {

                    if (timezonesCollapsed) {
                        cal.setTheme({
                            'week.daygridLeft.width': '77px',
                            'week.timegridLeft.width': '77px'
                        });
                    } else {
                        cal.setTheme({
                            'week.daygridLeft.width': '60px',
                            'week.timegridLeft.width': '60px'
                        });
                    }

                    return true;
                }
            });

            function getTimeTemplate(schedule, isAllDay) {
                var html = [];
                var start = schedule.start.toUTCString();
                if (!isAllDay) {
                    html.push('<strong>' + start.format('HH:mm') + '</strong> ');
                }
                if (schedule.isPrivate) {
                    html.push('<span class="calendar-font-icon ic-lock-b"></span>');
                    html.push(' Private');
                } else {
                    if (schedule.isReadOnly) {
                        html.push('<span class="calendar-font-icon ic-readonly-b"></span>');
                    } else if (schedule.recurrenceRule) {
                        html.push('<span class="calendar-font-icon ic-repeat-b"></span>');
                    } else if (schedule.attendees.length) {
                        html.push('<span class="calendar-font-icon ic-user-b"></span>');
                    } else if (schedule.location) {
                        html.push('<span class="calendar-font-icon ic-location-b"></span>');
                    }
                    html.push(' ' + schedule.title);
                }

                return html.join('');
            }

            function onClickNavi(e) {
                var action = getDataAction(e.target);

                switch (action) {
                    case 'move-prev':
                        cal.prev();
                        break;
                    case 'move-next':
                        cal.next();
                        break;
                    case 'move-today':
                        cal.today();
                        break;
                    default:
                        return;
                }

                setRenderRangeText();
                setSchedules();
            }

            function onChangeNewScheduleCalendar(e) {
                var target = $(e.target).closest('a[role="menuitem"]')[0];
                var calendarId = getDataAction(target);
                changeNewScheduleCalendar(calendarId);
            }

            function changeNewScheduleCalendar(calendarId) {
                var calendarNameElement = document.getElementById('calendarName');
                var calendar = findCalendar(calendarId);
                var html = [];

                html.push('<span class="calendar-bar" style="background-color: ' + calendar.bgColor +
                    '; border-color:' +
                    calendar.borderColor + ';"></span>');
                html.push('<span class="calendar-name">' + calendar.name + '</span>');

                calendarNameElement.innerHTML = html.join('');

                selectedCalendar = calendar;
            }

            function createNewSchedule(event) {
                var start = new Date(event.start.getTime());
                var end = new Date(event.end.getTime());

                if (useCreationPopup) {
                    cal.openCreationPopup({
                        start: start,
                        end: end
                    });
                }
            }

            function refreshScheduleVisibility() {
                var calendarElements = Array.prototype.slice.call(document.querySelectorAll(
                    '#calendarList input'));

                CalendarList.forEach(function(calendar) {
                    cal.toggleSchedules(calendar.id, !calendar.checked, false);
                });

                cal.render(true);

                calendarElements.forEach(function(input) {
                    var span = input.nextElementSibling;
                    span.style.backgroundColor = input.checked ? span.style.borderColor : 'transparent';
                });
            }

            function getDataAction(target) {
                return target.dataset ? target.dataset.action : target.getAttribute('data-action');
            }

            resizeThrottled = tui.util.throttle(function() {
                cal.render();
            }, 50);

            window.cal = cal;
        })(window, tui.Calendar);
        $("#currentMonth").text(monthNames[new Date().getMonth()] + " " + new Date(cal.getDate()).getFullYear());
    });
    // set calendars
    (function() {})();
    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    function setDate() {
        $("#currentMonth").text(monthNames[new Date(cal.getDate()).getMonth()] + " " + new Date(cal.getDate())
            .getFullYear());
    }
</script>