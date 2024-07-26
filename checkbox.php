<!DOCTYPE html>
<html>
<head>
    <title>Doctor List Filter</title>
    <style>
        .filter {
            margin-bottom: 20px;
        }
        .doctor-list {
            list-style-type: none;
            padding: 0;
        }
        .doctor-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h1>Doctor List</h1>

<div class="filter">
    <h3>Filter by Hospital</h3>
    <input type="checkbox" id="hospital1" name="hospital" value="Hospital A">
    <label for="hospital1">Hospital A</label><br>
    <input type="checkbox" id="hospital2" name="hospital" value="Hospital B">
    <label for="hospital2">Hospital B</label><br>
    <input type="checkbox" id="hospital3" name="hospital" value="Hospital C">
    <label for="hospital3">Hospital C</label><br>
</div>

<div class="filter">
    <h3>Filter by Specialty</h3>
    <input type="checkbox" id="specialty1" name="specialty" value="Cardiology">
    <label for="specialty1">Cardiology</label><br>
    <input type="checkbox" id="specialty2" name="specialty" value="Neurology">
    <label for="specialty2">Neurology</label><br>
    <input type="checkbox" id="specialty3" name="specialty" value="Pediatrics">
    <label for="specialty3">Pediatrics</label><br>
</div>

<ul class="doctor-list">
    <li class="doctor" data-hospital="Hospital A" data-specialty="Cardiology">Dr. John Smith - Cardiology - Hospital A</li>
    <li class="doctor" data-hospital="Hospital A" data-specialty="Neurology">Dr. Jane Doe - Neurology - Hospital A</li>
    <li class="doctor" data-hospital="Hospital B" data-specialty="Pediatrics">Dr. Emily Davis - Pediatrics - Hospital B</li>
    <li class="doctor" data-hospital="Hospital C" data-specialty="Cardiology">Dr. Michael Brown - Cardiology - Hospital C</li>
    <li class="doctor" data-hospital="Hospital C" data-specialty="Pediatrics">Dr. Sarah Wilson - Pediatrics - Hospital C</li>
</ul>

<script>
    document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', filterDoctors);
    });

    function filterDoctors() {
        const selectedHospitals = Array.from(document.querySelectorAll('input[name="hospital"]:checked')).map(cb => cb.value);
        const selectedSpecialties = Array.from(document.querySelectorAll('input[name="specialty"]:checked')).map(cb => cb.value);

        document.querySelectorAll('.doctor').forEach(function(doctor) {
            const doctorHospital = doctor.getAttribute('data-hospital');
            const doctorSpecialty = doctor.getAttribute('data-specialty');

            if (
                (selectedHospitals.length === 0 || selectedHospitals.includes(doctorHospital)) &&
                (selectedSpecialties.length === 0 || selectedSpecialties.includes(doctorSpecialty))
            ) {
                doctor.style.display = '';
            } else {
                doctor.style.display = 'none';
            }
        });
    }
</script>

</body>
</html>
