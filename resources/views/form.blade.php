<x-layout title="Registration Form">

<section class="form-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/background-home.png'); background-size: cover; background-position: center; height: auto; padding-top: 50px; padding-bottom: 50px;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-md-8 p-5" style="background-color: rgba(255,255,255,0.9); box-shadow: 0px 0px 20px rgba(0,0,0,0.1); border-radius: 10px;">
            <h2 class="text-dark text-center mb-4">Daftarkan Dirimu Sekarang!</h2>
            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <form id="registrationForm" action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3 text-dark">
                        <label for="student_name" class="form-label" >Nama Murid<span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="student_name" placeholder="Masukkan nama murid" required>
                    </div>

                    <div class="col-md-6 mb-3 text-dark">
                        <label for="parent_name" class="form-label">Nama Orang Tua<span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="parent_name" placeholder="Masukkan nama orang tua" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 text-dark">
                        <label for="phone_number" class="form-label">Nomor Telepon<span style="color: red">*</span></label>
                        <input type="tel" class="form-control" name="phone_number" placeholder="Masukkan nomor telepon" required>
                    </div>

                    <div class="col-md-6 mb-3 text-dark">
                        <label for="email" class="form-label">Email<span style="color: red">*</span></label>
                        <input type="email" class="form-control" name="parent_email" placeholder="Masukkan email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3 text-dark">
                        <label for="address" class="form-label">Alamat<span style="color: red">*</span></label>
                        <textarea class="form-control" name="address" placeholder="Masukkan alamat" required></textarea>
                    </div>
                </div>

                <div class="mb-3 text-dark">
                    <label class="form-label">Pertanyaan yang ingin diajukan<span style="color: red">*</span></label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pendaftaran" value="Pendaftaran" id="registration">
                                <label class="form-check-label" for="registration">Pendaftaran</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="self_active_learning" value="Self Active Learning" id="self_active_learning">
                                <label class="form-check-label" for="self_active_learning">Self Active Learning</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="biaya" value="Biaya-biaya" id="fees">
                                <label class="form-check-label" for="fees">Biaya-biaya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="lainnya" value="Lainnya" id="other">
                                <label class="form-check-label" for="other">Lainnya, tuliskan:</label>
                                <input type="text" class="form-control mt-2" name="other_question" placeholder="Lainnya, tuliskan...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mb-4">
                    <button type="submit" id="submitBtn" class="btn text-light" style="width: 200px; margin-top: 10px; background-color: #38b6ff;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Cegah submit form secara standar

    // Ambil data dari form
    const formData = new FormData(this);
    
    // Ambil pertanyaan yang dipilih
    const questions = [];
    if (formData.get('pendaftaran')) {
        questions.push('Pendaftaran');
    }
    if (formData.get('self_active_learning')) {
        questions.push('Self Active Learning');
    }
    if (formData.get('biaya')) {
        questions.push('Biaya-biaya');
    }
    if (formData.get('lainnya')) {
        const otherQuestion = formData.get('other_question');
        if (otherQuestion) {
            questions.push(`Lainnya: ${otherQuestion}`);
        }
    }

    // Gabungkan semua pertanyaan menjadi satu string
    const questionList = questions.length > 0 ? questions.join(', ') : 'Tidak ada pertanyaan yang dipilih';

    // Ambil data lain dari form
    const studentName = formData.get('student_name');
    const parentName = formData.get('parent_name');
    const phoneNumber = formData.get('phone_number');
    const email = formData.get('parent_email');
    const address = formData.get('address');
    const whatsappNumber = '6289514195467'; // Ganti dengan nomor WhatsApp tujuan

    // Buat pesan untuk WhatsApp
    const message = `Halo, saya ingin mendaftar. Berikut adalah detail saya:\n\nNama Murid: ${studentName}\nNama Orang Tua: ${parentName}\nNomor Telepon: ${phoneNumber}\nEmail: ${email}\nAlamat: ${address}\n\nPertanyaan yang diajukan: ${questionList}`;
    
    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

    // Kirim data ke server
    fetch('{{ route('student.store') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect ke WhatsApp jika berhasil
            window.location.href = whatsappURL;
        } else {
            alert('Gagal menyimpan data, silakan coba lagi.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan, silakan coba lagi.');
    });
});
</script>

</x-layout>