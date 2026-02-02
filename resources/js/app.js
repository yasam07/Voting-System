document.addEventListener('DOMContentLoaded', function () {

    const baseUrl = window.ADMIN_BASE_URL;
    

    console.log('Dropdown JS loaded');

    // Province → District
    const province = document.getElementById('province_id');
    if (province) {
        province.addEventListener('change', function () {

            const district = document.getElementById('district_id');
            district.innerHTML = '<option value="">Select District</option>';

          fetch(`${baseUrl}/get-districts/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(d => {
                        const opt = document.createElement('option');
                        opt.value = d.id;
                        opt.text = d.name;
                        district.add(opt);
                    });

                    document.getElementById('municipality_id').innerHTML =
                        '<option value="">Select Municipality</option>';
                    document.getElementById('ward_id').innerHTML =
                        '<option value="">Select Ward</option>';
                });
        });
    }

    // District → Municipality
    const district = document.getElementById('district_id');
    if (district) {
        district.addEventListener('change', function () {

            const muni = document.getElementById('municipality_id');
            muni.innerHTML = '<option value="">Select Municipality</option>';

            fetch(`${baseUrl}/get-municipalities/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(m => {
                        const opt = document.createElement('option');
                        opt.value = m.id;
                        opt.text = m.name;
                        muni.add(opt);
                    });

                    document.getElementById('ward_id').innerHTML =
                        '<option value="">Select Ward</option>';
                });
        });
    }

    // Municipality → Ward
    const muni = document.getElementById('municipality_id');
    if (muni) {
        muni.addEventListener('change', function () {

            const ward = document.getElementById('ward_id');
            ward.innerHTML = '<option value="">Select Ward</option>';

            fetch(`${baseUrl}/get-wards/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(w => {
                        const opt = document.createElement('option');
                        opt.value = w.id;
                        opt.text = w.ward_no;
                        ward.add(opt);
                    });
                });
        });
    }



});
    