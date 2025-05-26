@extends('web.layouts.master')
@section('title', 'Appointment')
@section('content')

    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bs-bg="{{ asset('web/img/bg/9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                            <h1 class="section-title white-color">Schedule Appointment</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Appointment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- APPOINTMENT SECTION -->
    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-2">
                <img src="{{ asset('uploads/vendors/' . $service->vendor->image) }}" class="img-fluid rounded-circle"
                    style="width: 80px; height: 80px; object-fit: cover;">
            </div>
            <div class="col-md-10">
                <h3 class="text-white">{{ $service->name }}</h3>
                <p class="mb-0 text-white">Store: <strong>{{ $service->vendor->name }}</strong></p>
            </div>
        </div>

        <div class="booking-calendar-container bg-white p-4 rounded shadow">
            <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                <button id="prev-month-btn" class="btn btn-sm btn-outline-dark">&lt;</button>
                <div id="month-year-display" class="fw-bold fs-5"></div>
                <button id="next-month-btn" class="btn btn-sm btn-outline-dark">&gt;</button>
            </div>

            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody id="calendar-body"></tbody>
            </table>

            <div id="selected-date-display" class="my-3 fw-bold text-dark"></div>

            <!-- Time Slots Section -->
            <div id="time-slots-section" style="display: none;">
                <h5 class="mb-3 text-dark">Available Time Slots</h5>
                <div id="time-slots-list" class="d-flex flex-wrap gap-2 mb-3"></div>
            
                <form id="stripe-booking-form" action="{{ route('stripe.BookingStripeCheckout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="vendor_id" value="{{ $service->vendor_id }}">
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="availability_id" id="availability_id">
                    <input type="hidden" name="date" id="booking-date">
                    <input type="hidden" name="time_slot" id="booking-time">
            
                    <div class="mb-3">
                        <label for="note" class="form-label text-dark">Note (optional)</label>
                        <textarea name="note" class="form-control" rows="2"></textarea>
                    </div>
            
                    <button type="submit" class="btn btn-success">Pay with Stripe & Confirm</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        const availabilities = @json($service->vendor->availabilities);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarBody = document.getElementById('calendar-body');
            const monthYearDisplay = document.getElementById('month-year-display');
            const prevMonthBtn = document.getElementById('prev-month-btn');
            const nextMonthBtn = document.getElementById('next-month-btn');
            const selectedDateDisplay = document.getElementById('selected-date-display');
            const timeSlotsSection = document.getElementById('time-slots-section');
            const timeSlotsList = document.getElementById('time-slots-list');

            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();

            function formatDateLocal(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }

            function renderTimeSlots(dateStr) {
                const slotsForDate = availabilities.filter(a => {
                    return a.time_slot.startsWith(dateStr);
                });

                timeSlotsList.innerHTML = '';
                document.getElementById('stripe-booking-form').style.display = 'none';

                if (slotsForDate.length === 0) {
                    timeSlotsList.innerHTML = `<div class="alert alert-danger">No slots available for this day.</div>`;
                } else {
                    slotsForDate.forEach(slot => {
                        const slotTime = new Date(slot.time_slot);
                        const now = new Date();

                        const isPast = slotTime < now;

                        const div = document.createElement('div');
                        div.className = 'btn btn-outline-primary btn-sm';
                        div.textContent = slotTime.toLocaleTimeString([], {
                            hour: '2-digit', minute: '2-digit'
                        });

                        if (isPast) {
                            div.classList.add('disabled', 'btn-secondary');
                            div.style.opacity = '0.6';
                        } else {
                            div.addEventListener('click', function () {
                                document.querySelectorAll('#time-slots-list .btn').forEach(b => b.classList.remove('active'));
                                div.classList.add('active');

                                // Fill form fields
                                document.getElementById('booking-date').value = dateStr;
                                document.getElementById('booking-time').value = slotTime.toTimeString().split(' ')[0];

                                const match = availabilities.find(a => a.time_slot === slot.time_slot);
                                if (match) {
                                    document.getElementById('availability_id').value = match.id;
                                }

                                document.getElementById('stripe-booking-form').style.display = 'block';
                            });
                        }

                        timeSlotsList.appendChild(div);
                    });
                }

                timeSlotsSection.style.display = 'block';
            }


            function generateCalendar(month, year, autoSelectToday = false) {
                calendarBody.innerHTML = '';
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                monthYearDisplay.textContent = new Date(year, month).toLocaleDateString('en-US', {
                    month: 'long', year: 'numeric'
                });

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');
                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');
                        if (i === 0 && j < firstDay) {
                            cell.textContent = '';
                        } else if (date > daysInMonth) {
                            break;
                        } else {
                            const cellDate = new Date(year, month, date);
                            const dateStr = formatDateLocal(cellDate);
                            cell.textContent = date;

                            cell.addEventListener('click', function () {
                                document.querySelectorAll('td').forEach(c => c.classList.remove('bg-warning'));
                                this.classList.add('bg-warning');
                                selectedDateDisplay.textContent = 'Selected Date: ' + dateStr;
                                renderTimeSlots(dateStr);
                            });

                            if (autoSelectToday && cellDate.toDateString() === new Date().toDateString()) {
                                setTimeout(() => cell.click(), 10);
                            }

                            row.appendChild(cell);
                            date++;
                        }
                    }
                    calendarBody.appendChild(row);
                }
            }

            prevMonthBtn.addEventListener('click', function () {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            nextMonthBtn.addEventListener('click', function () {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            // Auto select today and its slots
            generateCalendar(currentMonth, currentYear, true);
        });
    </script>
@endsection