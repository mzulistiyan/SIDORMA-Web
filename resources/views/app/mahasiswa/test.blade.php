<form method="POST" action="{{ route('store.arraytest') }}">
    @csrf
    <div id="mahasiswa-container">
        <div class="mahasiswa">
            <input type="text" name="name[]" placeholder="Name">
            <input type="text" name="nim[]" placeholder="NIM">
            <input type="text" name="fakultas[]" placeholder="Fakultas">
            <input type="text" name="prodi[]" placeholder="Program Studi">
            <input type="text" name="alamat[]" placeholder="Alamat">
            <input type="text" name="no_telp[]" placeholder="No. Telepon">
            <input type="text" name="id_gedung[]" placeholder="ID Gedung">
        </div>
    </div>
    <button type="button" id="add-mahasiswa">Add More</button>


    <button type="submit">Submit</button>
</form>

<script>
    // Ambil container dari elemen input mahasiswa
    const container = document.getElementById("mahasiswa-container");
    // Ambil tombol "Add More"
    const addBtn = document.getElementById("add-mahasiswa");

    // Tambahkan event listener ketika tombol "Add More" di klik
    addBtn.addEventListener("click", () => {
        // Clone elemen input mahasiswa
        const clone = container.children[0].cloneNode(true);
        // Bersihkan value pada elemen input
        const inputs = clone.querySelectorAll("input");
        inputs.forEach((input) => (input.value = ""));
        // Tambahkan elemen input yang sudah diclone ke dalam container
        container.appendChild(clone);
    });
</script>