document.getElementById('registrasi').addEventListener('submit', function(event){
    event.preventDefault();

    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const alamat = document.getElementById('alamat').value;

    if (nama && email && alamat){
        alert(`Terima kasih, ${nama}! Pendaftaran berhasil.`);
    } else {
        alert('Harap isi semua kolom!')
    }
});