@extends('layouts.master')

@section('content')
    <section>
        <div class="container mt-2 border border-secondary rounded mb-5 col-md-10">
            <div class="d-flex justify-content-between align-items-center m-2">
                <h1 class="text-primary">Make Appointment</h1>
                <div>
                    <a href="{{ route('patient.index') }}" class="btn btn-danger">X</a>
                </div>
            </div>
            
            <!-- Patient Information Form -->
            <div id="patient-form" class="m-5">
                <h2 class="text-secondary text-center">Patient Information</h2>
                <form id="patient-info-form" method="POST" action="{{ route('patient.store') }}">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Patient Name:</label>
                        <input type="text" name="name" id="name" placeholder="Patient Name" class="form-control" required>
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Age:</label>
                        <input type="number" name="age" id="age" placeholder="Age" class="form-control" required>
                        <span class="text-danger">@error('age'){{$message}}@enderror</span>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Phone:</label>
                        <input type="number" name="phone" id="phone" placeholder="Phone Number" class="form-control" required>
                        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Address:</label>
                        <input type="text" name="address" id="address" placeholder="Address" class="form-control" required>
                        <span class="text-danger">@error('address'){{$message}}@enderror</span>
                    </div>
                    <div class="mt-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" required class="form-select">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                    </div>
                    <div class="my-3 text-center">
                        <button id="nextButton" onclick="showAppointmentForm()" class="btn btn-secondary" disabled>Next</button>
                    </div>
                </form>
            </div>

            <!-- Appointment Details Form -->
            <div id="appointment-form" style="display: none;" class="m-5">
                <h2 class="text-center">Appointment Details</h2>
                <form id="appointment-info-form" method="POST" action="{{ route('appointment.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="patient_id" class="form-label">Patient ID</label>
                        <select class="form-select" id="patient_id" name="patient_id">
                        </select>
                        <span class="text-danger">@error('patient_id'){{$message}}@enderror</span>
                    </div>                    
                    <div class="mb-3">
                        <label for="doctor_id" class="form-label">Doctor ID</label>
                        <select class="form-select" id="doctor_id" name="doctor_id">
                            <option selected>Select Doctor</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('doctor_id'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="date1" class="form-label">Date of Appointment</label>
                        <input type="date" class="form-control" id="date1" name="date1">
                        <span class="text-danger">@error('date1'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="time1" class="form-label">Time of Appointment</label>
                        <input type="time" class="form-control" id="time1" name="time1">
                        <span class="text-danger">@error('time1'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="diagnosis" class="form-label">Initial Diagnosis</label>
                        <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3"></textarea>
                        <span class="text-danger">@error('diagnosis'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="date2" class="form-label">Follow-up Date</label>
                        <input type="date" class="form-control" id="date2" name="date2">
                        <span class="text-danger">@error('date2'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="time2" the="form-label">Follow-up Time</label>
                        <input type="time" class="form-control" id="time2" name="time2">
                        <span class="text-danger">@error('time2'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary">Submit</button>
                        <button type="button" id="nextButton" onclick="showPatientForm()" class="btn btn-secondary">Previous</button>
                    </div>
                </form>
            </div>

            <script>
                const form = document.getElementById('patient-info-form');
                const inputs = form.querySelectorAll('input[required], select[required]');
                const nextButton = document.getElementById('nextButton');


                function checkInputs() {
                    let allFilled = true;
                    inputs.forEach(input => {
                        if (input.value === '') {
                            allFilled = false;
                        }
                    });
                    nextButton.disabled = !allFilled;
                }

                inputs.forEach(input => {
                    input.addEventListener('change', checkInputs);
                    input.addEventListener('keyup', checkInputs);
                });

                window.addEventListener('load', checkInputs);


                form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting via HTTP
                if (!nextButton.disabled) {
                    const formData = new FormData(form);
                    fetch('{{ route('patient.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const patientSelect = document.getElementById('patient_id');
                            const patientOption = document.createElement('option');
                            patientOption.value = data.patient_id;
                            patientOption.text = formData.get('name'); // Assuming 'name' is the input field for the patient's name
                            patientSelect.innerHTML = ''; // Clear existing options
                            patientSelect.appendChild(patientOption); // Add the new option
                            showAppointmentForm();
                        } else {
                            // Handle errors
                            alert('Failed to save patient information.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                        }
                    });


                function showAppointmentForm() {
                    document.getElementById('patient-form').style.display = 'none';
                    document.getElementById('appointment-form').style.display = 'block';
                }

                function showPatientForm() {
                    document.getElementById('appointment-form').style.display = 'none';
                    document.getElementById('patient-form').style.display = 'block';
                }
            </script>
        </div>
    </section>
@endsection
